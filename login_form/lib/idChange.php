<?php
include "./top.php";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<title>★管理画面★</title>
<div id="divcontent">
    <h2>ユーザID変更</h2><hr>
    <div class="login">
        <div class="login-triangle"></div>
        <form class="login-container" action="./idCheck.php" method="post">
            <p><input type="text" name="now_id" placeholder="現在 id"></p>
            <p><input type="text" name="new_id" placeholder="新しい id"></p>
            <p><input type="password" name="confirm_id" placeholder="確認 id"></p>
            <p><input type="submit" value="変更"></p>
        </form>
    </div>
</div>
</body>
</html>