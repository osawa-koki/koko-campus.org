<?php
require_once("common.php");
include_head("令和2年度秋期試験");
?>

<div id = "main">
	<p id = "my_comment">あくまでもkoko自身の備忘録としてのページです。<br><br>資格試験勉強用のページでしたら<a href = "../../index">トップページ</a>からお願いします。</p>
	<h2>午前&#8544;問&#8544;</h2>
	<div class = "explanation">
		<span class = "underline">メールヘッダ情報</span>について、、、<br><br>
		<div class = "scroll_x">
			<table border = "1" class = "norble">
				<tbody>
					<tr>
						<td>Return-Patd:</td>
						<td>「<strong>MAIL FROM</strong>」コマンドで指定した送信者のエンベロープアドレス</td>
					</tr>
					<tr>
						<td>Received from:</td>
						<td>「<strong>HELO</strong>」コマンドで指定されたメール送信者のホストドメイン<br>(右の()内には上記のホストのIPアドレスから逆引きされたホストドメイン名とIPアドレスが入る)</td>
					</tr>
					<tr>
						<td>Recieved by:</td>
						<td>メールを受信したサーバのドメイン名・ホスト名</td>
					</tr>
					<tr>
						<td>Recieved for:</td>
						<td>「<strong>RCPT TO</strong>」コマンドで指定する最終的なメール送信先アドレス</td>
					</tr>
					<tr>
						<td>From:</td>
						<td>メール送信者のMUAに設定されたFromアドレス</td>
					</tr>
					<tr>
						<td>To:</td>
						<td>メール受信者のMUAに設定されたToアドレス</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class = "explanation">
		<span class = "underline">SPFの仕組み</span><br><br>
		受信者側のメールサーバが送信者側のDNSサーバに問合せを行い、DNSサーバはTXTレコード(SPFレコード)から送信者側のメールサーバに関する情報を返すことで、受信者側メールサーバがメールの正当性を確認できるようにする。
	</div>

	<h2></h2>
</div>

<?php
include_footer();
?>