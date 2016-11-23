<?php
	session_start();
	// print_r($_SESSION['id']);
	// print_r($_SESSION['username']);
	require_once('php/connect.php');
	$sql = "select * from books order by id desc";
	$query = $mysqli -> query($sql);
	if ($query&&$query->num_rows) {
		while ($row = $query->fetch_assoc()) {
			$data[] = $row;
		}
	}
	// print_r($data);
	// $id=$_GET[];

	if (isset($_SESSION['id'])) {
			$sql1="select * from books where userid=".$_SESSION['id'];
			$query1 =  $mysqli->query($sql1);
			if ($query1&&$query1->num_rows) {
				while ($row1 = $query1->fetch_assoc()) {
					$data1[]=$row1;
			}
		}
	}


	$arr=array('男','女','保密'); 

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>图书交流</title>
		<meta name="description" content="这里是图书交流平台">
		<meta name="keywords" content="图书交流">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/jquery-3.1.1.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="js/lightbox/themes/default/jquery.lightbox.css"> -->
		<script type="text/javascript">
			
		</script>

	</head>
	<body>
		<div class="contain">
			<span class="header">
				<ul>
					<?php 
						if (empty($_SESSION['id'])) {
							echo "<a href='login.php'><li>登录</li></a>
									<a href='signup.php'><li>注册</li></a>";
						}else{
							echo "<li>欢迎您</li>";
							echo"<li style='text-align:left;'>".$_SESSION['username']."</li>";
							echo "<a href='php/logout.php?act=out'><li style='text-align:right;'>退出</li></a>";
						}
					?>
					<!-- <a href="login.php"><li>登录</li></a>
					<a href="signup.php"><li>注册</li></a>
 -->

<!-- 					<li><?php echo $_SESSION['username']?></li>
 -->					<li>换肤</li>

				</ul>
			</span>
			<div class="left">
				<span class="change-text">图书交流</span>
				<div class="books-con">
					<div class="new-books">最新书籍</div>
					<ul class="books" id="books">
						<!-- <li class="book" id="booking"><span class="span1">1、</span><span class="span2">半生缘</span></li> -->
						<?php
							if (empty($data)) {
								echo "当前没有";
							}else{
								foreach ($data as $value ) {
									$a = $value['sex']-1;						?>
								
										<li  class="book">
											<span class="span2">《<?php echo $value['bookname'];?>》</span>
											<!-- 图书详情 -->
											<div class="book-info" >
												<div class="info-name">《<?php echo $value['bookname']?>》</div><span class="close">×</span>
												<div class="info-text">借出人：<?php echo $value['username']?></div>
												<div class="info-text">借出人性别：<?php print_r($arr[$a])?></div>
												<div class="contact-text">联系方式：</div>
												<div class="contact-num"><?php echo $value['contact']?></div>
												<div class="info-text">该书作者：<?php print_r($value['author'])?></div>
												<div class="info-text">图书简介：</div>
												<div class="info-info">
						　　						<?php echo $value['bookcomment']?>
												</div>

												<div class="contact-text" style="margin-top: 20px;">发布时间：</div>
												<div class="contact-num"><?php echo $value['time']?></div>
											</div>
											
										</li>	

						<?php
								}
							}
						?>
					</ul>


			
				</div>
				
			</div>
			<!-- 右边 -->
			<div class="right">
				<div class="text">
				<div class="right-text help-text" id="help-text">求<br>书</div>
				<div class="right-text active-text" id="active-text">活<br>动</div>
				<div class="right-text" id="publish-text">发<br>布<br>书</div>
				<div class="right-text" id="published-text">已<br>发<br>布</div>
				</div>

				<div class="helps">
					<div>
					我想看百年孤独这本书，谁有，能接给我看看吗？谢谢
					，QQ：185601539
					</div>
					
				</div>

				<div class="panels">
					<div class="panel help " id="help">
						<div class="panel-help-text">写下你想要的书：</div>
						<form name="help" method="post" action="help.add.php">
							<textarea class="help-eare" id="helpeare" name="helpeare"></textarea>
							<input type="submit" value="提交" class="help-sub">
						</form>
					</div>

					<div class="panel active " id="active">
					活动公告：
						<div class="active-con">
							本周六，<br>
							一本书，<br>
							一群人，<br>
							相聚于马尔代夫，<br>
							我们以书会友。<br>
						</div>
					</div>

					<div class=" panel publish" id="publish">
						<form name="booksinfo" method="post" action="php/book.add.handle.php">
							<label class="publish-name-text">书名:</label>
							<input type="text" name="bookname" id="bookname"  placeholder="书的全名" class="publish-name">
							<label class="author-text">作者：</label>
							<input type="text" name="author" placeholder="书的作者" id="author" class="author">
							<label class="publish-info-text">图书简介：</label>
							<textarea id="bookcontent" name="bookcontent" placeholder="图书的简单介绍，借出的期限，借出的条件。比如：请我吃饭，请我喝水......" class="publish-info"></textarea>
							<label class="contact-text">联系方式：</label>
							<input type="text" name="contact" id="contact" placeholder="qq/tel:1875601539" class="publish-contact">
							<!-- <input type="hidden" name="userin" id="userid" value="<?php echo $_SESSION['id']?>" > -->
							<input type="submit" id="button" name="button" class="publish-sub" value="提交">
						</form>		
					</div>

					<div class="panel published" id="published">
						<div class="published-text">已经发布：</div>
						<ul>
							<?php
							if (isset($_SESSION['id'])) {
								if (empty($data1)) {
									echo "你还没有书，要先去发布书哦";
								}else{
									foreach ($data1 as $value1) {
							
								
							?>
										<li>
											<div class="published-book-name"><?php echo $value1['bookname']?></div>
											<!-- 下拉列表 -->
											<div class="select" id="select">
												<div class="value" id="value">
												<?php 
													$show = array("借出","已借");
													$shownum=$value1['show']-1;
													print_r($show[$shownum]);
													
												?>
												</div>
												<div class="options">
													<a class="option" href="./php/alter.handle.php?show=1&& id=<?php echo $value1['id']; ?> ">借出</a>
													<a class="option" href="./php/alter.handle.php?show=2&&id=<?php echo $value1['id'];?>">已借</a>
												</div>
											</div>


											<a href="php/book.del.php?id=<?php echo $value1['id']?>" class="delete">删除</a>
										</li>
									
							<?php
										}
									}
								}else{
							?>
									<li>
										<div style="margin-left: 20px;font-size: 20px;font-weight:bolder;">你还没有登录，请先登录</div>
									</li>

							<?php
								}
							?>


							<!-- 
							<li>
								<div class="published-book-name">你的孤独虽败犹荣</div>
								<a href="#" class="delete">删除</a>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
			<script src="js/style.js"></script>
			<!-- <script src="js/lightbox/jquery.lightbox.min.js"></script> -->
	</body>
</html>