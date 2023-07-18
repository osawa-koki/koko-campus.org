<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-20",
	"updated" => "2022-01-20",
);
head($obj);
?>
<div id="v1">
	<div class="center">
		<h2>シェルピンスキーのカーペット♪♪♪</h2>
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
						<th>再帰呼び出しの深さ</th>
						<td><input id="v1-n" type="range" min="2" max="7" step="1" value="3" /></td>
						<td>3</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>