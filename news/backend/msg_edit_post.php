<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 15:47
 * 接收修改后的数据
 */
session_start();//先从session中获取当前记录的id
$id=$_SESSION['id'];
if(isset($_POST['submit'])){
    $title = trim($_POST['title']);
    $source = trim($_POST['source']);
    $keyword = trim($_POST['keyword']);
    $mid = trim($_POST['mid']);
    //字符转义
    $content = trim($_POST['content']);
    $content = addslashes($content);

    include '../config/inc.php';
    include '../config/show_msg.php';
    $link = connect();
    //开始事务处理
    mysqli_begin_transaction($link);
    $sql_message ="update message set title='$title',source='$source',keyword='$keyword',mid=$mid where id=$id";
    $result = mysqli_query($link,$sql_message);

    $sql_content = "update msg_content set content='$content' where fid=$id";
    $result_msg = @mysqli_query($link,$sql_content) ;
    if($result && $result_msg){
        mysqli_commit($link);//提交数据到数据表中,执行修改
        show_msg('新闻修改成功!','msg_manager.php');

    }else{
        mysqli_rollback($link);//取消数据的提交
        show_msg('新闻修改失败!','msg_manager.php');
    }

}