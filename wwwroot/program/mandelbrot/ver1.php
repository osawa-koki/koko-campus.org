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
		<h2>マンデルブロ集合♪♪♪</h2>
		<br />
		<div class="scroll">
			<canvas width="500" height="500"></canvas>
		</div>
		<br />
		<div id="v1-btn">スタート♪</div>
		<div class="scroll">
			<table border="1">
				<tbody>
					<tr>
						<th>色</th>
						<td><input id="v1-color" type="range" min="0" max="360" step="1" value="0" /></td>
						<td></td>
					</tr>
					<tr>
						<th>漸化式の計算回数</th>
						<td><input id="v1-lim" type="range" min="5" max="50" step="1" value="20" /></td>
						<td>20</td>
					</tr>
					<tr>
						<th>発散判定値</th>
						<td><input id="v1-z" type="range" min="5" max="50" step="1" value="10" /></td>
						<td>10</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>