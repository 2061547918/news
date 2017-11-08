<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 8:56
 * 用户登录功能
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登陆</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/javascript/backend.js"></script>
</head>
<body>
<div style="margin:100px 350px 40px" class="panel panel-default">
    <div class="panel-heading">用户登陆</div>
    <div class="panel-body">
        <form action="login_post.php" method="post" class="form" onsubmit="return checkLogin();">
            <div class="input-group input-group-sm">
                <label class="glyphicon glyphicon-user input-group-addon" style="top:0px;"></label>
                <input type="text" id="username" name="username" class="form-control" placeholder="用户名">
            </div>
            <br>
            <div class="input-group input-group-sm">
                <label class="glyphicon glyphicon-lock input-group-addon" style="top:0px;"></label>
                <input type="password" id="password" name="password" class="form-control" placeholder="密码">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="submit" value="登陆" class="btn btn-primary btn-sm form-control">
            </div>
        </form>
    </div>
</div>
<div id="show" style="margin:40px 350px;display:none;" class="panel panel-default">
    <div class="panel-body">
        <span id="error" style="font-size: 13px;color:#f00;"></span>
    </div>
</div>
</body>
</html>

