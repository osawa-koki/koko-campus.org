<?php
require_once("common.php");
include_head("攻撃の準備");
?>

<div id = "main">
	<p id = "my_comment">第六弾に及ぶ攻撃方法シリーズ疲れ様でした。<br><br>今回は実際に攻撃を行うためにクラッカーがよく行う準備について学びます。<br><br>それでは、Let's hop!</p>

	<h2>フットプリンティング</h2>
	<p>攻撃者が攻撃を行う前に標的のコンピュータ・ネットワークに対して、脆弱性や攻撃の足掛かりを得るための事前準備のことを指します。<br><br>具体的に以下の行為が該当します。</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>フットプリンティングに用いられる行為</caption>
			<tbody>
				<tr>
					<th>whoisデータベース</th>
					<td>jpドメインの管理を担当しているjprsからドメインに関する情報を収集します。<br><small>※whoisへのリンクは<a href = "https://whois.jprs.jp/">こちら</a>。</small></td>
				</tr>
				<tr>
					<th>dnsmap</th>
					<td>特定ドメインからサブドメイン情報を取得します。</td>
				</tr>
				<tr>
					<th>nmap</th>
					<td>ネットワーク上のホストに関する情報を取得します。(<strong>N</strong>etwork <strong>Map</strong>per)<br>後述するポートスキャンに用いられます。</td>
				</tr>
				<tr>
					<th>traceroute</th>
					<td>IPネットワークにおいて、ノードまでの経路情報を取得します。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>ポートスキャン</h2>
	<p>ターゲットとなるホスト上で開いている(通信可能な)ポートをスキャンします。<br><br>TCPコネクションを確立するタイプのポートスキャンでは、ターゲットホストが返すバナー情報からそのポートが提供するアプリケーションの種類やそのバージョン・OSの種類やバージョンまで確認することができる。<br>ポートスキャンでは前述したnmapが用いられることが多いです。</p>
	<div class = "step">
		<ul>
			<li>不要なポート閉める。</li>
		</ul>
		以下に列挙するポートは特段の事情がない限り閉めるべきです。
		<div class = "scroll_x">
			<table border = "1" id = "portscan_table">
				<caption>非公開にすべきサービス・ポート</caption>
				<thead>
					<tr>
						<th>サービス名</th>
						<th>ポート番号</th>
						<th>概要</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>telnet</th>
						<th>23</th>
						<td>Telnet</td>
					</tr>
					<tr>
						<th>tftp</th>
						<th>69</th>
						<td>簡易FTP</td>
					</tr>
					<tr>
						<th>pop3</th>
						<th>110</th>
						<td>メール受信</td>
					</tr>
					<tr>
						<th>sunrpc</th>
						<th>111</th>
						<td>SUN Remote Procedure Call</td>
					</tr>
					<tr>
						<th>epmap</th>
						<th>135</th>
						<td>RPC (DCE準拠)</td>
					</tr>
					<tr>
						<th>netbios-ns</th>
						<th>137</th>
						<td>NETBIOS名前サービス</td>
					</tr>
					<tr>
						<th>netbios-dgm</th>
						<th>138</th>
						<td>NETBIOSデータ通信</td>
					</tr>
					<tr>
						<th>netbios-ssn</th>
						<th>139</th>
						<td>NETBIOSセッション管理</td>
					</tr>
					<tr>
						<th>snmp</th>
						<th>161</th>
						<td>SNMP (通常)</td>
					</tr>
					<tr>
						<th>snmptrap</th>
						<th>162</th>
						<td>SNMP (異常報告)</td>
					</tr>
					<tr>
						<th>microsoft-ds</th>
						<th>445</th>
						<td>ダイレクトホスティングSMBサービス</td>
					</tr>
					<tr>
						<th>rexec</th>
						<th>512</th>
						<td>リモートコマンド実行(UNIX系)</td>
					</tr>
					<tr>
						<th>rlogin</th>
						<th>513</th>
						<td>リモートログイン(UNIX系)</td>
					</tr>
					<tr>
						<th>rsh</th>
						<th>514</th>
						<td>リモートシェル (TCP)</td>
					</tr>
					<tr>
						<th>syslog</th>
						<th>514</th>
						<td>システムログ (UDP)</td>
					</tr>
					<tr>
						<th>nfs</th>
						<th>2049</th>
						<td>Network File System (SM)</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<p>不要なポートを開けておくことは攻撃者に情報を盗まれるだけでなく、セキュリティ意識が低いと思われてクラッキング対象になりやすいです。<br><br>以下で、ポートスキャンの仕組みについて説明しますね♪<br><br><br><span class = "underline">TCPコネクトスキャン</span><br><br>3ウェイハンドシェイクによってコネクションを確立できるかどうかを確認します。<br>実際にコネクションを確立するため、サーバのログ分析によってポートスキャンを受けたことを確認できます。<br><br><br><span class = "underline">SYNスキャン</span><br><br>別名、「TCPハーフスキャン」です。<br>3ウェイハンドシェイクの最初のSYNパケットを送った後の応答によって判断します。<br>応答が「SYN/ACK」ならばアクティブ、応答が「RST/ACK」ならば非アクティブであると判断します。<br><br>コネクションは確立せず、サーバのログには残らないため「ステルススキャン」とも呼ばれます。<br><small>※「stealth」: 「こっそりと」の意。</small><br><br><br><span class = "underline">UDPスキャン</span><br><br>UDPパケットを標的ホストに送信して、何も返ってこなければアクティブ、「ICMP port unreachable」が返ってくれば非アクティブと判断します。</p>
	<h2></h2>
</div>


<?php
include_footer();
?>