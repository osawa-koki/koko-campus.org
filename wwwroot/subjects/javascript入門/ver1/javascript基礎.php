<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-15",
	"updated" => "2022-01-15"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>コメントアウト</h2>
保守性(プログラムの修正のしやすさ)の観点からプログラムコード内にメモ書きをする場合があります。<br />コメントアウトは以下の2種類の方法で書けます。
<ul>
	<li>//～～～</li>
	<li>/*～～～*/</li>
</ul>
<h3>//～～～</h3>
「//」はその行のそれ以降の部分をコメントアウトとします。
<code class="javascript">
	document.getElementById("app").textContent = "I'm ok!";
	 //今日もいい天気だね♪
</code>
<h3>/*～～～*/</h3>
「/**/」は「/*」と「*/」で囲まれた部分全体をコメントアウトとします。<br />この方法はコメントアウトが複数行になってもok!です。
<code class="javascript">
	document.getElementById("app").textContent = "I'm ok!";
	/*
	今日も良い天気だね♪
	そういえば、、、
	昨日もいい天気だったね♪
	*/
</code>
<div class="separator"></div>
コメントアウトはプログラムが修正されることを想定して、コードの書き手がコードの読み手(修正する人)に対するメッセージとして働きます。<br />伝えたいことを端的に書きましょう♪<br />今日の天気について書く必要はありません。
<h2>命令文</h2>
プログラムコードは複数の命令文からなります。<br />各命令文の最後には「;(セミコロン)」を置きます。
<p class="r">javascriptでは自動的に命令文を解釈する機能があるので忘れてもok!です。</p>
<code class="javascript">
	let x, y;
	x = "hello world";
	y = "goodbye world";
</code>
<p class="r">内容は無視してok!です。</p>
<h2>console.log</h2>
先ほどブラウザに表示したコンソール画面にデータを表示します。<br />以下のように記述します。
<code class="javascript">
	console.log(表示したいデータ);
</code>
では実際に以下のコードを書いてブラウザで表示してみましょう♪
<code class="javascript">
	console.log("hello world");
	console.log(1 + 1);
	console.log("happy" + "new" + "year!");
</code>
<script charset="utf-8" type="text/javascript">
	"use strict";
	if (false) {
		console.log("hello world");
		console.log(1 + 1);
		console.log("happy" + "new" + "year!");
	}
</script>
コンソール画面に以下のように表示されたら成功です。
<img src="../pics/console-log.png" alt="console.log" />
<p class="r">内容は理解しなくてok!です。</p>
<h2>変数</h2>
変数とはプログラムを実行する際に使用する一時的なデータを保存するための箱のようなものです。
<img src="../pics/変数.png" alt="変数" />
変数に関しては以下の3つを学びます。
<ul>
	<li>変数の宣言</li>
	<li>変数への代入</li>
	<li>変数の参照</li>
</ul>
<h3>変数の宣言</h3>
変数の宣言とは実際にデータを格納するための箱を作成することです。
<img src="../pics/変数(宣言).png" alt="変数の宣言" />
以下のように記述します。
<code class="javascript">
	let 変数名
	var 変数名
	const 変数名
</code>
「let」「var」「const」で変数の宣言をします。<br />「let」「var」「const」の違いは以下の通りです。
<table>
	<caption>「let」「var」「const」</caption>
	<tbody>
		<tr>
			<th>let</th>
			<td>ブロックスコープを有効とした変数を作成します。<br />ブロックスコープとは「{...}」内で宣言した変数が当該ブロック(「{...}」)内でのみ有効である性質を言います。<br />ブロック内において「let」を用いて変数を宣言した場合は、その変数はそのブロック外からはアクセスできません。<br />通常はこれを用いればok!です。</td>
		</tr>
		<tr>
			<th>var</th>
			<td>ブロックスコープを無効とした変数を作成します。<br />「{...}」内で「var」宣言した変数を当該ブロックの外からアクセスすることができます。</td>
		</tr>
		<tr>
			<th>const</th>
			<td>一度、代入した値を上書きすることができません。<br />間違って変数を上書きしないように設定します。<br />もはや変数とは呼ばないため、定数と呼びこともあります。<br />後ほど説明しますが、変数の宣言と変数への代入を同時に行う必要があります。</td>
		</tr>
	</tbody>
</table>
通常は「let」を用いればok!です。<br />変数名は半角英数字のみ使用可能で、先頭に数字は使用できません。<br />「,(カンマ)」で区切って一度に複数の変数を宣言することもできます。
<code class="javascript">
	let x, y, z; //「x」「y」「z」変数を宣言
</code>
<h3>変数への代入</h3>
宣言した変数に値を代入します。
<img src="../pics/変数(代入).png" alt="変数の代入" />
宣言した変数に値を代入するには以下のように記述します。
<code class="javascript">
	変数名 = 格納する値;
</code>
「=」って「同じ」って思ってしまいますが、プログラミングの世界では右のデータを左の変数に代入することを表します。<br />では、実際に変数に値を代入してみましょう♪
<code class="javascript">
	let x; //「x」変数を宣言
	x = "ぴかちゅう"; //「x」変数に「ぴかちゅう」を代入
</code>
変数の宣言と変数の代入を同時に行うこともできます。
<code class="javascript">
	let x = "ぴかちゅう";
</code>
<p class="r">「const」宣言する場合には必ずこの方法で行う必要があります。</p>
<div class="separator"></div>
変数に既に値が格納されている場合には、新しい値で上書きします。
<code class="javascript">
	let x;
	x = "ぴかちゅう"; //「x」変数に「ぴかちゅう」を代入
	x = "えもんが"; //「x」変数の値を「えもんが」に上書き
</code>
<h3>変数の参照</h3>
変数に格納されている値を取得するには、変数名を書けばok!です。
<img src="../pics/変数(参照).png" alt="変数の参照" />
では実際に変数に値を代入してそれを取得してみましょう♪
<code class="javascript">
	let x; //「x」変数を宣言
	x = "ぴかちゅう"; //「x」変数に「ぴかちゅう」を代入
	console.log(x); //「x」変数の値を出力
</code>
<script charset="utf-8" type="text/javascript">
	"use strict";
	if (false) {
		let x; //「x」変数を宣言
		x = "ぴかちゅう"; //「x」変数に「ぴかちゅう」を代入
		console.log(x); //「x」変数の値を出力
	}
</script>
<img src="../pics/変数-参照.png" alt="変数" />
<h2>データ型</h2>
突然ですが問題です。<br />以下のコードを実行すると何が出力されるでしょうか???
<code class="javascript">
	console.log(1 + 1);
</code>
正解は「2」です。<br />当然ですね♪<br /><br />では次のコードはどうでしょうか???
<code class="javascript">
	console.log("1" + "1");
</code>
「11」と表示されます。
<img src="../pics/1+1.gif" alt="データの型" />
う～ん、、、<br />なぜでしょうか???<br />これにはデータ型を理解する必要があります。<br />データにはそのデータの性質を表す型が存在します。<br />例えば数字であったり、文字列であったり、、、<br />最初にデータ型について紹介します。
<table>
	<caption>データ型</caption>
	<tbody>
		<tr>
			<th>数値型</th>
			<td>数字を表すデータ型です。<br />「1」「10」「25」「99.99」とそのまま書きます。</td>
		</tr>
		<tr>
			<th>文字列型</th>
			<td>複数の文字の集まりを表すデータ型です。<br />「"ぴかちゅう"」「'ピチュー'」と、「"(ダブルクォーテーション)」ないしは「'(シングルクォーテーション)」で囲んで表現します。</td>
		</tr>
		<tr>
			<th>真偽値型</th>
			<td>「true」(真)と「false」(偽)を表します。<br />通常は比較演算の結果として取得しますが、「true」「false」と書くことでも表せます。<br />後述する条件分岐の際に使用します。</td>
		</tr>
		<tr>
			<th>null型</th>
			<td>空のデータを表します。</td>
		</tr>
		<tr>
			<th>undefined型</th>
			<td>変数の宣言はしたが、代入されていない場合のデータ型です。</td>
		</tr>
		<tr>
			<th>シンボル型</th>
			<td>2016年の仕様改正で新しく作られたデータ型で、デバグ目的で使用されるらしいです。<br />僕は使用したことがありません。</td>
		</tr>
	</tbody>
</table>
<h2>演算</h2>
演算には以下の種類があります。
<ul>
	<li>算術演算</li>
	<li>比較演算</li>
	<li>論理演算</li>
</ul>
<h3>算術演算</h3>
足し算・引き算・掛け算・割り算です。<br />足し算と引き算についてはそれぞれ「+」と「-」を用いるのでそのままですが、掛け算と割り算は「&times;」と「&divide;」を用いないことに注意してください。
<table>
	<caption>算術演算</caption>
	<tbody>
		<tr>
			<th>+</th>
			<td>足し算です。<br />「10 + 25」は「35」、「9 + 9」は「18」となります。<br />文字列を結合する際にも用いられます。<br />「"ばなな" + "ジュース"」で「"ばななジュース"」となります。</td>
		</tr>
		<tr>
			<th>-</th>
			<td>引き算です。<br />「25 - 10」は「15」、「10 - 25」は「-15」となります。</td>
		</tr>
		<tr>
			<th>*</th>
			<td>掛け算です。<br />「5 * 2」は「10」、「-2 * 10」は「-20」となります。</td>
		</tr>
		<tr>
			<th>/</th>
			<td>割り算です。<br />「5 / 2」は「2.5」、「7 / 2」は「3.5」となります。</td>
		</tr>
		<tr>
			<th>%</th>
			<td>割り算の余りを求めます。<br />「5 % 2」は「1」、「10 % 7」は「3」となります。</td>
		</tr>
		<tr>
			<th>**</th>
			<td>べき乗を求めます。<br />「3 ** 2」は「9」、「5 ** 2」は「25」となります。</td>
		</tr>
	</tbody>
</table>
<code class="javascript">
	console.log(1 + 1); //「2」と出力
	console.log(1 - 5); //「-4」と出力
	console.log(3 * 3); //「9」と出力
	console.log(20 / 4); //「5」と出力
	console.log(20 % 3); //「2」と出力
	console.log(2 ** 3); //「8」と出力
</code>
<script>
	if (false) {
		console.log(1 + 1); //「2」と出力
		console.log(1 - 5); //「-4」と出力
		console.log(3 * 3); //「9」と出力
		console.log(20 / 4); //「5」と出力
		console.log(20 % 3); //「2」と出力
		console.log(2 ** 3); //「8」と出力
	}
</script>
<h3>比較演算</h3>
2つの値を比較して「true」ないしは「false」を返す演算です。<br />関係演算とも呼ばれます。<br />比較演算には以下の種類があります。
<table>
	<caption>関係演算</caption>
	<tbody>
		<tr>
			<th>&lt;</th>
			<td>「小なり」<br />右の数字が左の数字よりも(同じを含まない)大きければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;=</th>
			<td>「小なりイコール」<br />右の数字が左の数字以上(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>「大なり」<br />右の数字が左の数字よりも(同じを含まない)小さければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;=</th>
			<td>「大なりイコール」<br />右の数字が左の数字以下(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>==</th>
			<td>「イコール(等価演算)」<br />左と右のデータが<span class="u">型は考慮せずに</span>同じであれば「真」、それ以外は「偽」となります。<br />「1 === "1"」は「真」となります。</td>
		</tr>
		<tr>
			<th>===</th>
			<td>「イコール(厳密等価演算子)」<br />左と右のデータが<span class="u">型も含めて</span>同じであれば「真」、それ以外は「偽」となります。<br />「1 === "1"」は数字型と文字型で型が異なるため「偽」となることに注意してください。</td>
		</tr>
		<tr>
			<th>!=</th>
			<td>「ノットイコール(等価演算)」<br />「==」の結果を反転したものです。<br />「1 != "1"」は「偽」となります。</td>
		</tr>
		<tr>
			<th>!==</th>
			<td>「ノットイコール(厳密等価演算)」<br />「===」の結果を反転したものです。<br />「1 !== "1"」は「真」となります。</td>
		</tr>
	</tbody>
</table>
<code class="javascript">
	console.log(1 &lt; 5); //「true」と出力
	console.log(5 &lt; 1); //「false」と出力
	console.log(5 &lt; 5); //「false」と出力
	console.log(5 &lt;= 5); //「true」と出力
	console.log(5 == "5"); //「true」と出力
	console.log(5 === "5"); //「false」と出力
	console.log(5 != "5"); //「false」と出力
	console.log(5 !== "5"); //「false」と出力
</code>
<script>
	if (false) {
		console.log(1 &lt; 5); //「true」と出力
		console.log(5 &lt; 1); //「false」と出力
		console.log(5 &lt; 5); //「false」と出力
		console.log(5 &lt;= 5); //「true」と出力
		console.log(5 == "5"); //「true」と出力
		console.log(5 === "5"); //「false」と出力
		console.log(5 != "5"); //「false」と出力
		console.log(5 !== "5"); //「false」と出力
	}
</script>
なんだか、ややこしいですね、、、
<img src="../pics/等価演算.png" alt="等価演算" />
<h3>論理演算</h3>
「かつ」と「または」による演算です。
<table>
	<caption>論理演算</caption>
	<thead>
		<tr>
			<th>かつ</th>
			<th>または</th>
		</tr>
		<tr>
			<th>&amp;&amp;</th>
			<th>||</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2つの条件式の両方が「真」の場合に「真」、どちらか一方でも「偽」の場合は「偽」となります。</td>
			<td>2つの条件式のいずれか一方でも「真」の場合に「真」、両方とも「偽」の場合は「偽」となります。</td>
		</tr>
	</tbody>
</table>
<img class="no-max" src="../pics/論理演算-結果.png" alt="論理演算" />
また、「!」演算子を用いれば「真」と「偽」を入れ替えることができます。
<img src="../pics/否定演算-結果.png" alt="論理演算" />
<h2>テンプレート文字列</h2>
固定された文字列の複数部分に変数等の評価結果を表示したい場合はテンプレート文字列を使用すると便利です。<br />例えば「僕の名前は〇〇〇で、身長は〇〇〇cmで、好きな食べ物は〇〇〇です。」という文字列の〇〇〇の部分にデータを挿入したい場合にテンプレート文字列を使わずに書くと以下のようになります。
<code class="javascript">
	let word = "僕の名前は" + name + "で、身長は" + height + "cmで、好きな食べ物は" + food + "です。";
</code>
長くて大変ですよね、、、<br />テンプレート文字列を用いれば以下のように書けます。
<code class="javascript">
	let word = `僕の名前は${name}で、身長は${height}cmで、好きな食べ物は${food}です。`;
</code>
テンプレート文字列は「`(バックスラッシュ)」で囲んで、中に挿入したい文字列を「${表示したい式}」という感じで表現します。<br />式とは変数とか関数メソッドの戻り値だと思えばok!です。<br />したがって「${}」の中に関数や演算を入れることもできます。
<code class="javascript">
	let word = `${price}円を税込みで表すと${price * 1.1}円です。`;
</code>
<?php footer(); ?>