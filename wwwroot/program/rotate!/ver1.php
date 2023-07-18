<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-28",
	"updated" => "2021-12-28",
);
head($obj);
?>
<h2 id="v1-ttl">rotate!</h2>
<div id="app">
	<svg id="v1-svg" width="300" height="300" version="1.1" v-bind:[viewbox]="get_vb" xmlns="http://www.w3.org/2000/svg"><!--v-bind:viewBox=""ではview「b」oxと変換されてしまうため、ここでは動的引数で実行する-->
		<g></g>
		<g>
			<circle :r="r" v-bind:cx="(xs !== '') ? xs : 0" v-bind:cy="(ys !== '') ? len - ys : 0" style="fill: black;"></circle>
			<circle :r="r * 1.2" v-bind:cx="(xb !== '') ? xb : 0" v-bind:cy="(yb !== '') ? len - yb : 0" style="fill: green;"></circle>
			<circle :r="r * 1.5" v-bind:cx="(x !== '') ? x : 0" v-bind:cy="(y !== '') ? len - y : 0" style="fill: red;"></circle>
		</g>
	</svg>
	<table id="v1-table" border="1">
		<tbody>
			<tr class="v1-bg_green">
				<td>x</td>
				<td><input type="number" v-model.number="xb" @input="changed" /></td>
				<td rowspan="2">({{xb}}, {{yb}})</td>
			</tr>
			<tr class="v1-bg_green">
				<td>y</td>
				<td><input type="number" v-model.number="yb" @input="changed" /></td>
			</tr>
			<tr class="v1-bg_black">
				<td>回転基準座標(x)</td>
				<td><input type="number" v-model.number="xs" @input="changed" /></td>
				<td rowspan="2">({{xs}}, {{ys}})</td>
			</tr>
			<tr class="v1-bg_black">
				<td>回転基準座標(y)</td>
				<td><input type="number" v-model.number="ys" @input="changed" /></td>
			</tr>
			<tr>
				<td>角度</td>
				<td><input type="number" v-model.number="deg" @input="changed" /></td>
				<td>{{deg}}&deg;</td>
			</tr>
			<tr class="v1-bg_red">
				<td>回転後の座標</td>
				<td colspan="2">({{rot_x}}, {{rot_y}})</td>
			</tr>
		</tbody>
	</table>
</div>
<script charset = "UTF-8" type="text/javascript" src="https://koko-campus.org/cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset = "UTF-8" type="text/javascript" src = "ver1.js" defer></script>
<?php footer(); ?>