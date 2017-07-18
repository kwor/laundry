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
		<style>
			
			
			.mui-table-view-cell>a:not(.mui-btn){margin: -11px -22px;}
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
			<h1 class="mui-title">洗衣籃</h1>
		</header>
		
		<!--<div style="width: 100%; height: 30%;" class="mui-slider-item">
			<img style="width: 100%; height: auto;" src="img/clothes3.jpg" />
			<span style="position: absolute; left:5vw; top:5vw; color: #FFFFFF;"  class="mui-icon mui-icon-back"></span>
		</div>-->
		<div class="mui-content" style="background-color: #FFFFFF; padding-bottom: 12vw;">
			<div style="padding:3vw 3.5vw 0 3.5vw; background: #FFFFFF;">
				<p>以下是你的服装列表</p>
			</div>
			<div style="padding:0 3.5vw; padding-top:10vw;background: #FFFFFF; color:#000000;margin-top: -2vw;padding-bottom: 2vw;">洗衣篮</div>
			<ul class="mui-table-view" id="cdlist">
				
				
				
			    <!--<li class="mui-table-view-cell mui-media">
			        <a href="javascript:;" style="padding-right: 15vw;">
			            <span class="mui-media-object mui-pull-left mui-icon mui-icon-plusempty" style="color: #007AFF;"></span>
			            <div class="mui-media-body">
			                幸福
			           
			                <p class='mui-ellipsis'>能和心爱的人一起睡觉，是件幸福的事情；可是，打呼噜怎么办？</p>
			            </div>
			        </a>
			        <span class="mui-media-object mui-pull-right" style="position: absolute; right: 2vw;top:0;">$2.60</span>
			    </li>
			    <li class="mui-table-view-cell mui-media">
			        <a href="javascript:;" style="padding-right: 15vw;">
			            <span class="mui-media-object mui-pull-left mui-icon mui-icon-plusempty" style="color: #007AFF;"></span>
			            <div class="mui-media-body">
			                木屋
			                <p class='mui-ellipsis'>想要这样一间小木屋，夏天挫冰吃瓜，冬天围炉取暖.</p>
			            </div>
			        </a>
			        <span class="mui-media-object mui-pull-right" style="position: absolute; right: 2vw;top:0;">$2.60</span>
			    </li>
			    <li class="mui-table-view-cell mui-media">
			        <a href="javascript:;" style="padding-right: 15vw;">
			            <span class="mui-media-object mui-pull-left mui-icon mui-icon-plusempty" style="color: #007AFF;"></span>
			            <div class="mui-media-body">
			                CBD
			                <p class='mui-ellipsis'>烤炉模式的城，到黄昏，如同打翻的调色盘一般.</p>
			            </div>
			        </a>
			        <span class="mui-media-object mui-pull-right" style="position: absolute; right: 2vw;top:2vw;">$2.60</span>
			    </li>-->
			</ul>

		<div style="position: fixed; bottom: 0; background: ; width: 100%; border-top:3px solid #007AFF;" class="mui-table-view-cell">
			<div style="float: left;">金额统计</div> 
			<div style="float:right" id="pc">
				
			</div>
	        
	    </div>

		
	</body>
	<script src="js/mui.min.js"></script>
	<script src="js/mui.enterfocus.js"></script>
	<script src="js/app.js"></script>

<script>
	
	 if(localStorage.length>0){  
	 	 var listclass="";
	    for(var i=0;i<localStorage.length;i++){  
            var classid = localStorage.key(i);
            var classids = localStorage.getItem(classid);
            //console.log(classids);
            var pp=0;
            mui.post('php/getpinfo.php',{
		         ids:classids
		 
	        },function(data){
		     //服务器返回响应，根据响应结果，分析是否登录成功；
		     var list = document.getElementById("cdlist") ;
		     var allpr = document.getElementById("pc") ;
		      var fragment = document.createDocumentFragment();
		      var li;
		       li = document.createElement('li');
		       
		       li.className = 'mui-table-view-cell mui-media';
		       
		       
		       li.innerHTML =      '<a style="padding-right: 15vw;">'+
                                        '<span class="mui-media-object mui-pull-left mui-icon mui-icon-plusempty" style="color: #007AFF;"></span>'+
                                        '<div class="mui-media-body">'+data["name"]+
                                        '<p class="mui-ellipsis">价格'+
                                        '</div></a><span class="mui-media-object mui-pull-right" style="position: absolute; right: 2vw;top:0;">$'+data["price"]+'</span></li>';
                                        
                                        
		      fragment.appendChild(li);
		      list.appendChild(fragment);
		      
		      pp+=parseInt(data["price"]);
		      // console.log(pp);
		       allpr.innerHTML='<a href="add.php?money='+pp+'">$<span id="allpr">'+pp+'</span><span class="mui-icon mui-icon-forward"></span></a>';
	      },'json'
        );
        
        }  
	 }

   //console.log(listclass);
	
</script>
</html>