<?php
require_once("common.php");
include_head("システム監査");
?>

<div id = "main">
	<p id = "my_comment">長かったですね、、、<br>今回が情報処理安全確保支援士試験AM対策の最終弾です。<br><br>それでは、Let's jump!!</p>
	<h2>監査</h2>
	<p>統制(コントロール)が適切に存在・機能しているかどうかを評価することを言います。</p>
	<h2>統制</h2>
	<svg
		id="control_svg"
		viewBox="0 0 159 106"
		version="1.1"
		xmlns="http://www.w3.org/2000/svg"
		xmlns:svg="http://www.w3.org/2000/svg">
		<rect
			width="35.8"
			height="3.02"
			x="-15"
			y="62"
			class="line"
			transform="rotate(-42.9)" />
		<rect
			width="35.8"
			height="3.02"
			x="57.4"
			y="-15.3"
			class="line"
			transform="matrix(0.733,0.681,0.681,-0.733,0,0)" />
		<rect
			width="35.8"
			height="3.02"
			x="35"
			y="82.6"
			class="line"
			transform="rotate(-42.9)" />
		<rect
			width="35.8"
			height="3.02"
			x="80.8"
			y="33.1"
			class="line"
			transform="matrix(0.733,0.681,0.681,-0.733,0,0)" />
		<rect
			width="33.8"
			height="12.2"
			x="5.38"
			y="46.5"
			class="control_box" />
		<rect
			width="33.8"
			height="12.2"
			x="55"
			y="28.2"
			class="control_box" />
		<rect
			width="33.8"
			height="12.2"
			x="55"
			y="64.8"
			class="control_box" />
		<rect
			width="33.8"
			height="12.2"
			x="105"
			y="10.3"
			class="control_box" />
		<rect
			width="33.8"
			height="12.2"
			x="105"
			y="44.6"
			class="control_box" />
		<text
			x="15"
			y="55">監査
		</text>
		<text
			x="60"
			y="35">内部統制
		</text>
		<text
			x="60"
			y="73">外部統制
		</text>
		<text
			x="112"
			y="18">会計統制
		</text>
		<text
			x="112"
			y="52">業務統制
		</text>
	</svg>
	<h2>内部統制</h2>
	<p>金融庁の「財務報告に係る内部統制の評価及び監査の基準」では、以下の6個の基本適用をを挙げています。<br><small>※ITへの対応を除いた5個は「COSOフレームワーク」と呼ばれます。</small></p>
	<ol>
		<li>統制環境</li>
		<li>リスクの評価と対応</li>
		<li>統制活動</li>
		<li>情報と伝達</li>
		<li>モニタリング</li>
		<li>ITへの対応</li>
	</ol>
	<h2>CSA</h2>
	<p>「Control Self Assessment」の略で、「統制自己評価」と訳されます。<br><br>内部統制の状況をよく知る担当者が評価・自立的に改善する手法を言います。</p>
	<h2>ITガバナンス</h2>
	<p>企業が競争力を高めることを目的に情報システムを策定して、戦略実行を統制する仕組みを確立するための取り組みを言います。</p>
		<div class = "separator"></div>
		<h3>JIS Q 38500</h3>
		<p>経営者が効果的・効率的にITを利用するための規格です。<br><br>組織によって使われるITサービスに関係したマネジメントプロセス及び意思決定のガバナンスに適用されます。</p>
		<h3>EDMモデル</h3>
		<p>ITガバナンスを実施する経営者の役割を定めたもので、以下の3つからなります。</p>
		<ul>
			<li>E(Evaluate)・・・評価</li>
			<li>D(Direct)・・・指示</li>
			<li>M(Monitor)・・・モニタ</li>
		</ul>
		<div class = "exam">
			&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問7 &#9836;&#9836;&#9836;
			<div class = "separator"></div>
			JIS Q 27014におけるITガバナンスのモニタに関して、「<strong>戦略的目的の達成を評価することを可能にするガバナンスプロセス</strong>」と説明しています。
		</div>
	<h2>システム監査の手順</h2>
	<p>システム監査の手順について学びましょう♪</p>
	<ol>
		<li>監査計画<br><small>(中長期計画・基本計画・個別計画)</small></li>
		<li>監査実施<br><small>(予備調査・本調査・評価・結論)</small></li>
		<li>監査報告</li>
		<li>フォローアップ</li>
	</ol>
	<p>次にシステム監査に関連する用語を説明しますね♪</p>
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>監査調書</th>
					<td>システム監査人の監査意見の正当性を証明するための証拠で、システム監査全体を通じて得た文書の総称です。<br>下の監査証拠が代表的な監査証拠です。</td>
				</tr>
				<tr>
					<th>監査証拠</th>
					<td>代表的な監査調書で、物理的・文書的・口頭的証拠全てを含みます。</td>
				</tr>
				<tr>
					<th>監査手続き</th>
					<td>監査証拠を入手するための手順を言います。</td>
				</tr>
				<tr>
					<th>監査証跡</th>
					<td>一連の処理過程を途中で確認するための仕組みを言います。</td>
				</tr>
			</tbody>
		</table>
	</div>

	<h2></h2>
</div>

<?php
include_footer();
?>