<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-04-10",
	"updated" => "2022-04-10",
);
head($obj);
?>
<table class="change-log" border="1">
	<tbody>
		<tr>
			<td>ver1<br />2022/04/10</td>
			<td>第一弾</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>