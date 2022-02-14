<?php
$fp = new SplFileObject('../csv/login//data.csv');
$fp->setFlags(SplFileObject::READ_CSV);

foreach ($fp as $data) {
    $pwd_check[] = $data;
}
$now_id = $_POST["now_id"];
$now_pwd = $_POST["now_pwd"];
$update_pwd = $_POST["update_pwd"];

//パスワードチェック
for($i=0;$i<count($pwd_check);$i++){
    if($pwd_check[$i][0]){
        if($pwd_check[$i][0] == $now_id && $pwd_check[$i][1] == $now_pwd){
            $fp = fopen("../csv/login//data.csv","w");
            fwrite($fp, $now_id .",".$update_pwd);
            fclose($fp);
            //ログイン成功
            echo '<script type="text/javascript">alert("パスワード変更完了");</script>';
            echo '<script type="text/javascript">location.href="../index.php";</script>';
        }else{
            //ログイン失敗
            echo '<script type="text/javascript">alert("IDまたは現在のパスワードが異なります。");</script>';
            echo '<script type="text/javascript">location.href="./pwdChange.php";</script>';
        }
    }
}

?>