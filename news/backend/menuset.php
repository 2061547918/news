<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 17:13
 */
require '../config/verify.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>默认系统设置信息</title>
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
<div class="panel panel-default">
    <div class="panel-body">
        <form action="menuset_post.php" method="post" onsubmit="return checkMenu();">
            <div class="form-group">
                <label class=" control-label">菜单类型 *
</label>
                <input type="text" name="m_name" id="m_name" class="form-control">
            </div>
            <div class="form-group">
                <label class=" control-label">菜单描述</label>
                <textarea name="m_desc" id="m_desc" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="添加数据" class="btn btn-info btn-sm form-control" >
            </div>
        </form>
    </div>
</div>
<div id="show" class="panel panel-default" style="display:none;">
    <div class="panel-body">
        <span id="error" style="color:#f00;"></span>
    </div>
</div>

</body>
</html>
