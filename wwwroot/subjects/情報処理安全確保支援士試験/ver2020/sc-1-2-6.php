<?php
require_once("common.php");
include_head("通信プロトコル");
?>

<div id = "main">
	<p id = "my_comment">ここでは、通信プロトコルについて学びます。<br><br>Warning!!---really difficult---<br><br>「どの層の」「何をする」プロトコルなのかをしっかり覚えてくださいね♪<br><br>それでは、Let's run!!</p>
	<h2>OSI基本参照モデル</h2>
	<p>4つ前の授業でも学びましたが、とても大切ですのでもう一度!!!<br><br>OSI基本参照モデルについて学びましょう♪</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>OSI基本参照モデル</caption>
			<thead>
				<tr>
					<th>OSI基本参照モデル</th>
					<th>TCP/IP階層</th>
					<th>プロトコルの例</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>アプリケーション層<br>(第7層)</th>
					<th rowspan = 3>アプリケーション層</th>
					<td rowspan = 3>HTTP・FTP・SMTP・POP3・Telnet・S/MIME・PGP・etc...</td>
				</tr>
				<tr>
					<th>プレゼンテーション層<br>(第6層)</th>
				</tr>
				<tr>
					<th>セッション層<br>(第5層)</th>
				</tr>
				<tr>
					<th>トランスポート層<br>(第4層)</th>
					<th>トランスポート層</th>
					<td>TCP・UDP・SSL・TLS・SSH・etc...</td>
				</tr>
				<tr>
					<th>ネットワーク層<br>(第3層)</th>
					<th>インターネット層</th>
					<td>IPv4・IPv6・ICMP・IPsec・etc...</td>
				</tr>
				<tr>
					<th>データリンク層<br>(第2層)</th>
					<th rowspan = 2>ネットワーク<br>インターネット層</th>
					<td rowspan = 2>Ethernet・PPP・FDDI・PPTP・L2TP・etc...</td>
				</tr>
				<tr>
					<th>物理層<br>(第1層)</th>
				</tr>
			</tbody>
		</table>
	</div><br>
	次は各階層のプロトコルを学んでいきます。
	<h2>データリンク層</h2>
		<h3>ARP</h3>
		<p>「Address Resolution Protocol」の略で、「<span class = "underline">IPアドレスからMACアドレス</span>」を特定するためのプロトコルです。<br><br>ARP要求はブロードキャスト、ARP応答はユニキャストです。</p>
		<h3>RARP</h3>
		<p>「Reverse Address Resolution Protocol」の略で、「<span class = "underline">MACアドレスからIPアドレス</span>」を特定するためのプロトコルです。<br><br>ディスクアレイマシンなどで使用されますが、現在では殆ど使用されません。</p>
		<h3>L2TP</h3>
		<p>「Layer 2 Tunneling Protocol」の略で、データリンク層におけるトンネリングプロトコルです。<br><br>「L2F」×「PPTP」のプロトコルです。<br><br>暗号化機能は搭載されておらず暗号化技術であるIPsecと組み合わせて利用されることが多いため、「<strong>L2TP/IPsec</strong>」と呼ばれることが多いです。</p>
		<h3>PPP</h3>
		<p>「Point to Point Protocol」の略で、物理層・データリンク層において2つのノード間で通信をするためのプロトコルです。</p>
		<h3>PPPoE</h3>
		<p>「PPP over Ethernet」の略で、イーサネット上でPPPの通信をするためのプロトコルです。</p>
		<div class = "exam">
			&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問19 &#9836;&#9836;&#9836;
			<div class = "separator"></div>
			「<strong>シリアル回線で使用するものと同じデータリンクのコネクション確立やデータ転送を、LAN上で実現するプロトコル</strong>」と説明しています。
		</div>
		<h3>IPoE</h3>
		<p>「IP over Ethernet」の略で、PPPoEの進化バージョンです。<br><br>企業内のLANなどと同じやり方で直接インターネットに接続する方式を言います。<br><small>※参考サイトは<a href = "https://www.ntt.com/business/services/network/internet-connect/ocn-business/ftth/know.html">こちら</a>。</small><br><br>また、IPv6にのみ対応しています。</p>
		<span id = "href_vlan"></span>
		<h3>VLAN</h3>
		<p>「Virtual LAN」の略で、ネットワークの仮想化技術のひとつです。<br><br>スイッチ(L2SW)に接続されたホストを幾つかのグループ(ブロードキャストドメイン)に分けることで仮想的に作り出されたLANを言います。<br><br>VLAN同士は異なるネットワークとなるため、VLAN間でフレームのやり取りをするにはL3SW(ルータ)を介して行う必要があります。<br>(ブロードキャストフレームも送信されません)<br><br>VLANを実装するには以下の方法があります。</p>
		<ul>
			<li>タグVLAN</li>
			<li>ポートVLAN</li>
		</ul>
		<p>VLANは大規模なネットワークを仮想化しにくいという問題があるため、後ほど勉強する<a href = "sc-1-2-7?to=href_sdn">SDN</a>の利用が増えています。</p>
		<div class = "exam">
			&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問12 &#9836;&#9836;&#9836;
			<div class = "separator"></div>
			VLANを使用することによるセキュリティ上の効果として、「<strong>スイッチが、PCからのブロードキャストパケットの到達範囲を制限するので、アドレス情報の不要な流出のリスクを低減できる。</strong>」を挙げています。
		</div>
		<h3>IEEE 802.1Q</h3>
		<p>VLANのうちのタグVLANに関する規格です。<br><br>具体的には、VLANタグをイーサネットフレームに付加して送信することで、転送されたフレームがどのVLANに所属するかを識別します。<br><br><br>因みにポートVLANでは、同一グループのポートに接続された複数のホストでひとつのVLANを構築します。</p>
		<h3>プロキシARP</h3>
		<p>他のホスト宛てのARP要求に対して、本来の問い合わせ先の代理としてARP応答する機能を言います。</p>
	<h2>ネットワーク層</h2>
		<h3>IPアドレス</h3>
		<p>少し前の授業で、IPアドレスについて学びましたよね♪<br><small>※リンクは<a href = "sc-1-2-2">こちら</a>。</small><br><br>思い出してほしいことは、IPアドレスは<span class = "underline">「ネットワーク部」+「ホスト部」</span>から成るということです。</p>
		<h3>サブネットマスク</h3>
		<p>IPアドレスは<span class = "underline">「ネットワーク部」+「ホスト部」</span>から構成されますが、IPアドレスを「ネットワーク部」と「ホスト部」に分けるための情報が必要になります。<br><br>これが「サブネットマスク」で、2進数で表すと必ず1の連続の後に0の連続が現れます。<br><br>このうちの1が連続している数によってネットワーク部を特定して、それ以外(0が連続している部分に対応するIPアドレス)がホスト部であると特定します。</p>
		<h3>物理アドレス</h3>
		<p>ネットワーク上で機器を識別するための機器ごと付与された固有の識別符号のことを言います。</p>
		<h3>ユニキャスト</h3>
		<p>ネットーワーク上の特定のホストにのみ送信します。</p>
		<h3>ブロードキャスト</h3>
		<p>ネットワーク上の全部のホストに送信します。</p>
		<h3>マルチキャスト</h3>
		<p>ネットワーク上の複数のホストに対してっパケットを送信します。</p>
		<h3>ICMP</h3>
		<p>「Internet control Message Protocol」の略で、IP通信においてエラーメッージや制御メッセージを転送するためのプロトコルです。<br><br>以下の5つのメッセージを覚えましょう♪</p>
		<div class = "scroll_x">
			<table border = "1" class = "norble">
				<caption>ICMPメッセージ</caption>
				<thead>
					<tr>
						<th>TYPE</th>
						<th>内容</th>
						<th>説明</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>0</td>
						<td>エコー応答</td>
						<td>エコー要求に対する応答</td>
					</tr>
					<tr>
						<td>3</td>
						<td>宛先到達不能</td>
						<td>送信先ホストにパケットが到達しない原因を通知</td>
					</tr>
					<tr>
						<td>5</td>
						<td>リダイレクト</td>
						<td>最適ルートを通知</td>
					</tr>
					<tr>
						<td>8</td>
						<td>エコー要求</td>
						<td>宛先ホストまでの到達を確認</td>
					</tr>
					<tr>
						<td>11</td>
						<td>時間超過</td>
						<td>TTLの値がゼロになったことを通知します。</td>
					</tr>
				</tbody>
			</table>
		</div>
		<h3>ICMPv6</h3>
		<p>IPv6で用いられるICMPです。<br><br>以下のメッセージを覚えましょう♪</p>
		<div class = "scroll_x">
			<table border = "1" class = "norble">
				<caption>ICMPv6</caption>
				<thead>
					<tr>
						<th>分類</th>
						<th>TYPE</th>
						<th>内容</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan = "4">エラー</td>
						<td>1</td>
						<td>宛先到達不能</td>
					</tr>
					<tr>
						<td>2</td>
						<td>パケット過大</td>
					</tr>
					<tr>
						<td>3</td>
						<td>時間切れ</td>
					</tr>
					<tr>
						<td>4</td>
						<td>パラメータ異常</td>
					</tr>
					<tr>
						<td rowspan = "2">要求・応答</td>
						<td>128</td>
						<td>エコー要求</td>
					</tr>
					<tr>
						<td>129</td>
						<td>エラー応答</td>
					</tr>
					<tr>
						<td rowspan = "1">リダイレクト</td>
						<td>137</td>
						<td>リダイレクト</td>
					</tr>
				</tbody>
			</table>
			<small>※参考サイトは<a href = "https://www.ietf.org/rfc/rfc3587.txt">こちら</a>。</small>
		</div>
		<h3>IGMP</h3>
		<p>「Internet Group Management Protocol」も略で、マルチキャストを行う際に用いられるホストのグループを管理するためのプロトコルです。</p>
		<span id = "href_cidr"></span>
		<h3>CIDR</h3>
		<p>「Classless Inter Domain Routing」の略で、「サイダー」と発音されます。<br><br>IPアドレスからクラスの枠組みを取り払って最適化したものです。<br><small>※クラスについては<a href = "sc-1-2-2?to=href_address-class">こちら</a>。</small><br><br>プレフィックス値を調整することでネットワーク部(サブネット識別子)の長さを自由に設定可能です。</p>
		<p class = "explanation">
			<span class = "underline">プレフィックス</span>とは、、、<br><br>
			IPアドレスのうちのサブネットを識別する部分を言い、「ネットワーク部」+「サブネット識別子」からなります。
		</p>
		<p class = "explanation">
			<span class = "underline">サブネット</span>とは、、、<br><br>
			巨大な内部ネットワーク(LAN)を分割して生成された小さな単位のネットワークを言います。<br><br>内部ネットワーク(LAN)からこのサブネットを識別するための識別子がサブネット識別子です。
		</p>
		<h3>IPv4/IPv6 共存技術</h3>
		<p>2021年9月現在はIPv6の利用もだいぶ進んでいますが、未だにIPv4の利用も多いです。<br><br>このIPv4とIPv6の両技術を共存させる技術について学びましょう♪</p>
		<div class = "scroll_x">
			<table border = "1">
				<tbody>
					<tr>
						<th>トンネリング</th>
						<td>「6to4」とも呼ばれます。<br>IPv4ネットワーク上でIPv6パケットをルーティングします。</td>
					</tr>
					<tr>
						<th>トランスレーション</th>
						<td>IPv6とIPv4の仲介役であるトランスレータを採用します。</td>
					</tr>
					<tr>
						<th>デュアルスタック</th>
						<td>単一機器にIPv4とIPv6という仕様の異なるプロトコルスタックを共存させます。</td>
					</tr>
				</tbody>
			</table>
			<span class = "quote">※参考サイトは<a href = "https://www.nic.ad.jp/ja/newsletter/No37/NL37_0800.pdf">こちら</a>。</span>
		</div>
	<h2>トランスポート層</h2>
		<h3>TCP</h3>
		<p>コネクション型で信頼性が高いという特徴があります。<br><br>以下の制御が可能です。</p>
		<ul>
			<li>パケットの順序制御</li>
			<li>誤り検出時の再送制御</li>
			<li>ウィンドウサイズを捉えたフロー制御</li>
		</ul>
		<p class = "explanation">
			<span class = "underline">ウィンドウサイズ</span>とは、、、<br><br>
			受信側が送信する連続受信できるデータ量に関する情報を言います。<br><br>フロー制御に用いられます。
		</p>
		<div class = "exam">
			&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問20 &#9836;&#9836;&#9836;
			<div class = "separator"></div>
			TCPの特徴として、「<strong>確認応答がない場合は再送処理によってデータ回復を行う。</strong>」を挙げています。
		</div>
		<h3>UDP</h3>
		<p>コネクションを確立せず、簡単な通信機能を提供します。</p>
	<h2>アプリケーション層</h2>
		<h3>TELNET</h3>
		<p>IPネットワークを通してサーバを遠隔操作するためのプロトコルです。<br><br>通信は暗号化されないためセキュリティ面で問題視されることが多く、代わりに「<a href = "sc-1-1-22?to=href?ssh">SSH</a>」が用いられることが多くなっています。</p>
		<h3>DHCP</h3>
		<p>「Dynamic Host Configuration Protocol」の略で、ネットワーク接続に必要な設定(IPアドレス・サブネットマスク・DNSサーバ・etc...)を自動化するためのプロトコルです。</p>
		<h3>NTP</h3>
		<p>「Network Time Protocol」の略で、時刻を同期するためのプロトコルです。</p>
		<h3>SIP</h3>
		<p>「Session Initiation Protocol」の略で、セッション確立に用いられるプロトコルです。<br>IP電話に用いられます。</p>
		<h3>RTP</h3>
		<p>「Real-time Transport Protocol」の略で、音声・動画などの連続するデータを送信するためのプロトコルです。</p>
		<h3>SOAP</h3>
		<p>「Simple Object Access Protocol」の略で、webアプリケーションにおいて異なるコンピュータ上のデータを処理するためのプロトコルです。<br>近年はwebアーキテクチャとしてはより軽量なRESTが好まれます。</p>
	<h2>ルーティング</h2>
		<h3>OSPF</h3>
		<p>「Open Shortest Path First」の略で、中継するリンクの状態を加味して最適な経路選択をするプロトコルです。</p>
		<h3>RIP</h3>
		<p>「Routing Information Protocol」の略で、ホップ数(経由するルータ数)が最小となるように経路を決定します。</p>
		<h3>RIPng</h3>
		<p>RIPのIPv6バージョンです。</p>
		<h3>BGP</h3>
		<p>「Border Gateway Protocol」の略で、複数のネットワーク間の経路情報を通信機器間で交換するためのプロトコルです。</p>
		<h3>MPLS</h3>
		<p>「Multi-Protocol Label Switching」の略で、<a href = "https://datatracker.ietf.org/doc/html/rfc3031">RFC3031</a>によって標準化されている特定のネットワーク内でラベルと呼ばれる短い符号をパケットに付与すことで高速な転送処理を行うためのプロトコルです。</p>
	<!-- LAN・WAN間インターフェース -->
	<h2>CORBA</h2>
	<p>「Common Object Request Broker Architecture」の略で、プログラム言語やネットワークプロトコルに依存しない異機種分散環境において、分散処理の連携を実現するための基盤を言います。</p>



	<h2></h2>
</div>

<?php
include_footer();
?>