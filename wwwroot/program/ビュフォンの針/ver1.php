<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-25",
	"updated" => "2021-12-25",
);
head($obj);
?>
<h2 id="v1-ttl">円周率算定 &times; ビュフォンの針</h2>
<svg id="v1-svg" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"></svg>
<div class="scroll">
	<table id="v1-table" border="1">
		<thead>
			<tr>
				<td class="v1-bg_out">線に非接触</td>
				<td>(*._.*)/</td>
				<td class="v1-bg_in">線に接触</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td id="v1-out">0</td>
				<td>針の数</td>
				<td id="v1-in">0</td>
			</tr>
			<tr>
				<td><span id="v1-ppn0">0.00000</span>%</td>
				<td>針の割合</td>
				<td><span id="v1-ppn1">0.00000</span>%</td>
			</tr>
			<tr>
				<td colspan="3">
					<div id="pai-container">
						<div>π = </div>
						<div id="v1-pai">??????????</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div id="v1-button">開始</div>
<script charset = "UTF-8" type="text/javascript" src = "ver1.js" defer></script>
<?php footer(); ?>