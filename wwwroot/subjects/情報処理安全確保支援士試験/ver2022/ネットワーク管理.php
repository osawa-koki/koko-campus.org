<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-20",
	"updated" => "2022-03-20"
);
head($obj);
?>
<p id="message">ここでは、ネットワーク管理のためのツールやネットワーク管理の仕組みについて学びます。<br /><br />それでは、Let's dance!!</p>
<h2>ネットワーク運用管理</h2>
ネットワークの運用管理は大きく3つに分類できます。
<ul>
	<li>構成管理</li>
	<li>障害管理</li>
	<li>性能管理</li>
</ul>
以下で簡単に説明しますね♪
<h3>構成管理</h3>
ネットワークの構成や構成機器のバージョンを管理します。
<h3>障害管理</h3>
以下の手順を踏みます。
<ol>
	<li>記録(ログ)</li>
	<li>情報収集</li>
	<li>障害の仕分け(分類)</li>
	<li>障害原因の特定</li>
	<li>復旧措置</li>
</ol>
<h3>性能管理</h3>
性能管理は主に「トラフィックの監視」から情報を得て、以下に掲げる負荷分散手法によってネットワークの性能を管理します。
<ul>
	<li>DNSラウンドロビン</li>
	<li>DNSゾーン転送</li>
</ul>
<div class="explanation">
	<div class="title">DNSラウンドロビン</div>
	予め<span class="underline">ひとつのドメイン名に複数のIPアドレスを割り当てて</span>おき、リクエストを各IPアドレス宛に分散送信することで負荷分散を実現します。
</div>
<div class="explanation">
	<div class="title">DNSゾーン転送</div>
	DNSサーバは故障しても問題なく動作し続けるように2台で構成されます。
	<p><a href="https://datatracker.ietf.org/doc/html/rfc2182">RFC2182</a>で規定されています。</p>
	このうち、メインとなるDNSサーバを「<span class="underline">プライマリサーバ</span>」、サブとなるDNSサーバを「<span class="underline">セカンダリサーバ</span>」よ呼びます。<br /><br /><br />この2台構成によって脆弱性が生じるので、これについて説明しますね♪<br /><br />セカンダリサーバが保持する情報をプライマリサーバが保持する情報を同じにする(同期させる)ために、セカンダリサーバはプライマリサーバに対して「<span class="underline">ゾーン転送要求</span>」を行います。<br />ここで用いられるポートは「53/TCP」ですが、通常のDNSサーバに対するポートは「53/DUP」が用いられ、特に対策をしなければセカンダリサーバ以外からのゾーン転送要求に応答してネットワーク構成情報を盗まれる危険性があります。
</div>
<h2>ネットワーク管理ツール</h2>
<h3>ping</h3>
「ICMP echo request」とも呼ばれ、主にネットワーク上のホストとの通信状態を把握する目的で使用されます。<br /><br />以下のコマンドで実行可能です。
<code class="shell">
	ping ホスト
</code>
<img src="../pics/ping.gif" alt="pingコマンド" />
<h3>ifconfig</h3>
ネットワークインタフェースの設定状況の表示・設定の変更用のコマンドです。<br /><br />最近は「ip」コマンドが使用されることが多くなっています。
<code class="shell">
	ipconfig /All
</code>
<img src="../pics/ipconfig.gif" alt="ipconfigコマンド" />
<h3>arp</h3>
IPアドレスからMACアドレスを特定するためのコマンドです。<br /><br />「arp」とコマンドプロンプトに入力すると、以下の内容が出力されます。
<ul>
	<li>インターネットアドレス(IPアドレス)</li>
	<li>物理アドレス(MACアドレス)</li>
	<li>種類</li>
</ul>
<code class="shell">
	arp -a
</code>
<img src="../pics/arp.gif" alt="arpコマンド" />
<h3>netstat</h3>
ホストのネットワーク接続状態やソケット・インターフェイスごとのネットワーク統計を得るためのコマンドです。<br />以下の情報を取得します。
<ul>
	<li>プロトコル種類</li>
	<li>ローカル(接続元)ホストのIPアドレスとポート名(番号)</li>
	<li>接続先ホスト名(IPアドレス)とポート名(ポート番号)</li>
	<li>現在の接続状況</li>
</ul>
<code class="shell">
	netstat -a
</code>
<img src="../pics/netstat.gif" alt="netstatコマンド" />
<h3>nslookup</h3>
DNSサーバと通信して名前解決を行うコマンドです。<br /><br />以下の情報を取得します。
<ul>
	<li>ドメイン名(サーバー)</li>
	<li>IPアドレス(Address)</li>
</ul>
<code class="shell">
	nslookup ホスト
</code>
<img src="../pics/nslookup.gif" alt="nslookupコマンド" />
デフォルトDNSサーバに登録されていないため、名前解決に失敗しています。
<h3>traceruote</h3>
特定の宛先までの経路を調べる時に使うコマンドです。
<code class="shell">
	traceroute ホスト
</code>
windowsの場合は「traceroute」ではなく、「tracert」とします。
<img src="../pics/traceroute.gif" alt="tracerouteコマンド" />
<h3>syslog</h3>
システムログまたはイベントメッセージをsyslogサーバに送信するためのコマンドです。
<h3>IPFIX</h3>
「IP Flow Information Export」の略で、ネットワークトラフィックの監視や分析に用いられる技術です。<br /><br /><a href="https://datatracker.ietf.org/doc/html/rfc7011">RFC7011</a>によって規格化されています。
<h2>SNMP</h2>
「Simple Network Management Protocol」の略で、TCP/IPネットワーク環境(ネットワークを構成する機器)を集中管理(監視・制御)するためのプロトコルです。<br /><br />以下の用語を覚えてくださいね♪
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>SNMPエージェント</th>
				<td>SNMPによって管理されるホストを言います。<br />異常が発生した場合にはSNMPマネージャに対してtrap要求を送信します。</td>
			</tr>
			<tr>
				<th>SNMPマネージャ<br />(SNMP管理ステーション)</th>
				<td>SNMPによって管理する側のホストを言います。</td>
			</tr>
			<tr>
				<th>MIB</th>
				<td>「Management Information Base」の略で、SNMPエージェントが持っている機器情報の集合体のことを言います。</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問20 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	SNMPv3で使われるPDUのうちのSNMPv2-Trap-PDUに関して、「<strong>事象の発生をエージェントが自発的にマネージャに知らせるために使用するもの</strong>」と説明しています。<br /><br />SNMPv2-Trap-PDU以外のメッセージについて簡単に説明しますね♪
	<ul>
		<li>GetRequest-PDU &#x1f8a7; マネージャからエージェントへの参照要求</li>
		<li>Response-PDU &#x1f8a7; エージェントからマネージャへの参照応答</li>
		<li>SetRequest-PDU &#x1f8a7; マネージャからエージェントへの設定要求</li>
	</ul>
</div>
<span id="href_sdn"></span>
<h2>仮想ネットワーク</h2>
前回の授業で<a href="通信プロトコル?to=href_vlan">VLAN</a>について学びましたね♪<br /><br />VLANは大規模なネットワークを仮想化しにくいという問題がありました。<br /><br />この問題を克服する技術がSDNです。<br />SDNは、「Software Defined Network」の略で、ネットワークの構成をソフトウェアで定めることを可能にする技術です。<br /><br />具体的にはOpenFlowと呼ばれる標準を使用することが多いです。
<div class="explanation">
	<div class="title">OpenFlow</div>
	ネットワーク機器を制御部分と転送部分に分けることで、ネットワークの構成をソフトウェアで定めることを可能にしています。<br /><br />ネットワークの制御機能を持つ機器を「<strong>OpenFlowコントローラ</strong>」、ネットワークの転送機能を持つ機器を「<strong>OpenFlowスイッチ</strong>」を呼びます。
</div>
<?php footer(); ?>