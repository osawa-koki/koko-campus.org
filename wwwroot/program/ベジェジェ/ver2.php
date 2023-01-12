<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-08",
	"updated" => "2021-12-08",
);
head($obj);
?>
<div class="gc"><div id="v2-ttl">♪♪♪三次ベジェ曲線解説用プログラム♪♪♪</div></div>
<div id="v2-show">cubic-bezier</div>

<svg id="v2-svg" width="300" height="300" version="1.1" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
	<g id="v2-svg_ls"></g>
	<g id="v2-svg_nr"></g>
	<g id="v2-svg_sh"></g>
	<g id="v2-svg_tx"></g>
	<g id="v2-svg_sf"></g>
	<circle id="v2-now" r="10"></circle>
</svg>
<div id="v2-btn-bx" class="gc">
	<div id="v2-button">実行!!</div>
</div>
<script charset = "UTF-8" type="text/javascript" src = "ver2.js" defer></script>
<?php footer(); ?>