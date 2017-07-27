<!DOCTYPE html>
<?php
require_once "php/dbconn.php";	
?>
<html style="background-color: #FFFFFF;" >
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="css/mui.min.css" rel="stylesheet" />
		<link href="css/mui.picker.min.css" rel="stylesheet" />
	<style type="text/css">
		body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
		#allmap{width:100%;height:500px;}
		p{margin-left:5px; font-size:14px;}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZdDvmajgCuN4lLrvdccyHXiEGGDAY1iV"></script>
	<style>
			html,
			body,
			.mui-content {
				height: 0px;
				margin: 0px;
				background-color: #efeff4;
			}
			h5.mui-content-padded {
				margin-left: 3px;
				margin-top: 20px !important;
			}
			h5.mui-content-padded:first-child {
				margin-top: 12px !important;
			}
			.mui-btn {
				font-size: 16px;
				padding: 8px;
				margin: 3px;
			}
			.ui-alert {
				text-align: center;
				padding: 20px 10px;
				font-size: 16px;
			}
			* {
				-webkit-touch-callout: none;
				-webkit-user-select: none;
			}
		
ul {
font-size: 14px;
color: #8f8f94;
}
.mui-btn {
padding: 10px;
}
.mui-input-row span{position: absolute;left: 3vw;top: 2vw;}
.mui-input-row input {position: absolute;left: 7vw; color:#000000;font-family:courier;}
input::-webkit-input-placeholder{color:#D8D8D8; font-weight:100; font-size: 2vh;}
.mui-btn{margin:auto ; padding-top: 1vw;}
		</style>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script type="text/javascript">	//通过config接口注入权限验证配置
wx.config( {
	debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
	appId: '', // 必填，公众号的唯一标识
	timestamp: '<?php echo time(); ?>', // 必填，生成签名的时间戳
nonceStr: '<?php echo $nonceStr; ?>', // 必填，生成签名的随机串
signature: '<?php echo $signature; ?>',// 必填，签名
jsApiList: [] // 必填，需要使用的JS接口列表
});
//通过ready接口处理成功验证
wx.ready(function() {
	// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后
});</script>
	</head>

	<body style="background: #FFFFFF;">
		<header class="mui-bar mui-bar-nav" style="background: #FFFFFF;">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">洗衣籃</h1>
		</header>
		
		
		
		<div class="mui-content" style="background: #FFFFFF;">

			<form class="mui-input-group" id='add-form'>
				<div class="mui-input-row">
					<span class="mui-icon mui-icon-location"></span>
					<input name="city" id='showCityPicker' type="text"  placeholder="選擇地區">
				</div>
                <div id="allmap" style="height: 200px;"></div>
            
				<div class="mui-input-row">
					<span class="mui-icon mui-icon-navigate"></span>
					<input name="floor" id="floor" type="text" class="" placeholder="層數">
				</div>

				<div class="mui-input-row">
					<span class="mui-icon mui-icon-paperplane"></span>
					<input name="room" id="room" type="text" class="" placeholder="室號">
				</div>

				<div class="mui-input-row">
					<span class="mui-icon mui-icon-paperclip"></span>
					<input name="building" id="building" type="text" class="" placeholder="大廈名稱">
				</div>

				<div class="mui-input-row">
					<span class="mui-icon mui-icon-redo"></span>
					<input name="instructions" id="instructions" type="text" class="" placeholder="上門收取及送遞指示">
				</div>

				<div class="mui-input-row">
                		<span class="mui-icon mui-icon-compose"></span>
	                	<input name="datatime" id='data1' style="left: 10vw; top: 2vw; width:100vw" placeholder="取貨時間"  data-options='{}' class="" ／>	
                </div>
                
                <div class="mui-input-row">
					<span class="mui-icon mui-icon-location"></span>
					<input name="isquick" id='isquick' type="text" class="" placeholder="是否加急">
					
				</div>
				<div class="mui-input-row">
                		<span class="mui-icon mui-icon-compose"></span>
                		<input  name="price_show" id='price_show' type="text" disabled  value="<?=$_REQUEST["money"]?>">
                        <input  name="price" id='price' type="hidden"  value="<?=$_REQUEST["money"]?>">
                 </div>
                 
			</form>

			<div class="mui-content-padded" style="background-color: #efeff4;">
				<button id='addx' style="border-radius: 2vw;" class="mui-btn mui-btn-block mui-btn-primary">
				提交
				</button>
			</div>

		</div>
		<script src="js/mui.min.js"></script>
		<script src="js/mui.picker.min.js"></script>
		<script src="js/city.mo.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/app.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		
	<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	//var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom("澳門",10);  

	function theLocation(city){
		//var city = document.getElementById("userResult").value;
		if(city != ""){
			map.centerAndZoom(city,14);      // 用城市名设置地图中心点
		}
	}
</script>



<script>(function($, doc) {
	$.init();
 
 
 isquick.value = "普通-48小时";

 
var dtpicker = new mui.DtPicker({
    type: "hour",//设置日历初始视图模式 
    beginDate: new Date(2015, 04, 25),//设置开始日期 
    endDate: new Date(2016, 04, 25),//设置结束日期 
    labels: ['年', '月', '日', '时'],//设置默认标签区域提示语 
 
}) 

document.querySelector('#data1').addEventListener('tap',function () {
    dtpicker.show(function(e) { 
        //console.log(e); 
        data1.value = e.text;
    }) 
})
 
					//普通示例
					var cityPicker = new $.PopPicker({
						layer: 2
					});
					cityPicker.setData(mcityData);
					var showCityPickerButton = doc.getElementById('showCityPicker');
					//showCityPicker.value = "1112";
				//	var cityResult = doc.getElementById('cityResult');
					showCityPickerButton.addEventListener('tap', function(event) {
						cityPicker.show(function(items) {
						//	cityResult.innerText = "你选择的城市是:" + items[0].text + " " + items[1].text;
							//console.log(items[0].text + " " + items[1].text);
							showCityPicker.value = items[1].text;
							
							theLocation(items[1].text);
							
							//返回 false 可以阻止选择框的关闭
							//return false;
						});
					}, false);
		 
		 	 var userPicker = new $.PopPicker();
					userPicker.setData([{
						value: '0',
						text: '普通-48小时'
					}, {
						value: '1',
						text: '加快-24小时(50%服务费)'
					}]);
					var showUserPickerButton = doc.getElementById('isquick');
					//var userResult = doc.getElementById('isquick');
					showUserPickerButton.addEventListener('tap', function(event) {
						userPicker.show(function(items) {
							  isquick.value = items[0].text;
							//返回 false 可以阻止选择框的关闭
							//return false;
						});
					}, false);
					
					
		//打开关于页面
			if(localStorage.length>0){
				var str1="[";
				var listclass="";
				for(var i=0;i<localStorage.length;i++){
					var classid = localStorage.key(i);
					//console.log(classid);
					
					if(!isNaN(classid)){
						//var classidisnumber=classid;
						var num = localStorage.getItem(classid);
						//
						//console.log(classid);
						if(i==0){
							str1 += '{"id":"'+classid+'","num":"'+ num+'"}'; 
						}else{
							str1 += ',{"id":"'+classid+'","num":"'+ num+'"}'; 
						}
						
 						 
 						
						//console.log(localist);
						
                 }
                 
          }
          
          str=str1+']';
        // console.log(str);
         // var jstr= JSON.stringify(str);
          //console.log( JSON.stringify(str));
        }
					
	
	         document.getElementById('addx').addEventListener('tap', function() {
           	     var city = doc.getElementById('showCityPicker').value;
                 var floor = doc.getElementById('floor').value;
                 var room = doc.getElementById('room').value;
                 var building = doc.getElementById('building').value;
                 var instructions = doc.getElementById('instructions').value;
                 var data1 = doc.getElementById('data1').value;
                 
                 datatime=data1;
                 
                 //倍数
                 var isquick = doc.getElementById('isquick').value;
                 
                 if(isquick=="普通-48小时"){
                 	isquick="0";
                 }else{
                 	isquick="1";
                 }
                 var price = doc.getElementById('price').value;
 
                
                 if(city==""||floor==""||room==""||building==""||instructions==""||datatime==""){
                 	mui.alert("你有項目沒有填寫");
                 }else{
                 	
   
                 
        //提交本局数据
        mui.post('php/add.php',{
		city:city,
		floor:floor,
		room:room,
		building:building,
		instructions:instructions,
		datatime:datatime,
		isquick:isquick,
		price:price,
		jstr:str
		
	     },function(data){
		//服务器返回响应，根据响应结果，分析是否登录成功；
		var status=data["status"];
		console.log(status);
		if(status==0){
			 mui.alert("創建訂單失敗");
           }else{
           	if(status=="1"||status==1){
           		 mui.alert("創建訂單成功");
           	}else{
           		console.log(status);
           		 mui.alert(status);
           	}
           }
           
	     },'json'
        );
                 
                 
    }
   });
				
   
}(mui, document));
 
</script>
	</body>

</html>

