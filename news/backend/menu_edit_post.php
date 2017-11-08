<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/11
 * Time: 15:21
 * 接收修改后的数据，并且保存到menu表中
 */
session_start();
if(isset($_POST['submit'])){
    $m_name =trim($_POST['m_name']);
    $m_desc =trim($_POST['m_desc']);
    $mid = $_SESSION['mid'];
    include '../config/inc.php';
    include '../config/show_msg.php';
    $sql= "update menu set m_name='$m_name',m_desc='$m_desc' where mid=$mid";
    $res = save($sql);
    if($res){
        show_msg('菜单修改成功!','menu_manager.php');
    }else{
        show_msg('菜单修改失败!','menu_manager.php');
    }
}