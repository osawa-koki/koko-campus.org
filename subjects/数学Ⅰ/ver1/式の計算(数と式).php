<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-18",
	"updated" => "2022-01-18"
);
head($obj);
?>
<h2>はじめに</h2>
初めまして♪<br />私立文系大学生のkokoです♪<br /><br />僕はプログラミングが大好きで大好きでず～とプログラミングしてるんですけど、プログラムを作るのには数学の知識が必要不可欠なんですよね、、、<br />当然作るプログラムによりますけど、、、<br />もともと投資家だったこともあり統計学・確立は得意なんですけど、それ以外が、、、<br />ということで体系的な数学の知識を皆さんと一緒に学ぼうと思ってこのページを作成しました。<br />予定としては2022年の一年間をかけて高校数学の全範囲を総復習しようと思っています。<br /><br />それではLet's dance!!
<h2>整式の基本</h2>
まずは、式に関する用語を確認しましょう♪
<table>
	<caption>式に関する用語</caption>
	<tbody>
		<tr>
			<th>単項式</th>
			<td>数・文字とそれらの積からなる式を言います。<br />「5」「xy」「5xy」</td>
		</tr>
		<tr>
			<th>多項式</th>
			<td>単項式の和からなる式を言います。<br />「x + 5」「5x + 2y」</td>
		</tr>
		<tr>
			<th>整式</th>
			<td>単項式と多項式を合わせたものを言います。</td>
		</tr>
	</tbody>
</table>
では次は整式の整理に関する用語を確認しましょう♪
<table>
	<caption>整式の整理に関する用語</caption>
	<tbody>
		<tr>
			<th>同類項</th>
			<td>文字の部分が同じ項を言います。<br />同類項をまとめることを合算すると言います。</td>
		</tr>
		<tr>
			<th>次数</th>
			<td>各項の次数のうち、最も高いものを言います。<br />「x<sup>3</sup>y<sup>2</sup>」では、xに関する次数は「3」で、yに関する次数は「2」で、xとyに関する次数は「5」す。</td>
		</tr>
		<tr>
			<th>降べきの順</th>
			<td>ある文字について式を整理する際に、次数の高い順に並べることを言います。<br />「x<sup>3</sup> + 2x<sup>2</sup> + 3x + 10」</td>
		</tr>
		<tr>
			<th>昇べきの順</th>
			<td>ある文字について式を整理する際に、次数の低い順に並べることを言います。<br />「「10 + 3x + 2x<sup>2</sup> + x<sup>3</sup>」」</td>
		</tr>
	</tbody>
</table>
<h2>整式の計算</h2>
分配法則と指数法則を覚えましょう♪
<h3>分配法則</h3>
多項式に関する乗法です。
<ul>
	<li>A(B + C) = AB +  AC</li>
	<li>(A + B)C = AB + AC</li>
</ul>
<h3>指数法則</h3>
単項式に関する乗法です。
<ul>
	<li>a<sup>m</sup> &times; a<sup>n</sup> = a<sup>m + n</sup></li>
	<li>(a<sup>m</sup>)<sup>n</sup> = a<sup>mn</sup></li>
	<li>(ab)<sup>n</sup> = a<sup>n</sup>b<sup>n</sup></li>
</ul>
<h2>乗法公式</h2>
整式の展開において使用します。
<h2>2次の乗法公式</h2>
<ul>
	<li>(a + b)<sup>2</sup> = a<sup>2</sup> + 2ab + b<sup>2</sup></li>
	<li>(a - b)<sup>2</sup> = a<sup>2</sup> - 2ab + b<sup>2</sup></li>
	<li>(a + b)(a - b) = a<sup>2</sup> - b<sup>2</sup></li>
	<li>(x + a)(x + b) = x<sup>2</sup> + (a + b)x + ab</li>
	<li>(ax + b)(cx + b) = acx<sup>2</sup> + (ad + bc)x + bd</li>
	<li>(a + b + c)<sup>2</sup> = a<sup>2</sup> + b<sup>2</sup> + c<sup>2</sup> + 2ab + 2bc + 2ca</li>
</ul>
「(a + b + c)<sup>2</sup> = a<sup>2</sup> + b<sup>2</sup> + c<sup>2</sup> + 2ab + 2bc + 2ca」の「2ab + 2bc + 2ca」の並びは輪環の順と呼びます。
<img src="../pics/輪環の順.png" alt="輪環の順" />
<h3>3次の乗法公式</h3>
<ul>
	<li>(a + b)<sup>3</sup> = a<sup>3</sup> + 3a<sup>2</sup>b + 3ab<sup>2</sup> + b<sup>3</sup></li>
	<li>(a - b)<sup>3</sup> = a<sup>3</sup> - 3a<sup>2</sup>b + 3ab<sup>2</sup> - b<sup>3</sup></li>
	<li>(a + b)(a<sup>2</sup> - ab + b<sup>2</sup>) = a<sup>3</sup> + b<sup>3</sup></li>
	<li>(a - b)(a<sup>2</sup> - ab + b<sup>2</sup>) = a<sup>3</sup> - b<sup>3</sup></li>
</ul>
<h2>因数分解</h2>
因数分解のパターンは大きく以下の3つに分類されます。
<ul>
	<li>共通因数のくくりだし</li>
	<li>公式による因数分解</li>
	<li>たすき掛けによる因数分解</li>
</ul>
<h3>共通因数のくくりだし</h3>
「5x + xy」は「x」が共通しているため、これをくくりだします。<br />「x(5 + y)」となります。
<h3>公式による因数分解</h3>
乗法公式の逆バージョンです。
<ul>
	<li>a<sup>2</sup> + 2ab + b<sup>2</sup> = (a + b)<sup>2</sup></li>
	<li>a<sup>2</sup> - 2ab + b<sup>2</sup> = (a - b)<sup>2</sup></li>
	<li>a<sup>2</sup> - b<sup>2</sup> = (a + b)(a - b)</li>
	<li>x<sup>2</sup> + (a + b)x + ab = (x + a)(x + b)</li>
	<li>acx<sup>2</sup> + (ad + bc)x + bd = (ax + b)(cx + b)</li>
	<li>a<sup>2</sup> + b<sup>2</sup> + c<sup>2</sup> + 2ab + 2bc + 2ca = (a + b + c)<sup>2</sup></li>
</ul>
が適用できないかどうかチェックします。<br />「x<sup>2</sup> - 10x + 25」は「a<sup>2</sup> - 2ab + b<sup>2</sup> = (a - b)<sup>2</sup>」より、「(x - 5)<sup>2</sup>」となります。
<h3>たすき掛けによる因数分解</h3>
「Ax<sup>2</sup> + Bx + C」に関するたすき掛けの因数分解の方法は以下の3つの過程を踏みます。
<ol>
	<li>「A = ac」となる数aとcを求める</li>
	<li>「C = bd」となる数bとdを求める</li>
	<li><「ad + bc」がBと一致するかチェック/li>
</ol>
<img src="../pics/たすき掛け.png" alt="たすき掛け" />
<h2>特殊な因数分解</h2>
特殊な因数分解の方法として以下の3つを覚えましょう♪
<ul>
	<li>2文字以上の式の因数分解</li>
	<li>文字の置き換えを利用する因数分解</li>
	<li>複2次式の因数分解</li>
</ul>
<h3>2文字以上の式の因数分解</h3>
2文字以上の式の因数分解は、最も次数が低い文字に関して降べきの順に並び替えてから因数分解をします。
<div class="solution">
	2a<sup>2</sup>b - 3ab + a - 2b - 2
	= (2a<sup>2</sup> - 3a - 2)b + (a - 2)
	= (a - 2)(2a + 1)b + (a - 2)
	= (a - 2){(2a + 1)b + 1}
	= (a - 2)(2ab + b + 1)
</div>
<div class="solution">
	a(b<sup>2</sup> - c<sup>2</sup>) + b(c<sup>2</sup> - a<sup>2</sup>) + c(a<sup>2</sup> - b<sup>2</sup>)
	...展開してaに関して降べきの順」に整理
	= -(b - c)a<sup>2</sup> + (b<sup>2</sup> - c<sup>2</sup>)a - b<sup>2</sup>c + bc<sup>2</sup>
	= -(b - c)a<sup>2</sup> + (b + c)(b - c)a - bc(b - c)
	= -(b - c){a<sup>2</sup> - (b + c)a + bc}
	= -(b - c)(b - c)(c - a)
	= (a - b)(b - c)(c - a)
</div>
<h3>文字の置き換えを利用する因数分解</h3>
ひとつの整式に同じ部分が複数回登場すれば、これを他の文字に置き換えて因数分解をします。
<div class="solution">
	(x<sup>2</sup> - x)(x<sup>2</sup> - x - 32) + 60
	...x<sup>2</sup> - x = Xと置く
	= X(X - 32) + 60
	= X<sup>2</sup> - 32X - 60
	= (X - 2)(X - 30)
	= (x<sup>2</sup> - x - 2)(x<sup>2</sup> - x - 30)
	= (x + 1)(x - 2)(x + 5)(x - 6)
</div>
<h3>複2次式の因数分解</h3>
これも二乗の部分を他の文字に置き換えて因数分解をします。
<div class="solution">
	x<sup>4</sup> + x<sup>2</sup>y<sup>2</sup> + y<sup>4</sup>
	...x<sup>2</sup>をXと、y<sup>2</sup>をYと置く
	= X<sup>2</sup> + XY + Y<sup>2</sup>
	= (<sup>2</sup> + 2XY + Y<sup>2</sup>) - XY
	= (X + Y)<sup>2</sup> - XY
	= (X + Y)<sup>2</sup> - (xy)<sup>2</sup>
	= {(X + Y) + xy}{(X + Y) - xy}
	= (x<sup>2</sup> + xy + y<sup>2</sup>)(x<sup>2</sup> - xy + y<sup>2</sup>)
</div>
<?php footer(); ?>