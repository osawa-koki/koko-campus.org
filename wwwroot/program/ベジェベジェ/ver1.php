<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-11-20",
);
head($obj);
?>
<div class="gc">
	<div id="v1-ttl">♪♪♪簡単に三次ベジェ曲線を求めるプログラム♪♪♪</div>
</div>
<div id="v1-show">cubic-bezier</div>
<svg id="v1-svg" class="x" width="300" height="300" version="1.1" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
	<g id="v1-svg_ls"></g>
	<g id="v1-svg_nr"></g>
	<g id="v1-svg_cl"></g>
</svg>
<script charset = "UTF-8" type="text/javascript" src = "ver1.js" defer></script>
<?php footer(); ?>