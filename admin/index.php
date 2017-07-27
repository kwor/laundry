<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title></title>
	<link href="../css/mui.min.css" rel="stylesheet" />
		<link href="../css/style.css" rel="stylesheet" />
		<style>
			.area {
				margin: 20px auto 0px auto;
			}
			
			.mui-input-group {
				margin-top: 10px;
			}
			
			.mui-input-group:first-child {
				margin-top: 20px;
			}
			
			.mui-input-group label {
				width: 22%;
			}
			
			.mui-input-row label~input,
			.mui-input-row label~select,
			.mui-input-row label~textarea {
				width: 78%;
			}
			
			.mui-checkbox input[type=checkbox],
			.mui-radio input[type=radio] {
				top: 6px;
			}
			
			.mui-content-padded {
				margin-top: 25px;
			}
			
			.mui-btn {
				padding: 10px;
			}
			
			.link-area {
				display: block;
				margin-top: 25px;
				text-align: center;
			}
			
			.spliter {
				color: #bbb;
				padding: 0px 8px;
			}
			
			.oauth-area {
				position: absolute;
				bottom: 20px;
				left: 0px;
				text-align: center;
				width: 100%;
				padding: 0px;
				margin: 0px;
			}
			
			.oauth-area .oauth-btn {
				display: inline-block;
				width: 50px;
				height: 50px;
				background-size: 30px 30px;
				background-position: center center;
				background-repeat: no-repeat;
				margin: 0px 20px;
				/*-webkit-filter: grayscale(100%); */
				border: solid 1px #ddd;
				border-radius: 25px;
			}
			
			.oauth-area .oauth-btn:active {
				border: solid 1px #aaa;
			}
			
			.oauth-area .oauth-btn.disabled {
				background-color: #ddd;
			}
			.mui-input-row span{position: absolute;left: 3vw;top: 2vw;}
			.mui-input-row input {position: absolute;left: 7vw; color:#000000;font-family:courier;}
			input::-webkit-input-placeholder{color:#D8D8D8; font-weight:100; font-size: 2vh;}
		</style>

	</head>
	<body style="background-color: #FFFFFF;">
		<body>
		<header class="mui-bar mui-bar-nav" style="background-color: #FFFFFF;">
			<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
				<span class="mui-icon mui-icon-left-nav"></span>
			</button>
			<h1 class="mui-title">业务管理登陸</h1>
		</header>
		<div class="mui-content" style="background-color: #FFFFFF;">
			<form id='login-form' class="mui-input-group">
				<div class="mui-input-row">
					<span class="mui-icon mui-icon-contact"></span>
					<input id='username' type="text" name="username" class=" mui-input" placeholder="請輸入账号">
				</div>
				<div class="mui-input-row">
					<span class="mui-icon mui-icon-locked"></span>
					<input id='password' type="password" name="pass" class=" mui-input" placeholder="請輸入密碼">
				</div>
			</form>
			<!--<form class="mui-input-group" style="background-color: #FFFFFF;">
				<ul class="mui-table-view mui-table-view-chevron">
					<li class="mui-table-view-cell" style="color:#D8D8D8; font-weight:100; font-size: 2vh;">
						自動登錄
						<div id="autoLogin" class="mui-switch">
							<div class="mui-switch-handle"></div>
						</div>
					</li>
				</ul>
			</form>-->
			<div class="mui-content-padded" >
				<button id='login' style="border-radius: 2vw;" class="mui-btn mui-btn-block mui-btn-primary data-loading-text">登陸</button>
					
					<!--|</span> <a id='forgetPassword'>忘記密碼</a>-->
				</div>
			</div>
            <div id="msg" class="mui-content-padded">
                <p style="text-align: center ;color:red;"></p>
            </div>
		</div>
		<script src="../js/mui.min.js"></script>
		<script src="../js/mui.enterfocus.js"></script>
		<script src="../js/app.js"></script>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script>
            $('#login').click(function () {
                var data = $('#login-form').serialize();
                $.ajax({
                    url:'alogin.php',
                    datatype:'json',
                    type:'post',
                    data:data,
                    success:function (msg) {
                        var msg = JSON.parse(msg)
                        $('#msg p').text(msg[0].msg);
                        if(msg[0].code==200){
                            setTimeout(function () {
                                location.href="order_list.php";
                            }, 1000);
                        }   
                    }
                })
            })

        </script>
	</body>

</html>