<?php
	session_start();
	require_once('connect.php');
	$id=$_GET['id'];
	$userid=$_SESSION['id'];
	// print_r($userid);
	$sql1="select id from books where userid=55";
	$query1=$mysqli->query($sql1);
	if ($query1&&$query1->num_rows) {
		// print_r('成功');
		while ( $row = $query1->fetch_assoc()) {
			$data[] = $row;
		}
		// print_r($data);
		foreach ($data as $value) {
			if ($value['id']==$id) {
				$show =$_GET['show'];
				if ($show ==1) {
					$sql="UPDATE `bookchange`.`books` SET `show` = '1' WHERE `books`.`id` = $id;";
					$query=$mysqli->query($sql);
					if ($query) {
						echo "<script>window.location.href='../index.php';</script>";
					}else{
						echo "<script>alert('操作不成功,请及时反馈');</script>";
					}
					//window.location.href='../index.php';
				}
				if ($show == 2) {
					$sql="UPDATE `bookchange`.`books` SET `show` = '2' WHERE `books`.`id` = $id;";
					$query=$mysqli->query($sql);
					if ($query) {
						echo "<script>window.location.href='../index.php';</script>";
					}else{
						echo "<script>alert('操作不成功,请及时反馈');window.location.href='../index.php';</script>";
					}
				}
			}
		}

	}



	
?>