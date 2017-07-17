<?php
	require_once "dbconn.php";
	$ids=$_REQUEST["ids"];
	
	$sql = "select * from price where id= '$ids'";
    $result = $mysqli->query($sql);
    $res=mysqli_fetch_assoc($result);
	echo json_encode($res)
	//print_r($res);
?>