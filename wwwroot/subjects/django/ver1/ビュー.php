<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>ビュー</h2>
ビューとはリクエストに対してフォーム・モデル・テンプレートに関する処理をまとめて、その結果をレスポンスとして返す役割を担います。
<img src="../pics/ビューの役割.png" alt="ビュー" />















<?php footer(); ?>