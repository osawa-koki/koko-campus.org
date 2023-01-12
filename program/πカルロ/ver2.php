<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-25",
	"updated" => "2022-01-25",
);
head($obj);
?>
<div id="v2">
	<h2>円周率算定 &times; モンテカルロ法</h2>
	<canvas ref="canvas" width="1000" height="1000"></canvas>
	<div class="scroll">
		<table border="1">
			<tbody>
				<tr>
					<td>実行回数</td>
					<td><input type="range" min="10000" max="100000" step="10000" v-model:value.number="count" v-bind:disabled="!on_off" /></td>
					<td>{{count}}回</td>
				</tr>
				<tr>
					<td class="out">円の外</td>
					<td class="center">(*._.*)/</td>
					<td class="in">円の中</td>
				</tr>
				<tr>
					<td>{{pts[0]}}</td>
					<td class="center">点の数</td>
					<td>{{pts[1]}}</td>
				</tr>
				<tr>
					<td>{{rto[0]}}</td>
					<td class="center">点の割合</td>
					<td>{{rto[1]}}</td>
				</tr>
				<tr>
					<td>π = </td>
					<td colspan="2">{{pai}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="button" v-bind:class="[on_off ? '' : 'off']" v-on:click="run">開始</div>
</div>
<script charset="utf-8" type="text/javascript" src="../../cdn/vue.js/2.6.14-dev.js" defer></script>
<script charset = "UTF-8" type="text/javascript" src = "ver2.js" defer></script>
<?php footer(); ?>