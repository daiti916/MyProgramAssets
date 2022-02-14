<!DOCTYPE html>
	<html lang="ja">
	<head>
	<meta charset="UTF-8" />
	<title>サンプルフォーム（応募）</title>
	<meta name="robots" content="noindex,nofollow" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<link rel="stylesheet" href="css/reset.css" />
	<script type="text/javascript" src="./js/check.js"></script>
	<style>
		body {
			color: #454545;
			background: #f0f0f0;
		}
	</style>
	<link rel="stylesheet" href="css/mailform.css" />
	</head>
	<body>
		<form action="./lib/confirm.php" method="post" name="form" id="mail_form" onSubmit="return check()">
			<dl>
				<h1><center>サンプルフォーム（応募）</center></h1>

				<!-- 氏名 -->
				<dt>名前<span>Your Name</span></dt>
				<dd class="required">姓　<input type="text" id="name_1" name="name_1" value="" /> 名　<input type="text" id="name_2" name="name_2" value="" />
					<br>
					<span id="name_chk_msg"></span>
				</dd>
		
				<!-- 氏名（ふりがな） -->
				<dt>ふりがな<span>Name Reading</span></dt>
				<dd class="required">姓　<input type="text" id="read_1" name="read_1" value="" /> 名　<input type="text" id="read_2" name="read_2" value="" />
					<br>
					<span id="read_chk_msg"></span>
				</dd>
		
				<!-- メールアドレス -->
				<dt>メールアドレス<span>Mail Address</span></dt>
				<dd class="required"><input type="email" id="mail_address" name="mail_address" value="" />
					<br>
					<span id="mail_chk_msg"></span>
				</dd>
		
				<dt>メールアドレス<br />(確認用)<span>Mail Address Confirm</span></dt>
				<dd class="required"><input type="email" id="mail_address_confirm" name="mail_address_confirm" value="" />
					<br>
					<span id="mail_confirm_chk_msg"></span>
				</dd>
		
				<!-- 郵便番号 -->
				<dt>郵便番号<span>Zipcode</span></dt>
				<dd class="required">〒 <input type="text" id="zipcode" name="zipcode" value="" onkeyup="AjaxZip3.zip2addr( this,'','address','address' );" />
					<br>
					<span id="zipcode_chk_msg"></span>
				</dd>
		
				<!-- 住所 -->
				<dt>住所<span>Address</span></dt>
				<dd class="required"><input type="text" id="address" name="address" value="" />
					<br>
					<span id="address_chk_msg"></span>
				</dd>
		
				<!-- 電話番号 -->
				<dt>電話番号<span>Phone Number</span></dt>
				<dd class="required"><input type="tel" id="phone" name="phone" value="" />
					<br>
					<span id="phone_chk_msg"></span>
				</dd>
			</dl>
			<center><p id="form_submit"><input type="submit" id="send" name="send" value="入力確認" onclick="return check();"/></p></center>
		</form>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<!-- フリガナ自動入力ライブラリここから -->
		<script src="js/jquery.autoKana.js"></script>
		<script>
			(function( $ ) {
				$.fn.autoKana( '#name_1', '#read_1', {
					katakana: false
				});
				$.fn.autoKana( '#name_2', '#read_2', {
					katakana: false
				});
			})( jQuery );
		</script>
		<!-- フリガナ自動入力ライブラリここまで -->

		<!-- 住所自動入力ライブラリここから -->
		<script src="js/ajaxzip3.js"></script>
		<!-- 住所自動入力ライブラリここまで -->
	</body>
</html>
