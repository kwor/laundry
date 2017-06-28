<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
		<link href="css/mui.min.css" rel="stylesheet" />
		<link href="css/index.css" rel="stylesheet" />
		<style>
			ul {
				font-size: 14px;
				color: #8f8f94;
				list-style: none;
				margin: 0;
				padding: 0;
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
			<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<a href="menu.php"> 菜单</a>
			</button>	
			<h1 class="mui-title">impressed</h1>
			<button id='setting' class=" mui-pull-right mui-btn-link"><a href="add.php"> 设置</a></button>
		</header>
		<div class="mui-content">
			<div class="mui-content-padded">
	      		<div class="mui-input-row mui-search">
	    				<input type="search" class="mui-input-clear" placeholder="">
				</div>
				<!--导航start-->
				<div class="nav">
					<ul>
						<li>list1</li>
						<li>list1</li>
						<li>list1</li>
						<li>list1</li>
						<li>list1</li>
						<li>list1</li>
						<li>list1</li>
						<li>list1</li>
						<li>list1</li>
						<li>list1</li>
					</ul>
				</div>
				<!--导航end-->
				<ul>
					<li  class="mui-card-header mui-card-media clicksnum"  style="height:40vw;background-image:url(images/cbd.jpg);margin-bottom: 2px;">					
						<div class="price"><a>$222</a></div>
						<div class="clicks"><a>11</a></div>		
					</li>
		   			<li class="mui-card-header mui-card-media clicksnum" style="height:40vw;background-image:url(images/cbd.jpg);margin-bottom: 2px;">		
						<div class="price"><a>$222</a></div>
						<div class="clicks"><a>11</a></div>	
					</li>
				</ul>
			</div>
		</div>
		<script src="js/mui.min.js"></script>
		<script src="js/app.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script>
			//点击图片次数
			var i = 0;
			$('.clicksnum').click(function(){
				i++;
				var num = $(this).children('.clicks');	
				num.show();		
				num.children('a').html(i);
			});
		</script>
			<script>
			(function($, doc) {
				$.init();
				var settings = app.getSettings();
				var account = doc.getElementById('account');
				//
				window.addEventListener('show', function() {
					var state = app.getState();
					account.innerText = state.account;
				}, false);
			
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
