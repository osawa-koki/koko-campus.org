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
		<h2>バラ曲線♪♪♪</h2>
		<br />
		<canvas width="500" height="500"></canvas>
		<br />
		<div id="v1-btn">スタート♪</div>
		<div class="scroll">
			<table border="1">
				<tbody>
					<tr>
						<td colspan="3" class="center">r=sin(nθ/k)</td>
					</tr>
					<tr>
						<th>n</th>
						<td><input id="v1-n" type="range" min="1" max="15" step="1" value="5" /></td>
						<td>5</td>
					</tr>
					<tr>
						<th>k</th>
						<td><input id="v1-k" type="range" min="1" max="15" step="1" value="2" /></td>
						<td>2</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>