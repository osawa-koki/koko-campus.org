<?php
include("common.php");
head("個別原価計算");
?>
<h2>個別原価計算</h2>
オーダーメイド方式で生産する際に用いられる原価計算制度です。<br /><br />個別原価計算では、注文を受けると<strong>製造指図書</strong>を発行すると同時に製造指図書ごとに<strong>原価計算表</strong>を発行して、これに原価を集計することで原価を計算します。
<h3>個別原価計算の手順</h3>
個別原価計算は以下の2つの処理をします。<br />
<ol>
	<li>製造直接費(直接材料費・直接労務費・直接経費)を原価計算表に<strong>賦課</strong></li>
	<li>製造間接費を適切な基準を用いて原価計算表に<strong>配賦</strong></li>
</ol>
<br />
<h3>個別原価計算の分類</h3>
個別原価計算は製造間接費について部門別計算を行うかどうかで以下の2つに分類されます。<br />
<ul>
	<li>単純個別原価計算(部門別計算なし)</li>
	<li>部門別個別原価計算(部門別計算あり)</li>
</ul>
<br />
<h3>原価計算表の仕組み</h3>
原価計算表は仕掛品(未完成の製品)に関する原価を集計します。<br /><br />具体的には以下のようになっています。
<table>
	<caption>原価計算表</caption>
	<tbody>
		<tr>
			<td>費目</td>
			<td class="nx5rem">製品A</td>
			<td class="nx5rem">製品B</td>
			<td class="nx5rem">製品C</td>
			<td>合計</td>
		</tr>
		<tr>
			<td>月初仕掛品原価</td>
			<td class="right">150</td>
			<td class="right">---</td>
			<td class="right">---</td>
			<td class="right">150</td>
		</tr>
		<tr>
			<td>直接材料費</td>
			<td class="right">100</td>
			<td class="right">400</td>
			<td class="right">300</td>
			<td class="right">800</td>
		</tr>
		<tr>
			<td>直接労務費</td>
			<td class="right">80</td>
			<td class="right">240</td>
			<td class="right">200</td>
			<td class="right">520</td>
		</tr>
		<tr>
			<td>直接経費</td>
			<td class="right">120</td>
			<td class="right">360</td>
			<td class="right">300</td>
			<td class="right">780</td>
		</tr>
		<tr>
			<td>合計</td>
			<td class="right">450</td>
			<td class="right">1,000</td>
			<td class="right">800</td>
			<td class="right">2,250</td>
		</tr>
		<tr>
			<td>備考</td>
			<td>完成・引渡済</td>
			<td>完成・未引渡</td>
			<td>仕掛中</td>
			<td>---</td>
		</tr>
	</tbody>
</table>
<div class="f">
	!原価計算表と仕掛品勘定!
	<div class="center">
		<ul>
			<li>原価計算書の縦集計=>仕掛品勘定の<strong>借方</strong></li>
			<li>原価計算書の横集計=>仕掛品勘定の<strong>貸方</strong></li>
		</ul>
	</div>
</div>
<div class="gl">
	!仕掛品!
	前月繰越150,製品1450
	直接材料費800,次月繰越800
	直接労務費520,
	製造間接費780,
</div>
<h2>単純個別原価計算</h2>
「製造直接費の賦課」と「製造間接費の配賦」に分けて説明します。
<h3>製造直接費の賦課</h3>
発生した製造直接費(直接材料費・直接労務費・直接経費)をそのまま原価計算表に賦課します。
<h3>製造間接費の配賦</h3>
製造間接費は製造間接費の把握後に何らかの基準にしたがって分配しますが、計算の効率化のために原則として予定配賦が行われます。<br /><br />製造間接費の予定配賦では直接作業時間に<strong>予定配賦率(製造間接費予算額 &divide; 基準操業度)</strong>をかけて製造間接費を把握します。
<div class="column">
	月末には「予定配賦額 - 実際発生額」を製造間接費配賦差異に振り替えます。
</div>
次に予定配賦率(製造間接費予算額 &divide; 基準操業度)の算定の基礎となる「基準操業度」と「製造間接費予算額」の算定方法について説明します。
<h4>基準操業度の算定</h4>
1年間における工場の利用程度を直接作業時間や機械運転時間などの指標から表したもので、見積りの方法には以下の4つの方法があります。<br />
<ul>
	<li>理論的生産能力</li>
	<li>実際的生産能力</li>
	<li>平均操業度</li>
	<li>期待実際操業度</li>
</ul>
<h4>製造間接費予算額の算定</h4>
<table class="exp">
	<thead>
		<tr>
			<td width="50%">固定予算</td>
			<td width="50%">変動予算</td>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>操業度が変動しても、製造間接費予算額を変更しません。</td>
			<td>操業度の変化に応じて製造間接費予算額を変更します。<br /><br />変動予算はさらに「公式法変動予算」と「実査法変動予算」に分類されます。</td>
		</tr>
	</tbody>
</table>
試験においては主に変動予算のうちの<strong>公式法変動予算</strong>が用いられます。
<h5>公式法変動予算</h5>
<svg
	viewBox="0 0 600 400"
	version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<rect
		style="fill:#91ff80;stroke-width:0;fill-opacity:1;stroke:none"
		id="rect850"
		width="400"
		height="100"
		x="100"
		y="220" />
	<path
		style="fill:#ff9afe;fill-opacity:1;stroke:none;stroke-width:0.939573;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
		d="m 100,220 h 400 v -146.680197 z"
		id="path1055" />
	<polyline
		points="100,30 100,320 520,320"
		style="fill:none;stroke:black;stroke-width:1px" />
	<line
		x1="100"
		y1="220"
		x2="500"
		y2="320"
		style="fill:none;stroke:grey;stroke-width:1px" />
	<line
		x1="300"
		y1="80"
		x2="300"
		y2="350"
		style="fill:none;stroke:black;stroke-width:1px" />
	<text
		x="280"
		y="370">実際
	</text>
	<text
		x="490"
		y="340">基準
	</text>
	<text
		x="310"
		y="120">変動費予算差異
	</text>
	<text
		x="310"
		y="185">変動費配賦額
	</text>
	<text
		x="310"
		y="255">固定費配賦額
	</text>
	<text
		x="310"
		y="305">操業度差異
	</text>
	<text
		x="310"
		y="345">固定費予算差異
	</text>
</svg>
<div class="f">
	!製造間接費配賦差異!
	<div class="center">
		<span class="u">製造間接費配賦差異 = 予定配賦額 - 実際発生額</span><br />
		<ul>
			<li>予算差異 = 予算許容額 - 実際発生額</li>
			<li>操業度差異 = 予定配賦額 - 予算許容額</li>
		</ul>
	</div>
</div>
<h2>部門別個別原価計算</h2>
<h3>目的</h3>
部門別原価計算を行う目的は以下の2つです。<br />
<ul>
	<li>正確な製品原価を計算すること</li>
	<li>原価管理を有効に行うこと</li>
</ul>
<h3>原価部門の分類</h3>
原価部門は以下の2つに分類されます。<br />
<ul>
	<li>製造部門</li>
	<li>補助部門</li>
</ul>
<h3>部門別計算の手順</h3>
部門別計算は以下の3つの手順を踏みます。<br />
<ol>
	<li>第一次集計(部門個別費と部門共通費の集計)</li>
	<li>第二次集計(補助部門費の各製造部門への配賦)</li>
	<li>製造部門費の各製造指図書への配賦</li>
</ol>
<h4>第一次集計(部門個別費と部門共通費の集計)</h4>
製造間接費を各原価部門へ振り替えます。
<div class="t">
	!!
	切削部門200,製造間接費570
	組立部門150,
	動力部門120,
	修繕部門100,
</div>
部門個別費は特定の部門に直接賦課し、部門共通費は適切な配賦基準によって各部門へ配賦します。
<h4>第二次集計(補助部門費の各製造部門への配賦)</h4>
補助部門費(動力部門・修繕部門)を各製造部門へ配賦します。
<div class="t">
	!!
	切削部門150,動力部門120
	組立部門70,修繕部門100
</div>
具体的には以下の方法があげられます。
<!-- Created with Inkscape (http://www.inkscape.org/) -->
<svg
	width="600"
	height="400"
	viewBox="0 0 600 400"
	version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<filter
		style="color-interpolation-filters:sRGB"
		id="filter"
		x="-0.060737041"
		y="-0.089761821"
		width="1.1214741"
		height="1.1795236">
		<feGaussianBlur
			stdDeviation="14.085775" />
	</filter>
	<ellipse
		style="fill:#91ff80;filter:url(#filter)"
		cx="299.62744"
		cy="198.97394"
		rx="278.29691"
		ry="188.30869" />
	<ellipse
		style="fill:#ffe666;"
		cx="294.96136"
		cy="281.96307"
		rx="167.31145"
		ry="82.989128" />
	<ellipse
		style="fill:#33ffd9;"
		cx="433.94318"
		cy="139.31508"
		rx="114.31837"
		ry="76.323334" />
	<ellipse
		style="fill:#ff8080;"
		cx="166.97815"
		cy="136.64877"
		rx="114.31837"
		ry="74.656891" />
	<text
		xml:space="preserve"
		style="font-size:20px;line-height:1.25;font-family:MingLiU_HKSCS-ExtB;white-space:pre;"
		transform="translate(16.664485,5.3326351)">
		<tspan
			x="89.988281"
			y="138.70898">直接配賦法
		</tspan>
	</text>
	<text
		xml:space="preserve"
		id="text12102"
		style="font-size:20px;line-height:1.25;font-family:MingLiU_HKSCS-ExtB serif;white-space:pre;">
		<tspan
			x="363.95312"
			y="144.70898">階段式配賦法
		</tspan>
	</text>
	<text
		xml:space="preserve"
		id="text30180"
		style="font-size:20px;line-height:1.25;font-family:MingLiU_HKSCS-ExtB;white-space:pre;"
		transform="translate(18.664223,13.331588)">
		<tspan
			x="221.9707"
			y="232.69727"
			id="tspan75170">相互配賦法
		</tspan>
	</text>
	<ellipse
		style="fill:#fff7ce;"
		cx="222.97083"
		cy="296.29456"
		rx="69.657547"
		ry="48.327003" />
	<ellipse
		style="fill:#fff7ce;"
		cx="368.61841"
		cy="297.2944"
		rx="69.990837"
		ry="45.327396" />
	<text
		style="font-size:12px;line-height:1.25;font-family:MingLiU_HKSCS-ExtB serif;white-space:pre;"
		transform="translate(-13.331588,9.9986906)">
        <tspan
			x="191.30859"
			y="286.66602">簡便法としての相互
		</tspan>
		<tspan
			x="191.30859"
			y="302.5918">配賦法
		</tspan>
	</text>
	<text
		style="font-size:12px;line-height:1.25;font-family:MingLiU_HKSCS-ExtB serif;white-space:pre;"
		transform="translate(9.9986908,-9.9986908)">
		<tspan
			x="315.29297"
			y="285.33203">純粋の相互配賦法
		</tspan>
	</text>
	<text
		style="font-size:10px;line-height:1.25;font-family:MingLiU_HKSCS-ExtB serif;white-space:pre;"
		transform="translate(17.331064,5.9992145)">
		<tspan
			x="321.95703"
			y="295.32617">・連立方程式法
		</tspan>
		<tspan
			x="321.95703"
			y="308.59766">・試行錯誤法
		</tspan>
		<tspan
			x="321.95703"
			y="321.86914">・連続配賦法
		</tspan>
	</text>
	<text
		style="font-size:20px;line-height:1.25;font-family:Consolas;white-space:pre;"
		transform="translate(30.662652,6.6657939)">
		<tspan
			x="164.64453"
			y="29.019531">補助部門費の配賦方法
		</tspan>
	</text>
</svg>
<h5>直接配賦法</h5>
補助部門間のやり取りを無視して補助部門費を直接、製造部門にだけ配賦します。
<h5>簡便法としての相互配賦法</h5>
一回目の計算(第一次配賦)では補助部門間のやり取りを考慮して、二回目のやり取りは直接配賦法と同様に補助部門間のやり取りを無視して配賦します。
<h5>連立方程式法</h5>
補助部門費をサービスの提供割合に基づいて提供先の部門に配賦します。
<table class="no-min nowrap_table">
	<caption>部門費配賦法</caption>
	<tbody>
		<tr>
			<td rowspan="2">摘要</td>
			<td rowspan="2">合計</td>
			<td colspan="2">製造部門</td>
			<td colspan="2">補助部門</td>
		</tr>
		<tr>
			<td>切削部門</td>
			<td>組立部門</td>
			<td class="bg-pink">動力部門</td>
			<td class="bg-skyblue">修繕部門</td>
		</tr>
		<tr>
			<td>部門費</td>
			<td>80,000</td>
			<td>28,600</td>
			<td>37,800</td>
			<td class="bg-pink">5,600</td>
			<td class="bg-skyblue">8,000</td>
		</tr>
		<tr>
			<td>動力部門費</td>
			<td></td>
			<td>0.6x</td>
			<td>0.2x</td>
			<td class="bg-pink">---</td>
			<td class="bg-skyblue">0.2x</td>
		</tr>
		<tr>
			<td>修繕部門費</td>
			<td></td>
			<td>0.2y</td>
			<td>0.6y</td>
			<td class="bg-pink">0.2y</td>
			<td class="bg-skyblue">---</td>
		</tr>
		<tr>
			<td>製造部門費</td>
			<td></td>
			<td></td>
			<td></td>
			<td class="bg-pink">x</td>
			<td class="bg-skyblue">y</td>
		</tr>
	</tbody>
</table>
x = 5600 + 0.2y<br />
y = 8000 + 0.2x<br />
を解いて、部門費配賦表を完成させます。
<table class="no-min nowrap_table">
	<caption>部門費配賦法</caption>
	<tbody>
		<tr>
			<td rowspan="2">摘要</td>
			<td rowspan="2">合計</td>
			<td colspan="2">製造部門</td>
			<td colspan="2">補助部門</td>
		</tr>
		<tr>
			<td>切削部門</td>
			<td>組立部門</td>
			<td>動力部門</td>
			<td>修繕部門</td>
		</tr>
		<tr>
			<td>部門費</td>
			<td>80,000</td>
			<td>28,600</td>
			<td>37,800</td>
			<td>5,600</td>
			<td>8,000</td>
		</tr>
		<tr>
			<td>動力部門費</td>
			<td></td>
			<td>4,500</td>
			<td>1,500</td>
			<td>---</td>
			<td>1,500</td>
		</tr>
		<tr>
			<td>修繕部門費</td>
			<td></td>
			<td>1,900</td>
			<td>5,700</td>
			<td>1,900</td>
			<td>---</td>
		</tr>
		<tr>
			<td>製造部門費</td>
			<td>80,000</td>
			<td>35,000</td>
			<td>45,000</td>
			<td>7,500</td>
			<td>9,500</td>
		</tr>
	</tbody>
</table>
<h5>連続配賦法</h5>
各補助部門費がゼロになるまで配賦計算を繰り返す方法です。<br /><br />連立方程式法が用いられることが多いため、使用頻度は低めです。
<h5>試行錯誤法</h5>
試行錯誤して補助部門費を製造部門に配賦する方法です。<br /><br />連立方程式法が用いられることが多いため、使用頻度は低めです。
<h5>階段式配賦法</h5>
補助部門に順位付けをして、順位の高い補助部門から順位の低い補助部門へのサービスの提供のみ計算して、逆のサービスの提供は無視する方法です。<br /><br />補助部門間の順位付け基準としては最初に「サービス提供数」で判断して、サービス提供数が同じだった場合は「部門費(第一次集計費)」「相手への配賦額」で判断します。
<h4>製造部門費の各製造指図書への配賦</h4>
第二次集計により製造部門に集計された製造部門費を各製造指図書の製品に配賦します。<br /><br />ここでも計算の適時性を確保するため原則として予定配賦を行います。<br /><br />「予定配賦率(予定配賦率 &divide; 基準操業度) &times; 実際操業度」から予定配賦額を算定します。
<h3>単一基準配賦法と複数基準配賦法</h3>
補助部門費を各部門へ配賦する際に、変動費と固定費を区別するかどうかで「単一基準配賦法」と「複数基準配賦法」に分類できます。
<h4>単一基準配賦法</h4>
補助部門費を各部門へ配賦する際に、変動費と固定費を区別しないで一括して関係部門の<span>サービス消費量</span>の割合で配賦する方法です。
<h5>単一基準配賦法での予定配賦</h5>
補助部門費を製造部門に配賦すると補助部門費での業績の良し悪しが製造部門の良し悪しに影響を与えてしまうという問題があるため、原則として補助部門費は製造部門に予定配賦します。
<div class="column">
	予定配賦額(実際発生額 - 予算差異 - 操業度差異)を製造部門に配賦することで、予算差異と操業度差異は補助部門費において把握されます。
</div>
<h4>複数基準配賦法</h4>
補助部門費を各部門へ配賦する際に、変動費と固定費を区別してそれぞれ別個の配賦基準で配賦する方法です。<br />
<ul>
	<li>変動費=><span class="u">サービス消費量の割合</span></li>
	<li>固定費=><span class="u">サービス消費能力の割合</span></li>
</ul>
<h5>複数基準配賦法での予算許容配賦額</h5>
単一基準配賦法での予定配賦では、実際発生額から「予算差異」と「操業度差異」を除いて製造部門に配賦しました。<br /><br />当然に「予算差異」と「操業度差異」は製造部門ではなく補助部門で把握されることになりますが、このうちの「操業度差異」は補助部門では管理不可能であり製造部門の責任であるため、動力部門に配賦するのが相応しいと言えます。<br /><br />したがって、<span class="u">補助部門の変動費は予定配賦率に関係部門の実際サービス消費量をかけて予定配賦し、補助部門の固定費は予算額を関係部門のサービス消費量の割合で関係部門へと配賦します。</span><br /><br />これによって、製造間接費配賦差異のうち、予算差異に関しては補助部門で把握され、操業度差異に関しては製造部門で把握されます。
<?php footer(); ?>
