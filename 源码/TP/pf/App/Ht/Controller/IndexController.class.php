<?php
//后台首页控制器
namespace Ht\Controller;
use Think\Controller;
class IndexController extends CommonController {

    //显示后台首页模板
    public function index(){

        //销毁刚才用户换密码的全局变量
        unset($_SESSION['xql']['huanmimaid']);
        $this->display();
        
    }

}