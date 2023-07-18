<?php

// branch動作プログラム
// thisディレクトリ内のディレクトリのうち、最新のverディレクトリ内のtopファイルへリダイレクト
// 新verディレクトリを作成中(非公開)の際には、noの文字をディレクトリ名に含むかverの文字を入れない

$dirs = scandir(dirname(__FILE__));
$b4 = 0;
for ($i = 0; $i < count($dirs); $i++) {
	if (strpos($dirs[$i],'.') === false && strpos($dirs[$i],'no') === false && strpos($dirs[$i],'ver') !== false){
		$a5 = (int)str_replace("ver", "", $dirs[$i]);
		if ($b4 < $a5) {
			$b4 = $a5;
		}
	}
}
$index = file(__DIR__. "/ver". $b4. "/menu.html")[0]; //ver*のmenu.html内の最初の行のファイルを取得
header("Location: ver" . $b4 . "/". $index);

?>