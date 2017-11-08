<?php
require '../config/verify.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻发布系统后台管理</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                   <span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;新闻发布系统管理
                </a>
                <a href="config_edit.php" target="right" class="list-group-item"><span class="glyphicon glyphicon-cog" style="margin-left:10px;"></span>&nbsp;&nbsp;配置项设置</a>
                <a href="menuset.php" target="right" class="list-group-item"><span class="glyphicon glyphicon-th-list" style="margin-left:10px;"></span>&nbsp;&nbsp;菜单设置</a>
                <a href="msg_set.php" target="right" class="list-group-item"><span class="glyphicon glyphicon-link" style="margin-left:10px;"></span>&nbsp;&nbsp;新闻内容管理</a>
                <a href="talk_set.php" target="right" class="list-group-item"><span class="glyphicon glyphicon-list-alt" style="margin-left:10px;"></span>&nbsp;&nbsp;评论管理</a>
                <a href="user_set.php" target="right" class="list-group-item"><span class="glyphicon glyphicon-lock" style="margin-left:10px;"></span>&nbsp;&nbsp;用户信息管理</a>
                <a href="logOut.php"  class="list-group-item"><span class="glyphicon glyphicon-log-out" style="margin-left:10px;"></span>&nbsp;&nbsp;退出系统</a>
            </div>
        </div>
        <div class="col-sm-9">
            <iframe src="right.html" name="right" style="width: 100%;height:700px;border:none;"></iframe>
        </div>
    </div>
</div>
</body>
</html>