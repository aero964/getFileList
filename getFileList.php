<?php

//ファイルリストを取ってくる 

$filelist = file_get_contents('http://www.xxxxxxxxxxx.ac.jp/~pwr/csv/All/');

//テスト出力

//echo $filelist;

preg_match_all('/"[0-9]{8}\.csv"/', $filelist, $match);


foreach ($match[0] as $key) {
	$key = str_replace('"', '', $key);
	//echo $key."<BR>";

	//exsist check
	if(!file_exists('./files/'.$key)){
		$file = fopen('./files/'.$key ,"w");
		fwrite($file, file_get_contents('http://www.xxxxxxxxxxx.ac.jp/~pwr/csv/All/'.$key));
		fclose($file);
	}
}

echo "OK";
//print_r($match[0]);
