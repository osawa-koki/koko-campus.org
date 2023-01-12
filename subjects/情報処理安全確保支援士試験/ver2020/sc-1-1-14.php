<?php
require_once("common.php");
include_head("認証技術");
?>

<div id = "main">
	<p id = "my_comment">前回は認証について学びましたね♪<br><br>今回は認証を実現する技術について説明します。<br><br>それでは、Let's shout!!</p>
	<h2>認証技術</h2>
	<p>認証技術としては以下の5つを学びます。</p>
	<ul>
		<li>RADIUS</li>
		<li>TACACS/TACACS+</li>
		<li>Kerberos</li>
		<li>ディレクトリサービス</li>
		<li>EAP</li>
	</ul>
	<p>いずれも基本的には「<span class = "underline">AAA</span>」の3つの機能によって構成されます。</p>
	<ul>
		<li>A・・・認証(Authentication)</li>
		<li>A・・・認可(Authorization)</li>
		<li>A・・・課金(Accounting)</li>
	</ul>
	<span id = "href_radius"></span>
	<h2>RADIUS</h2>
	<p>「Remote Authentication Dial In User Service」の略で、ネットワーク上でユーザ認証を実現するプロトコルです。<br>IETFが標準化した認証技術です。<br><br>RADIUSは、AAAモデルが確立される前に開発されたプロトコルであり、「認証と認可」が組み合わされており1つのサービスとして統合されて、「課金」のみ分離されています。<br><small>※RADIUSでは「認証・認可」が1つのAccess-RequestやAccess-Acceptパケットに組み込まれています。</small><br><br>また、パスワードだけが暗号化されて通信されます。</p>
	<svg
		viewBox="0 0 158.75 105.83334"
		version="1.1"
		id="radius_svg"
		xmlns="http://www.w3.org/2000/svg"
		xmlns:svg="http://www.w3.org/2000/svg">
			<filter
				id="radius_filter"
				x="-0.08"
				y="-0.3"
				width="1.15"
				height="1.6">
				<feGaussianBlur
					stdDeviation="3" />
			</filter>
		<ellipse
			id="radius_connect0"
			cx="84.6"
			cy="86.8"
			rx="52.2"
			ry="9.19" />
		<path
			id="radius_connect1"
			d="m 54.8,93.9 a 42.4,10.1 68.1 0 1 -25.1,-35.6 42.4,10.1 68.1 0 1 -6.5,-43 42.4,10.1 68.1 0 1 25.1,35.6 42.4,10.1 68.1 0 1 6.5,43 z"
			ry="13.5" />
		<rect
			width="12.8"
			height="8.51"
			x="21.1"
			y="17.4"
			class="pc" />
		<path
			d="m 21.1,25.9 h 12.8 l -4.6,6.6 h -13.1 z"
			class="pc" />
		<rect
			width="10.4"
			height="6"
			x="22.4"
			y="18.7"
			class="monitor" />
		<rect
			width="9.5"
			height="13.6"
			x="117"
			y="78.3"
			class="server" />
		<rect
			width="3.95"
			height="1.53"
			x="118"
			y="79.4"
			class="window" />
		<rect
			width="3.95"
			height="1.53"
			x="118"
			y="82.6"
			class="window" />
		<rect
			width="9.5"
			height="13.6"
			x="47.5"
			y="78.3"
			class="server" />
		<rect
			width="3.95"
			height="1.53"
			x="48.5"
			y="79.4"
			class="window" />
		<rect
			width="3.95"
			height="1.53"
			x="48.5"
			y="82.6"
			class="window" />
		<ellipse
			class="user_data"
			cx="140"
			cy="85.8"
			rx="10.3"
			ry="7.94" />
		<text
			x="35"
			y="23"
			class="pink_word">アクセスクライアント
		</text>
		<text
			x="40"
			y="70"
			class="pink_word">アクセスサーバ
		</text>
		<text
			x="40"
			y="75"
			class="blue_word">RADIUSクライアント
		</text>
		<text
			x="110"
			y="75"
			class="blue_word">RADIUSサーバ
		</text>
		<text
			x="133"
			y="86" >認証情報
		</text>
		<text
			x="65"
			y="88"
			class="blue_big" >RADIUSプロトコル
		</text>
	</svg>
	<p>従来のサーバが搭載しているRASシステムでは、ユーザからのアクセス要求を受けるアクセスサーバがユーザ認証を行う認証サーバを兼ねていましたが、これによって処理が複雑化するという問題がありました。<br><br>RADIUSではユーザからのアクセス要求を受けるアクセスサーバとユーザ認証を行う認証サーバを分離させて、認証情報を集約させています。<br><br>RADIUSの脆弱性は以下のとおりです。</p>
	<ul>
		<li>MD処理におけるBOFの危険性</li>
		<li>vendor-length検証の不十分であることに起因するDoSの危険性</li>
	</ul>
	<p>「RADIUS」の進化系として「<a href = "sc-1-1-23?to=href_diameter">Diameter</a>」があります。<br><small>※後ほど学習します。</small></p>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問19 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		「<strong>リモートアクセス環境において、認証情報やアカウンティング情報をやり取りするプロトタイプ。</strong>」と説明されています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問17 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		PCが無線LAN環境に接続するときの利用者認証とアクセス制御に、IEEE 802.1XとRADIUSを利用者する場合の標準的な方法として、「<strong>アクセスポイントにはIEEE 802.1Xのオーセンティケータを実装し、かつ、RADIUSクライアントの機能を持たせる。</strong>」と説明しています。
	</div>
	<h2>TACACS/TACACS+</h2>
	<p>「Terminal Access Controller Access Control System (+)」の略で、シスコ社が開発した認証技術です。<br>前述したRADIUSと異なりAAAが完全に分離されています。<br>また、パスワードだけでなくパケット全体が暗号化されて通信されます。</p>
	<h2>Kerberos</h2>
	<p>MITのアテナプロジェクトで開発された認証・暗号化システムです。<br><br>Kerberosは「信頼された第三者機関による認証方式」を採用しています。信頼される第三者機関を「<span class = "underline">KDC(Key Distribution Center)</span>」、実際にアクセスを要求するクライアントを「<span class = "underline">プリンシパル</span>」、KDCとプリンシパルからなる領域を「<span class = "underline">レルム</span>」と呼んでいます。<br><br>以下で簡単に用語について説明しますね♪</p>
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>KDS</th>
					<td>AS(認証サーバ)・TGS(チケット交付サーバ)・KDB(データベースサーバ)から構成されます。</td>
				</tr>
				<tr>
					<th>AS</th>
					<td>認証サーバのことで、ユーザの認証要求を受けたらKDBに保存されているデータに基づいてユーザ認証を実行して、<span class = "underline">TGT(チケット交付チケット)</span>を交付します。</td>
				</tr>
				<tr>
					<th>TGS</th>
					<td>チケット交付サーバのことで、TGTを持つユーザに対して、各サービスを利用するための<span class = "underline">チケット</span>を交付します。</td>
				</tr>
				<tr>
					<th>TGST</th>
					<td>ユーザとTGS間で利用するチケットです。</td>
				</tr>
				<tr>
					<th>KDB</th>
					<td>データベースサーバのことで、ユーザの認証情報・共通鍵を保存します。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p>Kerberos認証は次の手順を踏みます。</p>
	<ol>
		<li>ユーザがASにTGTを要求します。</li>
		<li>ASがKDBに登録されている情報に基づいてユーザ認証を実施します。</li>
		<li>認証に成功した場合はASはKDBに保存された共通鍵で暗号化したTGTを発行します。</li>
		<li>ユーザがTGTを復号して、TGTに含まれるTGSTとTGSキーを取り出します。</li>
		<li>ユーザはTGSTに利用したいサービスの情報を付加して、それをTGSキーで暗号化したものをTGSに送ります。</li>
		<li>TGSは受け取ったTGSTを復号してユーザ認証を実施します。</li>
		<li>認証に成功した場合は、ユーザが要求するチケット(ST)を発行し、KDBに登録されているサーバの共通鍵(Sキー)で暗号化します。</li>
		<li>暗号化したチケットをさらにサーバとの通信に利用する共通鍵を付加してTGSキーで暗号化してユーザに送信します。</li>
		<li>ユーザは暗号化されたチケットを復号してサーバの共通鍵とサーバとの通信に利用する共通鍵を取り出します。</li>
		<li>ユーザは利用するサーバにチケットを復元した鍵を用いてアクセスを要求します。</li>
		<li>サーバはチケットを復号してユーザ認証を実施します。</li>
	</ol>
	<h2>ディレクトリサービス</h2>
	<p>ユーザ認証に必要なID・パスワード・所属などの情報を一元管理して必要に応じてこれらを提供する仕組みを言います。<br><br>実現するための仕組みとしては、<span class = "underline">ディレクトリサーバ(LDAPサーバ)</span>がユーザ認証に関する情報を木構造で管理し、認証要求に対して応答します。<br><br>LDAP(Lightweight Directory Access Protocol)と呼ばれるプロトコルがディレクトリサービスを実現するためのプロトコルとして良く用いられます。<br><small>※LDAPはITU-T勧告のX.500(DAP)を簡素化したものです。</small></p>
	<span id = "href_eap"></span>
	<h2>EAP</h2>
	<p>「PPP Extensible Authentication Protocol」の略で、PPPの認証機能を拡張したユーザ認証用のプロトコルです。<br>EAPはIEEE 802.1Xを実装した標準的な認証プロトコルであり、無線LANのセキュリティプロトコルとして用いられています。</p>
	<p class = "explanation">
		<span class = "underline">PPP</span>とは、、、<br><br>
		「Point to Point Protocol」の略で、2つのノード間においてデータリンク層(L2 / TCP/IP階層モデル)で通信するためのプロトコルです。
	</p>
	<p class = "explanation">
		<span class = "underline">IEEE 802.1X</span>とは、、、<br><br>IEEEによって策定されたネットワーク環境においてユーザ認証を行うための規格です。<br><br>
		詳しくはネットワークの授業で学びます。<br><small>※リンクは<a href = "sc-1-2-8?to=href_l2-security">こちら</a>。</small>
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
					<td>MD5によるチャレンジレスポンス方式でパスワードを暗号化して、サプリカントの認証を行います。<br><br>※認証サーバの正当性は確認されないため、無線LANでの使用は非推奨です。<br><small>(偽のアクセスポイントを設置されたときにそこに接続されてしまい、通信内容を盗聴される危険性あり)</small></td>
				</tr>
			</tbody>
		</table>
	</div>
	<p class = "explanation">
		<span class = "underline">サプリカント</span>とは、、、<br><br>ネットワーク上で行われる認証において、認証を要求する側(クライアント)を指します。
	</p>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問16 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		IEEE 802.1Xで使われるEAP-TLSが行う認証として、「<strong>ディジタル証明書による認証サーバとクライアントの相互認証</strong>」と説明しています。
	</div>
	<h2>SSO</h2>
	<p>SSOは認証技術ではありませんが、認証を維持する技術としてこの授業で扱うことにしますね♪<br><br>SSOとは、「Single Sign On」の略で、認証を必要とするシステムにおいて一度認証に成功したらその情報を保持して次に認証が必要な時も認証プロセスを経ることなくサービスを利用できるようにする仕組みを言います。<br>SAMLはSOAPベースであるため、ドメインを超えて広く利用可能です。<br><br>SSOを実現する技術には以下のものがあります。</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>SSOを実現する技術</caption>
			<tbody>
				<tr>
					<th>エージェント型SSO</th>
					<td>Cookieを用いて認証情報を保持します。<br><br>以下の問題があります。
						<ul>
							<li>Cookieを用いるため同一ドメイン内でしかSSOを実現できない。</li>
							<li>各webサーバにエージェントをインストールする必要がある。</li>
						</ul>
					</td>
				</tr>
				<tr>
					<th>リバースプロキシ型SSO</th>
					<td>webサーバへのアクセスを認証サーバを兼ねたプロキシサーバ(リバースプロキシサーバ)が担当することで、認証情報を一元管理します。<br><br>以下の問題があります。
						<ul>
							<li>認証サーバの負荷が大きくなる。</li>
							<li>ネットワークの構成上、ドメインをまたいだSSOの実現が困難。</li>
						</ul>
					</td>
				</tr>
				<tr>
					<th>SAML</th>
					<td>エージェント型SSO・リバースプロキシ型SSOの問題点を克服した次世代のSSO技術として注目されています。<br>以下で詳しく説明します。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "explanation">
		<span class = "underline">SAML</span>とは、、、<br><br>「Security Assertion Markup Language」の略で、OASISによって策定された認証情報を安全に交換するためのXMLの仕様です。
		<svg
			viewBox="0 0 158.75 105.83334"
			version="1.1"
			id="saml_svg"
			xmlns="http://www.w3.org/2000/svg"
			xmlns:svg="http://www.w3.org/2000/svg">
				<filter
					id="smal0"
					x="-0.101"
					y="-0.116"
					width="1.2"
					height="1.23">
					<feGaussianBlur
						stdDeviation="4.57" />
				</filter>
				<filter
					id="smal1"
					x="-0.147"
					y="-0.147"
					width="1.29"
					height="1.29">
					<feGaussianBlur
						stdDeviation="2.63" />
				</filter>
			</defs>
			<path
				id="circle_of_trust"
				d="m 140,92 a 62.7,34 37.4 0 1 -71,-10.7 62.7,34 37.4 0 1 -29.8,-65.3 62.7,34 37.4 0 1 70.8,10.4 62.7,34 37.4 0 1 30,65.6 z" />
			<circle
				id="sp"
				cx="119"
				cy="76"
				r="21.5" />
			<rect
				width="16.5"
				height="10.6"
				x="15.9"
				y="82.5"
				class="pc" />
			<path
				class="pc"
				d="m 16,93.1 h 16.4 l -4.5,5.3 h -16.9 z" />
			<rect
				width="13.4"
				height="7.47"
				x="17.5"
				y="84.2"
				class="monitor"  />
			<rect
				width="15"
				height="21.4"
				x="48.9"
				y="12.4"
				class="server" />
			<rect
				width="6.23"
				height="2.41"
				x="51.1"
				y="14.9"
				class="window" />
			<rect
				width="6.23"
				height="2.41"
				x="51.3"
				y="19.8"
				class="window" />
			<rect
				width="9.4"
				height="14.1"
				x="114"
				y="56.2"
				class="server" />
			<rect
				width="4.49"
				height="1.59"
				x="115"
				y="57.7"
				class="window" />
			<rect
				width="4.49"
				height="1.59"
				x="115"
				y="60.4"
				class="window" />
			<rect
				width="9.4"
				height="14.1"
				x="103"
				y="75.3"
				class="server" />
			<rect
				width="4.49"
				height="1.59"
				x="104"
				y="76.9"
				class="window" />
			<rect
				width="4.49"
				height="1.59"
				x="104"
				y="79.8"
				class="window" />
			<rect
				width="9.4"
				height="14.1"
				x="126"
				y="75.7"
				class="server" />
			<rect
				width="4.49"
				height="1.59"
				x="127"
				y="77.3"
				class="window" />
			<rect
				width="4.49"
				height="1.59"
				x="127"
				y="79.9"
				class="window" />
			<path
				id="saml_arw" />
			<text
				x="15"
				y="80">ユーザ
			</text>
			<text
				x="65"
				y="20">IdP(Identity Provider)
			</text>
			<text
				x="60"
				y="70">SP(Service Privider)
			</text>
			<text
				id="saml_word"
				x="60"
				y="48">Circle of Trust
			</text>
		</svg><br>
	<span id = "saml_next" class = "go_next">次へ</span>
	<div id = "saml_comment" class = "hidden"></div>
	<p>SAMLでは、以下の3つのアサーション(セキュリティに関する情報)を利用します。
		<ul>
			<li>認証アサーション</li>
			<li>属性アサーション</li>
			<li>認可決定アサーション</li>
		</ul>
	</p>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問2 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		SAMLについて、「<strong>認証情報に加え、属性情報とアクセス情報を異なるドメインに伝達するためのWebサービスの仕様</strong>」と説明されています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問3 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		SAMLの目的として、「<strong>Webサイトなどを運営するオンラインビジネスパートナー間で認証、属性及び認可の情報を安全に交換するために策定したもの。</strong>」と説明しています。
	</div>
	<h2></h2>
</div>


<?php
include_footer();
?>