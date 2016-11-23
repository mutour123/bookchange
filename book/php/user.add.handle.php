<?php
	session_start();
	require_once('connect.php');
	if (!(($_POST['username'])&&(!empty($_POST['username'])))) {
		echo "<script>alert('信息填写不准确，注册失败！');window.locaction.href='../signup.php';</script>";
	}else if(!(($_POST['password'])&&(!empty($_POST['password'])))) {
		echo "<script>alert('信息填写不准确，注册失败！');window.location.href='../signup.php';</script>";
	}else if(!(($_POST['sex'])&&(!empty($_POST['sex']))))  {
		echo "<script>alert('不知道你的性别，拒绝服务');window.location.href='../signup.php';</script>";

	}else if (!(($_POST['validate'])&&(!empty($_POST['validate']))))   {
		echo "<script>alert('验证码还没填呢');window.location.href='../signup.php';</script>";

	}else{
		$validate=$_POST['validate'];
		$username=$_POST['username'];
		$sql1="select name from user where name='".$username."'";
		$query1=$mysqli->query($sql1);
		if ($query1&&$query1->num_rows) {
			echo "<script>alert('亲该用户名已经被用了哦，请更换一个');window.location.href='../signup.php';</script>";
		}else if ($_SESSION['code']!==$validate) {
			echo "<br>";
			echo "<script>alert('验证码错误');window.location.href='../signup.php';</script>";
		}else{
			$password=$_POST['password'];
			$sex=$_POST['sex'];
			$insertsql="insert into user(name,password,sex) values('$username','$password','$sex')";
			$sql = $mysqli->query($insertsql);
			if ($sql) {
				echo "<script>alert('注册成功');window.location.href='../index.php'</script>";
			}else{
				echo "注册失败";
				echo $mysqli->error;
			}
	}
}
?>