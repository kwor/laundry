<?php
	$callback = isset($_GET['callback']) ? trim($_GET['callback']) : ''; //jsonp回调参数，必需
	$jstr=$_REQUEST["str"];
	$status=1;
	
	$jstrs=strval($jstr);
	echo $jstrs."</br>";
	
	$de_json = json_decode($jstrs,TRUE);
    $count_json = count($de_json);
	//echo $count_json;
	$arr=array();
	for ($i = 0; $i < $count_json; $i++){
		//echo var_dump($de_json);
		$arr[$i]["id"] = $de_json[$i]['id'];
		$arr[$i]["num"] = $de_json[$i]['num'];
	}
	print_r($arr)."</br>";
	echo $arr[0]["id"];
	//Array
	$jstrs_arr=json_decode($jstrs,true);
	//var_dump(json_decode($jstrs,true));
	##echo $jstrs."</br>";
	##$jstrs=explode("},",$jstr);
	##for($i=0; $i<sizeof($jstrs)-1;$i++){
	##	$jstrs[$i]=	$jstrs[$i]."}";
	##}
 	##//$jstr="[{\"id\":\"69\",\"num\":\"1\"},{\"id\":\"71\",\"num\":\"1\"},{\"id\":\"73\",\"num\":\"1\"}]";
	
	##$jstrp=json_encode($jstrs,true);
	
	//Json
	##echo $callback . '(' . $jstrp .')';
?>