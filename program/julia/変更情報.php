<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-20",
	"updated" => "2022-02-15",
);
head($obj);
?>
<div class="change-log_container">
	<table class="change-log" border="1">
		<tbody>
			<tr>
				<td>ver2<br />2022-02-15</td>
				<td>
					<ul>
						<li>次乗以上の漸化式を追加</li>
						<li>実軸・虚軸と解像度の設定を可能に</li>
						<li>vue.jsを使用して書き換え</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td>ver1<br />2022-01-20</td>
				<td>第一弾</td>
			</tr>
		</tbody>
	</table>
</div>
<?php footer(); ?>