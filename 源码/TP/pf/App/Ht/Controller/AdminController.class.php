<?php
//后台管理员控制器
namespace Ht\Controller;
use Think\Controller;
class AdminController extends CommonController {

    //用户最开始进入后台
    public function index(){

    	//显示后台首页模板
        $this->display();
        
    }


    //管理员查询展示
    public function adminlist(){
        
        //准备分权展示管理员所需要的变量
        $masknum = $_SESSION['admin']['masknum'];
        $admincode = $_SESSION['admin']['admincode'];
        $admincodelen = strlen($admincode);
        $adminlike = substr($admincode,0,$admincodelen-$masknum);
        $adminmrank = $_SESSION['admin']['mrank'];
        $adminid = $_SESSION['admin']['id'];
        
        //判断是页面是否提交搜索条件并写入$map
        if(!empty($_GET['adminname'])){
            $map['aname']=array('like',"%{$_GET['adminname']}%");
        }

        //实例化admin表
        $admin = D('admin');

        //分页相关
        $count = $admin->where($map)->where("(admincode like '".$adminlike."%' and mrank!='".$adminmrank."') or id=".$adminid)->count();
        $page = new \Think\Page($count,10);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        
        //拼装查询语句
        $adminlist = $admin
                    ->where($map)
                    ->where("(admincode like '".$adminlike."%' and mrank!='".$adminmrank."') or id=".$adminid)
                    ->limit($page->firstRow.','.$page->listRows)
                    ->order('masknum DESC')
                    ->select();

        //加工结果数据
        foreach($adminlist as &$adminrow){
            if($adminrow['mrank']=='1'){
                $adminrow['mrank']='<div style="color:#F00"><b>省级</b></div>';
            }elseif($adminrow['mrank']=='2'){
                $adminrow['mrank']='<b>支行</b>';
            }elseif($adminrow['mrank']=='3'){
                $adminrow['mrank']='网点';
            }
        }

        //对模板页传输数据并展示
        $pageButton = $page->show();
        $this->assign('adminlist',$adminlist);
        $this->assign('pageButton',$pageButton);
        $this->display('Admin/index');
        
    }


    //显示添加管理员的界面
    public function adminadd(){
        if($_SESSION['admin']['mrank']=='1'){
            
            //把可以选择支行还是网点的html传到模板页面
            $this->assign('mrankhtml',$mrankhtml);

            //省行想添加支行管理员
            //实例化office表
            $office = D('office');

            //得到所有网点的管理码并进行加工(获得前4位,去除重复,重新排序)
            $getmcodelist = $office->query('select mcode from office');
            foreach($getmcodelist as &$mcodeval){
                $mcodelist[] = substr($mcodeval['mcode'],0,4);
            }
            $mcodelist = array_merge(array_unique($mcodelist));

            //把支行级的特征码传送到模板
            $this->assign('mcodefrontlist',$mcodelist);

            //获取所有网点的管理码和名字并传送到模板
            $getofficelist = $office->query('select mcode, oname from office');
            $this->assign('officelist',$getofficelist);

        }elseif($_SESSION['admin']['mrank']=='2'){
            
            //支行想添加网点管理员
            $admincode = $_SESSION['admin']['admincode'];
            $masknum = $_SESSION['admin']['masknum'];
            $admincodelen = strlen($admincode);
            $adminfront = substr($admincode,0,$admincodelen-$masknum);
            $office = D('office');
            $officelist = $office
                        ->field('mcode,oname')
                        ->where("(mcode like '".$adminfront."%' ) ")
                        ->select();
            $this->assign('officelist',$officelist);

        }else{

            //网点管理员不能添加管理员
            $this->error('权限不足');
        }

        //显示添加管理员的模板
        $this->display('Admin/add');

    }


    //添加管理员的执行代码(admin表的add      admin)
    public function aaadmin(){

        //添加管理员的条件过滤
        if($_POST['pass1']!=$_POST['pass2']){
            $this->error('两次密码不一样');
        }elseif($_POST['pass1']==NULL){
            $this->error('密码不能为空');
        }elseif($_POST['iszhihang']!=NULL && $_POST['admincode']!=NULL){
            $this->error('网点管理员和支行管理员不能同时添加<br>如果想添加网点管理员,请把添加支行管理员选项<br>选中为--不添加支行管理员--<br>如果想添加支行管理员,请把添加网点管理员选项<br>选中为--不添加网点管理员--','adminadd',30);
        }else{

            //添加网点管理员
            if($_POST['iszhihang']==NULL){

                //获得相关条件
                $admindata['admincode'] = $_POST['admincode'];
                $admindata['masknum']='0';
                $admindata['mrank']='3';

                //如果没填写管理范围,则获取对应的机构名称,否则写入post.mrange传来的信息
                if(empty($_POST['mrange'])){
                    $getoname = D('office');
                    $oname = $getoname->query('select oname from office where mcode='.$admindata['admincode']);
                    $admindata['mrange'] = $oname['0']['oname'];
                }else{
                    $admindata['mrange'] = $_POST['mrange'];
                }
            
            //省级管理员添加支行管理员
            }else{

                //准备支行管理员的相关信息
                $admindata['admincode'] = $_POST['iszhihang'].'00000';
                $admindata['masknum']='5';
                $admindata['mrank']='2';
                $admindata['mrange'] = $_POST['mrange'];

            }

            //准备支行管理员和网点管理员的共有信息
            $admindata['aname'] = $_POST['aname'];
            $admindata['pass'] = $_POST['pass1'];
            $admindata['isfirst'] = '1';
            $admindata['atime'] = time();

            //实例化管理员表并插入数据
            $addadmin = D('admin');
            $addadminresult = $addadmin->add($admindata);

            //对结果进行判断并引导至相应页面
            ($addadminresult!=false)?($this->success("操作成功,插入的id是$addadminresult", 'adminadd')):($this->error('已存在相同的管理员名,插入失败,换个管理员名试试'));
            
        }
        
    }


    //显示修改密码的模板
    public function adminchangepass(){

        $_SESSION['xql']['admin']['changepassid'] = $_GET['id'];
        $this->display('Admin/changepass');

    }


    //修改密码(admin表的change    pass)
    public function acpass(){

        if($_POST['pass1']!=$_POST['pass2']){
            $this->error('两次密码不一样');
        }elseif($_POST['pass1']==NULL){
            $this->error('密码不能为空');
        }else{
            $admincp = D('admin');
            $admincpdata['pass'] = $_POST['pass1'];
            $adminpresult = $admincp
                            ->where('id='.$_SESSION['xql']['admin']['changepassid'])
                            ->save($admincpdata);
            ($adminpresult!=0)?($this->success('成功修改密码', 'adminlist')):($this->error('新密码不能与原密码相同'));
        }

    }
    

}