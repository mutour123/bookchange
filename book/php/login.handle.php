<?php
	session_start();
	session_cache_expire() ;
	require_once('connect.php');
	if (!(($_POST['username'])&&(!empty($_POST['username'])))) {
		echo "<script>alert('信息填写有误，登录失败');window.location.href='../login.php';</script>";
	}else if(!(($_POST['password'])&&(!empty($_POST['password'])))) {
		echo "<script>alert('信息填写有误，登录失败');window.location.href='../login.php';</script>";
	}else{
		$validate=$_POST['validate'];
		if ($validate!==$_SESSION['code']) {
			echo "<script>alert('验证码有误');window.location.href='../login.php';</script>";
		}else{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$insertsql="select * from user where name like '$username'";
			$query=$mysqli->query($insertsql);
			if ($query&&$query -> num_rows) {
				while ($row = $query -> fetch_assoc()) {
					$data[]=$row;
				}
			}

			if (empty($data)) {
				echo "<script>alert('没有当前用户，请先注册');window.location.href='../login.php';</script>";
			}else{
				foreach ($data as $value) {
					if ($password==$value['password']) {
						// print_r($value['id']);
						// print_r($value['name']);
						$_SESSION['id']=$value['id'];
						$_SESSION['sex']=$value['sex'];
						// print_r($_SESSION['id']);
						$_SESSION['username']=$value['name'];
						// print_r($_SESSION['username']);
						
						echo "<script>window.location.href='../index.php';</script>";

					}else{
						echo "登录失败";
					}
				}
			}
		}
	}

?>