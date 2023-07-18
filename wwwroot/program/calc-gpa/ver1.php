<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-25",
	"updated" => "2022-01-25",
);
head($obj);
?>
<div id="v1">
	<h1>GPA計算機</h1>
	<table border="1">
		<thead>
			<tr>
				<th>成績</th>
				<th colspan="2">取得単位数</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>S(4)</th>
				<td><input type="range" min="0" max="100" step="1" v-model:value.number="now[4]" v-on:change="change" /></td>
				<td>{{now[4]}}</td>
			</tr>
			<tr>
				<th>A(3)</th>
				<td><input type="range" min="0" max="100" step="1" v-model:value.number="now[3]" v-on:change="change" /></td>
				<td>{{now[3]}}</td>
			</tr>
			<tr>
				<th>B(2)</th>
				<td><input type="range" min="0" max="100" step="1" v-model:value.number="now[2]" v-on:change="change" /></td>
				<td>{{now[2]}}</td>
			</tr>
			<tr>
				<th>C(1)</th>
				<td><input type="range" min="0" max="100" step="1" v-model:value.number="now[1]" v-on:change="change" /></td>
				<td>{{now[1]}}</td>
			</tr>
			<tr>
				<th>F・T(0)</th>
				<td><input type="range" min="0" max="100" step="1" v-model:value.number="now[0]" v-on:change="change" /></td>
				<td>{{now[0]}}</td>
			</tr>
			<tr>
				<th colspan="2">現在のGPA</th>
				<td>{{gpa.toFixed(2)}}</td>
			</tr>
		</tbody>
	</table>
</div>
<script charset="utf-8" type="text/javascript" src="../../cdn/vue.js/2.6.14-ops.js" defer></script>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>