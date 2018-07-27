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
						欢迎您,<?php echo ($_SESSION['admin']['mrank']); ?>级管理员<?php echo ($_SESSION['admin']['aname']); ?>.
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
                    <h1 class="page-header">添加管理员</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            添加管理员
                        </div>
                        <div class="panel-body">
							<div class="table-responsive">
							<form action="<?php echo U('aaadmin');?>" method="post" enctype="multipart/form-data">
							<table class="table table-striped table-bordered table-hover">							
								<tr>
									<td>管理员名</td>
									<td><input type="text" name='aname' class="form-control"></td>
								</tr>
								<tr>
									<td>密码</td>
									<td><input type="password" name='pass1' class="form-control"></td>
								</tr>
								<tr>
									<td>确认密码</td>
									<td><input type="password" name='pass2' class="form-control"></td>
								</tr>
                                <!-- <?php echo ($mrankhtml); ?> -->
                                <div id="addzhihangadmin">
                                    <tr>
                                        <td>添加支行管理员</td>
                                        <td>
                                            <select name='iszhihang' id='' class='form-control'>
                                                <option value=''>--如果想添加网点级管理员,请忽视此项--</option>
                                                <?php if(!empty($mcodefrontlist)): if(is_array($mcodefrontlist)): foreach($mcodefrontlist as $key=>$mcodefrontlistval): ?><option value='<?php echo ($mcodefrontlistval); ?>'><?php echo ($mcodefrontlistval); ?></option><?php endforeach; endif; ?>
                                                <?php else: ?>
                                                    <option value=''  disabled='disabled'>目前无可选支行</option><?php endif; ?>
                                            </select>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <td>添加网点管理员</td>
                                    <td>
                                        <select name="admincode" id="" class="form-control">
                                            <option value="">--如果想添加二级行管理员,请忽视此项--</option>
                                            <?php if(!empty($officelist)): ?><!-- <input type="hidden" name='oname' value="<?php echo ($officelistval["oname"]); ?>"> -->
                                                <?php if(is_array($officelist)): foreach($officelist as $key=>$officelistval): ?><option value="<?php echo ($officelistval["mcode"]); ?>"><?php echo ($officelistval["oname"]); ?></option><?php endforeach; endif; ?>
                                            <?php else: ?>
                                                <option value=""  disabled="disabled">目前无可选网点</option><?php endif; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>管理范围</td>
                                    <td><input type="text" name='mrange' class="form-control" placeholder="如果不填写,则默认为机构名称"></td>
                                </tr>
								<tr>
									<td colspan="2" align="center">
										<input type="submit" value="提交" class="btn btn-primary">
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