<?php
@session_start();
require_once "../php/dbconn.php";
/*
if(!($_SESSION['auserinfo']["id"]>0)){
	header("Location:index.php ");   
}

*/
   //让用户自动在微信上登录
	if(!($_SESSION['auserinfo']["id"]>0)){//检查一下session是不是为空，判断用户是否已登录
		if(empty($_COOKIE['username'])||empty($_COOKIE['pass'])){//如果session为空，并且用户没有选择记录登录状
			header("location:index.php");//转到登录页面
		}else{//用户选择了记住登录状态
			$username=$_COOKIE['username'];
			$pass=$_COOKIE['pass'];
 			$sqlu = "select * from admin where name= '$username' AND  pass='$pass'";
	   
        $resultu = $mysqli->query($sqlu);
        $resu=mysqli_fetch_assoc($resultu);
        if (!$resu) {
            header("location:index.php");
        }else{
            $_SESSION['auserinfo']=$resu;
		}
			
		 
		}
	}
	
 
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="../css/mui.min.css" rel="stylesheet" />
        <link href="../css/mui.picker.min.css" rel="stylesheet" />
        <style type="text/css">
			html,body,.mui-content {height: 0px; margin: 0px; background-color: #efeff4; }
			h5.mui-content-padded {margin-left: 3px;margin-top: 20px !important;}
			h5.mui-content-padded:first-child {margin-top: 12px !important;}
			.mui-btn {font-size: 16px;padding: 8px;margin: 3px;}
			.ui-alert {text-align: center;padding: 20px 10px;font-size: 16px;}
			* {-webkit-touch-callout: none;-webkit-user-select: none;}
			ul {font-size: 14px;color: #8f8f94; background-color:#efeff4 !important;}
			ul li{background:#FFFFFF !important; margin-bottom:2vh;}
			.mui-btn {padding: 10px;}
			.mui-input-row span{position: absolute;left: 3vw;top: 2vw;}
			.mui-input-row input {position: absolute;left: 7vw; color:#000000;font-family:courier;}
			input::-webkit-input-placeholder{color:#D8D8D8; font-weight:100; font-size: 2vh;}
			.mui-table-view-cell{padding:0;}
			.mui-btn{margin:auto ; padding-top: 1vw;}
			#loadingDiv{position:fixed;display:none;z-index:2000;top:0px;left:0px;width:100%;height:100%;background-color:#989898;filter:alpha(Opacity=80);-moz-opacity:0.5;opacity: 0.5;}
			.main_alert_div{position: absolute;display:none; z-index:3000; background-color:#FFF; left:5%; top:25vh; height: 50vh; width: 90%;line-height:94px;text-align:left;border-radius:10px;}
			.order_id{font-size:1.15rem; padding-left: 3vw;}
			.close_cion{position:absolute; right:3vw; top:1vh; width:6vw;}
			.order_details{height:8vh; background-color:#EFEFF4;}
			.order_img{height:6vh; margin-top:1vh; float:left; width:auto;}
			.order_img img{height:100%;}
			.order_content{ float:left; margin-left:2vw; height:8vh;}
			.order_id_div{ float:right; margin-right:15vw; height:8vh;}
			.order_id_div a{font-size:0.95rem; line-height:1vw; display:block; height:8vh; line-height:8vh;}
			.order_details_main{font-size:1.15rem; line-height:1vw; display:block; height:6vh; line-height:6vh;}
			.order_details_date{font-size:0.85rem; line-height:1vw; display:block; height:2vh; line-height:2vh;}
			.mui-poppicker{z-index:9999;}
			
			#title_left{height:5vh; text-align:center; float:left; margin-top:0;}
			#title_left{width:9vh;}
			#title_center{width:20vh; float:left; margin-top:0; overflow:hidden; text-align:right; height:5vh; }
			#title_left a,#title_center a,#title_right a{display:block; height:5vh; line-height:5vh; font-size:1rem;}
			#title_right{margin-right:8vw; float:right; height:5vh; width:10vh; text-align:center; margin-top:0;}
			.order_user_name{width:100%; text-align:left; height:3vh; border-bottom:1px #6A6A6A solid;}
			.order_user_name span{display:block; height:3vh; line-height:3vh; width:70%;float:left;}
			.order_user_name a{display:block; height:3vh; line-height:3vh; width:30%; float:left; text-align:right;}
			.order_sum{ float:right;}
		</style>
        
        <script src="../js/mui.min.js"></script>
		<script src="../js/mui.picker.min.js"></script>
		<script src="../js/app.js"></script>
		<script src="../js/jquery-3.2.1.min.js"></script>

 	</head>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">待處理訂單</h1>
		</header>
	<body>

    	<div class="mui-content">
    		
        <a href="/admin/order_suc.php">已完成订单</a>

        	<ul id="OA_task_2" class="mui-table-view">
					
					<li class="mui-table-view-cell" style="height:5vh;">
					<div class="mui-slider-handle">
                    	<div class="order_img" id="title_left">
                        	<a href="#">訂單圖片</a>
                        </div>
						<div class="mui-table-cell order_content" id="title_center">
                        	<a href="#">訂單詳情</a>
                        </div>
                        <div class="order_id_div" id="title_right">
                        	<a href="#">訂單編號</a>
                        </div>
					</div>
				</li>
					<?php
					
						//echo $id;
					 $sql = "select *,korder.id as orderid from korder,kuser where status=0 and korder.userid=kuser.id order by datatime asc";
					 //echo $sql;
					 $result = $mysqli->query($sql);
					 //print_r($result);
				     while($row =  $result->fetch_array(MYSQLI_ASSOC)){
						
					?>
                <li class="mui-table-view-cell" id="operation_item_<?=$row["orderid"]?>">
                	<div class="mui-slider-right mui-disabled" style="height:14vh;">
                    	<a class="mui-btn mui-btn-yellow mui-icon mui-icon-checkmarkempty " id="doover"></a>
						<!--<a class="mui-btn mui-btn-red mui-icon mui-icon-phone"></a>-->
					</div>
                    <div class="order_user_name">
                    	<span><?=$row["name"]?></span>
                        <a>狀態：<?=$row["status"]?></a>
                    </div>
					<div class="mui-slider-handle order_details">
                    	<div class="order_img">
                        	<img src="../img/chart_img/yupao.jpg" />
                        </div>
						<div class="mui-table-cell order_content">
							<a href="item_list.php?orderid=<?=$row["orderid"]?>" class="order_details_main"><?=$row["name"]?>-<?=$row["city"]?></a>
                            <a href="item_list.php?orderid=<?=$row["orderid"]?>" class="order_details_date"><?=$row["datatime"]?></a>
						</div>
                        <div class="order_id_div">
                        	<a href="item_list.php?orderid=<?=$row["orderid"]?>"><?=$row["orderid"]?></a>
                        </div>
                        <div style="clear:both;"></div>
					</div>
                     <div class="order_sum">
                        <span>共<?=$row["num"]?>件衣服</span>
                        <span>合計：HK $<?=$row["price"]?></span>
                    </div>
				</li>
			 
				<?php		
					 }
				?>
                
			</ul>
            
            
        </div>
    </body>

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
	document.getElementById('doover').addEventListener('tap', function() {
		
		    //提交本局数据
        mui.post('/php/ordersuc.php',{
		orderid:1

	     },function(data){
		//服务器返回响应，根据响应结果，分析是否登录成功；
 		if(data==0){
			 mui.alert("創建訂單失敗");
          }else{
           		 console.log(data);
           		 mui.alert(data);
           }
           
	     },'json'
        );
		
	 });
	
})(mui);



</script>
</html>