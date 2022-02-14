<?php

$name_1 = $_POST["name_1"];
$name_2 = $_POST["name_2"];
$read_1 = $_POST["read_1"];
$read_2 = $_POST["read_2"];
$mail_address = $_POST["mail_address"];
$zipcode = $_POST["zipcode"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$present = $_POST["present"];
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
	<title>サンプルフォーム（完了）</title>
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
	<form action="./lib/confirm.php" method="post" id="mail_form">
    <center>
			<h1>サンプルフォーム（完了）</h1>
      <hr>
      <br>
      <p>サンプル応募ありがとうございます。</p>
    </center>
	</form>
	</body>
</html>

<?php

//メール送信処理

include "./mail.php";

?>