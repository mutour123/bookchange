<?php
// 创建画布
	session_start();
	$img = imagecreatetruecolor(210, 40);

	$black = imagecolorallocate($img, 0, 0, 0);
	$green = imagecolorallocate($img, 0, 255, 0);
	$white = imagecolorallocate($img, 255, 255, 255);
	imagefill($img, 0, 0, $white);

	// 添加干扰点
	for( $i=0;$i<200;$i++){
		imagesetpixel($img, rand(0,210), rand(0,40), $black);
		imagesetpixel($img, rand(0,210), rand(0,40), $green);
	}
	// 生成随机验证码
	$fontfile="../font/msyh.ttc";
	$char="abcdefghijklmnpqrtuvwxy123456789";
	$code="";
	for ($i=0; $i <4 ; $i++) { 
		$color=imagecolorallocate($img, mt_rand(0,40), mt_rand(00,50), mt_rand(0,60));
		$size=mt_rand(16,20);
		$angle=mt_rand(-15,15);
		$x=25+$i*40;
		$y=mt_rand(26,30);
		
		// $j=mt_rand(0,$char.strlen()-1);
		$text=substr($char,mt_rand(0,31),1);
		$code.=$text;
		imagettftext($img, $size, $angle, $x, $y, $color, $fontfile, $text);
		}
		// echo $code;
		$_SESSION['code']=$code;

	// 添加线条
	for ($i=0; $i <5 ; $i++) { 
		$color=imagecolorallocate($img, mt_rand(50,90), mt_rand(80,200), mt_rand(90,180));
		imageline($img, mt_rand(0,100), mt_rand(0,100), mt_rand(100,200), mt_rand(0,100), $color);
	}

	// print_r(1234);
	// echo "1234";
	



	header("content-type:image/png");
	imagepng($img);
	imagedestroy($img);

?>