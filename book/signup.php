<html>
	<head>
		<meta charset="utf-8">
		<title>注册界面</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<script src="js/jquery-3.1.1.js"></script>
		<script type="text/javascript">
			window.onload=function(){
			var sub=document.getElementById("submit");
			sub.onclick=check;
			};

			function check(){
				// alert("nihao ");
				var username=document.getElementById('username').value;
				var password=document.getElementById('password').value;
				var repassword=document.getElementById('repassword').value;
				if (username=="") {
					alert("用户名不能为空");
					// document.form.username.focuse();
					return false;
				}
				if (password=="") {
					alert("密码不能为空");
					return false;
				}
				if (repassword=="") {
					alert("请确认密码");
					return false;
				}
				if (password!=repassword) {
					alert("两次密码不一样");
					return false;
				}
			}
			// 下拉列表点击隐藏显示
			$(document).ready(function(){
				flag=true;
				$('#text1').click(function(event){
					if (flag) {
						$('#select').css("display","block");
						event.stopPropagation();
						flag=false;
					}else{
							$('#select').css("display","none");
							event.stopPropagation();
							flag=true;
						}
					});

					$('#plcher').click(function(){
						if (flag) {
							$('#select').css("display","block");
							event.stopPropagation();
							flag=false;
						}else{
							$('#select').css("display","none");
							event.stopPropagation();
							flag=true;
						}
					})
					// 任意点击隐藏
					$('body').click(function(){
						$('#select').css("display","none");
					});
					// 得到值
					$('#man').click(function(){
						$('#text1').text($(this).text());
						$('#sex')[0].value=1;
						$('#plcher').css("display","none");
					});
					$('#girl').click(function(){
						$('#text1').text($(this).text());
						$('#sex')[0].value=2;
						$('#plcher').css("display","none");
					});
					$('#secrit').click(function(){
						$('#text1').text($(this).text());
						$('#sex')[0].value=3;
						$('#plcher').css("display","none");
					});

			})
		</script>

	</head>
	<body>
	<span  class="spanone">
		<a href="index.php"><div class="index">首页</div></a>
		<a href="login.php"><div class="index">登录</div></a>
	</span>
		<div class="contain">
			<h2 class="welcome">欢迎注册</h2>
			<form action="php/user.add.handle.php" method="post"  id="loginPage">
				<input type="text" id="username" name="username" class="text" placeholder="请填写真实姓名">
				<!-- 下拉列表 -->
				<div class="div">
					<span id="plcher" class="placeholder">点击选择性别：</span>
					<div class="text1" id="text1"></div>
					<div class="div1"></div>
					<div class="div2"></div>

					<ul id="select">
						<li id="man">帅哥</li>
						<li id="girl" >美女</li>
						<li id="secrit">保密</li>
					</ul>
				</div>
				

				<input type="password" id="password" name="password" class="text" placeholder="输入密码">
				<input type="password" id="repassword" class="text" placeholder="确认密码">
				<div class="text" style=" background-color: #fff;width: 240px;"><img src="./php/validate.php"></div>
				<input type="text" id="validate" name="validate" class="text" placeholder="请输入验证码" style="font-size: 13px;letter-spacing: 3px;">
				<input type="hidden" id="sex" name="sex"  > 
				<button class="text" id="submit">注册</button>
				<!-- <input type="button" id="submit" value="注册" class="text"> -->

			</form>
		</div>
	</body>
</html>