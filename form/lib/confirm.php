<?php

//パラメータ取得
$name_1 = $_POST["name_1"];
$name_2 = $_POST["name_2"];
$read_1 = $_POST["read_1"];
$read_2 = $_POST["read_2"];
$mail_address = $_POST["mail_address"];
$zipcode = $_POST["zipcode"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$send = $_POST["send"];

if($send == ""){
	header('Location: ../');
	exit;
}
?>

<!DOCTYPE html>
	<html lang="ja">
	<head>
	<meta charset="UTF-8" />
	<title>サンプルフォーム（確認）</title>
	<meta name="robots" content="noindex,nofollow" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<link rel="stylesheet" href="../css/reset.css" />
	<style>
		body {
			color: #454545;
			background: #f0f0f0;
		}
	</style>
	<link rel="stylesheet" href="../css/mailform.css" />
	</head>
	<body>
		<form action="./complete.php" method="post" id="mail_form">
			<dl>
				<h1><center>サンプルフォーム（確認）</center></h1>
				<!-- 氏名 -->
				<dt>名前<span>Your Name</span></dt>
				<dd>姓　<?php echo $name_1;?>：名　<?php echo $name_2;?></dd>
		
				<!-- 氏名（ふりがな） -->
				<dt>ふりがな<span>Name Reading</span></dt>
				<dd>姓　<?php echo $read_1;?>： 名　<?php echo $read_2;?></dd>
		
				<!-- メールアドレス -->
				<dt>メールアドレス<span>Mail Address</span></dt>
				<dd><?php echo $mail_address;?></dd>
		
				<!-- 郵便番号 -->
				<dt>郵便番号<span>Zipcode</span></dt>
				<dd>〒 <?php echo $zipcode;?></dd>
		
				<!-- 住所 -->
				<dt>住所<span>Address</span></dt>
				<dd><?php echo $address;?></dd>
		
				<!-- 電話番号 -->
				<dt>電話番号<span>Phone Number</span></dt>
				<dd><?php echo $phone;?></dd>
			</dl>
			<input type="hidden" name="name_1" value=<?php echo $name_1;?>>
			<input type="hidden" name="name_2" value=<?php echo $name_2;?>>
			<input type="hidden" name="read_1" value=<?php echo $read_1;?>>
			<input type="hidden" name="read_2" value=<?php echo $read_2;?>>
			<input type="hidden" name="mail_address" value=<?php echo $mail_address;?>>
			<input type="hidden" name="zipcode" value=<?php echo $zipcode;?>>
			<input type="hidden" name="address" value=<?php echo $address;?>>
			<input type="hidden" name="phone" value=<?php echo $phone;?>>
			<p id="form_submit">
				<center>
					<input type="button" value="戻る" onClick="window.history.back();">
					<input type="submit" name="send" id="form_submit_button" value="送信する" />
				</center>
			</p>
		</form>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	</body>
</html>
