<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 17:21
 * 接收配置信息
 */
if(isset($_POST['submit'])){
    $sysname = trim($_POST['sysname']);
    $keyword = trim($_POST['keyword']);
    $description = trim($_POST['description']);
    $address = trim($_POST['address']);
    $copy = trim($_POST['copy']);
    $phone = trim($_POST['phone']);
    $author = trim($_POST['author']);
    include '../config/inc.php';
    include '../config/show_msg.php';
    $sql = "update config set sysname='$sysname',keyword='$keyword',description='$description',address='$address',copy='$copy',phone='$phone',author='$author'";
    $res = save($sql);
    if($res){
        show_msg('配置信息修改完成!','config_edit.php');
    }else{
        show_msg('配置信息修改失败!','config_edit.php');
    }
}