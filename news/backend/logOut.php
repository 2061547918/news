<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 10:34
 * 清除所有session数据，退出系统，跳转至登陆页面
 */
session_start();
if(isset($_SESSION['username'])){
    session_destroy();
    setcookie(session_name(),'',1,'/');
   echo "<script>window.parent.location.href='login.php';</script>";
}else{
    echo "<script>window.parent.location.href='login.php';</script>";
}