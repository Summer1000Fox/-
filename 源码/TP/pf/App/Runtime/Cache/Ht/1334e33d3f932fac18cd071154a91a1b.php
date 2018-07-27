<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录界面</title>
</head>
<body>

	个人金融后台登录
	<form action="<?php echo U('login/login');?>" method="post">
		用户名:<input type="text" name="aname">
		<br>
		密　码:<input type="password" name="pass">
		<br>
		验证码:<input type="text" name="authcode">
		<br>
		<img src="<?php echo U('/Ht/Login/yzm');?>" width="150" height="100"  onclick="this.src=this.src+'?i='+Math.random()" style="margin-top:3px; margin-left:; border-radius:10px;">
		<br>
		
		<?php if($_GET['state'] == 1): ?>两次输入密码不一致
		<?php elseif($_GET['state'] == 2): ?> 
			验证码错误
		<?php elseif($_GET['state'] == 3): ?> 
			用户名或密码错误
		<?php elseif($_GET['state'] == 4): ?> 
			密码修改成功,请使用新密码登录<?php endif; ?>

		<br>
		<input type="submit" value="登录">
	</form>
	
</body>
</html>