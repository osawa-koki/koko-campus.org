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
<h2>数的な処理</h2>
既に簡単な四則演算は学びましたね♪<br />ここでは少し高度な数的な処理について学びましょう♪<br />以下の処理を学びます。
<ul>
	<li>小数点以下切り上げ</li>
	<li>小数点以下切り捨て</li>
	<li>小数点以下四捨五入</li>
	<li>最大値の取得</li>
	<li>最小値の取得</li>
	<li>乱数</li>
	<li>平方根</li>
</ul>
<h2>小数点以下切り上げ</h2>
Mathオブジェクトのceilメソッドを使用します。
<code class="javascript">
	console.log(Math.ceil(5.5)); //「6」
	console.log(Math.ceil(1.0)); //「1」
	console.log(Math.ceil(-3.2)); //「-3」
</code>
小数点以外を基準にして切り上げをしたい場合は、10<sup>n</sup>で割って基準が小数点以下になるように設定して、その後逆の演算をします。<br />例えば百の位以下を切り上げるには以下のように記述します。
<code class="javascript">
	console.log(Math.ceil(123456 / 1000) * 1000); //「124000」
</code>
<h2>小数点以下切り捨て</h2>
Mathオブジェクトのfloorメソッドを使用します。
<code class="javascript">
	console.log(Math.floor(5.5)); //「5」
	console.log(Math.floor(1.0)); //「1」
	console.log(Math.floor(-3.2)); //「-4」
</code>
小数点以外を基準にして切り捨てをしたい場合は、10<sup>n</sup>で割って基準が小数点以下になるように設定して、その後逆の演算をします。<br />例えば百の位以下を切り捨てるには以下のように記述します。
<code class="javascript">
	console.log(Math.floor(123456 / 1000) * 1000); //「123000」
</code>
<h2>小数点以下四捨五入</h2>
Mathオブジェクトのfloorメソッドを使用します。
<code class="javascript">
	console.log(Math.round(5.5)); //「6」
	console.log(Math.round(1.0)); //「1」
	console.log(Math.round(-3.2)); //「-3」
</code>
小数点以外を基準にして四捨五入をしたい場合は、10<sup>n</sup>で割って基準が小数点以下になるように設定して、その後逆の演算をします。<br />例えば百の位以下を四捨五入するには以下のように記述します。
<code class="javascript">
	console.log(Math.round(123456 / 1000) * 1000); //「123000」
</code>
<h2>最大値の取得</h2>
Mathオブジェクトのmaxメソッドを使用します。<br />引数に与えた数値のうち、最大のものを戻り値として返します。
<code class="javascript">
	console.log(Math.max(-10, 2, 5, -1, 25)); //「25」
</code>
<h2>最小値の取得</h2>
Mathオブジェクトのminメソッドを使用します。<br />引数に与えた数値のうち、最小のものを戻り値として返します。
<code class="javascript">
	console.log(Math.min(-10, 2, 5, -1, 25)); //「-10」
</code>
<h2>乱数</h2>
Mathオブジェクトのrandomメソッドを使用します。<br />「0」以上、「1」未満の乱数を返すため、乱数の範囲を指定したい場合にはこれを加工する必要があります。<br />例えばサイコロの目を乱数で出したい場合は以下のコードを書きます。
<code class="javascript">
	Math.floor(Math.random() * 6) + 1;
</code>
<img class="no-max" src="../pics/random.gif" alt="random" />
<h2>平方根</h2>
Mathオブジェクトのsqrtメソッドを使用します。
<code class="javascript">
	console.log(Math.sqrt(2)); //「1.4142135623730951」
	console.log(Math.sqrt(3)); //「1.7320508075688772」
	console.log(Math.sqrt(4)); //「2」
	console.log(Math.sqrt(5)); //「2.23606797749979」
	console.log(Math.sqrt(15241578750190520)); //「123456789」
</code>
<h2>誤差</h2>
コンピュータって我々と異なり、2進数を採用しているので我々が用いている10進数の演算を行うと若干の誤差が生じる場合があります。<br />例えば、以下のコードを見てください。
<img class="no-max" src="../pics/誤差.gif" alt="誤差" />
実際のところ、どうしようもないです、、、<br />c/c++なら精度を指定することもできるのですが、、、<br />ミサイルの弾道計算でもしない限りは問題ありませんし、そもそもjavascriptでそんな計算は行いません。<br />一応こんなことがあるんだな、程度に覚えておいてください。<br />演算結果を表示する際に「0.30000000000000004」ってなってしまうと見栄えが悪いので切り捨て・切り上げ・四捨五入等の適切な処理を行ってください。
<h2>数値変換</h2>
文字列として受け取った数字を数字型として扱うには型変換を行う必要があります。<br />例えば、ユーザがフォームに入力した数字を取得すると文字列型の数字として取得されるため、これに算術演算を行うには数字型に変換しなければなりません。<br />文字列を数字に変換する方法は以下の2通りあります。
<ul>
	<li>parseInt</li>
	<li>parseFloat</li>
</ul>
<h3>parseInt</h3>
文字列型を整数型に変換します。
<code class="javascript">
	const x = "1";
	const y = 1;

	console.log(x + y); //「11」
	console.log(parseInt(x) + y); //「2」
</code>
<img class="no-max" src="../pics/parseInt.gif" alt="parseInt" />
小数点以下は切り捨てられるので注意が必要です。<br />Math.floorの代わりに使用する人もいますが、保守性の簡単から避けるべきでしょう。
<code class="javascript">
	const pai = 3.1415;

	console.log(parseInt(pai)); //「3」
</code>
<h3>parseFloat</h3>
文字列型を小数点数型に変換します。
<code class="javascript">
	const x = "3.14";
	const y = 1.23;

	console.log(x + y); //「3.141.23」
	console.log(parseInt(x) + y); //「4.23」
	console.log(parseFloat(x) + y); //「4.37」
</code>
<img class="no-max" src="../pics/parseFloat.gif" alt="parseFloat" />
<div class="separator"></div>
反対に数字型を文字列型に変換するにはtoStringメソッドを使用します。
<code class="javascript">
	const x = 12345;
	const y = 67890;

	console.log(x + y);
	console.log(x.toString() + y.toString());
</code>
<img class="no-max" src="../pics/toString.gif" alt="toString" />
<h2>表示桁指定</h2>
小数点以下を何桁まで表示するかはtoFixedメソッドを使用します。<br />引数に小数点以下何桁まで表示するかを指定します。
<code class="javascript">
	const pai = 3.14159265;
	console.log(pai.toFixed(0)); //「3」
	console.log(pai.toFixed(2)); //「3.14」
	console.log(pai.toFixed(5)); //「3.14159」
	console.log(pai.toFixed(100)); //「3.1415965...」
</code>
<img class="no-max" src="../pics/toFixed.gif" alt="toFixed" />
引数に大きな値を渡すと想定しない結果を返します。
<?php footer(); ?>