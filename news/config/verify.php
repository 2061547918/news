<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/13
 * Time: 14:03
 */
session_start();
function verify(){
    if(!isset($_SESSION['username'])){
        echo "<script>window.parent.location.href='error.php';</script>";
    }
}
verify();