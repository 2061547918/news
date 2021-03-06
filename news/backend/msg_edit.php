<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 11:16
 * 新闻内容的修改
 */
session_start();
include '../config/inc.php';
$id = intval($_GET['id']);
$row = union('message','msg_content',"m.id=c.fid and id=$id ");
$_SESSION['id']=$row['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻修改操作</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/javascript/backend.js"></script>
    <link rel="stylesheet" href="../public/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" href="../public/kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="../public/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="../public/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="../public/kindeditor/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content"]', {
                cssPath : '../public/kindeditor/plugins/code/prettify.css',
                uploadJson : '../public/kindeditor/php/upload_json.php',
                fileManagerJson : '../public/kindeditor/php/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
</head>
<body>

<ol class="breadcrumb" style="background: #337AB7;">
    <li><a href="#" style="color: #fff;">新闻发布系统</a></li>
    <li><a href="msg_set.php" target="right" style="color: #fff;">新闻内容设置</a></li>
    <li><a href="msg_manager.php" target="right" style="color: #fff;">新闻内容管理</a></li>
</ol>
<div class="panel panel-default">
    <div class="panel-body">
        <form action="msg_edit_post.php" method="post" onsubmit="return checkMsg();">
            <div class="form-group">
                <label class=" control-label">标题 *
                </label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label class=" control-label">来源 *
                </label>
                <input type="text" name="source" id="source" class="form-control" value="<?php echo $row['source']; ?>">
            </div>
            <div class="form-group">
                <label class=" control-label">关键字 *
                </label>
                <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo $row['keyword']; ?>">
            </div>
            <div class="form-group">
                <label class=" control-label">类型 *
                </label>
                <select name="mid" class="form-control">
                    <?php
                    $rows = get('menu','mid desc');
                    if(is_array($rows)):
                        foreach($rows as $v):
                            ?>
                            <option value="<?php echo $v['mid'];?>" <?php
                            if($row['mid']== $v['mid']){
                                echo "selected";
                            }
                            ?> ><?php echo $v['m_name'];?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class=" control-label">新闻内容</label>
                <textarea name="content" id="content" class="form-control"><?php echo $row['content'];?></textarea>
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