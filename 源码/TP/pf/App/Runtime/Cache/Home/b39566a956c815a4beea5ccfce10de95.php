<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo ($seearticlelist["title"]); ?></title>

    <!-- Bootstrap Core CSS -->
    
   
</head>

<body>

    
    <h1 class="page-header"><?php echo ($seearticlelist["title"]); ?></h1>
    由<?php echo ($seearticlelist["aname"]); ?>发表于<?php echo (date('Y年m月d日H:i:s',$seearticlelist["addtime"])); ?>
    <br>
    被阅读了<?php echo ($seearticlelist["hits"]); ?>次
    <br><br><br>
    <a href="/TP/pf/Public<?php echo ($seearticlelist["pic"]); ?>"><img width="240px" height="100px" src="/TP/pf/Public<?php echo ($seearticlelist["pic"]); ?>" alt="<?php echo ($seearticlelist["pic"]); ?>"></a>
    <br><br><br>
    <?php echo ($seearticlelist["content"]); ?>

</body>
</html>