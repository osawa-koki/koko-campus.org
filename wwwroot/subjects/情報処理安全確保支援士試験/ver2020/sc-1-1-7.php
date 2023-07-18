<?php
require_once("common.php");
include_head("エージェント型攻撃");
?>

<div id = "main">
	<p id = "my_comment">攻撃手法の第三弾です。<br><br>ここではユーザ(クライアント)とサーバ間で攻撃する方法について学びます。因みにこのページのタイトルになっているエージェント型攻撃という名前はユーザ(クライアント)とサーバ間で攻撃する方法について分類名が存在しなかったので、僕が勝手に名づけました。覚えなくて良いです。<br><br>それでは、Let's Sing!</p>


	<h2>エージェント型攻撃の種類</h2>
	<p>エージェント型攻撃(クライアントとサーバの間に入ってする攻撃)では、通信内容を盗聴する他、送信内容を操作することでクライアント・サーバが意図しない操作をさせることも可能です。<br><br>エージェント型攻撃には以下のものがあります。</p>
	<ul>
		<li>中間者攻撃</li>
		<li>MITM攻撃</li>
		<li>第三者中継</li>
		<li>IPスプーフィング</li>
		<li>キャッシュポイズニング</li>
		<li>セッションハイジャック</li>
		<li>セッションフィクセーション</li>
		<li>リプレイ攻撃</li>
	</ul>
	<h2>中間者攻撃</h2>
	<p>通称、MITM攻撃(Man-In-The-Middle Attack)です。<small>別名、「バケツリレー攻撃」です。</small><br><br>クライアントに対しては正規のサーバになりすまし、サーバに対しては正規のクライアントになりすまして通信を仲介して、しれっと情報を盗む攻撃方法です。<br>それ以外にも、不正なリクエストをサーバに送信したり、不正なレスポンスをクライアントに送信したりします。</p>
	<div class = "step">
		<ul>
			<li>HTTPSを使用する。<span class = "sup">※</span><span class = "small">(暗号化されていないプレーンHTTPを使用しない)</span></li>
			<li>公衆無線LAN(フリーWi-Fi)は使用しない。</li>
		</ul>
	</div>
	<p>このページのurlを確認してください。<br>「http<span class = "underline">s</span>://koko-campus.com/sc/ver3/sc-1-1-7」とhttpの後に「s」がついていると思います。<br>このsは「SSL/TLS」のsでこの通信は暗号化されていますよという意味です。</p>
	<span id = "href_mitb"></span>
	<h2>MITB攻撃</h2>
	<p>MITM攻撃とは「Man In The Browser Attack」の略で、攻撃者は<span class = "underline">ブラウザを乗っ取る</span>ことでユーザが入力した情報などを盗みます。<br>近年はMITB攻撃によって、オンラインバンキングで入力したデータが攻撃者が盗んで、そのままそのデータを用いて多額のお金が引き出される被害が急増しています。<br><br>MITB攻撃はPCがマルウェアに感染して、そのマルウェアがブラウザを乗っ取る形で成立するので、対策としてはまずはマルウェアに感染しないことが大切です。</p>
	<div class = "step">
		<ul>
			<li>セキュリティソフトを導入する。</li>
			<li>安全だと分からないファイルはダウンロードしない。</li>
			<li>知らないメールに添付されたurlはクリックしない。</li>
			<li><a href = "sc-1-1-13#href_transaction">トランザクション署名</a></li>
		</ul>
	</div>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問10 &#9836;&#9836;&#9836;<br>
		&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問9 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		MITBに対する有効な対策として、「<strong>インターネットバンキングでの送金時に利用者が入力した情報と、金融機関が受信した情報に差異がないことを検証できるよう、トランザクション署名を利用する</strong>」ことを挙げています。
	</div>
	<span id = "href_mail"></span>
	<h2>第三者中継</h2>
	<p>他人のメールサーバを発信元として外部にメールを送信させる攻撃方法です。<br><br>この攻撃では、機密情報が直接盗まれることはありませんが、迷惑メール送信の踏み台にされてしまう恐れがあります。<br>自身のメールアドレスから大量に迷惑メールが送信されると信頼を無くすほか、ブラックリストに登録されたりするなどの影響があります。<br><small>ちなみに、迷惑メールの発信元を登録する機構があってそのデータを利用してブラックリストを設定するシステムも多くあります。<br>有名な迷惑メール発信元登録機関へのリンクを貼っておきますね♪=><a href = "http://www.anti-abuse.org/multi-rbl-check/">こちら</a>。</small></p>
	<div id  = "mail_commant_trigger" class = "step">
		<ul>
			<li>MTAの設定による発信元メールアドレスの制限</li>
			<li>SMTP-AUTH</li>
			<li>POP before SMTP</li>
			<li>OP25B</li>
			<li>SPF</li>
			<li>Sender ID</li>
			<li>DomainKeys</li>
			<li>DKIM</li>
			<li>DMARK</li>
		</ul>
	</div>
	<p>何だか、たくさんありますね、、、泣<br>ここまで来れた皆さんなら大丈夫です♪<br><br>まずは、メールがどのように送られるか説明しますね♪</p>
	<svg
		width="600"
		height="400"
		viewBox="0 0 158.75 105.83334"
		version="1.1"
		id="about_mailing"
		xmlns="http://www.w3.org/2000/svg"
		xmlns:svg="http://www.w3.org/2000/svg">
		<rect
			id="my_mua0"
			class="computer"
			width="13.932898"
			height="8.4655581"
			x="33.91048"
			y="80.147636" />
		<rect
			id="my_mua1"
			class="computer"
			width="13.863076"
			height="8.6654387"
			x="154.07744"
			y="149.21313"
			transform="matrix(1,0,-0.80463679,0.59376733,0,0)" />
		<rect
			id="my_mua2"
			class="computer"
			width="11.287411"
			height="5.996439"
			x="35.277317"
			y="81.492432" />
		<rect
			id="your_mua0"
			class="computer"
			width="13.932898"
			height="8.4655581"
			x="114.98917"
			y="80.185165" />
		<rect
			id="your_mua1"
			class="computer"
			width="13.863076"
			height="8.6654387"
			x="235.20699"
			y="149.27635"
			transform="matrix(1,0,-0.80463679,0.59376733,0,0)" />
		<rect
			id="your_mua2"
			class="computer"
			width="11.287411"
			height="5.996439"
			x="116.35599"
			y="81.529961" />
		<rect
			id="my_server"
			class="server"
			width="58.906174"
			height="44.267815"
			x="10.052851"
			y="19.223871" />
		<rect
			id="your_server"
			class="server"
			width="58.906174"
			height="44.267815"
			x="86.60704"
			y="18.873566" />
		<text
			xml:space="preserve"
			id="my_server_txt"
			class="server_txt"
			x="12"
			y="18" >送信元メールサーバ(SMTP/POPサーバ)
		</text>
		<text
			xml:space="preserve"
			id="your_server_txt"
			class="server_txt"
			x="88"
			y="18" >送信先メールサーバ(SMTP/POPサーバ)
		</text>
		<text
			xml:space="preserve"
			id="mail0"
			x="36"
			y="86">MUA
		</text>
		<ellipse
			id="mail1_box"
			cx="41.71051"
			cy="56.877968"
			rx="7.848278"
			ry="5.0264254" />
		<text
			xml:space="preserve"
			id="mail1"
			x="36.5"
			y="58">MSA
		</text>
		<ellipse
			id="mail2_box"
			cx="59.435276"
			cy="31.04038"
			rx="7.848278"
			ry="5.0264254" />
		<text
			xml:space="preserve"
			id="mail2"
			x="54"
			y="32.5">MTA
		</text>
		<ellipse
			id="mail3_box"
			cx="96.648453"
			cy="31.745842"
			rx="7.848278"
			ry="5.0264254" />
		<text
			xml:space="preserve"
			id="mail3"
			x="92"
			y="33">MDA
		</text>
		<ellipse
			id="mail4_box"
			cx="122.04513"
			cy="56.437054"
			rx="7.848278"
			ry="5.0264254" />
		<text
			xml:space="preserve"
			id="mail4"
			x="117"
			y="58">MRA
		</text>
		<text
			xml:space="preserve"
			id="mail5"
			x="116.5"
			y="86">MUA
		</text>
		<path
			id="arrow0"
			class="arrow"
			d="M 198.64066,335.28943 91.807858,334.9775 -15.024944,334.66556 38.661604,242.30161 92.34815,149.93766 l 53.14626,92.67589 z"
			transform="matrix(0.01526006,0,0,0.07730197,39.307511,53.121482)" />
		<path
			id="arrow1"
			class="arrow"
			transform="matrix(0.01305517,0.0079014,-0.04002563,0.06613277,56.830427,25.564388)"
			d="M 198.64066,335.28943 91.807855,334.97749 -15.024946,334.66556 38.661601,242.3016 92.348147,149.93765 145.4944,242.61354 Z" />
		<path
			id="arrow2"
			class="arrow"
			transform="matrix(-4.5284579e-5,0.01525999,-0.07730163,-2.2939537e-4,96.617843,29.796669)"
			d="M 198.64066,335.28943 91.807855,334.97749 -15.024946,334.66556 38.661601,242.3016 92.348147,149.93765 145.4944,242.61354 Z" />
		<path
			id="arrow3"
			class="arrow"
			transform="matrix(-0.01128164,0.01027589,-0.05205396,-0.05714875,124.16318,57.723637)"
			d="M 198.64066,335.28943 91.807855,334.97749 -15.024946,334.66556 38.661601,242.3016 92.348147,149.93765 145.4944,242.61354 Z" />
		<path
			id="arrow4"
			class="arrow"
			transform="matrix(-0.01525978,-9.2430072e-5,4.6821751e-4,-0.07730055,123.04964,90.286975)"
			d="M 198.64066,335.28943 91.807855,334.97749 -15.024946,334.66556 38.661601,242.3016 92.348147,149.93765 145.4944,242.61354 Z" />
		<rect
			id="mail_pic0_0"
			width="8.0799999"
			height="4.8738165"
			x="43.513752"
			y="66.563683" />
		<polyline
			id="mail_pic0_1"
			points="43,66.5 47.55,69 51.6,66.5" >
	</svg>
	<span id = "mail_next">次へ</span>
	<div id = "mailing_div" class = "adjust_size">
		<div id = "mailing_left" class = "mailing_rl">
			<span class = "title">From</span>
			<div id = "mail_from">MUA<br>(Mail User Agent)<br>メールの発信・受信</div>
		</div>
		<div id = "mailing_right" class = "mailing_rl">
			<span class = "title">To</span>
			<div id = "mail_to">MSA<br>(Mail Submission Agent)<br>メールの投稿受付・ユーザ認証</div>
		</div>
	</div>
	<div id = "mailing_comment" class = "adjust_size">MSAがMUAに対して識別・認証を行います。(ここで用いられる認証が<span class = 'underline0'>SMTP-AUTH</span>です)<br>この通信の際に用いられるプロトコルは<span class = 'underline'>SMTP</span>です。</div>
	<p>こんな感じです。<br>では、実際の対策方法について、以下でひとつずつ説明していきますね♪</p>
	<div id = "mail_commant_collection">
		<div class = "explanation">
			<span class = "underline">MTAの設定による発信元メールアドレスの制限</span>とは、、、<br><br>
			MTAの設定によって、送信元メールアドレスと送信先メールアドレスのいずれにも自身のドメインが含まれていないメールを中継しないようにします。
		</div>
		<div class = "explanation">
			<span class = "underline">SMTP-AUTH</span>とは、、、<br><br>
			簡単に説明すると、「SMTP」×「ユーザ認証」です。<br><br>MSAがMUAからメールを受け取る際にMUAを識別した後にユーザ認証(MUA認証)することを言います。<br><small>※この認証ではSASLフレームワークを使用し、そのメカニズムとして「Kerberos v4」「GSSAPI」「S/Key」があります。</small>
			<div class = "exam">
				&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問16 &#9836;&#9836;&#9836;<br>
				&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問14 &#9836;&#9836;&#9836;
				<div class = "separator"></div>
				「<strong>メールクライアントからメールサーバの電子メール送信時に、利用者IDとパスワードによる利用者認証を行う。</strong>」と説明されています。
			</div>
		</div>
		<div class = "explanation">
			<span class = "underline">POP before SMTP</span>とは、、、<br><br>
			メールの送信に先だってPOPによる認証を行い、認証に成功した場合のみ一定期間メールの送信を許可します。<br>具体的な手法としては、認証に成功したMUAのIPアドレスを保存しておき、MSAはメール受信時にIPアドレスが認証済みIPアドレスリストに含まれているかどうかチェックします。<small>(<a href = "https://datatracker.ietf.org/doc/html/rfc2476">RFC2476</a>)</small>
		</div>
		<div class = "explanation">
			<span class = "underline">OP25B</span>とは、、、<br><br>
			(OutBound Port25 blocking)の略で、<span class = "underline">ISPのメールサーバを経由せずにインターネットへ送られる25番ポート宛のSMTPパケットを遮断します。</span><br><br>正当な利用者がインターネット方向にメールを送信する際には、投稿専用のポート(587番ポート/Submissionポート)を使用する必要があります。<br><br><small>迷惑メールが迷惑メール送信業者のメールサーバからDHCPによって割り当てられたIPアドレスを使用して、直接宛先のメールサーバにメールを送信することが多いため、ISPのメールサーバを経由しないメールを遮断することで対応します。<br><br>反対バージョンとしてIP25Bも存在します。</small><br><br>
			<div class = "exam">
				&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問14 &#9836;&#9836;&#9836;
				<div class = "separator"></div>
				「<strong>ISP管理外のネットワークに向けてISP管理下のネットワークから送信されるスパムメールを制限する</strong>」と説明しています。
				<div class = "super_separator"></div>
				&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問14 &#9836;&#9836;&#9836;
				<div class = "separator"></div>
				ISPがOP25Bを導入する目的として、「<strong>ISP管理外のネットワークに向けて、ISP管理下のネットワークから送信されるスパムメールを制限する。</strong>」と説明しています。
			</div>
		</div>
		<div class = "explanation">
			<span class = "underline">SPF</span>とは、、、<br><br>
			予め発信元ドメインのDNSサーバのTXTレコードに正当なSMTPサーバのIPアドレス(SPFレコード)を登録して、受信側のメールサーバ(SMTPサーバ)はメール受信時に発信元のDNSサーバに問い合わせて、エンベロープに記載されているメールアドレスの正当性を検証します。
			<div class = "exam">
				&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問14 &#9836;&#9836;&#9836;
				<div class = "separator"></div>
				SPFによるドメイン認証を実施する場合に電子メール送信元アドレスのドメイン所有側で行う必要がある設定として、「<strong>DNSサーバにSPFレコードを登録する。</strong>」を挙げています。
			</div>
		</div>
		<div class = "explanation">
			<span class = "underline">Sender ID</span>とは、、、<br><br>SPFに加えて受信したメールのヘッダ情報のメールアドレスのドメインの正当性を検証します。</div>
		<div class = "explanation">DomainKeysとは、、、<br><br>
		予め発信元ドメインのDNSサーバに公開鍵を登録しておき、SMTPサーバがメールに対になる秘密鍵でディジタル署名を付してメールを送信して、受信側のメールサーバ(SMTPサーバ)が発信元の公開鍵を用いてメールの正当性を検証します。
	</div>
		<div class = "explanation">
			<span class = "underline">DKIM</span>とは、、、<br><br>
			DomainKeysの進化バージョンです。(Domain Keys Identified Mail)<br><br>DomainKeysではドメイン単位での認証であったのに対して、DKIMではユーザ単位でのディジタル署名・検証を可能とします。<br><br>前述したDomainKeysとIIM(Internet Identified Mail)をIETFが統一したものです。
			<div class = "exam">
				&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問12 &#9836;&#9836;&#9836;
				<div class = "separator"></div>
				DKIMを「<strong>送信側メールサーバにおいてディジタル署名を電子メールのヘッダに付加し、受信側のメールサーバにおいてそのディジタル署名を公開鍵によって検証する仕組み。</strong>」と説明しています。
			</div>
		</div>
		<div class = "explanation">
			<span class = "underline">DMARK</span>とは、、、<br><br>
			「Domain-based Message Authentication Reporting & Conformance」の略で、SPFやDKIMによる認証を補強する技術です。<br><br>
			SPFやDKIMの認証結果を受けてから送信者がメールの中継可否をポリシとして公開することで、メールの扱いを送信者が決定することを可能にします。
		</div>
	</div>
	<span id = "mail_next0">次へ</span>
	<h2>IPスプーフィング</h2>
	<p>不正アクセスを目的としてIPアドレスを詐称することを指します。<br>スプーフ(spoof)とは「騙す」の意味で、自分のIPアドレスを隠してIT資源(サーバ・ネットワーク)に対して過剰な負荷をかけて情報セキュリティ特性の可用性(A)を損なわせる攻撃に用いられます。<br><br>後述するセッションハイジャック攻撃でもこのIPスプーフィングが用いられます。</p>
	<div class = "step">
		<ul>
			<li>IPアドレスのみで認証をしない。<span class = "sup">※</span><span>(IPアドレスは偽装が可能なため)</span><br><small>(rcp、rloginを使用しない)</small></li>
			<li>FWを正しく設定する。</li>
		</ul>
	</div>
	<span id = "href_dns-poizon"></span>
	<h2>キャッシュポイズニング</h2>
	<p>正式名称、DNSキャッシュポイズニング攻撃です。<br><br>キャッシュポイズニングについて説明する前に簡単にDNSの仕組みを説明します。</p>
	<div class = "explanation"  id = "dns_from_outside">DNSとは、、、<br><br>DNSとは「Domain Name System」の略で、ドメイン名からIPアドレスを特定するための仕組みです。<br><br>DNSに関連する用語を確認しますね。
		<div class = "scroll_x">
			<table border = "1">
				<caption>DNSに関連する用語</caption>
				<tbody>
					<tr>
						<th>リゾルバ</th>
						<td>「ドメイン名からIPアドレス」「IPアドレスからドメイン」を特定するためのプログラムのことを指します。<br><br>リゾルバにはスタブリゾルバとフルサービスリゾルバのふたつがあります。</td>
					</tr>
					<tr>
						<th>スタブリゾルバ</th>
						<td>OSに標準搭載されているプログラムであり自身は名前解決ができないため、後述するフルサービスリゾルバに名前解決を要求します。</td>
					</tr>
					<tr>
						<th>フルサービスリゾルバ</th>
						<td>スタブリゾルバから受け取った名前解決要求に対して、名前解決を行ってその結果を返します。<br>フルサービスリゾルバとは一般的に後述するキャッシュサーバのことを指します。</td>
					</tr>
					<tr>
						<th>権威DNSサーバ</th>
						<td>別名、「コンテンツサーバ」「ゾーンサーバ」です。<br><br>フルサービスリゾルバからの<span class = "underline">非再帰的要求に対して、</span>自身が管理するドメイン内の名前解決に応じます。</td>
					</tr>
					<tr>
						<th>キャッシュサーバ</th>
						<td>別名、「フルサービスリゾルバ」です。<br><br>スタブリゾルバからの<span class = "underline">再帰的要求に対して、</span>必要ならば他のDNSサーバに名前解決要求をしてその結果を返します。</td>
					</tr>
					<tr>
						<th>オープンリゾルバ</th>
						<td>「問い合わせ元」「対象のドメイン」に制限なく、名前解決要求に応じるキャッシュサーバ(コンテンツサーバ)のことを指します。</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<p>では、本題ですね♪<br><br>DNSキャッシュポイズニング攻撃とは、キャッシュDNSサーバから権威DNSサーバへの名前解決要求に対して、攻撃者が偽のDNS応答を返すことでDNSのキャッシュに偽の情報を登録させて汚染させる(ポイズニング)攻撃のことです。<br><br>DNSキャッシュポイズニングについて図を用いて説明しますね♪</p>
<svg
	width="600"
	height="400"
	viewBox="0 0 158.75 105.83334"
	version="1.1"
	id="dns_poison"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<ellipse
		cx="133.59709"
		cy="94.091156"
		rx="10.345839"
		ry="8.9349127"
		id="dns_poison_bad0" />
	<path
		d="m 139.0125,90.169672 -5.13933,4.468041 c 0,0 2.07812,0.210802 3.0836,0 0.66018,-0.13841 1.40413,-0.311996 1.85016,-0.812371 0.47282,-0.530424 0.60009,-1.324335 0.61672,-2.030927 0.0131,-0.558099 -0.41115,-1.624743 -0.41115,-1.624743 z"
		id="dns_poison_bad1"
		class="poison_bad" />
	<path
		d="m 126.6781,90.169672 5.13934,4.468041 c 0,0 -2.07812,0.210802 -3.0836,0 -0.66019,-0.13841 -1.40413,-0.311996 -1.85016,-0.812371 -0.47282,-0.530424 -0.6001,-1.324335 -0.61672,-2.030927 -0.0131,-0.558099 0.41114,-1.624743 0.41114,-1.624743 z"
		id="dns_poison_bad2"
		class="poison_bad" />
	<rect
		id="dns_poison_cache0"
		class="body"
		width="12.633839"
		height="18.279276"
		x="68.920746"
		y="44.570156" />
	<rect
		id="dns_poison_cache1"
		class="window"
		width="5.2634101"
		height="2.0620072"
		x="70.805855"
		y="46.723682" />
	<rect
		id="dns_poison_cache2"
		class="window"
		width="5.2634101"
		height="2.0620072"
		x="70.911133"
		y="50.847694" />
	<rect
		id="dns_poison_my_mua0"
		width="13.932898"
		height="8.4655581"
		x="12.852166"
		y="47.724304" />
	<rect
		id="dns_poison_my_mua1"
		width="13.863076"
		height="8.6654387"
		x="89.081032"
		y="94.607002"
		transform="matrix(1,0,-0.80463679,0.59376733,0,0)" />
	<rect
		id="dns_poison_my_mua2"
		width="11.287411"
		height="5.996439"
		x="14.219003"
		y="49.069099" />
	<rect
		id="dns_poison_cache1_0"
		class="body"
		width="12.633839"
		height="18.279276"
		x="126.31016"
		y="15.727939" />
	<rect
		id="dns_poison_cache1-1"
		class="window"
		width="5.2634101"
		height="2.0620072"
		x="128.19525"
		y="17.881466" />
	<rect
		id="dns_poison_cache1_2"
		class="window"
		width="5.2634101"
		height="2.0620072"
		x="128.30052"
		y="22.00548" />
	<rect
		id="dns_poison_cache2_0"
		class="body"
		width="12.633839"
		height="18.279276"
		x="126.6629"
		y="51.177467" />
	<rect
		id="dns_poison_cache2_1"
		class="window"
		width="5.2634101"
		height="2.0620072"
		x="128.54797"
		y="53.330994" />
	<rect
		id="dns_poison_cache2_2"
		class="window"
		width="5.2634101"
		height="2.0620072"
		x="128.65324"
		y="57.455009" />
	<path
		id="dns_poison_arrow0"
		class="dns_arrow_normal"
		d="M -79.999997,90 -127.6314,7.499999 l -47.6314,-82.499996 95.262801,-3e-6 95.262792,-3e-6 -47.631396,82.500004 z"
		transform="matrix(0,-0.02777405,0.11224748,0,48.106061,53.340576)" />
	<path
		id="dns_poison_arrow1"
		class="dns_arrow_normal"
		transform="matrix(-0.01190316,-0.02509408,0.10141649,-0.04810604,103.41589,34.327322)"
		d="M -79.999997,90 -127.6314,7.499999 l -47.6314,-82.499996 95.262801,-3e-6 95.262792,-3e-6 -47.631396,82.500004 z" />
	<path
		id="dns_poison_arrow2"
		class="dns_arrow_normal"
		transform="matrix(0.00595158,-0.02712889,0.10964009,0.02405302,105.83901,56.580541)"
		d="M -79.999997,90 -127.6314,7.499999 l -47.6314,-82.499996 95.262801,-3e-6 95.262792,-3e-6 -47.631396,82.500004 z" />
	<path
		id="dns_poison_arrow3"
		d="M 180,340.00001 265.35898,210.71797 350.71796,81.435936 420,220 489.28204,358.56406 334.64102,349.28203 Z"
		transform="matrix(0.00566151,-0.01694439,0.06518981,0.04385635,84.980202,74.586108)" />
	<text
		xml:space="preserve"
		class="txt"
		x="58"
		y="10" >キャッシュサーバ
	</text>
	<text
		xml:space="preserve"
		class="txt"
		x="118"
		y="10" >権威DNSサーバ
	</text>
	<ellipse
		cx="25"
		cy="32"
		rx="25"
		ry="10"
		id="comment_box" />
	<text
		id="moving_comment"
		class="txt" >
		<tspan x=8 y=30>I Love Programming</tspan>
		<tspan x=8 y=35>IT saves the world!</tspan>
	</text>
</svg>
	<span id = "cache_normal">正常な名前解決</span><br><br><span id = "cache_abnormal">DNSキャッシュポイズニング</span>
	<div class = "margin"></div>
	<p>こんな感じで、正規の名前解決応答が返される前に攻撃者が偽の名前解決応答を送信することで、ユーザを罠サイトに誘導します。<br><br>次に、DNSキャッシュポイズニング攻撃の一種であるカミンスキー攻撃について説明しますね♪</p>
	<div class = "explanation">
		<p>カミンスキー攻撃とは、、、<br><br>Dan Kaminskyによって発表されたDNSキャッシュポイズニング攻撃の一種です。<br>プレーンDNSキャッシュポイズニング攻撃に比べて大量の試行が可能であり、セキュリティ対策が必須である状態です。<br><br>以下で、カミンスキー攻撃の手順について説明します。</p>
		<ol>
			<li>攻撃者が標的のDNSサーバに対して、攻撃対象のドメイン名(example.com)の存在しないサブドメイン名(dummy.example.com)によるFQDNの名前解決要求を行う。</li>
			<li>標的となったDNSサーバは当然、自身が知らないFQDNであるため上位のDNSサーバに対して問い合わせる。</li>
			<li>攻撃者は「2」の問い合わせに対する応答より先に、偽の名前解決応答を返します。</li>
			<li>「1」で送信した存在しないFQDNと「3」で送信した偽の応答を変えて再チャレンジ!!(永遠と、、、)</li>
		</ol>
	</div>
	<div class = "step">
		<ul>
			<li>ソースポートランダマイゼーション<br><small>※UDP53番ポートに対象にした攻撃を無効化</small></li>
			<li><a href = "sc-1-1-23?to=href_dnssec">DNSSEC</a><span class = "sup">※</span><span class = "small">(後ほど学習します)</span></li>
			<li>DNSサーバのキャッシュ有効期間を短縮</li>
		</ul>
	</div><br>
	<div class = "exam">
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問11 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		DNSキャッシュポイズニング攻撃への有効な対策として、「<strong>DNS問合せに使用するDNSヘッダ内のIDを固定せずにランダムに変更する。</strong>」を挙げています。
	</div>
	<h2>セッションハイジャック</h2>
	<p>攻撃者がクライアント(ユーザ)とサーバの間に入って、「クライアントに対しては正規のサーバに」「サーバに対しては正規のクライアントに」なりすますことで、両社の通信を盗聴したり不正なリクエストやレスポンスを紛れ込ませる攻撃方法です。<br><br>前述した中間者攻撃もセッションハイジャック攻撃に該当します。<br><br>セッションハイジャック攻撃の種類として「TCPコネクション」「UDPコネクション」「クライアント・サーバの通信」に対する攻撃に分類できます。<br><br>最初に、TCPコネクションに対するセッションハイジャック攻撃について説明したいんですけど、、、その前の準備として、TCPコネクションの確立について説明しますね♪</p>
<svg
	 width="600"
	 height="400"
	 viewBox="0 0 158.75 105.83334"
	 version="1.1"
	 id="session"
	 xmlns="http://www.w3.org/2000/svg"
	 xmlns:svg="http://www.w3.org/2000/svg" >
	<rect
		id="session_line0"
		class="line"
		width="1.0581948"
		height="78.218246"
		x="26.983967"
		y="24.250275" />
	<rect
		id="session_line1"
		class="line"
		width="1.0581948"
		height="76.190018"
		x="121.6924"
		y="26.895788" />
	<rect
		id="session_my_mua0"
		class="pc"
		width="13.932898"
		height="8.4655581"
		x="24.315931"
		y="6.6060491" />
	<rect
		id="session_my_mua1"
		class="pc"
		width="13.863076"
		height="8.6654387"
		x="44.823879"
		y="25.35722"
		transform="matrix(1,0,-0.80463679,0.59376733,0,0)" />
	<rect
		id="session_my_mua2"
		class="pc"
		width="11.287411"
		height="5.996439"
		x="25.682768"
		y="7.9508443" />
	<rect
		id="session_cache0"
		width="12.633839"
		height="18.279276"
		x="115.55184"
		y="6.0278206" />
	<rect
		id="session_cache1"
		class="window"
		width="5.2634101"
		height="2.0620072"
		x="117.43695"
		y="8.1813469" />
	<rect
		id="session_cache2"
		class="window"
		width="5.2634101"
		height="2.0620072"
		x="117.54223"
		y="12.305359" />
	<path
		id="arw0"
		class="arw"
		d="M 311.29258,95.320852 186.52023,166.69161 61.747894,238.06239 62.325176,94.320983 62.902443,-49.42042 187.09751,22.950223 Z"
		transform="matrix(0.30570224,0.05035047,-0.00138463,0.00880529,20.07223,27.453246)" />
	<path
		id="arw1"
		class="arw"
		transform="matrix(-0.29970328,0.07853009,-0.00232189,-0.00860576,131.44973,52.833208)"
		d="M 311.29259,95.320853 186.52024,166.69161 61.747903,238.06239 62.325186,94.320984 62.902453,-49.420419 187.09752,22.950224 Z" />
	<path
		id="arw2"
		class="arw"
		transform="matrix(0.30570224,0.05035047,-0.00138463,0.00880529,19.753904,82.440414)"
		d="M 311.29259,95.320853 186.52024,166.69161 61.747903,238.06239 62.325186,94.320984 62.902453,-49.420419 187.09752,22.950224 Z" />
	<rect
		id="session_box0"
		class="session_box"
		width="25"
		height="12"
		x="60"
		y="22" />
	<rect
		id="session_box1"
		class="session_box"
		width="25"
		height="12"
		x="60"
		y="51" />
	<rect
		id="session_box2"
		class="session_box"
		width="25"
		height="12"
		x="60"
		y="77" />
	<text
		id="session_text0"
		class="session_txt" >
		<tspan x=62 y=26>SYN</tspan>
		<tspan x=62 y=30>Seq: 1000</tspan>
		<tspan x=62 y=33>Ack: 0000</tspan>
	</text>
	<text
		id="session_text1"
		class="session_txt" >
		<tspan x=62 y=55>SYN/ACK</tspan>
		<tspan x=62 y=59>Seq: 2000</tspan>
		<tspan x=62 y=62>Ack: 1001</tspan>
	</text>
	<text
		id="session_text2"
		class="session_txt" >
		<tspan x=62 y=81>ACK</tspan>
		<tspan x=62 y=85>Seq: 2001</tspan>
		<tspan x=62 y=88>Ack: 1001</tspan>
	</text>
</svg><br>
	<span id = "session_button">次へ</span>
	<p>TCPコネクションはコネクション確立時に3回のやり取りを行います。(3ウェイハンドシェイク)<br><br>またTCPコネクションでは、コネクション確立時に互いが受け取ったシーケンス番号に1を加算して相手に返信することで正当性を検証します。<br><br>以下で、手順を簡単に確認しますね♪</p>
	<ol>
		<li>クライアントからサーバに、SYNフラグをオン・初期シーケンスを設定したデータを送信します。</li>
		<li>サーバはSYN/ACKの両方をオンにして、SYNの初期シーケンス番号を設定・ACKには受けとった初期シーケンス番号に1を加算して返します。</li>
		<li>クライアントはACKフラグをオンにして、サーバから受け取ったシーケンス番号に1を加算したでデータを返します。</li>
	</ol>
	<p>この手順からわかるように、<span class = "underline">シーケンス番号さえ矛盾なく送信することさえできれば</span>セッションハイジャックが可能になります。<br><br>また、TCPコネクションではなくUDPコネクションでは3ウェイハンドシェイクを確立することなくコネクションが成立するため、要求(UDP問い合わせ)に対する応答(UDP応答)より先に偽の応答を送ることでセッションハイジャックが成立します。<br><br><br><br><br>次に「クライアント・サーバ間の通信」に対するセッションハイジャック攻撃について説明しますね♪<br><br>現在のwebアーキテクシャスタイルのデファクトスタンダートはRoy Fieldingが考案したREST(Representative State Transfer)です。またRESTの特徴として「ステートレス」があげられます。ステートレス(State Less/状態を持たない)とはサーバとクライアントの通信は一度きりでリセットされるという意味です。<br>ですけどそれだとかなり不便ですよね、、、<br>ログイン認証が完了してもサーバはそれを覚えてくれないので次の画面に進む際にもう一度ログイン認証して、そしてまた次の画面に進むにも再度ログイン認証してと、、、<br><br>これに対する対応策として、Cookieを使ったセッション管理が誕生しました。一度ログインに認証したらその情報(セッションID/ユーザID等)をCookieとしてブラウザに保存してその後の通信データに付加します。<br>サーバ側はそのデータを基にユーザを識別します。<br><br>この説明でなんとなくセッションハイジャックがどのように実行されるか分かりましたか???<br>このCookieに含まれる攻撃対象者のセッションIDさえ特定できればセッションハイジャックが可能です。<br><br><br>ではセッションハイジャック攻撃に対する対策方法について学びましょう♪</p>
	<div class = "step">
		<ul>
			<li>URLにセッションIDを含めない。</li>
			<li>ワンタイムセッションIDの発行(session_regenerate_id();//php)</li>
			<li>推測困難なセッションIDの発行</li>
			<li>セッションの有効期限を必要最小限に設定する。</li>
		</ul>
	</div>
	<h2>セッションフィクセーション</h2>
	<p>セッションハイジャックが<span class = "underline">クライアントとサーバで確立された</span>セッションをハイジャックするのに対して、セッションフィクセーションでは<span class = "underline">攻撃者がサーバとの間で確立した</span>セッションIDを攻撃者に送信して、それをしれっと使わせることでそのセッションをハイジャックする攻撃方法を指します。<br>「Cookie Monster Bug」(CookieのDomain属性が正しく機能しないバグ)があるブラウザでは要注意です。<small>(今はそんなブラウザはほとんどないかな?)</small></p>
	<div class = "step">
		<ul>
			<li>URL Rewriting機能をオフに</li>
			<li>セッションIDの再発行</li>
		</ul>
	</div>
	<h2>リプレイ攻撃</h2>
	<p>盗聴によって得たパスワードや暗号鍵、あるいは認証済みのセッションデータなどを再利用してそのユーザーになりすます攻撃のことを指します。<br>TELNETやPOP3といった通信内容を平文で送信する(暗号化しない)プロトコルは、このリプレイ攻撃に対して要注意です。</p>
	<div class = "step">
		<ul>
			<li>チャレンジレスポンス認証</li>
		</ul>
	</div>
	<h2></h2>
</div>


<?php
include_footer();
?>