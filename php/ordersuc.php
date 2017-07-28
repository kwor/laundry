<?php
require_once "dbconn.php";

 
	
$orderid = $_POST['orderid'];

if($orderid!=""){
    $sql = "update korder set status=1 and overtime='".date('Y-m-d H:i:s')."'  where id=".$orderid;
echo  json_encode($sql);
exit;
	$res = $mysqli->query($sql);

	if(!$res){
		 echo json_encode("处理失败");
	}else{
		
		echo json_encode("处理成功");
	}
	
	
	
}else{
	
	echo json_encode("接受数据异常");
}


?>