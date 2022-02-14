<?php
include "./top.php";

$fp = new SplFileObject('../csv/content/content1.csv');
$fp->setFlags(SplFileObject::READ_CSV);

foreach ($fp as $data) {
    $content[] = $data;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<title>★管理画面★</title>
<div id="divcontent">
    <h2>記事編集</h2><hr>
    <div class="login">
        <div class="login-triangle"></div>
        <form class="login-container" action="./contentUpdate.php" method="post">
            <p><textarea rows="20" cols="200" name="content"><?php echo $content[0][0] ;?></textarea></p>
            <p><input type="submit" value="記事変更"></p>
        </form>
    </div>
</div>
</body>
</html>