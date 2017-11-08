<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/11
 * Time: 16:49
 * 接收新闻内容
 */
if(isset($_POST['submit'])){
    $title = trim($_POST['title']);
    $source = trim($_POST['source']);
    $keyword = trim($_POST['keyword']);
    $mid = trim($_POST['mid']);
    //字符转义
    $content = trim($_POST['content']);
    $content = addslashes($content);
    $m_date = time();
    include '../config/inc.php';
    include '../config/show_msg.php';
    $link = connect();
    //开始事务处理
    mysqli_begin_transaction($link);
    $sql_message ="insert into message(title,source,keyword,mid,m_date) values('$title','$source','$keyword',$mid,$m_date)";
    $result = mysqli_query($link,$sql_message);
    $id = mysqli_insert_id($link);//返回该表主键值

    $sql_content = "insert into msg_content(fid,content) values($id,'".$content."')";
    $result_msg = @mysqli_query($link,$sql_content) ;
    if($result && $result_msg){
        mysqli_commit($link);//提交数据到数据表中,执行修改
        show_msg('新闻添加成功!','msg_set.php');

    }else{
        mysqli_rollback($link);//取消数据的提交
        show_msg('新闻添加失败!','msg_set.php');
    }

}