<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-11-20",
);
head($obj);
?>
<div class="gc"><div id="v1-ttl">♪♪♪三次ベジェ曲線解説用プログラム♪♪♪</div></div>
<div id="v1-show">cubic-bezier</div>

<svg id="v1-svg" width="300" height="300" version="1.1" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
	<g id="v1-svg_ls"></g>
	<g id="v1-svg_nr"></g>
	<g id="v1-svg_sh">
		<line id="v1-line"></line>
	</g>
	<g id="v1-svg_tx"></g>
	<g id="v1-svg_sf">
		<circle r="10" cx="0" cy="300" style="fill: red; stroke: black; stroke-width: 1">
		</circle>
		<text
			style="fill: white"
			x="-5"
			y="305">1
		</text>
		<circle r="10" cx="300" cy="0" style="fill: red; white; stroke: black; stroke-width: 1">
		</circle>
		<text
			style="fill: white"
			id="v1-end"
			x="295"
			y="5">2
		</text>
	</g>
</svg>
<div id="v1-btn-bx" class="gc">
	<div id="v1-button">実行!!</div>
</div>
<script charset = "UTF-8" type="text/javascript" src = "ver1.js" defer></script>
<?php footer(); ?>