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
	
	$sql = "insert into korder (city,floor,room,building,instructions,datatime,isquick,price,status) 
	        VALUES('$city','$floor','$room','$building','$instructions','$datatime','$isquick','$price',0)";
	 //echo json_encode($sql);
	 
	 $res = $mysqli->query($sql);
        if (!$res) {
            echo json_encode("2");
        }else{
            echo json_encode("1");
        }
        $mysqli->close();
   
  //  echo json_encode($sql);

 }else{
    echo json_encode("0");
}


?>