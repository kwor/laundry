<?php
	require_once "dbconn.php";
	
if($_POST){
    $city = $_POST['city'];
    $floor = $_POST['floor'];
	$room = $_POST['room'];
	$building = $_POST['building'];
	$instructions = $_POST['instructions'];
	$datatime = $_POST['datatime'];
	$isquick = $_POST['isquick'];
	$price = $_POST['price'];
	
   echo $_POST;

}else{
    echo jsonError('非法请求');
}
?>