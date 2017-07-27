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
        <link href="../css/mui.picker.min.css" rel="stylesheet" />
        <style type="text/css">
			html,body,.mui-content {height: 0px; margin: 0px; background-color: #efeff4; }
			h5.mui-content-padded {margin-left: 3px;margin-top: 20px !important;}
			h5.mui-content-padded:first-child {margin-top: 12px !important;}
			.mui-btn {font-size: 16px;padding: 8px;margin: 3px;}
			.ui-alert {text-align: center;padding: 20px 10px;font-size: 16px;}
			* {-webkit-touch-callout: none;-webkit-user-select: none;}
			ul {font-size: 14px;color: #8f8f94;}
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
			.order_details{height:8vh;}
			.order_details_num{float:left; margin-left:3vw}
			.order_img{height:6vh; margin-top:1vh; float:left; width:auto;}
			.order_img img{height:100%;}
			.order_content,.order_details_num{ float:left; margin-left:5vw; height:8vh;}
			.order_content a,.order_details_num a{ font-size:0.95rem; line-height:1vw; display:block; height:8vh; line-height:8vh;}
			.mui-poppicker{z-index:9999;}
		</style>
        
        <script src="../js/mui.min.js"></script>
		<script src="../js/mui.picker.min.js"></script>
		<script src="../js/app.js"></script>
		<script src="../js/jquery-3.2.1.min.js"></script>

 	</head>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">訂單詳情</h1>
		</header>
	<body>
    
    	<div class="mui-content">
        	<ul id="OA_task_2" class="mui-table-view">
					
					
					<?php
						//echo $id;
					 $orderid=$_REQUEST["orderid"];
					 $sql = "select k.*,o.* from korder as k left join orderp as o on k.id=o.orderid where k.status=0 and orderid='$orderid'";
					 //echo $sql;
					 $result = $mysqli->query($sql);
					 //print_r($result);
				     while($row =  $result->fetch_array(MYSQLI_ASSOC)){
				     	
						$sql2="select * from price where id=".$row['pid'];
						//echo $sql2;
						$result2 = $mysqli->query($sql2);
						$row2 =  mysqli_fetch_assoc($result2);
						
						
					?>
                <li class="mui-table-view-cell" id="operation_item_<?=$row["pid"]?>">
                	<div class="mui-slider-right mui-disabled">
                    	<a class="mui-btn mui-btn-yellow mui-icon mui-icon-checkmarkempty "></a>
						<a class="mui-btn mui-btn-red mui-icon mui-icon-phone"></a>
					</div>
					<div class="mui-slider-handle order_details">
                    	<div class="order_img">
                        	<img src="../img/chart_img/yupao.jpg" />
                        </div>
						<div class="mui-table-cell order_content">
							<a><?=$row2["name"]?>-<?=$row["city"]?>-$<?=$row2["price"]?></a>
						</div>
                        <div class="order_details_num">
                        	<a>x<?=$row["num"]?></a>
                        </div>
					</div>
				</li>
			 
				<?php		
					 }
				?>
                
			</ul>
            
            
            <!--  Alert Div Start  -->
		<div id="loadingDiv"></div>
        <div class="main_alert_div">
			<div class="mui-content" style="background: #FFFFFF;">
            <div><span class="order_id">訂單號：</span><img src="../images/close_icon.png" class="close_cion" /></div>
				<form class="mui-input-group" id='add-form'>
					<div class="mui-input-row">
 						<span class="mui-icon mui-icon-compose"></span>
						<div class="mui-numbox" data-numbox-step='1' data-numbox-min='0' data-numbox-max='100'>
                        	<button class="mui-btn mui-numbox-btn-minus" type="button">-</button>
                            <input class="mui-numbox-input" type="number" id="numbox_input" />
                            <button class="mui-btn mui-numbox-btn-plus" type="button">+</button>
						</div>
					</div>
                    
                    <div class="mui-input-row">
                    	<span class="mui-icon mui-icon-location"></span>
                        <input name="colorbtn" id='colorbtn' type="text" class="" placeholder="选择颜色">
                    </div>
                    
                    <div class="mui-input-row">
                    	<span class="mui-icon mui-icon-location"></span>
                        <input name="isjiang" id='isjiang' type="text" class="" placeholder="是否加浆">
					</div>
                    
                    <div class="mui-input-row">
						<span class="mui-icon mui-icon-location"></span>
						<input name="pbtn" id='pbtn' type="text" class="" placeholder="外观描述">
					</div>
				</form>
                <div class="mui-content-padded" style="background-color: #efeff4;">
            		<button id='addx' style="border-radius: 2vw;" class="mui-btn mui-btn-block mui-btn-primary">提交</button>
				</div>
			</div>
         </div>   
            <!--  Alert Div End  -->
<script language="javascript">
(function($, doc) {
	$.init();
	var ppPicker = new $.PopPicker();
	ppPicker.setData([{
		value: '0',
		text: '發霉'
		},{
		value: '1',
		text: '霉點'
	}]);
	var showppPickerButton = doc.getElementById('pbtn');
	showppPickerButton.addEventListener('tap', function(event) {
		ppPicker.show(function(items) {
			showppPickerButton.value = items[0].text;
			//返回 false 可以阻止选择框的关闭
			//return false;
		});
	}, false);
	
	var icolorPicker = new $.PopPicker();
	icolorPicker.setData([{
		value: '0',
		text: '红色'
		}, {
		value: '1',
		text: '绿色'
	}]);
	var showiColorPickerButton = doc.getElementById('colorbtn');
	showiColorPickerButton.addEventListener('tap', function(event) {
		icolorPicker.show(function(items) {
			 showiColorPickerButton.value = items[0].text;
			 //返回 false 可以阻止选择框的关闭
			 //return false;
		});
	}, false);
	
	var userPicker = new $.PopPicker();
	userPicker.setData([{
		value: '0',
		text: '不加浆'
		}, {
		value: '1',
		text: '加浆-$4'
	}]);
	var showUserPickerButton = doc.getElementById('isjiang');
	showUserPickerButton.addEventListener('tap', function(event) {
		userPicker.show(function(items) {
			 isjiang.value = items[0].text;
			 //返回 false 可以阻止选择框的关闭
			 //return false;
		});
	}, false);		
}(mui, document));
 
</script>
            
            
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
})(mui);

$(function(){
	$("#OA_task_2 li").click(function(){
		var item_id=this.id.split("_");
		var _id=item_id[2];
		$('#loadingDiv').css('display','block');
		$('.main_alert_div').slideDown();
		$('.order_id').text("訂單號：<?=$orderid?>. 物品ID："+_id);
	});
	
	$("#addx").click(function(){
		var colorbtn = document.getElementById('colorbtn').value;
		var isjiang = document.getElementById('isjiang').value;
		var pbtn = document.getElementById('pbtn').value;
		var nums = document.getElementById('numbox_input').value;
				
		if(colorbtn=="" || isjiang=="" || pbtn=="" || nums==""){
			mui.alert("你有項目沒有填寫");
		}else{
			mui.post('../php/test.php',{					
				//city:city,
				//floor:floor,
				//room:room,
				//building:building,
				//instructions:instructions,
				//datatime:datatime,
				//isquick:isquick,
				//price:price
	     		},function(data){
		//服务器返回响应，根据响应结果，分析是否登录成功；
					console.log(data);
					if(data["status"]==0){
		 				mui.alert("设置失败");
					}else{
						if(data["status"]=="1"||data==1){
							mui.alert("设置成功");
							$('#loadingDiv').css('display','none');	
							$('.main_alert_div').slideUp();
           				}else{
           		 			mui.alert(data["status"]);
           				}
           			} 
	     		},'json');
			}
		});
	
	$(".close_cion").click(function(){	
		$('#loadingDiv').css('display','none');	
		$('.main_alert_div').slideUp();
	});
	
});


</script>
</html>