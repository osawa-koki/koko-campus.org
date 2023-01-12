<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-02-15",
	"updated" => "2022-02-15",
);
head($obj);
?>
<div id="v2">
	<div class="center">
		<h2>マンデルブロ集合♪♪♪</h2>
		<br />
		<div class="scroll">
			<canvas ref="canvas" width="500" height="500"></canvas>
		</div>
		<br />
		<div class="button" v-on:click="run">スタート♪</div>
		<div class="scroll">
			<table border="1">
				<tbody>
					<tr>
						<th>色</th>
						<td><input type="range" min="0" max="360" step="1" v-model.number="color" /></td>
						<td v-bind:style="{backgroundColor: bgColor}"></td>
					</tr>
					<tr>
						<th>漸化式の指数</th>
						<td><input type="range" min="1" max="10" step="1" v-model.number="power" /></td>
						<td>Z = Z<sup>{{power}}</sup> + C</td>
					</tr>
					<tr>
						<th>漸化式の計算回数</th>
						<td><input type="range" min="5" max="50" step="1" v-model.number="limit" /></td>
						<td>{{limit}}回</td>
					</tr>
					<tr>
						<th>発散判定値</th>
						<td><input type="range" min="5" max="50" step="1" v-model.number="upto" /></td>
						<td>{{upto}}</td>
					</tr>
					<tr>
						<th>解像度</th>
						<td><input type="range" min="100" max="300" step="50" v-model.number="resolution" /></td>
						<td>{{resolution}}</td>
					</tr>
					<tr>
						<th>実軸(Re)</th>
						<td><input type="range" min="0" max="3" step="0.1" v-model.number="Re" /></td>
						<td>{{Re}}</td>
					</tr>
					<tr>
						<th>虚軸(Im)</th>
						<td><input type="range" min="0" max="3" step="0.1" v-model.number="Im" /></td>
						<td>{{Im}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="../../cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset="utf-8" type="text/javascript" src="ver2.js" defer></script>
<?php footer(); ?>