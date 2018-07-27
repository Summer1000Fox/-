<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo ($officelist["oname"]); ?>的微站</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="/TP/pf/Public/qt/template/template2/css/swiper.min.css" type="text/css">

    <!-- Demo styles -->
    <style>
    html, body {
        position: relative;
        height:100%;
    }
	a{text-decoration:none;}
    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
    }
	ul,li{list-style:none;margin:0;padding:0;}
    .swiper-container {
        width: 100%;        
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
		position:relative;
    }
	.swiper-slide img{width:100%;height:100%;}
	.swiper_con{width:100%;background:#3e4b7a;}
	.swiper_con ul{padding:10px 0;}
	.swiper_con ul li{width:33.333%;float:left;text-align: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;}
	.swiper_con ul li img{width:59px;height:59px;}
	.swiper_con ul li a{display:block;margin:8px 0 0 0;}
	.swiper_con ul li span{display:block;color:#fff;}
	.swiper-slide p{position:absolute;bottom:10px;left:50%;width:200px;margin-left:-100px;text-align:center;}
	.close_box{position:fixed;right:10px;bottom:100px;width:50px;height:50px;}
	.close_box a{display:block;color:#fff;background:#2cb2ff;width:100%;height:100%;text-align:center;line-height:25px;}
	
	.add_box{width:100%;padding:10px 0;background:#186b68;}
	.add_box ul{width:94%;margin:0 auto;}
	.add_box ul li{padding:5px 0 5px 20px; border-bottom:1px solid #ddd;background:url(/TP/pf/Public/qt/template/template2/images/bg_icon.png) no-repeat left 8px;background-size:14px 14px;padding-left:20px;font-size:14px;color:#fff;}
    </style>
</head>
<body>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="<?php echo ($slideshowlist["0"]["url"]); ?>"><img src="/TP/pf/Public<?php echo ($slideshowlist["0"]["pic"]); ?>"></a><p><?php echo ($slideshowlist["0"]["title"]); ?></p></div>
            <div class="swiper-slide"><a href="<?php echo ($slideshowlist["1"]["url"]); ?>"><img src="/TP/pf/Public<?php echo ($slideshowlist["1"]["pic"]); ?>"></a><p><?php echo ($slideshowlist["1"]["title"]); ?></p></div>
            <div class="swiper-slide"><a href="<?php echo ($slideshowlist["2"]["url"]); ?>"><img src="/TP/pf/Public<?php echo ($slideshowlist["2"]["pic"]); ?>"></a><p><?php echo ($slideshowlist["2"]["title"]); ?></p></div>
            <div class="swiper-slide"><a href="<?php echo ($slideshowlist["3"]["url"]); ?>"><img src="/TP/pf/Public<?php echo ($slideshowlist["3"]["pic"]); ?>"></a><p><?php echo ($slideshowlist["3"]["title"]); ?></p></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
    </div>
	<div class="swiper_con">
    	<ul class="cf">
        	<li>
            	<a href="<?php echo ($buttonlist["0"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico1.png">
                    <span><?php echo ($buttonlist["0"]["title"]); ?></span>
                </a>
            </li>
            <li>
            	<a href="<?php echo ($buttonlist["1"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico2.png">
                    <span><?php echo ($buttonlist["1"]["title"]); ?></span>
                </a>
            </li>
            <li>
            	<a href="<?php echo ($buttonlist["2"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico1.png">
                    <span><?php echo ($buttonlist["2"]["title"]); ?></span>
                </a>
            </li>
            <li>
            	<a href="<?php echo ($buttonlist["3"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico1.png">
                    <span><?php echo ($buttonlist["3"]["title"]); ?></span>
                </a>
            </li>
            <li>
            	<a href="<?php echo ($buttonlist["4"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico1.png">
                    <span><?php echo ($buttonlist["4"]["title"]); ?></span>
                </a>
            </li>
            <li>
            	<a href="<?php echo ($buttonlist["5"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico1.png">
                    <span><?php echo ($buttonlist["5"]["title"]); ?></span>
                </a>
            </li>
            <li>
            	<a href="<?php echo ($buttonlist["6"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico1.png">
                    <span><?php echo ($buttonlist["6"]["title"]); ?></span>
                </a>
            </li>
            <li>
            	<a href="<?php echo ($buttonlist["7"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico1.png">
                    <span><?php echo ($buttonlist["7"]["title"]); ?></span>
                </a>
            </li>
            <li>
            	<a href="<?php echo ($buttonlist["8"]["url"]); ?>">
                	<img src="/TP/pf/Public/qt/template/template2/images/ico1.png">
                    <span><?php echo ($buttonlist["8"]["title"]); ?></span>
                </a>
            </li>
        </ul>
    </div>
	<div class="close_box">
		<a href="<?php echo U('deldata');?>" class="close_btn">解除<br>绑定</a>
	</div>
	
	<div class="add_box">
    	<ul>
        	<li>城市地区：<?php echo ($officelist["place"]); ?></li>
            <li>机构名称：<?php echo ($officelist["oname"]); ?></li>
            <li>电话：<?php echo ($officelist["phone"]); ?></li>
            <li>地址：<?php echo ($officelist["address"]); ?></li>
            <li>邮编：<?php echo ($officelist["postalcode"]); ?></li>
        </ul>
    </div>
	
    
	
    <!-- Swiper JS -->
    <script src="/TP/pf/Public/qt/template/template2/js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 5500,
        autoplayDisableOnInteraction: false
    });
    </script>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>模板2</title>
</head>
<body>

<a href="<?php echo U('deldata');?>">解除绑定</a>

	网点信息<hr>
	<br>城市地区:<?php echo ($officelist["place"]); ?>
	<br>机构名称:<?php echo ($officelist["oname"]); ?>
	<br>电话:<?php echo ($officelist["phone"]); ?>
	<br>地址:<?php echo ($officelist["address"]); ?>
	<br>邮政编码:<?php echo ($officelist["postalcode"]); ?>
	<hr>
	轮播图1名字:<?php echo ($slideshowlist["0"]["title"]); ?>
	轮播图1图片:<img src="/TP/pf/Public<?php echo ($slideshowlist["0"]["pic"]); ?>" width="120" height="50">
	轮播图1跳转连接:<?php echo ($slideshowlist["0"]["url"]); ?>
	<hr>
	轮播图2名字:<?php echo ($slideshowlist["1"]["title"]); ?>
	轮播图2图片:<img src="/TP/pf/Public<?php echo ($slideshowlist["1"]["pic"]); ?>" width="120" height="50">
	轮播图2跳转连接:<?php echo ($slideshowlist["1"]["url"]); ?>
	<hr>
	轮播图3名字:<?php echo ($slideshowlist["2"]["title"]); ?>
	轮播图3图片:<img src="/TP/pf/Public<?php echo ($slideshowlist["2"]["pic"]); ?>" width="120" height="50">
	轮播图3跳转连接:<?php echo ($slideshowlist["2"]["url"]); ?>
	<hr>
	轮播图4名字:<?php echo ($slideshowlist["3"]["title"]); ?>
	轮播图4图片:<img src="/TP/pf/Public<?php echo ($slideshowlist["3"]["pic"]); ?>" width="120" height="50">
	轮播图4跳转连接:<?php echo ($slideshowlist["3"]["url"]); ?>

	<hr>
	<hr>
	<hr>
	按钮1名字:<?php echo ($buttonlist["0"]["title"]); ?>
	按钮1跳转连接:<?php echo ($buttonlist["0"]["url"]); ?>
	<hr>
	按钮2名字:<?php echo ($buttonlist["1"]["title"]); ?>
	按钮2跳转连接:<?php echo ($buttonlist["1"]["url"]); ?>
	<hr>
	按钮3名字:<?php echo ($buttonlist["2"]["title"]); ?>
	按钮3跳转连接:<?php echo ($buttonlist["2"]["url"]); ?>
	<hr>
	按钮4名字:<?php echo ($buttonlist["3"]["title"]); ?>
	按钮4跳转连接:<?php echo ($buttonlist["3"]["url"]); ?>
	<hr>
	按钮5名字:<?php echo ($buttonlist["4"]["title"]); ?>
	按钮5跳转连接:<?php echo ($buttonlist["4"]["url"]); ?>
	<hr>
	按钮6名字:<?php echo ($buttonlist["5"]["title"]); ?>
	按钮6跳转连接:<?php echo ($buttonlist["5"]["url"]); ?>
	<hr>
	按钮7名字:<?php echo ($buttonlist["6"]["title"]); ?>
	按钮7跳转连接:<?php echo ($buttonlist["6"]["url"]); ?>
	<hr>
	按钮8名字:<?php echo ($buttonlist["7"]["title"]); ?>
	按钮8跳转连接:<?php echo ($buttonlist["7"]["url"]); ?>
</body>
</html> -->