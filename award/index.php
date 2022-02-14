<!DOCTYPE html>
<html lang="ja">
<head>
	<title>表彰状</title>
	<meta charset="UTF-8">
  <meta http-equiv="Cache-Control" content="no-cache">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta3/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta3/html2canvas.svg.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="./js/cmanObjMove_v091.js" charset="utf-8"></script>
<script type="text/javascript">
$(function() {
 
    //keyup()でキーを入力するたびに発動
    $('[name="name"]').keyup(function() {

    //入力したvalue値を変数に格納
    var name = $(this).val();

    //選択したvalue値をp要素に出力
    $('.name').text("氏名："+name+" 様");
    });
 
    //keyup()でキーを入力するたびに発動
    $('[name="content"]').keyup(function() {

    //入力したvalue値を変数に格納
    var content = $(this).val();

    //選択したvalue値をp要素に出力
    $('.content').html(content.replace(/\n/g, '<br>'));
    });

    //keyup()でキーを入力するたびに発動
    $('[name="support"]').keyup(function() {

    //入力したvalue値を変数に格納
    var support = $(this).val();

    //選択したvalue値をp要素に出力
    $('.support').text("推薦者："+support);
    });

    //keyup()でキーを入力するたびに発動
    $('[name="sex"]').keyup(function() {

    //入力したvalue値を変数に格納
    var sex = $(this).val();
    console.log(sex);

    //選択したvalue値をp要素に出力
    $('.support').text("推薦者："+support);
    });

});

//画像切り替え
function changeimg1() {
	document.main_logo.src = "./images/award_man.jpg";
	document.sub_logo.src = "./images/noimage.jpeg";

}

function changeimg2() {
	document.main_logo.src = "./images/award_woman.jpg";
	document.sub_logo.src = "./images/noimage-l.jpeg";
}

function submitChk () {
  /* 確認ダイアログ表示 */
  var flag = confirm ( "削除してもよろしいですか？\n\n削除されない場合は[キャンセル]ボタンを押して下さい");
  /* send_flg が TRUEなら送信、FALSEなら送信しない */
  return flag;
}

        function OnButtonClick() {
            target = document.getElementById("output");
            target.innerHTML = "<p><button onclick='downloadImage()' id='screenshot-download' disabled=''>画像としてダウンロード</button></p>";
        }
</script>
</head>
<body>
<h1>★表彰状ツール★</h1>
<hr>
<div cmanOMat="area" id="screenshot-area"style="width:1000px; overflow:hidden;">
<img name="main_logo" src="./images/award_man.jpg" style="width:1000px"/>
<img class="footer_logo" src="./images/logo.png">
<?php
  //新規接続時、画像がデフォルトの変更
  $filename = "./images/sub_pic.jpg";
  if (file_exists($filename) && $_GET['type'] == "") {
?>
  <img name="sub_logo" src="./images/noimage.jpeg" style="width:30%; position:absolute; top:150px; left:40px;">
<?php }else{ ?>
  <img src="./images/sub_pic.jpg" style="width:30%; position:absolute; top:150px; left:40px;">
<?php } ?>

    <div class="text"><p class="name"></p></div>
    <div class="text"><p class="content"></p></div>
    <div class="text"><p class="support"></p></div>
</div>
<input type="text" class="pc_award_name" name="name" placeholder="表彰する方のお名前">
<textarea class="pc_award_content" name="content" placeholder="表彰のお言葉" ></textarea>
<input type="text" class="pc_award_support" name="support" placeholder="推薦者のお名前">
<br>
<label class="pc_award_sex1"><input type="radio" name="sex" onclick="changeimg1()" checked >男性</label> 
<label class="pc_award_sex2"><input type="radio" name="sex" onclick="changeimg2()">女性</label>

<form action="./lib/upload.php" method="post" enctype="multipart/form-data">
  <input type="file" class="select_pic" name="fname" >
  <br><br>
  <input type="submit" class="up_pic" value="アップロード">
</form>
<?php
/*

$filename = './images/sub_pic.jpg';
if (file_exists($filename)) {
?>
  <form action="./lib/delete.php" method="post"  onsubmit="return submitChk()">
    <input type="submit" class="pic_delete"name="delete"value="画像削除">
  </form>
<?php } 
*/
?>
 <!-- 画像作成：再作成 -->
<p class="create_pic"><button id="create" onclick="screenshotHtml(),OnButtonClick();">画像作成</button>　<a href="./index.php?type=2"><button type="button">再作成</button></a></p>
<hr>
<center>　↓　画像作成　↓　</center>
<hr>
 <!-- 画像表示 -->
<div id="screenshot-result" style="width:1000px; border:1px solid #ddd;overflow:hidden;"></div>
 <!-- 画像ダウンロード -->
<div id="output">

</div>
<script type="text/javascript">
    var article300216Canvas = null;
    // html2canvas実行
    function screenshotHtml() {
        document.getElementById("create").disabled = true;
        html2canvas(document.getElementById("screenshot-area"), {
        onrendered: function (canvas) {
          var el = document.getElementById("screenshot-result");
          if (el.hasChildNodes()) {
            el.removeChild(el.childNodes[0]);
          }
          el.appendChild(canvas);
          article300216Canvas = canvas;
          document.getElementById("screenshot-download").removeAttribute("disabled");
        }
      });
    }

    // 画像のダウンロード
    function downloadImage(canvas) {
      var dataUrl = article300216Canvas.toDataURL("image/jpg");   // PNG形式
      var event = document.createEvent("MouseEvents");
      event.initMouseEvent("click", true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
      var a = document.createElementNS("http://www.w3.org/1999/xhtml", "a");
      a.href = dataUrl;
      a.download = "award";
      a.dispatchEvent(event);
    }
  </script>
</body>
</html>