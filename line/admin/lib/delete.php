<?php
if($_POST["delete"]){
    unlink('../images/sub_pic.jpg');
?>

    <script>
        alert('削除が完了しました。');
        location.href="../index.php";
    </script>

<?php } ?>