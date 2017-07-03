<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="css/mui.min.css" rel="stylesheet" />

		<style>
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
			<h1 class="mui-title">洗衣篮</h1>
		</header>
		<div class="mui-content" style="background: #FFFFFF;">

			<form class="mui-input-group" >

				<div class="mui-table-view-cell">

					<!--<input id='LX' class="mui-input-clear required" type="text" jschange ng-model="goods.LX" placeholder="必填" />-->
					<select  style="width:100%; "  dir="rtl" id="dz">
						<option value="1">地区</option>
						<option value="2">澳门</option>
						<option value="3">香港</option>
						<option value="4">台湾</option>
					</select>
				</div>

				<button id='demo1' style="margin-top:-4vh ;" data-options='{}' class="btn mui-btn mui-btn-block">
				选择日期时间 ...
				</button>

				<div class="mui-input-row">
					<span class="mui-icon mui-icon-navigate"></span>
					<input type="text" class="" placeholder="层数">
				</div>

				<div class="mui-input-row">
					<span class="mui-icon mui-icon-paperplane"></span>
					<input type="text" class="" placeholder="室号">
				</div>

				<div class="mui-input-row">
					<span class="mui-icon mui-icon-paperclip"></span>
					<input type="text" class="" placeholder="大厦名称">
				</div>

				<div class="mui-input-row">
					<span class="mui-icon mui-icon-redo"></span>
					<input type="text" class="" placeholder="上门收取及送递指示">
				</div>

				<div class="mui-input-row">
					<span class="mui-icon mui-icon-location"></span>
					<input type="text" class="" placeholder="地区">
				</div>

			</form>

			<div class="mui-content-padded">
				<button id='reg' style="border-radius: 2vw;" class="mui-btn mui-btn-block mui-btn-primary">
				提交
				</button>
			</div>

		</div>
		<script src="js/mui.min.js"></script>
		<script src="js/app.js"></script>
		<script>(function($, doc) {
	$.init();
	$.plusReady(function() {
		var settings = app.getSettings();
		var regButton = doc.getElementById('reg');
		var accountBox = doc.getElementById('account');
		var passwordBox = doc.getElementById('password');
		var passwordConfirmBox = doc.getElementById('password_confirm');
		var emailBox = doc.getElementById('email');
		regButton.addEventListener('tap', function(event) {
			var regInfo = {
				account: accountBox.value,
				password: passwordBox.value,
				email: emailBox.value
			};
			var passwordConfirm = passwordConfirmBox.value;
			if(passwordConfirm != regInfo.password) {
				plus.nativeUI.toast('密码两次输入不一致');
				return;
			}
			app.reg(regInfo, function(err) {
				if(err) {
					plus.nativeUI.toast(err);
					return;
				}
				plus.nativeUI.toast('注册成功');
				/*
				 * 注意：
				 * 1、因本示例应用启动页就是登录页面，因此注册成功后，直接显示登录页即可；
				 * 2、如果真实案例中，启动页不是登录页，则需修改，使用mui.openWindow打开真实的登录页面
				 */
				plus.webview.getLaunchWebview().show("pop-in", 200, function() {
					plus.webview.currentWebview().close("none");
				});
				//若启动页不是登录页，则需通过如下方式打开登录页
				//							$.openWindow({
				//								url: 'login.html',
				//								id: 'login',
				//								show: {
				//									aniShow: 'pop-in'
				//								}
				//							});
			});
		});
	});
}(mui, document));</script>
	</body>

</html>

