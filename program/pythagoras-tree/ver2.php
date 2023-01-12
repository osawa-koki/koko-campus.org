<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-25",
	"updated" => "2022-01-25",
);
head($obj);
?>
<div id="v2">
	<div class="center">
		<h2>ピタゴラスの木</h2>
		<br />
		<div class="scroll">
			<canvas ref="canvas" width="10000" height="10000"></canvas>
		</div>
		<br />
		<div v-on:click="run" v-bind:class="[!x_lock ? 'btn_ok' : 'btn_ng']">スタート♪</div>
		<table border="1">
			<tbody>
				<tr>
					<th>ルートの色</th>
					<td><input type="range" min="0" max="300" step="1" v-model.number="color" v-bind:disabled="x_lock" v-on:input="run(false)" /></td>
					<td v-bind:style="{backgroundColor: hsl}"></td>
				</tr>
				<tr>
					<th>大きさ</th>
					<td><input type="range" min="500" max="3000" step="100" v-model.number="size" v-bind:disabled="x_lock" v-on:input="run(false)" /></td>
					<td>{{show_size}}</td>
				</tr>
				<tr>
					<th>再帰呼び出し回数</th>
					<td><input type="range" min="3" max="10" step="1" v-model.number="count" v-bind:disabled="x_lock" v-on:input="run(false)" /></td>
					<td>{{count}}</td>
				</tr>
				<tr>
					<th>角度</th>
					<td><input type="range" min="15" max="75" step="5" v-model.number="deg" v-bind:disabled="x_lock" v-on:input="run(false)" /></td>
					<td>({{deg}}, {{90 - deg}})</td>
				</tr>
				<tr>
					<th>初期箱の位置(横)</th>
					<td colspan="2" v-bind:style="{background: bg}">
						<input type="range" min="2000" max="8000" step="500" v-model.number="standing" v-bind:disabled="x_lock" v-on:input="run(false)" />
					</td>
				</tr>
				<tr>
					<th>初期箱の位置(縦)</th>
					<td colspan="2">
						<input type="range" min="0" max="3000" step="100" v-model.number="boots" v-bind:disabled="x_lock" v-on:input="run(false)" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="../../cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset="utf-8" type="text/javascript" src="ver2.js" defer></script>
<?php footer(); ?>