<?php
require_once("common.php");
include_head("令和3年度春期試験");
?>

<div id = "main">
	<p id = "my_comment">あくまでもkoko自身の備忘録としてのページです。<br><br>資格試験勉強用のページでしたら<a href = "../../index">トップページ</a>からお願いします。</p>
	<h2>午前&#8544;問&#8544;</h2>
	<div class = "explanation">
		<span class = "underline">OAuth</span>とは、、、<br><br>
		「Open Authorization」の略で、複数のアプリケーションを連動させる仕組みを言います。<br><br>OpenIDと異なり、「<strong>認可</strong>」情報も複数のアプリケーション間で連携が可能です。<br><small>(認可情報を要求するサービス側が要求する権限を予め設定する必要あり)</small><br><br>重要なのは、Webサービス間でHTTP上で「アクセス権限の<span class = "underline">認可</span>」を行うためのプロトコルであり、「<span class = "underline">どの権限を与えるか</span>」に着目する必要がある点。
	</div>
	<div class = "explanation">
		<span class = "underline">stateパラメタ</span>とは、、、<br><br>
		「OpenID」や「OAuth」においてCSRF対策で利用されるパラメタです。認証で利用されるリダイレクト情報を不正に他人に使用されることを防ぐために設定されます。
	</div>
	<h2>午前&#8544;問&#8545;</h2>
	<div class = "explanation">
		<span class = "underline">DNSリフレクション攻撃</span>とは、、、<br><br>
		送信元のIPアドレスを偽装した名前解決要求を外部DNSサーバに送ることによって、外部DNSサーバを踏み台とし、攻対象となる第三者のサーバに対し大量のDNS攻撃を送り付けるというDoS攻撃を言います。<br><br>
		因みに僕が間違えて解答した「smurf攻撃」は、名前解決要求ではなくICMP echo requestによるものです。<br><small>(具体的な名称が曖昧、、、)</small>
	</div>
	<div class = "explanation">
		<span class = "underline">リソースレコード</span>とは、、、<br><br>
		<div class = "scroll_x">
			<table border = "1">
				<caption>リソースレコード</caption>
				<tbody>
					<tr>
						<th>Aレコード</th>
						<td>ホスト名に対応するIPアドレス(IPv4)</td>
					</tr>
					<tr>
						<th>AAAAレコード</th>
						<td>ホスト名に対応するIPアドレス(IPv6)</td>
					</tr>
					<tr>
						<th>CNAMEレコード</th>
						<td>ホスト名の別名</td>
					</tr>
					<tr>
						<th>MXレコード</th>
						<td>メールサーバのホスト名</td>
					</tr>
					<tr>
						<th>SOAレコード</th>
						<td>プライマリDNSサーバのホスト名・DNSサーバの動作に関する情報</td>
					</tr>
					<tr>
						<th>PTRレコード</th>
						<td>ホスト名の別名逆引き</td>
					</tr>
					<tr>
						<th>TXTレコード</th>
						<td>ホスト名に対するテキスト情報<br>(SPFレコードの記述)</td>
					</tr>
					<tr>
						<th>OPTレコード</th>
						<td>EDNS0に関する情報</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class = "explanation">
		<span class = "underline">DNS over TLS</span>とは、、、<br><br>
		スタブリゾルバとフルサービスリゾルバ間のDNS通信を暗号化するプロトコルです。
	</div>
	<div class = "explanation">
		<span class = "underline">ホスティングサービス</span>とは、、、<br><br>
		「≒レンタルサーバ」です。<br><br>
		プロバイダが所有するデータセンター内に設置されたサーバをインターネット経由で貸し出すことを言います。
	</div>
	<h2>午前&#8544;問&#8546;</h2>
	<div class = "explanation">
		<span class = "underline">WoL</span>とは、、、<br><br>
		「Wake on LAN」の略で、LAN上のホストの電源を遠隔で操作する仕組みです。<br><br>
		マジックパケットと呼ばれるイーサネットフレームを送信することで実現します。<br><br>
		BIOS・OSなどもWOL規格に対応している必要があります。
	</div>
	<div class = "explanation">
		<span class = "underline">マジックパケット</span>とは、、、<br><br>
		ブロードキャストアドレス(FF:FF:FF:FF:FF:FF)に続けて起動したいPCのMAcアドレスを16回繰り返したデータを含むパケットを言います。
	</div>
	<h2>午前&#8545;問&#8544;</h2>
	<div class = "explanation">
		<span class = "underline">インシデント対応のライフサイクル</span>とは、、、<br><br>
		NISTのSP-800-61によるとインシデント対応のライフサイクルでは、以下の手順を提唱しています。
		<ol>
			<li>準備</li>
			<li>検知と分析</li>
			<li>封じ込め</li>
			<li>根絶</li>
			<li>復旧</li>
			<li>事件後の対応</li>
		</ol>
	</div>
	<h2>午前&#8545;問&#8545;</h2>
	<div class = "explanation">
		<span class = "underline">DHCP通信</span>とは、、、<br><br>
		PCがDHCPサーバからIPアドレスを取得するための手順を説明します。
		<ol>
			<li>PCから「DHCP DISCOVER(IPアドレス配布依頼)」をブロードキャストアドレスに送信する。</li>
			<li>DHCPサーバは「DHCP OFFER(配布候補IPアドレス)」をPCに送信する。</li>
			<li>PCは使用するIPアドレスを決定して「DHCP REQUEST」をブロードキャストに送信する。</li>
			<li>DHCPサーバは「DHCP ACK」によって貸出期間の連絡をPCに送信する。</li>
		</ol>
	</div>
	<div class = "explanation">
		<span class = "underline">ISMSクラウドセキュリティ認証</span>とは、、、<br><br>
		通常のISMS(JIS Q 27001)認証に加えて、クラウドサービス固有の管理策(ISO/IEC 27017)が 適切に導入、実施されていることを認証するものです。<br><small>※引用元は<a href = "https://isms.jp/isms.html">こちら</a>。</small>
	</div>

	<h2></h2>
</div>

<?php
include_footer();
?>