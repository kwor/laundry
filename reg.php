<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<title>註冊</title>
		<link href="css/mui.min.css" rel="stylesheet" />
	 
	<style>
			ul {
				font-size: 14px;
				color: #8f8f94;
			}
			.mui-btn {
				padding: 10px;
			}
			.mui-input-row span{position: absolute;left: 3vw;top: 2vw;}
			.mui-input-row input {position: absolute;left: 7vw; color:#000000;font-family:courier;}
			input::-webkit-input-placeholder{color:#D8D8D8; font-weight:100; font-size: 2vh;}
		</style>
	</head>
	<body>
	

	<body style="background: #FFFFFF;">
		<header class="mui-bar mui-bar-nav" style="background: #FFFFFF;">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">註冊</h1>
		</header>
		<div class="mui-content" style="background: #FFFFFF;">
			<form class="mui-input-group" action="php/reg.php" method="post">
				<div class="mui-input-row">
					<span class="mui-icon mui-icon-contact"></span>
					<input id='account' name="name" type="text" class=" mui-input" placeholder="請輸入姓名">
				</div>
				<div class="mui-input-row">
					<span class="mui-icon mui-icon-locked"></span>
					<input id='password' type="password" name="pass" class=" mui-input" placeholder="請輸入密碼">
				</div>
				<div class="mui-input-row">
					<span class="mui-icon mui-icon-locked"></span>
					<input id='password_confirm' type="password" name="repass" class=" mui-input" placeholder="請再次輸入密碼">
				</div>
				<div class="mui-input-row">
					<span class="mui-icon mui-icon-email"></span>
					<input id='email' type="email" name="email" class=" mui-input" placeholder="請輸入郵箱">
				</div>
                <div class="mui-content-padded">
                    <a id='reg' style="border-radius: 2vw;" class="mui-btn mui-btn-block mui-btn-primary data-loading-text ">註冊</a>
                </div>
			</form>

			<div id="msg" class="mui-content-padded">
				<p style="text-align: center ;color:red;"></p>
			</div>
		</div>
		<script src="js/mui.min.js"></script>
		<script src="js/app.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script>
            $('#reg').click(function () {
                var data = $('form').serialize();
                $.ajax({
                    url:'php/reg.php',
                    datatype:'json',
                    type:'post',
                    data:data,
                    success:function (msg) {
                        var msg = JSON.parse(msg)
                        $('#msg p').text(msg[0].msg);
                        if(msg[0].code==200){
                            setTimeout(function () {
                                location.href="login.php";
                            }, 1000);
                        }

                    }
                })
            })

		</script>
	</body>

</html>