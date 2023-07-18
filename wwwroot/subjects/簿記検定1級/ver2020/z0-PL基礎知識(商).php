<?php
include("common.php");
head("P/L基礎知識(商)");
?>
<h2>P/Lの仕組み</h2>
<span class="u">損益計算書</span>(P/L)は一定期間(会計期間)における会社の利益(当期純利益)を計算する書類で、会社の<span class="u">経営成績</span>を表します。<br><br>具体的には以下のようになっています。
<div class="pl">
	1[3000]
	2[1000,500,300]
	3[広告費300,貸倒引当金繰入200,減価償却費500,給料300,支払保険料100]
	4[受取利息100,有価証券利息150,仕入割引120,有価証券評価益70]
	5[支払利息200,売上割引120,有価証券評価損50]
	6[固定資産売却益50,保険差益30]
	7[火災損失15,固定資産売却損30]
	8[120]
</div>
<small>※以下では「販売費及び一般管理費」を<strong>販管費</strong>、「法人税、住民税及び事業税」を<strong>住民税等</strong>と表記します。</small><br><br>
<div class="f">
	!損益計算書等式!
	<table class="norble center">
		<tbody>
			<tr>
				<td>当期純利益</td>
				<td class="center_padding">=</td>
				<td></td>
			</tr>
			<tr>
				<td rowspan="7"></td>
				<td></td>
				<td>売上高</td>
			</tr>
			<tr>
				<td class="center_padding">-</td>
				<td>売上原価</td>
			</tr>
			<tr>
				<td class="center_padding">-</td>
				<td>販管費</td>
			</tr>
			<tr>
				<td class="center_padding">+</td>
				<td>(営業外収益 - 営業外費用)</td>
			</tr>
			<tr>
				<td class="center_padding">+</td>
				<td>(特別利益 - 特別損失)</td>
			</tr>
			<tr>
				<td class="center_padding">-</td>
				<td>法人税等</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>営業損益計算</h3>
<p>その会社の主な営業活動から生じた利益(<span class="u">営業利益</span>)を計算します。</p>
<h3>経常損益計算</h3>
<p>財務活動等を含めた企業の経常活動から生じた利益(<span class="u">経常利益</span>)を計算します。</p>
<h3>純損益計算</h3>
<p>偶発的損益・臨時的損益も含めた会社の活動全体で生じた利益(<span class="u">税引前当期純利益</span>)を計算します。<br>また、税引前当期純利益から法人税等を差し引くことで会社の最終的な損益である<span class="u">当期純利益</span>を計算します。</p>
<h2>返品・割戻し・割引</h2>
<h3>返品</h3>
<p>商品を返却することを言います。<br>販売の取り消しという性質を持つため、<span class="u">仕入・売上を取り消す</span>処理をします。</p>
<h3>割戻し</h3>
<p>大量に購入してくれた取引先にリベートとして代金の一部を返すことを言います。<br>返品と同様に<span class="u">仕入・売上を取り消す</span>処理をします。<!--売上割戻しに関しては販促としても機能するため販管費で処理すべきという主張もあり--></p>
<h3>割引</h3>
<p>掛代金を早期に支払うことにより、掛代金に含まれる利息分の金額を差し引くことを言います。<br>利息の早期支払いという財務的な性格を有するため、<span class="u">仕入割引・売上割引(営業外収益・営業外費用)</span>として処理します。</p>
<div class="separator"></div>
<h2>原価率計算</h2>
原価率とは売価に占める原価の割合を言います。<br>また、売価に占める利益(売価 - 原価)を利益率と言います。
<table class="norble center" id="kiso0_table0">
	<tbody>
		<tr>
			<td colspan="2" class="c0">売価</td>
		</tr>
		<tr>
			<td class="c1" width="30%">利益</td>
			<td class="c2" width="70%">原価</td>
		</tr>
		<tr>
			<td class="n">&darr;</td>
			<td class="n">&darr;</td>
		</tr>
		<tr>
			<td class="c1">
				<span class="fraction">
					<span class="fraction_n">利益</span>
					<span class="fraction_d">売価</span>
				</span>
				&times;100 (100%)
			</td>
			<td class="c2">
				<span class="fraction">
					<span class="fraction_n">原価</span>
					<span class="fraction_d">売価</span>
				</span>
				&times;100 (100%)
			</td>
		</tr>
	</tbody>
</table>
<div class="nowrap">※<span class="fraction"><span class="fraction_n">利益</span><span class="fraction_d">原価</span></span><span class="ib">は付加率(利益加算率)と言います。</span></div>
<div class="f">
	!原価率算定!
	<span class="u">原価率を算定する際には、<strong>売上割戻</strong>は売価から控除せずに計算します。</span><br>(P/L作成に際しては控除する)<br><br>※原価そのものが取り消された訳ではないため。
</div>
<h2>役務会計</h2>
商品という有形のものを扱う商品売買業に対して、サービス業ではサービス(役務)と呼ばれる無形のものを扱います。<br>ここで用いられる会計が役務会計です。
<h3>会計処理(1)</h3>
<p>費用の支払い時に仕掛品に計上する方法</p>
<div class="t">
	!代金前受時の処理!
	現金500,前受金500
</div>
<div class="t">
	!費用支払い時の処理!
	仕掛品300,現金300
</div>
<div class="t">
	!決算時の処理!
	前受金300,役務収益300
	役務原価200,仕掛品200
</div>
<div class="t">
	!役務提供終了時の処理!
	前受金200,役務収益200
	役務原価100,仕掛品100
</div>
<h3>会計処理(2)</h3>
<p>費用処理した後に使用分を仕掛品に振り替える方法</p>
<div class="t">
	!代金前受時の処理!
	現金500,前受金500
</div>
<div class="t">
	!費用支払い時の処理!
	給料300,現金300
</div>
<div class="t">
	!振替処理!
	仕掛品300,給料300
</div>
<div class="t">
	!役務提供終了時の処理!
	前受金500,役務収益500
	役務原価300,仕掛品300
</div>
<span class="r">
	!仕掛品!
	?工業簿記・原価計算において材料を投入したが未完成である製品を言います。<br><br>材料 => <strong>仕掛品</strong> => 製品?
</span>
<h2>払出数量の算定</h2>
期末時点の商品(棚卸資産)の数量を特定する方法は<span class="u">「継続記録法」と「棚卸計算法」</span>の2つがあります。
<h3>継続記録法</h3>
<p>棚卸資産の受け入れ・払い出しの際に記録を行い、その記録から期末時点の棚卸資産の数量を求めます。</p>
<div class="f">
	!継続記録法!
	期末棚卸数量 = 期首棚卸資産 + 当期受入数量 - 当期払出数量
</div>
<table border="1" class="kiso0_left-assets">
	<caption>商品</caption>
	<tbody>
		<tr>
			<td >期首商品数量</td>
			<td class="td_height2 td_color0" rowspan="2">当期払出数量</td>
		</tr>
		<tr>
			<td class="td_height2" rowspan="2">当期受入数量</td>
		</tr>
		<tr>
			<td class="td_color1">期末棚卸数量</td>
		</tr>
	</tbody>
</table>
<h3>棚卸計算法</h3>
<p>棚卸資産を受け入れた際にのみ記録して、当期払出数量は実地棚卸数量との差額から算出します。</p>
<div class="f">
	!棚卸計算法!
	当期払出数量 = 期首棚卸数量 + 当期受入数量 - 期末棚卸数量(実地棚卸数量)
</div>
<table border="1" class="kiso0_left-assets">
	<caption>商品</caption>
	<tbody>
		<tr>
			<td >期首商品数量</td>
			<td class="td_height2 td_color1" rowspan="2">当期払出数量</td>
		</tr>
		<tr>
			<td class="td_height2" rowspan="2">当期受入数量</td>
		</tr>
		<tr>
			<td class="td_color0">期末棚卸数量</td>
		</tr>
	</tbody>
</table>
<h2>棚卸減耗</h2>
継続記録法と棚卸計算法の併用によって棚卸減耗(帳簿棚卸数量 - 実地棚卸数量)を算出することが可能です。
<h2>払出単価の計算</h2>
棚卸資産の受け入れ価格が異なる際には、払い出し単価を計算して求める必要があります。<br>主な払出単価の計算方法には<span class="u">「先入先出法」「平均原価法」「個別法」「最終仕入原価法」「売価還元法(売価還元原価法・売価還元低価法)」</span>があります。
<h3>先入先出法</h3>
<p>先に仕入れた資産から順に払い出していくと仮定して計算する方法です。</p>
<table class="fifo_table norble">
	<caption>先入先出法</caption>
	<tbody>
		<tr>
			<td width="50%" class="color0">期首</td>
			<td width="50%" class="dashed_bottom color0">払出(期首分)</td>
		</tr>
		<tr>
			<td rowspan="2" class="color1">当期仕入</td>
			<td class="dashed_top color2">払出(当期仕入分)</td>
		</tr>
		<tr>
			<td class="color2">期末</td>
		</tr>
	</tbody>
</table>
<h3>平均原価法</h3>
<p>期首棚卸資産と当期仕入棚卸資産の平均原価を算出して、それを当期使用分(払出分)と当期未使用分(期末棚卸資産)に割り振ります。</p>
<table class="am_table norble">
	<caption>平均原価法</caption>
	<tbody>
		<tr>
			<td width="50%" class="color0">期首</td>
			<td width="50%" rowspan="2" class="color3 height2">当期使用分</td>
		</tr>
		<tr>
			<td rowspan="2" class="color1 height2">当期仕入</td>
		</tr>
		<tr>
			<td class="color2">期末</td>
		</tr>
	</tbody>
</table>
<h3>個別法</h3>
<p>棚卸資産ごとに取得原価(受入価格)を管理する方法です。</p>
<h3>最終仕入原価法</h3>
<p>当期の最後の仕入れ価格を期末棚卸資産の価格として、差額を使用分として算出する方法です。<br><br>現代会計における原則「取得原価主義」に反するため、税法では認められていますが<span class="u">企業会計原則では認められていません。</span></p>
<span class="r">
	!取得原価主義!
	?資産の帳簿価格は取得に際して支出した価格(取得原価)によるべきという原則。?
</span>
<h3>売価還元原価法</h3>
<p>商品グループごとに期末商品の売価金額に原価をかけて期末商品の原価を算出して、差額から払出単価(売上原価)を計算する方法です。<br><br>以下の手順で算出します。</p>
<div class="scroll_x">
	<ol class="baikakangen">
		<li class="nowrap"><strong>原価率(売価還元原価法原価率)の計算</strong></li>
		<li class="nowrap"><strong>「期末帳簿売価 &times; 原価率」から期末帳簿原価を計算</strong></li>
		<li class="nowrap"><strong>「(期末帳簿売価 - 期末実地売価) &times; 原価率」から<span class="u">棚卸減耗費</span>を計算</strong></li>
		<li class="nowrap"><strong>「期末実地原価 &times; 原価率」or「期末帳簿原価 - 棚卸減耗費」からB/S価額を計算</strong><br>&nbsp;※「正味売却価額 < 帳簿価額」ならばその差額を<span class="u">商品評価損</span>として計上</li>
	</ol>
</div>
<div class="scroll_x nowrap">
	<span class="ib">原価率 = </span>
	<span class="fraction">
	 	<span class="fraction_n">期首商品原価 + 当期仕入原価</span>
	 	<span class="fraction_d">期首商品売価 + 当期仕入原価 + 原始値入額 + 値上額 - 値上取消額 - 値下額 + 値下取消額</span>
	 </span>
</div>
<h3>売価還元低価法</h3>
<p>売価還元原価法と異なり、「値下額・値下取消額」を考慮しない原価率(売価還元低価法原価率)を使用する方法です。</p>
<div class="scroll_x">
	<ol class="baikakangen">
		<li class="nowrap"><strong>原価率(売価還元原価法低価率)の計算</strong></li>
		<li class="nowrap"><strong>「期末帳簿売価 &times; 原価率」から期末帳簿原価を計算</strong></li>
		<li class="nowrap"><strong>「(期末帳簿売価 - 期末実地売価) &times; 原価率」から<span class="u">棚卸減耗費</span>を計算</strong></li>
		<li class="nowrap"><strong>「期末実地原価 &times; 原価率」or「期末帳簿原価 - 棚卸減耗費」からB/S価額を計算</strong><br>&nbsp;※「(売価還元原価法原価率 - 売価還元原価法低価率) &times; 」を<span class="u">商品評価損</span>として計上</li>
	</ol>
</div>
<div class="scroll_x nowrap">
	<span class="ib">原価率 = </span>
	<span class="fraction">
	 	<span class="fraction_n">期首商品原価 + 当期仕入原価</span>
	 	<span class="fraction_d">期首商品売価 + 当期仕入原価 + 原始値入額 + 値上額 - 値上取消額<span class="cancel"> - 値下額 + 値下取消額</span></span>
	 </span>
</div>
<h2>期末商品の評価</h2>
<p>期末時点の棚卸資産の評価の際には<span class="u">「棚卸減耗費」と「商品評価損」</span>を計算します。</p>
<h3>棚卸減耗費</h3>
 = 原価 &times; (帳簿棚卸数量 - 実地棚卸数量)
<h3>商品評価損</h3>
 = 良品数量 &times; (原価 - 正味売却価額) + 不良品数量 &times; (原価 - 不良品の価値)
<svg
	id="genmo-hyokazon"
	viewBox="0 0 600 400"
	version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<rect
		class="body"
		width="410"
		height="228"
		x="120"
		y="58" />
	<rect
		class="l0"
		width="130"
		height="225"
		x="400"
		y="59" />
	<path
		d="m 120,58 v 62 h 160 v 50 h 120 v -111 z"
		class="l1" />
	<text
		x="20"
		y="65" >&emsp;&emsp;&emsp;&emsp;原価
	</text>
	<text
		x="20"
		y="125" >正味売却価額
	</text>
	<text
		x="20"
		y="165" >&emsp;不良品価格
	</text>
	<text
		x="245"
		y="310" >&emsp;良品個数
	</text>
	<text
		x="350"
		y="330" >実地棚卸数量
	</text>
	<text
		x="480"
		y="310" >帳簿棚卸数量
	</text>
	<text
		class="bold"
		x="200"
		y="100" >商品評価損
	</text>
	<text
		class="bold"
		x="410"
		y="170" >棚卸減耗費
	</text>
</svg>
棚卸減耗費と商品評価損の損益計算書への表示方法は以下の通りです。
<div class="scroll_x">
	<table id="genmo-hyokazon" class="nowrap">
		<tbody>
			<tr>
				<th colspan="2"></th>
				<th>売上原価</th>
				<th>販売費</th>
				<th>営業外費用</th>
				<th>特別損失</th>
			</tr>
			<tr>
				<th rowspan="2">棚卸減耗費</th>
				<th>正常</th>
				<td>&#12295;</td>
				<td>&#12295;</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<th>異常</th>
				<td></td>
				<td></td>
				<td>&#12295;</td>
				<td>&#12295;</td>
			</tr>
			<tr>
				<th colspan="2">商品評価損</th>
				<td>&#12295;(原則)</td>
				<td></td>
				<td></td>
				<td>&#9651;(例外)</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>記帳法</h2>
商品仕入れ時・販売時の記帳方法には<span class="u">「三分法」「分記法」「売上原価対立法」「総記法」</span>があります。
<h3>三分法</h3>
<p>最も一般的な方法で、商品売買等を<span>「仕入」「売上」「繰越商品」</span>の3つの勘定科目を用いて仕訳する方法です。</p>
<div class="t">
	!仕入時!
	仕入10000,現金10000
</div>
<div class="t">
	!売上時!
	現金8000,売上8000
</div>
<div class="t">
	!決算時!
	仕入1000,繰越商品1000
	繰越商品1500,仕入1500
</div>
<h3>分記法</h3>
<p>商品売買等を<span>「商品」「商品売買益」</span>の2つの勘定科目を用いて仕訳する方法です。</p>
<div class="t">
	!仕入時!
	商品8000,現金8000
</div>
<div class="t">
	!売上時!
	現金10000,商品8000
	,商品売買益2000
</div>
<div class="t">
	!決算時!
	?no?
</div>
<h3>売上原価対立法</h3>
<p>商品売買等を<span>「商品」「売上」「売上原価」</span>の3つの勘定科目を用いて仕訳する方法です。</p>
<div class="t">
	!仕入時!
	商品10000,現金10000
</div>
<div class="t">
	!売上時!
	#売価で収益を計上し、その商品の原価を商品から売上原価に振り替える。#
	現金12000,売上12000
	売上原価9000,商品9000
</div>
<div class="t">
	!決算時!
	?no?
</div>
<h3>総記法</h3>
<p>商品売買等を<span class="u">「商品」「商品売買益」</span>の2つの勘定科目を用いて仕訳する方法です。<br><br>商品の仕入時には原価で商品勘定の借方に記入して、商品の売上時には売価で商品勘定の貸方に記入します。<br>決算時には売価と原価の差額から商品売買を計算て商品勘定から商品売買益勘定に振り替えます。</p>
<div class="t">
	!仕入時!
	#原価で記入#
	商品10000,現金10000
</div>
<div class="t">
	!売上時!
	#売価で記入#
	現金12000,商品12000
</div>
<div class="t">
	!決算時!
	#利益(売価 - 原価)を商品勘定から商品売買益勘定へ#
	商品2000,商品売買益2000
</div>
<div class="f">
	!商品売買益の算定!
	<table class="norble">
		<tbody>
			<tr>
				<td class="nowrap"><span class="circle-purple"></td>
				<td></span>商品勘定が<strong>貸方</strong>残高</td>
			</tr>
			<tr>
				<td></td>
				<td><small>(利益がプラス)</small></td>
			</tr>
			<tr>
				<td class="border" colspan="2">期末商品棚卸高 <strong>+</strong> 商品勘定の貸方残高</td>
			</tr>
			<tr>
				<td class="height1rem"></td>
			</tr>
			<tr>
				<td class="nowrap"><span class="circle-purple"></span></td>
				<td>商品勘定が<strong>貸方</strong>残高</td>
			</tr>
			<tr>
				<td></td>
				<td><small>(利益がマイナス)</small></td>
			</tr>
			<tr>
				<td class="border" colspan="2">期末商品棚卸高 <strong>-</strong> 商品勘定の借方残高</td>
			</tr>
		</tbody>
	</table>
</div>






<?php footer(); ?>