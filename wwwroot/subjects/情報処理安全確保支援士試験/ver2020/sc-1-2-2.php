<?php
require_once("common.php");
include_head("OSI基本参照モデル");
?>

<div id = "main">
	<p id = "my_comment">本来はここでは、TCP/IPについて学ぶ予定になっているんですけど、最初にOSI基本参照モデルを復習して、その後にTCP/IPについて詳しく説明することにします。<br>今回は少し長いです、、、<br><br>それでは、Let's jump!!</p>

	<h2>OSI基本参照モデル</h2>
	<p>基本情報技術者試験の範囲ですが、とっても大事なのでここでも説明しますね♪<br><br>以下の階層をしっかりと覚えてくださいね!!</p>
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
	</div>
	<h2>IPv4</h2>
	<p>現在のインターネット技術の根幹となるプロトコルです。<br>IPでは、ネットワークに接続された機器をIPアドレスによって一意に識別してパケットの経路制御を実行します。<br><br>IP層で作成されるパケットは<span class = "underline">「IPヘッダ部分」と「IPデータ部分」</span>に分けられます。<br>また、「IPヘッダ部分」の構成は以下のようになっています。</p>
	<div class = "scroll_x">
		<table border = "1" class = "header">
			<caption>IPv4ヘッダ構成</caption>
			<tbody>
				<tr>
					<th>バージョン</th>
					<th>Version</th>
					<td>4</td>
					<td>IPのバージョンが入ります。<br>「IPv4」なら「4」<br>「IPv6」なら「6」</td>
				</tr>
				<tr>
					<th>ヘッダ長</th>
					<th>IHL</th>
					<td>4</td>
					<td>IPヘッダ部分の長さを示します。<br>「IPヘッダ部分」と「IPデータ部分」を識別可能にします。</td>
				</tr>
				<tr>
					<th>サービスタイプ</th>
					<th>TOS</th>
					<td>8</td>
					<td>IPパケットの優先度等を入力します。</td>
				</tr>
				<tr>
					<th>全長</th>
					<th>Total Length</th>
					<td>16</td>
					<td>IPパケット(「IPヘッダ部分」と「IPデータ部分」の合計)の長さを示します。</td>
				</tr>
				<tr>
					<th>識別子</th>
					<th>Identification</th>
					<td>16</td>
					<td>大きなデータを分割送信する際に同じデータかどうかを判定するために使われます。</td>
				</tr>
				<tr>
					<th>フラグ</th>
					<th>Flags</th>
					<td>3</td>
					<td>IPパケットの分割制御に関する情報を表します。</td>
				</tr>
				<tr>
					<th>フラグメント<br>オフセット</th>
					<th>Fragment Offset</th>
					<td>13</td>
					<td>分割されたパケットが、元のデータのどこに位置しているかを表します。</td>
				</tr>
				<tr>
					<th>パケット生存時間</th>
					<th>TTL</th>
					<td>8</td>
					<td>パケットが通過可能な<span class = "underline">ルータの数</span>を表します。<br>ルータを経由するたびにひとつづつ減らして、0になった時点でパケットを破棄します。</td>
				</tr>
				<tr>
					<th>プロトコル番号</th>
					<th>Protocol</th>
					<td>8</td>
					<td>IPの上位プロトコルを表します。<br><br>下でプロトコル番号について少し詳しく説明しています。</td>
				</tr>
				<tr>
					<th>チェックサム</th>
					<th>Header Checksum</th>
					<td>16</td>
					<td>IPパケットの伝送エラーの有無をチェックします。</td>
				</tr>
				<tr>
					<th>発信元IPアドレス</th>
					<th>Source Address</th>
					<td>32</td>
					<td>発信元IPアドレスを登録します。</td>
				</tr>
				<tr>
					<th>宛先IPアドレス</th>
					<th>Destination Address</th>
					<td>32</td>
					<td>宛先IPアドレスを登録します。</td>
				</tr>
				<tr>
					<th>オプション</th>
					<th>Options</th>
					<td>可変長</td>
					<td>IPパケットに関するオプション情報を設定します。</td>
				</tr>
				<tr>
					<th>パディング</th>
					<th>Padding</th>
					<td>可変長</td>
					<td>上のオプションを設定した際にオプションの長さを32ビットに調整するために用いられます。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "explanation">
		<span class = "underline">IPヘッダ内に記載されるプロトコル番号</span>とは、、、<br><br>上位のプロトコルを識別するための情報であり、IANA(Internet Assinged Numbers Authority)が番号を割り振ります。<br><br>代表的なものに以下のものがあります。
		<div class = "scroll_x" id = "protocol_number">
			<table border = "1">
				<caption>主なプロトコル番号</caption>
				<thead>
					<tr>
						<th>プロトコル番号</th>
						<th>略称</th>
						<th>正式名称</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>ICMP</td>
						<td>Internet Control Message Protocol</td>
					</tr>
					<tr>
						<td>2</td>
						<td>IGMP</td>
						<td>Internet Group Management Protocol</td>
					</tr>
					<tr>
						<td>4</td>
						<td>IPv4</td>
						<td>IP in IP (encapsulation)</td>
					</tr>
					<tr>
						<td>6</td>
						<td>TCP</td>
						<td>Transport Control Protocol</td>
					</tr>
					<tr>
						<td>17</td>
						<td>UDP</td>
						<td>User Diagram Protocol</td>
					</tr>
					<tr>
						<td>41</td>
						<td>IPv6</td>
						<td>IPv6 (encapsulation)</td>
					</tr>
					<tr>
						<td>43</td>
						<td>IPv6-Route</td>
						<td>Routing Header for IPv6</td>
					</tr>
					<tr>
						<td>44</td>
						<td>IPv6-Frag</td>
						<td>Fragment Header for IPv6</td>
					</tr>
					<tr>
						<td>47</td>
						<td>GRE</td>
						<td>General Routing Encapsulation</td>
					</tr>
					<tr>
						<td>50</td>
						<td>ESP</td>
						<td>Encap Security Payload</td>
					</tr>
					<tr>
						<td>51</td>
						<td>AH</td>
						<td>Authentication Header</td>
					</tr>
					<tr>
						<td>58</td>
						<td>IPv6-ICMP</td>
						<td>ICMP for IPv6</td>
					</tr>
					<tr>
						<td>89</td>
						<td>OSPFIGP</td>
						<td>OSPFIGP</td>
					</tr>
					<tr>
						<td>112</td>
						<td>VRRP</td>
						<td>Vertual Router Redunduncy Protocol</td>
					</tr>
					<tr>
						<td>115</td>
						<td>L2TP</td>
						<td>Layer 2 Tunneling Protocol</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<p>インターネット利用者の増加によりIPアドレスの枯渇が現実的な問題となり、また送受信データの最適化の観点から次世代IPとしてIPv6の利用が進んでいます。<br><br>以下では、IPv6について説明しますね♪</p>
	<h2>IPv6</h2>
	<p>根幹となる部分はIPv4と同様ですがヘッダ情報は大きく変化しています。<br>以下に記載しますが、IPパケットの「ヘッダ部分」が大きく簡素化された点に着目してください。</p>
	<div class = "scroll_x">
		<table border = "1" class = "header">
			<caption>IPv6のヘッダ構成</caption>
			<tbody>
				<tr>
					<th>バージョン</th>
					<th>Version</th>
					<td>4</td>
					<td>IPのバージョンが入ります。<br>「IPv4」なら「4」<br>「IPv6」なら「6」</td>
				</tr>
				<tr>
					<th>優先度</th>
					<th>Traffic Class</th>
					<td>8</td>
					<td>QoSで使用するパケットのクラスを示します。</td>
				</tr>
				<tr>
					<th>フローラベル</th>
					<th>Flow Label</th>
					<td>20</td>
					<td>QoSで使用するトラフィックフローにつけるタグ</td>
				</tr>
				<tr>
					<th>ペイロード長</th>
					<th>Payload Length</th>
					<td>16</td>
					<td>「データ部分」の長さを示します。</td>
				</tr>
				<tr>
					<th>次ヘッダ</th>
					<th>Next Header</th>
					<td>8</td>
					<td>IPデータグラム内の次のヘッダを示します。</td>
				</tr>
				<tr>
					<th>ホップリミット</th>
					<th>Hop Limit</th>
					<td>8</td>
					<td>通過できるホップ数を示します。<br>中継ノード(ルータ等)がパケットを経由するたびにに「1」をマイナスしていき、「0」になったパケットは破棄されます。</td>
				</tr>
				<tr>
					<th>発信元アドレス</th>
					<th>Source Address</th>
					<td>128</td>
					<td>発信元IPアドレスを登録します。</td>
				</tr>
				<tr>
					<th>宛先アドレス</th>
					<th>Destination Address</th>
					<td>128</td>
					<td>宛先IPアドレスを登録します。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "explanation">
		<span class = "underline">QoS</span>とは、、、<br><br>「Quality of Service」の略で、ネットワーク上のサービスを安定して使えるようにするために、データを通す順番や量を調整する技術のことです。<br><br>ネットワーク機器は受信したデータをキュー領域に一時的に保存します。<br><br>QoSでは、このキュー領域にデータを格納する際(取り出す際)にデータ送受信の最適化を図ります。<br><br>データ送受信の最適は以下の手順で行われます。
		<ol>
			<li>クラス分け<br><small>※受信したデータを分類します。</small></li>
			<li>マーキング<br><small>※分類されたデータに優先度を付与します。</small></li>
			<li>キューイング<br><small>※マーキングしたデータをそれぞれの優先度のキューに格納します。</small></li>
			<li>スケジューリング<br><small>※それぞれのキューから実際に優先度を考慮してデータを取り出します。</small></li>
		</ol>
	</div>
	<p>IPv6ではIPv4の問題点を大きく改善しましたが、このIPv6構想は以下の目標の基で設計されました。<br>必然的に、IPv6でおさえるべき点となります。</p>
	<ul>
		<li>アドレス空間の拡張<br><small>※32ビットから128ビットまでアドレス空間が拡張しました。</small></li>
		<li>ルータ等の負荷軽減<br><small>※IPv4に比べてIPヘッダ構成が大きく簡素化されました。</small></li>
		<li>セキュリティの向上<br><small>※IPec(暗号化プロトコル)が標準搭載されました。</small></li>
		<li>IPアドレスの自動構成機能<br><small>※DHCPなしでホストがネットワークに接続することを可能にしました。</small></li>
		<li>NAT問題からの解放<br><small>※IPv6では膨大なアドレス空間が利用可能である為、NATの利用の必要性がなくなりました。</small></li>
	</ul>
	<h2>特別なアドレス</h2>
	<p>IPアドレスの中でも特別な意味を持つアドレスを確認しましょう♪</p>
	<label class = "hidden" for = "sp_ad"></label>
	<select id = "sp_ad">
		<option value = 0>IPv4</option>
		<option value = 1>IPv6</option>
	</select>
	<div class = "scroll_x">
		<table border = "1" class = "sp_address">
			<caption>IPv4で特別な意味を持つアドレス</caption>
			<tbody>
				<tr>
					<td>ループバック<br class = "w" />アドレス</td>
					<td>127.0.0.0/8</td>
					<td>自分自身を表すアドレスです。</td>
				</tr>
				<tr>
					<td>プライベート<br class = "w" />アドレス</td>
					<td>10.0.0.0/8<br>172.16.0.0<br>192.168.0.0</td>
					<td>LAN内だけで使用可能なアドレスです。</td>
				</tr>
				<tr>
					<td>リンクローカル<br class = "w" />アドレス</td>
					<td>169.254.0.0</td>
					<td>
						同一リンク上でのみ有効なアドレスを設定します。<br><small>(DHCPサーバからIPアドレスの付与に失敗した際にOSが自動的に設定します)</small><br><br>このIPアドレスが設定されたときに考えられることは以下の2つです。
						<ul>
							<li>DHCPサーバが正常に動作していない。</li>
							<li>割り振り可能なプライベートIPアドレスが枯渇した。<br><small>(従業員のスマホなど管理していない端末による大量の接続が原因)</small></li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>テストネットワーク用<br class = "w" />アドレス</td>
					<td>192.0.2.0/24<br>198.51.100.0/24<br>203.0.113.0/24</td>
					<td>テストで使用する用のアドレスです。</td>
				</tr>
				<tr>
					<td>マルチアドレス<br class = "w" />アドレス</td>
					<td>224.0.0.0/4</td>
					<td>ホストが含まれるグループを表すアドレスです。</td>
				</tr>
				<tr>
					<td>"This"ネットワーク<br class = "w" />アドレス</td>
					<td>0.0.0.0/8</td>
					<td>「この」ネットワークを表すアドレスです。</td>
				</tr>
			</tbody>
		</table>
		<table border = "1" class = "sp_address">
			<caption>IPv6で特別な意味を持つアドレス</caption>
			<thead>
				<tr>
					<th>アドレスの種類</th>
					<th>概要</th>
					<th>プレフィックス</th>
					<th>アドレス表記</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>ループバック<br class = "w" />アドレス</td>
					<td>00・・・1</td>
					<td>::1/128</td>
					<td>自分自身を表すアドレスです。</td>
				</tr>
				<tr>
					<td>マルチキャスト<br class = "w" />アドレス</td>
					<td>1111 1111</td>
					<td>ff00::/8</td>
					<td>ホストが含まれるグループを表すアドレスです。</td>
				</tr>
				<tr>
					<td>リンクローカル<br class = "w" />ユニキャスト<br class = "w" />アドレス</td>
					<td>1111 1110 10</td>
					<td>fe80:/10</td>
					<td>同一リンク上でのみ有効なアドレス(ユニキャストアドレス)を設定します。</td>
				</tr>
				<tr>
					<td>ユニークローカル<br class = "w" />ユニキャスト<br class = "w" />アドレス</td>
					<td>1111 110</td>
					<td>fc00::/7</td>
					<td>プライベートアドレス(IPv6バージョン)</td>
				</tr>
				<tr>
					<td>グローバル<br class = "w" />ユニキャスト<br class = "w" />アドレス</td>
					<td>001</td>
					<td>2000::/3</td>
					<td>IPv6ネットワーク全体で有効なユニキャストアドレスを言います。</td>
				</tr>
				<tr>
					<td>IPv6インターネット<br class = "w" />アドレス</td>
					<td>0010 0000 0000 0001</td>
					<td>2001::/16</td>
					<td>IANAに割り当てられて実際に用いられるアドレスを言います。</td>
				</tr>
			</tbody>
		</table>
	</div><br>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問20 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		IPアドレス 127.0.0.1(ループバックアドレス)を「<strong>単一のコンピュータ上で動作するプログラム同士が通信する際に使用される。</strong>」と説明しています。<br><br>
		少し特殊な説明していますね♪
	</div>
	<h2>IPアドレス</h2>
	<p>基礎中の基礎になりますが、IPアドレスの仕組みについてもう一度しっかり学びましょう。<br>きっと今後のネットワーク分野の理解の向上にもつながるはずです。<br><br>IPアドレスはインターネット上の<span class = "underline">ホスト</span>を一意に識別するためのアドレスです。<br>具体的な構成は<span class = "underline">「ネットワーク部」と「ホスト部」</span>からなり、「ネットワーク部」は組織の識別用に、「ホスト部」は同一ネットワーク上のホストの識別用に用いられます。<br><br>「ホスト部」がすべて「0」のアドレスは特定のホストではなく「<span class = "underline">ネットワークそのもの</span>」を示すアドレスであり、「ホスト部」がすべて「1」のアドレスは全てのホストを対象とする「<span class = "underline">ブロードキャスト</span>」アドレスとなります。</p>
	<div class = "explanation">
		<span class = "underline">ブロードキャスト</span>とは、、、<br><br>ネットワーク上の全てのホストを対象とする通信(同報通信)を言います。<br><br>反対に特定のホストに対する通信は「<span class = "underline">ユニキャスト</span>」と呼びます。
	</div>
	<span id = "href_address-class"></span>
	<h2>アドレスクラス</h2>
	<p>IPアドレスの分類のことで、IPアドレスを2進数で表した時の最初の何桁かで判定します。<br>具体的にはIPアドレスの使用用途によってクラスAからクラスEまでの5つに分類されます。<br>以下にまとめました。</p>
	<div class = "scroll_x">
		<table border = "1" class = "norble">
			<caption>アドレスクラス</caption>
			<thead>
				<tr>
					<th>アドレスクラス</th>
					<th>判定方法</th>
					<th>使用用途</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>クラスA</th>
					<td>「0」から始まる</td>
					<td>通常目的(大規模)</td>
				</tr>
				<tr>
					<th>クラスB</th>
					<td>「10」から始まる</td>
					<td>通常目的(中規模)</td>
				</tr>
				<tr>
					<th>クラスC</th>
					<td>「110」から始まる</td>
					<td>通常目的(小規模)</td>
				</tr>
				<tr>
					<th>クラスD</th>
					<td>「1110」から始まる</td>
					<td>マルチキャスト通信目的</td>
				</tr>
				<tr>
					<th>クラスE</th>
					<td>「1111」から始まる</td>
					<td>実験目的</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p>近年は、アドレスクラスによる分類ではなくて<a href = "sc-1-2-6?to=href_cidr">CIDR</a>による分類が主流になってきています。</p><br>
	<div class = "exam">
		&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問19 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		クラスDのIPアドレス(224.0.0.0 ～ 239.255.255.255)に関して、「<strong>UDPなどを用いるマルチキャスト通信で使用される。</strong>」と説明しています。
	</div>
	<h2>NAT・NAPT</h2>
	<p>前述したようにIPv4形式のIPアドレスは既に枯渇しています。<br>そのため、組織内のホストには組織内のみで利用可能なプライベートIPアドレスを割り当てて、インターネットにアクセスするときのみグローバルIPアドレスに変換する技術(<span class = "underline">NAT・NAPT</span>)が用いられます。<br><br>NAT・NAPTには以下の特徴があります。</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>NAT・NAPT</caption>
			<tbody>
				<tr>
					<th>NAT</th>
					<td>プライベートIPアドレスとグローバルIPアドレスを「<span class = "underline">1対1で</span>」対応させます。</td>
				</tr>
				<tr>
					<th>NAPT</th>
					<td>別名、「<span class = "underline">IPマスカレード</span>」です。<br>1つのグローバルIPアドレスを<span class = "underline">複数の</span>プライベートIPアドレスに対応させます。<br><br>具体的な方法としては、ポート番号を対応づけの情報に加えることで実現します。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>オーバレイネットワーク</h2>
	<p>物理的なネットワークの上に構築された仮想的なネットワークのことを言います。<br><small>※引用元は<a href = "https://www.ntt.com/bizon/glossary/j-a/overlay-underlay.html">こちら</a>。</small><br><br>オーバレイネットワークを活用した技術として、<span class = "underline">「VPN」「SDN」「SD-WAN」</span>があります。<br><br>また、物理的なネットワークのことをオーバレイネットワークに対して、アンダーレイネットワークと呼びます。</p>
	<h2>DNS</h2>
	<p><a href = "sc-1-1-7?to=href_dns-poizon">DNSキャッシュポイズニング</a>を説明する際に一度DNSについては説明しましたね♪<br><br>もう一度簡単に!!<br>DNSとは、ドメイン名(<?php echo $_SERVER["HTTP_HOST"]; ?>)をIPアドレス(<?php echo $_SERVER["REMOTE_ADDR"]; ?>)に変換する技術です。<br><br>このwebサイトのHPは「<?php echo $_SERVER["REMOTE_ADDR"]; ?>」です、って書かれても分かりにくいですよね、、、<br>これに対してこのwebページのHPは「<?php echo $_SERVER["HTTP_HOST"]; ?>」ですって書いてあったら覚えやすいですよね♪<br><br>ですけど、ドメイン名からは直接ホストを識別できないんですよ、、、<br>一度「ドメイン名」から「IPアドレス」に変換する必要があります。<br><br>これが、DNS(Domain Name System)で、「ドメイン名」を「IPアドレス」に変換することを<span class = "underline">名前解決</span>と言います。<br><br>以下で、名前解決の具体的な手順を説明します。</p>
	<ol>
		<li>リゾルバがキャッシュサーバに対して名前解決要求を出します。</li>
		<li>名前解決要求を受けたキャッシュサーバは自ドメインに関する問い合わせならそのまま応答を返し、他のドメインに関する問い合わせならルートドメインに問い合わせます。</li>
		<li>キャッシュサーバからの名前解決要求を受けたルートドメインはトップレベルドメイン(TLD / .jp .com .net)を管理するDNSサーバの情報を返します。</li>
		<li>トップレベルドメイン(.jp .com .net)を管理するDNSサーバの情報を受け取ったキャッシュサーバはトップレベルドメイン(.jp .com .net)を管理するDNSサーバに対して名前解決要求を行います。</li>
		<li>トップレベルドメイン(.jp .com .net)を管理するDNSサーバはさらに下の第二レベルドメイン(SLD / .co .ac .go)を管理するDNSサーバに関する情報を返します。</li>
		<li>第二レベルドメイン(.co .ac .go)を管理するDNSサーバに関する情報を受け取ったキャッシュサーバは第二レベルドメイン(.co .ac .go)を管理するDNSサーバに対してさらに名前解決要求を出します。</li>
		<li>第二レベルドメイン(.co .ac .go)を管理するDNSサーバはこれに対して第三レベルドメイン(mr-campus ai-lovelab koko-campus)を管理するDNSサーバに関する情報を返します。</li>
		<li>...</li>
	</ol>
	<div class = "explanation">
		<span class = "underline">ルートドメイン</span>とは、、、<br><br>ドメイン名の一番後ろにあるドット(.)のことです。<br>「mr-campus.com<span class = "red_font">.</span>」←最後のドット(<span class = "red_font">.</span>)がルートドメインです。<br><small>※普段は隠れているため意識することはないです。</small><br><br>このルートドメインを管理するDNSサーバはルートサーバと呼ばれ、世界に13個存在します。(負荷分散・セキュリティ向上のため)<br>因みにそのうちのひとつは日本のWIDEプロジェクトが担当しています♪
	</div>
	<p>以下はDNSに関連する用語の再掲です。</p>
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
	</div><br>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問10 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		「<strong>DNS CAA</strong>」について説明していませんでしたが、試験で出題されていたので簡単に説明しますね♪<br><br>
		DNS CAAを使用することによるセキュリティ上の効果として、「<strong>不正なサーバ証明書の発行を防ぐ</strong>」ことがあげられます。<br><br>
		<a href = 2https://www.rfc-editor.org/info/rfc6844>RFC6884</a>によって規格化されています。<br>
		2017年3月にCA/ブラウザフォーラムが「the Baseline Requirements」を変更して、DNS CAAの利用を義務化しています。
	</div>
	<h2>FQDN</h2>
	<p>「Fully Qualified Domain Name」の略で、<span class = "underline">完全修飾ドメイン名</span>のことを言います。<br>ドメイン名と似ていますがドメイン名を完全修飾(+ホスト名/サブドメイン名)したものです。<br>ドメイン名では普通は省略可能なものは省略して表記しますが、FQDNでは省略可能なものも一切省略せずに表記します。</p>
	<div class = "scroll_x">
		<table border = "1" class = "norble">
			<tbody>
				<tr>
					<th>ドメイン名</th>
					<td>mr-campus.com</td>
				</tr>
				<tr>
					<th>FQDN</th>
					<td>www.mr-campus.com.</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>URI</h2>
	<p>「Uniform Resource Indifier」の略で、インターネット上に存在する資源を一意に識別するための識別子です。<br><br>似た用語として「URL」がありますが、「URI」は「URL」よりも広い意味を指します。<br>一般的に情報処理技術者は「URL」ではなく「URI」という用語を好みます。<br><br>「URI」は以下の構成になっています。</p>
	<div class = "scroll_x" id = "fqdn_show"><span>https</span><span>://</span><span>www</span>.<span>koko-campus.com.</span><span>:80</span><span>/sc/ver3/</span><span>sc-1-2-2</span><span>#fqdn</span><span>?sid=0123&name=koko</span></div>
	<div class = "margin"></div>
	<div id = "ffqqddnn" class = "hidden"><span></span><br><br><span></span></div>
	<span id = "href_se-protocol"></span>
	<h2>セキュリティプロトコル</h2>
	<p>名前の通り安全な(暗号化されている)プロトコルを言います。<br>重要なセキュリティプロトコルは以前勉強しましたよね。<br><small>※リンクは<a href = "sc-1-1-22?to=href_se-protocol">こちら</a>。</small><br><br>今回はネットワークの視点からまとめました。</p>
	<div class = "scroll_x">
		<table border = "1" id = "security_protocol">
			<caption>セキュリティプロトコル</caption>
			<thead>
				<tr>
					<th>TCP/IP階層</th>
					<th>プロトコルの例</th>
					<th>概要</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th rowspan = 4>アプリケーション層</th>
					<td>S/MIME</td>
					<td>RSA Security社が開発した暗号化電子メール方式を言います。<br>MIMEは「Multipurpose Internet Mail Extensions」の略で、画像・音声などのバイナリファイルを送信するための規格であるため、S/MIMEでは当然に添付ファイルも併せて暗号化することが可能です。<br><br>S/MIMEには以下の特徴があります。
						<ul>
							<li>CMS(PKCS#7を拡張したもの)によって暗号化・ディジタル署名を実施</li>
							<li>S/MIME証明書(ディジタル証明書)の取得が必要</li>
							<li>ディジタル署名・暗号化の前にOSごとの差異を解消するための正規化が必要</li>
						</ul>
						<small>※参考サイトは<a href = "https://www.ipa.go.jp/security/pki/072.html">こちら</a>。</small>
					</td>
				</tr>
				<tr>
					<td>PGP</td>
					<td>Philip R Zimmmermannによって開発された電子メールの暗号化技術です。<br><br>あるユーザがPGPで使用する公開鍵に、そのユーザを信頼している他のユーザが自身の秘密鍵で署名する行為を繰り返すことで、<strong>信頼の輪(Web of Trust)</strong>を形成します。<br><br>Aさんが信頼しているBさんが信頼しているCさん...が信頼しているFさんも<span class = "underline">ある程度信頼できる</span>という考え方です。<br>その性質上、完全なセキュリティが求められるシステムにおいては使うべきではないです。<br><br>PGPでは公開鍵の正当性を確認するために<span class = "underline">フィンガプリント</span>を使用します。</td>
				</tr>
				<tr>
					<td>SET</td>
					<td>インターネットを通じて安全にクレジットカード決済を行うための技術です。</td>
				</tr>
				<tr>
					<td>XML</td>
					<td>一般的に使用されることは多くはありませんが、記述言語であるXMLではXML暗号・XML署名が可能です。</td>
				</tr>
				<tr>
					<th rowspan = 3>アプリケーション層<br>トランスポート層</th>
					<td>SSL/TLS</td>
					<td>webブラウザとwebサーバ間で安全なHTTP通信を実現するためのプロトコルです。<br>SSLはセキュリティの観点から使用は非推奨の状態で、SSLからTLSへの移行が進んでいますが、両者をあわせて「SSL/TLS」と呼ぶことが多いです。<br><br>SSL/TLSには以下の特徴があります。
						<ul>
							<li>L3とL4の間で暗号化を実行</li>
							<li>ディジタル証明書(公開鍵証明書)を使って正当性を検証</li>
							<li>HTTP・SMTP・FTP・POP3・IMAP4・LDAPで使用が可能</li>
							<li>メッセージ認証方法としてMACを採用</li>
						</ul>
						SSL/TLSは以下の構成になっています。
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
						</div>
					</td>
				</tr>
				<tr>
					<td>HTTPS</td>
					<td>HTTP通信を安全に(<strong>S</strong>ecure)に行います。<br><br>具体的にはHTTP通信に対して前述した「SSL/TLS」暗号を使用します。
					</td>
				</tr>
				<tr>
					<td>SSH</td>
					<td>アプリケーション層とトランスポート層の間で暗号化を実行する方式です。rlogin・rsh・rcpの認証と暗号通信機構を強化したもので、FTP・POP3などで用いられます。
						SSHには以下の特徴があります。
						<ul>
							<li>セッションごとに異なる暗号鍵を生成</li>
							<li>暗号化アルゴリズムとして「3DES」「AES」「Blowfish」「Arcfour」を採用</li>
							<li>認証方法として公開鍵認証方式を採用<br><small>※パスワード認証も可能</small></li>
						</ul>
					</td>
				</tr>
				<tr>
					<th>トランスポート層</th>
					<td>SOCKS</td>
					<td>IETFが<a href = "https://datatracker.ietf.org/doc/html/rfc1928">RFC1928</a>によって標準化したプロトコルで、ソケットインタフェースレベルでのトランスポートゲートウェイとして機能します。</td>
				</tr>
				<tr>
					<th>インターネット層</th>
					<td>IPsec</td>
					<td>IPを拡張してセキュリティを高めるプロトコルで、パケットをインターネット層で暗号化します。
						IPsecには以下の特徴があります。
						<ul>
							<li>パケットをインターネット層でカプセル化・暗号化</li>
							<li>IPv6では標準で搭載</li>
						</ul>
						詳しくは<a>こちら</a>で説明しています。
					</td>
				</tr>
				<tr>
					<th rowspan = 3>データリンク層</th>
					<td>PPTP</td>
					<td>MS社が開発したPPPをL3でトンネリングするプロトコルです。<br><br>以下の特徴があります。
						<ul>
							<li>暗号化にMPPEを採用</li>
							<li>暗号化アルゴリズムに<a href = "sc-1-1-12?to=href_ckey">RC4(ストリーム暗号方式)</a>を採用</li>
							<li>認証には「MS-CHAP」と「EAP」が使用可能</li>
							<li>カプセル化プロトコルにはGREを採用<br><small>PPPフレーム(PPPヘッダ・IPヘッダ・TCPヘッダ・データ)に「IPヘッダ」と「GREヘッダ」を付加してカプセル化します。</small></li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>L2F</td>
					<td>シスコ社がCisco IOS上で実装したトンネリングプロトコルであり、認証と暗号化については PPPの機能を利用しています。</td>
				</tr>
				<tr>
					<td>L2TP</td>
					<td>前述したL2FとPPTPを統合したプロトコルです。<br>L2F同様にPPPパケットをトンネリングしますが、LT2P自体は暗号化機能を実装していないため、IPsecと併用する必要があります。<br><br>具体的には、PPPフレーム(PPPヘッダ・IPヘッダ・TCPヘッダ・データ)を「L2PTヘッダ」によってカプセル化した後に「UDP」でカプセル化してIPヘッダを付加します。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>ホストの要塞化</h2>
	<p>ホストの部品(OS等のソフトウェア)に存在するセキュリティホール(プログラムのバグや設定ミスによって生じる情報セキュリティ上の欠陥のこと)を塞いで、堅牢な状態にすることを言います。<br><br>具体的な手法として以下のものがあげられます。</p>
	<ul>
		<li>ソフトウェアのアップデート</li>
		<li>パッチの適用</li>
		<li>不要なサービス・機能の停止</li>
		<li>不要なグループ・アカウントの削除</li>
		<li>FWの適切な設定</li>
		<li>適切なパーティション設計</li>
		<li>セキュアなファイルシステムの選択</li>
		<li>適切なアクセス権の設定</li>
		<li>ログの設定</li>
	</ul>
	<div class = "explanation">
		<span class = "underline">パーティション</span>とは、、、<br><br>ハードディスク内のデータを保存するための区画のこと言います。<br><br>最適なパーティション設計の基本思想としては、「用途や更新頻度が大きく異なるデータを同じパーティション内に保存しない」ことがあげられます。<br><br>具体的には以下のようなパーティションを設計することが多いです。
		<ul>
			<li>カーネルの保存領域</li>
			<li>アプリケーションの保存領域</li>
			<li>ユーザーデータの保存領域</li>
			<li>ログの保存領域</li>
		</ul>
		<div class = "margin"></div>
		RH社のwebページでは具体的に以下のパーティションを設計することを推奨しています。
		<div class = "scroll_x">
			<table border = "1" class = "norble">
				<tbody>
					<tr>
						<th>swapパーティション</th>
						<td>仮想メモリーをサポートします。</td>
					</tr>
					<tr>
						<th>/ bootパーティション</th>
						<td>ブートストラッププロセス中に使用されたファイルと共に、オペレーティングシステムカーネルが含まれます。</td>
					</tr>
					<tr>
						<th>/ パーティション</th>
						<td>/bootパーティションに保存されるファイルを除く全てのファイルを保存します。</td>
					</tr>
					<tr>
						<th>homeパーティション</th>
						<td>システムデータとは別にユーザーデータを保存します。</td>
					</tr>
					<tr>
						<th>/boot/efi パーティション</th>
						<td><small>※UEFIファームウェアを搭載するシステムの場合のみ用いられます。</small></td>
					</tr>
				</tbody>
			</table>
			<span class = "quote">※引用元は<a href = "https://access.redhat.com/documentation/ja-jp/red_hat_enterprise_linux/6/html/installation_guide/s2-diskpartrecommend-x86">こちら</a>。</span>
		</div>
	</div>
	<p>次回はTheセキュリティ対策<small>(※あくまでも僕個人の感覚です。)</small>である<strong>ファイアウォール</strong>について学びます♪</p>


	<h2></h2>
</div>


<?php
include_footer();
?>