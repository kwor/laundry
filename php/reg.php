<?php
/**
 * Created by PhpStorm.
 * User: majun
 * Date: 2017/7/12
 * Time: 21:59
 */
require_once "dbconn.php";
if($_POST){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $email = $_POST['email'];
    //$error = isEmpty($data);
    if(!($name && $pass && $repass&&$email)){
        echo jsonError('請將數據填寫完整');
    }
    elseif($pass!=$repass){
        echo jsonError('兩次輸入密碼不一致');
    }else{
        $sql = "insert into kuser (name,pass,email) VALUES('$name','$pass','$email')";
        $res = $mysqli->query($sql);
        if (!$res) {
            echo die("sql error:\n" . $mysqli->error);
        }else{
            echo jsonSuccess('恭喜你註冊成功');
        }
        $mysqli->close();
    }


}else{
    echo jsonError('非法请求');
}

