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
		<h2>ジュリア集合♪♪♪</h2>
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
						<td><input id="v1-lim" type="range" min="5" max="50" step="1" value="30" /></td>
						<td>30</td>
					</tr>
					<tr>
						<th>発散判定値</th>
						<td><input id="v1-z" type="range" min="5" max="50" step="1" value="10" /></td>
						<td>10</td>
					</tr>
					<tr>
						<th>実数部</th>
						<td><input id="v1-real" type="range" min="0.5" max="1.5" step="0.1" value="0.8" /></td>
						<td>0.8</td>
					</tr>
					<tr>
						<th>虚数部</th>
						<td><input id="v1-imaginary" type="range" min="0.01" max="1" step="0.01" value="0.15" /></td>
						<td>0.15</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>