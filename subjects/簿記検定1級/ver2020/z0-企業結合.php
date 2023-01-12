<?php
include("common.php");
head("企業結合");
?>
<h2>企業結合の種類</h2>
企業結合は以下の3つに分類されます。<br>
<ul>
	<li>取得</li>
	<li>共同支配企業の形成</li>
	<li>共通支配下の取引</li>
</ul>
<h2>企業結合の会計処理</h2>
以下の2つの方法があります。<br>
<ul>
	<li>パーチェス法</li>
	<li>持分プーリング法</li>
</ul><br>
<h3>パーチェス法</h3>
企業結合が「事業の取得」にあたる場合に適用される会計処理で、被取得企業の取得原価を<span class="u">対価として支出する現金や交付する株式等の企業結合日における時価</span>とします。<br><br>企業結合が取得に該当する場合には、このパーチェス法が適用されます。
<h3>持分プーリング法</h3>
企業結合が「持分の継続」にあたる場合に適用される会計処理で、承継する事業を構成する資産・負債を簿価のまま受け入れる方法です。
<div class="separator"></div>
以下では企業結合の代表とされる取得法・パーチェス法について説明します。
<h2>パーチェス法の処理</h2>
<p>取得企業は被取得企業の資産・負債を時価(公正な評価額)で受け入れます。<br><br>また、<span class="u">資産・負債の時価の総額と取得原価との差額は<strong>のれん・負ののれん</strong>で処理します。</span></p>
<span class="r">
	!公正な評価額!
	?「市場価格に基づく価額」と「合理的に算定された価額」を言います。<br><br>企業会計原則で用いれるている用語で、一般には「公正価値」とも呼ばれます。<br><br>また、時価もほとんど同じ意味で用いられます。?
</span><br>
<div class="t">
	!!
	諸資産500,諸負債200
	のれん100,資本金300
	,資本準備金100
</div>
<div class="column">
	合併時に自己株式を対価として処分した場合は、被取得企業の取得原価は処分する自己株式を含めた交付株式の<span class="u">時価</span>によって算定します。<br><br>また、被取得企業の取得原価から自己株式の<span class="u">帳簿価額</span>を差し引いて払込資本(資本金・資本準備金等)を算出します。
</div>
<h3>のれん・負ののれんの処理</h3>
のれんと負ののれんの処理方法は以下の通りです。
<table>
	<thead>
		<tr>
			<td width="50%">のれん</td>
			<td width="50%">負ののれん</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>無形固定資産として計上して、20年以内に定額法により償却します。<br>(償却時の相手科目はのれん償却額)</td>
			<td>発生時に全額負ののれん発生益として処理します。</td>
		</tr>
	</tbody>
</table>
<h3>合併相殺仕訳</h3>
合併当事会社間の債権債務を相殺します。
<div class="t">
	!合併相殺仕訳!
	諸負債100,諸資産100
</div>
<h3>段階取得の処理</h3>
<span class="r">
	!段階取得!
	?取得企業が被取得企業の株式を段階的に取得することを言います。<br><br>また、合併前に存続会社が保有する消滅会社の株式を抱合株式と呼びます。?
</span><br>
段階取得での被取得企業の取得原価は以下の方法で計算します。
<div class="f">
	!段階取得での被取得企業の取得原価!
	<table class="norble" border="0">
		<tbody>
			<tr>
				<td>存続会社の株式</td>
				<td>&times;</td>
				<td>交付株式数</td>
				<td>+</td>
				<td>存続会社が所有する消滅会社株式の帳簿価額</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>交付株式数の算出</h2>
企業結合においては存続会社が消滅会社の株主に対して存続会社の株式を交付する必要がありますが、ここで消滅会社の株式1株に対して存続会社の株式を何株交付するかの計算をする必要があります。<br><br>交付株式数の算定には以下の3つの手順を踏みます。<br>
<ol>
	<li>企業評価額の算定</li>
	<li>合併比率の算定</li>
	<li>交付株式数の算定</li>
</ol>
<h3>企業評価額の算定</h3>
企業評価額の算定には以下の3つの方法があります。<br>
<ul>
	<li>純資産額法</li>
	<li>収益還元価値法</li>
	<li>株式市価法</li>
	<li>折衷法</li>
</ul>
<h4>純資産額法</h4>
「<strong>企業評価額 = 総資産額 - 総負債額</strong>」で計算します。
<h4>収益還元価値法</h4>
<span class="nowrap">
	<span class="ib">「<strong>企業評価額 = </strong></span>
	<span class="fraction">
		<span class="fraction_n"><strong>自己株式 &times; 自己資本利益率</strong></span>
		<span class="fraction_d"><strong>資本還元率</strong></span>
	</span>
	<span class="ib"><strong>」</strong></span>
</span>
で算出します。
<h4>株式市価法</h4>
「<strong>企業評価額 = 時価 &times; 発行済株式総数</strong>」で計算します。
<h4>折衷法</h4>
以下の複数の方法を併用して計算します。
<h3>合併比率の算定</h3>
<div class="f">
	!合併比率!
	<div class="nowrap center">
		<span class="ib">合併比率 = </span>
		<span class="fraction">
			<span class="fraction_n">消滅会社の1株あたりの企業評価額</span>
			<span class="fraction_d">存続会社の1株あたりの企業評価額</span>
		</span>
	</div>
</div>
<h3>交付株式数の算定</h3>
<div class="f">
	!交付株式数!
	<div class="center">
		交付株式数 = 消滅会社の発行済株式総数 &times; 合併比率
	</div>
</div>
<h2>株式交換・株式移転</h2>
<table>
	<thead>
		<tr>
			<td width="50%">株式交換</td>
			<td width="50%">株式移転</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="left"><p>すでに存在する2つの会社が結合して、<strong>完全親会社</strong>・<strong>完全子会社</strong>となる企業結合です。</p></td>
			<td class="left"><p>すでに存在する2つの会社が、<span class="u">新たな</span><strong>完全親会社</strong>を設立する企業結合です。</p></td>
		</tr>
		<tr>
			<td class="left" rowspan="2">
				<span class="nowrap">子会社株式の取得原価 = </span>
				<span class="nowrap">完全親会社株式の時価 &times; 交付株式数</span>
			</td>
			<td class="left">
				<div>(取得企業)</div>
				<span class="nowrap">子会社株式の取得原価 = </span>
				<span class="nowrap">取得企業の純資産額(帳簿価額)</span>
			</td>
		</tr>
		<tr>
			<td class="left">
				<div>(被取得企業)</div>
				<span class="nowrap">子会社株式の取得原価 = </span>
				<span class="nowrap">取得企業の株式時価 &times; 交付株式数</span>
			</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>