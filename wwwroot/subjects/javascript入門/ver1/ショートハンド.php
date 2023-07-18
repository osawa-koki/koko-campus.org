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
<h2>ショートハンド</h2>
ショートハンドとは冗長なコードを簡潔に書くための方法です。<br />ここまでこれた皆さんなら、動けばok!ではなく、コードを綺麗に見やすく書くことも意識しましょう♪<br />動けばok!って感じで汚いコードを書いていると後々、コードを修正する際に大変ですからね、、、<br />ここでは以下の記法を紹介します。
<ul>
	<li>三項演算子</li>
	<li>即時関数</li>
	<li>連即変数宣言</li>
	<li>falsy代入短絡評価</li>
</ul>
<h2>三項演算子</h2>
使用する値を条件式によって分ける場合に使用します。<br />これはifを用いて書くと長くなるので以下のように書きます。
<code class="javascript">
	(条件式) ? 真の場合の値 : 偽の場合の値
</code>
例えば条件式(i &lt; 10)を満たせば変数「x」に「ok」を代入、満たさなければ変数「x」に「ng」を代入する場合にifを用いると以下のコードとなります。
<code class="javascript">
	let x;
	if (i &lt; 10) {
		x = "ok";
	} else {
		x = "ng";
	}
</code>
長いですね、、、<br />三項演算子を用いれば以下のように書けます。
<code class="javascript">
	let x = (i &lt; 10) ? "ok" : "ng";
</code>
簡単ですね♪<br />三項演算子を連鎖させることも可能です。
<code class="javascript">
	(条件式1) ? "super ok" : (条件式2) ? "ok" : "bad";
</code>
三項演算子を連鎖させすぎると見ずらくなるので長い連鎖は避けましょう。<br />また、三項演算子の評価結果は式であるため、変数の代入以外にも使用できます。
<code class="javascript">
	//「i」が真か偽かでfx関数に渡す引数を変更
	fx((i) ? "ok" : "ng");
</code>
<h2>即時関数</h2>
関数って処理をまとめてどこからでも簡単に呼び出せるのが一番の目的ですけど、二次効果として変数にスコープを設けてくれます。<br />これによって変数が重複して上書してしまう危険性が排除されます。<br />この二次効果だけを求めて作成するのが即時関数です。<br />別名、「無名関数」です。<br />名前がないため、他の場所から呼び出して実行することはできません。<br />使用は一度きりです。<br />あくまでも変数の汚染防止目的で使用します。
<code class="javascript">
	(function() {
		//即時関数の中身
	})();
</code>
この中で宣言した変数はこの関数外部に影響を及ぼさないため、変数の汚染を防ぎます。<br />さらには処理をまとめてくれるため、コードが見やすくなるという利点もあります。<br />アロー関数を用いた即時関数も作成できます。
<code class="javascript">
	(() => {
		//即時関数の中身
	})();
</code>
<h2>連即変数宣言</h2>
javascriptは変数の巻き上げという他の言語と大きく異なる使用が存在します。
<p class="r">変数の巻き上げの説明は<a href="../../../blog/index?date=20211209">こちら</a>。</p>
変数の巻き上げについてここで深く理解する必要はありませんが、使用する変数は当該スコープの先頭でまとめて宣言するようにすれば変数の巻き上げについて意識する必要はなくなります。<br />変数は最初にまとめて「,(カンマ)」で区切って宣言することでコードが綺麗になります。
<code class="javascript">
	function fx() {
		//使用する変数は最初にまとめて宣言
		const a = 10,
			b = 25,
			c = 99;
		let x = "あ";
			y = "い";
			z = "う";

		//関数内の処理
	}
</code>
<h2>falsy代入短絡評価</h2>
falsyって非常にややこしい概念なんですけど、falseっぽい値を言います。<br />代表的なものには以下のものがあります。
<ul>
	<li>null</li>
	<li>undefined</li>
	<li>0</li>
	<li>-0</li>
	<li>NaN</li>
	<li>""(空文字列)</li>
</ul>
ある式の評価結果がfalsyであるかどうかで使用する値を変更します。
<code class="javascript">
	式 || 値
</code>
式がfalsyならば値が使用されます。
<img class="no-max" src="../pics/falsy代入短絡評価.gif" alt="falsy代入短絡評価" />
<div class="separator"></div>
以上でjavascript入門ver1は終了です。<br />お疲れ様でした♪<br />ver2は2022年の秋ごろに作成予定です。<br />ここまでこれた皆さんには必要ないと思いますが、、、<br />次はphp入門、もしくはjavascript中級に進むことをオススメします。<br />本当にお疲れ様でした。<br />以上。
<div class="subjects-container">
	<a href="../../php入門/branch" class="link-subject to-php入門"></a>
	<a href="../../javascript中級/branch" class="link-subject to-javascript中級"></a>
</div>
<?php footer(); ?>