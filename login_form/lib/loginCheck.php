<?php
$fp = new SplFileObject('../csv/login/data.csv');
$fp->setFlags(SplFileObject::READ_CSV);

foreach ($fp as $data) {
    $login_check[] = $data;
}
$id = $_POST["id"];
$pwd = $_POST["pwd"];

//ログインチェック
for($i=0;$i<count($login_check);$i++){
    if($login_check[$i][0]){
        if($login_check[$i][0] == $id && $login_check[$i][1] == $pwd){
            //ログイン成功
            echo '<script type="text/javascript">location.href="./top.php";</script>';
        }else{
            //ログイン失敗
            echo '<script type="text/javascript">alert("IDまたはパスワードが異なります。");</script>';
            echo '<script type="text/javascript">location.href="../index.php";</script>';
        }
    }
}

?>