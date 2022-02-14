<?php
include"./lib/count.php"
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<title>文字カウントツール</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<h1>★文字カウントツール★</h1>
<hr>
<form  method="post" action="./index.php">
	<textarea class="count" name="text" placeholder="検索文字をここに入力してください。"></textarea>
	<br>
	<input type="submit" value="文字数カウント">
</form>
</body>
</html>

<?php
list($create_moji,$count_moji) = moji_disp($_POST["text"]);

//配列をカウントする為に
if (is_array($create_moji)) {
    $count = count($create_moji);
}

if($count_moji){
	echo'<br>';
    echo'<h2><center>文字表示</center></h2>';

	for($i=0;$i<$count;$i++){
		echo $create_moji[$i]."<br>";
	}
	echo"<br>";
	echo"文字数：".mb_strlen($count_moji, "UTF-8");
}else{
	echo"<br>";
	echo"文字を入力してください。";
}
?>