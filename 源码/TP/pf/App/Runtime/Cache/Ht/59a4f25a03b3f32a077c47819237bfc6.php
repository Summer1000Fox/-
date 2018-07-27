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
    <link href="/QHKJ/pf/Public/format/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/QHKJ/pf/Public/format/css/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/QHKJ/pf/Public/format/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/QHKJ/pf/Public/format/css/font-awesome.css" rel="stylesheet" type="text/css">
	
	<style>
		textarea{margin:10px 0;}
		img{margin:10px 0; padding:5px; border:2px solid grey; border-radius:10px;}
	</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                            修改用户权限
                        </div>
                        <div class="panel-body">
							<div class="table-responsive">
							<form action="<?php echo U('update');?>" method="post">
							<input type="hidden" name='id' value='<?php echo ($info["id"]); ?>'>	
							<table class="table table-striped table-bordered table-hover">
								

								<tr>
									<td>状态</td>
									<td>
									<input type="radio" name='state' value="0" <?php echo ($info['state']==0?'checked':''); ?>>普通用户
									<input type="radio" name='state' value="1" <?php echo ($info['state']==1?'checked':''); ?>>后台管理员
									<input type="radio" name='state' value="4" <?php echo ($info['state']==4?'checked':''); ?>>禁用用户权限
							
									</td>
									
									
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
    <script src="/QHKJ/pf/Public/format/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/QHKJ/pf/Public/format/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/QHKJ/pf/Public/format/js/metisMenu.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/QHKJ/pf/Public/format/js/sb-admin-2.js"></script>
		
	<script language="javascript">
	function set_static(type,val)
	{
		ajax("post","?/deal/dir-basic/","cmd=set_"+type+"_static&val="+val,
		function(data)
		{
			if(data == 1) result();
		});
	}
	var create_static_interval;
	function create_static(val)
	{
		ajax("post","?/deal/dir-basic/","cmd=static_check",
		function(data)
		{
			if(data == 1)
			{
				set_create_static_cookie();
				document.getElementById("static_status").style.display = "block";
				create_static_interval = setInterval("create_static_ajax(" + val + ")",1500);			
			}else{
				alert("必须开启半静态才能生成页面，\n若要生成纯静态页面，\n必须同时开启半静态和纯静态");
			}
		});
	
	}
	function create_static_ajax(val)
	{
		ajax("post","?/deal/dir-basic/","cmd=create_static&val=" + val,
		function(data)
		{
			var step = get_cookie("create_static_step");
			var sum = Math.floor(get_cookie("create_static_sum"));
			var created = Math.floor(get_cookie("create_static_created"));
			if(step == "count"){
				document.getElementById("bar_sum").innerHTML = sum;
				if(val == 1)
				{
					document.cookie = "create_static_step=goods_sheet_page";
				}else{
					document.cookie = "create_static_step=goods_page";
				}
			}else{
				var bar_width = Math.floor(created / sum * 100) + "%";
				document.getElementById("bar_percent").innerHTML = bar_width;
				document.getElementById("bar_inside").style.width = bar_width;
				document.getElementById("bar_created").innerHTML = created;
			}
			if(step == "end")
			{
				document.getElementById("bar_percent").innerHTML = "100%";
				document.getElementById("bar_inside").style.width = "100%";
				set_create_static_cookie();
				clearInterval(create_static_interval);
				result();
			}
		});	
	}
	function set_create_static_cookie()
	{
		document.cookie = "create_static_step=count";
		document.cookie = "create_static_created=0";
		document.cookie = "create_static_id=0";
		document.cookie = "create_static_cat=0";
		document.cookie = "create_static_page=0";
	}
	function clear_static()
	{
		type = document.getElementById("clear_file_type").value;
		if(type != "")
		{
			ajax("post","?/deal/dir-basic/","cmd=clear_static&type=" + type,
			function(data)
			{
				if(data == 1) result();
			});
		}
	}
	</script>

	</body>

</html>