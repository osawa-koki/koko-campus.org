<?php
require_once("common.php");
include_head("暗号に関する規格");
?>

<div id = "main">
	<h2>暗号に関する規格</h2>
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>CMVP</th>
					<td>アメリカとカナダで使用されている暗号に関する規格(暗号モジュール試験・認証)です。</td>
				</tr>
				<tr>
					<th>JCMVP</th>
					<td>CMVPの日本バージョンです。<br>CMVPと互換性があります。<br><small>※参考サイトは<a href = "https://www.ipa.go.jp/files/000013358.pdf">こちら</a>。</small></td>
				</tr>
				<tr>
					<th>JIS X 19790<br>ISO/IEC 19790</th>
					<td>FIPS140を基に作成された暗号モジュールのセキュリティ要求事項です。</td>
				</tr>
				<tr>
					<th>FIPS140</th>
					<td>アメリカ政府における認証モジュールの認定基準及び認定を受けた製品のリストです。</td>
				</tr>
				<tr>
					<th>FIPS180</th>
					<td>FIPS140のハッシュ関数バージョンです。</td>
				</tr>
			</tbody>
		</table>
	</div>

	<h2></h2>
</div>

<?php
include_footer();
?>