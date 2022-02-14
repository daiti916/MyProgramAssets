<?php

// ファイル名渡したら配列返すラッパー関数
function readXlsx($readFile){
    // ライブラリファイルの読み込み （パス指定し直す）
    require_once 'Classes/PHPExcel/IOFactory.php';

    // ファイルの存在チェック
    if (!file_exists($readFile)) {
        exit($readFile. "が見つかりません。" . EOL);
    }

    // xlsxをPHPExcelに食わせる
    $objPExcel = PHPExcel_IOFactory::load($readFile);

    // 配列形式で返す
    return $objPExcel->getActiveSheet()->toArray(null,true,true,true);
}
?>