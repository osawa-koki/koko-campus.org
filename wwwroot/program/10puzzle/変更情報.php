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
			<td>ver4<br />2021/12/07</td>
			<td>括弧を用いた演算を追加<br />重複した演算の削除</td>
		</tr>
		<tr>
			<td>ver3<br />2021/12/01</td>
			<td>演算子が重複して選択可能なようにプログラムを修正</td>
		</tr>
		<tr>
			<td>ver2<br />2021/11/22</td>
			<td>カエルが餅つきをしながら演算してくれるようにグレードアップ</td>
		</tr>
		<tr>
			<td>ver1<br />2021/11/20</td>
			<td>第一弾</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>