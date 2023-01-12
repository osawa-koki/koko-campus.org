<?php
require_once("common.php");
include_head("認証プロトコル");
?>

<div id = "main">
	<p id = "my_comment">今回はセキュリティ実装技術の第二弾、認証プロトコルについて学びます。<br><br>少し前の授業で認証技術について学んだのを覚えていますか?<br><small>※認証技術のページは<a href = "sc-1-1-14">こちら</a>。</small><br><br>重複している個所もありますが、今回は主に認証技術をプロトコルの視点から学びます。<br><br>それでは、Let's dive!!</p>
	<h2>認証プロトコル</h2>
	<p>最初に大前提となる認証について再確認しますね。</p>
	<p class = "explanation">
		<span class = "underline">認証</span>とは、、、<br><br>
		何らかの識別情報に基づいて、ある人・物・情報の正当性や真正性を確認することを言います。
	</p>
	<p>ここでは、その認証を実現するプロトコルについて学びます。<br><br>認証プロトコルには以下のプロトコルがあります。</p>
	<ul>
		<li>SPF</li>
		<li>DKIM</li>
		<li>SMTP-AUTH</li>
		<li>OAuth</li>
		<li>DNSSEC</li>
		<li>EAP</li>
		<li>EAP-TLS</li>
		<li>PEAP</li>
		<li>RADIUS</li>
		<li>Diameter</li>
		<li>PSK</li>
	</ul>
	<h2>SPF</h2>
	<p>エージェント型攻撃の授業で一度学んだんですけど覚えていますか?<br><small>※リンクは<a href = "sc-1-1-7?to=href_mail">こちら</a>。</small><br><br>SPFとは、「Secder Policy Framework」の略で、メールの送信元を検証して<a href = "sc-1-1-7?to=href_mail">第三者中継</a>を防ぐセキュリティ技術です。<br><br>具体的には、予め発信元ドメインのDNSサーバのTXTレコードに正当なSMTPサーバのIPアドレス(SPFレコード)を登録して、受信側のメールサーバ(SMTPサーバ)はメール受信時に発信元のDNSサーバに問い合わせて、エンベロープに記載されているメールアドレスの正当性を検証します。</p>
	<h2>DKIM</h2>
	<p>こちらもエージェント型攻撃の授業で一度学んだ内容です。<br><small>※リンクは<a href = "sc-1-1-7?to=href_mail">こちら</a>。</small><br><br>DKIMとは、「DomainKeys Identified Mail」の略で、ディジタル署名による送信ドメイン検証を実現するプロトコルです。<br><br>予め発信元ドメインのDNSサーバに公開鍵を登録しておき、SMTPサーバがメールに対になる秘密鍵でディジタル署名を付してメールを送信して、受信側のメールサーバ(SMTPサーバ)が発信元の公開鍵を用いてメールの正当性を検証します。<br><br>似た技術として「<a href = "sc-1-1-7?to=href_mail">DomainKeys</a>」がありますが、「DKIM」は「DomainKeys」の進化バージョンでドメイン単位の署名・検証だけでなく、<span class = "underline">ユーザ単位での署名・検証</span>が可能です。</p>
	<h2>SMTP-AUTH</h2>
	<p>こちらもエージェント型攻撃の授業で一度学んだ内容です。<br><small>※リンクは<a href = "sc-1-1-7?to=href_mail">こちら</a>。</small><br><br>簡単に説明すると、「SMTP」×「ユーザ認証」です。<br><br>MSAがMUAからメールを受け取る際にMUAを識別した後にユーザ認証(MUA認証)することを言います。<br><br>SMTP-AUTHの利用にはMUAとMTAの両方がSMTA-AUTHに対応している必要があります。<br><br></p>
	<h2>OAuth</h2>
	<p>このページを作成する時点では僕もよく理解できてなかったので、web記事を読み漁って勉強しました。<br><small><a href  = "https://boxil.jp/mag/a3207/">BOKIL</a>さんの記事、<a href = "https://www.tdk.com/ja/tech-mag/knowledge/147">TDK</a>さんの記事、<a href = "https://qiita.com/TakahikoKawasaki/items/e37caf50776e00e733be">川崎 貴彦さんの記事</a>を参考にしました。<br>「BOKIL」さん、「TDK」さん、「川崎 貴彦」さん、ありがとうございます。</small><br><br>OAuthとは、OpenIDの進化バージョンで「webサービス(アプリケーション)間でアクセス権限の認可を行うためのプロトコル」です。<br><br>詳しく説明すると、「認可情報を伝達するに際して、<span class = "underline">認証情報そのものは交換せずに</span>リソースへの限定的なアクセス権限を移譲する技術」を言います。</p>
	<div class = "explanation">
		<span>OpenID</span>とは、、、<br><br>
		認証に関連する情報を特定のサービスに依存しない形で連携するためのプロトコルを言います。<br><br>以下の利点があります。
		<ul>
			<li>認証情報の管理が容易に</li>
			<li>サービスを超えた連携が可能に</li>
		</ul>
	</div>
	OAuthでは、OpenIDの認証に関する情報の連携に加えて、<span class = "underline">アクセス権限に関する情報</span>も連携させることが可能である為、webサービスを超えたユーザ認証後のアクセス権限も設定することができます。
	<span id = "href_dnsec"></span>
	<h2>DNSSEC</h2>
	<p>「DNS Security Extensions」の略で、DNSのセキュリティ拡張方式です。<br><br>名前解決要求に対して応答するDNSサーバが自身の秘密鍵でディジタル署名を付して送信して、応答を受け取った側は応答を返したDNSサーバの公開鍵でディジタル署名を検証することで応答レコードの正当性・完全性を検証します。<br><br><a href = "sc-1-1-7?to=href_dns-poizon">DNSキャッシュポイズニング攻撃</a>に対して有効です。</p>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問15 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		DNSSECによって実現できることとして、「<strong>DNSキャッシュサーバが得た応答中のリソースレコードが、権威DNSサーバで管理されているものであり、改竄されていないことの検証</strong>」と説明されています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問18 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		DNSSECに関して、「<strong>ディジタル署名によってDNS応答の正当性を確認できる。</strong>」と説明しています。
	</div>
	<h2>EAP・EAP-TLS・PEAP</h2>
	<p>少し前の授業で全て勉強したんですけど、覚えていますか???<br><small>※リンクは<a href = "sc-1-1-14?to=href_eap">こちら</a>。</small><br>簡単に復習しましょう♪<br><br>「PPP Extensible Authentication Protocol」の略で、PPPの認証機能を拡張したユーザ認証用のプロトコルです。<br>EAPはIEEE 802.1Xを実装した標準的な認証プロトコルであり、無線LANのセキュリティプロトコルとして用いられています。</p>
	<p class = "explanation">
		<span class = "underline">PPP</span>とは、、、<br><br>
		「Point to Point Protocol」の略で、2つのノード間においてデータリンク層(L2 / TCP/IP階層モデル)で通信するためのプロトコルです。
	</p>
	<p class = "explanation">
		<span class = "underline">IEEE 802.1X</span>とは、、、<br><br>IEEEによって策定されたネットワーク環境においてユーザ認証を行うための規格です。
	</p>
	<p>EAPはアプリケーション層(Authentication層 / TLS・MD5・S/Key・etc...)とデータリンク層(無線LAN・PPP)をつなぐ層で動作します。<br><br>EAPを無線LAN(IEEE 802.3 / IEEE 802.5 / IEEE 802.11x)上で動作させる際には<span class = "underline">EAPOL(EAP over LAN)</span>を使用します。<br><br>EAPがサポートしている認証方式は以下の通りになります。</p>
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>EAP-TLS</th>
					<td>サプリカント・サーバ間でTLSによる相互認証を行います。</td>
				</tr>
				<tr>
					<th>EAP-TTLS</th>
					<td>TLSの前の「T」はトンネル(Tunnel)の「T」です。<br>TLSによる認証後にEAPトンネルを確立して、そのトンネル内でサプリカントを様々な方法で認証します。</td>
				</tr>
				<tr>
					<th>PEAP</th>
					<td>「Protected EAP」の略で、EAP-TTLSに似ていますが、トンネル確立後のサプリカント認証はEAP準拠の方法に限られます。</td>
				</tr>
				<tr>
					<th>EAP-MD5</th>
					<td>MD5によるチャレンジレスポンス方式でパスワードを暗号化して、サプリカントの認証を行います。<br><br>※認証サーバの正当性は確認されないため、無線LANでの使用は非推奨です。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p class = "explanation">
		<span class = "underline">サプリカント</span>とは、、、<br><br>ネットワーク上で行われる認証において、認証を要求する側(クライアント)を指します。
	</p>
	<h2>RADIUS</h2>
	<p>こちらも認証技術の授業で学んだ内容です。<br><small>※リンクは<a href = "sc-1-1-14?to=href_radius">こちら</a>。</small><br><br>RADIUSとは、「Remote Authentication Dial In User Service」の略で、ネットワーク上でユーザ認証を実現するプロトコルです。<br><br>もともとは、ダイアルアップ接続における認証と課金を行うプロトコルとして開発されましたが、現在は「IEEE 802.1X」での認証機能を担っています。</p>
	<div class = "explanation">
		<span class = "underline">IEEE 802.1X</span>とは、、、<br><br>
		LAN接続時に使用する認証規格(認証VLAN)を言います。<br><br>「IEEE802.1X」での認証システムは以下の3つから構成されます。
		<ul>
			<li>サプリカント(認証を要求する)</li>
			<li>認証サーバ(認証を実施 / RADIUSサーバ・Diameterサーバなど)</li>
			<li>オーセンティケータ(サプリカントとオーセンティケータを中継)</li>
		</ul>
	</div>
	<span id = "href_diameter"></span>
	<h2>Diameter</h2>
	<p>前述したRADIUSの後継プロトコルで、radiusが「半径」という意味である為、その2倍である「直径」を示す単語(Diameter)として命名されました。<br>ちょっとした言葉遊びです。<br><br>RADIUSの進化バージョンで、RADIUSとの違いは以下の2つがあげられます。</p>
	<div class = "scroll_x">
		<table border = "1" class = "norble">
			<caption>RADIUS・Diameterの相違点</caption>
			<thead>
				<tr>
					<th></th>
					<th>RADIUS</th>
					<th>Diameter</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>TCP or UDP</th>
					<td>UDP</td>
					<td>TCP</td>
				</tr>
				<tr>
					<th>提供する機能</th>
					<td>認証・課金</td>
					<td>認証・認可・課金</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>PSK</h2>
	<p>「Pre-Shared Key」の略で、「事前共有鍵」と訳されます。<br><br>字面通り、事前に共有された鍵のことを言います。<br><br>パスワードやパスフレーズとしてアクセスポイントに設定することが多いです。<br><br>PSKを実装した技術として以下のものがあります。</p>
	<ul>
		<li>WEP(WEPキー)</li>
		<li>WPA-PSK</li>
		<li>WPA2-PSK</li>
	</ul>
	前回の授業で学びましたね。<br>
	<small>※リンクは<a href = "sc-1-1-22?to=href_wep">こちら</a>。</small>

	<h2></h2>
</div>

<?php
include_footer();
?>