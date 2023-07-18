<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-11-20",
);
head($obj);
?>
<h2 id="v1-ttl">最適なパートナーの見つけ方♪</h2>
<div id="v1-container">
	<svg id="v1-svg" width="300" height="300" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"></svg>
</div>
<table id="v1-table" border="1">
	<tbody>
		<tr>
			<td>生涯で出会う異性の数</td>
			<td><input type="range" min="5" max="100" value="10" step="1"></td>
			<td><span>5</span>人</td>
		</tr>
		<tr>
			<td colspan="3"><div id="v1-button">開始</div></td>
		</tr>
	</tbody>
</table>

<script charset = "UTF-8" type="text/javascript" src = "ver1.js" defer></script>
<?php footer(); ?>