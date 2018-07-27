<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>建设银行个人金融管理系统</title>
</head>
<body>
	建设银行个人金融管理系统
	<br>
	欢迎您!<?php echo ($_SESSION['admin']['mrank']); ?>级管理员<?php echo ($_SESSION['admin']['aname']); ?>
	<?php
 var_dump($_SESSION); ?>
	<a href="<?php echo U('login/logout');?>">注销</a>
</body>
</html>