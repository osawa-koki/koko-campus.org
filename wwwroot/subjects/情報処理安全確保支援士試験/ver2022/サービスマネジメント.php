<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-23",
	"updated" => "2022-03-23"
);
head($obj);
?>
<p id="message">テクノロジの学習お疲れさまでした!!!<br /><br />今回からマネジメントに入ります。<br /><br />それでは、Let's dance!!</p>
<h2>ITIL</h2>
「Information Technology Infrastructure Library」の略で、英国商務局(CCTA)が発行した「<strong>ITサービスマネジメントにおける業務プロセスや管理手法を体系的に整理した書籍群</strong>」を言います。<br />「ISO/IEC 20000」によって標準化されています。<br /><br />2021年9月時点での最新版は「3」で、各プロセスに着目した「2」と異なり「3」では、<strong>サービスのライフサイクル</strong>に着目しています。
<h3>ITIL2</h3>
各「<strong>プロセス</strong>」に着目しています。<br /><br />以下の7つの書籍群からなります。
<ol>
	<li>サービスサポート</li>
	<li>サービスデリバリ</li>
	<li>ICT基盤管理</li>
	<li>セキュリティ管理</li>
	<li>ビジネスの観点</li>
	<li>アプリケーション管理</li>
	<li>サービスマネジメント導入規格</li>
</ol>
<h3>ITIL3</h3>
「<strong>サービスのライフサイクル</strong>」に着目しています。<br /><br />以下の5つの書籍群からなります。
<ol>
	<li>サービス戦略</li>
	<li>サービス設計</li>
	<li>サービス移行</li>
	<li>サービス運用</li>
	<li>サービスの継続的向上</li>
</ol>
ISMS適合性評価制度と同様にITSMS適格性評価制度が存在します。(2006年～)
<h2>変更管理</h2>
ITインフラに変更の必要性が生じた際に無秩序に変更を行うとトラブルにつながるおそれがあります。<br /><br />そのためITインフラを変更する場合にはRFC(Request For Change)と呼ばれる文書を変更マネージャに提出します。<br /><br />提出されたRFCはCAB(変更諮問委員会)によって計画立案が行われます。
<h2>JIS Q 9001</h2>
組織がQMS(品質マネジメントシステム)の有効性を継続的に改善するために用いられます。<br /><br />以下の便益があげられます。
<ul>
	<li>継続的に法令等を遵守した製品・サービスを提供</li>
	<li>顧客満足を向上</li>
	<li>組織の状況及び目標に関連したリスク及び機会に取り組む</li>
	<li>規定された品質マネジメントシステム要求事項へ適合</li>
</ul>
<!-- サービス可用性管理(mtbf・mttr) -->
<h2>サービス継続管理</h2>
情報セキュリティ継続の授業で<a href="情報セキュリティ継続?to=href_cbm-bcp">BCM・BCP</a>について学びましたね♪<br /><br />災害が生じてもBCMによって事業を継続することを言います。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>RTO</th>
				<td>「Recovery Time Objective」の略で、「目標復旧時間」と訳されます。<br />業務中断後、いつまでに業務を復旧させるかを設定します。</td>
			</tr>
			<tr>
				<th>目標復旧レベル</th>
				<td>前述したRTO内にどのレベルまで業務を復旧させるかを示します。</td>
			</tr>
			<tr>
				<th>RPO</th>
				<td>業務中断時点から遡ってどの時点の状態まで戻すのかを設定します。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>COBIT</h2>
「Control Objectives for Information and related Technology」の略で、ITガバナンス及びITマネジメントに関する実践規範です。<br />ISACAとITGIによって策定されました。<br /><br />2021年9月時点においてCOBIT5が最新版です。<br />COBIT4とCOBIT5について簡単に説明します。
<h3>COBIT4</h3>
各プロセスについて「CSF」「KGI」「KPI」を定義して、その成熟度を評価します。(成熟度モデル)
<h3>COBIT5</h3>
「ISO/IEC 15504」(プロセスマネジメントに関する規格)に基づいた<strong>プロセス能力モデル</strong>によって、組織のITガバナンスとITマネジメントにおける目標達成度を評価します。
<?php footer(); ?>