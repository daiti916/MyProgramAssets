<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");

//管理者用
$to      = $mail_address;
$subject = 'サンプルフォーム（完了）';
// メッセージ部分
$message = '';
$message .='
これは、サンプルフォーム（完了）です。
<br>
<p>-------------------------------------------------------</p>
<p>※メールで送りたい情報をここに記載します。<br><br>
<p>-------------------------------------------------------</p>
';
$headers = 'From: tesu@test.jp' . "\r\n";
$headers .= 'Bcc: tesu@test.jp'."\r\n";
$headers .="Content-type: text/html; charset=UTF-8";

mail($to, $subject, $message, $headers);

?>