<?php
require_once "dbconn.php";
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
if($_POST){
    $city = $_POST['city'];
    $floor = $_POST['floor'];
	$room = $_POST['room'];
	$building = $_POST['building'];
	$instructions = $_POST['instructions'];
	$datatime = $_POST['datatime'];
	$isquick = $_POST['isquick'];
	$price = $_POST['price'];
	$jstr=$_POST['jstr'];
	
  	//$jstr="[{\"id\":\"69\",\"num\":\"1\"},{\"id\":\"71\",\"num\":\"1\"},{\"id\":\"73\",\"num\":\"1\"}]";
      
	$jstrp = json_decode($jstr,TRUE);
 

	  
     echo $jstrp;
	 exit;
	
    //$mysqli->autocommit(false);  
	
	$sql = "insert into korder (city,floor,room,building,instructions,datatime,isquick,price,status) 
	        VALUES('$city','$floor','$room','$building','$instructions','$datatime','$isquick','$price',0)";
	  
	 $res = $mysqli->query($sql);
        if (!$res) {
        	//$mysqli->rollback();  
            echo json_encode("提交失败");
        }else{
        	
		   $orderid=@mysqli_insert_id($mysqli);
	       $jstrp=json_decode($jstr,true);
		  
  /*
	       foreach($jstrp as $val){
		
		         $sql2="insert into orderp (orderid,pid,num) 
	                       VALUES('$orderid','$val[id]','$val[num]')";
				 $res2 = $mysqli->query($sql2); 		 
	        }
  //*/
         //   $mysqli->commit();  
 
            echo json_encode("1");
        }
		//$mysqli->autocommit(true);  
        //$mysqli->close();
   
  //  echo json_encode($sql);

 }else{
    echo json_encode("接受数据异常");
}


?>