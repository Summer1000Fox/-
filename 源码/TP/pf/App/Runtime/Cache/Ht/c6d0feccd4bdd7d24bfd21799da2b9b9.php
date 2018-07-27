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
	    <link href="/TP/pf/Public/ht/format/css/bootstrap.css" rel="stylesheet">

	    <!-- MetisMenu CSS -->
	    <link href="/TP/pf/Public/ht/format/css/metisMenu.css" rel="stylesheet">

	    <!-- Timeline CSS -->
	    <link href="/TP/pf/Public/ht/format/css/timeline.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="/TP/pf/Public/ht/format/css/sb-admin-2.css" rel="stylesheet">

	    <!-- Morris Charts CSS -->
	    <link href="/TP/pf/Public/ht/format/css/morris.css" rel="stylesheet">

	    <!-- Custom Fonts -->
	    <link href="/TP/pf/Public/ht/format/css/font-awesome.css" rel="stylesheet" type="text/css">

	    <link href="/TP/pf/Public/ht/format/css/longcaidan.css" media="screen, projection" rel="stylesheet" type="text/css">

		
	    <!-- jQuery -->
	    <script src="/TP/pf/Public/ht/format/js/jquery.js"></script>
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
	        <!-- <div id="page-wrapper">
	            <div class="row">
	                <div class="col-lg-12">
	                    <h1 class="page-header">What are you looking at?您瞅啥?</h1>
	                </div>
	            </div>
	            <div id="wrap" class="clearfix" style="margin-top:500px;">
	                <div id="smash" style="bottom: px;">
	                    <div class="skull" style="cursor: pointer;">
	                        <div class="eyes">
	                            <img alt="Eyes01" class="pupils" src="/TP/pf/Public/ht/img/eyes.png" style="left: 29px; top: 6px;">
	                            <img alt="Hilites02" class="hilites" src="/TP/pf/Public/ht/img/hilites.png" style="left: 20px; top: 10px;">
	                        </div>
	                        <img alt="Face04" class="face" src="/TP/pf/Public/ht/img/face.png">
	                    </div>
	                </div>
	            </div>
	        </div> -->
	     </div>
	    <script src="/TP/pf/Public/ht/format/js/bootstrap.js"></script>
	    <script src="/TP/pf/Public/ht/format/js/metisMenu.js"></script>
	    <script src="/TP/pf/Public/ht/format/js/sb-admin-2.js"></script>
	</body>
</html>