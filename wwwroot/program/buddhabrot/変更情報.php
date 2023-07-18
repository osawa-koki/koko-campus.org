<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-22",
	"updated" => "2022-01-22",
);
head($obj);
?>
<table class="change-log" border="1">
	<tbody>
		<tr>
			<td>ver1<br />2022-01-22</td>
			<td>第一弾<br />(失敗作)</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>