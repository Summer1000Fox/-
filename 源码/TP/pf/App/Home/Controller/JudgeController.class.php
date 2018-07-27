<?php
//前台选择控制器
namespace Home\Controller;
use Think\Controller;
//namespace Home\Controller;
//use Com\Wechat;
//use Com\WechatAuth;
//use Com\WechatCrpt;
/*echo 111111111;
$weixin = new Wechat1111111('PhOZmzpHk2OkOeDGeEPAGGkhd2dKdD0E');
var_dump($weixin);
$weixindata = $weixin->request();*/
class JudgeController extends Controller {

	//获得客户信息
    public function getinfo(){
        //echo 99999;
        //import('Com.Wechat');
        
        //echo 444444444;
        
        
        //echo 222;
        //$weixindata = $weixin->request();
        //echo 7777777;
        //echo "啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊";
        //var_dump($weixindata);
        //echo "哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦";
          //die();
        //这里模拟用户的openid
        //$clientopenid = "taocicheng1111";
        $clientopenid = $_SESSION['clientopenid'];

        //echo 111111111;
        $client = D('client');
        $clientresult = $client->where("openid='{$clientopenid}'")->find();
        //var_dump($clientresult);
        //$_SESSION['client'] = $clientinfo;
        if($clientresult==NULL){
        	$this->redirect('Judge/selectoffice');
        }


        $_SESSION['client'] = $clientresult;
        //$this->display();
    }

    public function selectoffice(){
        //echo "2017-5-232017年5月23日15:50:07";
        //var_dump($_GET['xqlopenid']);
        //var_dump("1111");
    	$office = D('office');
    	$client = D('client');
    	//var_dump($_SESSION);
    	/*//用于测试
            $website = D('website');
            $a = $website->query("select * from website where officeid=2056");
            var_dump($a);
        //用于测试结束*/
    	if(IS_GET){
    		//var_dump($_GET);
    		$oname = $_GET['oname'];
    		$officelist = $office->query("select * from office,website where website.officeid = office.id and oname like '%".$oname."%'");
    	}

    	if(IS_POST){
    		//var_dump($_POST['websitid']);
    		$clientdata['websiteid'] = $_POST['websiteid'];
    		//var_dump($_SESSION['clientipenid']);
    		$clientdata['openid'] = $_SESSION['clientopenid'];
    		//var_dump($_SESSION['clientipenid']);
    		//var_dump($clientdata);
    		$clientaddresult = $client->add($clientdata);
    		//var_dump($clientaddresult);
    		$clientinfo = $client->find($clientaddresult);
    		//var_dump($clientinfo);
    		if($clientinfo['id']!=NULL){
    			$_SESSION['client'] = $clientinfo;
    			//var_dump($_SESSION);
    		}
    		$this->redirect('Index/index');
    	}

    	//var_dump($officelist);
    	$this->assign('officelist',$officelist);
    	$this->display();
    }

}