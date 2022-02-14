<?php
$fp = new SplFileObject('../csv/content/content1.csv');
$fp->setFlags(SplFileObject::READ_CSV);

foreach ($fp as $data) {
    $content[] = $data;
}

var_dump($_POST["content"]);

$update_content = $_POST["content"];

$fp = fopen("../csv/content/content1.csv","w");
fwrite($fp, $update_content);
fclose($fp);
echo '<script type="text/javascript">alert("記事変更完了");</script>';
echo '<script type="text/javascript">location.href="./content.php";</script>';
?>