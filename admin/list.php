<!DOCTYPE html>
<?php
require_once "../php/dbconn.php";	
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="../css/mui.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/mui.min.css">
	

 	</head>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">待处理订单</h1>
		</header>
	<body >
	 
      
			<div class="mui-content">
		 
			<ul id="OA_task_2" class="mui-table-view">
					<?php
						//echo $id;
					 $sql = "select k.*,o.* from korder as k left join orderp as o on k.id=o.orderid where k.status=0";
					 //echo $sql;
					 $result = $mysqli->query($sql);
					 //print_r($result);
				     while($row =  $result->fetch_array(MYSQLI_ASSOC)){
				     	
						$sql2="select * from price where id=".$row['pid'];
						//echo $sql2;
						$result2 = $mysqli->query($sql2);
						$row2 =  mysqli_fetch_assoc($result2);
						
						
					?>
					
					
						<li class="mui-table-view-cell">
					<div class="mui-slider-right mui-disabled">
						
						<a class="mui-btn mui-btn-yellow mui-icon mui-icon-checkmarkempty "></a>
						<a class="mui-btn mui-btn-red mui-icon mui-icon-phone"></a>
					</div>
					<div class="mui-slider-handle">
						<div class="mui-table-cell">
						<a href="add_set.php?id=<?=$row["pid"]?>"><?=$row2["name"]?>-<?=$row["city"]?>-$<?=$row2["price"]?></a>
						</div>
					</div>
				</li>
			 
 				 
				 	<?php		
					 }
					?>
				 
		       
		       
			</ul>
		 
		 
</div>
	</body>
		<script src="../js/mui.min.js"></script>
<script>
			mui.init();
			(function($) {
		 
				//第二个demo，向右拖拽后显示操作图标，释放后自动触发的业务逻辑
				$('#OA_task_2').on('slideright', '.mui-table-view-cell', function(event) {
					var elem = this;
					mui.confirm('确认删除该条记录？', 'Hello MUI', btnArray, function(e) {
						if (e.index == 0) {
							elem.parentNode.removeChild(elem);
						} else {
							setTimeout(function() {
								$.swipeoutClose(elem);
							}, 0);
						}
					});
				});
			})(mui);
		</script>
</html>