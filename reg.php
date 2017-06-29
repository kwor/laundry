<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title>注册</title>
		<link href="css/mui.min.css" rel="stylesheet" />
	 
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
	

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">注册</h1>
		</header>
		<div class="mui-content">
			<form class="mui-input-group">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='account' type="text" class="mui-input-clear mui-input" placeholder="请输入账号">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input id='password' type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
				</div>
				<div class="mui-input-row">
					<label>确认</label>
					<input id='password_confirm' type="password" class="mui-input-clear mui-input" placeholder="请确认密码">
				</div>
				<div class="mui-input-row">
					<label>邮箱</label>
					<input id='email' type="email" class="mui-input-clear mui-input" placeholder="请输入邮箱">
				</div>
			</form>
			<div class="mui-content-padded">
				<button id='reg' class="mui-btn mui-btn-block mui-btn-primary">注册</button>
			</div>
			<div class="mui-content-padded">
				<p>注册真实可用，注册成功后的用户可用于登录，但是示例程序并未和服务端交互，用户相关数据仅存储于本地。</p>
			</div>
		</div>
		<script src="js/mui.min.js"></script>
		<script src="js/app.js"></script>
		<script>
			(function($, doc) {
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
						if (passwordConfirm != regInfo.password) {
							plus.nativeUI.toast('密码两次输入不一致');
							return;
						}
						app.reg(regInfo, function(err) {
							if (err) {
								plus.nativeUI.toast(err);
								return;
							}
							plus.nativeUI.toast('注册成功');
							/*
							 * 注意：
							 * 1、因本示例应用启动页就是登录页面，因此注册成功后，直接显示登录页即可；
							 * 2、如果真实案例中，启动页不是登录页，则需修改，使用mui.openWindow打开真实的登录页面
							 */
							plus.webview.getLaunchWebview().show("pop-in",200,function () {
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
			}(mui, document));
		</script>
	</body>

</html>