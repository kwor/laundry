<?php
	require_once "dbconn.php";
	$ids='2';
	$nums='6';
	$nums_json=array(["nums"]=>$nums);
	$sql = "select * from price where id= '$ids'";
    $result = $mysqli->query($sql);
    $res=mysqli_fetch_assoc($result);
	array_push($res,$nums_json);
	echo json_encode($res);
	print_r($res);
?>