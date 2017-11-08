<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 10:20
 * 修改管理员密码功能
 */
include "../config/inc.php";
include '../config/show_msg.php';
if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password = md5($password);
    //如果按用户名来进行更新，username字段应该设置成unique
    $sql = "update admin set password = '$password' where username='$username'";
    $res = save($sql);
    if($res){
        show_msg('密码修改成功!','logOut.php');
    }
}
?>

