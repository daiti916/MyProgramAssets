<?php
$fp = new SplFileObject('../csv/login/data.csv');
$fp->setFlags(SplFileObject::READ_CSV);

foreach ($fp as $data) {
    $user_check[] = $data;
}
$now_id = $_POST["now_id"];
$new_id = $_POST["new_id"];
$confirm_id = $_POST["confirm_id"];

//パスワードチェック
for($i=0;$i<count($user_check);$i++){
    if($user_check[$i][0]){
        if($user_check[$i][0] == $now_id){
            if($new_id == $confirm_id){
                $fp = fopen("../csv/login/data.csv","w");
                fwrite($fp, $new_id .",".$user_check[$i][1]);
                fclose($fp);
                //ID変更成功
                echo '<script type="text/javascript">alert("ID変更完了");</script>';
                echo '<script type="text/javascript">location.href="./idChange.php";</script>';
            }else{
                echo '<script type="text/javascript">alert("新しいIDと確認IDが異なります。");</script>';
                echo '<script type="text/javascript">location.href="./idChange.php";</script>';
            }
        }else{
            //ログイン失敗
            echo '<script type="text/javascript">alert("現在のIDが異なります。");</script>';
            echo '<script type="text/javascript">location.href="./idChange.php";</script>';
        }
    }
}

?>