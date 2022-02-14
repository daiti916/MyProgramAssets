<?php
$tempfile = $_FILES['fname']['tmp_name'];
$filename = '../../daya/input.xlsx';
 
if (is_uploaded_file($tempfile)) {
    if(move_uploaded_file($tempfile , $filename)){
?>
        <script>
            alert('アップロード完了しました。');
        </script>
<?php
    }else{
?>
        <script>
            alert('ファイルをアップロードできません。');
        </script>
<?php
    }
}else{
?>
    <script>
    alert('ファイルが選択されていません。');
    </script>
<?php
} 
?>
<script>
    location.href="../index.php";
</script>