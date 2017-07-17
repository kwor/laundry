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
			.text{position: relative;left: 60vw;bottom: -3vh; width: 40vw;  height: 10vh;}
			.text p{line-height: 4vw; color:#eee; text-shadow: 5px 5px 5px #000000;}
			.click_roude{width: 8vw; height: 8vw;}
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
		<header class="mui-bar mui-bar-nav" style="padding-right: 15px;background: #ffffff;">
			<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left"  >
				<a class="mui-icon mui-icon-bars" href="menu.php"></a>
			</button>	
			<h1 class="mui-title" >Neighborhood Express</h1>
			<button id='setting' class=" mui-pull-right mui-btn-link " >
				<a href="choiceClothes.php">
					<img src="images/shopcart.jpg" style="width: 6vw;height: 6vw;position: absolute;right: -1vw;top: 2.5vw;" />
				</a>
				<div class="clicks_total">
					<span>11</span>
				</div>
			</button>
		</header>
		<div class="mui-content">
			<div class="">
	      		<div class=" mui-content-padded mui-input-row mui-search" >
	    				<input type="search" class="mui-input-clear" placeholder="" style="background: #FFFFFF;">
				</div>
				<!--导航start-->
				<div style="background: #FFFFFF; top:-2vh;" class=" mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted" style="top:-2vh;">
				    <div id="segmentedControl" class="mui-scroll nav-list" style="color:rgba(152, 150, 150, 0.71);font-size:2vh ; font-weight: lighter;">
				        <a class="mui-control-item mui-active"  >
				           上衣/衬衫
				        </a>
				        <a class="mui-control-item" >    
                                          裤装
				        </a>
				        <a class="mui-control-item" >
				            女装
				        </a>
				        <a class="mui-control-item" >
				           西装     
				        </a>
				        <a class="mui-control-item" >
				            内衣
				        </a>
				        <a class="mui-control-item" >
				          皮衣  
				        </a>
				        <a class="mui-control-item" >
				          其他 
				        </a>
				   <a class="mui-control-item" >
				          棉衣
				        </a>
				    </div>
				</div>

<div id="lab">
				<!--导航end-->
				<?php 
                  for ($x=1; $x<=8; $x++) {
	            ?>
				<ul style="margin-top:-2vh;" class="image-ul" >
					
					<?php

					//echo $id;
					 $sql = "select * from price where class=".$x;
					 //echo $sql;
					 $result = $mysqli->query($sql);
					// print_r($result);
				     while($row =  $result->fetch_array(MYSQLI_ASSOC)){
				     	
                   ?>
  
					<li   class="mui-card-header mui-card-media clicksnum"  style="height:40vw;background-image:url(img/clothes1.jpg);margin-bottom: 1px;" id="<?=$row["id"]?>">					
						<div class="price"><a>$<?=$row["gprice"]?></a></div>
						<div class="click_roude"><div class="clicks"><a>11</a></div></div>
						<div class="text"><p style="color: #b1a4a4;font-size: 4.5vw;"><?=$row["name"]?></p><?php if($row["price"]!=0){ ?><p>普通价格：$<?=$row["price"]?><?php }?><?php if ($row["type"]==0){ ?>&nbsp;&nbsp;&nbsp;净熨<?php } ?></p></div>		
					</li>
					<?php 
						 
                       }   
                    ?>
	
				</ul>
				<?php
					 }
				?>
			
				</div>
			</div>
		</div>
		<script src="js/mui.min.js"></script>
		<script src="js/app.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
	 <script>
        $('#segmentedControl a').click(function() {
            var i = $(this).index();//下标第一种写法
            //var i = $('tit').index(this);//下标第二种写法
            //$(this).addClass('select').siblings().removeClass('select');
            $('#lab ul').eq(i).show().siblings().hide();
        });
    </script>
    

		<script>
			//点击图片次数
			var i = 0;
			$('.clicksnum').click(function(){
				i++;
				 
				localStorage.setItem(i,this.id);
				
				$(this).children('.click_roude').children('.clicks').show().children('a').html(i);		
				$('.clicks_total').show().children('span').html(i);
				//点击图片商品次数变化
				$(this).children('.click_roude').children('.clicks').animate({
				     width:'8vw',
				     height:"8vw",
				     borderRadius:'4vw',
				     fontSize:'2vh',
				     lineHeight:'8vw',
			    },100,function(){
				    	$(this).animate({
					     width:'5vw',
					     height:"5vw",
					     borderRadius:'2.5vw',
					     fontSize:'1vh',
					     lineHeight:'5vw',
				    },100);
				 });   
				$(".clicks_total").animate({
				     width:'8vw',
				     height:"8vw",
				     borderRadius:'4vw',
				     fontSize:'2vh',
				     lineHeight:'8vw',
			    },100,function(){
				    	$(".clicks_total").animate({
					     width:'5vw',
					     height:"5vw",
					     borderRadius:'2.5vw',
					     fontSize:'1vh',
					     lineHeight:'5vw',
				    },100);
			    });
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
