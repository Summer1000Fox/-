<?php
//后台网点控制器
namespace Ht\Controller;
use Think\Controller;
class OfficeController extends CommonController {


    //网点查询分权展示
    public function index(){

        //接收数据,准备分权所需变量
        $masknum = $_SESSION['admin']['masknum'];
        $mcode = $_SESSION['admin']['admincode'];
        $mcodelen = strlen($mcode);
        $mcodelike = substr($mcode,0,$mcodelen-$masknum);
        $adminmrank = $_SESSION['admin']['mrank'];
        $adminid = $_SESSION['admin']['id'];
        $office = D('office');

        //条件搜索
        if($_GET['oname']){
            $oname = '%'.$_GET['oname'].'%';
            $map = " AND oname like '".$oname."' ";
        }

        //分页相关
        $count = $office->query("SELECT COUNT(*) AS tp_count FROM office left join website on office.id = website.officeid where (mcode like '".$mcodelike."%')".$map); 
        $count = $count['0']['tp_count'];
        $page = new \Think\Page($count,10);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $p = $_GET['p'];
        $pp = ($p-1)*10;
        if($pp == '-10'){
            $pp = 1;
        }

        //好使的sql
        $officelist = $office->query("select * from office left join website on office.id = website.officeid where (mcode like '".$mcodelike."%')".$map." order by mcode limit ".$pp.",10");

        //当存在搜索条件时,有limit会boom
        if($_GET['oname']){
            $officelist = $office->query("select * from office left join website on office.id = website.officeid where (mcode like '".$mcodelike."%')".$map." order by mcode ");
        }else{

        }
        if($_SESSION['admin']['mrank']=='3'){
            $officelist = $office->query("select * from office left join website on office.id = website.officeid where (mcode like '".$mcodelike."%')");
        }
        foreach($officelist as &$row){
            $row['zhihang'] = substr($row['mcode'],0,4);
        }

        $pageButton = $page->show();
        $this->assign('officelist',$officelist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }


    //查询并展示网点信息
    public function editinfo(){
        $info = D('office');
        $id = $_GET['id'];
        $info = $info->where('id='.$id)->select();
        $this->assign('oinfolist',$info);
        $this->display();
    }


    //编辑网点信息
    public function oinfochange(){
        $id = $_POST['id'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];
        $data['postalcode'] = $_POST['postalcode'];
        $office = D('office');
        $result = $office->where('id='.$id)->save($data);
        if($result==1){
            $this->success('成功修改信息', 'index');
        }else{
            $this->error('未修改任何信息');
        }
    }


    //创建微站展示模板
    public function createwebsite(){

        $_SESSION['xql']['website']['officeid'] = $_GET['id'];
        $officeid = $_GET['id'];

        //选择模板后传来模板id来执行一系列操作来以创建微站
        if($_GET['templateid']!=NULL){
            $websitedata['templateid'] = $_GET['templateid'];
            $websitedata['officeid'] = $_GET['officeid'];
            $website = D('website');
            $template = D('template');
            $bitmap = D('bitmap');
            $maxwid = $website->query("select max(wid)+1 as wid from website");
            $websitedata['wid'] = intval($maxwid['0']['wid']);
            $wid = $websitedata['wid'];
            $tid = $websitedata['templateid'];
            if ($wid!=NULL) {
                $_SESSION['createwebsite']['wid'] = $wid;
            }

            //在website表中插入记录
            $websiteresult = $website->add($websitedata);
            $websiteurl = "服务器地址/wid/".$websitedata['wid'];
            $urldata['url'] = $websiteurl;
            $websiteurlresult = $website->where('wid='.$wid)->save($urldata);
            $this->redirect('Office/selectresource', array('tid' => $tid), 0, '正在加载选择资源的页面...');

            //获得用户选择模板的按钮数和轮播图数
            $templateinfo = $template->where('id='.$tid)->find();
            $bnum = $templateinfo['buttonnum'];
            $snum = $templateinfo['slideshownum'];

            //在bitmap中循环插入数据
            for($bi=1;$bi<$bnum+1;$bi++){
                //echo '执行第'.$bi.'次开始'.'<br>';
                //var_dump($wid);
                //echo '执行第'.$bi.'次结束'.'<br><br>';
            }
            
        }

        //实例化模板表并
        $template = D('template');
        $templatelist = $template->select();

        //传送数据
        $this->assign('officeid',$officeid);
        $this->assign('templatelist',$templatelist);

        //显示 创建 微站 选择 模板create website select template
        $this->display('cwst');
    }


    //创建微站选择资源
    public function selectresource(){
        
        //实例化需要用到的对象
        $website = D('website');
        $template = D('template');
        $bitmap = D('bitmap');
        $resource = D('resource');

        //获得用户选择模板的按钮数和轮播图数
        if($_GET['tid']!=NULL){
            $_SESSION['xql']['createwebsite']['tid']=$_GET['tid'];
        }
        if($_GET['tid']==NULL){
            $_GET['tid']=$_SESSION['xql']['createwebsite']['tid'];
        }
        $tid = $_GET['tid'];
        $templateinfo = $template->where('id='.$tid)->find();
        $bnum = $templateinfo['buttonnum'];
        $snum = $templateinfo['slideshownum'];
        $selectinfo = 'Hi,这套模板需要您选择'.$snum.'张轮播图,'.$bnum.'个按钮.';

        //准备分权展示管理员所需要的变量
        $masknum = $_SESSION['admin']['masknum'];
        $admincode = $_SESSION['admin']['admincode'];
        $admincodelen = strlen($admincode);
        $adminlike = substr($admincode,0,$admincodelen-$masknum);
        $adminmrank = $_SESSION['admin']['mrank'];
        $adminid = $_SESSION['admin']['id'];

        //查询这个管理员有权利使用的轮播图
        $slideshowlist = $resource
                    ->join("left join admin on resource.rcode = admin.admincode")
                    ->where("(resource.type=2) and(resource.isaudit=1) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                    ->group('resource.rid')
                    ->order('resource.priority asc')
                    ->select();

        //查询这个管理员有权利使用的按钮
        $buttonlist = $resource
                    ->join("left join admin on resource.rcode = admin.admincode")
                    ->where("(resource.type=1) and(resource.isaudit=1) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                    ->group('resource.rid')
                    ->order('resource.priority asc')
                    ->select();

        //在bitmap中循环插入数据
        if(IS_POST){
            $snuminfo = count($_POST['rids']);
            $bnuminfo = count($_POST['ridb']);

            //对提交条件进行限制
            if($snuminfo<$snum){
                $this->error('请最少选择'.$snum.'张轮播图');
            }
            if($bnuminfo<$bnum){
                $this->error('请最少选择'.$bnum.'个按钮');
            }

            //接收传来的资源id
            $resourceidlist[] = array_merge($_POST['rids'],$_POST['ridb']);
            $resourceidlist = $resourceidlist['0'];
            $resourceidcount = count($resourceidlist);
            $wid = $_SESSION['createwebsite']['wid'];

            //在点位表中用循环加入数据
            for($i=1;$i<$resourceidcount+1;$i++){
                $bitmapdata['websiteid'] = $wid;
                $bitmapdata['resourceid'] = $resourceidlist[$i-1];
                $bitmapresult = $bitmap->add($bitmapdata);
            }

            $this->redirect('Office/index');

        }

        $this->assign('selectinfo',$selectinfo);
        $this->assign('slideshowlist',$slideshowlist);
        $this->assign('buttonlist',$buttonlist);
        $this->display();

    }
    
}