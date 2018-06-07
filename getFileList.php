<?php

//このスクリプトはコマンドラインやcronで呼び出されることを前提にコーディングされています

//ファイルリストを取ってくる 

$filelist = file_get_contents('http://www.pu-kumamoto.ac.jp/~pwr/csv/All/');

preg_match_all('/"[0-9]{8}\.csv"/', $filelist, $match);

$getNumbers = 0;

foreach ($match[0] as $key) {
        $key = str_replace('"', '', $key);

        //ファイルが既にある場合は実行しない
        if(!file_exists('./files/'.$key)){
                $file = fopen('./files/'.$key ,"w");
                fwrite($file, $filelist);
                fclose($file);
                $getNumbers ++;
        }
}


if(!$getNumbers){
        echo "No file Added.".PHP_EOL;
}else{
        echo $getNumbers." File(s) Added.".PHP_EOL;
}

