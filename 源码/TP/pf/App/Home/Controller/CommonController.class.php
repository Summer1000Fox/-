<?php
namespace Home\Controller;
use Think\Controller;
//use Com\Wechat;
class CommonController extends Controller {


	//自动加载,用于检测当前用户是否登录
    public function _initialize(){
        //$token = "PhOZmzpHk2OkOeDGeEPAGGkhd2dKdD0E";
        //echo "344444444";
        //$weixin = new Wechat($token);
      
        /* 获取请求信息 */
        //$data = $weixin->request();
        /* 响应当前请求 */
        //$weixin->response($content, $type);
        //echo "结束你的表演<br>";
        if(empty($_SESSION['client'])){
            //echo "34444444455555";
            if($_GET['xqlopenid']){
                $_SESSION['clientopenid'] = $_GET['xqlopenid'];
            }
            var_dump($_GET);
            echo "<br><br>";
            var_dump($_SESSION);
            //die;
			$this->redirect('Judge/getinfo');

        }

    }


}