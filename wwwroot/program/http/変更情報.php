<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-03-05",
	"updated" => "2022-03-05",
);
head($obj);
?>
<table class="change-log" border="1">
	<tbody>
		<tr>
			<td>ver1<br />2022-03-05</td>
			<td>第一弾</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>