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
		<style type="text/css">
			.mui-table-view-cell>a:not(.mui-btn){margin: -11px -22px;}
			.chart_li{background:#fafafa; border: 1px #FAFAFA solid; position:relative; padding:0; height:80px; margin-top:5%; z-index:9;}
			.chart_li_div{height:60px; position:absolute; width:auto; left:0; top:10px; text-align:left; z-index:8;}
			.chart_li_pic{height:60px; width:auto; z-index:8;}
			.chart_li_info{height:80px; margin-left:105px; float:left; z-index:8; overflow:hidden;}
			.chart_li_info span{display:block; height:30px; line-height:30px; padding-top:9px; z-index:8; max-width:120px;}
			.chart_li_num{ border:none; height:20px; position:absolute; right:50px; top:30px; overflow:hidden; z-index:8; padding:0; width:75px;}
			.chart_li_input{background:#FAFAFA; width:20px;}
			.chart_li_button{width:20px;}
			.chart_li_price{position:absolute; right:5px; height:80px;}
			.chart_li_price span{ display:block; height:30px; line-height:30px; padding-top:25px;}
		</style>

		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
 
	</head>
	<body style="background-color: #FFFFFF;">	
		<header class="mui-bar mui-bar-nav" style="background: #FFFFFF;">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title" style="font-size:1.5rem;">洗衣籃</h1>
            <a class="mui-icon mui-icon-right-nav mui-pull-right" style="font-size:0.8rem;" onClick="empty_localstorage();">臨時清空</a>
		</header>

		<div class="mui-content" style="background-color: #FFFFFF; padding-bottom: 12vw;">
			<div style="padding:3vw 3.5vw 0 3.5vw; background: #FFFFFF;">
				<p>洗衣籃列表</p>
			 
				<ul class="mui-table-view" id="cdlist" style="padding-bottom:80px;">

				</ul>

				<div style="position: fixed; bottom: 0px; left:0; background:#FFFFFF; z-index:99999; width: 100%; height:100px; margin:0 auto;" class="mui-table-view-cell">
					<div style="float: left; height:22px; line-height:22px;">金额统计</div> 
					<div style="float: right; height:22px; line-height:22px;" id="pc">
				
					</div>
	        		<div style="clear:both; border-bottom:2px #c8c7cc solid; margin-bottom:22px; "></div>
                	<div style="float:left; height:30px; line-height:26px; border:2px #c8c7cc solid; width:40%; background-color:#FFFFFF; text-align:center;" >
                    	<span onClick="window.history.go(-1);" style="font-size:1.02rems; color:#000000; font-weight:bold;">繼續挑選</span>
                    </div>
                	<div style="float:right; height:30px; line-height:26px; width:30%; margin-right:5%; background-color:#7ec855; text-align:center;">
                    	<span onClick="goToAdd()" style="color:#FFFFFF; font-size:1.02rem; font-weight:bold;">確認下單</span>
                    </div>
	   			</div>
			</div>
		</div>
	</body>
	<script src="js/mui.min.js"></script>
	<script src="js/mui.enterfocus.js"></script>
	<script src="js/app.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
<script>
	function goToAdd(){
		var money=document.getElementById("allpr").innerHTML;	
		window.location.href="add.php?money="+money;
	}
	
	function empty_localstorage(){
		if(window.confirm("確認清空購物車？")){
			localStorage.clear();
			window.location.reload();
		}
		
	}
	mui.init();
		$(document).ready(function(){
				var btnArray = ['确认', '取消'];
				//第一个demo，拖拽后显示操作图标，点击操作图标删除元素；
				$('#cdlist').on('tap', '.mui-btn-red', function(event) {
					
					var elem = this;
					var li = elem.parentNode.parentNode;
					mui.confirm('确认删除该条记录？', '洗衣籃', btnArray, function(e) {
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
				
				/*  Debug Start  */
				
			//打开关于页面
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
								if(data["gprice"]==0){
									jiage=data["price"];
								}else{
									jiage=data["gprice"];
								}
						//console.log(data);
					//服务器返回响应，根据响应结果，分析是否登录成功；
					var list = document.getElementById("cdlist") ;
					var allpr = document.getElementById("pc") ;
					var fragment = document.createDocumentFragment();
					var li;
					li = document.createElement('li');
					li.className = 'mui-table-view-cell mui-media chart_li'; 
					li.id='chart_li-'+data["id"];
					li.innerHTML = 
						'<div class="mui-slider-right mui-disabled"><a class="mui-btn mui-btn-red" id="'+data["id"]+'" data-nums="'+data["nums"]+'"  data-price="'+jiage+'">删除</a></div>'+
						'<div class="mui-slider-handle" data-ids="'+data["id"]+'">'+
							'<div class="chart_li_div"><img src="img/chart_img/'+data["pic"]+'" class="chart_li_pic"/></div>'+ 
							'<div class="chart_li_info"><span>'+data["name"]+'</span><span>'+data["name"]+'</span></div>'+
							'<div class="mui-numbox chart_li_num" data-numbox-step="1" data-numbox-min="0" data-numbox-max="100">'+
								'<button class="mui-btn mui-numbox-btn-minus chart_li_button" type="button" style="background-color:#bec3c7; color:#FFFFFF;" value="'+data["id"]+'_-">-</button>'+
								'<input class="mui-numbox-input chart_li_input" id="input_'+data["id"]+'" style="border:none; background-color:#fafafa;" type="number" value="'+data["nums"]+'" />'+
								'<button class="mui-btn mui-numbox-btn-plus chart_li_button" type="button" style="background-color:#bec3c7; color:#FFFFFF;" value="'+data["id"]+'_+">+</button></div>'+
							'<div class="chart_li_price"><span>$'+jiage+'</span></div>'
						'</div>';
					fragment.appendChild(li);
					list.appendChild(fragment);
					
					pp+=parseInt(jiage)*parseInt(data["nums"]);
					allpr.innerHTML='<a href="add.php?money='+pp+'">$<span id="allpr">'+pp+'</span></a>';
					},'json');
				}
			}
		}
	$('#cdlist').on('tap', 'button', function(event) {
		var button_id_arr= this.value.split("_");
		var button_id=button_id_arr[0];
		var button_value = button_id_arr[1];
		var value_before=$("#input_"+button_id).val();
		//alert(button_id[0]);	
		if(button_value == "+"){
			var value_now=parseInt(value_before)+1;
			$("#input_"+button_id).val(value_now);
			localStorage.setItem(button_id,value_now);
		}else{
			var value_now=parseInt(value_before)-1;
			$("#input_"+button_id).val(value_now);
			localStorage.setItem(button_id,value_now);
			if(value_now==0){localStorage.removeItem(button_id);}
		}
		
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
						if(data["gprice"]==0){
							jiage=data["price"];
						}else{
							jiage=data["gprice"];
						}
						var allpr = document.getElementById("pc") ;
						pp+=parseInt(jiage)*parseInt(data["nums"]);
						allpr.innerHTML='<a href="add.php?money='+pp+'">$<span id="allpr">'+pp+'</span></a>';
					}
				,'json');
			}
		}
							
	});
			/*  Debug End  */
});
				
   //console.log(listclass);
	
</script>
</html>