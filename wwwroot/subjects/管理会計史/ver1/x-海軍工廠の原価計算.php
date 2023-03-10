<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-11-22",
	"updated" => "2021-11-22"
);
head($obj);
?>
<h2>海軍工廠での原価計算の問題点</h2>
海軍はその性質上収益をあげることができないため、作業費会計に従った独立採算ではない他の会計制度を整える必要がありました。
<br /><br />
<p class="r">海軍工廠とは海軍用の軍需品を管理する機関を言います。</p>
<br />
明治憲法の同時に会計法・会計規則が制定されたことにより、会計法上で特別会計の設置が明確に規定されましたが、当時の明治政府の政策であった富国強兵策によって軍備の拡大は進められて、これによる支出を補うため海軍に係る費用が特別会計から一般会計へと移されました。<br /><br />それ以外にも海軍工廠での原価計算に関する規定として、「横須賀海軍工廠製造品価額計算法」と「海軍工作庁工事費整理規則」が制定されました。
<h2>横須賀海軍工廠製造品価額計算法</h2>
横須賀海軍工廠とは、海軍の鎮守府の4大地方官庁のうちの最大の機関でした。<br /><br />横須賀海軍工廠では明治13年に製造品価額計算法が制定されて工事費整理に関する規定がなされました。
<h3>特徴</h3>
横須賀海軍工廠製造品価額計算法の特徴は直接材料費と直接労務費に間接費と利益を加算して製品価額を算出したことにあります。
<h2>工事費整理規定</h2>
横須賀海軍工廠製造品価額計算法には工事費の整理規定に関して以下の3つの規定が制定されて、より詳細な原価計算の制度が整えられました。
<br />
<ul>
	<li>造船工務規程</li>
	<li>海軍工廠工務規程</li>
	<li>海軍工務規則</li>
</ul>
<br />
<h3>造船工務規程</h3>
鎮守府が行うべき報告が規定しています。<br />これにより工事費に関する報告書を要求しています。<br /><br />造船工務規程では機械使用料という概念を採用していて、この考え方は製造間接費(付属費)の機械運転時間などを基準とした配賦法へと転化する基本的な考え方であると言えます。<br /><br />この手法は現代原価計算でいう、製造間接費の配賦に該当します。
<h3>海軍工廠工務規程</h3>
基本的な規定は造船工務規程と同様ですが、工賃の計算においては工数に関する規定を新たに採用しています。<br /><br />これによって一人の工員が複数の工事にかかわる場合においても、その価値移転を適切に把握して製品に移転することで正確な原価計算を可能にしています。
<h3>海軍工務規則</h3>
造船工務規程・海軍工廠工務規程の最終形態として機能し、材料費・労務費をベースとした原価計算による報告を要求しています。
<h2>馬公要港部修理工場工務規則施行細則</h2>
工事費は材料費・工費（労務費）から構成され、基本的には個別原価の集計である個別原価計算が規定されていますが、間接費の計算規定はなく、直接費の集計のみの規定となっています。
<h2>横須賀海軍工廠工事施行及工事費整理手続における工事費整理規定</h2>
材料費・工費(労務費)・間接費から構成される工事費に関する個別原価計算を規定しています。
<p class="r">個別原価計算という用語は用いていませんが、その性質上個別原価計算の原初的形態であったと言えます。</p>
<br />
また、工事には必ず番号を定めてこれに基づいて工事費整理を行い、共通して生じた附属費は定額で各工事に配賦しています。<br /><br />この手法は現代原価計算でいう、製品別計算に該当します。<br />この製品別計算は適切な原価計算のために絶対必要とされる技法であり、この規定によって日本の原価計算が大きく進展したと言えます。
<h2>海軍工作庁工事費整理規則</h2>
ワシントン条約(軍縮条約)によって日本海軍は艦政予算を著しく削減することを余儀なくされたことによって、できる限り建造費を切り詰めて廉価でしかも優秀な艦船の建造のために原価計算の必要性が高まりました。<br /><br />これによって原価計算での以下の3つの技法が完成されたと言えます。
<br />
<ul>
	<li>費目別計算</li>
	<li>製造間接費の配賦</li>
	<li>製品別計算</li>
</ul>
<br />
またこれ以降、工事費整理の目的は支出報告から予算編成とその決算へと変わっていきます。
<?php footer(); ?>