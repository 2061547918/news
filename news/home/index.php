<?php
include '../config/inc.php';
$row_config = find('config');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row_config['sysname'];?>首页</title>
    <meta name="keyword" content="<?php echo $row_config['keyword'];?>">
    <meta name="description" content="<?php echo $row_config['description'];?>">
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/home.css">
</head>
<body>
<div class="head">
    <div class="sysname"><h2><?php echo $row_config['sysname'];?></h2></div>
    <div class="reg"><a href="#" class="btn btn-primary btn-xs">注册</a>&nbsp;
        <a href="#" class="btn btn-primary btn-xs">登陆</a>&nbsp;</div>
</div>
<div class="nav">
<ul>
    <li><a href="index.html">首页</a></li>
    <?php

    $link = connect();
    $sql = "select * from menu limit 7";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_assoc($result)):
    ?>
    <li><a href="sort_<?php echo $row['mid']; ?>.html"><?php echo $row['m_name'];?></a></li>
    <?php
    endwhile;
    ?>

</ul>
</div>
<div class="banner">
    <img src="../public/image/bj.jpg">
</div>
<div class="container" style="margin:10px auto;width: 1000px;height:auto;">
    <div class="row" style="height:auto;">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #369;color:#fff;">热点新闻</div>
                <div class="panel-body">
                    <?php
                    $sql_hot = "select * from message order by hit desc limit 8";
                    $result_hot = mysqli_query($link,$sql_hot);
                    while($row_hot = mysqli_fetch_assoc($result_hot)):
                        ?>
                        <a href="detail_<?php echo $row_hot['id']; ?>.html" style="display: inline-block;width:100%;height:30px;border-bottom: 1px dashed #ccc;"><?php echo mb_substr($row_hot['title'],0,16,'utf-8');?></a><br>
                        <?php
                    endwhile;
                    ?>

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #369;color:#fff;">军事新闻</div>
                <div class="panel-body">
                    <?php
                    $sql_junshi = "select * from message where mid=11 order by id desc limit 8";
                    $result_junshi = mysqli_query($link,$sql_junshi);
                    while($row_junshi = mysqli_fetch_assoc($result_junshi)):
                    ?>
                    <a href="detail_<?php echo $row_junshi['id']; ?>.html" style="display: inline-block;width:100%;height:30px;border-bottom: 1px dashed #ccc;"><?php echo $row_junshi['title'];?><span style="margin-left:100px;">[<?php echo date('Y-m-d',$row_junshi['m_date'])?>]</span></a><br>
                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="height:auto;">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #369;color:#fff;">最新新闻</div>
                <div class="panel-body">
                    <?php
                    $sql_new = "select * from message order by m_date desc limit 8";
                    $result_new = mysqli_query($link,$sql_new);
                    while($row_new = mysqli_fetch_assoc($result_new)):
                        ?>
                        <a href="detail_<?php echo $row_new['id']; ?>.html" style="display: inline-block;width:100%;height:30px;border-bottom: 1px dashed #ccc;"><?php echo mb_substr($row_new['title'],0,16,'utf-8');?></a><br>
                        <?php
                    endwhile;
                    ?>

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #369;color:#fff;">娱乐新闻</div>
                <div class="panel-body">
                    <?php
                    $sql_yule = "select * from message where mid=8 order by id desc limit 8";
                    $result_yule = mysqli_query($link,$sql_yule);
                    while($row_yule = mysqli_fetch_assoc($result_yule)):
                        ?>
                        <a href="detail_<?php echo $row_yule['id']; ?>.html" style="display: inline-block;width:100%;height:30px;border-bottom: 1px dashed #ccc;"><?php echo $row_yule['title'];?><span style="margin-left:100px;">[<?php echo date('Y-m-d',$row_yule['m_date'])?>]</span></a><br>
                        <?php
                    endwhile;
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin:10px auto;width:1000px;height:60px;background: #369;">
    <p style="color:#fff;text-align:center;">
        网站设计：<?php echo $row_config['author']?> 地址:<?php echo $row_config['address']?><br>
        <?php echo $row_config['copy'];?> 电话:<?php echo $row_config['phone'];?><br>
        江阳大道科技有限公司
    </p>
</div>
</body>
</html>