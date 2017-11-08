<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 16:28
 * 显示分类新闻
 */
include '../config/inc.php';
$link= connect();
$mid = intval($_GET['mid']);
$sql = "select * from menu where mid = $mid";
$result = mysqli_query($link,$sql);
$row_type = mysqli_fetch_assoc($result);
$row_config = find('config');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row_type['m_name']?>_分类新闻</title>
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
<div class="container" style="margin:10px auto;width: 1000px;height:500px;">
    <div class="row" style="height:240px;">
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
                <div class="panel-heading" style="background: #369;color:#fff;"><?php echo $row_type['m_name']?></div>
                <div class="panel-body">
                    <?php
                    $link = connect();
                    $sql ="select id,title,m_date from message where mid=".$row_type['mid']." order by id desc limit 10 ";
                    $result_sort = mysqli_query($link,$sql);

                    while($row_sort=mysqli_fetch_assoc($result_sort)):
                    ?>
                    <a style="display: inline-block;width:100%;height:30px;border-bottom: 1px dashed #ccc;" href="detail_<?php echo $row_sort['id']; ?>.html"><?php echo $row_sort['title'];?><span style="margin-left:100px;">[<?php echo date("Y-m-d",$row_sort['m_date']);?>]</span></a><br>
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
