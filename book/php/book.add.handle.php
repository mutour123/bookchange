<?php
session_start();
	require_once('connect.php');
	// print_r($_POST);查看传过来的内容
	// 把传过来的信息入库，在入库之前对所有的信息校验

	if (!($_POST['bookname']&&(!empty($_POST['bookname'])))) {
		echo "<script>alert('信息填写不准确');window.location.href='../index.php';</script>";
	}else if (!($_POST['bookcontent']&&(!empty($_POST['bookcontent'])))) {
		echo "<script>alert('不能为空');window.location.href='../index.php';</script>";
	}else if (!($_POST['contact']&&(!empty($_POST['contact'])))) {
		echo "<script>alert('木有联系方式，都不给我一个找你的机会吗');window.location.href='../index.php';</script>";
	}else if (empty($_SESSION['id'])) {
		echo "<script>alert('嘿！你还没有登录呢');window.location.href='../index.php';</script>";
	}else{
	$sex=$_SESSION['sex'];
	$userid=$_SESSION['id'];
	$username=$_SESSION['username'];
	$bookname = $_POST['bookname'];
	$bookcontent=$_POST['bookcontent'];
	$contact=$_POST['contact'];
	$author=$_POST['author'];
	$t = time();
	$dateline=date("Y-m-d",$t);
	// print_r($dateline);

	$insertsql="insert into books(bookname,bookcomment,contact,time,userid,sex,author,username) values('$bookname','$bookcontent','$contact','$dateline','$userid','$sex','$author','$username')";
	$sql = $mysqli->query($insertsql);
	if ($sql) {
		echo "<script>alert('发布成功');window.location.href='../index.php';</script>";
	}else{
		echo "发布失败";
		echo $mysqli->error;
	}
}
?>