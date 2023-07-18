<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-01",
	"updated" => "2022-02-01"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>配列とは</h2>
データの型の授業で一度学びましたね♪<br /><br />覚えていますか??<br />配列とは複数のデータを格納した包括的なデータで、格納されたデータ(要素)に対する名前を付け方から「<strong>インデックス配列</strong>」と「<strong>連想配列</strong>」に分類できます。
<h3>インデックス配列</h3>
データの名前を「0, 1, 2, 3, ...」とします。<br /><span class="u">インデックス番号(データの名前)は「0」から始まることに注意してください。</span>
<img src="../pics/配列.png" alt="配列" />
<code class="php">
	$ary = array(
		"データ1", "データ2", "データ3"
	);
	$data = $ary[1]; //$dataには「データ2」が格納される
</code>
<h3>連想配列</h3>
データの名前(キー)をユーザが独自に設定できます。
<img src="../pics/連想配列.png" alt="連想配列" />
<code class="php">
	$ary = array(
		"キー1" =&gt; "データ1",
		"キー2" =&gt; "データ2",
		"キー3" =&gt; "データ3"
	);
	$data = $ary["キー2"]; //$dataには「データ2」が格納される
</code>
<h2>配列のダンプ</h2>
配列の要素を全て一括で出力するには「var_dump()」関数を使用します。<br />この関数はデバグ目的で使用されます。<br />配列の要素数と配列の要素の値とデータ型を表示します。
<code class="php">
	$ary = array(
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ"
	);
	var_dump($ary);

	/* ↓ コンソール ↓
	array(3) {
	  [0]=&gt;
	  string(15) "フシギダネ"
	  [1]=&gt;
	  string(12) "ヒトカゲ"
	  [2]=&gt;
	  string(12) "ゼニガメ"
	}
	*/
</code>
<h2>インデックス配列への追加</h2>
インデックス配列に新しい要素を追加するには、その追加位置によって以下の3通りの方法に分けられます。
<ul>
	<li>先頭に追加</li>
	<li>途中に追加</li>
	<li>最後に追加</li>
</ul>
<h3>先頭に追加</h3>
「array_unshift()」関数を使用します。<br />以下のように記述します。
<code class="php">
	array_unshift(配列, 追加する要素);
</code>
<code class="php">
	$ary = array(
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ"
	);
	array_unshift($ary, "ピカチュウ");
	var_dump($ary);

	/* ↓ コンソール ↓
	array(4) {
	  [0]=&gt;
	  string(15) "ピカチュウ"
	  [1]=&gt;
	  string(15) "フシギダネ"
	  [2]=&gt;
	  string(12) "ヒトカゲ"
	  [3]=&gt;
	  string(12) "ゼニガメ"
	}
	*/
</code>
<h3>途中に追加</h3>
データを途中に追加するには「array_splice()」関数を使用します。
<code class="php">
	array_splice(配列, 追加する位置, 0, 追加する要素);
</code>
第一引数には追加対象の配列を、第二引数には追加する位置を指定します。<br />第三引数の「0」という数値は単に追加することを意味します。<br /><br />array_splice()関数は本来は配列内のデータを置き換えるための関数である為、置き換える要素の数を「0」に設定することで配列内の要素の置き換えではなく配列に追加することができます。
<code class="php">
	$ary = array(
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ"
	);
	array_splice($ary, 1, 0, "ピカチュウ");
	var_dump($ary);

	/* ↓ コンソール ↓
	array(4) {
	  [0]=&gt;
	  string(15) "フシギダネ"
	  [1]=&gt;
	  string(15) "ピカチュウ"
	  [2]=&gt;
	  string(12) "ヒトカゲ"
	  [3]=&gt;
	  string(12) "ゼニガメ"
	}
	*/
</code>
「array_splice()」関数は万能であり、先頭と最後への追加へも使用できますが、先頭と最後への追加はそれぞれ、「array_unshift()」と「array_push()」を使用するべきです。
<h3>最後に追加</h3>
配列の最後に追加するには「array_push()」関数を使用します。
<code class="php">
	array_push(配列, 追加する要素);
</code>
<code class="php">
	$ary = array(
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ"
	);
	array_push($ary, "ピカチュウ");
	var_dump($ary);

	/* ↓ コンソール ↓
	array(4) {
	  [0]=>
	  string(15) "フシギダネ"
	  [1]=>
	  string(12) "ヒトカゲ"
	  [2]=>
	  string(12) "ゼニガメ"
	  [3]=>
	  string(15) "ピカチュウ"
	}
	*/
</code>
<div class="separator"></div>
最後に追加する場合はもっと簡単に以下のように書くこともできます。
<code class="php">
	配列[] = データ;
</code>
<code class="php">
	$ary = array(
		"フシギダネ",
		"ヒトカゲ",
		"ゼニガメ"
	);
	$ary[] = "ピカチュウ";
	var_dump($ary);

	/* ↓ コンソール ↓
	array(4) {
	  [0]=>
	  string(15) "フシギダネ"
	  [1]=>
	  string(12) "ヒトカゲ"
	  [2]=>
	  string(12) "ゼニガメ"
	  [3]=>
	  string(15) "ピカチュウ"
	}
	*/
</code>
<h2>連想配列への追加</h2>
「[]」にキーを指定すると、連想配列として要素が追加されます。
<code class="php">
	$pika = array(
		"no" =&gt; 25,
		"name" =&gt; "ピカチュウ",
		"type1" =&gt; "でんき"
	);
	$pika["type2"] = "なし";
	var_dump($pika);

	/* ↓ コンソール ↓
	array(4) {
	  ["no"]=>
	  int(25)
	  ["name"]=>
	  string(15) "ピカチュウ"
	  ["type1"]=>
	  string(9) "でんき"
	  ["type2"]=>
	  string(6) "なし"
	}
	*/
</code>
<h2>配列の要素の削除</h2>
配列の要素の追加と同様にどの位置の要素を削除するかによって以下の3つの方法があります。
<ul>
	<li>先頭の要素の削除</li>
	<li>途中の要素の削除</li>
	<li>最後の要素の削除</li>
</ul>
<h3>先頭の要素の削除</h3>
「array_shift()」関数を使用します。
<code class="php">
	array_shift(配列);
</code>
戻り値には削除された要素が渡されます。
<code class="php">
	$ary = array(
		"フシギバナ",
		"ヒトカゲ",
		"ゼニガメ",
		"ピカチュウ"
	);
	$del = array_shift($ary);
	echo $del. "が削除されました。\n";
	var_dump($ary);

	/* ↓ コンソール ↓
	フシギバナが削除されました。
	array(3) {
	  [0]=>
	  string(12) "ヒトカゲ"
	  [1]=>
	  string(12) "ゼニガメ"
	  [2]=>
	  string(15) "ピカチュウ"
	}
	*/
</code>
<h3>途中の要素の削除</h3>
配列の途中に追加する際に使用した「array_splice()」関数を使用します。<br />以下のように記述します。
<code class="php">
	array_splice(配列, 削除開始位置, 削除する配列の要素数);
</code>
戻り値には削除された要素が配列形式で渡されます。<br />例え、削除した要素がひとつであっても配列形式で返されるため、インデックス番号で「0」を指定して取り出す必要があります。
<code class="php">
	$ary = array(
		"フシギバナ",
		"ヒトカゲ",
		"ゼニガメ",
		"ピカチュウ"
	);
	$del = array_splice($ary, 2, 1);
	echo $del[0]. "が削除されました。\n";
	var_dump($ary);

	/* ↓ コンソール ↓
	ゼニガメが削除されました。
	array(3) {
	  [0]=>
	  string(15) "フシギバナ"
	  [1]=>
	  string(12) "ヒトカゲ"
	  [2]=>
	  string(15) "ピカチュウ"
	}
	*/
</code>
<h3>最後の要素の削除</h3>
「array_pop()」関数を使用します。
<code class="php">
	array_pop(配列);
</code>
戻り値には削除された要素が渡されます。
<code class="php">
	$ary = array(
		"フシギバナ",
		"ヒトカゲ",
		"ゼニガメ",
		"ピカチュウ"
	);
	$del = array_pop($ary);
	echo $del. "が削除されました。\n";
	var_dump($ary);

	/* ↓ コンソール ↓
	ピカチュウが削除されました。
	array(3) {
	  [0]=>
	  string(15) "フシギバナ"
	  [1]=>
	  string(12) "ヒトカゲ"
	  [2]=>
	  string(12) "ゼニガメ"
	}
	*/
</code>
<div class="separator"></div>
連想配列はその性質上要素を削除する必要がないため、ここでは説明しません。
<h2>インデックス配列の走査</h2>
配列の要素は「配列[インデックス番号(キー)]」で取り出せますが、この方法だと配列内のひとつの要素しか取り出さません。<br />配列の要素を全部取り出すには反復処理を用いる必要があります。<br />この方法は2通りあります。
<ul>
	<li>for</li>
	<li>foreach</li>
</ul>
<h3>for</h3>
既に学習済みのforループを用いて配列を走査します。<br />「count()」関数で配列の要素数を取得して、forループの反復回数を指定します。<br />ポケモンをリスト形式にして出力しましょう♪
<code class="php">
	$ary = array(
		"フシギバナ",
		"ヒトカゲ",
		"ゼニガメ",
		"ピカチュウ"
	);
	echo "&lt;ol&gt;\n";
	for ($i = 0; $i &lt; count($ary); $i++) {
		echo "\t&lt;li&gt;$ary[$i]&lt;/li&gt;\n";
	}
	echo "&lt;\ol&gt;\n";
</code>
<img src="../pics/配列の走査-for.gif" alt="配列の走査(for)" />
<p class="r">見やすさの観点から改行とタブ文字を挿入していますが、htmlではこれを無視するため、気にしなくてok!です。</p>
<h3>foreach</h3>
forループから各要素を指定するには「配列[インデックス番号]」と書かなければなりません。<br />なんだか、大変ですね、、、<br />ということで、要素をそのまま変数に代入して使用できるようにしましょう♪<br />foraechを使用します。
<code class="php">
	foreach (配列 as 要素) {
		//反復処理
	}
</code>
これでasの後に変数に各要素が自動的に代入されて、反復処理が実行されます。<br />では先ほどのポケモンをリスト形式で出力するプログラムをforeachを用いて書き換えてみましょう♪
<code class="php">
	$ary = array(
		"フシギバナ",
		"ヒトカゲ",
		"ゼニガメ",
		"ピカチュウ"
	);
	echo "&lt;ol&gt;\n";
	foreach ($ary as $poke) {
		echo "\t&lt;li&gt;$poke&lt;/li&gt;\n";
	}
	echo "&lt;\ol&gt;\n";
</code>
<img src="../pics/配列の走査-for.gif" alt="配列の走査(for)" />
<h2>連想配列の走査</h2>
連想配列はforeachを使用して走査します。
<code class="php">
	foreach (配列 as キー =&gt; バリュー) {
		//反復処理
	}
</code>
<code class="php">
	$ary = array(
		"キー1" =&gt; "データ1",
		"キー2" =&gt; "データ2",
		"キー3" =&gt; "データ3"
	);
	foreach ($ary as $key =&gt; $value) {
		echo $key. "は". $value. "です。"; //「キー1はデータ1です。」「キー2はデータ2です。」「キー3はデータ3です。」と出力される
	}
</code>
「foreach (配列 as $key => $value」で反復処理をします。<br />続く「{}」内では「$key」の部分に配列のキーが、「$value」の部分に配列の要素(バリュー)が格納されます。<br /><br />また、インデックス配列についてもforeach文を用いることでより簡単に記述することができます。
<code class="php">
	$pika = array(
		"no" =&gt; 25,
		"name" =&gt; "ピカチュウ",
		"type1" =&gt; "でんき",
		"type2" =&gt; "なし"
	);
	echo "&lt;table&gt;\n";
	foreach ($pika as $key =&gt; $value) {
		echo "\t&lt;tr&gt;\n";
			echo "\t\t&lt;th&gt;$key&lt;/th&gt;\n";
			echo "\t\t&lt;td&gt;$value&lt;/td&gt;\n";
		echo "\t&lt;/tr&gt;\n";
	}
	echo "&lt;/table&gt;";
</code>
<img src="../pics/配列の走査-foreach.gif" alt="配列の走査(foreach)" />
<h2>配列化・文字列化</h2>
ここでは文字列を配列に変換する方法と、配列を文字列に変換する方法を紹介します。<br />それぞれ、「explode()」関数と「implode()」関数が該当します。
<h3>explode</h3>
文字列をある文字で分割して配列を作成します。<br />一般に区切り文字として「,(カンマ)」が用いられることが多いです。<br />以下のように記述します。
<code class="php">
	explode(区切り文字, 対象の文字列);
</code>
<code class="php">
	$str = "ぴかちゅう,ちこりーた,ひのあらし";
	$ary = explode(",", $str); //$aryには「ぴかちゅう」「ちこりーた」「ひのあらし」が格納される
</code>
<h3>implode</h3>
配列をある文字で結合して文字列とします。<br />以下のように記述します。
<code class="php">
	implode(区切り文字, 配列);
</code>
<code class="php">
	$ary = array(
		"サンダー", "ファイヤー", "フリーザー"
	);
	$str = implode("と", $ary); //$strは「サンダーとファイヤーとフリーザー」が格納されます。
</code>
<?php footer(); ?>