<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-10",
	"updated" => "2021-12-10",
);
head($obj);
?>
<div class="gc"><div id="v3-ttl">♪♪♪三次ベジェ曲線解説用プログラム♪♪♪</div></div>
<div id="v3-show">cubic-bezier</div>

<svg id="v3-svg" width="300" height="300" version="1.1" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
	<g id="v3-svg_ls"></g>
	<g id="v3-svg_nr"></g>
	<g id="v3-svg_sh"></g>
	<g id="v3-svg_tx"></g>
	<g id="v3-svg_sf"></g>
	<circle id="v3-now" r="10"></circle>
</svg>
<div id="v3-btn-bx" class="gc">
	<div id="v3-button">実行!!</div>
</div>
<table id="v3-ppt" class="x" border="1">
	<tbody>
		<tr>
			<td>グリッド幅</td>
			<td><input type="range" min="1" max="30" step="1" value="15" id="v3-range"></td>
		</tr>
		<tr>
			<td>グリッド濃度</td>
			<td><input type="range" min="1" max="10" step="1" id="v3-dense"></td>
		</tr>
		<tr>
			<td>移動速度</td>
			<td><input type="range" min="1" max="10" value="5" step="1" id="v3-speed"></td>
		</tr>
		<tr>
			<td>移動精度</td>
			<td><input type="range" min="1" max="10" value="5" step="1" id="v3-interval"></td>
		</tr>
		<tr>
			<td>サイズ</td>
			<td><input type="range" min="1" max="10" value="1" step="1" id="v3-size"></td>
		</tr>
	</tbody>
</table>
<script charset = "UTF-8" type="text/javascript" src = "ver3.js" defer></script>
<?php footer(); ?>