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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <script src="./js/cmanObjMove_v091.js" charset="utf-8"></script>
<script type="text/javascript">
$(function() {
 
    //keyup()でキーを入力するたびに発動
    $('[name="name"]').keyup(function() {

      //入力したvalue値を変数に格納
      var name = $(this).val();

      //選択したvalue値をp要素に出力
      $('.name').text(name+"　殿");
    });
 
    //年を変更する度に
    $('select#year').change(function() {

      //入力したvalue値を変数に格納
      var year = $(this).val();

      //選択したvalue値をp要素に出力
      $('.year').html(year + "年");
    });

    //月を変更する度に
    $('select#month').change(function() {

      //入力したvalue値を変数に格納
      var month = $(this).val();

      //選択したvalue値をp要素に出力
      $('.month').html(month + "月");
    });

    //月を変更する度に
    $('select#day').change(function() {

      //入力したvalue値を変数に格納
      var day = $(this).val();

      //選択したvalue値をp要素に出力
      $('.day').html(day + "日");
    });

    //keyup()でキーを入力するたびに発動
    $('[name="support"]').keyup(function() {

      //入力したvalue値を変数に格納
      var support = $(this).val();

      //選択したvalue値をp要素に出力
      $('.support').text(support);
    });
});

//画像切り替え
function changeimg1() {
	document.main_logo.src = "./images/syojyo.jpg";
}

function changeimg2() {
	document.main_logo.src = "./images/syojyo-mother.jpg";
}

function OnButtonClick() {
  target = document.getElementById("output");
  target.innerHTML = "<p><button onclick='downloadImage()' id='screenshot-download' disabled=''>画像としてダウンロード</button></p>";
}
</script>
</head>
<body>
 <!-- 画像作成：再作成 -->
 <p class="create_pic"><button id="create" onclick="screenshotHtml(),OnButtonClick();">画像作成</button>　<a href="./index.php"><button type="button">再作成</button></a></p>
<div cmanOMat="area" id="screenshot-area"style="width:590px; overflow:hidden;">
<img name="main_logo" src="./images/syojyo.jpg" style="width:590px"/>

    <div class="text"><font face="ＭＳ Ｐ明朝,ＭＳ 明朝"><p class="name"></p></font></div>
    <div class="text"><font face="ＭＳ Ｐ明朝,ＭＳ 明朝"><p class="year"></p></font></div>
    <div class="text"><font face="ＭＳ Ｐ明朝,ＭＳ 明朝"><p class="month"></p></font></div>
    <div class="text"><font face="ＭＳ Ｐ明朝,ＭＳ 明朝"><p class="day"></p></font></div>
    <div class="text"><font face="ＭＳ Ｐ明朝,ＭＳ 明朝"><p class="support"></p></font></div>
</div>
<input type="text" class="pc_award_name" name="name" placeholder="表彰する方のお名前">
<!-- 年選択  -->
<select id="year">
  <option value="">年</option>
<?php 
  for($y=date('Y'); $y >= 1900; $y--){ ?>
    <option value="<?php echo $y?>"><?php echo $y;?></option>
<?php
  }
?>
</select>

<!-- 月選択  -->

<select id="month">
  <option value="">月</option>
<?php 
  for($m=1; $m <= 12; $m++){ ?>
    <option value="<?php echo $m?>"><?php echo $m;?></option>
<?php
  }
?>
</select>

<!-- 日選択  -->

<select id="day">
  <option value="">日</option>
<?php 
  for($d=1; $d <= 31; $d++){ ?>
    <option value="<?php echo $d?>"><?php echo $d;?></option>
<?php
  }
?>
</select>

<input type="text" class="pc_award_support" name="support" placeholder="差出人">
<br>
<label class="pc_award_sex1"><input type="radio" name="sex" onclick="changeimg1()" checked >男性</label> 
<label class="pc_award_sex2"><input type="radio" name="sex" onclick="changeimg2()">女性</label>

<hr>
<center>　↓　画像作成　↓　</center>
<hr>
 <!-- 画像表示 -->
<div id="screenshot-result" style="width:590px; border:6 px solid #ddd;overflow:hidden; "></div>
 <!-- 画像ダウンロード -->
<div id="output">

</div>
<script type="text/javascript">
    var article300216Canvas = null;
    var cx = cv.getContext("2d"); // canvas要素からコンテキスト取得
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