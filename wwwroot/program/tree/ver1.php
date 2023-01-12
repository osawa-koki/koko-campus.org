<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-23",
	"updated" => "2022-01-23",
);
head($obj);
?>
<div id="v1">
	<div class="center">
		<h2>tree!!</h2>
		<br />
		<div class="scroll">
			<canvas width="500" height="500"></canvas>
		</div>
		<br />
		<div id="v1-btn">スタート♪</div>
		<div class="scroll">
			<table border="1">
				<tbody>
					<!--
					<tr>
						<th>色</th>
						<td><input id="v1-color" type="range" min="0" max="360" step="1" value="0" /></td>
						<td></td>
					</tr>
					-->
					<tr>
						<th>枝の長さ</th>
						<td><input id="v1-len" type="range" min="80" max="150" step="1" value="120" /></td>
						<td>120</td>
					</tr>
					<tr>
						<th>枝の開きの角度</th>
						<td><input id="v1-angle" type="range" min="10" max="50" step="5" value="25" /></td>
						<td>25</td>
					</tr>
					<tr>
						<th>枝の縮み率</th>
						<td><input id="v1-shrink" type="range" min="0.6" max="0.9" step="0.05" value="0.7" /></td>
						<td>0.7</td>
					</tr>
					<tr>
						<th>再帰呼び出しの深さ</th>
						<td><input id="v1-n" type="range" min="3" max="15" step="1" value="12" /></td>
						<td>12</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>