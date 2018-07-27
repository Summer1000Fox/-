<?php
//
//后台资源控制器:控制轮播图,按钮和图文消息
namespace Ht\Controller;
use Think\Controller;
class ResourceController extends CommonController {

    //浏览轮播图
    public function slideshow(){
		//header("Content-type: text/html; charset=utf8"); 
        //准备分权展示管理员所需要的变量
        $masknum = $_SESSION['admin']['masknum'];
        $admincode = $_SESSION['admin']['admincode'];
        $admincodelen = strlen($admincode);
        $adminlike = substr($admincode,0,$admincodelen-$masknum);
        $adminmrank = $_SESSION['admin']['mrank'];
        $adminid = $_SESSION['admin']['id'];

        //判断是页面是否提交搜索条件并写入$map
        if(!empty($_GET['title'])){
            $map['title']=array('like',"%{$_GET['title']}%");
        }
        
        //用于查询符合模糊搜索的数据的总条数
        $seachtitle = $_GET['title'];

        //实例化resource表
        $slideshow = D('resource');

        //分页相关
        $count = $slideshow->query("SELECT COUNT(*) AS tp_count FROM `resource` left join admin on resource.rcode = admin.admincode WHERE (resource.type=2) and ( `title` LIKE '%".$seachtitle."%' ) AND ( (resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."' ) GROUP BY resource.rid ORDER BY resource.priority asc");
        
        //$count:(string)符合条件的总数据量
        $count = (string)count($count);

        //$hmadpp:(int)每页分成多少条 How many article displayed per page
        $hmadpp = 10;

        //导入分页类设置并自定内容
        $page = new \Think\Page($count,$hmadpp);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        /*详细定制
        $page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录</span>');
        $page->setConfig('first','1...');
        $page->setConfig('last','...%TOTAL_PAGE%');*/
        
        //查询
        $slideshowlist = $slideshow
                    ->join("left join admin on resource.rcode = admin.admincode")
                    ->where($map)
                    ->where("(resource.type=2) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                    ->group('resource.rid')
                    ->limit($page->firstRow.','.$page->listRows)
                    ->order('resource.priority asc')
                    ->select();

        //传送相关值并显示模板
        $pageButton = $page->show();
        $this->assign('slideshowcount',$count);
        $this->assign('slideshowlist',$slideshowlist);
        $this->assign('pageButton',$pageButton);
        $this->display();
        
    }


    //添加轮播图
    public function addslideshow(){

        if(IS_POST){

            //约束传来的优先级范围
            if($_SESSION['admin']['mrank']=='1'&&($_POST['priority']<1||$_POST['priority']>10)){
                $this->error('省行管理员的优先级范围:1-10','addslideshow');
            }elseif($_SESSION['admin']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                $this->error('支行管理员的优先级范围:11-20','addslideshow');
            }elseif($_SESSION['admin']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                $this->error('网点管理员的优先级范围:21-99','addslideshow');
            }

            //配置上传图片的参数
            $config = array(    
                'maxSize'    =>    3145728,                                         //大小  
                'savePath'   =>    './ht/resource/slideshow/',                      //自定义保存路径
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                'rootPath'   =>    './Public/',                                     //保存根路径
                'autoSub'   =>    false,                                            //关闭自动生成日期目录
            );

            //实例化上传类
            $upload = new \Think\Upload($config);                                   // 实例化上传类
            $info   =   $upload->upload();
            if(!$info) {

                // 上传错误提示错误信息                                                        
                $this->error($upload->getError());    
            }else{

                //准备插入资源表条件
                $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                $_POST['adminid'] = $_SESSION['admin']['id'];
                $_POST['rcode'] = $_SESSION['admin']['admincode'];
                $_POST['isaudit'] = 2;

                //省级管理员添加资源时直接通过审核
                if($_SESSION['admin']['mrank']=='1'){
                    $_POST['isaudit'] = 1;
                }
                $_POST['type'] = 2;
                
                //实例化资源表
                $slideshow = D('resource');
                $maxrid = $slideshow->query('select max(rid) as rid from resource');
                $_POST['rid'] = intval($maxrid['0']['rid'])+1;
                $data = $_POST;
                $slideshowresult = $slideshow->add($data);

                //对结果进行处理
                if($slideshowresult==1){

                    $this->success('添加轮播图成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>','slideshow');

                }else{

                    $this->error('出现错误,请重试','addslideshow');

                }

            }

        }

        $this->display();

    }


    //审核下级想发布的轮播图
    public function auditslideshow(){

        //判断当前管理员是否有权利审核资源
        if($_SESSION['admin']['admincode']==$_GET['rcode']&&$_SESSION['admin']['mrank']!='1'){
            $this->error('你不能审批自己或同级管理员发布的资源.如有需要,请及时联系上级管理员.');
        }else{
            $_SESSION['xql']['resource']['auditid'] = $_GET['id'];
            $slideshowid = $_SESSION['xql']['resource']['auditid'];
            $slideshow = D('resource');
            $slideshowlist = $slideshow->where("rid={$slideshowid}")->select();
            $admin = D('admin');
            $adminid = $slideshowlist['0']['adminid'];
            $aname = $admin->query("select aname from admin where id={$adminid}");
            $slideshowlist['0']['aname'] = $aname['0']['aname'];
            if($_POST['act']=='pass'){
                $data['isaudit'] = 1;
                $auditresult = $slideshow->where("rid={$slideshowid}")->save($data);
                unset($_GET);
                if($auditresult==1){
                    $url = $_SERVER['SERVER_NAME'].__ROOT__.'/Ht/Resource/slideshow';
                    $this->redirect($url);
                }
            }elseif($_POST['act']=='delete'){
                $_SESSION['xql']['resource']['auditid'] = $_GET['id'];
                $slideshowid = $_SESSION['xql']['resource']['auditid'];
                
                //获取图片路径并删除
                $delslideshow = D('resource');
                $pic = $delslideshow->field('pic')->where('rid='.$_GET['id'])->find();
                unlink('./Public'.$pic['pic']);

                $deleteresult = $slideshow->where("rid={$slideshowid}")->delete();
                unset($_GET);
                $url = $_SERVER['SERVER_NAME'].__ROOT__.'/Ht/Resource/slideshow';
                $this->redirect($url);
            }

            $this->assign('slideshowlist',$slideshowlist);
            $this->display();

        }
        
    }


    //根据管理员id查询管理员相关信息
    public function idtoinfo($id){

        $admin = D('admin');
        $infolist = $admin->query("select * from admin where id={$id}");
        return $infolist;

    }


    //修改轮播图
    public function editslideshow(){

        $slideshow = D('resource');
        $rid = $_GET['id'];
        $_SESSION['xql']['resource']['editslideshowid'] = $rid;
        $slideshowlist = $slideshow->where("rid={$rid}")->select();
        $resourceadminid = $_GET['adminid'];
        $_SESSION['xql']['resource']['resourceadminid'] = $resourceadminid;

        //获得当前所操纵资源的创建者的信息,变量解释:资源的创建管理员的信息
        $resourceadmininfo = $this->idtoinfo($_SESSION['xql']['resource']['resourceadminid']);
        if(IS_POST){

            //约束传来的优先级范围
            if($_SESSION['admin']['mrank']=='1'){
                if($resourceadmininfo['0']['mrank']=='1'&&($_POST['priority']<1||$_POST['priority']>10)){
                    $this->error('省行管理员的优先级范围:1-10');
                }elseif($resourceadmininfo['0']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                    $this->error('您当前修改的为支行管理员的资源,可选优先级范围:11-20');
                }elseif($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('您当前修改的为网点管理员的资源,可选优先级范围:21-99');
                }
            }elseif($_SESSION['admin']['mrank']=='2'){
                if($resourceadmininfo['0']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                    $this->error('支行管理员的优先级范围:11-20');
                }elseif($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('您当前修改的为网点管理员的资源,可选优先级范围:21-99');
                }
            }elseif($_SESSION['admin']['mrank']=='3'){
                if($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('网点管理员的优先级范围:21-99');
                }
                
            }

            //省行随便改
            if($_SESSION['admin']['mrank']=='1'){
                if(IS_POST){

                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,                                         //大小  
                        'savePath'   =>    './ht/resource/slideshow/',                      //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );

                    //实例化上传类
                    $upload = new \Think\Upload($config);                                   // 实例化上传类
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备插入资源表条件
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $slideshow = D('resource');
                    $piclen = strlen($info['pic']['savename']);

                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $slideshow->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $slideshow->where('rid='.$rid)->select();
                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);
                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/slideshow/'.$info['pic']['savename'];

                    }

                    //准备并更新轮播图数据
                    $data = $_POST;
                    $esseresult = $slideshow->where('rid='.$rid)->save($data);
                    if($esseresult==1){
                        $this->success('修改轮播图成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('slideshow'));
                    }else{
                        $this->error('未作出任何修改');
                    }
                }

            //支行改自己的资源,审核状态变成未审核+支行改下属网点的资源
            }elseif($_SESSION['admin']['mrank']=='2'){
                if(IS_POST){

                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,  //大小  
                        'savePath'   =>    './ht/resource/slideshow/',                      //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );

                    // 实例化上传类
                    $upload = new \Think\Upload($config);                                   
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备修改资源表字段的值
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $slideshow = D('resource');
                    $piclen = strlen($info['pic']['savename']);
                    
                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $slideshow->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $slideshow->where('rid='.$rid)->select();
                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);
                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/slideshow/'.$info['pic']['savename'];
                    }

                    //把POST赋予$data并修改
                    $data = $_POST;
                    $esseresult = $slideshow->where('rid='.$rid)->save($data);

                    //对结果进行判断
                    if($esseresult==1){

                        //当支行管理员修改自己发布的资源时,需要省行管理员重洗审核
                        if($resourceadmininfo['0']['mrank']=='2'){
                            $slideshow = D('resource');
                            $isaudit['isaudit'] = 2;
                            $changeisaudit = $slideshow->where("rid={$rid}")->save($isaudit);
                        }
                        $this->success('修改轮播图成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('slideshow'));
                    }else{
                        $this->error('未作出任何修改');
                    }
                }

            //网点改自己的资源,审核状态变成未审核
            }elseif($_SESSION['admin']['mrank']=='3'){
                if(IS_POST){
                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,                                         //大小  
                        'savePath'   =>    './ht/resource/slideshow/',                      //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );
                    $upload = new \Think\Upload($config);                                   // 实例化上传类
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备修改资源表字段的值
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $slideshow = D('resource');
                    $piclen = strlen($info['pic']['savename']);

                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $slideshow->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $slideshow->where('rid='.$rid)->select();
                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);
                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/slideshow/'.$info['pic']['savename'];

                    }

                    //准备并获取需要更新的数据
                    $data = $_POST;
                    $esseresult = $slideshow->where('rid='.$rid)->save($data);

                    //对结果进行判断
                    if($esseresult==1){

                        //当网点管理员修改自己发布的资源时,需要支行或省行管理员重洗审核
                        if($resourceadmininfo['0']['mrank']=='3'){
                            $slideshow = D('resource');
                            $isaudit['isaudit'] = 2;
                            $changeisaudit = $slideshow->where("rid={$rid}")->save($isaudit);
                        }
                        $this->success('修改轮播图成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('slideshow'));

                    }else{

                        $this->error('未作出任何修改');

                    }

                }

            }    

        }

        $this->assign('slideshowlist',$slideshowlist);
        $this->display();

    }
    
    
    //删除轮播图
    public function delslideshow(){

        //实例化资源包
        $delslideshow = D('resource');

        //获取图片路径并删除
        $pic = $delslideshow->field('pic')->where('rid='.$_GET['id'])->find();
        unlink('./Public'.$pic['pic']);

        //删除资源表中的对应记录
        $delreturn = $delslideshow->where('rid='.$_GET['id'])->delete();
        if($delreturn){
            $this->success('删除成功!',U('slideshow'));
        }else{
            $this->error('删除失败!');
        }
        
    }
    

    //浏览按钮
    public function button(){

        //准备分权展示管理员所需要的变量
        $masknum = $_SESSION['admin']['masknum'];
        $admincode = $_SESSION['admin']['admincode'];
        $admincodelen = strlen($admincode);
        $adminlike = substr($admincode,0,$admincodelen-$masknum);
        $adminmrank = $_SESSION['admin']['mrank'];
        $adminid = $_SESSION['admin']['id'];

        //判断是页面是否提交搜索条件并写入$map
        if(!empty($_GET['title'])){
            $map['title']=array('like',"%{$_GET['title']}%");
        }
        
        //用于查询符合模糊搜索的数据的总条数
        $seachtitle = $_GET['title'];

        //实例化resource表
        $button = D('resource');

        //分页相关
        $count = $button->query("SELECT COUNT(*) AS tp_count FROM `resource` left join admin on resource.rcode = admin.admincode WHERE (resource.type=1) and ( `title` LIKE '%".$seachtitle."%' ) AND ( (resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."' ) GROUP BY resource.rid ORDER BY resource.priority asc");
        
        //$count:(string)符合条件的总数据量
        $count = (string)count($count);

        //$hmadpp:(int)每页分成多少条 How many article displayed per page
        $hmadpp = 10;

        //导入分页类设置并自定内容
        $page = new \Think\Page($count,$hmadpp);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        /*详细定制
        $page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录</span>');
        $page->setConfig('first','1...');
        $page->setConfig('last','...%TOTAL_PAGE%');*/
        
        //查询
        $buttonlist = $button
                    ->join("left join admin on resource.rcode = admin.admincode")
                    ->where($map)
                    ->where("(resource.type=1) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                    ->group('resource.rid')
                    ->limit($page->firstRow.','.$page->listRows)
                    ->order('resource.priority asc')
                    ->select();

        //传送相关值并显示模板
        $pageButton = $page->show();
        $this->assign('buttoncount',$count);
        $this->assign('buttonlist',$buttonlist);
        $this->assign('pageButton',$pageButton);
        $this->display();

    }


    //添加按钮
    public function addbutton(){

        if(IS_POST){

            //约束传来的优先级范围
            if($_SESSION['admin']['mrank']=='1'&&($_POST['priority']<1||$_POST['priority']>10)){
                $this->error('省行管理员的优先级范围:1-10','addbutton');
            }elseif($_SESSION['admin']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                $this->error('支行管理员的优先级范围:11-20','addbutton');
            }elseif($_SESSION['admin']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                $this->error('网点管理员的优先级范围:21-99','addbutton');
            }

            //配置上传图片的参数
            $config = array(    
                'maxSize'    =>    3145728,                                         //大小  
                'savePath'   =>    './ht/resource/button/',                         //自定义保存路径
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                'rootPath'   =>    './Public/',                                     //保存根路径
                'autoSub'   =>    false,                                            //关闭自动生成日期目录
            );

            // 实例化上传类
            $upload = new \Think\Upload($config);                                   
            $info   =   $upload->upload();
            if(!$info) {

                // 上传错误提示错误信息                                                        
                $this->error($upload->getError());    
            }else{

                //准备插入资源表条件
                $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                $_POST['adminid'] = $_SESSION['admin']['id'];
                $_POST['rcode'] = $_SESSION['admin']['admincode'];
                $_POST['isaudit'] = 2;

                //省级管理员添加资源时直接通过审核
                if($_SESSION['admin']['mrank']=='1'){
                    $_POST['isaudit'] = 1;
                }
                $_POST['type'] = 1;
                
                //实例化资源表
                $button = D('resource');
                $maxrid = $button->query('select max(rid) as rid from resource');
                $_POST['rid'] = intval($maxrid['0']['rid'])+1;
                $data = $_POST;
                $buttonresult = $button->add($data);
                if($buttonresult==1){
                    $this->success('添加按钮成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>','button');
                }else{

                    $this->error('出现错误,请重试','addbutton');

                }

            }

        }

        $this->display();

    }


    //审核下级想发布的按钮
    public function auditbutton(){

        //判断当前管理员是否有权利审核资源
        if($_SESSION['admin']['admincode']==$_GET['rcode']&&$_SESSION['admin']['mrank']!='1'){
            $this->error('你不能审批自己或同级管理员发布的资源.如有需要,请及时联系上级管理员.');
        }else{
            $_SESSION['xql']['resource']['auditid'] = $_GET['id'];
            $buttonid = $_SESSION['xql']['resource']['auditid'];
            $button = D('resource');
            $buttonlist = $button->where("rid={$buttonid}")->select();
            $admin = D('admin');
            $adminid = $buttonlist['0']['adminid'];
            $aname = $admin->query("select aname from admin where id={$adminid}");
            $buttonlist['0']['aname'] = $aname['0']['aname'];
            if($_POST['act']=='pass'){
                $data['isaudit'] = 1;
                $auditresult = $button->where("rid={$buttonid}")->save($data);
                unset($_GET);
                if($auditresult==1){
                    $url = $_SERVER['SERVER_NAME'].__ROOT__.'/Ht/Resource/button';
                    $this->redirect($url);
                }
            }elseif($_POST['act']=='delete'){
                $_SESSION['xql']['resource']['auditid'] = $_GET['id'];
                $buttonid = $_SESSION['xql']['resource']['auditid'];
                
                //获取图片路径并删除
                $delbutton = D('resource');
                $pic = $delbutton->field('pic')->where('rid='.$_GET['id'])->find();
                unlink('./Public'.$pic['pic']);
                $deleteresult = $button->where("rid={$buttonid}")->delete();
                unset($_GET);
                $url = $_SERVER['SERVER_NAME'].__ROOT__.'/Ht/Resource/button';
                $this->redirect($url);

            }

            $this->assign('buttonlist',$buttonlist);
            $this->display();

        }
        
    }


    //修改按钮
    public function editbutton(){

        $button = D('resource');
        $rid = $_GET['id'];
        $_SESSION['xql']['resource']['editbuttonid'] = $rid;
        $buttonlist = $button->where("rid={$rid}")->select();
        $resourceadminid = $_GET['adminid'];
        $_SESSION['xql']['resource']['resourceadminid'] = $resourceadminid;

        //获得当前所操纵资源的创建者的信息,变量解释:资源的创建管理员的信息
        $resourceadmininfo = $this->idtoinfo($_SESSION['xql']['resource']['resourceadminid']);
        if(IS_POST){

            //约束传来的优先级范围
            if($_SESSION['admin']['mrank']=='1'){
                if($resourceadmininfo['0']['mrank']=='1'&&($_POST['priority']<1||$_POST['priority']>10)){
                    $this->error('省行管理员的优先级范围:1-10');
                }elseif($resourceadmininfo['0']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                    $this->error('您当前修改的为支行管理员的资源,可选优先级范围:11-20');
                }elseif($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('您当前修改的为网点管理员的资源,可选优先级范围:21-99');
                }
            }elseif($_SESSION['admin']['mrank']=='2'){
                if($resourceadmininfo['0']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                    $this->error('支行管理员的优先级范围:11-20');
                }elseif($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('您当前修改的为网点管理员的资源,可选优先级范围:21-99');
                }
            }elseif($_SESSION['admin']['mrank']=='3'){
                if($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('网点管理员的优先级范围:21-99');
                }
                
            }

            //省行随便改
            if($_SESSION['admin']['mrank']=='1'){
                if(IS_POST){
                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,                                         //大小  
                        'savePath'   =>    './ht/resource/button/',                         //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );

                    // 实例化上传类
                    $upload = new \Think\Upload($config);                                   
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备插入资源表条件
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $button = D('resource');
                    $piclen = strlen($info['pic']['savename']);

                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $button->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $button->where('rid='.$rid)->select();

                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);

                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/button/'.$info['pic']['savename'];
                    }
                    $data = $_POST;
                    $esseresult = $button->where('rid='.$rid)->save($data);
                    if($esseresult==1){

                        $this->success('修改按钮成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('button'));

                    }else{

                        $this->error('未作出任何修改');

                    }

                }

            //支行改自己的资源,审核状态变成未审核+支行改下属网点的资源
            }elseif($_SESSION['admin']['mrank']=='2'){
                if(IS_POST){

                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,                                         //大小  
                        'savePath'   =>    './ht/resource/button/',                         //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );

                    // 实例化上传类
                    $upload = new \Think\Upload($config);                                   
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备修改资源表字段的值
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $button = D('resource');
                    $piclen = strlen($info['pic']['savename']);
                    
                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $button->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $button->where('rid='.$rid)->select();

                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);

                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/button/'.$info['pic']['savename'];

                    }

                    //把POST赋予$data并修改
                    $data = $_POST;
                    $esseresult = $button->where('rid='.$rid)->save($data);

                    //对结果进行判断
                    if($esseresult==1){

                        //当支行管理员修改自己发布的资源时,需要省行管理员重洗审核
                        if($resourceadmininfo['0']['mrank']=='2'){
                            $button = D('resource');
                            $isaudit['isaudit'] = 2;
                            $changeisaudit = $button->where("rid={$rid}")->save($isaudit);
                        }
                        $this->success('修改按钮成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('button'));
                    }else{

                        $this->error('未作出任何修改');

                    }

                }

            //网点改自己的资源,审核状态变成未审核
            }elseif($_SESSION['admin']['mrank']=='3'){

                if(IS_POST){
                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,                                         //大小  
                        'savePath'   =>    './ht/resource/button/',                         //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );

                    // 实例化上传类
                    $upload = new \Think\Upload($config);                                   
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备修改资源表字段的值
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $button = D('resource');
                    $piclen = strlen($info['pic']['savename']);

                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $button->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $button->where('rid='.$rid)->select();

                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);

                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/button/'.$info['pic']['savename'];
                    }
                    $data = $_POST;
                    $esseresult = $button->where('rid='.$rid)->save($data);

                    //对结果进行判断
                    if($esseresult==1){

                        //当网点管理员修改自己发布的资源时,需要支行或省行管理员重洗审核
                        if($resourceadmininfo['0']['mrank']=='3'){
                            $button = D('resource');
                            $isaudit['isaudit'] = 2;
                            $changeisaudit = $button->where("rid={$rid}")->save($isaudit);
                        }
                        $this->success('修改按钮成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('button'));
                    }else{

                        $this->error('未作出任何修改');

                    }

                }

            } 

        }
        $this->assign('buttonlist',$buttonlist);
        $this->display();

    }
    
    
    //删除按钮
    public function delbutton(){

        //实例化资源包
        $delbutton = D('resource');

        //获取图片路径并删除
        $pic = $delbutton->field('pic')->where('rid='.$_GET['id'])->find();
        unlink('./Public'.$pic['pic']);

        //删除资源表中的对应记录
        $delreturn = $delbutton->where('rid='.$_GET['id'])->delete();
        if($delreturn){
            $this->success('删除成功!',U('button'));
        }else{
            $this->error('删除失败!');
        }
        
    }
    

    //浏览文章
    public function article(){

        //准备分权展示管理员所需要的变量
        $masknum = $_SESSION['admin']['masknum'];
        $admincode = $_SESSION['admin']['admincode'];
        $admincodelen = strlen($admincode);
        $adminlike = substr($admincode,0,$admincodelen-$masknum);
        $adminmrank = $_SESSION['admin']['mrank'];
        $adminid = $_SESSION['admin']['id'];

        //判断是页面是否提交搜索条件并写入$map
        if(!empty($_GET['title'])){
            $map['title']=array('like',"%{$_GET['title']}%");
        }
        
        //用于查询符合模糊搜索的数据的总条数
        $seachtitle = $_GET['title'];

        //实例化resource表
        $article = D('resource');

        //分页相关
        $count = $article->query("SELECT COUNT(*) AS tp_count FROM `resource` left join admin on resource.rcode = admin.admincode WHERE (resource.type=3) and ( `title` LIKE '%".$seachtitle."%' ) AND ( (resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."' ) GROUP BY resource.rid ORDER BY resource.priority asc");
        
        //$count:(string)符合条件的总数据量
        $count = (string)count($count);

        //$hmadpp:(int)每页分成多少条 How many article displayed per page
        $hmadpp = 10;

        //导入分页类设置并自定内容
        $page = new \Think\Page($count,$hmadpp);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        /*详细定制
        $page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录</span>');
        $page->setConfig('first','1...');
        $page->setConfig('last','...%TOTAL_PAGE%');*/
        
        //查询
        $articlelist = $article
                    ->join("left join admin on resource.rcode = admin.admincode")
                    ->where($map)
                    ->where("(resource.type=3) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                    ->group('resource.rid')
                    ->limit($page->firstRow.','.$page->listRows)
                    ->order('resource.priority asc')
                    ->select();

        //传送相关值并显示模板
        $pageButton = $page->show();
        //var_dump($pageButton);
        $this->assign('articlecount',$count);
        $this->assign('articlelist',$articlelist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }
    

    //添加文章
    public function addarticle(){

        if(IS_POST){

            //约束传来的优先级范围
            if($_SESSION['admin']['mrank']=='1'&&($_POST['priority']<1||$_POST['priority']>10)){
                $this->error('省行管理员的优先级范围:1-10','addarticle');
            }elseif($_SESSION['admin']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                $this->error('支行管理员的优先级范围:11-20','addarticle');
            }elseif($_SESSION['admin']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                $this->error('网点管理员的优先级范围:21-99','addarticle');
            }

            //配置上传图片的参数
            $config = array(    
                'maxSize'    =>    3145728,  //大小  
                'savePath'   =>    './ht/resource/article/',                      //自定义保存路径
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                'rootPath'   =>    './Public/',                                     //保存根路径
                'autoSub'   =>    false,                                            //关闭自动生成日期目录
            );

            // 实例化上传类
            $upload = new \Think\Upload($config);                                   
            $info   =   $upload->upload();
            if(!$info) {

                // 上传错误提示错误信息
                $this->error($upload->getError());    
            }else{
                $articleinfo['content'] = $_POST['content'];
                unset($_POST['content']);

                //准备插入资源表条件
                $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                $_POST['adminid'] = $_SESSION['admin']['id'];
                $_POST['rcode'] = $_SESSION['admin']['admincode'];
                $_POST['isaudit'] = 2;

                //省级管理员添加资源时直接通过审核
                if($_SESSION['admin']['mrank']=='1'){
                    $_POST['isaudit'] = 1;
                }
                $_POST['type'] = 3;
                
                //实例化资源表
                $article = D('resource');
                $maxrid = $article->query('select max(rid) as rid from resource');
                $_POST['rid'] = intval($maxrid['0']['rid'])+1;
                $data = $_POST;
                $articleresult = $article->add($data);

                //实例化文章表
                $addarticle = D('article');
                $articleinfo['addtime'] = time();
                $articleinfo['raid'] = $_POST['rid'];
                $articleinfo['hits'] = 0;
                $maxrid = $article->query('select max(id) as rid from article');
                $articleinfo['id'] = intval($maxrid['0']['rid'])+1;
                $addarticleresult = $addarticle->add($articleinfo);

                //自动生成写入文章url,夏千狸完成于2017年7月11日12:11:10
                $arturlid = $articleinfo['raid'];
                $arturladminid = $_SESSION['admin']['id'];
                $articleurl['url'] = "/TP/pf/Home/Index/seearticle/id/$arturlid/adminid/$arturladminid.html";
                $changeurl = $article->where('rid='.$_POST['rid'])->save($articleurl);

                //对结果进行判断
                if($articleresult==1&&$addarticleresult==1){
                    $this->success('添加文章成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>','article');
                }else{

                    $this->error('出现错误,请重试','addarticle');

                }

            }

        }

        $this->display();

    }


    //审核下级想发布的文章
    public function auditarticle(){

        //判断当前管理员是否有权利审核资源
        if($_SESSION['admin']['admincode']==$_GET['rcode']&&$_SESSION['admin']['mrank']!='1'){
            $this->error('你不能审批自己或同级管理员发布的资源.如有需要,请及时联系上级管理员.');
        }else{
            $_SESSION['xql']['resource']['auditid'] = $_GET['id'];
            $articleid = $_SESSION['xql']['resource']['auditid'];
            $article = D('resource');
            $articlelist = $article->where("rid={$articleid}")->select();
            $admin = D('admin');
            $adminid = $articlelist['0']['adminid'];
            $aname = $admin->query("select aname from admin where id={$adminid}");
            $articlelist['0']['aname'] = $aname['0']['aname'];
            if($_POST['act']=='pass'){
                $data['isaudit'] = 1;
                $auditresult = $article->where("rid={$articleid}")->save($data);
                unset($_GET);
                if($auditresult==1){
                    $url = $_SERVER['SERVER_NAME'].__ROOT__.'/Ht/Resource/article';
                    $this->redirect($url);
                }
            }elseif($_POST['act']=='delete'){
                $_SESSION['xql']['resource']['auditid'] = $_GET['id'];
                $articleid = $_SESSION['xql']['resource']['auditid'];

                //删除文章表中的记录
                $delarticlecontent = D('article');
                $delarticlecontentresult = $delarticlecontent->where('raid='.$_GET['id'])->delete();

                //获取图片路径并删除
                $delarticle = D('resource');
                $pic = $delarticle->field('pic')->where('rid='.$_GET['id'])->find();
                unlink('./Public'.$pic['pic']);

                $deleteresult = $article->where("rid={$articleid}")->delete();
                unset($_GET);
                $url = $_SERVER['SERVER_NAME'].__ROOT__.'/Ht/Resource/article';
                $this->redirect($url);
            }
            $this->assign('articlelist',$articlelist);
            $this->display();
        }
        
    }


    //修改文章
    public function editarticle(){

        $article = D('resource');
        $rid = $_GET['id'];
        $_SESSION['xql']['resource']['editarticleid'] = $rid;
        $articlelist = $article->where("rid={$rid}")->select();
        $resourceadminid = $_GET['adminid'];
        $_SESSION['xql']['resource']['resourceadminid'] = $resourceadminid;

        //获得当前所操纵资源的创建者的信息,变量解释:资源的创建管理员的信息
        $resourceadmininfo = $this->idtoinfo($_SESSION['xql']['resource']['resourceadminid']);
        if(IS_POST){

            //约束传来的优先级范围
            if($_SESSION['admin']['mrank']=='1'){
                if($resourceadmininfo['0']['mrank']=='1'&&($_POST['priority']<1||$_POST['priority']>10)){
                    $this->error('省行管理员的优先级范围:1-10');
                }elseif($resourceadmininfo['0']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                    $this->error('您当前修改的为支行管理员的资源,可选优先级范围:11-20');
                }elseif($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('您当前修改的为网点管理员的资源,可选优先级范围:21-99');
                }
            }elseif($_SESSION['admin']['mrank']=='2'){
                if($resourceadmininfo['0']['mrank']=='2'&&($_POST['priority']<11||$_POST['priority']>20)){
                    $this->error('支行管理员的优先级范围:11-20');
                }elseif($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('您当前修改的为网点管理员的资源,可选优先级范围:21-99');
                }
            }elseif($_SESSION['admin']['mrank']=='3'){
                if($resourceadmininfo['0']['mrank']=='3'&&($_POST['priority']<21||$_POST['priority']>99)){
                    $this->error('网点管理员的优先级范围:21-99');
                }
                
            }
            $articleinfo['content'] = $_POST['content'];
            unset($_POST['content']);
            $raid = $_POST['rid'];
            $editarticle = D('article');
            $editarticleresult = $editarticle->where('raid='.$raid)->save($articleinfo);

            //省行随便改
            if($_SESSION['admin']['mrank']=='1'){
                if(IS_POST){

                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,                                         //大小  
                        'savePath'   =>    './ht/resource/article/',                        //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );

                    // 实例化上传类
                    $upload = new \Think\Upload($config);                                   
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备插入资源表条件
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $article = D('resource');
                    $piclen = strlen($info['pic']['savename']);

                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $article->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $article->where('rid='.$rid)->select();

                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);

                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/article/'.$info['pic']['savename'];
                    }
                    $data = $_POST;
                    $esseresult = $article->where('rid='.$rid)->save($data);
                    if($esseresult==1||$editarticleresult==1){
                        $this->success('修改文章成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('article'));
                    }else{

                        $this->error('未作出任何修改');

                    }

                }

            //支行改自己的资源,审核状态变成未审核+支行改下属网点的资源
            }elseif($_SESSION['admin']['mrank']=='2'){
                if(IS_POST){

                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,                                         //大小  
                        'savePath'   =>    './ht/resource/article/',                        //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );

                    // 实例化上传类
                    $upload = new \Think\Upload($config);                                   
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备修改资源表字段的值
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $article = D('resource');
                    $piclen = strlen($info['pic']['savename']);
                    
                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $article->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $article->where('rid='.$rid)->select();

                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);

                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/article/'.$info['pic']['savename'];
                    }

                    //把POST赋予$data并修改
                    $data = $_POST;
                    $esseresult = $article->where('rid='.$rid)->save($data);

                    //对结果进行判断
                    if($esseresult==1||$editarticleresult==1){

                        //当支行管理员修改自己发布的资源时,需要省行管理员重洗审核
                        if($resourceadmininfo['0']['mrank']=='2'){
                            $article = D('resource');
                            $isaudit['isaudit'] = 2;
                            $changeisaudit = $article->where("rid={$rid}")->save($isaudit);
                        }
                        $this->success('修改文章成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('article'));
                    }else{

                        $this->error('未作出任何修改');

                    }

                }

            //网点改自己的资源,审核状态变成未审核
            }elseif($_SESSION['admin']['mrank']=='3'){
                if(IS_POST){
                    //配置上传图片的参数
                    $config = array(    
                        'maxSize'    =>    3145728,                                         //大小  
                        'savePath'   =>    './ht/resource/article/',                        //自定义保存路径
                        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),              //上传文件类型
                        'rootPath'   =>    './Public/',                                     //保存根路径
                        'autoSub'   =>    false,                                            //关闭自动生成日期目录
                    );

                    // 实例化上传类
                    $upload = new \Think\Upload($config);                                   
                    $info   =   $upload->upload();
                    $piclen = strlen($info['pic']['savename']);

                    //准备修改资源表字段的值
                    $_POST['pic'] = $info['pic']['savepath'].$info['pic']['savename'];
                    $_POST['pic'] = substr($_POST['pic'],1);
                    $rid = $_POST['rid'];
                    unset($_POST['rid']);

                    //实例化资源表
                    $article = D('resource');
                    $piclen = strlen($info['pic']['savename']);

                    //判断是否有图片需要更新
                    if($piclen==0){

                        //没有图片需要更新
                        $oldpic = $article->where('rid='.$rid)->select();
                        $_POST['pic'] = $oldpic['0']['pic'];
                    
                    //有图片更新
                    }else{
                        
                        //获取原图片名字
                        $oldpic = $article->where('rid='.$rid)->select();
                        //删除原图片
                        unlink('./Public'.$oldpic['0']['pic']);
                        //把新图片信息写进POST
                        $_POST['pic'] = '/ht/resource/article/'.$info['pic']['savename'];
                    }
                    $data = $_POST;
                    $esseresult = $article->where('rid='.$rid)->save($data);

                    //对结果进行判断
                    if($esseresult==1||$editarticleresult==1){

                        //当网点管理员修改自己发布的资源时,需要支行或省行管理员重洗审核
                        if($resourceadmininfo['0']['mrank']=='3'){
                            $article = D('resource');
                            $isaudit['isaudit'] = 2;
                            $changeisaudit = $article->where("rid={$rid}")->save($isaudit);
                        }
                        $this->success('修改文章成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>',U('article'));
                    }else{

                        $this->error('未作出任何修改');

                    }

                }

            }

        }

        //查询文章内容
        $raid = $_GET['id'];
        $contentsql = "select content from article where raid=".$raid;
        $article = D('article');
        $content = $article->query($contentsql);
        $articlelist['0']['content'] = $content['0']['content'];
        $this->assign('articlelist',$articlelist);
        $this->display();

    }
    
    
    //删除文章
    public function delarticle(){

        //删除文章表中的记录
        $delarticlecontent = D('article');
        $delarticlecontentresult = $delarticlecontent->where('raid='.$_GET['id'])->delete();

        //删除资源表中的记录
        $delarticle = D('resource');

        //获取图片路径并删除
        $pic = $delarticle->field('pic')->where('rid='.$_GET['id'])->find();
        unlink('./Public'.$pic['pic']);

        //删除资源表中的对应记录
        $delreturn = $delarticle->where('rid='.$_GET['id'])->delete();
        if($delreturn){
            $this->success('删除成功!',U('article'));
        }else{
            $this->error('删除失败!');
        }
        
    }

    
    //查看图文:文章标题,作者,发布时间,封面图片,点击量,内容
    public function seearticle(){

        $rid = $_GET['id'];
        $aid = $_GET['adminid'];
        $article = D('resource');
        $seearticlelist = $article
                        ->table('resource,article,admin')
                        ->where('admin.id='.$aid.' and resource.rid = article.raid and resource.rid='.$rid)
                        ->field('resource.title,admin.aname,article.addtime,resource.pic,article.hits,article.content')
                        ->find();
        $this->assign('seearticlelist',$seearticlelist);
        $this->display();

    }
    

    //推送资源
    public function pushresource(){
        //var_dump(I('get.resourceid'));
        //var_dump($_GET);
        if($_GET['resourceid']!=NULL){
            $_SESSION['xql']['pushresourceid'] = $_GET['resourceid'];
        }
        //var_dump($_SESSION);
        $adminmrank = $_SESSION['admin']['mrank'];
        $resourceadminid = $_GET['adminid'];
        $adminid = $_SESSION['admin']['id'];
        $isaudit = $_GET['isaudit'];
        //$resourceid = 
        //var_dump($adminmrank);
        //var_dump($resourceadminid);
        //var_dump($adminid);

        //将post传来的值插入点位图表
        if(IS_POST){
            //var_dump($_POST['wids']);
            //var_dump($_SESSION['xql']['pushresourceid']);
            $websiteid = array_multisort($_POST['wids']);
            $websiteid = $_POST['wids'];
            $websiteidcount = count($websiteid);
            $resourceid = $_SESSION['xql']['pushresourceid'];
            //var_dump($websiteid);
            for($i=0;$i<$websiteidcount;$i++){
                //echo '第'.$i.'次开始';
                $bitmapdata['websiteid'] = $websiteid[$i];
                $bitmapdata['resourceid'] = $resourceid;
                $bitmap = D('bitmap');
                $bitmapresult = $bitmap->add($bitmapdata);
                //var_dump($bitmapresult);
                //echo '第'.$i.'次结束<br><br><br>';
            }
            $this->success('推送成功<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>','slideshow',3);
            //die();
        }

        if($isaudit!='1'){
            $this->error('这个资源还没有通过审核,通过审核之后才能推送');
        }elseif(($adminmrank=='1'||$adminmrank=='2')&&$resourceadminid==$adminid){
            $masknum = $_SESSION['admin']['masknum'];
            $mcode = $_SESSION['admin']['admincode'];
            $mcodelen = strlen($mcode);
            $mcodelike = substr($mcode,0,$mcodelen-$masknum);
            $adminmrank = $_SESSION['admin']['mrank'];
            $adminid = $_SESSION['admin']['id'];
            $office = D('office');
            $officelist = $office->query("select * from office right join website on office.id = website.officeid where (mcode like '".$mcodelike."%') order by mcode");

            if(IS_POST){
                var_dump($_POST);
            }

            $this->assign('officelist',$officelist);
            //var_dump($officelist);

            //echo '开始你的表演';
        }else{
            $this->error('只能把自己发的资源推送给下级网点');
        }

        $this->display();
    }


}