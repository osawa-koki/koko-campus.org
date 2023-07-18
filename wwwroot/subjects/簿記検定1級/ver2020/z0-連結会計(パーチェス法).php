<?php
include("common.php");
head("連結会計(パーチェス法)");
?>
<h2>連結会計の手順</h2>
連結財務諸表を作成する際には企業グループ内の取引を相殺する必要があります。<br><br>この処理を連結修正仕訳と呼びますが、連結修正仕訳は以下の4つの手順を踏みます。<br>
<ol>
	<li>子会社資産・負債の評価替え</li>
	<li>親会社と子会社の貸借対照表の合算</li>
	<li>投資と資本の相殺消去</li>
	<li>連結貸借対照表の作成</li>
</ol>
<h2>連結会計の処理(基本)</h2>
<h3>子会社資産・負債の評価替え</h3>
子会社の資産・負債の帳簿価額を時価に評価替えします。<br><br>(評価差額は<strong>評価差額</strong>で処理)
<div class="column">
	評価差額は税効果会計の適用対象ですが、「評価差額 &times; (100% - 実効税率)」を評価差額として、残りを繰延税金資産(繰延税金負債)として処理します。
	<div class="t">
		!評価差額の税効果会計!
		諸資産200,評価差額120
		,繰延税金資産80
	</div>
</div>
<div class="t">
	!子会社資産・負債の評価替え!
	諸資産100,評価差額100
</div>
<h3>親会社と子会社の貸借対照表の合算</h3>
子会社と親会社の貸借対照表を合算します。
<h3>投資と資本の相殺消去</h3>
親会社が所有する子会社株式と子会社の純資産(資本)を相殺消去します。
<div class="t">
	!投資と資本の相殺消去!
	資本金300,子会社株式500
	利益剰余金200,
</div>
<h3>連結貸借対照表の作成</h3>
合併後の貸借対照表に連結修正仕訳を加減して連結貸借対照表を作成します。
<h2>連結会計の処理(部分所有)</h2>
「1」と「2」と「4」は基本と同様ですが、「3(投資と資本の相殺消去)」の処理では子会社の純資産(資本)のうちの<span class="u">所有割合分だけ相殺</span>します。<br><br>また、それ以外の部分に関しては<strong>非支配株主持分</strong>で処理します。<br><br>また、ここで生じる差額は<strong>投資消去差額</strong>と呼ばれ、<strong>のれん・負ののれん</strong>で処理します。<br><br>また、非支配株主持分を算出する際には資本(資本金・利益剰余金・資本剰余金・etc...)に評価差額を加えた額に非支配株主持分割合をかけて求めます。
<div class="t">
	!投資と資本の相殺消去!
	#非支配株主持分 = (資本金 + 利益剰余金 + 評価差額) &times; 非支配株主持分割合#
	資本金300,子会社株式380
	利益剰余金200,非支配株主持分220
	評価差額50,
	のれん50,
</div>
<h2>支配獲得後1年目の連結処理</h2>
前期の連結修正仕訳は当期の個別財務諸表には反映されていないため当期に再度行う必要がありますが、これを<strong>開始仕訳</strong>と呼びます。<br>また、開始仕訳では純資産の勘定科目のうしろに「当期首残高」と付けます。<br><br>この開始仕訳の後に当期分の連結修正仕訳を行いますが、この仕訳では以下の3つの処理をします。<br>
<ul>
	<li>のれんの償却</li>
	<li>子会社の当期純損益の振替</li>
	<li>子会社の配当金の修正</li>
</ul><br>
<h3>のれんの償却</h3>
投資と資本の相殺消去によってのれんが発生した場合には、これを20年以内に定額法によって償却する必要があります。
<h3>子会社の当期純損益の振替</h3>
子会社の当期純利益のうち、非支配株主に帰属する部分は<strong>非支配株主持分(非支配株主持分当期変動額)</strong>に振り替えます。<br>(相手科目は<strong>非支配株主に帰属する当期純損益</strong>)
<h3>子会社の配当金の修正</h3>
子会社が行う配当(剰余金の配当)と親会社が受け取る配当(受取配当金)を相殺します。<br><br>子会社が行う配当のうち、非支配株主に帰属する部分は<strong>非支配株主持分当期変動額</strong>で処理します。
<div class="t">
	!子会社の配当金の修正!
	受取配当金180,剰余金の配当120
	非支配株主持分当期変動額120,
</div>
<h2>支配獲得後2年目の連結処理</h2>
開始仕訳として前期までに行った連結修正仕訳(前期の開始仕訳 + 前期ののれんの償却 + 前期の子会社の当期純損益の振替 + 前期の子会社の配当金の修正)を行います。<br><br>ここでは、<span class="u">純資産項目のうしろに当期首残高を付け</span>、<span class="u">P/L項目を<strong>利益剰余金当期首残高</strong>で処理</span>します。
<h2>連結修正仕訳(段階取得)</h2>
親会社が複数回に分けて子会社株式を取得した場合は、<span class="u">支配獲得日に一括して取得したと推定</span>して処理をします。<br><br>そのため、子会社株式への投資(子会社株式)の金額は支配獲得日の時価とします。<br>ここで生じる子会社株式の評価損益は<strong>段階取得に係る差損益</strong>とします。
<h2>連結修正仕訳(追加取得)</h2>
子会社となった後にさらに追加で子会社株式を取得した際には、通常の連結修正仕訳(開始仕訳 + のれんの償却 + 子会社の当期純損益の振替 + 子会社の配当金の修正)に加えて追加取得の処理をする必要があります。
<div class="column">
	段階取得と異なり追加取得の場合には、追加取得時に1回目に取得した子会社株式を時価に評価替えしません。
</div>
<div class="column">
	追加取得に関しては、その分の非支配株主持分を減少させると同時に、追加取得したことによって増加した分の親会社の持分と追加投資額を相殺して差額を<strong>資本剰余金</strong>で処理します。
</div>
<h2>連結修正仕訳(売却)</h2>
親会社が子会社の株式を売却した際には、親会社が売却した子会社株式の売却価額と売却分の非支配株主持分を相殺消去して、その差額を<strong>資本剰余金</strong>で処理します。
<h2>企業グループ間の相殺処理</h2>
親会社・子会社間の貸借取引は相殺します。
<table>
	<tbody>
		<tr>
			<td width="45%">売上高</td>
			<td width="10%">&hArr;</td>
			<td width="45%">売上原価</td>
		</tr>
		<tr>
			<td>受取利息</td>
			<td width="10%" class="nopadding">&hArr;</td>
			<td>支払利息</td>
		</tr>
		<tr>
			<td>受取配当金</td>
			<td width="10%" class="nopadding">&hArr;</td>
			<td>配当金</td>
		</tr>
		<tr>
			<td>買掛金</td>
			<td width="10%" class="nopadding">&hArr;</td>
			<td>売掛金</td>
		</tr>
		<tr>
			<td>支払手形</td>
			<td width="10%" class="nopadding">&hArr;</td>
			<td>受取手形</td>
		</tr>
		<tr>
			<td>借入金</td>
			<td width="10%" class="nopadding">&hArr;</td>
			<td>貸付金</td>
		</tr>
		<tr>
			<td>未払費用</td>
			<td width="10%" class="nopadding">&hArr;</td>
			<td>未収収益</td>
		</tr>
		<tr>
			<td>前受収益</td>
			<td width="10%" class="nopadding">&hArr;</td>
			<td>前払費用</td>
		</tr>
	</tbody>
</table>
<h3>連結会計での取引相殺の修正</h3>
連結会計では企業グループ内の貸借取引を相殺しますが、以下のケースでは相殺後に特別な処理が必要です。<br>
<ul>
	<li>貸倒引当金</li>
	<li>手形の割引</li>
	<li>手形の裏書</li>
	<li>未実現利益の消去</li>
</ul><br>
<h3>貸倒引当金</h3>
<h4>期末貸倒引当金</h4>
以下の4つの処理を行います。<br>
<ol>
	<li>貸倒引当金の対象となった取引(買掛金と売掛金・借入金と貸付金・etc...)を相殺消去</li>
	<li>企業グループ内での貸倒引当金の設定は意味をなさないため、これを取り消す</li>
	<li>貸倒引当金繰入に対する税効果会計を適用</li>
	<li>税効果会計を適用したことによって生じた法人税等調整額を非支配株主持分にも負担させる</li>
</ol><br>
<div class="t">
	!!
	買掛金1000,売掛金1000
	貸倒引当金50,貸倒引当金繰入50
	法人税等調整額20,繰延税金負債20
	非支配株主に帰属する当期純損益6,非支配株主持分当期変動額6
</div>
<h4>期首貸倒引当金</h4>
<h5>親会社</h5>
以下の3つの処理を行います。<br>
<ol>
	<li>貸倒引当金の対象となった取引(買掛金と売掛金・借入金と貸付金・etc...)を相殺消去</li>
	<li>開始仕訳(前期の処理を再度)</li>
	<li>今年度分の処理(貸倒引当金の減額 + 税効果会計の適用)</li>
</ol><br>
<h5>子会社</h5>
以下の4つの処理を行います。<br>(親会社の処理 + 非支配株主への按分)<br>
<ol>
	<li>貸倒引当金の対象となった取引(買掛金と売掛金・借入金と貸付金・etc...)を相殺消去</li>
	<li>開始仕訳(前期の処理を再度)</li>
	<li>今年度分の処理(貸倒引当金の減額 + 税効果会計の適用)</li>
	<li>非支配株主持分への按分</li>
</ol>
<h3>手形の割引</h3>
以下の3つの処理をします。<br>
<ol>
	<li>債権債務の相殺消去<br>(割り引いた分は銀行からの借入と推定して借入金で処理)</li>
	<li>貸倒引当金の減額</li>
	<li>税効果会計の適用</li>
</ol><br>
<h3>未実現利益の消去</h3>
未実現利益の消去に関しては、「期首商品」か「期末商品」か、「ダウンストリーム」か「アップストリーム」かの組み合わせによって4つのパターンに分類されます。<br>
<span class="r">
	!ダウンストリーム!
	?親会社が子会社に商品を販売することを言います。?
</span><br>
<span class="r">
	!アップストリーム!
	?子会社が親会社に商品を販売することを言います。?
</span>
<h4>期末商品 &times; ダウンストリーム</h4>
「<strong>全額消去・親会社負担方式</strong>」で処理します。<br>具体的には以下の2つの処理をします。<br>
<ul>
	<li>未実現利益の消去</li>
	<li>税効果会計の適用</li>
</ul><br>
<div class="t">
	!!
	売上原価100,商品100
	繰延税金資産30,法人税等調整額30
</div>
<h4>期末商品 &times; アップストリーム</h4>
「<strong>全額消去・持分按分負担方式</strong>」で処理します。<br>具体的には「期末商品 &times; ダウンストリーム」に「非支配株主持分への按分」を加えた処理をします。<br>
<div class="t">
	!!
	売上原価100,商品100
	繰延税金資産30,法人税等調整額30
	非支配株主当期変動額5,非支配株主に帰属する当期純損益5
</div>
<h4>期首商品 &times; ダウンストリーム</h4>
「期末商品 &times; ダウンストリーム」の逆仕訳とほとんど同じですが、純資産項目を利益剰余金当期首残高で処理します。
<ul>
	<li>未実現利益の消去</li>
	<li>税効果会計の適用</li>
</ul><br>
<div class="t">
	!!
	利益剰余金当期首残高100,売上原価100
	法人税等調整額30,利益剰余金当期首残高30
</div>
<h4>期首商品 &times; アップストリーム</h4>
「期末商品 &times; アップストリーム」の逆仕訳とほとんど同じですが、純資産項目を利益剰余金当期首残高で処理します。
<div class="t">
	!!
	利益剰余金当期首残高100,売上原価100
	法人税等調整額30,利益剰余金当期首残高30
	非支配株主持分当期首残高5,利益剰余金当期首残高5
	非支配株主に帰属する当期純損益5,非支配株主当期変動額5
</div>
<?php footer(); ?>