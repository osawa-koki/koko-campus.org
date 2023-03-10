<?php
include("common.php");
head("引当金");
?>
<h2>引当金の概要</h2>
保守主義の原則に基づいて、将来の特定の費用・損失に対して予め計上する貸方科目を言います。<br>
<span class="r">
	!保守主義の原則!
	?財務諸表に計上する収益項目は少なく、費用項目は大きく把握することで慎重な会計処理を要求する原則を言います。?
</span><br>
引当金の要件としては以下の4つがあります。
<div class="f">
	!引当金の要件!
	<ol>
		<li>将来の特定の費用または損失であること</li>
		<li>発生が当期以前の事象に起因していること</li>
		<li>発生の可能性が高いこと</li>
		<li>金額を合理的に見積ることができること</li>
	</ol>
</div>
<h2>引当金の分類</h2>
引当金は資産の部に表示されるか負債の部に表示されるかによって「<strong>評価性引当金</strong>」と「<strong>負債性引当金</strong>」に分類されます。<br><br>貸倒引当金が代表的な評価性引当金で、それ以外の引当金は負債性引当金に分類されます。
<h2>引当金の種類</h2>
引当金には以下の種類があります。<br>
<ul>
	<li>貸倒引当金</li>
	<li>売上割戻引当金</li>
	<li>返品調整引当金</li>
	<li>修繕引当金</li>
	<li>賞与引当金</li>
	<li>退職給付引当金</li>
</ul><br>
引当金の処理は貸倒引当金と同様ですが、退職給付引当金は特別な処理を必要とします。
<h3>貸倒引当金</h3>
一番有名な引当金ですね♪<br>金銭債権に対して設定されます。<br><br>以下の処理をします。
<div class="t">
	!引当金設定時!
	貸倒引当金繰入30,貸倒引当金30
</div>
<div class="t">
	!貸倒時!
	貸倒引当金30,売掛金50
	貸倒損失20,
</div>
<h3>売上割戻引当金</h3>
当期販売分にかかる次期の売上割戻に備えて設定する引当金です。<br><br>処理は貸倒引当金と同様です。
<div class="t">
	!引当金設定時!
	売上割戻引当金繰入30,売上割戻引当金30
</div>
<div class="t">
	!売上割戻時!
	売上割戻引当金30,売掛金50
	仕入20,
</div>
<h3>返品調整引当金</h3>
当期販売分にかかる次期の返品に備えて設定する引当金です。<br><br>処理は貸倒引当金と同様です。
<div class="t">
	!引当金設定時!
	返品調整引当金繰入30,返品調整引当金30
</div>
<div class="t">
	!返品時!
	返品調整引当金30,売掛金50
	仕入20,
</div>
<h3>修繕引当金</h3>
当期販売分にかかる次期の修繕義務の発生に備えて設定する引当金です。<br><br>処理は貸倒引当金と同様です。
<div class="t">
	!引当金設定時!
	修繕引当金繰入30,修繕引当金30
</div>
<div class="t">
	!売上割戻時!
	修繕引当金30,現金50
	修繕費20,
</div>
<h3>賞与引当金</h3>
当期の労働にかかる次期の賞与の発生に備えて設定する引当金です。<br><br>処理は貸倒引当金と同様です。
<div class="t">
	!引当金設定時!
	賞与引当金繰入30,賞与引当金30
</div>
<div class="t">
	!売上割戻時!
	賞与引当金30,現金50
	賞与20,
</div>
<h3>退職給付引当金</h3>
少し特殊な会計処理を必要とします。<br><br>まずは退職給付引当金会計において用いられる用語を説明しますね♪
<table class="exp" border="1">
	<caption>退職給付引当金会計で用いられる用語</caption>
	<tbody>
		<tr>
			<th>退職給付</th>
			<td>従業員の退職時・退職後に支給される退職一時金・年金を言います。</td>
		</tr>
		<tr>
			<th>退職給付費用</th>
			<td>退職給付に関して発生する費用を言います。</td>
		</tr>
		<tr>
			<th>退職給付債務</th>
			<td>退職給付として従業員に支払う義務を持っている債務を言います。</td>
		</tr>
		<tr>
			<th>勤務費用</th>
			<td>退職給付費用のうち、勤務した分に対応するものを言います。<br>退職時の勤務費用を現在価値に割り引いて算出します。</td>
		</tr>
		<tr>
			<th>利息費用</th>
			<td>退職給付債務にかかる利息を言います。<br>「期首退職給付債務 &times; 割引率」で算出します。</td>
		</tr>
	</tbody>
</table>
<h4>退職給付費用の算出</h4>
「勤務費用 + 利息費用」を退職給付引当金として計上します。<br>相手科目は退職給付費用です。<br><br><span class="u">勤務費用は退職時の勤務費用を現在価値に割り引いて算出</span>し、<span class="u">利息費用は「期首退職給付債務 &times; 割引率」で算出</span>します。
<h4>年金資産の処理</h4>
退職給付の支給に備えて、外部の年金基金に年金資産として積み立てを行う場合の処理についてです。<br><br><span class="u">退職給付会計では、退職給付引当金は退職給付債務から年金資産を差し引いて算出します。</span>
<div class="f">
	!退職給付債務の算出!
	<strong>退職給付引当金 = 退職給付債務 - 年金資産</strong>
</div>
<h4>期待運用収益の計上</h4>
年金基金に預けた年金資産に関して発生する利息を言います。<br>「<strong>期待運用収益 = 期首年金資産 &times; 長期期待運用収益率</strong>」で算出し、算出された期待運用収益は<span class="u">退職給付引当金の減少</span>として処理します。
<div class="t">
	!期待運用収益の計上!
	@年金資産の額が500円、長期期待収益率が5%の場合の期待運用収益の計上方法は以下の通りです。@
	退職給付引当金25,退職給付費用25
</div>
<h4>退職給付の支給時の処理</h4>
他の引当金の処理と同様です。
<div class="t">
	!退職給付の支給時!
	退職給付引当金50,現金50
</div>
<h4>年金の支給時の処理</h4>
年金資産と退職給付債務が相殺するため仕訳は必要ありません。
<div class="t">
	!年金の支給時!
	?no?
</div>
<h4>期末退職給付引当金の計算</h4>
以下の方法で計算可能です。<br>
<table class="norble">
	<tbody>
		<tr>
			<td> = 期末退職給付債務 - 期末年金資産</td>
		</tr>
		<tr>
			<td> = 期首退職給付債務 + 当期退職給付費用</td>
		</tr>
		<tr>
			<td> = 期首退職給付債務 + 勤務費用 + 利息費用 - 期待運用収益</td>
		</tr>
	</tbody>
</table>
<h4>数理計算上の差異</h4>
退職給付会計で用いられた割引率や長期期待運用収益率はあくまでも見積り(予測)であって実際の数値と異なる場合があります。<br><br>この差異を数理計算上の差異と呼びます。<br><br>「<strong>数理計算上の差異 = 実際運用収益 - 期待運用収益</strong>」で数理計算上の差異を算出した後に、これを平均残存期間内の一定の年数で定額法により配分します。
<?php footer(); ?>