<?php
/**
 * Created by PhpStorm.
 * User: majun
 * Date: 2017/7/14
 * Time: 16:29
 */
require_once "dbconn.php";
session_start();
if($_POST){
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    if(!($pass&&$email)){
        echo jsonError('用戶名密碼不能為空');
    }else{
        $sql = "select * from kuser where email= '$email' AND  pass='$pass'";
        $result = $mysqli->query($sql);
        $res=mysqli_fetch_assoc($result);
        if (!$res) {
            echo jsonError('用戶名或密碼錯誤');
        }else{
            $_SESSION['userinfo']=$res;
            echo jsonSuccess('恭喜你登陸成功');
        }
        $mysqli->close();
    }


}else{
    echo jsonError('非法请求');
}
