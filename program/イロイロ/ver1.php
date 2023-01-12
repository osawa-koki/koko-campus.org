<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-11-20",
);
head($obj);
?>
自分だけの色を作りましょう♪<br />色はR(red:赤)とG(green:緑)とB(blue:青)とA(alpha:透明度)の組み合わせで作成できます。
<br />
<div id="v1-c">
	<table>
		<tbody>
			<tr>
				<td class="bd-red">R:赤</td>
				<td><input type="range" min="0" max="255" step="1" value="255" /></td>
				<td></td>
			</tr>
			<tr>
				<td class="bd-green">G:緑</td>
				<td><input type="range" min="0" max="255" step="1" value="0" /></td>
				<td></td>
			</tr>
			<tr>
				<td class="bd-blue">B:青</td>
				<td><input type="range" min="0" max="255" step="1" value="0" /></td>
				<td></td>
			</tr>
			<tr>
				<td class="bd-black">A:透明度</td>
				<td><input type="range" min="0" max="1" step="0.1" value="1" /></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
<div id="v1-s"></div>
<script charset = "UTF-8" type="text/javascript" src = "ver1.js" defer></script>
<?php footer(); ?>