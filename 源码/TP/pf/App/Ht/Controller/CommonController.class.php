<?php
//后台公共控制器
//header("Content-type: text/html; charset=utf8"); 
namespace Ht\Controller;
use Think\Controller;
//header("Content-type: text/html; charset=utf-8"); 
class CommonController extends Controller {

//header("Content-type: text/html; charset=utf8"); 
	//自动加载,用于检测当前用户是否登录
    public function _initialize(){
    	//header("Content-type: text/html; charset=utf-8"); 
        if(empty($_SESSION['admin'])){
			$this->redirect('Login/index');
        }
    }


}