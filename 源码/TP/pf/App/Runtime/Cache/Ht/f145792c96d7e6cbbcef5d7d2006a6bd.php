<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个金</title>
<script src="/TP/pf/Public/ht/js/jquery-1.7.2.min.js"></script>
<script>
$(function(){
    $(".tx_login").focus(function () {
        $(this).hide();
        $(".password_login").show().focus();
    })
    $(".password_login").blur(function () {
        if ($(this).val()=="") {
            $(this).hide();
            $(".tx_login").show();
        }
    })
    
});
</script> 
<style>
html,body{padding:0;margin:0;height:100%;}
body{background:#f5f5f5;font-size:12px;color:#4F4F4F;font-family:"MicroSoft YaHei","lucida grande",tahoma,verdana,arial,sans-serif;word-wrap:break-word;}
ul,li{list-style:none;vertical-align:top;}
a{color:#369DFA;text-decoration:none;cursor:pointer;/*-webkit-transition:0.2s ease-in 0s;-moz-transition:0.2s ease-in 0s;-ms-transition:0.2s ease-in 0s;-o-transition:0.2s ease-in 0s;transition:0.2s ease-in 0s;*/}
a:hover{text-decoration:none;}
img{border:none;vertical-align:top;}
input,textarea,button{font-size:12px;outline:none;padding:0;margin:0;font-family:"MicroSoft YaHei","lucida grande",tahoma,verdana,arial,sans-serif;}
textarea{resize:none;}
p,img,ul,li,form,dl,dd,dt{padding:0;margin:0;}
h1,h2,h3,h4,h5{padding:0;margin:0;}
h5{font-size:11px;padding:0;margin:0;}
.cf:before,.cf:after{content:"";display:table;} 
.cf:after{clear:both;}
.cf{*zoom:1;}
.login_body{width:100%;height:100%;background:url(/TP/pf/Public/ht/images/login_bg.jpg) no-repeat center center;background-size:100% 100%;}
.login_box{min-width:1190px;width:100%;height:100%;border-collapse:collapse}
.login_box .layout{vertical-align:middle;padding:0}
.login_box .center{text-align:left;position:relative;_width:360px;min-width:360px;max-width:360px;padding:0 0 0 484px;background:url(/TP/pf/Public/ht/images/xiranwenhua.png) no-repeat left 50px;}
.login_box .center .wrong_tips{border-radius:3px;margin-top:10px;background:url(../images/tips_ico.png) #fdf8df no-repeat 6px center;line-height:18px;padding:5px 10px 5px 30px;color:#f60;}
.login_box .center .topform{padding:0;width:360px;}
.login_box .center .topform_list{width:360px;height:60px;padding-bottom:6px;}
.login_box .center .topform_list_box{background:#F3F7FB;height:32px;padding:14px 0 14px 20px;border-radius:3px;position:relative;}
.login_box .center .topform_list_box .c_inp{width:270px;float:left;height:32px;}
.login_box .center .topform_list_box .c_inp input{background:none;width:100%;border:0 none;height:32px;line-height:32px;font-size:16px;color:#7F92B0;}
.login_box .center .topform_list_box .c_inp input.act{width:180px;}
.login_box .center .topform_list_box .user_ico{position:absolute;width:20px;height:20px;overflow:hidden;background:url(../images/login_account.png) no-repeat center center;right:14px;top:20px;}
.login_box .center .topform_list_box .password_ico{position:absolute;width:20px;height:20px;overflow:hidden;background:url(../images/login_cipher.png) no-repeat center center;right:14px;top:20px;}
.login_box .center .topform_list_box .act_img{position:absolute;left:188px;top:14px;width:80px;height:32px;}
.login_box .center .topform_list_box .act_img img{width:100%;height:100%;}
.login_box .center .topform_list_box .act_refresh{position:absolute;height:32px;right:16px;top:14px;overflow:hidden;line-height:32px;overflow:hidden;}
.login_box .center .topform_list_box .act_refresh a{font-size:14px;color:#7F92B0;}
.login_box .center .forget{float:right;color:#fff;font-size:14px;}
.login_box .center .forget a{color:#fff;text-decoration:underline;}
.login_box .center .rember{padding-top:30px;height:22px;line-height:22px;color:#fff;font-size:14px;}
.login_box .center .rember .checksel{float:left;}
.login_box .center .login_btn{padding:30px 0 36px 0;height:58px;}
.login_box .center .login_btn input{color:#fff;display:block;overflow:hidden;background:#6DCF7F;line-height:58px;height:58px;width:200px;text-align:center;border-radius:100px;font-size:22px;border:0;outline: none;}
.login_box .center .login_btn input:hover{background:#3FBE55;}

</style>
</head>

<body class="login_body">

<table border="0" cellspacing="0" cellpadding="0" class="login_box">
    <form action="<?php echo U('login/login');?>" method="post">
    <tr>
        <td class="layout" align="center">
        	<div class="center">
            	<div class="topform">
                	<div class="topform_list">
                    	<div class="topform_list_box">
                            <div class="c_inp">
                                <input type="text" onblur="if(this.value == '' ) this.value='账号：';" onfocus="if(this.value == '账号：' ) this.value='';" name="aname" value="账号：" />
                            </div>
                            <div class="user_ico"></div>
                        </div>
                    </div>
                    <div class="topform_list">
                    	<div class="topform_list_box">
                            <div class="c_inp">
                                <input class="tx_login" type="text" value="密码：" />
                                <input class="password_login" style="display:none;" type="password" maxlength="20" name="pass"  />
                            </div>
                            <div class="password_ico"></div>
                        </div>
                    </div>
                    <div class="topform_list">
                    	<div class="topform_list_box">
                            <div class="c_inp"><input type="text" class="act" onblur="if(this.value == '' ) this.value='验证码：';" onfocus="if(this.value == '验证码：' ) this.value='';" name="authcode" value="验证码：" /></div>
                            <div class="act_img"><img src="<?php echo U('/Ht/Login/yzm');?>" onclick="this.src=this.src+'?i='+Math.random()"/></div>
                            <div class="act_refresh"><a href="" onclick="this.src=this.src+'?i='+Math.random()">换一张</a></div>
                        </div>
                    </div>
                </div> 
                
                <?php if($_GET['state'] == 1): ?><div class="wrong_tips">两次输入密码不一致</div>
                <?php elseif($_GET['state'] == 2): ?> 
                    <div class="wrong_tips">验证码错误</div>
                <?php elseif($_GET['state'] == 3): ?> 
                    <div class="wrong_tips">用户名或密码错误</div>
                <?php elseif($_GET['state'] == 4): ?> 
                    <div class="wrong_tips">密码修改成功,请使用新密码登录</div><?php endif; ?>
                
                <!-- <div class="rember">
                	<div class="checksel">
                    	<input type="checkbox" id="rember_me" /><label for="rember_me">记住登录状态</label>
                    </div>
                    <div class="forget">忘记密码？<a href="javascript:;" onclick="WinPop.Open('find_password')">点击找回</a></div>
                </div> -->
                <div class="login_btn"><input type="submit" value="登 录"></div>
                <!-- <div class="btm_line">
                	<div class="phone">热线：4000-098-911</div>
                    <div class="cont">
                    	<ul class="cf">
                        	<li><a href="javascript:;" class="sina"></a></li>
                            <li class="appdown">
                            	<a href="javascript:;" class="app"></a>
                                <div class="layer">
                                	<div class="layer_pic">
                                		<img src="images/tmp/code_img.jpg" />
                                    </div>
                                    <div class="layer_text">
                                    	<p>微信扫描二维码</p>
                                        <p>下载万家客APP</p>
                                    </div>
                                </div>
                            </li>
                            <li><a href="javascript:;" class="qq">在线客服</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </td>
    </tr>
    </form>
</table>

</body>