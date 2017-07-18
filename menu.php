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
			.mui-table-view-cell>a:not(.mui-btn){
				margin: -7px 23px;
			}
			.mui-table-view.mui-table-view-chevron span.mui-icon{
				position: absolute;top: 3vw;
			}
			.mui-input-row input {position: absolute;left: 7vw; color:#000000;font-family:courier;}
			input::-webkit-input-placeholder,textarea::-webkit-input-placeholder{color:#D8D8D8; font-weight:100; font-size: 2vh;}
			
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
			<div class="mui-navbar-inner mui-bar mui-bar-nav" style="background: #FFFFFF;">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>
				</button>
				<h1 class="mui-center mui-title ">設置</h1>
			</div>
			<!--页面标题栏结束-->
			
 
			<!--页面主内容区开始-->
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-contact "></span>
								<a id="rate" class="mui-navigate-right" href="reg.php">創建賬號</a>
							</li>
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-locked"></span>
								<a id="share" class="mui-navigate-right" href="login.php">登陸</a>
							</li>
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-chatbubble"></span>
								<a id="feedback-btn" href="#feedback" class="mui-navigate-right">聯系我們</a>
							</li>
							<!--<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-spinner-cycle mui-spin"></span>
								<a id="tel" class="mui-navigate-right">Share and Save</a>-->
							</li>
						
						</ul>
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-chatboxes"></span>
								<a href="#lock" class="mui-navigate-right">新聞推廣</a>
							</li>
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-flag"></span>
								<a href="#lock" class="mui-navigate-right">教程</a>
							</li>
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-help"></span>
								<a href="#lock" class="mui-navigate-right">FAQ</a>
							</li>
							<!--<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-paperclip"></span>
								<a href="#lock" class="mui-navigate-right">like Us on Facebook</a>
							</li>
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-starhalf"></span>
								<a href="#lock" class="mui-navigate-right">Rate Us in App Store</a>
							</li>-->					
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-map"></span>
								<a href="#lock" class="mui-navigate-right">關於我們</a>
							</li>
							<li class="mui-table-view-cell">
								<span class="mui-icon mui-icon-email"></span>
								<a href="contact.php" class="mui-navigate-right">聯繫我們</a>
							</li>
						</ul>
						<!--<ul class="mui-table-view">
							<li class="mui-table-view-cell" style="text-align: center;">
								<a id='exit'>退出</a>
							</li>
						</ul>-->
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
								<a class="mui-navigate-right">開啟</a>
							</li>
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right">只在夜間開啟</a>
							</li>
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right">關閉</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="lock" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>設置
				</button>
				<h1 class="mui-center mui-title">鎖屏圖案</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-content-padded">
					<ul class="mui-table-view mui-table-view-chevron">
						<li class="mui-table-view-cell">
							使用手勢解鎖
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

		<div id="feedback" class="mui-page feedback" >
			<div class="mui-navbar-inner mui-bar mui-bar-nav" style="background-color:#FFFFFF ;">
				<button style="color:##4cd964" type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>
				</button>
				<h1 class="mui-center mui-title">問題反饋</h1>
			</div>
			<div class="mui-page-content">
				<p style="color:#000000; font-weight:100; font-size: 2vh;">問題和意見</p>
				<div class="row mui-input-row">
					<textarea id='question' class="mui-input-clear question" placeholder="请详细描述你的问题和意见..."></textarea>
				</div>
				<p style="color:#000000; font-weight:100; font-size: 2vh;">圖片(選填,提供問題截圖)</p>
				<div id='image-list' class="row image-list">
				</div>
				<p style="color:#000000; font-weight:100; font-size: 2vh;">QQ/郵箱</p>
				<div class="mui-input-row">
					<input id='contact' type="text" class="mui-input-clear  contact" placeholder="(选填,方便我们联系你 )" />
				</div>
				<button id='submit' type="button" class="mui-btn mui-btn-green">提交</button>
			</div>
			<p style="color:#D8D8D8; font-weight:100; font-size: 2vh;">此實例基於環信 “WebIM SDK” + 環信 “移動客服” 實現，在環信 “移動客服面板” 能夠查閱反饋信息。</p>
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


	
		 //退出操作******************
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	 