<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-01",
	"updated" => "2022-02-01"
);
head($obj);
if (isset($_POST["name"]) && isset($_POST["blood-type"]) && isset($_POST["birthday"]) && isset($_POST["hello-comment"])) {
	$name = htmlspecialchars($_POST["name"]);
	$blood = htmlspecialchars($_POST["blood-type"]);
	$birthday = htmlspecialchars($_POST["birthday"]);
	$comment = nl2br(htmlspecialchars($_POST["hello-comment"]));

	$birthday_modified = str_replace("-", "", $_POST["birthday"]);
	$today = date("Ymd");
	$age = floor(($today - $birthday_modified) / 10000);
} else {
	$name = "koko";
	$blood = "B";
	$birthday = "1998-10-25";
	$comment = "初めまして!!<br />kokoです♪<br /><br />好きな言語はpythonです。<br />phpの勉強サイトでいうのもなんですが、、、笑<br /><br />趣味はポケモンパンシール集めです。<br />2010年以降のポケモンパンシールはコンプリートしています!!!<br /><br />よろしくお願いします。";
	$birthday_modified = "19981025";
	$today = date("Ymd");
	$age = floor(($today - $birthday_modified) / 10000);
}
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>自己紹介カード</h2>
<table id="profile-table2" border="1" class="x">
	<caption>自己紹介カード</caption>
	<tbody>
		<tr>
			<td>名前</td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td>血液型</td>
			<td><?php echo $blood; ?></td>
		</tr>
		<tr>
			<td>生年月日</td>
			<td><?php echo $birthday; ?></td>
		</tr>
		<tr>
			<td>年齢</td>
			<td><?php echo $age; ?>才</td>
		</tr>
		<tr>
			<td>自己紹介文</td>
			<td><?php echo $comment; ?></td>
		</tr>
	</tbody>
</table>
こんな処理ができるようになりましょう♪<br />では、まずはphpの基礎を学びましょう♪
<h2>phpプログラムの書き方</h2>
ファイル名は任意ですが拡張子(ファイル名の最後)は「.php」にして下さい。<br /><br />また、phpファイル内ではhtmlとphpの両方を書くことができますが、phpを書く際には「&lt;?php」と「?&gt;」で囲みます。<br /><br />具体的には以下のように書きます。<br />中身は気にしなくてokです。
<code class="php">
	&lt;?php
	session_start();
	session_regenerate_id(true);

	require(__DIR__. "functions.php");
	//..........
	&gt;
</code>
「&lt;?php」と「?&gt;」で囲まれていない部分は全てhtml文書として出力されます。
<code class="php">
	&lt;?php
	session_start();
	session_regenerate_id(true);

	require(__DIR__. "functions.php");
	..........
	?&gt;

	&lt;!DOCTYPE html&gt;
	&lt;html lang = "ja" dir="ltr"&gt;
		&lt;head&gt;
			&lt;meta charset = "utf-8" /&gt;
			&lt;title&gt;kokoの悩み相談♪&lt;/title&gt;
		&lt;/head&gt;
		&lt;body&gt;
			&lt;h1&gt;カフェオレ1杯で眠れなくなってしまう、、、&lt;/h1&gt;
		&lt;/body&gt;
	&lt;/html&gt;
</code>
<h3>コメントアウト</h3>
phpの中にメモ書きを書くこともできます。<br />メモ書きが一行ならば「//(スラッシュ2個)」より後がコメントアウトとなり、複数行になる場合は「/*」と「*/」で囲みます。<br />具体的には以下のように書きます。
<br />
<code class="php">
	&lt;?php
	session_start(); //セッションの開始
	session_regenerate_id(true); //セッションidの変更

	require(__DIR__. "functions.php"); //共通モジュールの読み込み

	/*
	ここからは以下の処理をする
	1.データベースに接続
	2.データベースからデータXを取得
	3.データベースから切断
	*/
	..........
	&gt;
</code>
以下ではコードの説明をするために「//」のコメントアウトを多用します。<br />僕以外にもコードの説明は「//」を用いて説明する人が多いので、ここで慣れちゃいましょう♪
<h3>命令文</h3>
プログラムは命令文の集合体です。<br />phpではひとつの命令の終了を表すのに「;(セミコロン)」が用いられます。<br />最初のうちはセミコロンのつけ忘れによるエラーが多いと思いますので、特に注意して下さい。
<code class="php">
	session_start() //←セミコロンがないためエラー
	session_start(); //←これでok!
</code>
<h2>html出力</h2>
phpファイルでhtmlを書く際には「&lt;?php～?&gt;」の外で書けばok!ですが、phpでの処理の結果をhtmlとして出力するにはecho文を使用します。<br />echo文は以下のように記述します。
<code class="php">
	echo 表示するデータ;
</code>
こんな感じで使用します。
<code class="php">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8" dir="ltr"&gt;
			&lt;title&gt;koko's php lesson&lt;/title&gt;
		&lt;/head&gt;
		&lt;body&gt;
			&lt;h1&gt;「1+1」は???&lt;/h1&gt;
			1 + 1 = &lt;?php echo 1 + 1; ?&gt;です。
			&lt;h1&gt;「25-10」は???&lt;/h1&gt;
			25 - 10 = &lt;?php echo 25 - 10; ?&gt;です。
		&lt;/body&gt;
	&lt;/html&gt;
</code>
上のコードから以下のhtmlが出力されます。
<code class="html">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8" dir="ltr"&gt;
			&lt;title&gt;koko's php lesson&lt;/title&gt;
		&lt;/head&gt;
		&lt;body&gt;
			&lt;h1&gt;「1+1」は???&lt;/h1&gt;
			1 + 1 = 2です。
			&lt;h1&gt;「25-10」は???&lt;/h1&gt;
			25 - 10 = 15です。
		&lt;/body&gt;
	&lt;/html&gt;
</code>
<img src="../pics/cmd-echo.gif" alt="echo" />
<p class="r">実行方法は気にしなくてok!です。<br />出力結果だけ確認してください。</p>
echoに関するphpのショートハンド(コードを簡単に書く裏技)として、「&lt;?= $data;?&gt;」があります。<br />これはshort_open_tagと呼ばれ「&lt;?php echo $data; ?&gt;」と同義で、htmlメインの文書にちょっとだけphpで何かを出力させる際に便利なのですが、僕は推奨しません。<br />理由はxmlやその他のxmlベースの文書をhtmlに組み込む際にバグにつながる危険性があるためです。
<h2>変数</h2>
変数とはプログラムを実行する際に使用する一時的なデータを保存するための箱を言います。<br />一度変数に格納したデータは何度でも使用することができ、これを用いて複雑な処理を実行します。<br />変数はプログラミングの根幹となる技術です。<br />まずは変数の使用方法についてしっかりマスターしましょう♪
<h3>変数の命名</h3>
phpではc/c++やjavascriptと異なり、変数の宣言は必要ありません。<br />変数の宣言とはこの文字を変数として使うよ♪って宣言することですが、phpではそのまま変数を書けばok!です。<br />変数名は「$」から始まり、半角英数字と「_(アンダースコア)」を使用可能です。<br />先頭に数字は使用できません。
<code class="php">
	$xyz //ok!
	$あいう //ng!(半角英数字以外の使用)
	$xy_0 //ok!
	$0xy //ng!(先頭が数字)
	$_xy //ok!
</code>
<h3>変数の代入</h3>
変数にデータを挿入するには「=」を用います。<br />「=」はプログラミングでは「同じ」を意味するのではなく、右のデータを左の変数に代入することを意味します。<br /><br />因みに、後ほど説明しますがプログラミングで「同じ」を用いるためには「==」もしくは「===」を用います。
<code class="php">
	$number = 1; //$numberという変数に「1」を代入
	$hi = "おはよっ♪"; //$hiという変数に「おはよっ♪」を代入
</code>
<h3>変数の上書き</h3>
既に値が代入されている変数に値を代入すると値が上書されます。
<code class="php">
	$number = 1; //$numberという変数に「1」を代入
	$number = 10; //$numberという変数の値を「10」に上書き
</code>
<h3>変数へのアクセス</h3>
変数に代入した値を使用するには変数をそのまま書けばok!です。
<code class="php">
	$number = 1; //$numberという変数に「1」を代入
	$hi = "おはよっ♪"; //$hiという変数に「おはよっ♪」を代入
	echo $number; //「1」
	echo $hi; //「おはよっ♪」
</code>
<h2>データの型</h2>
問題です。<br />プログラミングで次の計算の結果はどうなるでしょう???<br /><br />「1 + 1」<br /><br />答え、「2」になります。<br />当然ですよね。<br /><br />では次の計算はどうでしょうか???<br /><br />「"1" + "1"」<br /><br />答え、「11」になります。<br /><small>(正確には「2」になりますけど、ここは目をつむってください)</small><br /><br />なんででしょうか??<br />これはデータの型で説明されます。<br /><br />データの型には以下のものがあります。
<ul>
	<li>文字列型</li>
	<li>整数型</li>
	<li>浮動小数点数型</li>
	<li>真偽値型(論理型)</li>
	<li>配列型</li>
</ul>
<h3>文字列型</h3>
「りんご」「koko」「ずっと前から好きでした。付き合ってください。」などが該当します。<br />文字列型を表すためには必ず対象の文字列を「"(ダブルクォート)」もしくは「'(シングルクォート)」で囲む必要があります。<br /><br />どちらでもかまいませんがkokoはダブルクォートをオススメします。<br />理由は特にありません。<br /><br />また、「'(シングルクート)」を含む文字列を表現するためには全体を「"(ダブルクート)」で、「"(ダブルクォート)」を含む文字列を表現するためには全体を「'(シングルクォート)」で囲む必要があります。<br />例えば「I'm loving it」という文字列をシングルクォートで囲むと「'I'm loving it'」と、「'I'」を囲む文字列ができてしまい、残りの「m loving it」がエラーとなってしまうため、「"I'm loving it"」のようにダブルクォートで囲む必要があります。<br /><br />また、数字を文字列として表現する際には「"1"」のようにダブル(シングル)クォートで囲みます。
<h4>文字列の結合</h4>
複数の文字列を結合するには「.」でつなげる必要があります。<br />例えば「ずっと前から好きでした。」と「付き合ってください。」を結合するには「"ずっと前から好きでした". "付き合ってください。"」と書きます。<br />「.」の後のスペースは無くてもokです。
<h4>文字列内での変数の出力</h4>
文字列内で変数を出力するには、以下のように記述します。
<code class="php">
	"${変数名}"
</code>
変数名の後が通常文字でない場合は、そのまま「$変数名」と書いても動作しますが、思わぬバグの防止の観点からオススメしません。
<code class="php">
	$hi = "Hello!!!";
	echo "皆さん、、、${hi}です♪";

	/* ↓ コンソール ↓
	皆さん、、、 Hello!!!です♪
	*/
</code>
<h3>整数型</h3>
整数を表現します。<br />「1」「25」「100」などが該当します。<br /><br />正確には整数型は10進数以外も取り扱えるので「0x1A」なども整数型ですが、複雑になるのでここでは10進数での整数のみ取り扱います。
<h4>演算</h4>
整数は計算(演算)が可能です。<br />演算は以下のように行います。
<table>
	<tbody>
		<tr>
			<th>+</th>
			<td>足し算です。</td>
		</tr>
		<tr>
			<th>-</th>
			<td>引き算です。</td>
		</tr>
		<tr>
			<th>*</th>
			<td>掛け算です。</td>
		</tr>
		<tr>
			<th>/</th>
			<td>割り算です。</td>
		</tr>
		<tr>
			<th>%</th>
			<td>割った時の余りです。</td>
		</tr>
	</tbody>
</table>
<code class="php">
	$add = 1 + 100; //$addには「101」が代入される
	$reduce = 50 - 10; //$reduceには「40」が代入される
	$times = 3 * 10; //$timesには「30」が代入される
	$divide = 50 / 10; //$divideには「5」が代入される
	$mod = 15 % 4; //$modには「3」が代入される
</code>
<h3>浮動小数点数型</h3>
コンピュータの事情(2進数を採用していることによる問題)により整数型と浮動小数点型を同様の型として扱えませんが、phpは自動型変換機能があるので気にしなくてokです。
<h3>真偽値型(論理型)</h3>
いわゆる「yes」or「no」を表します。<br /><br />phpでは「true」と「false」を用います。<br />具体的にはある演算の結果が「true」は「false」かを判定します。<br /><br /><br />「true」「false」を判定する演算として以下のものがあります。
<table>
	<tbody>
		<tr>
			<th>「==」</th>
			<td>等価演算子と言います。<br />データの「型」は気にせず、データの実際の値が同じなら「true」、異なれば「false」となります。<br /><br />例えば「"1" == 1」という演算はtrue(真)となります。</td>
		</tr>
		<tr>
			<th>「!=」</th>
			<td>「==」の逆です。</td>
		</tr>
		<tr>
			<th>「===」</th>
			<td>データの型とデータの値の両方が一致している場合に「true」を返し、それ以外は「false」を返します。<br /><br />例えば「"1" === 1」は文字列型と整数型で異なるためfailse(偽)となります。</td>
		</tr>
		<tr>
			<th>「!==」</th>
			<td>「===」の逆です。</td>
		</tr>
		<tr>
			<th>「&lt;」</th>
			<td>整数型・浮動小数点数型・日付型同士で比較を行い、成立すれば「true」を、不成立ならば「false」となります。<br />数学的に言えば「より小さい」です。<br />同じ場合は「false」です。<br /><br />例えば「3 &lt; 5」は「true」、「3 &lt; 3」は「false」となります。</td>
		</tr>
		<tr>
			<th>「&gt;」</th>
			<td>「&lt;」の逆バージョンです。<br />数学的に言えば「より大きい」です。<br />こちらも両者が同じならば「false」です。</td>
		</tr>
		<tr>
			<th>「&lt;=」</th>
			<td>「&lt;」の同じ場合は「true」を返すバージョンです。<br />数学的に言えば「以下」です。</td>
		</tr>
		<tr>
			<th>「&gt;=」</th>
			<td>「&gt;」の同じ場合は「true」を返すバージョンです。<br />数学的に言えば「以上」です。</td>
		</tr>
		<tr>
			<th>「!」</th>
			<td>「true」と「false」を反転させます。</td>
		</tr>
	</tbody>
</table>
また複数の条件を合わせる際には以下の演算子(論理演算子)を使用します。
<table>
	<thead>
		<tr>
			<th width="50%">&amp;&amp;</th>
			<th width="50%">||</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="center">「and」演算子</td>
			<td class="center">「or」演算子</td>
		</tr>
		<tr>
			<td>「&amp;&amp;(and)」の前後が両方「true」の場合は「true」を、どちらか一方でも「false」ならば「false」となります。</td>
			<td>「||(or)」のどちらか一方が「true」ならば「ture」を、両方とも「false」ならば「false」となります。</td>
		</tr>
	</tbody>
</table>
<h3>配列型</h3>
複数のデータを格納するデータ型です。<br />配列が含むデータを要素と呼びます。<br />配列型には「インデックス配列型」と「連想配列型」の2つがあります。
<p class="r">次の授業で詳しく説明します。</p>
<h4>インデックス配列</h4>
要素を「0」から始まるインデックス番号で管理します。<br />インデックス番号は渡した要素の順番通りに自動で振られます。
<img src="../pics/配列.png" alt="配列" />
array = (データ1, データ2, データ3, データ4, データ5, ...);といった形で配列を作成します。
<code class="php">
	$ary = array(
		"データ1", "データ2", "データ3", "データ4", "データ5"
	);
</code>
配列内のデータは「配列[インデックス番号]」で取り出します。
<code class="php">
	$ary = array(
		"データ1", "データ2", "データ3", "データ4", "データ5"
	);
	$data = $ary[2] //$dataには「データ3」という文字列が代入される
</code>
<h4>連想配列</h4>
配列の各要素に数字ではなく、独自に名前を付けることができます。<br />連想配列では名前を「キー」、値を「バリュー」と呼びます。
<img src="../pics/連想配列.png" alt="連想配列" />
連想配列は「キー =&gt; バリュー」の形で作成します。
<code class="php">
	$ary = array(
		"キー1" =&gt; "データ1",
		"キー2" =&gt; "データ2",
		"キー3" =&gt; "データ3",
		"キー4" =&gt; "データ4",
		"キー5" =&gt; "データ5"
	);
</code>
連想配列の各要素の値(バリュー)は「配列[キー]」で取り出します。
<code class="php">
	$ary = array(
		"キー1" =&gt; "データ1",
		"キー2" =&gt; "データ2",
		"キー3" =&gt; "データ3",
		"キー4" =&gt; "データ4",
		"キー5" =&gt; "データ5"
	);
	$data = $ary["キー3"] //$dataには「データ3」という文字列が代入される
</code>
<h2>postデータの取得</h2>
先ほどのページでフォームの作成について学びましたね♪<br />先ほどのページのフォームでデータを入力して、登録ボタンを押して次のページへ遷移させるところまで学習しました。<br /><br />次はformで送信されたデータを取得しましょう♪<br />post(form)で送信されたデータは全て「$_POST」という配列に「連想配列形式」で格納されています。<br />キーはformで作成した「name」の値で、バリューにはユーザが実際に入力したデータが入っています。<br /><br />例えば前のページでユーザが入力した名前を取得する際には「$_POST["name"]」で、血液型を取得するには「$_POST["blood-type"]」で、誕生日を取得するには「$_POST["birthday"]」で取得します。
<code class="php">
	$name = $_POST["name"];
	$blood = $_POST["blood-type"];
	$birthday = $_POST["birthday"];
	$hello = $_POST["hello-comment"];
</code>
これで前のページでユーザが入力したデータを取得できました。<br />しかしながら、問題があります。<br />前のページでユーザが名前を入力する欄に「&lt;h1&gt;おはよう!!&lt;/h1&gt;」と入力したらどうなると思いますか???<br /><br />正解は名前を表示する欄に「h1」のタグが作成されて「おはよう!!」と大きく表示されてしまいます。<br /><br />これはXSSというハッキングの一種でSEはこういった攻撃を防ぐシステムを作らなければなりません。<br /><br />ここではこういった特殊文字(「&lt;」「&gt;」「"」「'」「&amp;」)をエスケープ処理(特殊文字を無害な文字に変換する処理)するために「htmlspecialchars()」関数を使用します。
<code class="php">
	$name = htmlspecialchars($name);
	$blood = htmlspecialchars($blood);
	$birthday = htmlspecialchars($birthday);
	$hello = htmlspecialchars($hello);
</code>
血液型や生年月日に関してはそれぞれ、「A」「B」「AB」「O」から選択、日付を選択させるだけだから問題ないと思うかもしれませんが、攻撃者はwebブラウザを介さずにプログラムに直接データを送信してくる可能性があるので、外部から取得したデータは原則全てチェックすることをオススメします。<br /><br />また、先ほどのコードをひとつにまとめて以下のように記述することもできます。
<code class="php">
	$name = htmlspecialchars($_POST["name"]);
	$blood = htmlspecialchars($_POST["blood-type"]);
	$birthday = htmlspecialchars($_POST["birthday"]);
	$hello = htmlspecialchars($_POST["hello-comment"]);
</code>
<h2>確認テスト</h2>
では、今までの内容の総復習を兼ねてちょっとした問題に挑戦してみましょう♪<br /><br />Q.以下のコードを実行すると何が出力されるでしょうか???
<code class="php">
	$x = "the ";
	$y = array(
		"s" =&gt; "sooner",
		"b" =&gt; "better",
	);
	$z = $x. $y["s"]. ",". $x. $y["b"];
	echo $z;
</code>
分かりましたか???<br /><br />答えは「the sooner,the better」(早ければ早いほど良い)です。
<img src="../pics/cmd-the_sooner_the_better.gif" alt="phpプログラム" />
<?php footer(); ?>