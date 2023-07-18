<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-20",
	"updated" => "2022-03-20"
);
head($obj);
?>
<p id="message">今回はFWのお友達であるIDP・IPS・WAFについて学びます。それぞれの特徴と構成について理解してくださいね♪<br /><br />それでは、Let's dance!!</p>
<h2>IDS</h2>
「Intrusion Detection System」の略で、「侵入<span class="underline">検知</span>システム」と訳されます。<br /><br />目的としては、ネットワークやホストで発生している出来事をリアルタイムで監視して侵入を検知します。<br />一般的には、パケットを予めデータベースに登録された攻撃パターン(シグネチャ)と照合することで、攻撃を検知します。<br /><br />以下でIDSの攻撃の検知方法を2つ紹介します。
<div class="scroll-600w">
	<table>
		<caption>IDSの攻撃検知方法</caption>
		<tbody>
			<tr>
				<th>シグネチャ検知</th>
				<td>事前に攻撃パターン(シグネチャ)を登録しておき、それにマッチするパケットを見つけると攻撃の兆候として通知します。</td>
			</tr>
			<tr>
				<th>アノマリ検知</th>
				<td>シグネチャ検知とは逆で、正常なパケットから大きく逸脱する内容を含むパケットを異常を検知します。</td>
			</tr>
		</tbody>
	</table>
</div>
また、IDSは攻撃を検知すると以下の行動をとります。
<ul>
	<li>管理者コンソールにアラート通知</li>
	<li>syslogサーバへのメッセージ送信</li>
	<li>ログ出力</li>
	<li>SNMPトラップ</li>
	<li>プログラムの強制終了</li>
	<li>RSTパケットを送信してTCPコネクションを切断</li>
	<li>ICMP port unreachableを送信してUDP・ICMPを遮断</li>
	<li>認証の拒否</li>
	<li>ACLの動的変更</li>
	<li>アクセス権の変更</li>
</ul>
IDSはネットワーク上のパケットを監視するNIDSを特定のホスト上で発生している事象を監視をするHIDSの2つに分類されます。
<h2>NIDS</h2>
ネットワーク上を流れるパケットを監視して、予め設定されたルール基づいて攻撃を検知します。<br /><br />一般にNIDSの接続場所は以下のようになります。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>バリアセグメントに設置</th>
				<td>バリアセグメントに対する攻撃はFWで遮断されるため、特別な理由がない限りはバリアセグメントに設置されることはありません。</td>
			</tr>
			<tr>
				<th>DMZに接続</th>
				<td>FWを通過してDMZに到達した攻撃を検知することを目的とします。</td>
			</tr>
			<tr>
				<th>内部セグメントに接続</th>
				<td>LAN内まで到達した攻撃を検知します。</td>
			</tr>
		</tbody>
	</table>
</div>
また、NIDSの可能なことと問題点は以下の通りです。
<div class="scroll-600w">
	<table>
		<caption>IDSの特徴</caption>
		<tbody>
			<tr>
				<th>可能なこと</th>
				<td>
					<ul>
						<li>OSの脆弱性を突いた攻撃を検知</li>
						<li>ファイルの改竄を検知</li>
						<li>不正なアクセスを検知</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th>問題点</th>
				<td>
					<ul>
						<li>誤検知の存在</li>
						<li>高い処理能力が必要</li>
						<li>アプリケーションに対する攻撃は検知できない</li>
						<li>暗号化さえたパケットは解析不可</li>
						<li>不正アクセスの防御は不可</li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>
NIDSはセグメント間ではなくネットワーク内に設置される際は、プロミスキャスモードで全てのパケットを監視します。
<div class="explanation">
	<div class="title">プロミスキャスモード</div>
	プロミスキャスとは「promiscuous」(無差別な)の意味で、全ての電気的信号を上位で動作するソフトウェアに報告するモードを言います。<br /><br />通信インターフェースは通常では届いたパケットのうち自分に関係ないものは破棄するように設定されていますが、プロミスキャスモードでは自分に関係ないパケットも全て取得します。
</div>
<h2>HIDS</h2>
監視の対象となるホスト(webサーバ・DBサーバ・メールサーバ)にインストールして使用します。<br /><br />HIDSでは以下の項目を検知します。
<ul>
	<li>ログインの記録</li>
	<li>特権ユーザへの昇格</li>
	<li>システム管理者用のプログラムの起動</li>
	<li>設定ファイルへのアクセス</li>
	<li>プログラムのインストール</li>
	<li>ファイルの書き換え</li>
</ul>
<h2>IDSの構成</h2>
次はIDSをどのように設置するのかについて学びましょう♪
<div class="explanation">
	<div class="title">DMZと内部セグメントを監視</div>
	<div class="scroll-600w">
		<table>
			<tbody>
				<tr>
					<th>HIDS</th>
					<td>DMZ上のサーバを監視</td>
				</tr>
				<tr>
					<th>NIDS</th>
					<td>スイッチのミラーポートに接続</td>
				</tr>
				<tr>
					<th>マネジメントコンソール</th>
					<td>内部セグメントに設置され、IDSとはSSL等の暗号化通信を実施</td>
				</tr>
				<tr>
					<th>留意点</th>
					<td>
						<ul>
							<li>FWはIDSとマネジメントコンソール間の通信に必要なポートを開ける必要あり</li>
							<li>NIDSが攻撃対象とならないようにNIDSにはIPアドレスを割り当てない</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="explanation">
	<div class="title">スイッチ接続</div>
	<div class="scroll-600w">
		<table>
			<tbody>
				<tr>
					<th>HIDS</th>
					<td>内部セグメント上のサーバに設置</td>
				</tr>
				<tr>
					<th>NIDS</th>
					<td>スイッチのミラーポートに接続</td>
				</tr>
				<tr>
					<th>マネジメントコンソール</th>
					<td>内部セグメントに設置</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="explanation">
	<div class="title">TAP接続</div>
	TAPとは、2台のネットワーク機器間の全二重の両リンクのトラフィックをL1でスイッチやIDSに送り込む機器を言います。
	<div class="scroll-600w">
		<table>
			<tbody>
				<tr>
					<th>HIDS</th>
					<td>内部セグメント上のサーバに設置</td>
				</tr>
				<tr>
					<th>NIDS</th>
					<td>TAPからのトラフィックを受けるスイッチのミラーポートに接続</td>
				</tr>
				<tr>
					<th>マネジメントコンソール</th>
					<td>内部セグメントに設置</td>
				</tr>
				<tr>
					<th>特徴</th>
					<td>L1で動作するため、NIDSの存在を完全に隠蔽することが可能</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="explanation">
	<div class="title">LB接続</div>
	<div class="scroll-600w">
		<table>
			<tbody>
				<tr>
					<th>HIDS</th>
					<td>内部セグメント上のサーバに設置</td>
				</tr>
				<tr>
					<th>NIDS</th>
					<td>SSLアクセラレータ機能を持つLBに接続</td>
				</tr>
				<tr>
					<th>マネジメントコンソール</th>
					<td>内部セグメントに設置</td>
				</tr>
				<tr>
					<th>特徴</th>
					<td>HTTPS通信も監視することが可能</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<h2>IPS</h2>
「Intrusion Prevention System」の略で「侵入<span class="underline">防御</span>システム」と訳されます。<br /><br />IDSの問題と指摘されていた「不正アクセスの遮断が困難である点」「インライン接続でないた攻撃を確実に遮断すことができない点」を克服したIDSの進化バージョンです。<br /><br />IPSの接続方法には以下の2つがあります。
<ul>
	<li>プロミスキャスモードでの接続<br /><small>(防御レベルはIDSの同様です。)</small></li>
	<li><span class="underline">インラインモードでの接続</span><br /><small>(効果は高い反面、処理が大きくなりがちです。)</small></li>
</ul>
<span class="underline">インライン接続でない場合は、不正を検知できても最初の侵入は防御できないため一般に危険であると言えます。</span><br /><br />IPSの構成として以下のものがあげられます。
<ul>
	<li>DMZに設置</li>
	<li>セグメント間に設置(拠点間接続)</li>
	<li>内部セグメントの各部門への入口ごとに設置</li>
</ul>
<h2>WAF</h2>
webアプリケーションFWのことを指し、XSS・SQLインジェクション・OSコマンドインジェクションなどのwebアプリケーションに対する攻撃を検知・遮断します。<br /><br />WAFには以下の種類があります。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>リバースプロキシ型</th>
				<td>
					インターネットから内部サーバへのアクセスを中継する形で操作するWAFで、最も一般的な形態です。<br />以下で単にWAFというときは、このリバースプロキシ型を指します。
					<p>ちなみにリバースではないプロキシはフォワードプロキシと呼ばれ、内部からインターネット方法の通信を中継します。</p>
			</tr>
			<tr>
				<th>ブリッジ型</th>
				<td>ブリッジ(L2の中継機器)として機能するWAFを言います。</td>
			</tr>
			<tr>
				<th>ソフトウェア型</th>
				<td>webサーバのプラグインとしてインストールして使用されます。</td>
			</tr>
		</tbody>
	</table>
</div>
WAFは次のチェックを行います。
<ul>
	<li>接続元ホストのチェック</li>
	<li>HTTPリクエストのチェック</li>
	<li>クエリストリングのチェック</li>
	<li>HTTPヘッダのチェック</li>
	<li>POSTデータのチェック</li>
	<li>Cookie内容のチェック</li>
</ul>
また、WAFは以下の機能を備えていることが多いです。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>SSLアクセラレータ機能</th>
				<td>SSL/TLSで暗号化されたHTTPS通信を復号してチェックを行うことが可能です。<br /><br />また、webサーバの負荷の軽減にも貢献します。</td>
			</tr>
			<tr>
				<th>負荷分散機能</th>
				<td>webサーバに対するロードバランサとしても機能します。</td>
			</tr>
			<tr>
				<th>Passiveモード</th>
				<td>インライン接続モードを採用する際に、発信元の情報をWAFに置き換えずに発信者の情報をそのまま引き継ぐことが可能です。</td>
			</tr>
		</tbody>
	</table>
</div>
次にWAFの構成例を紹介しますね♪
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>DMZに接続</th>
				<td>FWによってHTTP(S)通信は全てWAFを中継する用設定し、WAFはwebサーバに対するリバースプロキシとして動作します。</td>
			</tr>
			<tr>
				<th>LB併設</th>
				<td>SSLアクセラレータ機能を持ったLBにWAFを接続し、WAFはwebサーバに対するリバースプロキシとして動作します。</td>
			</tr>
			<tr>
				<th>LB兼用</th>
				<td>WAFがリバースプロキシとしての役割だけでなく、SSLアクセラレータが行っていた復号機能も担当します。</td>
			</tr>
		</tbody>
	</table>
</div>
<?php footer(); ?>