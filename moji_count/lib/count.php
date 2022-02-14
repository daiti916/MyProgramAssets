<?php

function moji_disp($text){
    //文字を配列に格納
    $moji = explode("\r\n", $text);

    //置換文字列
    $word = array ("\r\n","/( |　)/","。","、","",",","!","?","！","？","『","』","「","」");

    //文字表示
    for($i = 0;$i < count($moji);$i++){
        if(substr($moji[$i],0,1) != ""){
            if(strpos($moji[$i],'」') !== false){
                //文字列に」がある場合
                if(strpos($moji[$i],'「') !== false){
                    //文字列に「がある場合
                    $create_moji[] =  str_replace($word,"",strstr(strstr(preg_replace("/( |　)/", "", $moji[$i]),"」",true),"「",false));
                    $count_moji .= str_replace($word,"",strstr(strstr(preg_replace("/( |　)/", "", $moji[$i]),"」",true),"「",false));
                }else{
                    //文字列に「がない場合
                    $create_moji[] =  str_replace($word,"",strstr(preg_replace("/( |　)/", "", $moji[$i]),"」",true));
                    $count_moji .= str_replace($word,"",strstr(preg_replace("/( |　)/", "", $moji[$i]),"」",true));
                }
            }else{
                //文字列に」がない場合
                $create_moji[] =  str_replace($word, '', preg_replace("/( |　)/", "", $moji[$i]));
                $count_moji .= str_replace($word, '', preg_replace("/( |　)/", "", $moji[$i]));
            }
        }
    }
    //点はある文字列判断
    for($i = 0;$i < count($create_moji);$i++){
        if(strpos($create_moji[$i],'.') !== false){
            if(is_numeric(substr($create_moji[$i],0,1))){
                if(str_replace(".","",strstr($create_moji[$i],".",false))){
                    $comp_moji[] = str_replace(".","",strstr($create_moji[$i],".",false));
                    $moji_num .= str_replace(".","",strstr($create_moji[$i],".",false));
                }
            }else{
                $comp_moji[] = str_replace(".","",$create_moji[$i]);
                $moji_num .= str_replace(".","",$create_moji[$i]);
            }
        }else{
            $comp_moji[] = $create_moji[$i];
            $moji_num .= $create_moji[$i];
        }
    }

    return array($comp_moji ,$moji_num);
}
?>


