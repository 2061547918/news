<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12
 * Time: 11:06
 * 数据删除操作
 */
include '../config/inc.php';
include '../config/show_msg.php';
$id =intval($_GET['id']);
$res=delete('message','id',$id);
if($res){
    show_msg("数据删除成功!",'msg_manager.php');
}else{
    show_msg("数据删除失败!",'msg_manager.php');
}