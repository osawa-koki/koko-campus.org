<?php
require_once("common.php");
include_head("情報セキュリティ管理");
?>

<div id = "main">
	<p id = "my_comment">今回からは、環境面・経営面からのセキュリティについて説明しますね♪<br><br>僕は技術面ではないこの分野を最初は軽視していたんですけど、勉強していくにつれて重要性を認識しました♪<br>ぜひ具体的なイメージをしながら勉強してくださいね♪<br><br>それでは、Let's shine!!</p>

	<h2>情報セキュリティ管理</h2>
	<p>一番最初の授業で「セキュリティ」について学びましたね♪<br><br>今回はセキュリティを継続的に確保するための考え方を学びます。<br><br>最初に情報セキュリティ対策における基本的な考え方を復習しますね♪</p>
	<ol>
		<li>リスクアセスメントを行う。</li>
		<li>情報資産を特定します。</li>
		<li>脅威を把握します。</li>
		<li>脆弱性を把握します。</li>
		<li>情報セキュリティポリシを策定します。</li>
	</ol>
	<p>以下で情報セキュリティポリシについて説明します。</p>
	<h2>情報セキュリティポリシに基づく情報の管理</h2>
	<p>情報セキュリティポリシとは組織の情報資産を守るための方針や基準を明確化したものを言います。</p>
	<div id = "pyramid_container">
		<ol id = "policy" class = "pyramid">
			<li id = "py0">情報セキュリティ基本方針</li>
			<li id = "py1">情報セキュリティ対策基準</li>
			<li id = "py2">情報セキュリティ対策実施手順・規定</li>
		</ol>
		<div id = "pypy0"></div>
		<span id = "pypy1">情報セキュリティ<br class = "w"/>ポリシ</span>
	</div>
	<p>「情報セキュリティ基本方針」と「情報セキュリティ対策基準」を合わせて「<span class = "underline">情報セキュリティポリシ</span>」と言います。</p>
	<p id = "policy_p"></p>
	<div class = "margin"></div>
	<p>情報セキュリティポリシを策定する利点として、一般的に情報セキュリティレベルの向上を思うかべる人が多いと思いますが、それ以外にもリスクに対するセキュリティ効果の上昇(費用対効果の向上)や対外的な信頼性の向上があります。<br><br>情報セキュリティポリシを策定するに際しては以下の点に留意する必要があります。</p>
	<ul>
		<li>対象とする情報資産の明確化</li>
		<li>運用対象者の明確化</li>
		<li>目的の明確化</li>
		<li>罰則の明確化</li>
		<li>曖昧な表現の排除</li>
		<li>主体の明確化</li>
		<li>具体的な運用方法の明示</li>
	</ul>
	<!-- 物理的資産，ソフトウェア資産，人的資産（人，保有する資格・技能・経験），無形資産，サービス -->
	<h2>情報資産</h2>
	<p>情報資産とは名前の通り情報の資産を指しますが、形のない資産(無形資産)ですので一般的な資産とは管理が異なります。<br><br>無形資産の管理には以下の手順を踏むことが多いです。</p>
	<ol>
		<li>情報資産の洗い出し<br><small>(情報資産台帳の作成)</small></li>
		<li>情報資産の分類<br><small>(機密性による分類・完全性による分類・可用性による分類etc...)</small></li>
		<li>情報資産のラベル付け</li>
		<li>情報資産の取り扱い方法の明確化</li>
	</ol>
	<span id = "href_risk-management"></span>
	<h2>リスクマネジメント</h2>
	<p>「ISO 37000」「JIS 37000」によって標準化されています。<br><br>リスクマネジメントは以下の4ステップを踏みます。</p>
	<ol>
		<li>リスクアセスメント</li>
		<li>リスク対応方法の洗い出し</li>
		<li>リスク対応方法の実施</li>
		<li>リスク・リスク対応方法の見直し</li>
	</ol>
	<p>次に、「3」で示したリスク対応方法について説明しますね♪</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>リスク対応方法</caption>
			<tbody>
				<tr>
					<th>リスク低減</th>
					<td>別名、「リスクコントロール」です。<br>潜在的なリスクに対して物理的・技術的・運用的な対策を実施することでリスクの発生確率を低くします。</td>
				</tr>
				<tr>
					<th>リスク分散</th>
					<td>別名、「リスクファイナンシング」です。<br>いわゆる保険ですね。<br>リスクが顕在化して損失が発生した場合に備えて、その対応費用を予め確保しておくことを言います。</td>
				</tr>
				<tr>
					<th>リスク回避</th>
					<td>リスクの発生の根本原因を排除します。</td>
				</tr>
				<tr>
					<th>リスク受容</th>
					<td>リスク低減・リスク分散・リスク回避でも対処しきれないリスク(残余リスク)は受け入れます。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- 監視 -->
	<span id = "href_incident"></span>
	<h2>情報セキュリティ事象</h2>
	<p>情報セキュリティを脅かす危険性がある事象のことを言います。<br><br>情報セキュリティ事象の中でも事故(インシデント)として認識されるものは「情報セキュリティインシデント」と呼ばれます。</p>
	<h2>セキュリティエコノミズム</h2>
	<p>情報セキュリティに関連する事象に対して、社会科学的な観点からの取り組み全般を呼びます。<br><small>※引用元は<a href = "https://www.ipa.go.jp/security/economics/index.html">こちら</a>。</small></p>

	<h2></h2>
</div>


<?php
include_footer();
?>