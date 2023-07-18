<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-23",
	"updated" => "2022-03-23"
);
head($obj);
?>
<p id="message">今回からはシステム開発技術について学びます。と同時にシステム開発技術の最終回です、、、<br /><br />シラバスに沿って進めていたら分類が適切ではなくなってしまいました、、、<br /><br />それでは、Let's smile!!</p>
<h2>V字開発モデル</h2>
システム開発をする際には、設計段階においては大きな単位から小さな単位へ分解して、テスト段階においては小さな単位を大きな単位へまとめあげていいます。<br /><br />この流れを「V字開発モデル」と呼びます。
<svg class="max-500w" version="1.1" viewBox="0 0 600 700" xmlns="http://www.w3.org/2000/svg">
	<path d="m96.924 22.652 211.47 642.25 211.46-642.25" fill="none" stroke="#000" stroke-width="10"/>
	<g id="v-boxes">
		<g>
			<rect x="14.015" y="55.5" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="72.647" y="79.777" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">システム要件定義</text>
		</g>
		<g>
			<rect x="14.015" y="155.76" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="72.612" y="180" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">システム方式設計</text>
		</g>
		<g>
			<rect x="14.015" y="256.01" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="54.331" y="280.29" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア要件定義</text>
		</g>
		<g>
			<rect x="14.015" y="356.27" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="54.295" y="380.51" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア方式設計</text>
		</g>
		<g>
			<rect x="12.675" y="456.52" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="52.955" y="480.87" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア詳細設計</text>
		</g>
		<g>
			<rect x="167.33" y="556.78" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="234.4" y="581.51" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">プログラミング</text>
		</g>
		<g>
			<rect x="323.31" y="456.52" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="355.36" y="480.83" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア単体テスト</text>
		</g>
		<g>
			<rect x="324.64" y="356.27" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="356.69" y="380.62" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア結合テスト</text>
		</g>
		<g>
			<rect x="324.64" y="256.01" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="329.69" y="280.43" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ソフトウェア適格性確認テスト</text>
		</g>
		<g>
			<rect x="324.64" y="155.76" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="375.01" y="180.11" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">システム結合テスト</text>
		</g>
		<g>
			<rect x="324.64" y="55.505" width="262.6" height="35.617" fill="#fff" stop-color="#000000" stroke="#00f" stroke-linecap="round" stroke-linejoin="round" stroke-width=".96451" style="paint-order:markers stroke fill"/>
			<text x="348.01" y="79.923" font-family="Consolas" font-size="18px" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">システム適格性確認テスト</text>
		</g>
	</g>
	<g id="arws" fill="#0f0" stroke-linecap="round" stroke-linejoin="round" stroke-width="7.4632">
		<path d="m317 466v19l-29-9z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m317 366v19l-29-9z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m317 265v19l-29-9z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m317 165v19l-29-9z" stop-color="#000000" style="paint-order:markers stroke fill"/>
		<path d="m317 64.2v18.9l-29-9.4z" stop-color="#000000" style="paint-order:markers stroke fill"/>
	</g>
</svg>
<div id="v-model-button" class="button">次へ</div>
<div id="v-model-info" class="r-border"></div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const bx = Array.from(document.getElementById("v-boxes").children),
			info = document.getElementById("v-model-info"),
			arws = Array.from(document.getElementById("arws").children);
		function reset() {
			bx.forEach(e => {
				e.getElementsByTagName("rect")[0].style.stroke = "aqua";
				e.getElementsByTagName("text")[0].style.fill = "black";
			});
			arws.forEach(e => {
				e.style.fill = "lime";
			});
			info.innerHTML = "";
		}
		reset();
		let count = 0,
			x_lock = false;
		const message = [
			"システム全体が実現すべき要件を確認します♪",
			"システム要件定義を満たすための設計を最上位レベル(ハードウェア・ソフトウェアレベル)で決定します♪",
			"ソフトウェアに必要な機能・セキュリティ・外部インターフェースを決定します♪",
			"ソフトウェア要件を達成する手段を「方式」まで分解します♪<br />(ソフトウェア構造やデータベース構造を明確に!)",
			"ソフトウェアを小さな部品(モジュール)まで分解していきます♪",
			"実際にソースコードを入力していきます♪",
			"ソフトウェア単体(モジュール)が動くかどうかチェックします♪<br />(ソフトウェア詳細設計通りかどうかチェック)",
			"モジュールの組み合わせ(結合されたソフトウェア)が動くかどうかチェックします♪<br />(ソフトウェア方式設計通りかどうかチェック)",
			"モジュールの組み合わせ(結合されたソフトウェア)が動くかどうかチェックします♪<br />(ソフトウェア要件定義を満たしているかどうかチェック)",
			"モジュールの組み合わせ(結合されたソフトウェア)をさらに組み合わせてシステムを完成させます♪<br />(システム方式設計を満たしているかどうかチェック)",
			"システム全体が想定通りに動くかどうかチェック♪<br />(システム要件定義を満たしているかどうかチェック)"
		];
		document.getElementById("v-model-button").addEventListener("click", () => {
			if (!x_lock) {
				x_lock = true;
				const r = bx[count].getElementsByTagName("rect")[0],
					t = bx[count].getElementsByTagName("text")[0];
				try {
					bx[count - 1].getElementsByTagName("rect")[0].style.stroke = "aqua";
					bx[count - 1].getElementsByTagName("text")[0].style.fill = "black";
				} catch {}
				r.style.stroke = "blue";
				t.style.fill = "red";
				if (6 <= count) {
					try {
						arws[count - 7].style.fill = "lime";
					} catch {}
					arws[count - 6].style.fill = "red";
				}
				if (count !== bx.length - 1) {
					setTimeout(() => {x_lock = false;}, 300);
				} else {
					setTimeout(() => {
						reset();
						count = 0;
						x_lock = false;
					}, 5000);
				}
				info.innerHTML = message[count];
				count++;
			}
		});
	})();
</script>
以下では、左の部分のシステム要件定義からソフトウェア詳細設計までを上流工程、プログラミングと右の部分のソフトウェア単体テストからシステム適合性確認テストまでを下流工程と呼びます。
<h2>上流工程</h2>
IPAはDX化のレベル以下の3つに区別しています。
<ol>
	<li>置き換え段階(人の作業からITの利用へ)</li>
	<li>効率化段階(一度完成したITシステムをよりよく)</li>
	<li>競争力強化段階(now!!!)</li>
</ol>
<p>参考サイトは<a href="https://www.ipa.go.jp/files/000079352.pdf">こちら</a>。</p>
競争力強化段階においては、「<strong>攻めの上流工程</strong>」が大切とされ、ITシステム開発ではこの上流工程に関する知識が必要不可欠です。
<h3>システム要件定義</h3>
システム全体が実現すべき要件を確認する段階です。<br /><br />主に以下の内容を決定します。
<ul>
	<li>目標</li>
	<li>対象範囲</li>
	<li>能力(レスポンスタイム・スループット)</li>
</ul>
<h3>システム方式設計</h3>
システム要件定義を満たす仕組みを最上位レベル(ハードウェア・ソフトウェア)で決定します。<br /><br />主に以下の内容を決定します。
<ul>
	<li>冗長化・フォールトトレランス設計・サーバの機能配分</li>
	<li>外部パッケージを利用するか</li>
	<li>集中処理 or 分散処理(システムの処理方式)</li>
	<li>データベースの方式</li>
</ul>
<h3>ソフトウェア要件定義</h3>
ソフトウェアの構成を明確化すると同時に、機能やセキュリティの使用を確立します。<br /><br />主に業務モデルや論理データモデルを活用してシステムを構成するソフトウェアに求められる機能・能力・インターフェースを決定します。<br /><br />この段階では以下のことをします。
<ul>
	<li>サブシステム分割・仕様定義</li>
	<li>サブシステムインターフェース定義</li>
	<li>業務モデル・データモデルの設計</li>
	<li>セキュリティの設計</li>
	<li>保守性・移植性の考慮</li>
</ul>
また、業務分析や要件定義には以下の手法が用いられます。
<ul>
	<li>ヒアリング</li>
	<li>ユースケース</li>
	<li>モックアップ・プロトタイプ</li>
	<li>DFD</li>
	<li>E-R図</li>
	<li>UML</li>
</ul>
<h3>ソフトウェア方式設計</h3>
ソフトウェア要件を実現させるという「方式」を決定します。<br /><br />以下の内容が実行されます。
<ul>
	<li>インターフェースの最上位レベルの設計</li>
	<li>データベースの最上位レベルの設計</li>
	<li>ソフトウェア構造とコンポーネントの方式設計</li>
</ul>
<h3>ソフトウェア詳細設計</h3>
ソフトウェア方式設計を受けて実際にコンポーネント・モジュール単位まで分解します。
<h2>下流工程</h2>
<h3>プログラミング</h3>
モジュールまで分解した後は、実際にプログラムコードを記述します。<br /><br />モジュールまでの分解が適切であったかはこのモジュールの独立性によって判断されます。
<div class="explanation">
	<div class="title">モジュール独立性</div>
	他のモジュールからどのくらい独立しているかを表し、モジュール独立性が高いほど保守性が高くなるためよい設計であるといえます。<br /><br />モジュール独立性を表す指標として「強度」と「結合度」があります。<br /><br />よりよい設計のためには強度を高めて、結合度を低める必要があります。
</div>
<h3>ソフトウェア単体テスト</h3>
ソフトウェア単体(モジュール)で動作するかどうかをチェックします。
<h3>ソフトウェア結合テスト</h3>
複数のモジュールを組み合わせて正常に動作するかチェックします。
<h3>ソフトウェア適格性確認テスト</h3>
ソフトウェア要件定義を満たしているかどうかをチェックします。
<h3>システム結合テスト</h3>
システム全体として正常に動作するかチェックします。
<h3>システム適格性確認テスト</h3>
システム要件定義を満たしているかチェックします。
<?php footer(); ?>