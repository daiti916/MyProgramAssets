<?php

function sanmon(){
  //変数
  if($_POST["name"] !== "" && !is_null($_POST["name"])){
    $name= nl2br($_POST["name"]);
  }else{
    $name= "見本";
  }
  if(is_null($_POST["height"]) &&  $_POST["font_size"] !== "" && !is_null($_POST["font_size"])){
    if($_POST["font"] =="大きく"){
      $font_size = $_POST["font_size"]+1;
    }else if($_POST["font"] =="小さく"){
      $font_size = $_POST["font_size"]-1;
    }else{
      $font_size = $_POST["font_size"];
    }
  }else{
    if($_POST["font_size"] ==""){
      $font_size = "20";
    }else{
      $font_size = $_POST["font_size"];
    }
  }


  if(is_null($_POST["font"]) && $_POST["font_height"] !=="" && !is_null($_POST["font_height"])){
    if($_POST["height"] =="上げる"){
      $font_height = $_POST["font_height"]-1;
    }else if($_POST["height"] =="下げる"){
      $font_height = $_POST["font_height"]+1;
    }else{
      $font_height = $_POST["font_height"];
    }
  }else{
    if($_POST["font_height"] == ""){
      $font_height = "30";
    }else{
      $font_height = $_POST["font_height"];
    }
  }

  if($_POST["font_type"] == 0){
    $font_type = "Impact";
    $font_num = 0;
  }else if($_POST["font_type"] == 1){
    $font_type = "ＭＳ 明朝";
    $font_num = 1;
  }else if($_POST["font_type"] == 2){
    $font_type = "serif";
    $font_num = 2;
  }


  return array($name,$font_size,$font_height,$font_type,$font_num );
}

function d_name(){
  //変数
  if($_POST["content"] !== "" && !is_null($_POST["content"])){
    $content= nl2br($_POST["content"]);
  }else{
    $content= "承認";
  }

  if($_POST["ymd"] !== "" && !is_null($_POST["ymd"])){
    $ymd = $_POST["ymd"];
  }else{
    $ymd = date("Y.m.d");
  }
  if($_POST["name"] !=="" && !is_null($_POST["name"])){
    $name = $_POST["name"];
  }else{
    $name = "見本";
  }
  return array($content,$ymd,$name);
}

function user(){
  //変数
  if($_POST["name"] !== "" && !is_null($_POST["name"])){
    $name= nl2br($_POST["name"]);
  }else{
    $name= "見本";
  }

  if(is_null($_POST["height"]) &&  $_POST["font_size"] !== "" && !is_null($_POST["font_size"])){
    if($_POST["font"] =="大きく"){
      $font_size = $_POST["font_size"]+1;
    }else if($_POST["font"] =="小さく"){
      $font_size = $_POST["font_size"]-1;
    }else{
      $font_size = $_POST["font_size"];
    }
  }else{
    if($_POST["font_size"] ==""){
      $font_size = "35";
    }else{
      $font_size = $_POST["font_size"];
    }
  }
  if(is_null($_POST["font"]) && $_POST["font_height"] !=="" && !is_null($_POST["font_height"])){
    if($_POST["height"] =="上げる"){
      $font_height = $_POST["font_height"]-1;
    }else if($_POST["height"] =="下げる"){
      $font_height = $_POST["font_height"]+1;
    }else{
      $font_height = $_POST["font_height"];
    }
  }else{
    if($_POST["font_height"] == ""){
      $font_height = "5";
    }else{
      $font_height = $_POST["font_height"];
    }
  }
  if($_POST["font_type"] == 0){
    $font_type = "Impact";
    $font_num = 0;
  }else if($_POST["font_type"] == 1){
    $font_type = "ＭＳ 明朝";
    $font_num = 1;
  }else if($_POST["font_type"] == 2){
    $font_type = "serif";
    $font_num = 2;
  }

  return array($name,$font_size,$font_height,$font_type,$font_num );
}


/* 
  mode：Type
  0：認印・三文判
  1：データネーム印
  2:ユーザー印
*/
// モードチェック
if(isset($_POST['mode'])){
  if($_POST['mode'] == 0){
    $mode = 0;
    list($name,$font_size,$font_height,$font_type,$font_num ) = sanmon();
  }else if($_POST['mode'] == 1){
    $mode = 1;
    list($content,$ymd,$name) = d_name();
  }else{
    $mode = 2;
    list($name,$font_size,$font_height,$font_type) = user();
  }
}else{
  $mode = 0;
  list($name,$font_size,$font_height,$font_num ) = sanmon();
}
?>
<html>
  <title>電子印鑑作成</title>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta3/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta3/html2canvas.svg.min.js"></script>
  <script src="./js/cmanObjMove_v091.js" charset="utf-8"></script>
  <script>
    function OnButtonClick() {
      target = document.getElementById("output");
      target.innerHTML = "<p><button onclick='downloadImage()' id='screenshot-download' disabled=''>画像としてダウンロード</button></p>";
    }
  </script>
  </head>
  <style>  
    .sanmon {
        font-size:<?php echo $font_size;?>px;
        border:3px double #f00;
        border-radius:50%;
        color:#f00;
        width:90px;
        height:90px;
        position:relative;
        margin:auto;
    }
    .sanmon span {
      display:inline-block;
      width:100%;
      text-align:center;
    }

    .sanmon span:first-child::before {
      position:absolute;
      top:5px;
      left:0;
      right:0;
      margin:auto;
      width:80%;
      line-height:1;
      padding-bottom:3px;
    }

    .sanmon span:first-child {
      line-height:56px;
    }

    .sanmon span:last-child {
      position:absolute;
      top:<?php echo $font_height;?>px;
      left:0;
      right:0;
      margin:auto;
      width:80%;
      padding-top:2px;
      line-height:1;
      font-family : <?php echo $font_type;?> ;
    }

    .sanmon-approve span:first-child::before {
      content:"";
    }

    .d_name{
      font-size:15px;
      border:3px double #f00;
      border-radius:50%;
      color:#f00;
      width:90px;
      height:90px;
      position:relative;
      margin:auto; 
    }
    .d_name span {
      display:inline-block;
      width:100%;
      text-align:center;
    }
    .d_name span:first-child::before {
      position:absolute;
      top:5px;
      left:0;
      right:0;
      margin:auto; 
      width:90%;
      border-bottom:1px solid #f00;
      line-height:1;
      padding-bottom:6px;
    }
    .d_name span:first-child {
      line-height:77px;
    }
    .d_name span:last-child {
      position:absolute;
      top:60px;
      left:0;
      right:0;
      margin:auto;
      /* width:90%; */
      border-top:1px solid #f00;
      padding-top:0px;
      line-height:1;
    }

    .d_name-approve span:first-child::before {
      content:"<?php echo $content;?>";
    }



    .user {
        font-size:<?php echo $font_size;?>px;
        border:3px double #f00;
        border-radius:0%;
        color:#f00;
        width:220px;
        height:65px;
        position:relative;
        margin:auto;
    }
    .user span {
      display:inline-block;
      width:100%;
      text-align:center;
    }

    .user span:first-child::before {
      position:absolute;
      top:5px;
      left:0;
      right:0;
      margin:auto;
      width:80%;
      line-height:1;
      padding-bottom:3px;
    }

    .user span:first-child {
      line-height:56px;
    }

    .user span:last-child {
      position:absolute;
      top:<?php echo $font_height;?>px;
      left:0;
      right:0;
      margin:auto;
      width:80%;
      padding-top:2px;
      line-height:1;
      font-family : <?php echo $font_type;?> ;
    }

    .user-approve span:first-child::before {
      content:"";
    }
  </style>

  <body>
    <h1>電子印鑑作成</h1>
    <hr>
    <!-- 印鑑選択 -->
    <form method="post" action="">
      <select name="mode">
        <option value="0" <?php if($mode == 0) echo "selected";?>>三文判</option>
        <option value="1" <?php if($mode == 1) echo "selected";?>>データネーム印</option>
        <option value="2" <?php if($mode == 2) echo "selected";?>>ユーザー印</option>
      </select>
      <input type="submit"name="submit"value="作成"/>
    </form>

<?php
    if($mode == 0 || $mode == 2){
?>
    <form method="post" action="./hanko.php">
      <p><label><font face="ＭＳ ゴシック">表示する文言</font><br><textarea  name="name" rows="4" cols="40" maxlength="20" ><?php if($name !== ""){echo str_replace("<br />", '', $name);}?></textarea></label></p>
      <p>文字サイズ<br><input type="submit" name="font" value="大きく"/>　<input type="submit" name="font" value="小さく"/>
      <p>文言：高さ<br><input type="submit" name="height" value="上げる"/>　<input type="submit" name="height" value="下げる"/></p>
      <p>フォント種類<br>
        <table border="1">
          <tr>
            <td><img src="./img/0.png"></td>
            <td><img src="./img/1.png"></td>
            <td><img src="./img/2.png"></td>
          </tr>
          <tr>
            <td><label><input type="radio" name="font_type" value="0" <?php if($font_num == 0) echo "selected";?>> Impact</label></td>
            <td><label><input type="radio" name="font_type" value="1" <?php if($font_num == 1) echo "selected";?>> ＭＳ 明朝</label></td>
            <td><label><input type="radio" name="font_type" value="2" <?php if($font_num == 2) echo "selected";?>> serif</label></td>
          </tr>
          <br>
          
          
          
        </table>
      </p>
      <input type="hidden" name="mode" value=<?php echo $mode;?>>
      <input type="hidden" name="font_size" size="40" maxlength="20" value="<?php if($font_size !== ""){echo $font_size;}?>"></label></p>
      <input type="hidden" name="font_height" size="40" maxlength="20" value="<?php if($font_height !== ""){echo $font_height;}?>"></label>
      <hr>

      <!-- <p><label>印鑑：大きさ<br><input type="text" name="width" size="40" maxlength="20" value="<?php if($width !== ""){echo $width;}?>"></label></p> -->
      <!-- <p><label>印鑑：高さ<br><input type="text" name="height" size="40" maxlength="20" value="<?php if($height !== ""){echo $height;}?>"></label></p> -->
      <p><input type="submit" value="見本作成">　<button id="create" onclick="screenshotHtml(),OnButtonClick();">印鑑確定</button></p>
    </form>
<?php
    }else{
?>
    <form method="post" action="./hanko.php">
      <p><label>表示する形式<br><textarea  name="content" rows="4" cols="40" maxlength="20" ><?php if($content !== ""){echo str_replace("<br />", '', $content);}?></textarea></label></p>
      <p><label>表示する日付<br><textarea  name="ymd" rows="4" cols="40" maxlength="20" ><?php if($ymd !== ""){echo str_replace("<br />", '', $ymd);}?></textarea></label></p>
      <p><label>表示する文言<br><textarea  name="name" rows="4" cols="40" maxlength="20" ><?php if($name !== ""){echo str_replace("<br />", '', $name);}?></textarea></label></p>
      <input type="hidden" name="mode" value=<?php echo $mode;?>>
      <p><input type="submit" value="見本作成">　<button id="create" onclick="screenshotHtml(),OnButtonClick();">印鑑確定</button></p>
    </form>

<?php
    }
?>
    <hr>
<?php
    if($mode == 0){
?>
      <div cmanOMat="area" id="screenshot-area"style="width:100px; overflow:hidden;">
      <div id="screenshot-result" style="width:100px; border:1 px solid #ddd;overflow:hidden; ">
        <div class="sanmon stamp-approve">
          <span><?php echo $name;?></span>
        </div>
      </div>
      </div>
<?php }else if($mode == 1){ ?>
      <div cmanOMat="area" id="screenshot-area"style="width:140px; overflow:hidden;">
      <div id="screenshot-result" style="width:130px; border:1 px solid #ddd;overflow:hidden; ">
      <div class="d_name d_name-approve">
        <span><?php echo $ymd;?></span>
        <span><?php echo $name;?></span>
      </div>
      </div>
      </div>
<?php }else{ ?>
      <div cmanOMat="area" id="screenshot-area"style="width:240px; overflow:hidden;">
      <div id="screenshot-result" style="width:230px; border:1 px solid #ddd;overflow:hidden; ">
        <div class="user stamp-approve">
          <span><?php echo $name;?></span>
        </div>
      </div>
      </div>
<?php } ?>
    <!-- 画像ダウンロード -->
    <div id="output">

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
