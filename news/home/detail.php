<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 17:29
 * 显示详细新闻内容
 */
include '../config/inc.php';
$row_config = find('config');
$id = intval($_GET['id']);//message ,msg_content
$link = connect();
//点击次数加1
$sql_hit = "update message set hit=hit+1 where id=$id";
$result_hit = mysqli_query($link,$sql_hit);
//读取新闻内容
$sql ="select m.id,m.title,m.source,m.m_date,m.hit,c.content from message m inner join msg_content c on m.id=c.fid and id=$id";
$result_msg = mysqli_query($link,$sql);
$row_msg = mysqli_fetch_assoc($result_msg);

//接收评论内容
if(isset($_POST['submit'])){
    $id = trim($_POST['t_id']);
    $content = trim($_POST['content']);
    $content =stripslashes($content);
    $t_date =time();
    $sql_talk ="insert into talk(content,mid,t_date) values('$content',$id,$t_date)";
    $result_talk = mysqli_query($link,$sql_talk);
    if($result_talk && mysqli_insert_id($link)){
        echo "<script>alert('评论发表成功!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row_msg['title']?></title>
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
                        <a href="detail_<?php echo $row['id']; ?>.html" style="display: inline-block;width:100%;height:30px;border-bottom: 1px dashed #ccc;"><?php echo mb_substr($row_hot['title'],0,16,'utf-8');?></a><br>
                        <?php
                    endwhile;
                    ?>

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
               <div class="panel-body">
                  <p style="text-align: center;font-size:20px;font-weight:bold;"><?php echo $row_msg['title'];?></p>
                   <p style="text-align: justify;border-bottom:1px solid #ccc;">来源:<?php echo $row_msg['source']; ?>&nbsp;&nbsp;&nbsp;&nbsp;点击次数:<?php echo $row_msg['hit'];?>&nbsp;&nbsp;&nbsp;&nbsp;发布时间:<?php echo date('Y/m/d H:i:s',$row_msg['m_date']);?></p>
                   <p><?php echo $row_msg['content'];?></p>

               </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">发表评论</div>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <textarea name="content" rows="4" class="form-control"></textarea>
                            <input type="hidden" name="t_id" value="<?php echo $row_msg['id'];?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="发布" class="btn btn-default">
                        </div>
                    </form>
                    <?php
                    //评论内容的显示
                    $id =$row_msg['id'];
                    $sql_show ="select * from talk where mid=$id and status =1";
                    $result_show =mysqli_query($link,$sql_show);
                    while($row_show = mysqli_fetch_assoc($result_show)):
                    ?>
                      <p style="border-bottom:1px solid #ccc;">时间:<?php echo date("Y-m-d H:i:s",$row_show['t_date']);?></p>
                        <p><?php echo $row_show['content'];?></p>
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

