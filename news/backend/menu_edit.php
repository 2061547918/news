<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/11
 * Time: 14:34
 * 显示需要修改的数据，单条数据
 */
session_start();
include '../config/inc.php';
$mid = intval($_GET['mid']);
$row = find('menu','mid',$mid);
$_SESSION['mid']=$row['mid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>菜单修改操作</title>
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
        <form action="menu_edit_post.php" method="post" onsubmit="return checkMenu();">
            <div class="form-group">
                <label class=" control-label">菜单类型 *
                </label>
                <input type="text" name="m_name" id="m_name" class="form-control" value="<?php echo $row['m_name']?>">
            </div>
            <div class="form-group">
                <label class=" control-label">菜单描述</label>
                <textarea name="m_desc" id="m_desc" rows="4" class="form-control"><?php echo $row['m_desc']?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="保存数据" class="btn btn-info btn-sm form-control" >
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

