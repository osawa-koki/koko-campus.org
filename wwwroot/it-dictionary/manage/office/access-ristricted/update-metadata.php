<?php

$files = array_map(function ($n) { // ファイル一覧を取得
	$m = preg_replace("/\.html/", "", $n);
	return $m;
}, array_diff(scandir(__DIR__. "/../../words/"), array(".", "..", "テンプレート.html")));

$assoc = array(); // 最終的に保存する用のデータ構造

foreach ($files as $f) { // ファイルを操作して、メタデータ部分を取得・連想配列を作成
	$contents = file_get_contents(__DIR__. "/../../words/{$f}.html");
	preg_match("/{.*?}/s", $contents, $meta_str);
	$meta = json_decode($meta_str[0], true);
	$assoc[$f] = $meta;
}

file_put_contents(__DIR__. "/metadata.json", json_encode($assoc, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

?>