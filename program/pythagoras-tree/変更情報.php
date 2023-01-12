<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-16",
	"updated" => "2022-01-25",
);
head($obj);
?>
<div class="change-log_container">
	<table class="change-log" border="1">
		<tbody>
			<tr>
				<td>ver2<br />2022-01-25</td>
				<td>
					vue.jsを使用して書き換え<br />
					設定できる要素を追加<br />
					svgタグからcanvasタグに変更して高速化
				</td>
			</tr>
			<tr>
				<td>ver1<br />2022-01-16</td>
				<td>第一弾</td>
			</tr>
		</tbody>
	</table>
</div>
<?php footer(); ?>