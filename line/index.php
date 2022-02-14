<?php

//チャット内容読み込み
include "./lib/Chat.php";
include "./lib/readXlsx.php";

// ファイル名の指定
$readFile = "./data/input.xlsx";

//Excelファイル読み込み　：　連想配列でデータ受け取り
$data = readXlsx($readFile);

//ページ数読み込み
if($_GET["page"] == null || $_GET["page"] == ""){
  $page = 1;
}else{
  $page = $_GET["page"];
}
?>

<html lang="ja">
<head>
  <meta charset="UTF-8"/>
  <title>LINE風チャット小説</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta3/html2canvas.min.js"></script>
  <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
  <meta name="viewport" content="width=350" >
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">

  <script type="text/javascript">
   $(function(){
    $(".line__contents").scrollTop($(".line__contents").height()*100000000);
   });
</script>
</head>
<body>
  <!-- ▼LINE風ここから -->
  <div class="line__container" onclick="location.href='./index.php?page=<?php echo $page + 1;?>'">
    <!-- タイトル -->
    <div class="line__title">
      七海
    </div>
  
    <!-- ▼会話エリア scrollを外すと高さ固定解除 -->
    <div class="line__contents scroll">
      <!-- チャット部分表示-->
      <?php Chat($data,$page);?>
    </div>
    <!--　▲会話エリア ここまで -->
  
    <form action = "" method = "get">
      <div class="bms_send">
        <input type = "hidden" class="bms_send_message" name ="page" value=<?php echo $page + 1;?>>
        <input type = "submit" value ="次へ" class="bms_send_btn" >
      </div>
    </form>
  </div>
    <!--　▲LINE風ここまで -->
<!-- 画像作成：再作成 -->
<!--
  <center>
  <br>
  <hr>
  <button onclick="screenshot('.line__container')">Take a shot</button>
  <hr>
  <b>Image:</b>
  <div id="output_screen">
  <img id="screen_image">
</div>
<a id="download" href="#" download="line.png"></a>
</center>
-->
<!-- 画像作成：再作成 -->

<script type="text/javascript">
    

    function screenshot( selector) {
    var element = $(selector)[0];
    html2canvas(element, { onrendered: function(canvas) {
        var imgData = canvas.toDataURL();
        $('#screen_image')[0].src = imgData;
        $('#download')[0].href = imgData;
        $('#download')[0].innerHTML = "<font color='white'>Download</font>";
    }});
}

function erase_screenshot() {
    $('#screen_image')[0].src = "";
    $('#download')[0].href = "#";
    $('#download')[0].innerHTML = "";
}
  </script>
</body>
</html>