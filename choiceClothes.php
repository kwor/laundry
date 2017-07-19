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

		<div class="mui-content" style="background-color: #FFFFFF; padding-bottom: 12vw;">
			<div style="padding:3vw 3.5vw 0 3.5vw; background: #FFFFFF;">
				<p>以下是您的服裝列表</p>
			</div>
			<ul class="mui-table-view" id="cdlist">

			</ul>

		<div style="position: fixed; bottom: 0; background:#FFFFFF; z-index:99999; width: 100%; border-top:3px solid #007AFF;" class="mui-table-view-cell">
			<div style="float: left;">金额统计</div> 
			<div style="float:right" id="pc">
				
			</div>
	        
	    </div>

		
	</body>
	<script src="js/mui.min.js"></script>
	<script src="js/mui.enterfocus.js"></script>
	<script src="js/app.js"></script>

<script>
	mui.init();
			(function($) {
	
				//第一个demo，拖拽后显示操作图标，点击操作图标删除元素；
				$('#cdlist').on('tap', '.mui-btn', function(event) {
					var elem = this;
					var li = elem.parentNode.parentNode;
					mui.confirm('确认删除该条记录？', '洗衣篮', btnArray, function(e) {
						if (e.index == 0) {
							
							 var classids = localStorage.removeItem(elem.id);
							 
						   var allpr = document.getElementById("pc") ;
						   var allprsnum = document.getElementById("allpr").innerHTML ;
						   //console.log(allprs);
						    pc=parseInt(elem.dataset.price)*parseInt(elem.dataset.nums);
						    pp=parseInt(allprsnum)-pc;
						    
						    //console.log(pp);
		                    allpr.innerHTML='<a href="add.php?money='+pp+'">$<span id="allpr">'+pp+'</span><span class="mui-icon mui-icon-forward"></span></a>';
		      				
							li.parentNode.removeChild(li);

						} else {
							setTimeout(function() {
								$.swipeoutClose(li);
							}, 0);
						}
					});
				});
				var btnArray = ['确认', '取消'];
	            $('#cdlist').on('tap', '.mui-slider-handle', function(event) { 
	            var elemv = this;
	            
	                  //打开关于页面
           mui.openWindow({
             url:'add_set.php?id='+elemv.dataset.ids, 
            
            });
            
	            });
			})(mui);
			
	 if(localStorage.length>0){  
	 	 var listclass="";
	    for(var i=0;i<localStorage.length;i++){  
            var classid = localStorage.key(i);
            //console.log(classid);
            
            if(!isNaN(classid)){
              var classidisnumber=classid;
              var classids = localStorage.getItem(classid);
            //console.log("1111");

           //console.log(classids);
            var pp=0;
            mui.post('php/getpinfo.php',{
		         ids:classidisnumber,
		         nums:classids
		 
	        },function(data){
	        	
	        	//console.log(data);
		     //服务器返回响应，根据响应结果，分析是否登录成功；
		     var list = document.getElementById("cdlist") ;
		     var allpr = document.getElementById("pc") ;
		     var fragment = document.createDocumentFragment();
		     var li;
		       li = document.createElement('li');
		       li.className = 'mui-table-view-cell mui-media'; 
		       li.innerHTML =      '<div class="mui-slider-right mui-disabled"><a class="mui-btn mui-btn-red" id="'+data["id"]+'" data-nums="'+data["nums"]+'"  data-price="'+data["price"]+'">删除</a></div>'+
                                   '<div class="mui-slider-handle" data-ids="'+data["id"]+'">'+data["name"]+'——价格$'+data["price"]+ '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+ 'x' + data["nums"] +'<div>';
		      fragment.appendChild(li);
		      list.appendChild(fragment);
		      
		      pp+=parseInt(data["price"])*parseInt(data["nums"]);
		      allpr.innerHTML='<a href="add.php?money='+pp+'">$<span id="allpr">'+pp+'</span><span class="mui-icon mui-icon-forward"></span></a>';
	      },'json'
        );
       } 
        }  
	 }

   //console.log(listclass);
	
</script>
</html>