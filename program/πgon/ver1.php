<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20",
);
head($obj);
?>
<h2 id="v1-ttl">円周率算定 &times; 正多角形法</h2>
<svg id="v1-svg" version="1.1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"></svg>
<div class="scroll">
	<table id="v1-table" border="1">
		<thead>
			<tr>
				<td class="v1-bg_in">内接する多角形</td>
				<td>(*._.*)/</td>
				<td class="v1-bg_out">外接する多角形</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="v1-gon"></td>
				<td>正？角形</td>
				<td class="v1-gon"></td>
			</tr>
			<tr>
				<td id="v1-in"></td>
				<td>周の長さ</td>
				<td id="v1-out"></td>
			</tr>
			<tr>
				<td id="v1-min"></td>
				<td class="consolas center">&lt; π &lt;</td>
				<td id="v1-max"></td>
			</tr>
		</tbody>
	</table>
</div>
<div id="v1-button">+1角</div>
<script charset = "UTF-8" type="text/javascript" src = "ver1.js" defer></script>
<?php footer(); ?>