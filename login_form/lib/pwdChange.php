<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/style.css">
  <title>管理画面</title>
</head>
<body>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">パスワード変更</h2>
  <form class="login-container" action="./pwdCheck.php" method="post">
    <p><input type="text" name="now_id" placeholder="現在 id"></p>
    <p><input type="text" name="now_pwd" placeholder="現在 Password"></p>
    <p><input type="password" name="update_pwd" placeholder="新しい Password"></p>
    <p><input type="submit" value="変更"></p>
    ※ログイン画面は、<a href="../index.php">こちらから</a>
  </form>
</div>
</body>
</html>