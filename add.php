<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="css/mui.min.css" rel="stylesheet" />
	 <script src="js/mui.picker.min.js"></script>
	 
	<style>
			ul {
				font-size: 14px;
				color: #8f8f94;
			}
			.mui-btn {
				padding: 10px;
			}
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
	<body>
		
	<header class="mui-bar mui-bar-nav" style="padding-right: 15px;">
			<h1 class="mui-title">洗衣篮</h1>
			<button id='setting' class=" mui-pull-right mui-btn-link">开关</button>
		</header>
			<div class="mui-content">
			<div class="mui-content-padded">
	 
   
   	<form class="mui-input-group">
   		
   	   <li class="mui-table-view-cell">
				    	
				    	<!--<input id='LX' class="mui-input-clear required" type="text" jschange ng-model="goods.LX" placeholder="必填" />-->
				    	<select  style="width:80%; padding:10px 15px 0 15px;"  dir="rtl" id="dz">
				    		<option value="1">地区</option>
				    		<option value="2">澳门</option>
				    		<option value="3">香港</option>
				    		<option value="4">台湾</option>
				    	</select>
				    </li>
				    
				    
 	 
   <button id='demo1' data-options='{}' class="btn mui-btn mui-btn-block">选择日期时间 ...</button>
   	
    <div class="mui-input-row">
    <input type="text" class="mui-input-clear" placeholder="层数">
    </div>
 
     <div class="mui-input-row">
    <input type="text" class="mui-input-clear" placeholder="室号">
    </div>
 
 
     <div class="mui-input-row">
    <input type="text" class="mui-input-clear" placeholder="大厦名称">
    </div>
 
 
     <div class="mui-input-row">
    <input type="text" class="mui-input-clear" placeholder="上门收取及送递指示">
    </div>
 
 
     <div class="mui-input-row">
    <input type="text" class="mui-input-clear" placeholder="地区">
    </div>
 
    <div class="mui-button-row">
        <button type="button" class="mui-btn mui-btn-primary" >确认</button>
        <button type="button" class="mui-btn mui-btn-danger" >取消</button>
    </div>
</form>
   
 
   
			</div>
		</div>
        <script src="js/mui.picker.min.js"></script>
		<script src="js/mui.min.js"></script>
		<script src="js/app.js"></script>
		<script>
			(function($, doc) {
				$.init();
				
					var result = $('#result')[0];
				var btns = $('.btn');
				btns.each(function(i, btn) {
					btn.addEventListener('tap', function() {
						var optionsJson = this.getAttribute('data-options') || '{}';
						var options = JSON.parse(optionsJson);
						var id = this.getAttribute('id');
						/*
						 * 首次显示时实例化组件
						 * 示例为了简洁，将 options 放在了按钮的 dom 上
						 * 也可以直接通过代码声明 optinos 用于实例化 DtPicker
						 */
						var picker = new $.DtPicker(options);
						picker.show(function(rs) {
							/*
							 * rs.value 拼合后的 value
							 * rs.text 拼合后的 text
							 * rs.y 年，可以通过 rs.y.vaue 和 rs.y.text 获取值和文本
							 * rs.m 月，用法同年
							 * rs.d 日，用法同年
							 * rs.h 时，用法同年
							 * rs.i 分（minutes 的第二个字母），用法同年
							 */
							result.innerText = '选择结果: ' + rs.text;
							/* 
							 * 返回 false 可以阻止选择框的关闭
							 * return false;
							 */
							/*
							 * 释放组件资源，释放后将将不能再操作组件
							 * 通常情况下，不需要示放组件，new DtPicker(options) 后，可以一直使用。
							 * 当前示例，因为内容较多，如不进行资原释放，在某些设备上会较慢。
							 * 所以每次用完便立即调用 dispose 进行释放，下次用时再创建新实例。
							 */
							picker.dispose();
						});
					}, false);
				});
				
				
				var settings = app.getSettings();
				var account = doc.getElementById('account');
				//
				window.addEventListener('show', function() {
					var state = app.getState();
					account.innerText = state.account;
				}, false);
				$.plusReady(function() {
					var settingPage = $.preload({
						"id": 'setting',
						"url": 'setting.html'
					});
					//设置
					var settingButton = doc.getElementById('setting');
					//settingButton.style.display = settings.autoLogin ? 'block' : 'none';
					settingButton.addEventListener('tap', function(event) {
						$.openWindow({
							id: 'setting',
							show: {
								aniShow: 'pop-in'
							},
							styles: {
								popGesture: 'hide'
							},
							waiting: {
								autoShow: false
							}
						});
					});
					//--
					$.oldBack = mui.back;
					var backButtonPress = 0;
					$.back = function(event) {
						backButtonPress++;
						if (backButtonPress > 1) {
							plus.runtime.quit();
						} else {
							plus.nativeUI.toast('再按一次退出应用');
						}
						setTimeout(function() {
							backButtonPress = 0;
						}, 1000);
						return false;
					};
				});
			}(mui, document));
		</script>
	 
	</body>
</html>
