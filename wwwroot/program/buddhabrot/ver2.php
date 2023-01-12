<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-22",
	"updated" => "2022-01-22",
);
head($obj);
?>
<div id="v2">
	<h2>ブッダブロ♪♪♪</h2>
	<canvas width="1000" height="1000"></canvas>
	<div id="v2-btn" class="button">スタート♪</div>
	<div class="scroll">
		<table border="1">
			<tbody>
				<tr>
					<th>漸化式の計算回数</th>
					<td><input id="v2-n" type="range" min="100000" max="1000000" step="100" value="10000" /></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="ver2.js" defer></script>
<?php footer(); ?>