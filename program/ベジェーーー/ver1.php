<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20",
);
head($obj);
?>
<div id="v1-main">
	<div class="center"><div id="v1-ttl">ベジェ曲線ジェネレータ</div></div>
	<p>失敗作です。<br />横軸が意味するものを時間だと勘違いしていたせいです。<br />バージョン管理のためにそのまま公開しています。</p>
	<p id="v1-info" class="center">下のスライドバーを一番右までスライドして下さい。</p>
	<div id="v1-sl-bx">
		<input type="range" min="0" max="100" value="0" step="1" id="v1-rg">
	</div>
	<div id="v1-svgx"></div>
	<div id="v1-btn"></div>
</div>
<div id="v1-s"></div>
<script charset = "UTF-8" type="text/javascript" src = "ver1.js" defer></script>
<?php footer(); ?>