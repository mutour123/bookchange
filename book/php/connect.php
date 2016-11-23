<?php
	require_once('config.php');
	// 建立到mysqli的链接，并打开数据库
	$mysqli = new mysqli(HOST,USERNAME,PASSWORD,"bookchange");
	if ($mysqli -> connect_errno) {
		die('Connect Error:'.$mysqli->connect_errno);
	}else{
		// echo "链接成功";
		$mysqli->set_charset('utf8');
	}
?>