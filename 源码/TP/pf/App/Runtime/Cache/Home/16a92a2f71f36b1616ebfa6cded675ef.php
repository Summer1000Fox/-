<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
<meta name="format-detection" content="telephone=no" />
<title>选择网点</title>
<style>
html,body{width:100%;margin:0;padding:0;}
.wrap{width:90%;margin:0 auto;}
h1{margin:0;padding:0;font-size:18px;text-align:center;padding:10px 0;}
ul,li{list-style:none;margin:0;padding:0;}
.cf:before,.cf:after{content:"";display:table;} 
.cf:after{clear:both;}
.cf{*zoom:1;}
input{margin:0;padding:0;background:0 none;border:0 none;}
.inp_txt{padding:10px 0;width:100%;}
.inp_txt .inp1{height:30px;width:70%;float:left;border:1px solid #ddd;border-radius:4px;line-height:30px;text-align:center;color:#4e4e4e;font-size:16px;}
.inp_txt .inp2{float:right;width:25%;height:30px;line-height:30px;text-align:center;font-size:16px;background:#0032a5;color:#fff;}
.li_tit{padding:10px 0;}

.li_box{width:100%;}
.li_box li{padding:4px 0;height:24px;}
.li_box li input{margin-top:7px;width:16px;height:16px;float:left;}
.li_box li span{padding-left:6px;display:block;float:left;line-height:30px;}
.f_btn{width:100%;border-radius:4px;padding-top:30px;}

.f_btn input{width:calc(100% - 2px);height:36px;border:1px solid #ddd;text-align:center;line-height:36px;background:#0032a5;color:#fff;font-size:16px;border-radius:4px;}

</style>
</head>
<body>
<div class="wrap">
<h1>尊敬的客户您好,由于您尚未与银行网点进行绑定,所以需要绑定!</h1>
	<form action="<?php echo U('selectoffice');?>" method="get">
		<div class="inp_txt cf">
			<input type="text" name="oname" placeholder="根据网点名字进行搜索" class="inp1" />	
			<input type="submit" value="搜索" class="inp2">
        </div>
	</form>
	<div class="li_tit">网点列表</div>
	<form action="<?php echo U('selectoffice');?>" method="post">
    	

		<?php if(!empty($officelist)): ?><div class="li_box">
                <ul class="cf">
                    <?php if(is_array($officelist)): foreach($officelist as $key=>$officelistval): ?><li>
                            <input name="websiteid" type="radio" value="<?php echo ($officelistval["wid"]); ?>" /><span><?php echo ($officelistval["oname"]); ?></span>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="f_btn">
				<input type="submit" value="绑定网点" />
        	</div>
		<?php else: ?>
			<span style="color:#f00;">*该网点尚未创建微站,敬请期待</span><?php endif; ?>
        
	</form>
</div>
</body>
</html>