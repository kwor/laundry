<!DOCTYPE html>
<html style="background-color: #FFFFFF;" >
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link href="../css/mui.picker.min.css" rel="stylesheet" />
	<style type="text/css">
		body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
		#allmap{width:100%;height:500px;}
		p{margin-left:5px; font-size:14px;}
	</style>
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
			<h1 class="mui-title">设置</h1>
		</header>
		
		
		
		<div class="mui-content" style="background: #FFFFFF;">

			<form class="mui-input-group" id='add-form'>

				<div class="mui-input-row">
                		<span class="mui-icon mui-icon-compose"></span>
                		<div class="mui-numbox" data-numbox-step='1' data-numbox-min='0' data-numbox-max='100'>
                         <button class="mui-btn mui-numbox-btn-minus" type="button">-</button>
                         <input class="mui-numbox-input" type="number" />
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
				<button id='addx' style="border-radius: 2vw;" class="mui-btn mui-btn-block mui-btn-primary">
				提交
				</button>
			</div>

		</div>
		<script src="../js/mui.min.js"></script>
		<script src="../js/mui.picker.min.js"></script>
		<script src="../js/app.js"></script>
		<script src="../js/jquery-3.2.1.min.js"></script>




<script>(function($, doc) {
	$.init();

 		 	        var ppPicker = new $.PopPicker();
					ppPicker.setData([{
						value: '0',
						text: '發霉'
					}, {
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
					
	
	         document.getElementById('addx').addEventListener('tap', function() {
           	     var colorbtn = doc.getElementById('colorbtn').value;
                 var isjiang = doc.getElementById('isjiang').value;
                 var pbtn = doc.getElementById('pbtn').value;
                 var nums = mui(Selector).numbox().getValue()
            
                 
                  
                 //倍数
                  
                 if(isjiang=="无"){
                 	isquick="0";
                 }else{
                 	isquick="1";
                 }
  
                
                 if(colorbtn==""||isjiang==""||pbtn==""||nums==""){
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
		price:price
	     },function(data){
		//服务器返回响应，根据响应结果，分析是否登录成功；
		console.log(data);
		if(data==0){
			 mui.alert("设置失败");
           }else{
           	if(data=="1"||data==1){
           		 mui.alert("设置成功");
           	}else{
           		 mui.alert(data);
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

