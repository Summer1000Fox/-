<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>资源列表</title>

    <!-- Bootstrap Core CSS -->
    <link href="/TP/pf/Public/ht/format/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/TP/pf/Public/ht/format/css/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/TP/pf/Public/ht/format/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/TP/pf/Public/ht/format/css/font-awesome.css" rel="stylesheet" type="text/css">

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
        <form id="form_search" method="post" action="<?php echo U(pushresource);?>">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">选择需要展示该资源的支行</h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            已创建微站的网点列表
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr class="h">
                                        <td>选择</td>
                                        <td>ID</td>
                                    </tr>
                                    <?php if(!empty($officelist)): if(is_array($officelist)): foreach($officelist as $key=>$officelist): ?><tr>
                                                <td><input type="checkbox" name="wids[]" value="<?php echo ($officelist["wid"]); ?>"  class="form-control"/></td>
                                                <td><?php echo ($officelist["oname"]); ?></td>
                                            </tr><?php endforeach; endif; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8">没有数据</td>
                                        </tr><?php endif; ?>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <input type="submit" value="推送资源" class="btn btn-primary" />
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </form>
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