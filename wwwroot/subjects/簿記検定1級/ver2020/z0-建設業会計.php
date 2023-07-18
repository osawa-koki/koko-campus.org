<?php
include("common.php");
head("建設業会計");
?>
<h2>建設業会計勘定一覧</h2>
<div class="we">
	!建設業会計勘定一覧!
	#未成工事受入金
	建設業会計における前受金を言います。<br>建設期間が長期の際に工事完成前に受け取った代金の一部を記録する勘定です。
	#未成工事支出金
	建設業会計における仕掛品を言います。<br>当期の建設に際して発生した費用を記録します。<br>(材料費・労務費・経費を振り替える)
	#完成工事高
	総収益に当期の建設進捗度の割合をかけて算出した値から当期に計上すべき収益を計上します。
	#完成工事未収入金
	建設業会計における売掛金を言います。<br>完成した建設のうち代金を回収していない部分を記録します。
	#完成工事高
	完成工事高(収益)に対応する費用を計上します。
</div>
<h2>建設業会計での収益認識基準</h2>
建設業会計においては実現主義要件である「商品の引渡し」と「現金または現金同等物の受取り」を満たした時点である完成時に収益を計上する<span class="u">工事完成基準</span>だけでなく、費用収益対応の原則の観点から工事の進捗度に合わせた収益を毎期計上する<span class="u">「工事進行基準」</span>も採用されます。<br><br>通常は工事進行基準が採用されるため、以下では工事進行基準を想定して説明します。<br>
<span class="r">
	!費用収益対応の原則!
	?ある会計期間に得た収益とその収益を得るために費やした費用の認識期間を一致させることを要求する原則です。?
</span>
<h2>建設業会計の会計処理</h2>
<h3>工事代金受け取り時</h3>
<p>工事代金を先に受け取る場合は負債としての性格を有するため一般には前受金として記録されますが、建設業会計においては<strong>未成工事受入金</strong>として記録されます。</p>
<div class="t">
	!工事代金受け取り時!
	現金300,未成工事受入金300
</div>
<h3>決算時</h3>
<p>決算時には以下の3つの処理を行います。</p>
<ol>
	<li>原価発生額の振り替え</li>
	<li>工事収益の計上</li>
	<li>工事原価の計上</li>
</ol>
<div class="t">
	!1.原価発生額の振り替え!
	未成工事支出金500,材料費250
	,労務費100
	,経費50
</div>
<div class="t">
	!2.工事収益の計上!
	#完成工事高を算出した後に、これに対して未成工事受入金を充当した後に不足分は完成工事未収入金として処理します。#
	未成工事受入金800,完成工事高1500
	完成工事未収入金700,
</div>
<div class="f">
	!工事収益の算出方法!
	<div class="scrollx">
		<div class="nowrap scrollx">
			<span class="ib"><span class="u">当期までの</span>工事収益 = 工事収益総額 &times; </span>
			<span class="fraction">
				<span class="fraction_n"><span class="u">当期までに</span>発生した実際工事原価</span>
				<span class="fraction_d">工事原価総額</span>
			</span>
		</div>
	</div>
	(原価比例法)
</div>
<div class="t">
	!3.工事原価の計上!
	#(1)の処理で振り替えた原価を計上します。#
	完成工事原価500,未成工事支出金500
</div>
<h3>引渡し時</h3>
<p>引渡し時は、残高分を計算した後に決算時の処理3つを行います。</p>
<h2>見積り変更時の処理</h2>
<p>工事原価総額・工事収益総額が変更された場合には、変更<span class="u">後</span>の値を用いて計算します。</p>

<?php footer(); ?>