<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="css/mui.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="./css/mui.min.css">
		<style>
			html,
			body {
				background-color: #efeff4;
			}
			.mui-views,
			.mui-view,
			.mui-pages,
			.mui-page,
			.mui-page-content {
				position: absolute;
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
				width: 100%;
				height: 100%;
				background-color: #efeff4;
			}
			.mui-pages {
				top: 46px;
				height: auto;
			}
			.mui-scroll-wrapper,
			.mui-scroll {
				background-color: #efeff4;
			}
			.mui-page.mui-transitioning {
				-webkit-transition: -webkit-transform 200ms ease;
				transition: transform 200ms ease;
			}
			.mui-page-left {
				-webkit-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
			.mui-ios .mui-page-left {
				-webkit-transform: translate3d(-20%, 0, 0);
				transform: translate3d(-20%, 0, 0);
			}
			.mui-navbar {
				position: fixed;
				right: 0;
				left: 0;
				z-index: 10;
				height: 44px;
				background-color: #f7f7f8;
			}
			.mui-navbar .mui-bar {
				position: absolute;
				background: transparent;
				text-align: center;
			}
			.mui-android .mui-navbar-inner.mui-navbar-left {
				opacity: 0;
			}
			.mui-ios .mui-navbar-left .mui-left,
			.mui-ios .mui-navbar-left .mui-center,
			.mui-ios .mui-navbar-left .mui-right {
				opacity: 0;
			}
			.mui-navbar .mui-btn-nav {
				-webkit-transition: none;
				transition: none;
				-webkit-transition-duration: .0s;
				transition-duration: .0s;
			}
			.mui-navbar .mui-bar .mui-title {
				display: inline-block;
				position: static;
				width: auto;
			}
			.mui-page-shadow {
				position: absolute;
				right: 100%;
				top: 0;
				width: 16px;
				height: 100%;
				z-index: -1;
				content: '';
			}
			.mui-page-shadow {
				background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
				background: linear-gradient(to right, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
			}
			.mui-navbar-inner.mui-transitioning,
			.mui-navbar-inner .mui-transitioning {
				-webkit-transition: opacity 200ms ease, -webkit-transform 200ms ease;
				transition: opacity 200ms ease, transform 200ms ease;
			}
			.mui-page {
				display: none;
			}
			.mui-pages .mui-page {
				display: block;
			}
			.mui-page .mui-table-view:first-child {
				margin-top: 15px;
			}
			.mui-page .mui-table-view:last-child {
				margin-bottom: 30px;
			}
			.mui-table-view {
				margin-top: 20px;
			}
			.mui-table-view:after {
				height: 0;
			}
			.mui-table-view span.mui-pull-right {
				color: #999;
			}
			.mui-table-view-divider {
				background-color: #efeff4;
				font-size: 14px;
			}
			.mui-table-view-divider:before,
			.mui-table-view-divider:after {
				height: 0;
			}
			.mui-content-padded {
				margin: 10px 0px;
			}
			.mui-locker {
				margin: 35px auto;
				display: none;
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
		
		<link rel="stylesheet" type="text/css" href="./css/feedback-page.css" />
	</head>
	
	
	<body>
		<!--页面主结构开始-->
		<div id="app" class="mui-views">
			<div class="mui-view">
				<div class="mui-navbar">
				</div>
				<div class="mui-pages">
				</div>
			</div>
		</div>
		<!--页面主结构结束-->
		<!--单页面开始-->
		<div id="setting" class="mui-page">
			<!--页面标题栏开始-->
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>
				</button>
				<h1 class="mui-center mui-title">Contact Us</h1>
			</div>
			<!--页面标题栏结束-->
			
 
			<!--页面主内容区开始-->
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell">
								<a id="feedback-btn" href="#feedback" class="mui-navigate-right">Speak wit Us</a>
							</li>
							<li class="mui-table-view-cell">
								<a id="tel" class="mui-navigate-right" href="#">28830810</a>
							</li>
							<li class="mui-table-view-cell">
								<a id="share" class="mui-navigate-right" href="mailto:kwor@163.com">Email</a>
							</li>
						
				 
						
						</ul>
				
					 
					</div>
				</div>
			</div>
			<!--页面主内容区结束-->
		</div>
		<div id="notifications_disturb" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>新消息通知
				</button>
				<h1 class="mui-center mui-title">功能消息免打扰</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view mui-table-view-radio">
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right">开启</a>
							</li>
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right">只在夜间开启</a>
							</li>
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right">关闭</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="lock" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">锁屏图案</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-content-padded">
					<ul class="mui-table-view mui-table-view-chevron">
						<li class="mui-table-view-cell">
							使用手势解锁
							<div id="lockState" class="mui-switch">
								<div class="mui-switch-handle"></div>
							</div>
						</li>
					</ul>
					<div class="mui-locker" data-locker-width='320' data-locker-height='320' data-locker-options='{"ringColor":"rgba(221,221,221,1)","fillColor":"#ffffff","pointColor":"rgba(0,136,204,1)","lineColor":"rgba(0,136,204,1)"}'>
					</div>
				</div>
			</div>
		</div>

		<div id="feedback" class="mui-page feedback">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">问题反馈</h1>
			</div>
			<div class="mui-page-content">
				<p>问题和意见</p>
				<div class="row mui-input-row">
					<textarea id='question' class="mui-input-clear question" placeholder="请详细描述你的问题和意见..."></textarea>
				</div>
				<p>图片(选填,提供问题截图)</p>
				<div id='image-list' class="row image-list">
				</div>
				<p>QQ/邮箱</p>
				<div class="mui-input-row">
					<input id='contact' type="text" class="mui-input-clear  contact" placeholder="(选填,方便我们联系你 )" />
				</div>
				<button id='submit' type="button" class="mui-btn mui-btn-green">提交</button>
			</div>
			<p>此示例基于环信 “WebIM SDK” + 环信 “移动客服” 实现，在环信 “移动客服面板” 能够查阅反馈信息。</p>
		</div>

	</body>
	<script src="./js/mui.min.js "></script>
	<script src="./js/mui.view.js "></script>
	<script src='./libs/easymob-webim-sdk/jquery-1.11.1.js'></script>
	<script src='./libs/easymob-webim-sdk/strophe-custom-2.0.0.js'></script>
	<script src='./libs/easymob-webim-sdk/json2.js'></script>
	<script src="./libs/easymob-webim-sdk/easemob.im-1.0.5.js"></script>
	<script src='./js/feedback.js'></script>
	<script src="./js/feedback-page.js"></script>
	<script src="./js/mui.locker.js"></script>
	<script src="./js/app.js"></script>
	<script>
		mui.init();
		 //初始化单页view
		var viewApi = mui('#app').view({
			defaultPage: '#setting'
		});
		 //初始化单页的区域滚动
		mui('.mui-scroll-wrapper').scroll();
		 //分享操作 
		var shares = {};
		mui.plusReady(function() {
			plus.share.getServices(function(s) {
				if (s && s.length > 0) {
					for (var i = 0; i < s.length; i++) {
						var t = s[i];
						shares[t.id] = t;
					}
				}
			}, function() {
				console.log("获取分享服务列表失败");
			});
		});
		 //分享链接点击事件
		document.getElementById("share").addEventListener('tap', function() {
			var ids = [{
					id: "weixin",
					ex: "WXSceneSession"
				}, {
					id: "weixin",
					ex: "WXSceneTimeline"
				}, {
					id: "sinaweibo"
				}, {
					id: "tencentweibo"
				}, {
					id: "qq"
				}],
				bts = [{
					title: "发送给微信好友"
				}, {
					title: "分享到微信朋友圈"
				}, {
					title: "分享到新浪微博"
				}, {
					title: "分享到腾讯微博"
				}, {
					title: "分享到QQ"
				}];
			plus.nativeUI.actionSheet({
				cancel: "取消",
				buttons: bts
			}, function(e) {
				var i = e.index;
				if (i > 0) {
					var s_id = ids[i - 1].id;
					var share = shares[s_id];
					if (share.authenticated) {
						shareMessage(share, ids[i - 1].ex);
					} else {
						share.authorize(function() {
							shareMessage(share, ids[i - 1].ex);
						}, function(e) {
							console.log("认证授权失败：" + e.code + " - " + e.message);
						});
					}
				}
			});
		});


			//去评分
		document.getElementById("rate").addEventListener('tap', function() {
			if (mui.os.ios) {
				location.href = 'https://itunes.apple.com/WebObjects/MZStore.woa/wa/viewContentsUserReviews?id=682211190&pageNumber=0&sortOrdering=2&type=&mt=8';
			} else if (mui.os.android) {
				plus.runtime.openURL("market://details?id=io.dcloud.HelloMUI", function(e) {
					plus.runtime.openURL("market://details?id=io.dcloud.HelloMUI", function(e) {
						mui.alert("360手机助手和应用宝，你一个都没装，暂时无法评分，感谢支持");
					}, "com.qihoo.appstore");
				}, "com.tencent.android.qqdownloader");
			}
		});
		 //客服电话
		document.getElementById("tel").addEventListener('tap', function() {
			plus.device.dial("114");
		});
		 //退出操作******************
		document.getElementById('exit').addEventListener('tap', function() {
			if (mui.os.ios) {
				app.setState({});
				mui.openWindow({
					url: 'login.html',
					id: 'login',
					show: {
						aniShow: 'pop-in'
					},
					waiting: {
						autoShow: false
					}
				});
				return;
			}
			var btnArray = [{
				title: "注销当前账号"
			}, {
				title: "直接关闭应用"
			}];
			plus.nativeUI.actionSheet({
				cancel: "取消",
				buttons: btnArray
			}, function(event) {
				var index = event.index;
				switch (index) {
					case 1:
						//注销账号
						app.setState({});
						/*
						 * 注意：
						 * 1、因本示例应用启动页就是登录页面，因此注册成功后，直接显示登录页即可；
						 * 2、如果真实案例中，启动页不是登录页，则需修改，使用mui.openWindow打开真实的登录页面
						 */
						plus.webview.getLaunchWebview().show("pop-in");
						//若启动页不是登录页，则需通过如下方式打开登录页
//						mui.openWindow({
//							url: 'login.html',
//							id: 'login',
//							show: {
//								aniShow: 'pop-in'
//							}
//						});
						break;
					case 2:
						plus.runtime.quit();
						break;
				}
			});
		}, false);
		 //************************
		 //锁屏设置
		(function($, doc) {
			//$.init();
			$.plusReady(function() {
				var settings = app.getSettings();
				var lockStateButton = doc.getElementById("lockState");
				var locker = doc.querySelector('.mui-locker');
				lockStateButton.classList[settings.gestures ? 'add' : 'remove']('mui-active')
				locker.style.display = settings.gestures ? 'block' : 'none';
				lockStateButton.addEventListener('toggle', function(event) {
					var isActive = event.detail.isActive;
					locker.style.display = isActive ? 'block' : 'none';
					if (!isActive) {
						//						alert(0);
						settings.gestures = '';
						app.setSettings(settings);
					}
				}, false);
				var record = [];
				locker.addEventListener('done', function(event) {
					var rs = event.detail;
					if (rs.points.length < 4) {
						plus.nativeUI.toast('设定的手势太简单了');
						record = [];
						rs.sender.clear();
						return;
					}
					record.push(rs.points.join(''));
					if (record.length >= 2) {
						if (record[0] == record[1]) {
							plus.nativeUI.toast('解锁手势设定成功，以后用户只需使用手势解锁而无需输入密码登录。');
							settings.gestures = record[0];
							settings.autoLogin = true;
							app.setSettings(settings);
							setTimeout(function() {
								$.back();
							}, 200);
						} else {
							plus.nativeUI.toast('两次手势不一致,请重新设定');
						}
						rs.sender.clear();
						record = [];
					} else {
						plus.nativeUI.toast('请确认手势设定');
						rs.sender.clear();
					}
				}, false);
			});
		}(mui, document));
		 //********************
		var view = viewApi.view;
		(function($) {
			//处理view的后退与webview后退
			var oldBack = $.back;
			$.back = function() {
				if (viewApi.canBack()) { //如果view可以后退，则执行view的后退
					viewApi.back();
				} else { //执行webview后退
					oldBack();
				}
			};
			//监听页面切换事件方案1,通过view元素监听所有页面切换事件，目前提供pageBeforeShow|pageShow|pageBeforeBack|pageBack四种事件(before事件为动画开始前触发)
			//第一个参数为事件名称，第二个参数为事件回调，其中e.detail.page为当前页面的html对象
			view.addEventListener('pageBeforeShow', function(e) {
				//				console.log(e.detail.page.id + ' beforeShow');
			});
			view.addEventListener('pageShow', function(e) {
				//进入手执设定界面时
				if (e.detail.page.id == 'lock') {
					var settings = app.getSettings();
					/*if (!settings.autoLogin) {
						plus.nativeUI.toast('当前没有启用 “自动登录”，需要在登录时启用 "自动登录"，设定的手势锁屏才会升效。');
					}*/
					var lockStateButton = document.getElementById("lockState");
					var locker = document.querySelector('.mui-locker');
					lockStateButton.classList[settings.gestures ? 'add' : 'remove']('mui-active')
					locker.style.display = settings.gestures ? 'block' : 'none';
				}
				//				console.log(e.detail.page.id + ' show');
			});
			view.addEventListener('pageBeforeBack', function(e) {
				//				console.log(e.detail.page.id + ' beforeBack');
			});
			view.addEventListener('pageBack', function(e) {
				//				console.log(e.detail.page.id + ' back');
			});
		})(mui);
	</script>

</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	 