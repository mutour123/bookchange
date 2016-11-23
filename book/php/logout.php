<?php
	header("content-type:text/html;charset=utf-8");
	session_start();
	$act=$_REQUEST['act'];
	if ($act=='out') {
		$_SESSION=array();
		if (empty($_SESSION['id'])) {
			session_destroy();
			echo "<script>window.location.href='../index.php';</script>";
		}


	}
?>