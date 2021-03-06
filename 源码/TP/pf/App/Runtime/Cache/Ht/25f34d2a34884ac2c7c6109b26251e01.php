<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>◆草莓微甜◆|后台</title>

    <!-- Bootstrap Core CSS -->
    <link href="/QHKJ/pf/Public/ht/format/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/QHKJ/pf/Public/ht/format/css/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/QHKJ/pf/Public/ht/format/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/QHKJ/pf/Public/ht/format/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		textarea{margin:10px 0; }
		img{margin:10px 0; border:2px solid grey; border-radius:5px;}
		.first,.end,.num,.prev,.next,.current{   
			position: relative;
			float: left;
			padding: 6px 12px;
			line-height: 1.42857143;
			color: #337ab7;
			text-decoration: none;
			background-color: #fff;
			border: 1px solid #ddd;
			margin-left:-1px;
		}
		.first{
			border-top-left-radius: 4px;
			border-bottom-left-radius: 4px
		}
		.end{
			border-top-right-radius: 4px;
			border-bottom-right-radius: 4px
		}
		.num{
		    z-index: 2;
			cursor: default;
		}
		.current{
			background-color: #337ab7;
			color: #fff;
			border-color: #337ab7;
		}
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
                <a class="navbar-brand" href="index.html">建设银行个人金融管理系统</a>
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
					<a href="<?php echo U('login/logout');?>" class="bestrong"><i class="glyphicon glyphicon-log-out"></i> 退出后台</a>
				</li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						
						<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						
						
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
                            <a href="#"><i class="fa fa-cutlery fa-fw"></i></i>微站<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('goods/index');?>">微站列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('goods/add');?>">添加微站</a>
                                </li>
                            </ul>
                            <!-- /recipe supervise -->
                        </li>
						
						<li>
                            <a href="#"><i class="glyphicon glyphicon-piggy-bank fa-fw"></i></i>文章<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('type/index');?>">文章列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('type/add');?>">添加文章</a>
                                </li>
                            </ul>
                            <!-- /recipe supervise -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-apple fa-fw"></i></i>网点<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('material/index');?>">网点信息</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('material/add');?>">修改信息</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i></i>预留<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('manager/index');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('manager/index_user');?>">预留</a>
                                </li>
								<li>
                                    <a href="<?php echo U('manager/index_hot');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('reply/index');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('reply/index_user');?>">预留</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>

						   <li>
                            <a href="#"><i class="glyphicon glyphicon-star fa-fw"></i></i>预留<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Cang/manager');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Cang/Zhen');?>">预留</a>
                                </li>
                                 <li>
                                    <a href="<?php echo U('Cang/goods');?>">预留</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>
						
						   <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i></i>预留<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Zhen/index');?>">预留</a>
                                </li>
								<li>
                                    <a href="<?php echo U('ping/index');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('orders/index');?>">预留</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-align-left fa-fw"></i></i>预留<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('lunbo/index');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('link/index');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Rizhi/index');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Advert/index');?>">预留</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>
						<li>
                            <a href="#"><i class="glyphicon glyphicon-comment fa-fw"></i>预留<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('notice/index');?>">预留</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('notice/write');?>">预留</a>
                                </li>
                            </ul>
						</li>
						
                        <li>
                            <a href="<?php echo U('supervise/message/index');?>"><i class="fa fa-envelope fa-fw"></i>预留</a>
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
                    <h1 class="page-header">用户管理</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            用户列表
                        </div>
                        <div class="panel-body">
							<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<tr>
									<td colspan="16"><a href="<?php echo U(add);?>">添加用户</a></td>
								</tr>
								<tr class="h">
									<td>id：</td>
									<td>用户名：</td>
									<td>姓名：</td>
									<td>年龄：</td>
									<td>性别：</td>
									<td>手机号：</td>
									<td>生日：</td>
									<td>民族：</td>
									<td>所在地：</td>
									<td>QQ：</td>
									<td>个人签名：</td>
									<td>头像：</td>
									<td>email：</td>
									<td>状态：</td>
									<td>注册时间：</td>
									<td>action:</td>									
								</tr>
								
								<?php if(!empty($list)): if(is_array($list)): foreach($list as $key=>$val): ?><tr>
									<td><?php echo ($val["id"]); ?></td>
									<td><?php echo ($val["username"]); ?></td>
									<td><?php echo ($val["name"]); ?></td>
									<td><?php echo ($val["age"]); ?></td>
									<td><?php echo ($val["sex"]); ?></td>
									<td><?php echo ($val["phone"]); ?></td>
									<td><?php echo ($val["bath"]); ?></td>
									<td><?php echo ($val["nation"]); ?></td>
									<td><?php echo ($val["city"]); ?></td>
									<td><?php echo ($val["qq"]); ?></td>
									<td><?php echo ($val["descr"]); ?></td>
									<td><img src="/QHKJ/pf/Public<?php echo ($val["headpath"]); echo ($val["head"]); ?>"  width="50" height="50"></td>
									<td><?php echo ($val["email"]); ?></td>
									<td><?php echo ($val["state"]); ?></td>
									<td><?php echo ($val["date"]); ?></td>
									
									<td>
										
										<a href="<?php echo U('update',array('id'=>$val[id]));?>" >[修改状态]</a>
										<a href="<?php echo U('del',array('id'=>$val[id]));?>" >[删除]</a>
									</td>
								</tr><?php endforeach; endif; ?>
								<?php else: ?>
								<tr>
									<td colspan="16">没有数据</td>
								</tr><?php endif; ?>
								<tr>
									<td colspan="16">
										
										<?php echo ($pageButton); ?>
									</td>
								</tr>
							</table>
							</div>
							<div class="well">
								<div class="head"><span>搜索用户</span></div>
								<div class="main">
									<form id="form_search" method="get" action="<?php echo U(index);?>">
										<table class="table">
											<tr>
												<td>
													<input type="text" name="username"  placeholder="用户名字" class="form-control" />
												</td>
												<td>
													<input type="submit" value="搜索用户名" class="btn btn-primary" />
												</td>
											</tr>
										</table>
									</form>
								</div>
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
    <script src="/QHKJ/pf/Public/ht/format/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/QHKJ/pf/Public/ht/format/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/QHKJ/pf/Public/ht/format/js/metisMenu.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/QHKJ/pf/Public/ht/format/js/sb-admin-2.js"></script>
	
	<script language="javascript">
		function do_search()
		{
			var obj = document.getElementById("form_search");
			site = obj.action.lastIndexOf("/");
			str = obj.action.substr(site,obj.action.length - site);
			obj.action = obj.action.substr(0,site) + '/field-' + obj.field.value + '/key-' + obj.key.value + str;
			obj.submit();
		}
	</script>
</body>

</html>