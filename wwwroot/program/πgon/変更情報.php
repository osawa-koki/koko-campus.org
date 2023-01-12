<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20",
);
head($obj);
?>
<table class="change-log" border="1">
	<tbody>
		<tr>
			<td>ver1<br />2021/12/20</td>
			<td>第一弾</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>