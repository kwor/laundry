<?php 
	@session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="css/mui.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="./css/mui.min.css">
	
 	</head>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">普通列表</h1>
		</header>
	<body >
	 
      
			<div class="mui-content">
		 
			<ul class="mui-table-view">
				 <li class="mui-table-view-cell"><?=$_SESSION['userinfo']["name"]?></li>
		         <li class="mui-table-view-cell"><?=$_SESSION['userinfo']["email"]?></li>
		         <li class="mui-table-view-cell"><?=$_SESSION['userinfo']["money"]?></li>
			</ul>
		 	<ul class="mui-table-view">
							<li class="mui-table-view-cell" style="text-align: center;">
								<a id='exit' href="loginout.php">退出</a>
							</li>
		    </ul>
		 
</div>
	</body>
	 
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	 