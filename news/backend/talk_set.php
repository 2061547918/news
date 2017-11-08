<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/14
 * Time: 11:14
 * 评论管理操作
 */
error_reporting(0);
include '../config/inc.php';
include "../config/page.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>评论管理</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/javascript/backend.js"></script>
</head>
<body>
<ol class="breadcrumb" style="background: #337AB7;">
    <li><a href="#" style="color: #fff;">新闻发布系统</a></li>
    <li><a href="talk_set.php" target="right" style="color: #fff;">评论管理</a></li>

</ol>
<table class="table table-bordered">
    <tr>
        <th>评论内容</th><th>编辑</th>
    </tr>
    <?php

    $page = $_GET['page'];//$page为空
    $total = getCount('talk');//获取总记录数
    $pageSize= 10;
    $arr=page($total,$page,$pageSize);
    $rows = get('talk',"tid desc limit {$arr['offSet']},{$pageSize}");
    if(is_array($rows)):
        foreach($rows as $v):
            ?>
            <tr>
                <td><?php echo mb_substr($v['content'],0,25,'utf-8')."...";?></td>
                <td><a href="talk_show.php?tid=<?php echo $v['tid'];?>&val=1" class="btn btn-info btn-xs">显示</a>&nbsp;&nbsp;<a href="talk_show.php?tid=<?php echo $v['tid'];?>&val=2" class="btn
                <?php if($v['status']==2)
                    {
                        echo "btn-default";
                    }else{
                        echo "btn-success";
                    }
                    ?> btn-xs">屏蔽</a></td>
            </tr>
            <?php
        endforeach;
    endif;
    ?>
</table>
<div class="panel panel-default">
    <div class="panel-body" style="text-align: center;">
        <?php
        setPageLabel($total,$pageSize,$arr['page'],$arr['pageCount']);
        ?>
    </div>
</div>
</body>
</html>

