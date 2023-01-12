<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-12-15",
);
head($obj);
?>
<table class="change-log" border="1">
	<tbody>
		<tr>
			<td>ver3<br />2021/12/15</td>
			<td>
				<ul>
					<li>テンプレートの追加</li>
					<li>自動スクロール機能の追加</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>ver2<br />2021/12/10</td>
			<td>
				<ul>
					<li>ベジェジェ(ベジェ曲線解説プログラム)を基に機能をアップデート</li>
					<li>実装(テスト)機能の追加</li>
					<li>ログの追加</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>ver1<br />2021/11/20</td>
			<td>第一弾</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>