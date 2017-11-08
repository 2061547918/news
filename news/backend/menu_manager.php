<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/11
 * Time: 10:33
 * 菜单管理页面
 */
error_reporting(0);
require '../config/verify.php';
include '../config/inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>菜单管理</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/javascript/backend.js"></script>
</head>
<body>
<ol class="breadcrumb" style="background: #337AB7;">
    <li><a href="#" style="color: #fff;">新闻发布系统</a></li>
    <li><a href="menuset.php" target="right" style="color: #fff;">菜单设置</a></li>
    <li><a href="menu_manager.php" target="right" style="color: #fff;">菜单管理</a></li>
</ol>
<table class="table table-bordered">
    <tr>
        <th>菜单名称</th><th>编辑</th>
    </tr>
    <?php

    $rows = get('menu','mid desc');
    if(is_array($rows)):
    foreach($rows as $v):
    ?>
        <tr>
            <td><?php echo $v['m_name'];?></td>
            <td><a href="menu_del.php?mid=<?php echo $v['mid'];?>" class="btn btn-info btn-xs">删除</a>&nbsp;&nbsp;<a href="menu_edit.php?mid=<?php echo $v['mid'];?>" class="btn btn-info btn-xs">修改</a></td>
        </tr>
    <?php
    endforeach;
    endif;
    ?>
</table>
</body>
</html>

