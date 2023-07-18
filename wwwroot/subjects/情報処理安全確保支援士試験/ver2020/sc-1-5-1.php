<?php
require_once("common.php");
include_head("開発プロセス・手法");
?>

<div id = "main">
	<p id = "my_comment">僕、ひとりでプログラミングすることがほとんどなんですけど、過去に一度4人共同でプログラミングしたことがあるんです。<br><br>ひとりでプログラミングするのとは全く違うんですよね、、、<br>複数人が足並みをどう合わせるべきなのかが分からないんです、、、<br><br>企業でITエンジニアとして働く方は「チームでプログラミングする」機会が多いと思いますが、ここではその際に役に立つ知識について学びます。<br><br>それでは、Let's program!!</p>
	<h2>ソフトウェア開発モデル</h2>
		<h3>ウォーターフォールモデル</h3>
		<p>ウォーターフォール(滝)のように上から下に進めて行きます。<br>大規模なソフトウェア開発における事実上の標準です。</p>
		<h3>スパイラルモデル</h3>
		<p>計画・設計・プログラミング・テスト工程のサイクルを何度も繰り返します。</p>
		<h3>プロトタイプモデル</h3>
		<p>プロトタイプ(試作品)の作成・評価を繰り返します。</p>
		<div class = "separator"></div>
		<small>※詳細は<a href = "../../ip/ver5/management-4-9">こちら</a>。</small>
	<h2>アジャイル</h2>
	<p>アジャイル(agile)とは「機敏な」という意味で、以下の特徴を持ちます。</p>
	<ul>
		<li>イテレーション(短期間の開発サイクル)を繰り返す</li>
		<li>最終段階までの詳細な計画ではなく、1サイクル分の簡易な計画を策定</li>
		<li>開発サイクルごとに成果物をリリース</li>
	</ul>
	<p>IPAは変化が激しいこの社会においては従来の「ウォーターフォール型」から「アジャイル型」へとシフトしていく必要があると主張しています。<br><small>※引用元は<a href = "https://www.ipa.go.jp/files/000065601.pdf">こちら</a>。</small><br><br>以下でアジャイル型開発における12の基本原則を紹介しますね♪</p>
	<ol>
		<li>顧客最優先</li>
		<li>急な変更OK</li>
		<li>短期間で開発</li>
		<li>エンジニア×営業マン</li>
		<li>人を大切に</li>
		<li>対話が最高のコミュニケーション</li>
		<li>とりあえず動かす!</li>
		<li>持続可能な開発</li>
		<li>技術×意識</li>
		<li>シンプルに</li>
		<li>自己組織的なチームを組織する</li>
		<li>改善!!!</li>
	</ol>
	<small>※引用元は<a href = "https://agilemanifesto.org/iso/ja/principles.html">こちら</a>。</small><br><br>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問23 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		アジャイル開発のプラクティスであるふりかえり(レトロスペクティブ)を行う適切なタイミングとして、「<strong>各イテレーションの最後</strong>」と説明しています。
	</div>
	<br>以下でアジャイルの代表的な開発手法を紹介しますね♪
		<div class = "separator"></div>
		<h3>XP</h3>
		<p>プロジェクトが途中で変更されることを前提として、この変化に対応するためのプラクティスです。<br><br>5つの価値と19個のプラクティスからなります。</p>
		<ol>
			<li>コミュニケーション</li>
			<li>シンプル</li>
			<li>フィードバック</li>
			<li>勇気</li>
			<li>尊重</li>
		</ol>
		<ol>
			<li>反復</li>
			<li>共通の用語</li>
			<li>オープンな作業空間</li>
			<li>回顧</li>
			<li>テスト駆動開発</li>
			<li>ペア・プログラミング</li>
			<li>リファクタリング</li>
			<li>コードの共有所有</li>
			<li>継続的インテグレーション</li>
			<li>YAGNI</li>
			<li>責任の受け入れ</li>
			<li>援護</li>
			<li>四半期ごとの見直し</li>
			<li>ミラー</li>
			<li>持続可能なペース</li>
			<li>ストーリーの作成</li>
			<li>リリース計画</li>
			<li>受け入れテスト</li>
			<li>頻繁なリリース</li>
		</ol>
		<small>※引用元は<a href = "https://tracpath.com/works/devops/xp_extreme_programming/">こちら</a>。</small>
		<p class = "explanation">
			<span class = "underline">YAGNI</span>とは、、、<br><br>
			「You Aren't Going to Need It」の略で、今必要とされている機能に絞って実装することを言います。
		</p>
		<div class = "exam">
			&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問23 &#9836;&#9836;&#9836;
			<div class = "separator"></div>
			XPにおけるテスト駆動開発の特徴として「<strong>プログラムを書く前にテストコードを記述する</strong>」ことを挙げています。
		</div>
		<h3>スクラム</h3>
		<p>チームで開発することに重点を置いた開発手法です。<br><br>スプリントと呼ばれる短い開発スパンを繰り返しながらソフトウェアを開発します。</p>
	<h2>CMMI</h2>
	<p>「Capability Maturity Model Integration」の略で、「能力成熟度モデル統合」と訳されます。<br><br>システム開発を行う組織がプロセス改善を行うためのガイドラインとなります。<br><br>評価モデルは「段階表現」と「連続表現」の2つ存在します。</p>
	<div class = "scroll_x">
		<table border = "1" class = "norble" id = "cmmi_table">
			<thead>
				<tr>
					<th>レベル</th>
					<th>段階表現<br>(成熟度レベル)</th>
					<th>連続表現<br>(能力レベル)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>レベル0</td>
					<td>-----</td>
					<td>不完全な</td>
				</tr>
				<tr>
					<td>レベル1</td>
					<td>初期</td>
					<td>実施された</td>
				</tr>
				<tr>
					<td>レベル2</td>
					<td>管理された</td>
					<td>管理された</td>
				</tr>
				<tr>
					<td>レベル3</td>
					<td>定義された</td>
					<td>定義された</td>
				</tr>
				<tr>
					<td>レベル4</td>
					<td>定量的に管理された</td>
					<td>-----</td>
				</tr>
				<tr>
					<td>レベル5</td>
					<td>最適化している</td>
					<td>-----</td>
				</tr>
			</tbody>
		</table>
	</div>
	<small>※CMMIのモデルを使って組織のプロセスの状況を診断することを<strong>アプレイザル</strong>と言います。</small>

	<h2></h2>
</div>

<?php
include_footer();
?>