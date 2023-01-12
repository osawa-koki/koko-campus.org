<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-04-15",
	"updated" => "2022-04-15"
);
head($obj);
?>
<h2>応用情報技術者試験</h2>
IPAの説明では、「高度IT人材となるために必要な応用的知識・技能をもち、高度IT人材としての方向性を確立した者」とされています。<br /><br />簡単に説明すれば、ITのプロフェッショナルの一歩手前ということですね♪<br />この資格を持っていれば、PGSEとして仕事する上で求められる知識を有していると言えます。<br /><br />因みに、政府案件の受注条件に情報処理技術者試験の合格者数を指定している場合が多くありますが、その条件は応用情報技術者試験以上となっていることが多いです。<br /><br />応用情報技術者試験は、ITの世界を生きる上でかなり重宝する資格です。<br />是非合格して自分の知識を客観的にアピールしましょう♪<br /><br />それでは、Let's study!!
<img src="../pics/体系.png" alt="情報処理技術者試験の体系" />
<h2>概要</h2>
<div class="scroll-600w">
	<table>
		<tr>
			<th>難易度</th>
			<td>普通</td>
		</tr>
		<tr>
			<th>勉強時間</th>
			<td>200時間程度</td>
		</tr>
		<tr>
			<th>資格区分</th>
			<td>国家試験</td>
		</tr>
		<tr>
			<th>ホームページ</th>
			<td><a href="https://www.jitec.ipa.go.jp/1_11seido/ap.html">https://www.jitec.ipa.go.jp/1_11seido/ap.html</a></td>
		</tr>
		<tr>
			<th>テスト方式</th>
			<td>ペーパーテスト</td>
		</tr>
		<tr>
			<th>試験日</th>
			<td>4月・10月の第三日曜日</td>
		</tr>
		<tr>
			<th>合格率</th>
			<td>25%前後</td>
		</tr>
	</table>
</div>
<h2>出題範囲</h2>
<div id="index-subs_box">
	<div>
		<div>テクノロジ系</div>
		<div>
			<div>基礎理論</div>
			<div class="subjects-box">
				<a>基礎理論</a>
				<a>アルゴリズムとプログラミング</a>
			</div>
			<div>コンピュータシステム</div>
			<div class="subjects-box">
				<a>コンピュータ構成要素</a>
				<a>システム構成要素</a>
				<a>ソフトウェア</a>
				<a>ハードウェア</a>
			</div>
			<div>技術要素</div>
			<div class="subjects-box">
				<a>ヒューマンインタフェース</a>
				<a>マルチメディア</a>
				<a>データベース</a>
				<a>ネットワーク</a>
				<a>セキュリティ</a>
			</div>
			<div>開発技術</div>
			<div class="subjects-box">
				<a>システムの開発技術</a>
				<a>ソフトウェア開発管理技術</a>
			</div>
		</div>
	</div>
	<div>
		<div>マネジメント系</div>
		<div>
			<div>プロジェクトマネジメント</div>
			<div class="subjects-box">
				<a>プロジェクトマネジメント</a>
			</div>
			<div>サービスマネジメント</div>
			<div class="subjects-box">
				<a>サービスマネジメント</a>
				<a>システム監査</a>
			</div>
		</div>
	</div>
	<div>
		<div>ストラテジ系</div>
		<div>
			<div>システム戦略</div>
			<div class="subjects-box">
				<a>システム戦略</a>
				<a>システム企画</a>
			</div>
			<div>経営戦略</div>
			<div class="subjects-box">
				<a>経営戦略マネジメント</a>
				<a>技術戦略マネジメント</a>
				<a>ビジネスインダストリ</a>
			</div>
			<div>企業と法務</div>
			<div class="subjects-box">
				<a>企業活動</a>
				<a>法務</a>
			</div>
		</div>
	</div>	
</div>
<script charset="UTF-8" type="text/javascript">
	const pr = document.getElementById("index-subs_box"),
		a = pr.getElementsByTagName("a"),
		b = pr.getElementsByClassName("subjects-box");
	Array.from(a).forEach(e => {
		const name = e.textContent;
		e.setAttribute("href", name);
		e.classList.add("x");
	});
	let i;
	for (i = 0; i < b.length; i++) {
		b[i].style.backgroundColor = `hsla(${i * 360 / b.length}, 100%, 50%, 0.2)`
	}
</script>

























<?php footer(); ?>