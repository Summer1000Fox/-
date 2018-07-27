<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>建设银行</title>

    <!-- Bootstrap Core CSS -->
    <link href="/TP/pf/Public/ht/format/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/TP/pf/Public/ht/format/css/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/TP/pf/Public/ht/format/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/TP/pf/Public/ht/format/css/font-awesome.css" rel="stylesheet" type="text/css">
	
	<style>
		textarea{margin:10px 0;}
		img{margin:10px 0; padding:5px; border:2px solid grey; border-radius:10px;}
	</style>
    
</head>

<body>

    <div id="wrapper"> 
		        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">辽宁建设银行个人金融微站管理系统</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
          <!-- /.dropdown -->
                <li class="dropdown">
					<a>
						欢迎您,
                        <?php if($Think['session']['admin']['mrank']=='1'): ?>省行
                        <elseif condition="$Think['session']['admin']['mrank']=='2'">
                            分(支)行
                        <elseif condition="$Think['session']['admin']['mrank']=='3'">
                            网点<?php endif; ?>
                            <!-- <?php echo ($_SESSION['admin']['mrank']); ?> -->
                        管理员<?php echo ($_SESSION['admin']['aname']); ?>.
					</a>
				</li>
				<!-- <li class="dropdown">
                    <a href="<?php echo U('/home');?>" class="bestrong"><i class="glyphicon glyphicon-home"></i> 前往首页</a>
                </li> -->
				<li class="dropdown">
					<a href="<?php echo U('login/logout');?>" class="bestrong"><i class="glyphicon glyphicon-log-out"></i> 注销</a>
				</li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						
						<!-- <li class="sidebar-search">
                                                    <div class="input-group custom-search-form">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                    </div>
                                                    /input-group
                                                </li> -->
						
						
                        <!--administrator pic-->
                        <li>
                            <a href="<?php echo U('#/#');?>"><i class="fa fa-users fa-fw"></i></i>管理员<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                     <a href="<?php echo U('Admin/adminlist');?>">管理员列表</a>
                                </li>
                                <li>
                                     <a href="<?php echo U('Admin/adminadd');?>">添加管理员</a>
                                </li>
                            </ul>
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-cutlery fa-fw"></i></i>网点<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Office/index');?>">网点列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Office/officeadd');?>">添加网点</a>
                                </li>
                                <!-- 
                                用于批量导入网点csv
                                <li>
                                    <a href="<?php echo U('Office/officecsv');?>">网点csv</a>
                                </li> -->

                            </ul>
                            <!-- /recipe supervise -->
                        </li>
						
						<li>
                            <a href="#"><i class="glyphicon glyphicon-piggy-bank fa-fw"></i></i>资源<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Resource/slideshow');?>">轮播图</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Resource/button');?>">按钮</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Resource/article');?>">文章</a>
                                </li>
                            </ul>
                            <!-- /recipe supervise -->
                        </li>
                          
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>  
        <!-- Navigation -->
		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">添加按钮</h1>
                    <span>(注意:按钮图片由于考虑微站整体美观性暂时不会显示自行上传的图片)<br><br></span>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            添加按钮
                        </div>
                        <div class="panel-body">
							<div class="table-responsive">
							<form action="<?php echo U('addbutton');?>" method="post" enctype="multipart/form-data">
							<table class="table table-striped table-bordered table-hover">							
								<tr>
                                    <td>按钮标题</td>
                                    <td><input type="text" name='title' tabIndex="1" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>url</td>
                                    <td><input type="text" name='url' tabIndex="2" class="form-control"></td>
                                </tr>
                                <tr>
									<td>图片</td>
									<td><input type="file" name='pic' tabIndex="3"  class="form-control" /></td>
								</tr>
								<tr>
									<td>优先级</td>
									<td><input type="input" name='priority' tabIndex="4" class="form-control"><br>省级管理员:1-10;支行管理员11-20;网点管理员21-99;</td>
								</tr>
                                <!-- <tr>
                                    <td>显示在哪个支行</td>
                                    <td>
                                        <input type="checkbox" name="week[]" id="week1" value="1" />周一
                                <input type="checkbox" name="week[]" id="week2" value="2"  />周二
                                <input type="checkbox" name="week[]" id="week3" value="3"  />周三
                                <input type="checkbox" name="week[]" id="week4" value="4"  />周四
                                <input type="checkbox" name="week[]" id="week5" value="5"  />周五
                                <input type="checkbox" name="week[]" id="week6" value="6"  />周六
                                <input type="checkbox" name="week[]" id="week0" value="0" />周日   
                                    </td>
                                </tr> -->
								<tr>
									<td colspan="2" align="center">
										<input type="submit" tabIndex="5" value="提交" class="btn btn-primary">
										<input type="reset" value="清空" class="btn btn-primary">
									</td>
								</tr>
							</table>
							</form>
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/TP/pf/Public/ht/format/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/TP/pf/Public/ht/format/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/TP/pf/Public/ht/format/js/metisMenu.js"></script>
 
    <!-- Custom Theme JavaScript -->
    <script src="/TP/pf/Public/ht/format/js/sb-admin-2.js"></script>


    <div class="copy-right_left">
        <div class="copy-right_img"><img src="http://image3.ccb.com/cn/home/v3/images/copy_right_img.gif"></div>
        <div class="copy-right_text"><span>© 版权所有中国建设银行</span><span>京ICP备13030780号</span> <span>京公网安备：110102000450</span> <br>
          <span>总行地址：中国北京西城区金融大街25号</span> <span>邮编：100033</span> <span>手机网站：m.ccb.com</span></div>
    </div>
</body>

</html>