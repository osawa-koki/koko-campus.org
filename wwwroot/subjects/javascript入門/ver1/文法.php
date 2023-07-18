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
<h2>プログラミング言語の文法</h2>
今回はjavascriptの文法を学びます。<br />プログラミング言語の文法はc言語以降に開発された、いわゆる構造化言語であればどれもほとんど同じです。<br />以下の2つを実行するための文法を学びます。
<ul>
	<li>反復処理</li>
	<li>条件分岐</li>
</ul>
<h2>反復処理</h2>
ある一定回数、ないしはある条件を満たす限り一定の処理を繰り返します。<br />反復処理を実現するコードには以下の2種類あります。
<ul>
	<li>for</li>
	<li>while</li>
</ul>
<h3>for</h3>
ある一定回数処理を繰り返します。<br />forでの反復処理の書き方は以下のとおりです。
<code class="javascript">
	let i; //繰り返す回数をカウントするための変数を宣言
	for (i = 0; i < 繰り返す回数; i++) {
		//繰り返す処理
	}
</code>
<img src="../pics/for.png" alt="for文" />
では、「li」要素を10個作成して追加しましょう♪
<code class="html">
	&lt;ul id="num"&gt;&lt;/ul&gt;
</code>
<code class="javascript">
	let i, ul;
	ul = document.getElementById("num"); //追加先のオブジェクトを取得
	for (i = 0; i < 10; i++) {
		let elm; //追加する要素を格納するための変数を宣言
		elm = document.createElement("li"); //追加する要素を作成
		elm.textContent = i + 1 + "番目の要素♪♪♪"; //追加する要素の中身(「i」は「0」から始まるから「1」加算した数字を表示)
		ul.appendChild(elm); //作成した要素を追加
	}
</code>
<img class="no-max" src="../pics/for-loop.gif" alt="for文" />
<h3>while</h3>
ある条件を満たす限りは反復処理を繰り返します。<br />while文は以下のように書きます。
<code class="javascript">
	while (条件式) {
		//繰り返す処理
	}
</code>
条件式が「true(真)」である限りは処理をし続けます。<br />ではwhile文を用いて先ほどと同様の処理を書いてみましょう♪
<code class="html">
	&lt;ul id="num"&gt;&lt;/ul&gt;
</code>
<code class="javascript">
	let i, ul;
	ul = document.getElementById("num"); //追加先のオブジェクトを取得
	i = 0;
	while (i < 10) {
		let elm; //追加する要素を格納するための変数を宣言
		elm = document.createElement("li"); //追加する要素を作成
		elm.textContent = i + 1 + "番目の要素♪♪♪"; //追加する要素の中身(「i」は「0」から始まるから「1」加算した数字を表示)
		ul.appendChild(elm); //作成した要素を追加
		i++; //最後に「i」に「1」を加算し忘れると無限ループに陥るので要注意!!
	}
</code>
<img class="no-max" src="../pics/while-loop.gif" alt="while文" />
<div class="separator"></div>
次に説明する条件分岐(if)と併せて「break;」を用いることもあります。<br />ループ処理中に「break;」に出会うと、条件分岐から強制的に抜け出します。
<h2>二重ループ</h2>
ループの中にループを入れることもできます。<br />これをループの入れ子(ネスト)と呼びます。<br />外側のループが一周する度に内側のループが全て完了します。
<img src="../pics/ループの入れ子.png" alt="ループの入れ子" />
ではテーブルタグに掛け算九九の結果を表示してみましょう♪
<code class="html">
	&lt;table&gt;
		&lt;tbody id="kuku"&gt;&lt;/tbody&gt;
	&lt;/table&gt;
</code>
<code class="javascript">
	let tbody, tr, td, i, j;
	tbody = document.getElementById("kuku"); //追加先のオブジェクトを取得
	for (i = 1; i <= 9; i++) { //外側(縦)のループ
		tr = document.createElement("tr"); //縦は「tr」タグでまとめる
		for (j = 1; j <= 9; j++) { //内側(横)のループ
			td = document.createElement("td"); //「td」タグの作成
			td.textContent = i * j; //「td」タグの中身の設定
			td.style.padding = "10px"; //「td」タグのスタイルの設定
			td.style.textAlign = "right"; //「td」タグのスタイルの設定
			tr.appendChild(td); //作成した要素の追加
		}
		tbody.appendChild(tr); //内側(横)のループが完了したら、それを追加
	}
</code>
<img class="no-max" src="../pics/kuku.gif" alt="二十ループ" />
<h2>条件分岐</h2>
「天気予報が雨ならば傘を持っていき、雨でないならば傘を持って行かない」というように、条件を満たすかどうかでプログラムの処理を変更します。<br />条件分岐を実現するためのコードには以下の2つがあります。
<ul>
	<li>if</li>
	<li>switch</li>
</ul>
<h3>if</h3>
The「条件分岐」です。<br />和訳すると「もしも」ですね♪<br />以下のように書きます。
<code class="javascript">
	if (条件式) {
		//条件式を満たした場合の処理
	} else {
		//条件式を満たさなかった場合の処理
	}
</code>
条件式とは「true」「false」を導く式で、主に関係演算子を使用します。<br />条件分岐を連鎖させて以下のように書くこともできます。
<code class="javascript">
	if (条件式A) {
		//条件式Aを満たした場合の処理
	} else if (条件式B) {
		//条件式Bを満たした場合の処理(条件式Aを満たしていないことが前提!)
	} else {
		//条件式A・条件式Bのいずれも満たさなかった場合の処理
	}
</code>
<img src="../pics/if-説明.png" alt="if文" />
ではちょっと高度なプログラミングをしてみましょう♪<br />フィボナッチ数列を100000まで表示してみましょう♪
<div class="quote">
	<div>フィボナッチ数列</div>
	初項と第2項を1とし、第3項以後次々に前2項の和をとって得られる数列を言います。<br />
	「1 + 1」は「2」、「2」とひとつ前の数字である「1」を足して「3」、「3」とひとつ前の数字である「2」を足して「5」、「5」とひとつ前の数字である「3」を足して「8」、、、<br />
	1, 1, 2, 3, 5, 8, 13, 21, 34,...と続きます。
</div>
<code class="javascript">
	 //追加先のオブジェクトを取得
	let ul;
	ul = document.getElementById("fibo");

	 //最初の「1」ふたつは無理やり??作成
	let x, y;
	x = document.createElement("li");
	y = document.createElement("li");
	x.textContent = "1";
	y.textContent = "1";
	ul.appendChild(x);
	ul.appendChild(y);

	 //第三項以降の処理(ループ)
	let before, now, after, i;
	before = 1;
	now = 1;
	while (true) { //無限ループ
		after = before + now; //「前の数字 + 今の数字」を「次の数字」に
		if (100000 < after) { //100000を超えたら強制的にループから抜け出す
			break;
		}
		let elm = document.createElement("li"); //要素を作成
		elm.textContent = after; //要素の中身を設定
		ul.appendChild(elm); //作成した要素を追加
		before = now; //「今の数字」を「前の数字」に
		now = after; //「次の数字」を「今の数字」に
	}
</code>
<img class="no-max" src="../pics/fibo.gif" alt="while if" />
<h3>switch</h3>
if文と異なり、ある値を比較することで処理を変更することに特化した文法です。<br />一度マッチするとそれ以降の処理を全て実行するので、各処理の終わりに「break;」を置いて強制的にswitchから抜け出すことが多いです。
<img src="../pics/switch-説明.png" alt="switch文" />
では天気予報に合わせて持っていくアイテムを変更しましょう♪
<code class="javascript">
	const whether = "雨";
	switch (whether) {
		case "台風" :
			console.log("靴下の替え");
		case "雨" :
			console.log("傘");
			break;
		case "晴れ" :
			console.log("日傘");
			break;
		dafault :
			console.log("なし");
	}
</code>
<img class="no-max" src="../pics/switch文.gif" alt="switch文" />
<?php footer(); ?>