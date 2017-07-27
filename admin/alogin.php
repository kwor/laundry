<?php
/**
 * Created by PhpStorm.
 * User: majun
 * Date: 2017/7/14
 * Time: 16:29
 */
require_once "../php/dbconn.php";
@session_start();

if($_POST){
    $pass = $_POST['pass'];
    $username = $_POST['username'];
    if(!($pass&&$username)){
        echo jsonError('用戶名密碼不能為空');
    }else{
        $sql = "select * from admin where name= '$username' AND  pass='$pass'";
	   
        $result = $mysqli->query($sql);
        $res=mysqli_fetch_assoc($result);
        if (!$res) {
            echo jsonError('用戶名或密碼錯誤');
        }else{
            $_SESSION['auserinfo']=$res;
            echo jsonSuccess('恭喜你登陸成功');
        }
        $mysqli->close();
    }


}else{
    echo jsonError('非法请求');
}
