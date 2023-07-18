<?php
require_once("common.php");
include_head("安全な技術");
?>

<div id = "main">
	<p id = "my_comment">一応、前回の授業でセキュリティ分野は終了しましたが、ここでもう一度総復習として安全な技術・安全ではない技術について扱いますね♪<br><br>それでは、Let's dance!!</p>
	<h2>利用推奨技術・利用非推奨技術</h2>
	<p>2021年10月現在、安全ではないとされる技術と代替の技術について紹介しますね♪</p>
	<div class = "scroll_x">
		<table border = "1" class = "norble" id = "ok_security">
			<thead>
				<tr>
					<th>利用非推奨の技術</th>
					<th>代替の技術</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Telnet</td>
					<td rowspan = "2">SSH</td>
				</tr>
				<tr>
					<td>FTP</td>
				</tr>
				<tr>
					<td>BASIC認証</td>
					<td>DIGEST認証</td>
				</tr>
				<tr>
					<td>SMTP</td>
					<td>SMTP-AUTH</td>
				</tr>
				<tr>
					<td>USER/PASSコマンド</td>
					<td>APOPコマンド</td>
				</tr>
				<tr>
					<td>CHAP</td>
					<td>S/Key</td>
				</tr>
				<tr>
					<td>
						SASL方式
						<ul>
							<li>PLAIN</li>
							<li>LOGIN</li>
						</ul>
					</td>
					<td>
						SASL方式
						<ul>
							<li>CRAM-MD5</li>
							<li>DIGEST-MD5</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<h2></h2>
</div>

<?php
include_footer();
?>