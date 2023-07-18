<?php
include("common.php");
head("特殊商品売買");
?>
<h2>特殊商品売買</h2>
<span class="u">実現主義の原則</span>に基づいて、商品の引渡しと代金の受払いが同時に行われず、それぞれが独自の認識時点を持つ取引を言います。<br><br>実現主義の原則によって確実性・客観性のある収益だけを実現します。<br><br>
<span class="r">
	!実現主義の原則!
	?収益は実現したときに計上するという原則<br><br>実現の2要件<br><div class="indent">→「財貨(商品)または用役(サービス)の提供」かつ「現金または現金同等物の受取り」</div>?
</span><br><br>
特殊商品売買には、<span class="u">「委託販売」「試用販売」「割賦販売」「予約金販売」「貨物代表証券取引」</span>があります。
<h2>委託販売</h2>
<p>自社の商品の販売を他社の代理店などにお願いする取引を言います。<br>処理の方法としては<span class="u">「対照勘定法」「手元商品区分法」</span>があります。</p>
<h3>対照勘定法</h3>
<p>商品を委託先に発送した時点で仮売上として計上して、実際に商品が販売されたら売上に振り替える処理をする方法です。<br>委託販売処理においては対照勘定法は用いられることが少ないためここでは省略します。</p>
<h3>対照勘定法</h3>
<p>商品を委託先に発送した際に、その商品を手許商品と分けて管理する方法です。</p>
<div class="t">
	!発送時の処理!
	#商品を委託先へ発送した際には、仕入勘定から積送品勘定へ振り替えます。<br><small>(積送諸掛(積送時に発送する発送費等の費用)は積送品に含めて処理してもOK!)</small>#
	積送品3000,仕入3000
	積送諸掛200,現金200
</div>
<div class="t">
	!販売時の処理(1)!
	@1.販売のつど積送品原価を仕入勘定に振り替える方法@
	#販売諸掛を積送品売上から直接控除して処理してもOK!!#
	売掛金1900,積送品売上2000
	販売諸掛100,
	仕入1500,積送品1500
</div>
<div class="t">
	!販売時の処理(2)!
	@2.期末に一括して積送品原価を仕入勘定に振り替える方法@
	#販売諸掛を積送品売上から直接控除して処理してもOK!!#
	売掛金1900,積送品売上2000
	販売諸掛100,
</div>
<div class="t">
	!決算時の処理!
	@積送諸掛(販売諸掛 + 発送諸掛)を別途積送諸掛勘定を設けて処理している場合@
	#積送諸掛のうち、<span class="u">発送諸掛</span>に関しては未販売の分を積送諸掛勘定から繰り延べ積送諸掛勘定に振り替えます。<br><small>(未販売の商品にかかる発送諸掛は時期以降の費用とするため)</small>#
	繰延積送諸掛300,積送諸掛300
</div>
<h2>委託販売の解法</h2>
委託販売の解法はその都度法と期末一括法で若干の差異がありますが、両者ともに「仕入」「手許商品」「積送品」の管理図を作成して解きます。
<h3>その都度法</h3>
<div class="container">
	<table border="1" class="norble s2">
		<caption>仕入</caption>
		<tbody>
			<tr>
				<td rowspan="2" class="height6rem bg-lightgrey">当期仕入</td>
				<td class="height2rem bg-skyblue">当期積送</td>
			</tr>
			<tr>
				<td rowspan="2" class="height6rem">T/B「仕入」</td>
			</tr>
			<tr>
				<td class="height2rem bg-pink">積送品売上原価</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" class="norble s2">
		<caption>手許商品</caption>
		<tbody>
			<tr>
				<td class="height1-5rem">期首手許商品</td>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期積送</td>
			</tr>
			<tr>
				<td rowspan="3" class="bg-lightgrey">当期仕入</td>
			</tr>
			<tr>
				<td class="height2-5rem">当期一般販売</td>
			</tr>
			<tr>
				<td class="height2-5rem">期末手許商品</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" id="sonotsudo_itaku" class="norble s2">
		<caption>積送品</caption>
		<tbody>
			<tr>
				<td class="height2rem">期首積送品</td>
				<td rowspan="2" class="height2-5rem bg-pink">当期積送<br>(積送品売上原価)</td>
			</tr>
			<tr>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期積送</td>
			</tr>
			<tr>
				<td class="height2rem">期末積送品</td>
			</tr>
		</tbody>
	</table>
</div>
<p>損益計算書の期首商品棚卸高・期末商品棚卸高は手許商品と積送品の合計額を記入します。</p>
<h3>期末一括法</h3>
<div class="container">
	<table border="1" class="norble s2">
		<caption>仕入</caption>
		<tbody>
			<tr>
				<td rowspan="2" class="height4rem bg-lightgrey">当期仕入</td>
				<td class="height2rem bg-skyblue">当期積送</td>
			</tr>
			<tr>
				<td class="height2rem bg-pink">積送品売上原価</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" class="norble s2">
		<caption>手許商品</caption>
		<tbody>
			<tr>
				<td class="height1-5rem">期首手許商品</td>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期積送</td>
			</tr>
			<tr>
				<td rowspan="3" class="bg-lightgrey">当期仕入</td>
			</tr>
			<tr>
				<td class="height2-5rem">当期一般販売</td>
			</tr>
			<tr>
				<td class="height2-5rem">期末手許商品</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" id="kimatsu1_itaku" class="norble s2">
		<caption>積送品</caption>
		<tbody>
			<tr>
				<td class="height2rem">期首積送品</td>
				<td rowspan="2" class="height2-5rem bg-pink">当期積送<br>(積送品売上原価)</td>
			</tr>
			<tr>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期積送</td>
			</tr>
			<tr>
				<td class="height2rem">期末積送品</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>積送諸掛の処理</h2>
積送諸掛は「発送諸掛」と「販売諸掛」の2つからなりますが、そのうちの「発送諸掛」に関しては未販売に係る部分を次期以降に繰り延べる処理をします。<br><br>損益計算書の積送諸掛勘定(販管費)には発送諸掛(当期販売分)と販売諸掛の合計を計上して、次期以降に係る発送諸掛は繰延積送諸掛として貸借対照表に記入します。
<h2>委託販売の収益認識基準</h2>
委託販売においては受託者が実際に商品を販売した際に実現主義要件が満たされるため、原則としてはこの基準(<span class="u">販売基準</span>)で収益を認識します。<br>ただし例外として受託者から<strong>仕切清算書</strong>が販売のつど送付される場合には、仕切清算書が送付されてきた時に収益を認識する基準(<span class="u">仕切清算書到達基準</span>)を採用することも可能です。<br><br>
<span class="r">
	!実現主義!
	?収益の認識に関しては実際に販売が実現した際に行うという原則を言います。<br><br>実現主義以外の認識基準としては、実際に現金を受け取った際に認識する「現金主義」や費用が潜在的に発生した時点で認識する「発生主義」があります。?
</span>
<h2>受託販売</h2>
<p>販売代理店として他社の商品を代わりに販売する形態を言います。</p>
<div class="separator"></div>
受託品を受け取った時点では処理はしません。<br><small>※仕入ではないため。</small>
<div class="t">
	!受託時!
	?no?
</div>
実際には受託品を販売した時点では受託販売として処理しますが、販売金額のうち受託者自身の債権となる「発送費(委託側が負担する場合)」「販売手数料」を同時に受託販売から控除します。
<div class="t">
	!受託品販売時!
	現金500,受託販売500
	受託販売100,現金100
	受託販売50,受取手数料50
</div>
受託者が委託者に受託品売上金額を支払った際には、受託販売を減額します。
<div class="t">
	!受託販売売上支払い時!
	受託販売350,現金350
</div>
<h2>試用販売</h2>
お試し期間を設定してその期間にお客さんが商品を気に入ってくれたら購入してもらう販売形態を言います。<br><br>委託販売と同様に<span class="u">「対照勘定法」と「手許商品区分法」</span>の2つの処理方法があります。
<h3>対照勘定法</h3>
<p>商品の発送時に仮の売上として計上して、実際に商品が購入された場合にこれを試用品売上に振り替える方法です。</p>
<div class="t">
	!発送時の処理!
	#売価で計上します。#
	試用販売契約1500,試用仮売上1500
</div>
<div class="t">
	!販売時の処理!
	@売価で試用品売上を計上すると同時に、その分だけ試用仮売上を取り消します。@
	売掛金1000,試用品売上1000
	試用仮売上1000,試用販売契約1000
</div>
<h3>手許商品区分法</h3>
<p>試送品が発送された段階で仮とはいえ売上として認識するのは不適切であるという観点から売上とせずに、手許商品から区分して試送品として管理する方法です。<br>(kokoはこちらの方がより適切な会計処理だと主張します!)</p>
<div class="t">
	!発送時の処理!
	#原価で計上します。#
	試用品1000,仕入1000
</div>
<div class="t">
	!販売時の処理!
	@1.その都度法@
	#販売のつど、試用品原価を試用品勘定から仕入勘定に振り替えます。#
	売掛金1000,試用品売上1000
	仕入800,試用品800
</div>
<div class="t">
	!販売時の処理!
	@2.期末一括法@
	売掛金1000,試用品売上1000
</div>
<h2>試用販売の解法</h2>
<p>試用販売において、一般販売の何倍かの売価を設定している場合にはこれを割って一般売価に直してから計算します。</p>
<h3>対照勘定法</h3>
<div class="container">
	<table border="1" class="norble s2">
		<caption>仕入</caption>
		<tbody>
			<tr>
				<td rowspan="2" class="height6rem bg-lightgrey">当期仕入</td>
				<td class="height6rem">T/B「仕入」</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" class="norble s2">
		<caption>手許商品</caption>
		<tbody>
			<tr>
				<td class="height1-5rem">期首手許商品</td>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期試送</td>
			</tr>
			<tr>
				<td rowspan="3" class="bg-lightgrey">当期仕入</td>
			</tr>
			<tr>
				<td class="height2-5rem">当期一般販売</td>
			</tr>
			<tr>
				<td class="height2-5rem">期末手許商品</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" id="taisho_sisou" class="norble s2">
		<caption>試送品</caption>
		<tbody>
			<tr>
				<td class="height2rem">期首試送品</td>
				<td rowspan="2" class="height2-5rem bg-pink">当期試送販売<br>(試送品売上原価)</td>
			</tr>
			<tr>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期試送</td>
			</tr>
			<tr>
				<td class="height2rem">期末試送品</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>その都度法(手許商品区分法)</h3>
<div class="container">
	<table border="1" class="norble s2">
		<caption>仕入</caption>
		<tbody>
			<tr>
				<td rowspan="2" class="height6rem bg-lightgrey">当期仕入</td>
				<td class="height2rem bg-skyblue">当期試送</td>
			</tr>
			<tr>
				<td rowspan="2" class="height6rem">T/B「仕入」</td>
			</tr>
			<tr>
				<td class="height2rem bg-pink">試送品売上原価</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" class="norble s2">
		<caption>手許商品</caption>
		<tbody>
			<tr>
				<td class="height1-5rem">期首手許商品</td>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期試送</td>
			</tr>
			<tr>
				<td rowspan="3" class="bg-lightgrey">当期仕入</td>
			</tr>
			<tr>
				<td class="height2-5rem">当期一般販売</td>
			</tr>
			<tr>
				<td class="height2-5rem">期末手許商品</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" id="sonotsudo_sisou" class="norble s2">
		<caption>試送品</caption>
		<tbody>
			<tr>
				<td class="height2rem">期首試送品</td>
				<td rowspan="2" class="height2-5rem bg-pink">当期試送販売<br>(試送品売上原価)</td>
			</tr>
			<tr>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期試送</td>
			</tr>
			<tr>
				<td class="height2rem">期末試送品</td>
			</tr>
		</tbody>
	</table>
</div>
<p>委託販売同様、損益計算書の期首商品棚卸高・期末商品棚卸高は手許商品と試送品の合計額を記入します。</p>
<h3>期末一括法(手許商品区分法)</h3>
<div class="container">
	<table border="1" class="norble s2">
		<caption>仕入</caption>
		<tbody>
			<tr>
				<td rowspan="2" class="height4rem bg-lightgrey">当期仕入</td>
				<td class="height2rem bg-skyblue">当期試送</td>
			</tr>
			<tr>
				<td class="height2rem bg-pink">試送品売上原価</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" class="norble s2">
		<caption>手許商品</caption>
		<tbody>
			<tr>
				<td class="height1-5rem">期首手許商品</td>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期試送</td>
			</tr>
			<tr>
				<td rowspan="3" class="bg-lightgrey">当期仕入</td>
			</tr>
			<tr>
				<td class="height2-5rem">当期一般販売</td>
			</tr>
			<tr>
				<td class="height2-5rem">期末手許商品</td>
			</tr>
		</tbody>
	</table>
	<div class="margin1"></div>
	<table border="1" id="kimatsu1_sisou" class="norble s2">
		<caption>試送品</caption>
		<tbody>
			<tr>
				<td class="height2rem">期首試送品</td>
				<td rowspan="2" class="height2-5rem bg-pink">当期試送<br>(試送品売上原価)</td>
			</tr>
			<tr>
				<td rowspan="2" class="height2-5rem bg-skyblue">当期試送</td>
			</tr>
			<tr>
				<td class="height2rem">期末試送品</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>割賦販売</h2>
商品を渡した後に代金は分割で受け取る販売形態を言います。<br><br>代金(現金)はその場で受け取らなくても代金を受け取る権利(現金同等物)を受け取ることで実現主義要件が満たされるため、原則として販売時に収益を認識します。(<span class="u">「販売基準」</span>)<br><br>しかしながら割賦販売には代金回収に関して不確実性が伴うため、保守主義の観点から<span class="u">「回収基準」「回収期限到来基準」</span>の採用も例外で認められています。<br><br>
<span class="r">
	!実現主義要件!
	?商品の引渡しと現金または現金同等物の受取り?
</span><br>
<span class="r">
	!保守主義!
	?企業会計原則のひとつで、会計処理を選択するにあたって慎重な方法を選択することを要求する原則です。?
</span>
<h3>戻り商品</h3>
<p>戻り商品とは、割賦販売において支払代金の返済が困難になった際に回収した商品のことを言います。</p>
会計処理としては戻り商品の評価額を割賦売掛金から減額し、それでも不足額がある場合には戻り商品損失(販管費)として処理します。
<div class="t">
	!割賦代金の回収不能時!
	戻り商品300,割賦売掛金500
	戻り商品損失200,
</div>
当該会計期間において戻り商品が販売された場合は販売時点で、販売されなかった場合は決算時点で戻り商品を仕入勘定に振り替えます。<br><br>
また、貸倒引当金が設定されている場合には貸倒引当金を取り崩して充填します。
<div class="t">
	!割賦代金の回収不能時!
	戻り商品300,割賦売掛金500
	貸倒引当金150,
	戻り商品損失50,
</div>
<h2>予約販売</h2>
<p>先に予約金を受け取って後で商品を渡す販売形態です。</p>
予約金を受け取った時点では商品を渡しておらず実現主義要件を満たさないため収益を認識しません。<br>受け取った予約金は前受金として処理します。
<div class="t">
	!予約金受取り時!
	現金200,前受金200
</div>
実際に商品を渡した時点で実現主義要件を満たすため、ここで収益を認識します。
<div class="t">
	!商品引き渡し時!
	前受金200,売上200
</div>
<h2>未着品販売</h2>
地理的に遠い場所からの商品の仕入には輸送に時間がかかることがあります。<br>その際に商品を受け取る権利を表す有価証券である<strong>貨物代表証券</strong>を運送会社から受け取ります。<br><br>この貨物代表証券を受け取った際には未着品(資産)で処理します。
<div class="t">
	!貨物代表証券受取り時!
	未着品300,買掛金300
</div>
実際に商品が到着して受け取った時点では未着品を仕入勘定に振り替えます。<br>引取費用がある場合には仕入原価に含めて処理します。
<div class="t">
	!未着品受取り時!
	仕入350,未着品300
	,現金50
</div>
未着品を受け取る権利である貨物代表証券は有価証券であるため転売することも可能で、転売した際の収益は一般の売上と区別して未着品売上として処理します。<br><br>
貨物代表証券の転売時は「未着品売上の計上」と「未着品の仕入原価への振り替え」の2つに分けて仕訳します。
<div class="t">
	!未着品売上!
	現金320,未着品売上320
	仕入300,未着品300
</div>
<?php footer(); ?>
