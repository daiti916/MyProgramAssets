<?php

function Chat($data,$page){
?>
    
  <?php
    for($i =3; $i < $page+2; $i++){
      if($data[$i]["A"] == "七海"){
  ?>
        <!-- 相手の吹き出し -->
        <div class="line__left">
          <figure>
            <img src="./img/icon_001.png" />
          </figure>
          <div class="line__left-text">
            <div class="name"><?php echo $data[$i]["A"];?></div>
            <div class="text">
  <?php 
              if(strpos($data[$i]["B"],'jpg') !== false){
                echo "<img src='./img/".$data[$i]["B"]."' width='130px'/>";
              }else{
                echo $data[$i]["B"];
              }
  ?>
            
            </div>
            <span class="date"> <?php echo $data[$i]["E"]; ?></span>
          </div>
        </div>
  <?php
      }else if($data[$i]["A"] == "由香"){
        ?>
        <!-- 相手の吹き出し -->
        <div class="line__left">
          <figure>
            <img src="./img/icon_002.png" />
          </figure>
          <div class="line__left-text">
            <div class="name"><?php echo $data[$i]["A"];?></div>
            <div class="text">
  <?php 
              if(strpos($data[$i]["B"],'jpg') !== false){
                echo "<img src='./img/".$data[$i]["B"]."' width='130px'/>";
              }else{
                echo $data[$i]["B"];
              }
  ?>
            </div>
            <span class="date"> <?php echo $data[$i]["E"]; ?></span>
          </div>
        </div>
  <?php
      }else if($data[$i]["A"] == "カレン"){
  ?>
        <!-- 相手の吹き出し -->
        <div class="line__left">
          <figure>
            <img src="./img/icon_003.png" />
          </figure>
          <div class="line__left-text">
            <div class="name"><?php echo $data[$i]["A"];?></div>
            <div class="text">
  <?php 
              if(strpos($data[$i]["B"],'jpg') !== false){
                echo "<img src='./img/".$data[$i]["B"]."' width='130px'/>";
              }else{
                echo $data[$i]["B"];
              }
  ?>
            </div>
            <span class="date"> <?php echo $data[$i]["E"]; ?></span>
          </div>
        </div>
  <?php
      }else{
        if($data[$i]["C"]){
  ?>
          <!-- 自分の吹き出し -->
          <div class="line__right">
            <div class="text">
  <?php       if(strpos($data[$i]["C"],'jpg') !== false){
                echo "<img src='./img/".$data[$i]["C"]."' width='130px'/>";
              }else{
                echo $data[$i]["C"];
              }
  ?>
            </div>
            <span class="date"> <?php echo $data[$i]["D"]."<br>".$data[$i]["E"]; ?></span>
          </div>
  <?php } 
      }
    } 
  ?>
      
<?php } ?>