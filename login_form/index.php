<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <title>管理画面</title>
</head>
<body>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">ログイン</h2>
  <form class="login-container" action="./lib/loginCheck.php" method="post">
    <p><input type="text" name="id" placeholder="id"></p>
    <p><input type="password" name="pwd" placeholder="Password"></p>
    <p><input type="submit" value="Log in"></p>
    ※パスワード変更は、<a href="./lib/pwdChange.php">こちらから</a>
  </form>
</div>
</body>
</html>