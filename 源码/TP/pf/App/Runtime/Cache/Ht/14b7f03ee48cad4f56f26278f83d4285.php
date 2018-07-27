<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>建设银行个人金融管理系统</title>

    <!-- Bootstrap Core CSS -->
    <link href="/QHKJ/pf/Public/ht/format/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/QHKJ/pf/Public/ht/format/css/metisMenu.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/QHKJ/pf/Public/ht/format/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/QHKJ/pf/Public/ht/format/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/QHKJ/pf/Public/ht/format/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/QHKJ/pf/Public/ht/format/css/font-awesome.css" rel="stylesheet" type="text/css">

    <link href="/QHKJ/pf/Public/ht/format/css/longcaidan.css" media="screen, projection" rel="stylesheet" type="text/css">

	
    <!-- jQuery -->
    <script src="/QHKJ/pf/Public/ht/format/js/jquery.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<script type="text/javascript">
jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,t,n,r,i){return jQuery.easing[jQuery.easing.def](e,t,n,r,i)},easeInQuad:function(e,t,n,r,i){return r*(t/=i)*t+n},easeOutQuad:function(e,t,n,r,i){return-r*(t/=i)*(t-2)+n},easeInOutQuad:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t+n:-r/2*(--t*(t-2)-1)+n},easeInCubic:function(e,t,n,r,i){return r*(t/=i)*t*t+n},easeOutCubic:function(e,t,n,r,i){return r*((t=t/i-1)*t*t+1)+n},easeInOutCubic:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t+n:r/2*((t-=2)*t*t+2)+n},easeInQuart:function(e,t,n,r,i){return r*(t/=i)*t*t*t+n},easeOutQuart:function(e,t,n,r,i){return-r*((t=t/i-1)*t*t*t-1)+n},easeInOutQuart:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t*t+n:-r/2*((t-=2)*t*t*t-2)+n},easeInQuint:function(e,t,n,r,i){return r*(t/=i)*t*t*t*t+n},easeOutQuint:function(e,t,n,r,i){return r*((t=t/i-1)*t*t*t*t+1)+n},easeInOutQuint:function(e,t,n,r,i){return(t/=i/2)<1?r/2*t*t*t*t*t+n:r/2*((t-=2)*t*t*t*t+2)+n},easeInSine:function(e,t,n,r,i){return-r*Math.cos(t/i*(Math.PI/2))+r+n},easeOutSine:function(e,t,n,r,i){return r*Math.sin(t/i*(Math.PI/2))+n},easeInOutSine:function(e,t,n,r,i){return-r/2*(Math.cos(Math.PI*t/i)-1)+n},easeInExpo:function(e,t,n,r,i){return t==0?n:r*Math.pow(2,10*(t/i-1))+n},easeOutExpo:function(e,t,n,r,i){return t==i?n+r:r*(-Math.pow(2,-10*t/i)+1)+n},easeInOutExpo:function(e,t,n,r,i){return t==0?n:t==i?n+r:(t/=i/2)<1?r/2*Math.pow(2,10*(t-1))+n:r/2*(-Math.pow(2,-10*--t)+2)+n},easeInCirc:function(e,t,n,r,i){return-r*(Math.sqrt(1-(t/=i)*t)-1)+n},easeOutCirc:function(e,t,n,r,i){return r*Math.sqrt(1-(t=t/i-1)*t)+n},easeInOutCirc:function(e,t,n,r,i){return(t/=i/2)<1?-r/2*(Math.sqrt(1-t*t)-1)+n:r/2*(Math.sqrt(1-(t-=2)*t)+1)+n},easeInElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i)==1)return n+r;o||(o=i*.3);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return-(u*Math.pow(2,10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o))+n},easeOutElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i)==1)return n+r;o||(o=i*.3);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return u*Math.pow(2,-10*t)*Math.sin((t*i-s)*2*Math.PI/o)+r+n},easeInOutElastic:function(e,t,n,r,i){var s=1.70158,o=0,u=r;if(t==0)return n;if((t/=i/2)==2)return n+r;o||(o=i*.3*1.5);if(u<Math.abs(r)){u=r;var s=o/4}else var s=o/(2*Math.PI)*Math.asin(r/u);return t<1?-0.5*u*Math.pow(2,10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o)+n:u*Math.pow(2,-10*(t-=1))*Math.sin((t*i-s)*2*Math.PI/o)*.5+r+n},easeInBack:function(e,t,n,r,i,s){return s==undefined&&(s=1.70158),r*(t/=i)*t*((s+1)*t-s)+n},easeOutBack:function(e,t,n,r,i,s){return s==undefined&&(s=1.70158),r*((t=t/i-1)*t*((s+1)*t+s)+1)+n},easeInOutBack:function(e,t,n,r,i,s){return s==undefined&&(s=1.70158),(t/=i/2)<1?r/2*t*t*(((s*=1.525)+1)*t-s)+n:r/2*((t-=2)*t*(((s*=1.525)+1)*t+s)+2)+n},easeInBounce:function(e,t,n,r,i){return r-jQuery.easing.easeOutBounce(e,i-t,0,r,i)+n},easeOutBounce:function(e,t,n,r,i){return(t/=i)<1/2.75?r*7.5625*t*t+n:t<2/2.75?r*(7.5625*(t-=1.5/2.75)*t+.75)+n:t<2.5/2.75?r*(7.5625*(t-=2.25/2.75)*t+.9375)+n:r*(7.5625*(t-=2.625/2.75)*t+.984375)+n},easeInOutBounce:function(e,t,n,r,i){return t<i/2?jQuery.easing.easeInBounce(e,t*2,0,r,i)*.5+n:jQuery.easing.easeOutBounce(e,t*2-i,0,r,i)*.5+r*.5+n}});

$(function() {
    function n() {
        t.w = $(window).width(),
        t.h = $(window).height()
    }

    $(window).bind("load",function() {
        window.scrollTo(0, 1)
    }),
    $("#smash").css("bottom", -50);
    var e = 0,
    t = {};
    n(),
    $(window).resize(function() {
        n()
    }),
    $(window).load(function() {
        $("#smash").animate({
            bottom: -135
        },
        500, "easeOutQuart")
    });
    
    
    var r = {
        e: $("#smash .pupils")
    };
    r.x = parseInt(r.e.css("left")),

    r.y = parseInt(r.e.css("top"));
    var i = {
        e: $("#smash .hilites")
    };
    i.x = parseInt($("#smash .hilites").css("left")),
    i.y = parseInt($("#smash .hilites").css("top")),
    $(document).mousemove(function(e) {
        var n = {
            x: e.pageX / t.w * 2 - 1,
            y: e.pageY / t.h * 2 - 1
        };
        r.moveX = parseInt(n.x * 28 + r.x),
        r.moveY = parseInt(n.y * 25 + r.y),
        i.moveX = parseInt(n.x * 7 + i.x),
        i.moveY = parseInt(n.y * 6 + i.y),
        r.e.css({
            left: r.moveX,
            top: r.moveY
        }),
        i.e.css({
            left: i.moveX,
            top: i.moveY
        })
    });
    var s = "swing",
    o = 5;
    $(".skull").css("cursor", "pointer").click(function(t) {
        var n = t.shiftKey ? 800 : 100;
        e <= o ? $("#smash").animate({
            left: -50,
            bottom: -60
        },
        n, s).animate({
            left: 50,
            bottom: -15
        },
        n, s).animate({
            left: -50
        },
        n, s).animate({
            left: 50,
            bottom: -60
        },
        n, s).animate({
            left: 0,
            bottom: -135
        },
        n, s) : e > o && $("#smash").animate({
            bottom: -420
        },
        500, s),
        e == o && $(this).append('<a href=""/>'),
        e++
    })
});
</script>


   
</head>

<body class="error_page">

    <div id="wrapper">

        <!-- Navigation -->
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
                            <a href="<?php echo U('user/index');?>"><i class="fa fa-users fa-fw"></i></i>账号管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                     <a href="<?php echo U('user/index');?>">账号列表</a>
                                </li>
                                <li>
                                     <a href="<?php echo U('user/add');?>">添加账号</a>
                                </li>
                            </ul>
                            <!-- /user supervise -->
                        </li>

                        <li>
                            <a href="<?php echo U('Ad/index');?>"><i class="fa fa-user fa-fw"></i></i>管理员管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                     <a href="<?php echo U('Ad/index');?>">管理员账号列表</a>
                                </li>
                                <li>
                                     <a href="<?php echo U('Ad/add');?>">添加管理员</a>
                                </li>
                            </ul>
                            <!-- /user supervise -->
                    
						
						<li>
                            <a href="#"><i class="fa fa-cutlery fa-fw"></i></i>食谱管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('goods/index');?>">官方食谱列表</a>
                                </li>
                               
                                <li>
                                    <a href="<?php echo U('goods/add');?>">官方添加食谱</a>
                                </li> 
                                <li>
                                    <a href="<?php echo U('goods/index_user');?>">用户食谱列表及审核</a>
                                </li>
                            </ul>
                            <!-- /recipe supervise -->
                        </li>
						
						<li>
                            <a href="#"><i class="glyphicon glyphicon-piggy-bank fa-fw"></i></i>菜系管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('type/index');?>">菜系列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('type/add');?>">添加菜系</a>
                                </li>
                            </ul>
                            <!-- /recipe supervise -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-apple fa-fw"></i></i>食材管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('material/index');?>">食材列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('material/add');?>">添加食材</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i></i>话题管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('manager/index');?>">官方帖子列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('manager/index_user');?>">用户帖子列表</a>
                                </li>
								<li>
                                    <a href="<?php echo U('manager/index_hot');?>">热门帖子列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('reply/index');?>">官方回复帖子列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('reply/index_user');?>">用户回复帖子列表</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>

						   <li>
                            <a href="#"><i class="glyphicon glyphicon-star fa-fw"></i></i>用户收藏管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Cang/manager');?>">收藏话题帖子</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Cang/Zhen');?>">收藏珍选商品</a>
                                </li>
                                 <li>
                                    <a href="<?php echo U('Cang/goods');?>">收藏菜谱信息</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>
						
						   <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i></i>珍选管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Zhen/index');?>">珍选商品列表</a>
                                </li>
								<li>
                                    <a href="<?php echo U('ping/index');?>">买家评论列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('orders/index');?>">订单列表及修改</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-align-left fa-fw"></i></i>拓展管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('lunbo/index');?>">轮播图及广告位</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('link/index');?>">友情链接</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Rizhi/index');?>">用户日志</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Advert/index');?>">官方公告</a>
                                </li>
                            </ul>
                            <!-- /. manage -->
                        </li>
						<li>
                            <a href="#"><i class="glyphicon glyphicon-comment fa-fw"></i>站内通知<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('notice/index');?>">通知列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('notice/write');?>">群发通知</a>
                                </li>
                            </ul>
						</li>
						
                        <li>
                            <a href="<?php echo U('supervise/message/index');?>"><i class="fa fa-envelope fa-fw"></i>群发站内信</a>
                        </li>
                          
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
      

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">What's your see?你瞅啥?</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <!--  <div class="row"> -->
            <div id="wrap" class="clearfix" style="margin-top:500px;">
                <div id="smash" style="bottom: px;">
                    <div class="skull" style="cursor: pointer;">
                        <div class="eyes">
                            <img alt="Eyes01" class="pupils" src="/QHKJ/pf/Public/ht/img/eyes.png" style="left: 29px; top: 6px;">
                            <img alt="Hilites02" class="hilites" src="/QHKJ/pf/Public/ht/img/hilites.png" style="left: 20px; top: 10px;">
                        </div>
                        <img alt="Face04" class="face" src="/QHKJ/pf/Public/ht/img/face.png">
                    </div>
                </div>
            </div> 

        </div>
        <!-- /#page-wrapper -->

     </div>
    <!-- /#wrapper -->


    <!-- Bootstrap Core JavaScript -->
    <script src="/QHKJ/pf/Public/ht/format/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/QHKJ/pf/Public/ht/format/js/metisMenu.js"></script>
 
    <!-- Custom Theme JavaScript -->
    <script src="/QHKJ/pf/Public/ht/format/js/sb-admin-2.js"></script>

	
	
    <!-- Page-Level Demo Scripts - Tables - Use for reference >	
	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script-->
</body>

</html>