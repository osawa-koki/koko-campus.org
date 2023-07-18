<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-19",
	"updated" => "2022-03-19"
);
head($obj);
?>
<p id="message">本来はここでは、TCP/IPについて学ぶ予定になっているんですけど、最初にOSI基本参照モデルを復習して、その後にTCP/IPについて詳しく説明することにします。<br />今回は少し長いです、、、<br /><br />それでは、Let's jump!!</p>
<h2>OSI基本参照モデル</h2>
基本情報技術者試験の範囲ですが、とっても大事なのでここでも説明しますね♪<br /><br />以下の階層をしっかりと覚えてくださいね!!
<div class="scroll-600w">
	<table>
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
				<th>アプリケーション層<br />(第7層)</th>
				<th rowspan=3>アプリケーション層</th>
				<td rowspan=3>HTTP・FTP・SMTP・POP3・Telnet・S/MIME・PGP・etc...</td>
			</tr>
			<tr>
				<th>プレゼンテーション層<br />(第6層)</th>
			</tr>
			<tr>
				<th>セッション層<br />(第5層)</th>
			</tr>
			<tr>
				<th>トランスポート層<br />(第4層)</th>
				<th>トランスポート層</th>
				<td>TCP・UDP・SSL・TLS・SSH・etc...</td>
			</tr>
			<tr>
				<th>ネットワーク層<br />(第3層)</th>
				<th>インターネット層</th>
				<td>IPv4・IPv6・ICMP・IPsec・etc...</td>
			</tr>
			<tr>
				<th>データリンク層<br />(第2層)</th>
				<th rowspan=2>ネットワーク<br />インターネット層</th>
				<td rowspan=2>Ethernet・PPP・FDDI・PPTP・L2TP・etc...</td>
			</tr>
			<tr>
				<th>物理層<br />(第1層)</th>
			</tr>
		</tbody>
	</table>
</div>
<h2>IPv4</h2>
現在のインターネット技術の根幹となるプロトコルです。<br />IPでは、ネットワークに接続された機器をIPアドレスによって一意に識別してパケットの経路制御を実行します。<br /><br />IP層で作成されるパケットは<span class="underline">「IPヘッダ部分」と「IPデータ部分」</span>に分けられます。<br />また、「IPヘッダ部分」の構成は以下のようになっています。
<div class="scroll-600w">
	<table>
		<caption>IPv4ヘッダ構成</caption>
		<tbody>
			<tr>
				<th>バージョン</th>
				<th>Version</th>
				<td>4</td>
				<td>IPのバージョンが入ります。<br />「IPv4」なら「4」<br />「IPv6」なら「6」</td>
			</tr>
			<tr>
				<th>ヘッダ長</th>
				<th>IHL</th>
				<td>4</td>
				<td>IPヘッダ部分の長さを示します。<br />「IPヘッダ部分」と「IPデータ部分」を識別可能にします。</td>
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
				<th>フラグメント<br />オフセット</th>
				<th>Fragment Offset</th>
				<td>13</td>
				<td>分割されたパケットが、元のデータのどこに位置しているかを表します。</td>
			</tr>
			<tr>
				<th>パケット生存時間</th>
				<th>TTL</th>
				<td>8</td>
				<td>パケットが通過可能な<span class="underline">ルータの数</span>を表します。<br />ルータを経由するたびにひとつづつ減らして、0になった時点でパケットを破棄します。</td>
			</tr>
			<tr>
				<th>プロトコル番号</th>
				<th>Protocol</th>
				<td>8</td>
				<td>IPの上位プロトコルを表します。<br /><br />下でプロトコル番号について少し詳しく説明しています。</td>
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
<div class="explanation">
	<div class="title">プロトコル番号</div>
	上位のプロトコルを識別するための情報であり、IANA(Internet Assinged Numbers Authority)が番号を割り振ります。<br /><br />代表的なものに以下のものがあります。
	<div class="scroll-600w">
		<table>
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
インターネット利用者の増加によりIPアドレスの枯渇が現実的な問題となり、また送受信データの最適化の観点から次世代IPとしてIPv6の利用が進んでいます。<br /><br />以下では、IPv6について説明しますね♪
<h2>IPv6</h2>
根幹となる部分はIPv4と同様ですがヘッダ情報は大きく変化しています。<br />以下に記載しますが、IPパケットの「ヘッダ部分」が大きく簡素化された点に着目してください。
<div class="scroll-600w">
	<table>
		<caption>IPv6のヘッダ構成</caption>
		<tbody>
			<tr>
				<th>バージョン</th>
				<th>Version</th>
				<td>4</td>
				<td>IPのバージョンが入ります。<br />「IPv4」なら「4」<br />「IPv6」なら「6」</td>
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
				<td>通過できるホップ数を示します。<br />中継ノード(ルータ等)がパケットを経由するたびにに「1」をマイナスしていき、「0」になったパケットは破棄されます。</td>
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
<div class="explanation">
	<div class="title">QoS</div>
	「Quality of Service」の略で、ネットワーク上のサービスを安定して使えるようにするために、データを通す順番や量を調整する技術のことです。<br /><br />ネットワーク機器は受信したデータをキュー領域に一時的に保存します。<br /><br />QoSでは、このキュー領域にデータを格納する際(取り出す際)にデータ送受信の最適化を図ります。<br /><br />データ送受信の最適は以下の手順で行われます。
	<ol>
		<li>クラス分け<br /><small>(受信したデータを分類)</small></li>
		<li>マーキング<br /><small>(分類されたデータに優先度を付与)</small></li>
		<li>キューイング<br /><small>(マーキングしたデータをそれぞれの優先度のキューに格納)</small></li>
		<li>スケジューリング<br /><small>(それぞれのキューから実際に優先度を考慮してデータを取得)</small></li>
	</ol>
</div>
IPv6ではIPv4の問題点を大きく改善しましたが、このIPv6構想は以下の目標の基で設計されました。<br />必然的に、IPv6でおさえるべき点となります。
<ul>
	<li>アドレス空間の拡張<br /><small>(32ビットから128ビットまでアドレス空間が拡張)</small></li>
	<li>ルータ等の負荷軽減<br /><small>(IPv4に比べてIPヘッダ構成が大きく簡素化)</small></li>
	<li>セキュリティの向上<br /><small>(IPecが標準搭載)</small></li>
	<li>IPアドレスの自動構成機能<br /><small>(DHCPなしでホストがネットワークに接続することが可能)</small></li>
	<li>NAT問題からの解放<br /><small>(IPv6では膨大なアドレス空間が利用可能である為、NATが不要)</small></li>
</ul>
<h2>特別なアドレス</h2>
IPアドレスの中でも特別な意味を持つアドレスを確認しましょう♪
<div class="scroll-600w">
	<table>
		<caption>IPv4で特別な意味を持つアドレス</caption>
		<tbody>
			<tr>
				<td>ループバックアドレス</td>
				<td>127.0.0.0/8</td>
				<td>自分自身を表すアドレスです。</td>
			</tr>
			<tr>
				<td>プライベートアドレス</td>
				<td>10.0.0.0/8<br />172.16.0.0<br />192.168.0.0</td>
				<td>LAN内だけで使用可能なアドレスです。</td>
			</tr>
			<tr>
				<td>リンクローカルアドレス</td>
				<td>169.254.0.0</td>
				<td>
					同一リンク上でのみ有効なアドレスを設定します。<br /><small>(DHCPサーバからIPアドレスの付与に失敗した際にOSが自動的に設定します)</small><br /><br />このIPアドレスが設定されたときに考えられることは以下の2つです。
					<ul>
						<li>DHCPサーバが正常に動作していない。</li>
						<li>割り振り可能なプライベートIPアドレスが枯渇した。<br /><small>(従業員のスマホなど管理していない端末による大量の接続が原因)</small></li>
					</ul>
				</td>
			</tr>
			<tr>
				<td>テストネットワーク用アドレス</td>
				<td>192.0.2.0/24<br />198.51.100.0/24<br />203.0.113.0/24</td>
				<td>テストで使用する用のアドレスです。</td>
			</tr>
			<tr>
				<td>マルチアドレスアドレス</td>
				<td>224.0.0.0/4</td>
				<td>ホストが含まれるグループを表すアドレスです。</td>
			</tr>
			<tr>
				<td>"This"ネットワークアドレス</td>
				<td>0.0.0.0/8</td>
				<td>「この」ネットワークを表すアドレスです。</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="scroll-600w">
	<table>
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
				<td>ループバックアドレス</td>
				<td>00・・・1</td>
				<td>::1/128</td>
				<td>自分自身を表すアドレスです。</td>
			</tr>
			<tr>
				<td>マルチキャストアドレス</td>
				<td>1111 1111</td>
				<td>ff00::/8</td>
				<td>ホストが含まれるグループを表すアドレスです。</td>
			</tr>
			<tr>
				<td>リンクローカルユニキャストアドレス</td>
				<td>1111 1110 10</td>
				<td>fe80:/10</td>
				<td>同一リンク上でのみ有効なアドレス(ユニキャストアドレス)を設定します。</td>
			</tr>
			<tr>
				<td>ユニークローカルユニキャストアドレス</td>
				<td>1111 110</td>
				<td>fc00::/7</td>
				<td>プライベートアドレス(IPv6バージョン)</td>
			</tr>
			<tr>
				<td>グローバルユニキャストアドレス</td>
				<td>001</td>
				<td>2000::/3</td>
				<td>IPv6ネットワーク全体で有効なユニキャストアドレスを言います。</td>
			</tr>
			<tr>
				<td>IPv6インターネットアドレス</td>
				<td>0010 0000 0000 0001</td>
				<td>2001::/16</td>
				<td>IANAに割り当てられて実際に用いられるアドレスを言います。</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問20 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	IPアドレス 127.0.0.1(ループバックアドレス)を「<strong>単一のコンピュータ上で動作するプログラム同士が通信する際に使用される。</strong>」と説明しています。<br /><br />
	少し特殊な説明していますね♪
</div>
<h2>IPアドレス</h2>
基礎中の基礎になりますが、IPアドレスの仕組みについてもう一度しっかり学びましょう。<br />きっと今後のネットワーク分野の理解の向上にもつながるはずです。<br /><br />IPアドレスはインターネット上の<span class="underline">ホスト</span>を一意に識別するためのアドレスです。<br />具体的な構成は<span class="underline">「ネットワーク部」と「ホスト部」</span>からなり、「ネットワーク部」は組織の識別用に、「ホスト部」は同一ネットワーク上のホストの識別用に用いられます。<br /><br />「ホスト部」がすべて「0」のアドレスは特定のホストではなく「<span class="underline">ネットワークそのもの</span>」を示すアドレスであり、「ホスト部」がすべて「1」のアドレスは全てのホストを対象とする「<span class="underline">ブロードキャスト</span>」アドレスとなります。
<div class="explanation">
	<div class="title">ブロードキャスト</div>
	ネットワーク上の全てのホストを対象とする通信(同報通信)を言います。<br /><br />反対に特定のホストに対する通信は「<span class="underline">ユニキャスト</span>」と呼びます。
</div>
<span id="href_address-class"></span>
<h2>アドレスクラス</h2>
IPアドレスの分類のことで、IPアドレスを2進数で表した時の最初の何桁かで判定します。<br />具体的にはIPアドレスの使用用途によってクラスAからクラスEまでの5つに分類されます。<br />以下にまとめました。
<div class="scroll-600w">
	<table>
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
近年は、アドレスクラスによる分類ではなくて<a href="通信プロトコル?to=href_cidr">CIDR</a>による分類が主流になってきています。
<div class="exam">
	&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問19 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	クラスDのIPアドレス(224.0.0.0 ～ 239.255.255.255)に関して、「<strong>UDPなどを用いるマルチキャスト通信で使用される。</strong>」と説明しています。
</div>
<h2>NAT・NAPT</h2>
前述したようにIPv4形式のIPアドレスは既に枯渇しています。<br />そのため、組織内のホストには組織内のみで利用可能なプライベートIPアドレスを割り当てて、インターネットにアクセスするときのみグローバルIPアドレスに変換する技術(<span class="underline">NAT・NAPT</span>)が用いられます。<br /><br />NAT・NAPTには以下の特徴があります。
<div class="scroll-600w">
	<table>
		<caption>NAT・NAPT</caption>
		<tbody>
			<tr>
				<th>NAT</th>
				<td>プライベートIPアドレスとグローバルIPアドレスを「<span class="underline">1対1で</span>」対応させます。</td>
			</tr>
			<tr>
				<th>NAPT</th>
				<td>別名、「<span class="underline">IPマスカレード</span>」です。<br />1つのグローバルIPアドレスを<span class="underline">複数の</span>プライベートIPアドレスに対応させます。<br /><br />具体的な方法としては、ポート番号を対応づけの情報に加えることで実現します。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>オーバレイネットワーク</h2>
物理的なネットワークの上に構築された仮想的なネットワークのことを言います。
<p>引用元は<a href="https://www.ntt.com/bizon/glossary/j-a/overlay-underlay.html">こちら</a>。</p>
オーバレイネットワークを活用した技術として、<span class="underline">「VPN」「SDN」「SD-WAN」</span>があります。<br /><br />また、物理的なネットワークのことをオーバレイネットワークに対して、アンダーレイネットワークと呼びます。
<h2>DNS</h2>
<a href="エージェント型攻撃?to=href_dns-poizon">DNSキャッシュポイズニング</a>を説明する際に一度DNSについては説明しましたね♪<br /><br />もう一度簡単に!!<br />DNSとは、ドメイン名(<?php echo $_SERVER["HTTP_HOST"]; ?>)をIPアドレス(<?php echo $_SERVER["REMOTE_ADDR"]; ?>)に変換する技術です。<br /><br />このwebサイトのHPは「<?php echo $_SERVER["REMOTE_ADDR"]; ?>」です、って書かれても分かりにくいですよね、、、<br />これに対してこのwebページのHPは「<?php echo $_SERVER["HTTP_HOST"]; ?>」ですって書いてあったら覚えやすいですよね♪<br /><br />ですけど、ドメイン名からは直接ホストを識別できないんですよ、、、<br />一度「ドメイン名」から「IPアドレス」に変換する必要があります。<br /><br />これが、DNS(Domain Name System)で、「ドメイン名」を「IPアドレス」に変換することを<span class="underline">名前解決</span>と言います。<br /><br />以下で、名前解決の具体的な手順を説明します。
<svg version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<g fill="#fff" stroke="#000" stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
		<g stroke-width="2.2582">
			<rect class="server" x="263.97" y="189.62" width="47.798" height="77.675"/>
			<rect class="window" x="271.09" y="198.77" width="19.913" height="8.7616"/>
			<rect class="window" x="271.5" y="216.29" width="19.913" height="8.7616"/>
		</g>
		<g stroke-width="2.2582">
			<rect class="server" x="504.21" y="71.828" width="47.798" height="77.675"/>
			<rect class="window" x="511.34" y="80.979" width="19.913" height="8.7616"/>
			<rect class="window" x="511.75" y="98.5" width="19.913" height="8.7616"/>
		</g>
		<g stroke-width="2.2582">
			<rect class="server" x="504.21" y="189.62" width="47.798" height="77.675"/>
			<rect class="window" x="511.34" y="198.77" width="19.913" height="8.7616"/>
			<rect class="window" x="511.75" y="216.29" width="19.913" height="8.7616"/>
		</g>
		<g stroke-width="2.2582">
			<rect class="server" x="504.21" y="307.41" width="47.798" height="77.675"/>
			<rect class="window" x="511.34" y="316.56" width="19.913" height="8.7616"/>
			<rect class="window" x="511.75" y="334.08" width="19.913" height="8.7616"/>
		</g>
		<g fill="#fff" stroke="#000">
			<ellipse cx="97.788" cy="229.76" rx="38.203" ry="33.395" stroke-width="2.869"/>
			<g stroke-dashoffset=".5" stroke-linecap="round" stroke-linejoin="round">
				<ellipse cx="84.694" cy="224.08" rx="7.5396" ry="5.152" stop-color="#000000" stroke-width="2.553" style="paint-order:markers stroke fill"/>
				<ellipse cx="113.49" cy="224.08" rx="7.5396" ry="5.152" stop-color="#000000" stroke-width="2.553" style="paint-order:markers stroke fill"/>
				<ellipse cx="98.442" cy="244.95" rx="14.561" ry="1.5213" stop-color="#000000" stroke-width="2.2078" style="paint-order:markers stroke fill"/>
			</g>
		</g>
		<g id="dns-arrows" stroke-width="1.7662">
			<path d="m159.42 226.84v-15.1l82.81 7.55z" stop-color="#000000" style="paint-order:markers stroke fill"/>
			<path d="m370.64 178.34-6.32-13.71 78.4-27.73z" stop-color="#000000" style="paint-order:markers stroke fill"/>
			<path d="m446.26 143.97 6.31 13.71-78.4 27.72z" stop-color="#000000" style="paint-order:markers stroke fill"/>
			<path d="m368.65 232.97v-15.09l82.81 7.55z" stop-color="#000000" style="paint-order:markers stroke fill"/>
			<path d="m451.46 247.58v-15.09l-82.81 7.55z" stop-color="#000000" style="paint-order:markers stroke fill"/>
			<path d="m373.47 284.3-6.31 13.72 78.4 27.72z" stop-color="#000000" style="paint-order:markers stroke fill"/>
			<path d="m432.18 344.75 6.31-13.71-78.4-27.72z" stop-color="#000000" style="paint-order:markers stroke fill"/>
			<path d="m242.23 245.47v-15.1l-82.81 7.55z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		</g>
		<g fill="#000000" font-family="Consolas" font-size="16px" stroke="none">
			<text x="42" y="182" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">スタブリゾルバ</text>
			<text x="225.72" y="160.97" stroke-width="1.7662" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">キャッシュサーバ</text>
			<text x="467.22" y="63.199" stroke-width="1.7662" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">(ゾーンサーバ)</text>
			<text x="462.02" y="43.157" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">コンテンツサーバ</text>
			<text x="201.17" y="180.37" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">(フルサービスリゾルバ)</text>
		</g>
	</g>
</svg>
<div id="dns-button" class="button">次へ</div>
<div id="dns-info" class="r-border"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const arws = Array.from(document.getElementById("dns-arrows").children),
			info = document.getElementById("dns-info");
		function reset() {
			arws.forEach(e => {
				e.style.fill = "none";
				e.style.stroke = "none";
			});
			info.textContent = "";
		}
		reset();
		const message = [
			"リゾルバがキャッシュサーバに対して名前解決要求を出します。",
			"名前解決要求を受けたキャッシュサーバは自ドメインに関する問い合わせならそのまま応答を返し、他のドメインに関する問い合わせならルートドメインに問い合わせます。",
			"キャッシュサーバからの名前解決要求を受けたルートドメインはトップレベルドメイン(TLD / .jp .com .net)を管理するDNSサーバの情報を返します。",
			"トップレベルドメイン(.jp .com .net)を管理するDNSサーバの情報を受け取ったキャッシュサーバはトップレベルドメイン(.jp .com .net)を管理するDNSサーバに対して名前解決要求を行います。",
			"トップレベルドメイン(.jp .com .net)を管理するDNSサーバはさらに下の第二レベルドメイン(SLD / .co .ac .go)を管理するDNSサーバに関する情報を返します。",
			"第二レベルドメイン(.co .ac .go)を管理するDNSサーバに関する情報を受け取ったキャッシュサーバは第二レベルドメイン(.co .ac .go)を管理するDNSサーバに対してさらに名前解決要求を出します。",
			"第二レベルドメイン(.co .ac .go)を管理するDNSサーバはこれに対して第三レベルドメインを管理するDNSサーバに関する情報を返します。",
			"キャッシュサーバは最終的な名前解決の結果をリゾルバに返します。"
		];
		let count = 0,
			x_lock = false;
		document.getElementById("dns-button").addEventListener("click", () => {
			if (!x_lock) {
				x_lock = true;
				try {
					arws[count - 1].style.fill = "none";
				} catch {}
				arws[count].style.fill = "aqua";
				info.textContent = message[count];
				if (count !== arws.length - 1) {
					setTimeout(() => {x_lock = false;}, 300);
				} else {
					setTimeout(() => {
						reset();
						count = 0;
						x_lock = false;
					}, 5000);
				}
				count++;
			}
		});
	})();
</script>
<div class="explanation">
	<div class="title">ルートドメイン</div>
	ドメイン名の一番後ろにあるドット(.)のことです。<br />「koko-campus.org<span class="red">.</span>」 &larr; 最後のドット(<span class="red">.</span>)がルートドメインです。
	<p>普通は省略します。</p>
	このルートドメインを管理するDNSサーバはルートサーバと呼ばれ、世界に13個存在します。(負荷分散・セキュリティ向上のため)<br />因みにそのうちのひとつは日本のWIDEプロジェクトが担当しています♪
</div>
以下はDNSに関連する用語の再掲です。
<div class="scroll-600w">
	<table>
		<caption>DNSに関連する用語</caption>
		<tbody>
			<tr>
				<th>リゾルバ</th>
				<td>「ドメイン名からIPアドレス」「IPアドレスからドメイン」を特定するためのプログラムのことを指します。<br /><br />リゾルバにはスタブリゾルバとフルサービスリゾルバのふたつがあります。</td>
			</tr>
			<tr>
				<th>スタブリゾルバ</th>
				<td>OSに標準搭載されているプログラムであり自身は名前解決ができないため、後述するフルサービスリゾルバに名前解決を要求します。</td>
			</tr>
			<tr>
				<th>フルサービスリゾルバ</th>
				<td>スタブリゾルバから受け取った名前解決要求に対して、名前解決を行ってその結果を返します。<br />フルサービスリゾルバとは一般的に後述するキャッシュサーバのことを指します。</td>
			</tr>
			<tr>
				<th>権威DNSサーバ</th>
				<td>別名、「コンテンツサーバ」「ゾーンサーバ」です。<br /><br />フルサービスリゾルバからの<span class="underline">非再帰的要求に対して、</span>自身が管理するドメイン内の名前解決に応じます。</td>
			</tr>
			<tr>
				<th>キャッシュサーバ</th>
				<td>別名、「フルサービスリゾルバ」です。<br /><br />スタブリゾルバからの<span class="underline">再帰的要求に対して、</span>必要ならば他のDNSサーバに名前解決要求をしてその結果を返します。</td>
			</tr>
			<tr>
				<th>オープンリゾルバ</th>
				<td>「問い合わせ元」「対象のドメイン」に制限なく、名前解決要求に応じるキャッシュサーバ(コンテンツサーバ)のことを指します。</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問10 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	「<strong>DNS CAA</strong>」について説明していませんでしたが、試験で出題されていたので簡単に説明しますね♪<br /><br />
	DNS CAAを使用することによるセキュリティ上の効果として、「<strong>不正なサーバ証明書の発行を防ぐ</strong>」ことがあげられます。<br /><br />
	<a href=2https://www.rfc-editor.org/info/rfc6844>RFC6884</a>によって規格化されています。<br />
	2017年3月にCA/ブラウザフォーラムが「the Baseline Requirements」を変更して、DNS CAAの利用を義務化しています。
</div>
<h2>FQDN</h2>
「Fully Qualified Domain Name」の略で、<span class="underline">完全修飾ドメイン名</span>のことを言います。<br />ドメイン名と似ていますがドメイン名を完全修飾(+ホスト名/サブドメイン名)したものです。<br />ドメイン名では普通は省略可能なものは省略して表記しますが、FQDNでは省略可能なものも一切省略せずに表記します。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>ドメイン名</th>
				<td>koko-campus.org</td>
			</tr>
			<tr>
				<th>FQDN</th>
				<td>www.koko-campus.org.</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>URI</h2>
「Uniform Resource Indifier」の略で、インターネット上に存在する資源を一意に識別するための識別子です。<br /><br />似た用語として「URL」がありますが、「URI」は「URL」よりも広い意味を指します。<br />一般的に情報処理技術者は「URL」ではなく「URI」という用語を好みます。<br /><br />「URI」は以下の構成になっています。
<p>タップすると詳細が表示されます。</p>
<div class="margin"></div>
<div class="scroll-600w" id="fqdn">
	<span>https</span>
	<span>://</span>
	<span>www</span>
	<span>koko-campus.org.</span>
	<span>:80</span>
	<span>/sc/ver3/</span>
	<span>sc-1-2-2</span>
	<span>#fqdn</span>
	<span>?sid=0123&name=koko</span>
</div>
<div id="fqdn-info" class="r-border"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const s = Array.from(document.getElementById("fqdn").children),
			info = document.getElementById("fqdn-info"),
			title = [
				"スキーム名",
				"スキーム識別子",
				"サブドメイン名",
				"ホスト名",
				"ポート番号",
				"パス名",
				"ファイル名",
				"アンカー",
				"URLパラメータ"
			],
			message = [
				"通信の手段(プロトコル)を指定します。<br />例) http https ftp",
				"スキームを識別するための文字列です。",
				"ホストを小さな単位へ分割した際のその名前です。",
				"インターネット上のホストを指定します。",
				"使用するポート番号(サービス)を指定します。",
				"指定する資源までの道のり(パス)を指定します。",
				"指定する資源の名前を指定します。<br />パスと合わせてファイル名とすることもあります。",
				"ページ内の要素へのリンク(ページ内リンク)を意味します。",
				"「?」以降はサーバへ送信するデータを指定します。<br />キーとバリューを「=」でつないでセットにして扱い、複数ある場合は「&amp;」で区切って表します。"
			];
		let last;
		s.forEach(e => {
			e.addEventListener("click", function() {
				try {
					last.style.color = "black";
				} catch {}
				this.style.color = "fuchsia";
				last = this;
				const n = s.indexOf(this),
					d = document.createElement("div");
				d.classList.add("title");
				d.textContent = title[n];
				info.innerHTML = message[n];
				info.insertBefore(d, info.firstChild);
			});
		});
	})();
</script>
<span id="href_se-protocol"></span>
<h2>セキュリティプロトコル</h2>
名前の通り安全な(暗号化されている)プロトコルを言います。<br />重要な<a href="セキュアプロトコル">セキュリティプロトコル</a>は以前勉強しましたよね。<br /><br />今回はネットワークの視点から学習します。
<div class="scroll-600w">
	<table>
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
				<th rowspan=4>アプリケーション層</th>
				<td>S/MIME</td>
				<td>RSA Security社が開発した暗号化電子メール方式を言います。<br />MIMEは「Multipurpose Internet Mail Extensions」の略で、画像・音声などのバイナリファイルを送信するための規格であるため、S/MIMEでは当然に添付ファイルも併せて暗号化することが可能です。<br /><br />S/MIMEには以下の特徴があります。
					<ul>
						<li>CMS(PKCS#7を拡張したもの)によって暗号化・ディジタル署名を実施</li>
						<li>S/MIME証明書(ディジタル証明書)の取得が必要</li>
						<li>ディジタル署名・暗号化の前にOSごとの差異を解消するための正規化が必要</li>
					</ul>
					<p>参考サイトは<a href="https://www.ipa.go.jp/security/pki/072.html">こちら</a>。</p>
				</td>
			</tr>
			<tr>
				<td>PGP</td>
				<td>Philip R Zimmmermannによって開発された電子メールの暗号化技術です。<br /><br />あるユーザがPGPで使用する公開鍵に、そのユーザを信頼している他のユーザが自身の秘密鍵で署名する行為を繰り返すことで、<strong>信頼の輪(Web of Trust)</strong>を形成します。<br /><br />Aさんが信頼しているBさんが信頼しているCさん...が信頼しているFさんも<span class="underline">ある程度信頼できる</span>という考え方です。<br />その性質上、完全なセキュリティが求められるシステムにおいては使うべきではないです。<br /><br />PGPでは公開鍵の正当性を確認するために<span class="underline">フィンガプリント</span>を使用します。</td>
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
				<th rowspan=3>アプリケーション層<br />トランスポート層</th>
				<td>SSL/TLS</td>
				<td>webブラウザとwebサーバ間で安全なHTTP通信を実現するためのプロトコルです。<br />SSLはセキュリティの観点から使用は非推奨の状態で、SSLからTLSへの移行が進んでいますが、両者をあわせて「SSL/TLS」と呼ぶことが多いです。<br /><br />SSL/TLSには以下の特徴があります。
					<ul>
						<li>L3とL4の間で暗号化を実行</li>
						<li>ディジタル証明書(公開鍵証明書)を使って正当性を検証</li>
						<li>HTTP・SMTP・FTP・POP3・IMAP4・LDAPで使用が可能</li>
						<li>メッセージ認証方法としてMACを採用</li>
					</ul>
					SSL/TLSは以下の構成になっています。
					<div class="scroll-600w">
						<table>
							<tbody>
								<tr>
									<th>Record<br />プロトコル</th>
									<td>L4のデータを2<sup>14</sup>バイト以下に分割して、MACの生成・暗号化を行います。<br />データの受信時にはMACの検証・復号を行います。</td>
								</tr>
								<tr>
									<th>Handshake<br />プロトコル</th>
									<td>サーバ・クライアント間のセッションの管理(「セッション確立」「暗号化アルゴリズム・鍵・ディジタル証明書の決定」等)を実行します。</td>
								</tr>
								<tr>
									<th>Change Cipher Spec<br />プロトコル</th>
									<td>暗号化通信で使用するパラメタを決定・変更する際にその内容を相手に通知します。</td>
								</tr>
								<tr>
									<th>Alert<br />プロトコル</th>
									<td>通信中のイベント・エラーを「Warning(警告)」「Fatal(致命的)」の2種類で通知します。</td>
								</tr>
								<tr>
									<th>Application Data<br />プロトコル</th>
									<td>前述したHandshakeプロトコルで決定したパラメタに従って、L4データを透過的に送受信します。</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td>HTTPS</td>
				<td>HTTP通信を安全に(<strong>S</strong>ecure)に行います。<br /><br />具体的にはHTTP通信に対して前述した「SSL/TLS」暗号を使用します。
				</td>
			</tr>
			<tr>
				<td>SSH</td>
				<td>アプリケーション層とトランスポート層の間で暗号化を実行する方式です。rlogin・rsh・rcpの認証と暗号通信機構を強化したもので、FTP・POP3などで用いられます。
					SSHには以下の特徴があります。
					<ul>
						<li>セッションごとに異なる暗号鍵を生成</li>
						<li>暗号化アルゴリズムとして「3DES」「AES」「Blowfish」「Arcfour」を採用</li>
						<li>認証方法として公開鍵認証方式を採用<br /><small>(パスワード認証も可能)</small></li>
					</ul>
				</td>
			</tr>
			<tr>
				<th>トランスポート層</th>
				<td>SOCKS</td>
				<td>IETFが<a href="https://datatracker.ietf.org/doc/html/rfc1928">RFC1928</a>によって標準化したプロトコルで、ソケットインタフェースレベルでのトランスポートゲートウェイとして機能します。</td>
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
				<th rowspan=3>データリンク層</th>
				<td>PPTP</td>
				<td>MS社が開発したPPPをL3でトンネリングするプロトコルです。<br /><br />以下の特徴があります。
					<ul>
						<li>暗号化にMPPEを採用</li>
						<li>暗号化アルゴリズムに<a href="暗号?to=href_ckey">RC4(ストリーム暗号方式)</a>を採用</li>
						<li>認証には「MS-CHAP」と「EAP」が使用可能</li>
						<li>カプセル化プロトコルにはGREを採用<br /><small>PPPフレーム(PPPヘッダ・IPヘッダ・TCPヘッダ・データ)に「IPヘッダ」と「GREヘッダ」を付加してカプセル化します。</small></li>
					</ul>
				</td>
			</tr>
			<tr>
				<td>L2F</td>
				<td>シスコ社がCisco IOS上で実装したトンネリングプロトコルであり、認証と暗号化については PPPの機能を利用しています。</td>
			</tr>
			<tr>
				<td>L2TP</td>
				<td>前述したL2FとPPTPを統合したプロトコルです。<br />L2F同様にPPPパケットをトンネリングしますが、LT2P自体は暗号化機能を実装していないため、IPsecと併用する必要があります。<br /><br />具体的には、PPPフレーム(PPPヘッダ・IPヘッダ・TCPヘッダ・データ)を「L2PTヘッダ」によってカプセル化した後に「UDP」でカプセル化してIPヘッダを付加します。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>ホストの要塞化</h2>
ホストの部品(OS等のソフトウェア)に存在するセキュリティホール(プログラムのバグや設定ミスによって生じる情報セキュリティ上の欠陥のこと)を塞いで、堅牢な状態にすることを言います。<br /><br />具体的な手法として以下のものがあげられます。
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
<div class="explanation">
	<div class="title">パーティション</div>
	ハードディスク内のデータを保存するための区画のこと言います。<br /><br />最適なパーティション設計の基本思想としては、「用途や更新頻度が大きく異なるデータを同じパーティション内に保存しない」ことがあげられます。<br /><br />具体的には以下のようなパーティションを設計することが多いです。
	<ul>
		<li>カーネルの保存領域</li>
		<li>アプリケーションの保存領域</li>
		<li>ユーザーデータの保存領域</li>
		<li>ログの保存領域</li>
	</ul>
	RH社のwebページでは具体的に以下のパーティションを設計することを推奨しています。
	<div class="scroll-600w">
		<table>
			<tbody>
				<tr>
					<th>swap パーティション</th>
					<td>仮想メモリーをサポートします。</td>
				</tr>
				<tr>
					<th>/ boot パーティション</th>
					<td>ブートストラッププロセス中に使用されたファイルと共に、オペレーティングシステムカーネルが含まれます。</td>
				</tr>
				<tr>
					<th>/ パーティション</th>
					<td>/bootパーティションに保存されるファイルを除く全てのファイルを保存します。</td>
				</tr>
				<tr>
					<th>home パーティション</th>
					<td>システムデータとは別にユーザーデータを保存します。</td>
				</tr>
				<tr>
					<th>/boot/efi パーティション</th>
					<td>UEFIファームウェアを搭載するシステムの場合のみ用いられます。td>
				</tr>
			</tbody>
		</table>
		<p>引用元は<a href="https://access.redhat.com/documentation/ja-jp/red_hat_enterprise_linux/6/html/installation_guide/s2-diskpartrecommend-x86">こちら</a>。</p>
	</div>
</div>
<?php footer(); ?>