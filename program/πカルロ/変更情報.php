<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-12-10",
	"updated" => "2021-12-10",
);
head($obj);
?>
<table class="change-log" border="1">
	<tbody>
		<tr>
			<td>ver2<br />2022/01/25</td>
			<td>
				<ul>
					<li>svgをcanvasタグに変更して高速化</li>
					<li>時間を設定せずに連続で実行するように変更</li>
					<li>vue.jsを用いて書き換え</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>ver1<br />2021/12/10</td>
			<td>第一弾</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>