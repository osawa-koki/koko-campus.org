<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-11-22",
	"updated" => "2021-11-22"
);
head($obj);
?>
<h2>官営（紙幣）印刷工場</h2>
官営工場では独立採算会計のため、各官営工場がそれぞれの会計制度を採用しました。<br /><br />その中でも官営（紙幣）印刷工場では、<strong>簿記順序</strong>という、（改正）作業費出納條例をさらに改良したものを採用していました。<br /><br />ここではその簿記順序の特徴について説明していきます。
<div class="column">
	大蔵省印刷局で用いられた作業場経営マニュアルである印刷局諸規程のうち、会計に関する規定を簿記順序と言います。
</div>
<h2>簿記順序</h2>
「（改正）作業費出納條例」と同様に作業費は支出の性質によって興業費と営業費に分類しています。
<p class="r">簿記順序では興業費ではなく、興業資産費という名称を用いています。</p>
<br />
「（改正）作業費出納條例」と異なる点は、営業費をさらに「<strong>製造費</strong>」と「<strong>割賦費</strong>」に分類している点です。<br /><br />これは「製造直接費」と「製造間接費」の分類であり、投下資本の回収計算をより精緻化したと言えます。
<h3>特徴</h3>
簿記順序の特徴は以下の2つです。
<br />
<ol>
	<li>興業費と営業費の区別を重要視</li>
	<li>作業場の独立採算という目的</li>
	<li>資産の保全について規定</li>
</ol>
<br />
「1」では興業費と営業費の区別から、投下資金の確実な回収について言及しています。<br /><br />「2」では政府の一般経費から分離するだけでなく、より本格的に作業場の抱く率採算を図っていると言えます。<br />また、これに関して従業員のモラールの向上などにも言及しています。<br /><br />「3」では直接の原価計算の目的ではありませんが会計の目的である資産の保全について明確に規定しています。
<div class="column">
	資産の保全に関しては、簿記順序緒言において、「百般ノ費途千差萬別ナルモ要スルニ其綱目ヲ紊乱セス」「其支収ヲ明瞭ナラシメ而シテ各部ハ現金ヲ掌トルモノト現品ヲ掌トルモノヲ区割シ部外ヘ対シ現金現品ヲ授受スルノ際ニ当リテハ必ス金員品物ヲ併記シ金員ヲ記シテ品物ヲ記サス品物ヲ記シテ金員ヲ記サヽルヲ禁制ス」と規定しています。
</div>
また、資産の保全に関して簿記の重要性を主張しています。
<h3>概要</h3>
簿記順序の概要として以下の3つを説明します。
<br />
<ol>
	<li>各部科ごとの簿記を規定</li>
	<li>会計の重要性に言及</li>
	<li>製品定価の算定方法の言及</li>
</ol>
<br />
「1」では6章立て約300条項からなる簿記順序を各部科ごとに分割して説明しています。<br /><br />「2」では会計が工場経営の基礎であることを言及しています。<br /><br />「3」では、材料費と労務費に割賦費および興業資産費償却相当分を加えて製品定価を算定することを規定し、これは決定経常的に行われている制度としての原価計算を意味します。
<h2>興業資産費の償却</h2>
「（改正）作業費出納條例」では興業費の償却についての具体的な規定はありませんでしたが、簿記順序では興業資産費(興業費)に関して詳細に規定されました。
<div class="column">
	簿記順序では興業資産費の償却に関して「工場ノ所有財産ト雖モ漸次破毀ニ属スルヲ以テ其価格ヲ永久ニ保ツヲ得ス故ニ予メ保存年限ヲ定メ価格ヲシテ明晰ナラシムルヲ要ス之ヲ調定スルハ次條（第十五條－筆者）ノ順序ニ従フヘシ」と規定されています。
</div>
<h2>製造費と割賦費</h2>
簿記順序で新たに規定された製造費と割賦費について説明しますね♪
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>製造費</th>
			<td>製品への価値移転が直接認識できる部分の営業費を言います。<br />製造費については、「製造品ノ毎種ニ対シ直接ニ決算スル費目ニシテ工人給料・指揮整理者給・需用物品代価・蒸気費・地金鎔解費」(第5條)</td>
		</tr>
		<tr>
			<th>割賦費</th>
			<td>製品への価値移転が直接認識できない部分の営業費を言います。<br />割賦費に関しては「各種製品ニ賦課シテ支消スヘキ常費」であり「本局経費，工場常費」と規定しています。(第6條)</td>
		</tr>
	</tbody>
</table>
また、それらが運用の途中にある際には「物品貯蓄」や「前払ノ金」とすると規定されています。<br />これは現代でいう「仕掛品」に該当し、適切な期間損益計算のための重要な規定であったと言えます。
<h2>製品定価の計算</h2>
収支予算では各作業場で生じ得る費用の計算が必要とされますが、簿記順序ではこれについても規定しています。<br /><br />具体的には、製品定価は受注価格決定や各科室における収支予算編成のための見積原価として算定されますが、一定期間経過後にはこの見積原価は実際原価と比較されて、その是非について検討されます。<br /><br />また、製品定価は材料費と労務費(物品代価ト労力費)に割賦費および興業資産費償却相当分を加えて決定されます。<br />ここでは価値移転を適切に捉えて原価計算を行おうとする点が見て取れます。<br /><br />何らかの基準を設けて各作業に配賦すべき割賦費についてもその配賦基準について規定したことで簿記順序に比べて精緻な原価計算が可能になったと言えます。
<?php footer(); ?>