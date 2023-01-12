<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-12-07",
);
head($obj);
?>
<table class="change-log" border="1">
	<tbody>
		<tr>
			<td>終了<br /></td>
		</tr>
		<tr>
			<td>ver3<br />2021/12/10</td>
			<td>設定を変更できるようにアップデート</td>
		</tr>
		<tr>
			<td>ver2<br />2021/12/08</td>
			<td>事実上の第一弾</td>
		</tr>
		<tr>
			<td>ver1<br />2021/11/20</td>
			<td>途中で挫折<br />残念、、、</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>