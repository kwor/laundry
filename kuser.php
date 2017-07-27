<?php 
@session_start();
require_once "php/dbconn.php";


   //让用户自动在微信上登录
	if(!($_SESSION['userinfo']["id"]>0)){//检查一下session是不是为空，判断用户是否已登录
        
		if(empty($_COOKIE['email'])||empty($_COOKIE['pass'])){//如果session为空，并且用户没有选择记录登录状
	 
			 header("location:login.php");//转到登录页面
		}else{//用户选择了记住登录状态
			$email=$_COOKIE['email'];
			$pass=$_COOKIE['pass'];
        $sqlu = "select * from kuser where email= '$email' AND  pass='$pass'";
	   
        $resultu = $mysqli->query($sqlu);
        $resu=mysqli_fetch_assoc($resultu);
        if (!$resu) {
            header("location:login.php");
        }else{
            $_SESSION['userinfo']=$resu;
		}
			
		 
		}
	}else{
	//记住密码，默认
	if(empty($_COOKIE['email'])||empty($_COOKIE['pass'])){
		
	setcookie("email",$_SESSION['userinfo']['email'],time()+3600*24*365);
	setcookie("pass",$_SESSION['userinfo']['pass'],time()+3600*24*365);
			
	}
 
	}

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
				 <li class="mui-table-view-cell"><span class="mui-icon mui-icon-contact "></span><?=$_SESSION['userinfo']["name"]?></li>
		         <li class="mui-table-view-cell"><span class="mui-icon mui-icon-contact "></span><?=$_SESSION['userinfo']["email"]?></li>
		         
		         <?php
		         	$sql="select * from kuser where id=".$_SESSION['userinfo']["id"];
					$result = $mysqli->query($sql);
					$res=mysqli_fetch_assoc($result);
					
					//var_dump($res);
		         	?>
		         
		         <li class="mui-table-view-cell"><span class="mui-icon mui-icon-contact "></span>$<?=$res["money"]?></li>
			</ul>
			
			
			<ul class="mui-table-view" >
			 
		          <?php
		         	$sql2="select * from korder where status=0 and userid=".$_SESSION['userinfo']["id"]." order by status desc";
					$result2 = $mysqli->query($sql2);
				 
					
					while($row2 =  $result2->fetch_array(MYSQLI_ASSOC)){
					
		         	?>
		         
		         <li class="mui-table-view-cell">件数：<?=$row2["num"]?>，价格：$<?=$row2["price"]?>，时间：<?=$row2["datatime"]?>
                     </br/><?php if($row2["isquick"]==0){?>48小时后<?php }else{?>24小时候<?php } ?>
		         	</li>
		         	<?php } ?>
			</ul>
			
			
		 	<ul class="mui-table-view">
							<li class="mui-table-view-cell" style="text-align: center;">
								<a id='exit' href="loginout.php">退出</a>
							</li>
		    </ul>
		 
</div>
	</body>
	 <script src="js/mui.min.js"></script>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	 