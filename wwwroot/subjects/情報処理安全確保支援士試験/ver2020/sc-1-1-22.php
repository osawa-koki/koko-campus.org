<?php
require_once("common.php");
include_head("セキュアプロトコル");
?>

<div id = "main">
	<p id = "my_comment">これからは技術的なセキュリティ対策(セキュリティ実装技術)について学んでいきます。<br>全部で7弾あります。<br><br>今回はセキュリティ実装技術の第一弾、セキュアプロトコルについて学びます。<br><br>理解しがたい分野ではありますが、試験によく出題される傾向にある分野ですので何回も見直してくださいね♪<br><br>それでは、Let's dance!!</p>
	<span id = "href_se-protocol"></span>
	<h2>セキュリティプロトコル</h2>
	<p>通信データの盗聴・不正接続を防ぐセキュアプロトコル(安全な規格)について、学びます。<br><br>ネットワークからの視点でも後ほど学びます。<br><small>※リンクは<a href = "sc-1-2-2?to=href_se-protocol">こちら</a>。</small><br><br>ここでは以下の内容を学びます。</p>
	<ul>
		<li>IPsec</li>
		<li>SSL/TLS</li>
		<li>STARTTLS</li>
		<li>SMTP over TLS</li>
		<li>S/MIME</li>
		<li>SSH</li>
		<li>HTTPS</li>
		<li>WPA2</li>
		<li>WPA3</li>
		<li>PGP</li>
	</ul>
	<h2>IPsec</h2>
	<p>IETFが標準化しているプロトコルで、IPを拡張してセキュリティを高めるプロトコルです。<br><br>以下の特徴があります。</p>
	<ul>
		<li>パケットをインターネット層でカプセル化・暗号化</li>
		<li>VPNを実現する代表的な技術</li>
		<li>IPv4・IPv6両方対応(IPv6では標準搭載)</li>
		<li>UDP500番ポートを使用</li>
	</ul>
	<p>ここで、一旦IPsecから離れて<strong>VPN</strong>について説明しますね♪</p>
	<div class = "explanation">
		<span class = "underline">VPN</span>とは、、、<br><br>
		「Virtual Private Network」の略で、インターネット(パブリックネットワーク)上に暗号化技術を用いて仮想的なプライベートネットワークを構築する技術です。<br><br>
		インターネットって世界中の誰もが利用可能である為、そのまま機密情報を通信するのは危険であると言えます。<br>そこで、インターネット上に仮想的なプライベートネットワークを構築することで安全なネットワークを構築します。<br><br>
		具体的には以下のVPN技術があります。
		<ul>
			<li>IPsec</li>
			<li>L2TP/IPsec</li>
			<li>IKEv2</li>
			<li>OpenVPN</li>
			<li>SSL/TLS-VPN</li>
			<li>PPTP</li>
		</ul>
		具体的には「カプセル化」と「トンネリング」の2つの技術から構成されます。
		<div class = "scroll_x">
			<table border = "1">
				<tbody>
					<tr>
						<th>カプセル化</th>
						<td>元のパケットに新しい(元のパケットを包括する)ヘッダを付加することです。</td>
					</tr>
					<tr>
						<th>トンネリング</th>
						<td>カプセル化されたパケットを、そのプロトコルで使用できるネットワークを通じて送受信することを言います。</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	では、IPsecに戻りますね♪<br><br>
	IPsecは当然にIP(インターネット層)で動作するため、「インターネットVPN」とも呼ばれます。<br><br>
	また、「トランスポートモード」と「トンネルモード」の2つの暗号モードがあります。
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>トランスポート<br class = "w" />モード</th>
					<td>End-to-End通信用で、IPパケットのデータ部分(ペイロード)のみを暗号化して、<span class = "underline">IPヘッダ部分は暗号せずに</span>送信します。</td>
				</tr>
				<tr>
					<th>トンネル<br class = "w" />モード</th>
					<td>パケット全体(データ部分+ヘッダ部分)をまとめて暗号化して、<span class = "underline">新たなIPヘッダを付加(カプセル化)</span>して送信します。</td>
				</tr>
			</tbody>
		</table>
	</div><br>
	次にIPsecを構成するプロトコル・機能を紹介しますが、これがかなり複雑で理解が難しいです。<br>僕も受験時はかなり苦労しました、、、<br><br>みなさんも、ゆっくりとひとつずつ学んでいきましょう♪
	<ul>
		<li>SPD</li>
		<li>SA</li>
		<li>AH</li>
		<li>ESP</li>
		<li>IKE</li>
	</ul>
	<div class = "explanation">
		<span class = "underline">SPD</span>とは、、、<br><br>
		「Sender Policy Database」の略で、IPsec通信に際してパケットの処理に関するルールを登録することで以下の制御を可能にします。
		<ul>
			<li>パケットの破棄</li>
			<li>IPsec適用の判断</li>
			<li>使用するプロトコル(AH・ESP)の決定</li>
			<li>転送モード(トランスポートモード・トンネルモード)の決定</li>
			<li>暗号アルゴリズムの設定</li>
			<li>メッセージ認証アルゴリズムの選択</li>
		</ul>
	</div>
	<div class = "explanation">
		<span class = "underline">SA</span>とは、、、<br><br>
		「Security Association」の略で、IPsec通信における論理的なコネクション(トンネル)を指します。<br><br>
		SAには以下の2種類があります。
		<ul>
			<li>ISAKAMP SA<br><small>※制御用</small></li>
			<li>IPsec SA<br><small>※データ送信用</small></li>
		</ul>
		最初に制御用の「ISAKAMP SA」が確立された後に「IPsec SA」が確立されます。<br><br>「ISAKAMP SA」はコネクション間でひとつだけ確立されるのに対して、「IPsec SA」は通信の方向・プロトコル(AH・ESP)ごとに別々のSAが確立されます。
	</div>
	<div class = "explanation">
		<span class = "underline">AH</span>とは、、、<br><br>
		「Authentication Header」の略で、「認証ヘッダ」と訳されます。<br><br>メッセージ認証用のICV(Integrity Check Value)をAHヘッダに設定することによりデータの完全性をチェックします。<br><br>後述するESPと異なり、データの暗号化機能はないことに注意してください。
	</div>
	<div class = "explanation">
		<span class = "underline">ESP</span>とは、、、<br><br>
		「Encapsulating Security Payload」の略で、「暗号化ペイロード」と訳されます。<br>AHと異なり、メッセージ認証だけでなくデータの暗号化機能も持ちます。<br><br>
		「トランスポートモード」と「トンネルモード」でヘッダ情報は異なりますが、実現する機能は暗号化モードに関わらず以下の2つです。
		<ul>
			<li>メッセージ認証<br><small>※AH同様、ICVを使用します。</small></li>
			<li>暗号化</li>
		</ul>
	</div>
	<div class = "explanation">
		<span class = "underline">IKE</span>とは、、、<br><br>
		「Internet Key Exchange」の略で、「インターネット鍵交換」と訳されます。<br><br>
		SAの作成・暗号化用の鍵を交換するためのプロトコルです。<br><br>
		2021年9月時点ではver1とver2の2つのバージョンがありますが、両者に互換性はないためIKEv1とIKEv2間での通信はできません。<br><br>
		「ISAKAMP SA」と「IPsec SA」で交換方法が異なります。<br>以下で簡単に説明しますね♪
		<div class = "scroll_x">
			<table border = "1">
				<tbody>
					<tr>
						<th rowspan = 2>ISAKAMP SA</th>
						<th>メインモード</th>
						<td>送信側(イニシエータ)と受信側(レスポンダ)が3往復の通信を行うことでSAを確立します。<br>それぞれの通信は以下の内容です。
							<ol>
								<li>ネゴシエーション<br><small>※ISAKAMPパラメタ(暗号化アルゴリズム・認証方式)を提案・選択</small></li>
								<li>鍵生成・交換<br><small>※DH鍵交換アルゴリズムによって秘密鍵を共有</small></li>
								<li>相手の認証</li>
							</ol>
						</td>
					</tr>
					<tr>
						<th>アグレッシブ<br class = "w" />モード</th>
						<td>送信側(イニシエータ)と受信側(レスポンダ)が1.5往復の通信を行うことでSAを確立します。<br>それぞれの通信は以下の内容です。
							<ol>
								<li>ISAKAMPパラメタ・DH公開値・ID・認証用乱数を送信<br> (イニシエータ→レスポンダ)</li>
								<li>選択したISAKAMPパラメタ・DH公開値・ID・認証用乱数・認証用ハッシュ値を送信<br> (レスポンダ→イニシエータ)</li>
								<li>認証用のハッシュ値を送信<br> (イニシエータ→レスポンダ)</li>
							</ol>
						</td>
					</tr>
					<tr>
						<th>IPsec SA</th>
						<th>クイックモード</th>
						<td>送信側(イニシエータ)と受信側(レスポンダ)が1.5往復の通信を行うことでSAを確立します。<br>それぞれの通信は以下の内容です。
							<ol>
								<li>IPsecパラメタ・認証用乱数・認証用ハッシュ値を送信<br> (イニシエータ→レスポンダ)</li>
								<li>選択したIPsecパラメタ・認証用乱数・認証用ハッシュ値を送信<br> (レスポンダ→イニシエータ)</li>
								<li>認証用のハッシュ値を送信<br> (イニシエータ→レスポンダ)</li>
							</ol>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	IPsecによって実現される機能をまとめますね。
	<ul>
		<li>アクセス制御機能</li>
		<li>メッセージ認証機能</li>
		<li>送信元の認証機能</li>
		<li>通信データの重複検知機能</li>
		<li>通信データの暗号化機能</li>
	</ul>
	<div class = "scroll_x">
		<table border = "1" id = "ipsec_table">
			<caption>IPsecのまとめ</caption>
			<tbody>
				<tr>
					<th>モード</th>
					<td>
						<ul>
							<li>トンネルモード<small>(IPヘッダも含めて暗号化)</small></li>
							<li>トランスポートモード<small>(IPヘッダは暗号化しない)</small></li>
						</ul>
					</td>
				</tr>
				<tr>
					<th>プロトコル</th>
					<td>
						<ul>
							<li>ESP<small>(暗号化+認証)</small></li>
							<li>AH<small>(認証)</small></li>
						</ul>
					</td>
				</tr>
				<tr>
					<th>交換方法</th>
					<td>
						<ul>
							<li>メインモード<small>(固定IP)</small><br>→リモートアクセス向け</li>
							<li>アグレッシブモード<small>(動的IP)</small><br>→LAN間接続向け</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>SSL/TLS</h2>
	<p>
		現在はSSLの危殆化が進んでいるため、SSLの使用禁止・後継のTLSの標準化が行われていますが、一般に「SSL/TLS」と呼ばれることが多いので、ここでも「SSL/TLS」と呼ぶこととします。<br><br>
		SSL/TLSではセッション層(L5 / OSI基本参照モデル)において暗号化が行われます。<br><br>
		以下で、SSL/TLSの概要を説明しますね♪
	</p>
		<ul>
			<li>ディジタル証明書(公開鍵証明書)を用いてサーバ・クライアントを相互に認証<br> →なりすまし防止</li>
			<li>MACによるメッセージ認証<br> →改竄防止</li>
		</ul>
	<p>また、SSL/TLSにはバージョンがあるためそれを次に説明しますね♪</p>
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>SSL1.0</th>
					<td>リリース前に脆弱性が発見されたため、公開中止。</td>
				</tr>
				<tr>
					<th>SSL2.0</th>
					<td>1994年にリリースされましたが、「ダウングレード攻撃」による脆弱性・その他の複数の脆弱性が発覚して、2011年には<a href = "https://datatracker.ietf.org/doc/html/rfc6176">RFC6176</a>によって使用が禁止されました。</td>
				</tr>
				<tr>
					<th>SSL3.0</th>
					<td>1994年にリリースされましたが、「POODLE攻撃(中間者攻撃)」による脆弱性が2014年に公表され、2021年には<a href = "https://datatracker.ietf.org/doc/html/rfc7568">RFC7568</a>によって使用が禁止されました。<br>これ以降はSSLからTLSへと移行が進んでいきます。</td>
				</tr>
				<tr>
					<th>TLS1.0</th>
					<td>1999年にリリースされましたが、こちらも「POODLE攻撃(中間者攻撃)」による脆弱性が2014年に公表され、<a href = "https://datatracker.ietf.org/doc/html/rfc8996">RFC8996</a>によって使用が禁止されました。</td>
				</tr>
				<tr>
					<th>TLS1.1</th>
					<td>2006年にリリースされましたが、こちらも「POODLE攻撃(中間者攻撃)」による脆弱性が2014年に公表され、<a href = "https://datatracker.ietf.org/doc/html/rfc8996">RFC8996</a>によって使用が禁止されました。</td>
				</tr>
				<tr>
					<th>TLS1.2</th>
					<td>2008年にリリースされた技術です。TLS1.2が採用しているSHA-1は近年危殆化が懸念されている中で、2017年にgoogleがハッシュ衝突に成功したことを報告したため、TLS1.3への移行が推奨されています。<br><small>※googleのsha-1の衝突報告サイトは<a href = "https://security.googleblog.com/2017/02/announcing-first-sha1-collision.html">こちら</a>。</small></td>
				</tr>
				<tr>
					<th>TLS1.3</th>
					<td>2018年にリリースされた新しい技術です。IETFが<a href = "https://datatracker.ietf.org/doc/html/rfc8446">RFC8446</a>によって公開されました。<br>2021年9月時点において最新版です。</td>
				</tr>
			</tbody>
		</table>
	</div><br><br>
	また、openSSL(オープンソースのSSL/TLSライブラリ)に関する脆弱性もここで紹介しますね♪<br><br>以下の3つがあります。
	<ul>
		<li>DROWN攻撃</li>
		<li>Heartbleed</li>
		<li>FREAK攻撃</li>
		<li>バージョンロールバック攻撃</li>
	</ul>
	※試験で出題される可能性は高くないので、ここではSSL/TLSに関する脆弱性なんだな程度で理解して下さい。<br><br><br>
	次にSSL/TLSのプロトコル構成を学びます。<br>
	<div class = "scroll_x">
		<table id = "ssltls_protocol" border = "1" cellspacing = "3px">
			<caption>セッション層(L5 / OSI基本参照モデル)</caption>
			<tbody>
				<tr>
					<th>Handshake<br>プロトコル</th>
					<th>Change Cipher Spec<br>プロトコル</th>
					<th>Alert<br>プロトコル</th>
					<th>Application Data<br>プロトコル</th>
				</tr>
				<tr>
					<th colspan = "4">Recordプロトコル</th>
				</tr>
			</tbody>
		</table>
	</div><br>
	それぞれの内容を簡単に説明しますね♪
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>Record<br>プロトコル</th>
					<td>L4のデータを2<sup>14</sup>バイト以下に分割して、MACの生成・暗号化を行います。<br>データの受信時にはMACの検証・復号を行います。</td>
				</tr>
				<tr>
					<th>Handshake<br>プロトコル</th>
					<td>サーバ・クライアント間のセッションの管理(「セッション確立」「暗号化アルゴリズム・鍵・ディジタル証明書の決定」等)を実行します。</td>
				</tr>
				<tr>
					<th>Change Cipher Spec<br>プロトコル</th>
					<td>暗号化通信で使用するパラメタを決定・変更する際にその内容を相手に通知します。</td>
				</tr>
				<tr>
					<th>Alert<br>プロトコル</th>
					<td>通信中のイベント・エラーを「Warning(警告)」「Fatal(致命的)」の2種類で通知します。</td>
				</tr>
				<tr>
					<th>Application Data<br>プロトコル</th>
					<td>前述したHandshakeプロトコルで決定したパラメタに従って、L4データを透過的に送受信します。</td>
				</tr>
			</tbody>
		</table>
	</div><br>
	では、具体的なSSL/TLS暗号化通信の手順を説明しますね♪<br>4つの手順からなります。
	<ol class = "lili">
		<li>クライアントがサーバに対して接続要求します。</li>
		<li>サーバがクライアントに対して「サーバ証明書」と「ディジタル証明書」を送付します。</li>
		<li>クライアントはサーバに暗号化した共通鍵を送信します。</li>
		<li>暗号化通信の開始</li>
	</ol><br>
	SSL/TLSでは、セッションとコネクションという2つの似た用語が用いられるため、ここでその違いを説明しますね♪
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>セッション</th>
					<td>セッションとは「TCPコネクションよりも上の層にあるHTTPなどにおけるデータ転送の開始から終了までの単位」を言います。<br><br>具体的には、Handshakeプロトコルでのクライアント・サーバ間の鍵交換(ネゴシエーション)によって生成されたマスターシークレットによって特定される仮想的な概念を言います。</td>
				</tr>
				<tr>
					<th>コネクション</th>
					<td>コネクションとは「セッションに従属して存在する通信チャネル」を言います。<br>こちらは、セッションと異なり「論理的な」回線を指しています。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p class = "explanation">
		<span class = "underline">マスターシークレット</span>とは、、、<br><br>
		暗号化に使用するセッション鍵を生成するための情報をいいます。
	</p>
	最後にSSL/TLS通信のやり取りの流れを図を用いて説明しますね♪
	<svg
		id="ssl_svg"
		viewBox="0 0 158.75 105.83334"
		version="1.1"
		xmlns="http://www.w3.org/2000/svg"
		xmlns:svg="http://www.w3.org/2000/svg">
		<rect
			width="16.5"
			height="10.6"
			x="13.4"
			y="34.8"
			class="pc" />
		<path
			class="pc"
			d="m 13.5,45.3 h 16.5 l -5.9,6 h -16.46 z" />
		<rect
			width="13.4"
			height="7.47"
			x="15"
			y="36.5"
			class="monitor" />
		<rect
			width="12.3"
			height="16.4"
			x="137"
			y="36.3"
			class="server" />
		<rect
			width="5.11"
			height="1.84"
			x="139"
			y="38.9"
			class="window" />
		<rect
			width="5.11"
			height="1.84"
			x="139"
			y="42.8"
			class="window" />
		<path
			class="arw"
			d="m 34.9,34.9 v -3.8 c 0,0 33.8,-5.6 50.7,-4.3 16.4,1.3 44.4,11.3 44.4,11.3 0,0 -30,-7.7 -45.2,-8.3 -16.7,-0.7 -49.9,5.1 -49.9,5.1 z" />
		<path
			class="arw"
			d="m 130,50 v 3.8 c 0,0 -34.1,5.6 -51,4.3 -16.4,-1.3 -44.7,-11.3 -44.7,-11.3 0,0 30.3,7.7 45.5,8.3 16.7,0.7 50.2,-5.1 50.2,-5.1 z" />
		<ellipse
			cx="30"
			cy="90"
			rx="12"
			ry="6"
			id="ssl_go" />
		<text
			x="50"
			y="92"
			id="ttl">SSL/TLS通信の仕組み
		</text>
		<text
			x="25"
			y="92"
			id="ssl_btn">次へ
		</text>
	</svg>
	<div id = "ssl_comment" class = "hidden">
		<p>クライアントが利用可能な暗号化アルゴリズムの一覧をサーバに送信します。</p>
		<p>サーバはクライアントから送られた利用可能なアルゴリズム一覧から実際に利用する暗号化アルゴリズムを決定して、クライアントに通知します。</p>
		<p>サーバのディジタル証明書(公開鍵証明書)をルート証明書までの証明書のリスト(証明書チェーン)を含めてクライアントに送信します。<br>(オプション)</p>
		<p>ひとつ前にサーバがディジタル証明書をクライアントに送信しなかった場合は、一時的に鍵を生成してクライアントに送信します。<br>(オプション)</p>
		<p>サーバがクライアントに対して認証を行う場合は、クライアントにディジタル証明書の送付を要求します。</p>
		<p>サーバがクライアントに対して、一連のメッセージ送信が完了したことを通知します。</p>
		<p>クライアント認証を行う場合は、クライアントのディジタル証明書をルートCAまでの証明書のリスト(証明書チェーン)を含めてサーバに送信します。<br>(オプション)</p>
		<p>クライアントはプリマスタシークレットを生成して、受信したサーバのディジタル証明書に含まれる公開鍵で暗号化して送信します。</p>
		<p>クライアント認証を行う場合は、直前までの通信内容のハッシュダイジェストに自身の秘密鍵を用いてディジタル署名を付してサーバに送信します。<br>これを受信したサーバはディジタル証明書に含まれる公開鍵を用いてディジタル署名を検証します。<br>(オプション)</p>
		<p>クライアントは生成したプリマスタシークレットとクライアントとサーバが生成した乱数からマスタシークレットを生成します。(Handshakeプロトコル)<br>続いて、MAC鍵・暗号鍵・IV(CBC暗号用)を生成します。(Recordプロトコル)<br>最後にSSL通信の準備が整ったことをサーバに通知します。(Change Cipher Specプロトコル)</p>
		<p>クライアントは鍵交換と認証処理が成功したことをサーバに通知した後に、生成した鍵でメッセージを暗号化して送信します。</p>
		<p>サーバはクライアントから受信したプリマスタシークレット(暗号化済)を自身の秘密鍵で復号して乱数を用いてマスターシークレットを生成します。(Handshakeプロトコル)<br>次にマスターシークレットからMAC鍵・暗号鍵・IV(CBC暗号用)を生成します。(Recordプロトコル)<br>最後にSSL暗号化通信の準備が整ったことをクライアントに通知します。(Change Cipher Specプロトコル)</p>
		<p>サーバは鍵交換と認証処理が成功したことをクライアントに通知します。</p>
	</div>
	<small>※参考サイトは<a href = "https://www.digicert.co.jp/welcome/pdf/wp_ssl_negotiation.pdf">こちら</a>。</small>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問14 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		常時SSL/TLSのセキュリティ上の効果として、「<strong>WebブラウザとWebサイトとの間における中間者攻撃による通信データの漏えい及び改竄を防止し、サーバ証明書によって偽りのWebサイトの見分けを容易にする。</strong>」を挙げています。<br><br>
		<small>※マルチベクトル型DDoS攻撃とは、<span class = "underline">複数のDDoS攻撃手法を組み合わせて</span>標的のサービス停止を狙う攻撃です。</small>
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問15 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		TLSに関して、「<strong>TLSで使用する個人認証用のディジタル証明書は、ICカードにも格納することができ、利用するPCを特定のPCに限定する必要がない。</strong>」と説明しています。
	</div>
	<h2>STARTTLS</h2>
	<p>送信側メールサーバと受信側メールサーバ間の通信を暗号化します。<br><br>最初の暗号化されていない通信において、送信側のメールサーバが「STARTTLSコマンド」を発行します。<br><small>(後述する「SMTP over TLS」と異なり明示的な暗号化要求をします)</small><br><br>「STARTTLS」で暗号化した場合の通信でも使用するポートは変わりません。
		<ul>
			<li>「SMTP」---25/TCP</li>
			<li>「POP3」---110/TCP</li>
			<li>「IMAP4」---143/TCP</li>
		</ul>
	</p>
	<h2>SMTP over SSL/TLS</h2>
	<p>SSL/TLSを用いてSMTP通信を暗号化する方式です。<br><br>SMTP over SSL/TLSでは「MUA-MTA」間のみ暗号化可能であり、インターネット上は平文でデータが流れます。<br><br>また、SSL/TLSによって暗号化をするため、ディジタル証明書によるユーザ認証も可能です。</p>
	<h2>S/MIME</h2>
	<div>RSA Security社が開発した暗号化電子メール方式を言います。<br>MIMEは「Multipurpose Internet Mail Extensions」の略で、画像・音声などのバイナリファイルを送信するための規格であるため、S/MIMEでは当然に添付ファイルも併せて暗号化することが可能です。<br><br>S/MIMEには以下の特徴があります。
		<ul>
			<li>CMS(PKCS#7を拡張したもの)によって暗号化・ディジタル署名を実施</li>
			<li>S/MIME証明書(ディジタル証明書)の取得が必要</li>
			<li>ディジタル署名・暗号化の前にOSごとの差異を解消するための正規化が必要</li>
		</ul>
		<small>※参考サイトは<a href = "https://www.ipa.go.jp/security/pki/072.html">こちら</a>。</small>
	</div>
	<span id = "href_ssh"></span>
	<h2>SSH</h2>
	<p>「Secure Shell」の略で、安全な(Secure)なシェル(Shell / カーネルに命令するプログラム)通信を可能にします。<br><br>コンピュータを遠隔操作するプロトコルとして他に「Telnet」があげられますが、「Telnet」が暗号化されていない通信をするのに対して、「SSH」では暗号化された通信を実行します。<br>このことから「SSH」は「Telnet」の進化バージョンであるといえ、コンピュータを遠隔する際には「SSH」は必要不可欠な知識であると言えます。<br><br>以下の特徴を理解しましょう♪</p>
	<ul>
		<li>セッションごとに異なる暗号鍵を生成</li>
		<li>認証方式として公開鍵認証方式を採用(パスワード認証も可)</li>
		<li>ポートフォワーディング機能を搭載</li>
	</ul>
	<p>SSHは以下のセキュリティ上に問題のあるコマンドの代替として利用されます。</p>
	<div class = "scroll_x">
		<table id = "ssh_table" border = "1" class = "norble eq">
			<caption>SSHコマンド</caption>
			<thead>
				<tr>
					<th>問題のあるコマンド</th>
					<th>SSHコマンド</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<ul>
							<li>Telnet</li>
							<li>rlogin</li>
						</ul>
					</td>
					<td>
						<ul>
							<li>ssh</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>rcp</li>
						</ul>
					</td>
					<td>
						<ul>
							<li>scp</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>
						<ul>
							<li>ftp</li>
						</ul>
					</td>
					<td>
						<ul>
							<li>sftp</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>HTTP over SSL/TLS</h2>
	<p>前述した「SSL/TLS」によって確立されたセキュアな通信経路上でHTTP通信を行う仕組みを言います。</p>
	<span id = "href_wep"></span>
	<h2>WEP</h2>
	<p>シラバスには記載されていませんが、次に学ぶ「WPA2」「WPA3」が現れる前の技術であり「WPA2」「WPA3」の理解につながる為、ここで取り扱いますね♪<br><br>WEPは「Wired Equivalent Privacy」の略で、1997年に登場して、2004年にIEEE 802.11iが登場するまでの間、無線LANの暗号方式として採用されていた技術です。<br><br>具体的な暗号実装方法は以下の通りです。
	</p>
	<ol>
		<li>WEPキーとIVの連結値のハッシュ演算(RC4)からキーストリーム(疑似乱数)を生成</li>
		<li>平文データをCRC32によってICVを計算</li>
		<li>キーストリームと平文データのXOR演算によってデータを暗号化</li>
		<li>ICVとキーストリームのXOR演算によってICVを暗号化</li>
		<li>MACヘッダ・IV・暗号化データ・暗号化ICV・(FCS)からなるフレームを送信</li>
	</ol>
	<p class = "explanation">
		<span class = "underline">CRC</span>とは、、、<br><br>
		「Cyclic Redundancy Check」の略で、「巡回冗長検査」と訳されます。<br><br>
		主にデータ転送などに伴う偶発的な誤りの検出で利用さますが、データの改竄には弱い(ビットフリッピング攻撃)という問題があります。<br>
		<small>※偶発的に発生した誤りを検知することが役割である為、意図的なビット操作は防げない。</small>
	</p>
	<p>このWEPによる暗号に関する脆弱性がセキュリティ学者によって多数報告されました。<br><br>具体的には以下の2つです。</p>
	<ul>
		<li>認証を実施しないため、アクセス制御が不十分</li>
		<li>暗号化レベルが不十分</li>
	</ul>
	<p>これらの問題が存在するため、セキュリティを強化したIEEE 802.11iという規格が生まれました。</p>
	<table class = "norble" border = "1">
		<thead>
			<tr>
				<th>WEPの問題点</th>
				<th>IEEE 802.11iでの改善</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>認証が不十分</td>
				<td>IEEE 802.1X(<a href = "sc-1-1-14?to=href_eap">EAP</a>)による認証</td>
			</tr>
			<tr>
				<td>暗号化レベルが不十分</td>
				<td>WPA(TKIP)・WPA2(CCMP)</td>
			</tr>
		</tbody>
	</table>
	<h2>IEEE 802.11i</h2>
	<p>「IEEE 802.11i」とは、WEPの後継である無線LANのセキュリティ規格です。<br>「WPA」「WPA2」「WPA3」の3種類を学びます。<br><br>なんだか、たくさん出てきて混乱しますね、、、<br>まだ新しい用語が出てきます、、、<br><br>下に簡単にまとめました♪</p>
	<div class = "scroll_x">
		<table border = "1" id = "lanlan">
			<thead>
				<tr>
					<th>規格</th>
					<th>暗号化方式</th>
					<th>暗号化アルゴリズム</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>WEP</td>
					<td>WEP</td>
					<td>RC4</td>
				</tr>
				<tr>
					<td>WPA</td>
					<td>TKIP</td>
					<td>RC4</td>
				</tr>
				<tr>
					<td>WPA2</td>
					<td>CCMP</td>
					<td>AES</td>
				</tr>
				<tr>
					<td>WPA3</td>
					<td>CCMP</td>
					<td>CNSA</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p>暗号化方式と暗号化アルゴリズムの2つがあってチンプンカンプンですね、、、<br><br>実際のところ、、、暗号化方式って検索すると暗号化方式についての記事はほとんどヒットせず、暗号化アルゴリズムが代わりに表示されます。<br><br>また、定義にも大きく依存するため両者の違いを明確に説明することはできませんが、「暗号化アルゴリズム」がより具体的(技術的)な概念であるのに対して、「暗号化方式」はより広い(包括的な)概念であるってことを覚えてください。<br><br>次はWEPの後継である「IEEE 802.11i(WPA・WPA2・WPA3)」について詳しく学びましょう♪</p>
	<h2>WPA</h2>
	<p>2002年に「WiFi Alliance」が発表した規格です。<br><br>以下の2つを覚えてくださいね♪</p>
	<ul>
		<li>IEEE 802.1X規格による認証を採用</li>
		<li>認証方式にTKIPを採用</li>
		<li>認証アルゴリズムにRC4を採用</li>
	</ul>
	<div class = "explanation">
		<span class = "underline" >TKIP</span>とは、、、<br><br>
		「Temporal Key Integrity Protocol」の略で、WEPの脆弱性を克服した暗号化方式です。<br><br>
		以下の特徴があります。
		<ul>
			<li>事前共有鍵(WPA-PSK)のビット数を拡張</li>
			<li>IVのサイズを拡張</li>
			<li>MIC(Message Integrity Code)によって完全性をチェック可能に</li>
			<li>一定期間で暗号鍵を更新</li>
			<li>暗号化アルゴリズムはWEPと同様にRC4を採用</li>
		</ul>
	</div>
	<p>TKIPを採用しているためWEPの脆弱性2つ(上述)は克服していますが、暗号化アルゴリズムはWEPと変わらずRC4を採用しているため暗号の強度はWEPと比べて大差ありません。<br><br>そこで「WPA2」が開発されました。
	</p>
	<h2>WPA2</h2>
	<p>2004年に「WiFi Alliance」が発表した規格で、WPAの暗号の強度が低いという問題を克服した規格です。<br><br>暗号化アルゴリズムにAESを採用したCCMPという暗号方式が実装されています。</p>
	<div class = "explanation">
		<span class = "underline" >CCMP</span>とは、、、<br><br>
		「Counter mode with Cipher-block chaining Message authentication code Protocol」の略で、WEPとWPAが採用している暗号アルゴリズムであるRC4の脆弱性を克服したAESを採用した暗号化方式です。<br><br>
		以下の特徴があります。
		<ul>
			<li>暗号化アルゴリズムとしてAESを採用</li>
			<li>ハードウェアで処理を行うため高速/li>
			<li>完全性チェック方式はWPAの方式を踏襲</li>
		</ul>
	</div>
	<p>2017年10月16日にセキュリティ技術者のMathy Vanhoefによって「KRACKs(鍵再インストール攻撃)」が公表され、通信データを盗聴されるという脆弱性が生まれました。<br><br>そこで、2021年9月時点で最新版であるWPA3へと移行していきます。</p>
		<div class = "exam">
			&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問13 &#9836;&#9836;&#9836;
			<div class = "separator"></div>
			WPA2-Enterpriseに関して、「<strong>IEEE 802.1X の規格に沿った利用者認証及び動的に配布される暗号鍵を用いた暗号化通信を実装するためのものである。</strong>」と説明しています。
		</div>
	<h2>WPA3</h2>
	<p>WPA2の脆弱性である「KRACKs攻撃」は無線LANクライアントがアクセスポイントに接続する際に行われる「4ウェイハンドシェイク」という仕組みに問題がありました。<br><br>WPA3では、「4ウェイハンドシェイク」の前にSAEというハンドシェイクを実行することで「4ウェイハンド
		シェイク」の問題を無効化します。<br><br>WPA3は個人利用を想定した「WPA3-Personal」と企業での利用を想定した「WPA3-Enterprise」の2種類があります。<br><br>以下の特徴があります。</p>
	<ul>
		<li>暗号アルゴリズムとしてCNSAを採用したCCMPを実装</li>
	</ul>
	<h2>PGP</h2>
	<p>Philip R Zimmmermannによって開発された電子メールの暗号化技術です。<br><br>あるユーザがPGPで使用する公開鍵に、そのユーザを信頼している他のユーザが自身の秘密鍵で署名する行為を繰り返すことで、<strong>信頼の輪(Web of Trust)</strong>を形成します。<br><br>Aさんが信頼しているBさんが信頼しているCさん...が信頼しているFさんも<span class = "underline">ある程度信頼できる</span>という考え方です。<br>その性質上、完全なセキュリティが求められるシステムにおいては使うべきではないです。<br><br>PGPでは公開鍵の正当性を確認するために<span class = "underline">フィンガプリント</span>を使用します。</p>
	<p class = "explanation">
		<span class = "underline">フィンガプリント</span>とは、、、<br><br>
		ハッシュ関数を用いて、ディジタル証明書・公開鍵・メールなどの電子データが改ざんされていないことを証明する技術です。
	</p>
	<h2>電子メール暗号化プロトコル</h2>
	<p>電子メールを暗号化するプロトコルがたくさん出てきましたね。<br><br>平成30年度の試験で公開鍵を用意する単位に関してまとめた問題が出題されたので紹介しますね♪</p>
	<div class = "exam">
		&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問16 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		FIPS PUB 140-2の記述内容として、「<strong>暗号モジュールのセキュリティ要求事項</strong>」と説明しています。
		<table border = "1" class = "norble">
			<tbody>
				<tr>
					<th>PGP</th>
					<td rowspan = "2">メールアドレスごと</td>
				</tr>
				<tr>
					<th>S/MIME</th>
				</tr>
				<tr>
					<th>SMTP over TLS</th>
					<td>メールサーバごと</td>
				</tr>
			</tbody>
		</table>
	</div>

	<h2></h2>
</div>

<?php
include_footer();
?>