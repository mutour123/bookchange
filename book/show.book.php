<?php
	require_once('php/connect.php');
	$id=intval($_GET['id']);
	$sql="select * from books where id=$id";
	$query = $mysqli -> query($sql);
	if ($query&&$query->num_rows) {
		$row=$query->fetch_assoc();
		// print_r($row);
	}else{
		echo "这本书不存在";
		exit;
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>详细内容</title>
		<style type="text/css">
			html,body{
				width: 100%;
				height: 100%;
				padding:0;
				margin: :0px;
				box-sizing: border-box;
				background-image: url(img/1.jpg);
			}
			.title{
				text-align: center;
				border-bottom: 1px solid;
				padding-bottom: 10px;
			}
			.contain{
				width: 60%;
				/*height: 100%;*/
				margin: 0 auto;
				border: 1px solid;
				box-sizing: border-box;;
				padding-top: 20px;
			}
			.info{
				width: 100%;
				/*height: 100%;*/
				border-top: 1px solid;
				border-bottom: 1px solid;
				height: 60%;
				font-size: 18px;
				box-sizing: border-box;
				padding: 10px;
			}
			.time{
				/*width: 100%;*/
				height: 30px;
				font-size: 18px;
				/*padding: 10px;*/
				padding-left: 10%;
				/*box-sizing: border-box;*/

			}
			.abstract{
				font-size: 20px;
				/*font-weight: bold;*/
			}
		</style>
	</head>
	<body>
		<div class="contain">
			<h1 class="title"><?php echo $row['bookname'] ?></h1>
			<span class="abstract">简介：</span>
			<div class="info"><?php echo $row['bookcomment'] ?></div>
			<span class="abstract">联系方式：</span>
			<div class="time"><?php echo $row['contact'] ?></div>
		</div>
	</body>
</html>