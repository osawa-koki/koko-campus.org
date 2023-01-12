<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-16",
	"updated" => "2022-01-16",
);
head($obj);
?>
<div id="v1">
	<div class="center">
		<h2>ピタゴラスの木</h2>
		<br />
		<div class="scroll">
			<svg width="500" height="500" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"></svg>
		</div>
		<br />
		<div id="v1-btn">スタート♪</div>
		<div class="scroll">
			<table border="1">
				<tbody>
					<tr>
						<th>再帰呼び出し回数</th>
						<td><input id="v1-n" type="range" min="3" max="15" step="1" value="7" /></td>
						<td>7</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>