<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title><?php echo ($officelist["oname"]); ?>的微站</title>
    <link href="/TP/pf/Public/qt/template/template9/css/mui.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/TP/pf/Public/qt/template/template9/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/TP/pf/Public/qt/template/template2/css/swiper.min.css" type="text/css">
    <script type="text/javascript"> 
        !function(J){function H(){var d=E.getBoundingClientRect().width;var e=(d/7.5>100*B?100*B:(d/7.5<42?42:d/7.5));E.style.fontSize=e+"px",J.rem=e}var G,F=J.document,E=F.documentElement,D=F.querySelector('meta[name="viewport"]'),B=0,A=0;if(D){var y=D.getAttribute("content").match(/initial-scale=([d.]+)/);y&&(A=parseFloat(y[1]),B=parseInt(1/A))}if(!B&&!A){var u=(J.navigator.appVersion.match(/android/gi),J.navigator.appVersion.match(/iphone/gi)),t=J.devicePixelRatio;B=u?t>=3&&(!B||B>=3)?3:t>=2&&(!B||B>=2)?2:1:1,A=1/B}if(E.setAttribute("data-dpr",B),!D){if(D=F.createElement("meta"),D.setAttribute("name","viewport"),D.setAttribute("content","initial-scale="+A+", maximum-scale="+A+", minimum-scale="+A+", user-scalable=no"),E.firstElementChild){E.firstElementChild.appendChild(D)}else{var s=F.createElement("div");s.appendChild(D),F.write(s.innerHTML)}}J.addEventListener("resize",function(){clearTimeout(G),G=setTimeout(H,300)},!1),J.addEventListener("pageshow",function(b){b.persisted&&(clearTimeout(G),G=setTimeout(H,300))},!1),H()}(window);
        if (typeof(M) == 'undefined' || !M){
            window.M = {};
        }
    </script>
    <style>
    	.swiper-container {
        width: 100%;        
    }
    .swiper-slide {
        font-size: 18px;
        width:100%;
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
    .swiper-slide a{display:block;width:100%;}
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
    </style>
</head>
<body>
<div class="swiper-container">
        <div class="swiper-wrapper">
			<?php if(isset($slideshowlist[0][title])): ?><div class="swiper-slide"><a href="<?php echo ($slideshowlist["0"]["url"]); ?>"><img src="/TP/pf/Public<?php echo ($slideshowlist["0"]["pic"]); ?>"></a><p><?php echo ($slideshowlist["0"]["title"]); ?></p></div><?php endif; ?>
			<?php if(isset($slideshowlist[1][title])): ?><div class="swiper-slide"><a href="<?php echo ($slideshowlist["1"]["url"]); ?>"><img src="/TP/pf/Public<?php echo ($slideshowlist["1"]["pic"]); ?>"></a><p><?php echo ($slideshowlist["1"]["title"]); ?></p></div><?php endif; ?>
			<?php if(isset($slideshowlist[2][title])): ?><div class="swiper-slide"><a href="<?php echo ($slideshowlist["2"]["url"]); ?>"><img src="/TP/pf/Public<?php echo ($slideshowlist["2"]["pic"]); ?>"></a><p><?php echo ($slideshowlist["2"]["title"]); ?></p></div><?php endif; ?>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
    </div>	
<div class="mui-content">
		  <!--图片轮播-->
	
		<!--导航-->
		<ul class="nav">

			<?php if(isset($buttonlist[0][title])): ?><li>
				<a href="<?php echo ($buttonlist["0"]["url"]); ?>">
					<img src="/TP/pf/Public/qt/template/template1/images/c1.png" />
					<p><?php echo ($buttonlist["0"]["title"]); ?></p>
				</a>
			</li><?php endif; ?>

			<?php if(isset($buttonlist[1][title])): ?><li>
				<a href="<?php echo ($buttonlist["1"]["url"]); ?>">
					<img src="/TP/pf/Public/qt/template/template1/images/c2.png" />
					<p><?php echo ($buttonlist["1"]["title"]); ?></p>
				</a>
			</li><?php endif; ?>

			<?php if(isset($buttonlist[2][title])): ?><li>
				<a href="<?php echo ($buttonlist["2"]["url"]); ?>">
					<img src="/TP/pf/Public/qt/template/template1/images/c3.png" />
					<p><?php echo ($buttonlist["2"]["title"]); ?></p>
				</a>
			</li><?php endif; ?>

			<?php if(isset($buttonlist[3][title])): ?><li>
				<a href="<?php echo ($buttonlist["3"]["url"]); ?>">
					<img src="/TP/pf/Public/qt/template/template1/images/c4.png" />
					<p><?php echo ($buttonlist["3"]["title"]); ?></p>
				</a>
			</li><?php endif; ?>

			<?php if(isset($buttonlist[4][title])): ?><li>
				<a href="<?php echo ($buttonlist["4"]["url"]); ?>">
					<img src="/TP/pf/Public/qt/template/template1/images/c5.png" />
					<p><?php echo ($buttonlist["4"]["title"]); ?></p>
				</a>
			</li><?php endif; ?>

			<?php if(isset($buttonlist[5][title])): ?><li>
				<a href="<?php echo ($buttonlist["5"]["url"]); ?>">
					<img src="/TP/pf/Public/qt/template/template1/images/c6.png" />
					<p><?php echo ($buttonlist["5"]["title"]); ?></p>
				</a>
			</li><?php endif; ?>

			<?php if(isset($buttonlist[6][title])): ?><li>
				<a href="<?php echo ($buttonlist["6"]["url"]); ?>">
					<img src="/TP/pf/Public/qt/template/template1/images/c7.png" />
					<p><?php echo ($buttonlist["6"]["title"]); ?></p>
				</a>
			</li><?php endif; ?>

			
			<?php if(isset($buttonlist[7][title])): ?><li>
					<a href="<?php echo ($buttonlist["7"]["url"]); ?>">
						<img src="/TP/pf/Public/qt/template/template1/images/c1.png" />
						<p><?php echo ($buttonlist["7"]["title"]); ?></p>
					</a>
				</li><?php endif; ?>
            <!-- <li>
				<a href="javascript:;">
					<img src="/TP/pf/Public/qt/template/template9/images/icon.png" />
					<p>测评</p>
				</a>
			</li>
			<li>
				<a href="special.html">
					<img src="/TP/pf/Public/qt/template/template9/images/icon.png" />
					<p>专题</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<img src="/TP/pf/Public/qt/template/template9/images/icon.png" />
					<p>排行榜</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<img src="/TP/pf/Public/qt/template/template9/images/icon.png" />
					<p>类别</p>
				</a>
			</li> -->
		</ul>

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

	</div>
    <script type="text/javascript" src="/TP/pf/Public/qt/template/template9/js/jquery-1.10.1.min.js" ></script>
	<script src="/TP/pf/Public/qt/template/template2/js/swiper.min.js"></script>
    
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
	<title>模板9</title>
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