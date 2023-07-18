<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-24",
	"updated" => "2021-12-07",
);
head($obj);
?>
<table class="change-log" border="1">
	<tbody>
		<tr>
			<td>ver2<br />2021/12/08</td>
			<td>ver1がなんか微妙だったから、、、</td>
		</tr>
		<tr>
			<td>ver1<br />2021/11/20</td>
			<td>第一弾</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>