<html>
	<head>
		<meta charset="utf-8">
		<title>登录界面</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<script type="text/javascript">
			window.onload=function(){
				var sub=document.getElementById('sub');
				sub.onclick=check;
			}
			function check(){
				// alert("niaho");
				var username=document.getElementById('username').value;
				var password=document.getElementById('password').value;
				if (username=="") {
					alert("用户名不能为空");
					return false;
				}
				if (password=="") {
					alert("密码不能为空");
					return false;
				}
			}
		</script>
	</head>
	<body>
	<span class="spanone">
		<a href="index.php"><span class="index">首页</span></a>
		<a href="signup.php"><span class="index">注册</span></a>
	</span>
		<div class="contain">
			<h2 class="welcome">欢迎登录</h2>
			<form action="php/login.handle.php" method="post" class="login-page">
				<input type="text" id="username" name="username" class="text" placeholder="username:">
				<input type="password" id="password" name="password" class="text" placeholder="password:">
				<div class="text" style=" background-color: #fff;width: 240px;"><img src="./php/validate.php"></div>
				<input type="text" id="validate" name="validate" class="text" placeholder="请输入验证码" style="font-size: 13px;letter-spacing: 3px;">
				<button id="sub" class="text">登录</button>
			</form>
		</div>
	</body>
</html>