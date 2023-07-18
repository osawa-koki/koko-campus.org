<?php
include("common.php");
head("デリバティブ会計");
?>
<h2>デリバティブ取引</h2>
<p>別名、金融派生商品と呼ばれ金融商品から派生した商品に関する取引で、以下の4つの取引が該当します。</p>
<ul>
	<li>先物取引</li>
	<li>先渡取引</li>
	<li>オプション取引</li>
	<li>スワップ取引</li>
</ul>
<h2>先物取引</h2>
<p>一定の期日に一定の商品をあらかじめ定められた価格で購入することを約束する取引です。<br><br>X社株式1株を10月10日に1000円で購入する契約が該当して、10月10日におけるX社株価が1000円よりも高ければその分が利益となり、1000円よりも低ければその分が損失となります。</p>
<h3>契約時</h3>
契約そのものは取引には該当しないので、仕訳は行いません。<br>しかしながら、契約者が証券会社に支払う<strong>委託証拠金</strong>に関しては<strong>先物取引差入証拠金</strong>として処理します。
<div class="t">
	!委託証拠金支払い時!
	先物取引差入証拠金100,現金100
</div>
<h3>決算時</h3>
先物相場においての変動により生じる損益を<strong>先物損益</strong>として処理します。<br>相手科目は<strong>先物取引差金</strong>で処理します。
<div class="t">
	!決算時!
	先物取引差金30,先物取引30
</div>
<h3>翌期首</h3>
前期の決算において計上した値洗差額(評価損益)を振り戻します。
<div class="t">
	!翌期首!
	先物損失30,先物取引差金30
</div>
<h3>決済時</h3>
差金決済による処理は以下の2つに分解して仕訳します。<br>
<ul>
	<li>委託証拠金の払い戻し</li>
	<li>損益の受取り(支払い)</li>
</ul><br>
<div class="t">
	!決済時!
	現金100,先物取引差入証拠金100
	現金20,先物損失20
</div>
<span class="r">
	!差金決済!
	?買い建てた場合は売り、売り建てた場合は買うことでその実際に現物商品をやり取りするのではなく、差額のみをやり取りすること。<br>(反対売買)?
</span>
<h2>先渡し取引</h2>
<p>先物取引が取引所で取引されるのに対して、先渡し取引は相対で取引されます。<br><br>会計処理は先物取引と同様です。</p>
<h2>オプション取引</h2>
<p>一定の商品をある時点(まで)に買う・売る権利を売買する取引を言います。<br>オプションの種類としては買う権利である「コールオプション」と売る権利である「プットオプション」に対してそれぞれ買う・売るの4つに分類されます。</p>
<ul>
	<li>コールの買い</li>
	<li>コールの売り</li>
	<li>プットの買い</li>
	<li>プットの売り</li>
</ul><br>
ここでは、最も基本的な「コールの買い」について説明します。
<h3>契約時</h3>
オプション料金は<strong>オプション資産</strong>で処理します。
<div class="t">
	!契約時!
	オプション資産100,現金100
</div>
<h3>決算時</h3>
オプション資産を時価で評価して、評価差額は<strong>オプション差損益</strong>で処理します。
<div class="t">
	!決算時!
	オプション資産30,オプション差損益30
</div>
<h3>翌期首</h3>
前期末の決算処理で計上したオプション資産の評価差額を振り戻します。
<div class="t">
	!翌期首!
	オプション差損益30,オプション資産30
</div>
<h3>決済時</h3>
決済時において時価が権利行使価格を上回っていた場合は「反対売買」を、下回っていた場合は「権利放棄」をします。
<div class="t">
	!決済時!
	現金300,オプション資産100
	,オプション差損益200
</div>
<h2>スワップ取引</h2>
<p>固定金利と変動金利を交換する取引を言います。</p>
<h3>契約時</h3>
<div class="t">
	!契約時!
	?no?
</div>
<h3>利払い時</h3>
以下の2つに分解して処理を行います。<br>
<ul>
	<li>通常の(スワップ契約がない場合の)処理</li>
	<li>スワップの利息との差額の振り替え処理</li>
</ul><br>
<div class="t">
	!利払い時!
	支払利息300,現金300
	現金100,支払利息100
</div>
<h3>決算時の処理</h3>
金利スワップの単価を時価評価して、評価差額を<strong>金利スワップ資産(金利スワップ負債)</strong>で処理します。<br><br>相手科目は<strong>金利スワップ差損益</strong>で処理します。
<div class="t">
	!決算時!
	金利スワップ資産200,金利スワップ差損益200
</div>
<h2>ヘッジ会計</h2>
<p>ある金融商品等と逆の価格変動をする金融商品を購入することで、価格変動リスクを回避(ヘッジ)する会計手法を言います。<br><br>ヘッジ会計の主な目的は費用収益対応の原則に基づいて<span class="u">ヘッジ対象とヘッジ手段から生じる損益を認識する会計期間を一致させることです。</span></p>
<span class="r">
	!費用収益対応の原則!
	?ある会計期間に得た収益とその収益を得るために費やした費用の認識期間を一致させることを要求する原則です。?
</span>
<table id="hedge_table">
	<caption>ヘッジ会計用語一覧</caption>
	<tbody>
		<tr>
			<th class="nowrap">ヘッジ対象</th>
			<td><p>価格変動リスクにさらされている金融資産等を指します。</p></td>
		</tr>
		<tr>
			<th class="nowrap">ヘッジ対象</th>
			<td><p>ヘッジ対象の価格変動リスクを相殺するために購入される金融資産を指します。</p></td>
		</tr>
	</tbody>
</table><br>
ヘッジ会計は損益の認識要件を恣意的に操作することから利益操作の温床になる危険性を孕んでいます。<br>そのため、ヘッジ会計が適用できる場面としてヘッジ要件を厳格に定めています。<br><br>ヘッジ会計の処理方法には以下の2つがあります。<br>
<ul>
	<li>繰延ヘッジ(原則)</li>
	<li>時価ヘッジ(例外)</li>
</ul>
<h2>繰延ヘッジ</h2>
<p>ヘッジ手段にかかる損益をヘッジ対象にかかる損益が認識されるまで<span class="u">純資産として繰り延べる</span>会計手法です。</p>
<h3>購入・契約時</h3>
ヘッジ対象とヘッジ手段のそれぞれに対して会計処理を行います。
<div class="t">
	!購入・契約時!
	その他有価証券300,現金300
	先物取引差入証拠金20,現金20
</div>
<h3>決算時</h3>
ヘッジ手段にかかる損益を繰り延べるため、先物損益として認識せずに<strong>繰延ヘッジ損益</strong>として認識します。<br><br>ヘッジ対象にかかる損益は通常通りの処理を行います。
<div class="t">
	!決算時!
	その他有価証券評価差額金30,その他有価証券30
	先物取引差金50,繰延ヘッジ損益50
</div>
<h3>翌期首</h3>
前期末に計上した評価差額を振り戻します。
<div class="t">
	!翌期首!
	その他有価証券30,その他有価証券評価差額金30
	繰延ヘッジ損益50,先物取引差金50
</div>
<h3>決済時</h3>
ヘッジ対象にかかる損益とヘッジ対象にかかる損益を別々に計上します。
<div class="t">
	!決済時!
	現金250,その他有価証券300
	投資有価証券売却損益50,
	現金20,先物取引差入証拠金20
	現金40,投資有価証券売却損益40
</div>
<h2>時価ヘッジ</h2>
ヘッジ対象にかかる損益を認識することでヘッジ対象とヘッジ手段にかかる損益を同一の会計期間に計上します。<br><br>繰延ヘッジと異なる点は、<span class="u">決算時においてその他有価証券の評価差額を投資有価証券評価損益で認識する</span>点です。<br>(通常は<a href="z0-資産(2)?to=href_zenbujunsisan">全部純資産直入法</a>を採用している場合にはその他有価証券評価差額金で処理)
<h3>購入・契約時</h3>
ヘッジ対象とヘッジ手段のそれぞれに対して会計処理を行います。<br>(繰延ヘッジと同様)
<div class="t">
	!購入・契約時!
	その他有価証券300,現金300
	先物取引差入証拠金20,現金20
</div>
<h3>決算時</h3>
ヘッジ対象にかかる損益を<strong>投資有価証券評価差額金</strong>で処理することでヘッジ手段にかかる損益と同一の会計期間に計上します。
<div class="t">
	!決算時!
	<strong>投資有価証券評価損益</strong>30,その他有価証券30
	先物取引差金50,<strong>投資有価証券評価損益</strong>50
</div>
<h3>翌期首</h3>
前期末に計上した評価差額を振り戻します。
<div class="t">
	!翌期首!
	その他有価証券30,投資有価証券評価損益30
	投資有価証券評価損益50,先物取引差金50
</div>
<h3>決済時</h3>
ヘッジ対象にかかる損益とヘッジ対象にかかる損益を別々に計上します。<br>(繰延ヘッジと同様)
<div class="t">
	!決済時!
	現金250,その他有価証券300
	投資有価証券売却損益50,
	現金20,先物取引差入証拠金20
	現金40,投資有価証券売却損益40
</div>

<?php footer(); ?>