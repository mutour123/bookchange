<?php
	require_once('connect.php');
	// print_r($_POST);
	if ((!isset($_POST['helpeare'])&&(!empty($_POST['helpeare'])))) {
		echo "<script>alert('不能为空')；window.location.href='indexi.php';)</script>";
	}
	$comment=$_POST['helpeare'];
	$insetsql="insert into active (comment) values('$comment')";
	$sql=$mysqli->query($insetsql);
	if ($sql) {
		echo "<script>alert('发布成功');window.location.href='index.php';</script>";
	}else{
		echo "发布失败";
		echo $mysqli->error;
	}
?>