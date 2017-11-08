<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 9:22
 * 显示新闻，分页数据
 */
error_reporting(0);
require '../config/verify.php';
include '../config/inc.php';
include '../config/page.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻管理</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/javascript/backend.js"></script>
</head>
<body>
<ol class="breadcrumb" style="background: #337AB7;">
    <li><a href="#" style="color: #fff;">新闻发布系统</a></li>
    <li><a href="msg_set.php" target="right" style="color: #fff;">新闻内容设置</a></li>
    <li><a href="msg_manager.php" target="right" style="color: #fff;">新闻内容管理</a></li>
</ol>
<table class="table table-bordered">
    <tr>
        <th>新闻标题</th><th>来源</th><th>新闻类型</th><th>编辑</th>
    </tr>
    <?php
    $page = $_GET['page'];//$page为空
    $total = getCount('message');//获取总记录数
    $pageSize= 10;
    $arr=page($total,$page,$pageSize);
    $rows = get('message',"id desc limit {$arr['offSet']},{$pageSize}");
    if(is_array($rows)):
        foreach($rows as $v):
            ?>
            <tr>
                <td><?php echo $v['title'];?></td>
                <td><?php echo $v['source'];?></td>
                <td><?php
                    $row = find('menu','mid',$v['mid']);
                    echo $row['m_name'];
                    ?></td>
                <td><a href="msg_del.php?id=<?php echo $v['id'];?>" class="btn btn-info btn-xs">删除</a>&nbsp;&nbsp;<a href="msg_edit.php?id=<?php echo $v['id'];?>" class="btn btn-info btn-xs">修改</a></td>
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

