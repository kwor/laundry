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
		<link href="css/mui.indexedlist.css" rel="stylesheet" />
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
			.text{position: relative;left: 60vw;bottom: -3vh; width: 40vw;  height: 10vh; z-index:999;}
			.text p{line-height: 4vw; color:#eee; z-index:999;}
			.click_roude,.click_roude_delete{width: 8vw; height: 8vw; z-index:99999;}
			.dp{display: none;}
			.mui-bar {
				-webkit-box-shadow: none;
				box-shadow: none;
			}
			.mui-input-row.mui-search .mui-icon-clear{left:70%;}
			#search_text{background: #FFFFFF; margin-bottom:10px;}
			#search_div{width: 100%; display:none; position:absolute; z-index:999999999; top:13vh;}
			#cancel{display:none;}
			.mui-placeholder{width:80%;}
			
			.for_canvas{width:90%; z-index:9999999; height:100%; position:absolute;}
			
			.delete_one{position: absolute; bottom:10px;width: 100%;height: 100%;color: #FFFFFF;text-align: center;}
			.hide_delete{ display:none; position:absolute;opacity: 1;}
			.show_delete{display:block;opacity: 1;}
			.click_roude_delete{position:absolute; bottom:-20px; z-index:99999;}
		</style>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script type="text/javascript">
			
	
		 
			function show_search_div(){
				var search_div=document.getElementById("search_text");
				var search_content=document.getElementById("search_div");
				var cancel=document.getElementById("cancel");
				search_content.style.display="block";
				search_div.style.width="80%";
				search_div.style.marginBottom="0px";
				search_div.style.cssFloat="left";
				cancel.style.display="block";
				cancel.style.cssFloat="right";
				cancel.style.lineHeight="34px";
			}
			function hide_search(){
				var search_div=document.getElementById("search_text");
				var search_content=document.getElementById("search_div");
				var cancel=document.getElementById("cancel");
				search_content.style.display="none";
				search_div.style.width="100%";
				search_div.style.marginBottom="10px";
				search_div.style.cssFloat="none";
				cancel.style.display="none";
				cancel.style.cssFloat="none";
				cancel.style.lineHeight="34px";
			}
			
		</script>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="padding-right: 15px;background: #ffffff; z-index:999999;">
			<button type="button" class="mui-left mui-btn  mui-btn-link mui-btn-nav mui-pull-left"  >
				<a class="mui-icon mui-icon-bars" style="font-weight:bold; color:#3d3d3d;" href="menu.php"></a>
			</button>	
			<h1 class="mui-title">Neighborhood Express</h1>
			<button id='setting' class=" mui-pull-right mui-btn-link " >
				<a href="choiceClothes.php">
					<img src="images/shopcart.jpg" style="width: 6vw;height: 6vw;position: absolute;right: -1vw;top: 2.5vw;" />
				</a>
				<div class="clicks_total">
					<span onClick="window.location.href='choiceClothes.php'">11</span>
				</div>
			</button>
		</header>
		<div class="mui-content">
		 
			<div id='list' style="height:auto;">
	      		<div class="mui-content-padded mui-indexed-list-search mui-input-row mui-search" style="border:none;">
				<input type="search" id="search_text" class="mui-input-clear mui-indexed-list-search-input" placeholder="搜索" onFocus="show_search_div()"><span id="cancel" onClick="hide_search()">取消</span>
				 <div style=" clear:both;"></div>
				</div>
				
				<div class="mui-indexed-list-bar" style="display: none;">
					<a>A</a>
				</div>
				<div class="mui-indexed-list-alert"></div>
				
				<div class="mui-indexed-list-inner" id="search_div">
					
					<ul class="mui-table-view">
						<?php
						//echo $id;
					 $sql2 = "select * from price ";
					 //echo $sql;
					 $result2 = $mysqli->query($sql2);
					// print_r($result);
				     while($row2 =  $result2->fetch_array(MYSQLI_ASSOC)){
					?>
						<li data-value="<?=$row2["id"]?>" onClick="add_item('for_exchange_<?=$row2["id"]?>')" data-tags="ChangShaHuangHuaGuoJi" class="mui-table-view-cell mui-indexed-list-item"><?=$row2["name"]?>-價格$<?=$row2["price"]?></li>
					<?php		
					 }
					?>
					</ul>
				</div>
				
 
				<!--导航start-->
                <div style="background: #FFFFFF; top:-2vh; z-index:999999;height: 40px;" class=" mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted" id="menu_div">
                <div id="direction_icon" style="width:98%; margin-left:1%;">
                	<img alt="left" id="scroll_bar_left" src="images/left.png" class="scroll_bar_icon"/>
                	<img alt="right" id="scroll_bar_right" src="images/right.png" class="scroll_bar_icon"/>
				</div>
				    <div id="segmentedControl" class="mui-scroll nav-list" style="color:rgba(152, 150, 150, 0.71);font-size:2vh ; font-weight: lighter; height:45px; line-height: 45px;">
				        <a class="mui-control-item mui-active"  >
				           乾洗
				        </a>
				        <a class="mui-control-item" >    
                                         濕洗
				        </a>
				        <a class="mui-control-item" >
				            禮服/皮革
				        </a>
				        <a class="mui-control-item" >
				           配件   
				        </a>
				        <a class="mui-control-item" >
				            家居用品
				        </a>
				     
				    </div>
				</div>

<!--  Menu Fixed  -->
<script type="text/javascript" >
function menuFixed(id){
var obj = document.getElementById(id);
var _getHeight = obj.offsetTop;

window.onscroll = function(){
changePos(id,_getHeight);
}
}
function changePos(id,height){
var obj = document.getElementById(id);
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
if(scrollTop < height){
obj.style.position = 'relative';
obj.style.top= '-2vh';
}else{
obj.style.position = 'fixed';
obj.style.top= '5vh';
}
}

</script>

       <div id="lab" style="z-index:99;">
				<!--导航end-->
				<?php 
                  for ($x=1; $x<=6; $x++) {
                  	if ($x==1){
	            ?>
	            
				<ul style="margin-top:-2vh;" class="image-ul" >
					<?php }else{ ?>
					
			<ul style="margin-top:-2vh;display: none;" class="image-ul" >
					
					<?php
                      } 
					//echo $id;
					 $sql = "select * from price where class=".$x." order by id desc";
					 //echo $sql;
					 $result = $mysqli->query($sql);
					// print_r($result);
				     while($row =  $result->fetch_array(MYSQLI_ASSOC)){
				     	
                   ?>
  
         <?php if ($row["pic"]!=null&&$row["pic"]!=""){ ?>
					<li data-click="0"   class="mui-card-header mui-card-media clicksnum"  style="height:40vw;background-image:url(img/<?=$row["pic"]?>);margin-bottom: 1px; position:relative;" id="<?=$row["id"]?>">					

        <?php }else{ ?>

					<li data-click="0"   class="mui-card-header mui-card-media clicksnum"  style="height:40vw;background-image:url(img/clothes2.jpg);margin-bottom: 1px; position:relative;" id="<?=$row["id"]?>">					

         <?php
              }
          ?>				
						<div class="price"><a>$<?=$row["price"]?></a></div>
						<div class="click_roude"><div class="clicks" id="nums<?=$row["id"]?>"><a id="nums_value<?=$row["id"]?>">11</a></div></div>
                        <input type="hidden" class="for_sum" id="for_exchange<?=$row["id"]?>" value="0"/>
                        <div class="click_roude_delete"><div class="clicks hide_delete" onClick="delete_item('for_exchange-<?=$row["id"]?>')" id="delete<?=$row["id"]?>" style="background-color:#5cbd9c;" ><a style="font-size:4em;">-</a></div></div>
						<div class="text">
							<p style="color: #b1a4a4;font-size: 4.5vw;"><?=$row["name"]?></p>
							
							
						</div>
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
			
		<script src="js/mui.indexedlist.js"></script>
        
        <!--  Loading LocalStorage  -->
        <script language="javascript">
        	window.onload = function(){
				/*Others*/
				menuFixed('menu_div');
				document.getElementById("list").style.height="auto";
				
				if(localStorage.length>0){
					var listclass="";
					for(var i=0;i<localStorage.length;i++){
						var classid = localStorage.key(i);
						var classids = localStorage.getItem(classid);
						if(!isNaN(classid)){
							if(classids == 0){
								/*  User Delete all the items  */
								localStorage.removeItem(classid); 
							}
							else{
								var new_delete_ele="#delete"+classid;
								var new_nums_ele="#nums"+classid;
								var new_nums_value_ele="#nums_value"+classid;
						
								$(new_delete_ele).removeClass("hide_delete");
								$(new_delete_ele).addClass("show_delete");
						
								$(new_nums_ele).removeClass("hide_delete");
								$(new_nums_ele).addClass("show_delete");
						
								//console.log(classid);
						
								document.getElementById("for_exchange"+ classid).value=classids;
								$(new_nums_value_ele).html(classids);
								//console.log(classids);
						
								var sum=0;
								var items=document.getElementsByClassName("for_sum");
								for(var a=0; a<items.length;a++){
									sum = sum + parseInt(items.item(a).value);
								}
								$('.clicks_total').show().children('span').html(sum);
							}
						}
					}
				}
			}
        </script>
        
        <!--  Click Function  -->
		<script type="text/javascript" charset="utf-8">
			mui.init();
			mui.ready(function() {
				var header = document.querySelector('header.mui-bar');
				var list = document.getElementById('list');
				//calc hieght
				
				list.style.height = (document.body.offsetHeight - header.offsetHeight) + 'px';
				//create
				window.indexedList = new mui.IndexedList(list);
			});
		</script>
		
		
		<script>

		//添加列表项的点击事件
mui('#segmentedControl').on('tap', 'a', function(e) {
             var i = $(this).index();//下标第一种写法
            //var i = $('tit').index(this);//下标第二种写法
            //$(this).addClass('select').siblings().removeClass('select');
            $('#lab ul').eq(i).show().siblings().hide();
});  


			//点击图片次数
			var i = 0;
			var number = 0;
			var item_clicked = new Array();
			var value=0;
			function delete_item(obj){
				var new_array=obj.split("-");
				obj=new_array[0]+new_array[1];
				var value=$("#"+obj).val();
				value=value-2;
				if(value<-1){value=-1; localStorage.removeItem(new_array[1]); }
				$("#"+obj).val(value);
				//alert(value);	
				
			}
			
			function add_item(obj){
				var new_array=obj.split("_");
				obj=new_array[0]+"_"+new_array[1]+new_array[2];
				var value=$("#"+obj).val();
				value=parseInt(value)+1;
				localStorage.setItem(new_array[2],value);
				$("#"+obj).val(value);
				var new_nums_value_ele="#nums_value"+new_array[2];
				$(new_nums_value_ele).html(value);
				var sum=0;
				var items=document.getElementsByClassName("for_sum");
				for(var a=0; a<items.length;a++){
					sum = sum + parseInt(items.item(a).value);
				}
				$('.clicks_total').show().children('span').html(sum);
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
				//alert(value);	
				
			}
			
			$('.clicksnum').click(function(){
				i++;
				var item_id = $(this).index();//下标第一种写法
				var item_num=parseInt($("#for_exchange"+ this.id).val());
				if(item_num<1){
				$(this).children('.click_roude_delete').children('.clicks').removeClass('hide_delete');
				$(this).children('.click_roude_delete').children('.clicks').addClass('show_delete');
				
				}
				item_num++;
				localStorage.setItem(this.id,item_num);
				$(this).data("click",item_num);
				document.getElementById("for_exchange"+this.id).value=item_num;
				if(item_num == 0){
					localStorage.removeItem(this.id);
					$(this).children('.click_roude_delete').children('.clicks').removeClass('show_delete');
				}else{
					$(this).children('.click_roude_delete').children('.clicks').addClass('show_delete');
					}
				
				var sum=0;
				var items=document.getElementsByClassName("for_sum");
				for(var a=0; a<items.length;a++){
					sum = sum + parseInt(items.item(a).value);
				}
				
				
				//localStorage.setItem(i,this.id);
				$(this).children('.click_roude').children('.clicks').show().children('a').html(item_num);		
				$('.clicks_total').show().children('span').html(sum);
				//点击图片商品次数变化
				$(this).children('.click_roude').children('.clicks').animate({
				     width:'9vw',
				     height:"9vw",
				     borderRadius:'4.5vw',
				     fontSize:'2vh',
				     lineHeight:'9vw',
			    },100,function(){
				    	$(this).animate({
					     width:'7vw',
					     height:"7vw",
					     borderRadius:'3.5vw',
					     fontSize:'1vh',
					     lineHeight:'7vw',
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
	 

	</body>
</html>
