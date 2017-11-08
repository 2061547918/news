<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/11
 * Time: 14:02
 * 删除菜单内容，该页面不能单独测试
 */
include '../config/inc.php';
include '../config/show_msg.php';
$mid =intval($_GET['mid']);
$res=delete('menu','mid',$mid);
if($res){
    show_msg("数据删除成功!",'menu_manager.php');
}else{
    show_msg("数据删除失败!",'menu_manager.php');
}
