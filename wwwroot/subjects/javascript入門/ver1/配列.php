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
<h2>配列</h2>
変数がプログラムを操作させるのに必要な一時的なデータを格納することは理解できましたか???<br />今度は大量のデータを保存することを考えてください。<br />例えば、図鑑番号1から25までの全てのポケモンの名前を変数に保存するにはどうしましょうか???<br />全ての変数を宣言していたら日が明けてしまいます、、、
<code class="javascript">
	let pokemon1 = "フシギダネ";
	let pokemon2 = "フシギソウ";
	let pokemon3 = "フシギバナ";
	let pokemon4 = "ヒトカゲ";
	let pokemon5 = "リザード";
	//...
</code>
このような複数のデータを包括して保存するためには配列を使用します。
<img src="../pics/配列.png" alt="配列" />
<h2>配列の定義</h2>
配列は「[](スクエアブラケット)」を使用して定義します。<br />要素は「,(カンマ)」で区切って表現します。
<code class="javascript">
	let pokemon = [
		"フシギダネ",
		"フシギソウ",
		"フシギバナ",
		"ヒトカゲ",
		"リザード"
	];
</code>
配列内で改行しているのは見やすくするためです。<br />改行せずに以下のように書いてもoK!です。
<code class="javascript">
	let pokemon = ["フシギダネ", "フシギソウ", "フシギバナ", "ヒトカゲ", "リザード"];
</code>
<h2>配列の要素へのアクセス</h2>
配列内の要素は「0」から始まるインデックス番号で管理されます。<br />「0」から始まることに注意してください。<br />配列の要素には以下のようにアクセスします。
<code class="javascript">
	pokemon[0] //pokemon配列の「1」番目の要素にアクセス
	pokemon[1] //pokemon配列の「2」番目の要素にアクセス
	pokemon[2] //pokemon配列の「3」番目の要素にアクセス
	pokemon[3] //pokemon配列の「4」番目の要素にアクセス
	pokemon[4] //pokemon配列の「5」番目の要素にアクセス
</code>
では先ほど定義した配列をひとつずつコンソール画面に表示してましょう♪
<code class="javascript">
	let pokemon = [
		"フシギダネ",
		"フシギソウ",
		"フシギバナ",
		"ヒトカゲ",
		"リザード"
	];
	console.log(pokemon[0]);
	console.log(pokemon[1]);
	console.log(pokemon[2]);
	console.log(pokemon[3]);
	console.log(pokemon[4]);

	/* &darr; コンソール画面 &darr;
	フシギダネ
	フシギソウ
	フシギバナ
	ヒトカゲ
	リザード
	*/
</code>
配列の要素を変更することもできます。
<code class="javascript">
	let pokemon = [
		"フシギダネ",
		"フシギソウ",
		"フシギバナ",
		"ヒトカゲ",
		"リザード"
	];
	pokemon[3] = "ひとかげ♪";
	console.log(pokemon[3]);

	/* &darr; コンソール画面 &darr;
	ひとかげ♪
	*/
</code>
<h2>配列の走査</h2>
走査とは配列の要素をひとつずつ取り出して処理をすることを言います。<br />配列の走査には以下の2つの方法があります。
<ul>
	<li>for</li>
	<li>for of</li>
	<li>forEach</li>
</ul>
<h3>for</h3>
forループは既に<a href="文法">文法</a>の授業で学習済みですね♪<br />これを用いて配列の要素をひとつずつ取り出します。<br />「配列.length」で配列の要素数を取得できるため、これを用いてループの回数を指定します。<br />では、配列の各要素からリストを作成してhtmlに追加しましょう♪
<code class="html">
	&lt;ul id="parent"&gt;&lt;/ul&gt;
</code>
<code class="javascript">
	let pokemon = [
		"フシギダネ",
		"フシギソウ",
		"フシギバナ",
		"ヒトカゲ",
		"リザード",
		"リザードン",
		"ゼニガメ",
		"カメール",
		"カメックス"
	];
	let parent = document.getElementById("parent");
	for (let i = 0; i < pokemon.length; i++) {
		let elm = document.createElement("li");
		elm.textContent = pokemon[i];
		parent.appendChild(elm);
	}
</code>
<img class="no-max" src="../pics/配列-for.gif" alt="配列の走査(forループ)" />
<h3>for of</h3>
forによる配列の走査の進化バージョンだと思ってください。<br />以下のように書きます。
<code class="javascript">
	for (let k in 配列) {
		//要素は「k」に格納される
	}
</code>
では、「for of」を用いて先ほどの普通のforを書き換えてみましょう♪
<code class="javascript">
	let pokemon = [
		"フシギダネ",
		"フシギソウ",
		"フシギバナ",
		"ヒトカゲ",
		"リザード",
		"リザードン",
		"ゼニガメ",
		"カメール",
		"カメックス"
	];
	let parent = document.getElementById("parent");
	for (let k of pokemon) {
		let elm = document.createElement("li");
		elm.textContent = k;
		parent.appendChild(elm);
	}
</code>
<img class="no-max" src="../pics/配列の走査(for-of).gif" alt="配列の走査" />
<h3>forEach</h3>
配列の要素を即時関数の引数に渡して実行されます。<br />即時関数とは名前がなくて、すぐに実行される関数です。<br />ここでは覚えなくてもok!です。<br />以下のように記述します。
<code class="javascript">
	配列.forEach(e => { //配列の要素をひとつずつ取り出して「e」に代入して関数を実行
		//配列の各要素の対して行う処理...
	});
</code>
ここではアロー関数を用いていますが、通常の関数を用いて以下のように書くこともできます。
<code class="javascript">
	配列.forEach(function(e) { //配列の要素をひとつずつ取り出して「e」に代入して関数を実行
		//配列の各要素の対して行う処理...
	});
</code>
forループと異なり、「配列[インデックス番号]」が「e」にそのまま代入されます。<br />では先ほどと同じ処理をforEachを用いて行いましょう♪
<code class="html">
	&lt;ul id="parent"&gt;&lt;/ul&gt;
</code>
<code class="javascript">
	let pokemon = [
		"フシギダネ",
		"フシギソウ",
		"フシギバナ",
		"ヒトカゲ",
		"リザード",
		"リザードン",
		"ゼニガメ",
		"カメール",
		"カメックス"
	];
	let parent = document.getElementById("parent");
	pokemon.forEach(e => {
		let elm = document.createElement("li");
		elm.textContent = e;
		parent.appendChild(elm);
	});
</code>
<img class="no-max" src="../pics/配列-forEach.gif" alt="配列の走査(forEach)" />
<h2>要素の追加</h2>
配列に要素を追加する方法には以下の3通りあります。
<ul>
	<li>push</li>
	<li>unshift</li>
	<li>splice</li>
</ul>
<h3>push</h3>
配列の最後に要素を追加します。<br />破壊的なメソッドであるため、元の配列を変更します。
<p class="r">破壊的メソッドとは、データから戻り値を取得することを目的とするのではなく、データ自体を変更するメソッドです。</p>
<code class="html">
	&lt;ul id="parent"&gt;&lt;/ul&gt;
</code>
<code class="javascript">
	let pokemon = [
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ"
	];
	pokemon.push("ピカチュウ"); //配列の最後に「ピカチュウ」を追加
	let parent = document.getElementById("parent");
	pokemon.forEach(e => {
		let elm = document.createElement("li");
		elm.textContent = e;
		parent.appendChild(elm);
	});
</code>
<img class="no-max" src="../pics/push.gif" alt="pushメソッド" />
<h3>unshift</h3>
配列の先頭に要素を追加します。<br />これもpushメソッド同様に破壊的なメソッドであるため、元の配列を変更します。
<code class="html">
	&lt;ul id="parent"&gt;&lt;/ul&gt;
</code>
<code class="javsscript">
	let pokemon = [
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ"
	];
	pokemon.unshift("ピカチュウ"); //配列の先頭に「ピカチュウ」を追加
	let parent = document.getElementById("parent");
	pokemon.forEach(e => {
		let elm = document.createElement("li");
		elm.textContent = e;
		parent.appendChild(elm);
	});
</code>
<img class="no-max" src="../pics/unshift.gif" alt="unshiftメソッド" />
<h3>splice</h3>
任意の位置に配列の要素を追加します。<br />先頭・最後に追加することも可能ですが、原則としてpushメソッドとunshiftメソッドで追加できない先頭・最後以外に追加する際に用いるべきです。<br />以下のように書きます。
<code class="javascript">
	配列.splice(追加する位置, 0, 追加する要素1, 追加する要素2, ...);
</code>
spliceメソッドは要素の削除・置換・追加全てに使用できます。<br />第二引数は削除する要素の数を指定するため、追加するだけなら「0」に設定します。<br />破壊的メソッドですので、元の配列を変更します。
<code class="html">
	&lt;ul id="parent"&gt;&lt;/ul&gt;
</code>
<code class="javsscript">
	let pokemon = [
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ"
	];
	pokemon.splice(1, 0, "ピカチュウ", "エモンガ"); //配列の二番目に「ピカチュウ」と「エモンガ」を追加
	let parent = document.getElementById("parent");
	pokemon.forEach(e => {
		let elm = document.createElement("li");
		elm.textContent = e;
		parent.appendChild(elm);
	});
</code>
<img class="no-max" src="../pics/splice(追加).gif" alt="spliceメソッド" />
<h2>要素の削除</h2>
配列から要素を削除する方法には以下の3通りあります。
<ul>
	<li>pop</li>
	<li>shift</li>
	<li>splice</li>
</ul>
<h3>shift</h3>
配列の先頭の要素を削除します。<br />破壊的メソッドですので、元の配列を変更します。
<code class="html">
	&lt;ul id="parent"&gt;&lt;/ul&gt;
</code>
<code class="javsscript">
	let pokemon = [
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ",
		"ピカチュウ"
	];
	pokemon.shift(); //配列の先頭の要素を削除
	let parent = document.getElementById("parent");
	pokemon.forEach(e => {
		let elm = document.createElement("li");
		elm.textContent = e;
		parent.appendChild(elm);
	});
</code>
<img class="no-max" src="../pics/shift.gif" alt="shiftメソッド" />
<h3>pop</h3>
配列の最後の要素を削除します。<br />破壊的メソッドですので、元の配列を変更します。
<code class="html">
	&lt;ul id="parent"&gt;&lt;/ul&gt;
</code>
<code class="javsscript">
	let pokemon = [
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ",
		"ピカチュウ"
	];
	pokemon.pop(); //配列の最後の要素を削除
	let parent = document.getElementById("parent");
	pokemon.forEach(e => {
		let elm = document.createElement("li");
		elm.textContent = e;
		parent.appendChild(elm);
	});
</code>
<img class="no-max" src="../pics/pop.gif" alt="popメソッド" />
<h3>splice</h3>
spliceメソッドは既に説明済みですね♪<br />削除・置換・追加全てを行えるメソッドです。<br />追加する要素はないため、第三引数以降は設定しません。<br />破壊的メソッドであるため、元の配列を変更します。
<code class="javascript">
	配列.splice(削除する位置, 削除する要素数);
</code>
では、三番目の要素であるゼニガメを削除してみましょう♪
<p class="r">ゼニガメが嫌いなわけではありません。<br />ポケモンは全部大好きです。</p>
<code class="html">
	&lt;ul id="parent"&gt;&lt;/ul&gt;
</code>
<code class="javsscript">
	let pokemon = [
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ",
		"ピカチュウ"
	];
	pokemon.splice(2, 1); //配列の三番目の要素を削除
	let parent = document.getElementById("parent");
	pokemon.forEach(e => {
		let elm = document.createElement("li");
		elm.textContent = e;
		parent.appendChild(elm);
	});
</code>
<img class="no-max" src="../pics/splice(削除).gif" alt="spliceメソッド" />
<?php footer(); ?>