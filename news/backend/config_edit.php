<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 16:32
 * 配置项的设置功能
 */
require '../config/verify.php';
include '../config/inc.php';
$row = find('config');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻内容设置</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/javascript/backend.js"></script>
</head>
<body>
<ol class="breadcrumb" style="background: #337AB7;">
    <li><a href="#" style="color: #fff;">新闻发布系统</a></li>
    <li><a href="config_edit.php" target="right" style="color: #fff;">配置项设置</a></li>

</ol>
<div class="panel panel-default">
    <div class="panel-body">
        <form action="config_edit_post.php" method="post" onsubmit="return checkConfig();">
            <div class="form-group">
                <label class=" control-label">系统名称 *
                </label>
                <input type="text" name="sysname" value="<?php echo $row['sysname'];?>" id="sysname" class="form-control">
            </div>
            <div class="form-group">
                <label class=" control-label">关键字 *
                </label>
                <input type="text" name="keyword" value="<?php echo $row['keyword'];?>" id="keyword" class="form-control">
            </div>
            <div class="form-group">
                <label class=" control-label">系统描述</label>
                <textarea name="description" id="description" class="form-control"><?php echo $row['description'];?></textarea>
            </div>
            <div class="form-group">
                <label class=" control-label">地址 *
                </label>
                <input type="text" name="address" value="<?php echo $row['address'];?>" id="address" class="form-control">
            </div>
            <div class="form-group">
                <label class=" control-label">版权信息 *
                </label>
                <input type="text" name="copy" value="<?php echo $row['copy'];?>" id="copy" class="form-control">
            </div>
            <div class="form-group">
                <label class=" control-label">联系电话 *
                </label>
                <input type="text" name="phone" value="<?php echo $row['phone'];?>" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label class=" control-label">设计者 *
                </label>
                <input type="text" name="author" value="<?php echo $row['author'];?>" id="author" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="修改配置信息" class="btn btn-info btn-sm form-control" >
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

