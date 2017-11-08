<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/11
 * Time: 9:33
 */
if(isset($_POST['submit'])){
    $m_name =trim($_POST['m_name']);
    $m_desc =trim($_POST['m_desc']);
    $m_date = time();
    include '../config/inc.php';
    include '../config/show_msg.php';
    $sql= "insert into menu(m_name,m_desc,m_date) values('$m_name','$m_desc',$m_date)";
    $res = add($sql);
    if($res){
        show_msg('菜单添加成功!','menuset.php');
    }
}