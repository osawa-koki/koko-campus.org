<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-11-22",
	"updated" => "2021-11-22"
);
head($obj);
?>
<h2>陸軍による総合原価計算</h2>
陸軍も海軍と同様に、民間軍需品工場から軍需品を安価に調達するために民間軍需品工場に対して陸軍が指定した原価計算の採用を強制しました。<br /><br />しかしながら、海軍がその性質上、個別受注生産が主であったのに対して陸軍は大量生産が主でした。<br /><br />日中戦争が勃発して軍需品の受容が増加すると、それに対応するために政府は昭和14年に「陸軍軍需品工場事業場原価計算要綱」を制定しました。
<h2>陸軍軍需品工場事業場原価計算要綱</h2>
「陸軍軍需品工場事業場原価計算要綱」は「基本原価計算準則」と「製造原価計算準則」にドイツの原価計算を加えて改良したものであると言えます。<br /><br />目的は軍需品の調弁価格を原価計算を用いて合理的に算定することです。
<h3>特徴</h3>
「陸軍軍需品工場事業場原価計算要綱」は以下の原価計算を規定しています。
<br />
<ul>
	<li>費目別計算</li>
	<li>製造間接費計算</li>
	<li>部門別計算</li>
	<li>製品別計算</li>
</ul>
<br />
これらの計算によって全ての価値の消費を製品に移転して認識しています。<br />また、製品別計算では個別原価計算と総合原価計算の両方を規定しています。<br />さらには、これを基礎に販売費・一般管理費の区分、販売費・一般管理費の配賦が規定しています。<br /><br />これによって日本の原価計算制度が完成段階に入ったと言えます。<br /><br />また、「陸軍軍需品工場事業場原価計算要綱」による原価の構成は以下のとおりです。
<img src="../pics/陸軍要綱における原価構成.png" alt="陸軍要綱における原価構成の画像" />
<br />
また、それぞれの原価は以下のように定義されています。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>材料費</th>
			<td>「製品ノ製造ノ為ニ費消セラルル物品ノ価値」</td>
		</tr>
		<tr>
			<th>労働費</th>
			<td>「製品ノ製造ノ為ニ費消セラルル労働力ノ価値」</td>
		</tr>
		<tr>
			<th>経費</th>
			<td>「製造原価ノ構成要素ニシテ材料費ト労働費ノ二者ヲ除キタル一切ノ費用」</td>
		</tr>
	</tbody>
</table>
<h3>非原価項目</h3>
「陸軍軍需品工場事業場原価計算要綱」が適切な調弁価格を決定する目的であったことから、非原価項目についても詳細に規定しています。
<ol>
	<li>偶発的事故ニ囚ル損失ハ之ヲ原価ニ算入スルコトヲ得ズ</li>
	<li>利益処分項目及之ニ類似ノ項目ハ之ヲ原価ニ算入スルコトヲ得ズ</li>
	<li>事業本来ノ目的ニ非ズシテ利殖，統制其ノ他ノ目的ヲ以テ長期ニ亙リテ所有スル投資資産ニ関スル費用及損失ハ之ヲ原価ニ算入スルコトヲ得ズ</li>
	<li>将来ノ経営拡張ノ為ニ予備的ニ保有シ又ハ建設中ニ係ル拡張用資産ニ関スル費用ハ其ノ資産ガ営業用ニ供サルルニ至ル迄ハ原価ニ算入スルコトヲ得ズ</li>
	<li>次ノ計算期間ニ属スベキ費用ノ前払金及数多ノ計算期間ニ亙リ分割償却サルベキ繰延費用ハ之ヲ当該期間ノ原価ニ算入スルコトヲ得ズ</li>
	<li>消耗工具，工場用及事務用消耗品等ノ期末在高ハ之ヲ資産トシ当該期間ノ原価ニ算入スルコトヲ得ズ</li>
	<li>貸倒損失及貸倒危険ハ之ヲ原価ニ算入スルコトヲ得ズ</li>
	<li>廃残設備売却損，延滞償金ハ之ヲ原価ニ算入スルコトヲ得ズ</li>
	<li>当該事業ノ目的タル製品ノ製造及販売ニ関連ヲ有スルモ軍需品ノ製造及販売ニ関連ナキ費用ハ之ヲ軍需品ノ原価ニ算入スルコトヲ得ズ</li>
	<li>自己資本ニ対スル計算上ノ利子タルト他人資本ニ対スル支払利子タルトヲ問ハズ利子ハ之ヲ原価ニ算入セザルモノトス</li>
</ol>

<h3>個別・総合分類</h3>
個別原価計算を適用する場面と総合原価計算を適用する場面について、以下のように規定しています。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">個別原価計算</td>
			<td width="50%">総合原価計算</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>生産ヲ製造指図書又ハ製作伝票ニ依リ区別統制シ指図書毎ニ原価要素ノ費消ヲ集合算定スル方法</td>
			<td>一期間ニ於ケル総費用ヲ総合算定シ之ヲ生産量ニテ除シテ単位原価ヲ計算スル方法</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>