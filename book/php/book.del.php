<?php 
    require_once('connect.php');
	$id=$_REQUEST['id'];
	$sql="delete from books where id=$id";
	$query=$mysqli->query($sql);
	if ($query) {
		echo "<script>alert('删除成功');window.location.href='../index.php';</script>";
	}
 ?>