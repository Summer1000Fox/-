<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>初次修改密码</title>
<style>
html,body{padding:0;margin:0;height:100%;}
body{width:100%;height:100%;background:url(/TP/pf/Public/ht/images/login_bg.jpg) no-repeat center center;background-size:100% 100%;font-size:12px;color:#4F4F4F;font-family:"MicroSoft YaHei","lucida grande",tahoma,verdana,arial,sans-serif;word-wrap:break-word;min-width:1190px;}
ul,li{list-style:none;vertical-align:top;}
a{color:#369DFA;text-decoration:none;cursor:pointer;/*-webkit-transition:0.2s ease-in 0s;-moz-transition:0.2s ease-in 0s;-ms-transition:0.2s ease-in 0s;-o-transition:0.2s ease-in 0s;transition:0.2s ease-in 0s;*/}
a:hover{text-decoration:none;}
img{border:none;vertical-align:top;}
input,textarea,button{font-size:12px;outline:none;padding:0;margin:0;font-family:"MicroSoft YaHei","lucida grande",tahoma,verdana,arial,sans-serif;}
textarea{resize:none;}
p,img,ul,li,form,dl,dd,dt{padding:0;margin:0;}
h1{padding:0;margin:0;padding:60px 0;text-align:center;font-size:36px;color:#fff;}
.cf:before,.cf:after{content:"";display:table;} 
.cf:after{clear:both;}
.cf{*zoom:1;}


.lay_box{width:400px;margin:20px auto;}

.p_box{height:60px;}
.p_box span{display:block;height:40px;line-height:40px;float:left;width:100px;color:#fff;font-size:16px;}
.p_box input{height:40px;line-height:40px;width:300px;float:left;border-radius:4px;border:0 none;color:#7F92B0;text-indent:20px;}

.f_btn{padding:30px 0 36px 0;height:58px;}
.f_btn input{color:#fff;display:block;overflow:hidden;background:#6DCF7F;line-height:58px;height:58px;width:200px;text-align:center;border-radius:100px;font-size:22px;border:0;outline: none;}
.f_btn input:hover{background:#3FBE55;}



.wrong_tips{border-radius:3px;margin-top:10px;background:url(../images/tips_ico.png) #fdf8df no-repeat 6px center;line-height:18px;padding:5px 10px 5px 30px;color:#f60;}

</style>
</head>
<body>

	<h1>由于您是第一次使用本系统,为了规避风险,需要您亲自修改一次密码.</h1>
	<div class="lay_box">
		<form action="<?php echo U('login/repasscl');?>" method="post">
			<div class="p_box cf">
				<span>密　　码:</span>
				<input type="password" name="pass1">
			</div>
			<div class="p_box cf">
				<span>重复输入:</span>
				<input type="password" name="pass2">
			</div>
			
			<?php if($_GET['state'] == 1): ?><div class="wrong_tips">两次输入密码不一致</div>
			<?php else: endif; ?>
			<div class="f_btn">
				<input type="submit" value="修改密码">
			</div>
		</form>
	</div>
</body>
</html>