<!DOCTYPE html>
<?php
require_once "php/dbconn.php";	
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
	<link href="css/mui.min.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
		<style type="text/css">
			.mui-table-view-cell>a:not(.mui-btn){margin: -11px -22px;}
			
			.order_status{width:100%; position:relative; height:3vw; overflow:hidden;}
			.order_status_label{ width:100%; position:relative; overflow:hidden; height:6vw; line-height:6vw; margin-top:3vh;}
			.order_status_label span{ float:left; width:23vw; font-size: 0.8rem; font-weight:bold;}
			
			.process_dot{width:3vw; height:3vw; border-radius:1.5vw; background:#66c013; float:left; position:relative;}
			.process_line{border:1px #66c013 solid; height:1px; width:22vw; float:left; margin-left:2vw; margin-right:2vw; margin-top:1.5vw;}
			.process_dot span{ height:1vw; position:absolute; bottom:3vw;}
			.process_dot a{display:block; height:1vw; position:absolute; bottom:3vw;}
			
			#order_id{width:100%; margin-top:3vh;}
			.order_id{ display:block; color:#e37b3a; height:3vh; line-height:3vh; margin-top:1vh;}
			.order_info{ display:block; color:#3c3c3c; height:3vh; line-height:3vh; margin-top:1vh;}
			.order_status_time{ display:block; color:#3c3c3c; height:3vh; line-height:3vh; margin-top:3vh;}
			
			.chart_li{background:#fafafa; border: 1px #FAFAFA solid; position:relative; padding:0; height:80px; margin-top:5%; z-index:9;}
			.chart_li_div{height:60px; position:absolute; width:auto; left:0; top:10px; text-align:left; z-index:8;}
			.chart_li_pic{height:60px; width:auto; z-index:8;}
			.chart_li_info{height:80px; margin-left:105px; float:left; z-index:8; overflow:hidden;}
			.chart_li_info span{display:block; height:30px; line-height:30px; padding-top:9px; z-index:8; max-width:120px;}
			.chart_li_num{ border:none; height:20px; position:absolute; right:50px; top:30px; overflow:hidden; z-index:8; padding:0; width:75px;}
			.chart_li_input{background:#FAFAFA; width:20px;}
			.chart_li_button{width:20px;}
			.chart_li_price{position:absolute; right:5px; height:80px;}
			.chart_li_price span{ display:block; height:30px; line-height:30px; padding-top:25px;}
		</style>

		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script type="text/javascript">
			//通过config接口注入权限验证配置
			wx.config({
			    debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
			    appId: '', // 必填，公众号的唯一标识
			    timestamp: '<?php echo time();?>', // 必填，生成签名的时间戳
			    nonceStr: '<?php echo $nonceStr;?>', // 必填，生成签名的随机串
			    signature: '<?php echo $signature;?>',// 必填，签名
			    jsApiList: [] // 必填，需要使用的JS接口列表
			});
			//通过ready接口处理成功验证
			wx.ready(function(){
				// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后
			});
		</script>
	</head>
	<body style="background-color: #FFFFFF;">	
		<header class="mui-bar mui-bar-nav" style="background: #FFFFFF;">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title" style="font-size:1.5rem;">訂單詳情</h1>
		</header>

		<div class="mui-content" style="background-color: #FFFFFF; padding-bottom: 12vw;">
			<div style="padding:3vw 3.5vw 0 3.5vw; background: #FFFFFF;">
				<div style="position:relative; width:100%; height:12vw; line-height:12vw; margin-top:3vh;">
                	<img src="images/order_status.png" style=" float:left; width: 12vw; left: 2vw;" />
                	<p style="float:left; margin-left:1%; font-size:1.1rem; font-weight:bold;">等待訂單確認</p>
                    <div style="clear:both;"></div>
                </div>
                
                <div class="order_status_label">
                	<span style="text-align:left;">下單成功</span>
                    <span style="text-align:left;">上門取件</span>
                    <span style="text-align:center;">訂單審核</span>
                    <span style="text-align:right;">洗衣完成</span>
                </div>
                
                <div class="order_status">
                	<div class="process_dot"></div>
                    <div class="process_line"></div>
                    <div class="process_dot"></div>
                    <div class="process_line"></div>
                    <div class="process_dot"></div>
                    <div class="process_line"></div>
                    <div class="process_dot"></div>
                </div>
                 
                <div id="order_id">
                	<span class="order_id">訂單編號：3800184419847</span>
                    <span class="order_info">訂單到達澳門XX區XXX分部&nbsp;&nbsp;由&nbsp;&nbsp; 正在拍照審核</span>
                    <span class="order_status_time">2017-07-24 12:59:59</span>
                </div>
                    
				<ul class="mui-table-view" id="cdlist" style="padding-bottom:80px;">

				</ul>

				<div style="position: fixed; bottom: 0px; left:0; background:#FFFFFF; z-index:99999; width: 100%; height:100px; margin:0 auto;" class="mui-table-view-cell">
	        		<div style="clear:both; border-bottom:2px #c8c7cc solid; margin-bottom:22px; "></div>
                	<div style="float:left; height:30px; line-height:26px; border:2px #c8c7cc solid; width:40%; background-color:#FFFFFF; text-align:center;" >
                    	<span onClick="window.history.go(-1);" style="font-size:1.02rems; color:#000000; font-weight:bold;">返回首頁</span>
                    </div>
                	<div style="float:right; height:30px; line-height:26px; width:30%; margin-right:5%; background-color:#7ec855; text-align:center;">
                    	<span onClick="goToAdd()" style="color:#FFFFFF; font-size:1.02rem; font-weight:bold;">確認</span>
                    </div>
	   			</div>
			</div>
		</div>
	</body>
	<script src="js/mui.min.js"></script>
	<script src="js/mui.enterfocus.js"></script>
	<script src="js/app.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
<script>
	function goToAdd(){
		var money=document.getElementById("allpr").innerHTML;	
		window.location.href="add.php?money="+money;
	}
	
	function empty_localstorage(){
		if(window.confirm("確認清空購物車？")){
			localStorage.clear();
			window.location.reload();
		}
		
	}
	mui.init();
		$(document).ready(function(){
				var btnArray = ['确认', '取消'];
				//第一个demo，拖拽后显示操作图标，点击操作图标删除元素；
				$('#cdlist').on('tap', '.mui-btn-red', function(event) {
					
					var elem = this;
					var li = elem.parentNode.parentNode;
					mui.confirm('确认删除该条记录？', '洗衣籃', btnArray, function(e) {
						if (e.index == 0) {
							
							 var classids = localStorage.removeItem(elem.id);
							 
							li.parentNode.removeChild(li);

						} else {
							setTimeout(function() {
								$.swipeoutClose(li);
							}, 0);
						}
					});
				});
				
				/*  Debug Start  */
				
			//打开关于页面
			if(localStorage.length>0){
				var listclass="";
				for(var i=0;i<localStorage.length;i++){
					var classid = localStorage.key(i);
					//console.log(classid);
					
					if(!isNaN(classid)){
						var classidisnumber=classid;
						var classids = localStorage.getItem(classid);
						//console.log("1111");
						//console.log(classids);
						var pp=0;
						mui.post('php/getpinfo.php',{
								ids:classidisnumber,
								nums:classids
							},function(data){
								if(data["gprice"]==0){
									jiage=data["price"];
								}else{
									jiage=data["gprice"];
								}
						//console.log(data);
					//服务器返回响应，根据响应结果，分析是否登录成功；
					var list = document.getElementById("cdlist") ;
					var fragment = document.createDocumentFragment();
					var li;
					li = document.createElement('li');
					li.className = 'mui-table-view-cell mui-media chart_li'; 
					li.id='chart_li-'+data["id"];
					li.innerHTML = 
						'<div class="mui-slider-right mui-disabled"><a class="mui-btn mui-btn-red" id="'+data["id"]+'" data-nums="'+data["nums"]+'"  data-price="'+jiage+'">删除</a></div>'+
						'<div class="mui-slider-handle" data-ids="'+data["id"]+'">'+
							'<div class="chart_li_div"><img src="img/chart_img/'+data["pic"]+'" class="chart_li_pic"/></div>'+ 
							'<div class="chart_li_info"><span>'+data["name"]+'</span><span>'+data["name"]+'</span></div>'+
							'<div class="mui-numbox chart_li_num" data-numbox-step="1" data-numbox-min="0" data-numbox-max="100">'+
								'<button class="mui-btn mui-numbox-btn-minus chart_li_button" type="button" style="background-color:#bec3c7; color:#FFFFFF;" value="'+data["id"]+'_-">-</button>'+
								'<input class="mui-numbox-input chart_li_input" id="input_'+data["id"]+'" style="border:none; background-color:#fafafa;" type="number" value="'+data["nums"]+'" />'+
								'<button class="mui-btn mui-numbox-btn-plus chart_li_button" type="button" style="background-color:#bec3c7; color:#FFFFFF;" value="'+data["id"]+'_+">+</button></div>'+
							'<div class="chart_li_price"><span>$'+jiage+'</span></div>'
						'</div>';
					fragment.appendChild(li);
					list.appendChild(fragment);
					},'json');
				}
			}
		}
	$('#cdlist').on('tap', 'button', function(event) {
		var button_id_arr= this.value.split("_");
		var button_id=button_id_arr[0];
		var button_value = button_id_arr[1];
		var value_before=$("#input_"+button_id).val();
		//alert(button_id[0]);	
		if(button_value == "+"){
			var value_now=parseInt(value_before)+1;
			$("#input_"+button_id).val(value_now);
			localStorage.setItem(button_id,value_now);
		}else{
			var value_now=parseInt(value_before)-1;
			$("#input_"+button_id).val(value_now);
			localStorage.setItem(button_id,value_now);
			if(value_now==0){localStorage.removeItem(button_id);}
		}
		
		for(var i=0;i<localStorage.length;i++){
			var classid = localStorage.key(i);
			//console.log(classid);
			if(!isNaN(classid)){
				var classidisnumber=classid;
				var classids = localStorage.getItem(classid);
				//console.log("1111");
				//console.log(classids);
				var pp=0;
				mui.post('php/getpinfo.php',{
						ids:classidisnumber,
						nums:classids
					},function(data){
						if(data["gprice"]==0){
							jiage=data["price"];
						}else{
							jiage=data["gprice"];
						}
					}
				,'json');
			}
		}
							
	});
			/*  Debug End  */
});
				
   //console.log(listclass);
	
</script>
</html>