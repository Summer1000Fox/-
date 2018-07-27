<?php
//后台登录控制器
namespace Ht\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$this->display();
    }

    //验证码函数
	public function yzm(){
		$config =    array(    
			'fontSize'    =>    30,    // 验证码字体大小    
			'length'      =>    3,     // 验证码位数
			'useNoise'    =>    false, // 关闭验证码杂点
			'bg'		  =>	array(rand(190,255),rand(190,255),rand(190,255)),
			'useCurve'	  =>	false
		);
		$Verify =  new \Think\Verify($config);
		$Verify->entry();
	}


    //登录
    public function login(){
    	$verify = new \Think\Verify();
		if(!$verify->check(I('post.authcode'))){
			redirect(U('/Ht/login/index/state/2'));
		}
		$login = D('admin');
		$map['aname'] = I('post.aname');
		$map['pass'] = I('post.pass');
		$result = $login->where($map)->find();
		$_SESSION['xql']['huanmimaid'] = $result['id'];
		if(empty($result)){
			redirect(U('/Ht/login/index/state/3'));
		}elseif($result['isfirst']=='1'){
			redirect(U('/Ht/login/repass'));
		}else{
			session('admin',$result);
			redirect(U('/Ht/index/index'));
		}
    }


    //显示第一次修改密码的页面
    public function repass(){
    	$this->display();
    }


    //开始处理第一次修改密码的请求
    public function repasscl(){
    	if($_POST['pass1']!=$_POST['pass2']){
    		redirect(U('/Ht/login/repass/state/1'));
    	}else{
    		$admin = D('admin');
    		$data['pass'] = $_POST['pass2'];
    		$data['isfirst'] = 2;
    		$id = $_SESSION['xql']['huanmimaid'];
    		$reply = $admin->where("id=$id")->save($data);
    		session('admin',NULL);
    		session('xql',NULL);
    		$this->display('Login/index');
    	}
    }


    //管理员注销
    public function logout(){
		session('admin',null);
		$this->redirect('index/index');
	}


	//xiranwenhua???
	public function xr2333xr33xrxrxr333xr22(){
		$this->display('Login/xr2333xr33xrxrxr333xr22');
	}

}