<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-07",
	"updated" => "2021-12-07",
);
head($obj);
?>
<div id="v2-ttl">rgbaクリエイター</div>
<br />
<div id="v1-c">
	<table>
		<tbody>
			<tr>
				<td class="bd-red">R:赤</td>
				<td><input class="v2-slider" type="range" min="0" max="255" step="1" value="255" /></td>
				<td><input class="v2-value" type="number" min="0" max="255" /></td>
			</tr>
			<tr>
				<td class="bd-green">G:緑</td>
				<td><input class="v2-slider" type="range" min="0" max="255" step="1" value="0" /></td>
				<td><input class="v2-value" type="number" min="0" max="255" /></td>
			</tr>
			<tr>
				<td class="bd-blue">B:青</td>
				<td><input class="v2-slider" type="range" min="0" max="255" step="1" value="0" /></td>
				<td><input class="v2-value" type="number" min="0" max="255" /></td>
			</tr>
			<tr>
				<td class="bd-black">A:透明度</td>
				<td><input class="v2-slider" type="range" min="0" max="1" step="0.1" value="1" /></td>
				<td><input class="v2-value" type="number" min="0" max="100" /></td>
			</tr>
		</tbody>
	</table>
</div>
<div id="v2-z">
	<table border="1">
		<tbody>
			<tr>
				<td colspan="2">自動でクリップボードへコピー!!</td>
			</tr>
			<tr id="v2-copy">
				<td width="50%"><input type="checkbox" class="v2-c" id="v2-copy0" /><label for="v2-copy0">rgba値をコピー!</label></td>
				<td width="50%"><input type="checkbox" class="v2-c" id="v2-copy1" /><label for="v2-copy1">16進数表記値をコピー!</label><br /><small>(透明度は表せません)</small></td>
			</tr>
			<tr>
				<td><input class="v2-d" type="text" /></td>
				<td><input class="v2-d" type="text" /></td>
			</tr>
		</tbody>
	</table>
</div>
<div id="v2-s"></div>
<script charset = "UTF-8" type="text/javascript" src = "ver2.js" defer></script>
<?php footer(); ?>