<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-11-21",
	"updated" => "2021-11-21"
);
head($obj);
?>
<h2>関数</h2>
関数とは数学でいう関数と異なり、<span class="u">ある一定の処理を求めたもの</span>を言います。<br /><br />例えば円を書く処理を何回か行う際にそれを全て書くのは大変ですよね、、、<br /><br />コピペしたらコード量が増えるだけではなく、修正が必要になった際に大変です。<br /><br />ということで、あるまとまった処理をする際には関数を用います。
<h2>引数と戻り値</h2>
関数の基本的な仕組みは、関数にあるデータ(引数)を与えて関数にそのデータに対してある一定の処理をしてもらって、処理されたデータを戻り値として受け取ります。<br /><br />例えば、約数はある数を1からその数までで割って、余りが0になった場合の割った数一覧とプログラミング上では書けます。<br /><br />そうすればこれを関数としてまとめておけばそれ以降はこの関数に約数を求めたい数を与えるだけで、結果を受け取ることができます。<br /><br />イメージとしてはこんな感じです。
<img src="../pics/関数.png" alt="関数の画像" />
<h2>関数の実行</h2>
2つ前の授業でpostで取得したデータを「htmlspecialchars()」を用いてエスケープ処理しましたよね♪<br />覚えていますか??<br />こんな処理です。
<br /><br />
<code class="php">
	$name = htmlspecialchars($_POST["name"]);
	$blood = htmlspecialchars($_POST["blood-type"]);
	$birthday = htmlspecialchars($_POST["birthday"]);
	$hello = htmlspecialchars($_POST["hello-comment"]);
</code>
<br />
これも実は関数を使用しています。<br />「htmlspecialchars()」関数は引数として受け取ったデータをhtml上で無害なデータに変換して戻り値として返してくれる関数です。<br /><br />こんな感じで関数は「戻り値 = 関数名(引数);」として実行します。<br /><br />引数がない場合や戻り値がない場合は、それぞれ「戻り値 = 関数名();」と「関数名();」で実行します。<br />ほとんど使い場面はありませんが、引数も戻り値も必要ない場合は「関数名();」で実行します。<br /><br />関数は自作することも可能ですが、良く使用される関数に関してはphpにデフォルトで設定されています。<br /><br />ここでは、phpにデフォルトで設定されているよく使う関数について学びましょう♪<br /><br />ここでは以下の関数を取り扱います。
<br />
<ul>
	<li>date()</li>
	<li>isset()</li>
	<li>file_get_contents</li>
	<li>file_put_contents</li>
	<li>nl2br()</li>
</ul>
<h2>date()</h2>
名前から予測できると思いますが、日付を取得する関数です。
<br />
<div class="functions">
	date(フォーマット, [uxixタイムスタンプ]);
</div>
<h3>フォーマット</h3>
欲しいデータ(「年」「月」「日」「時」「秒」)とその出力方法(「2020-10-25」「2020/10/25」「2020年10月25日」「2020-10-25 15:30」)などを指定します。<br /><br />具体的には以下のように指定します。<br /><br />「date("Y-m-d");」
<br /><br />
<table class="functions">
	<caption>日付データの指定</caption>
	<tbody>
		<tr>
			<td>Y</td>
			<td>年のデータ(4桁表示)<br />例)2020</td>
		</tr>
		<tr>
			<td>y</td>
			<td>年のデータ(2桁表示)<br />例)20</td>
		</tr>
		<tr>
			<td>m</td>
			<td>月のデータ(2桁表示)<br />例)07</td>
		</tr>
		<tr>
			<td>M</td>
			<td>月のデータ(先頭に0を付けない)<br />例)7</td>
		</tr>
		<tr>
			<td>H</td>
			<td>時間のデータ(24時間表示)<br />例)21</td>
		</tr>
		<tr>
			<td>h</td>
			<td>時間のデータ(12時間表示)<br />例)9</td>
		</tr>
		<tr>
			<td>i</td>
			<td>分のデータ<br />例)30</td>
		</tr>
		<tr>
			<td>s</td>
			<td>秒のデータ<br />例)25</td>
		</tr>
		<tr>
			<td>w</td>
			<td>曜日のデータ<br />(日-&gt;0、月-&gt;1、火-&gt;2、、、土-&gt;6)</td>
		</tr>
	</tbody>
</table>
<code class="php">
	echo date("Y-m-d"); //<?php echo date("Y-m-d"); ?>と出力される
	echo date("Y-m-d h:i:s"); //<?php echo date("Y-m-d h:i:s"); ?>と出力される
	echo date("Y年m月d日 h時i分s秒"); //<?php echo date("Y年m月d日 h時i分s秒"); ?>と出力される
</code>
<h3>タイムスタンプ</h3>
省略可能です。<br /><br />unixタイムスタンプ(UNIX時間)というのはコンピュータ界の時間で、1970年1月1日午前0時0分0秒からの秒数です。<br /><br />単純に現在時刻を用いる際には用いませんが、今から「1時間前」「1カ月後」「1年前」などを算出する際に「strtotime()」関数とともに使用します。<br />ここでは、覚えなくてok!です。
<h2>isset()</h2>
引数で渡したデータが存在すれば「true」を、nullならば「false」を返します。<br /><br />良く用いるのは「$_POST」内のデータが存在すれば処理をする際にif文とともに用いられます。
<br /><br />
<code class="php">
	if (isset($_POST["data"])) {
		//$_POST["data"]になんらかのデータが入っていた際の処理
	}
</code>
<br />
実際のところ、凄く複雑です。<br /><a href="https://www.php.net/manual/ja/function.isset.php">php公式</a>の説明では、「var(引数の値)が存在してnull以外の値をとれば「true」、そうでなければ「false」を返すとされています。<br /><br />「false」に似た型として「null」「NaN」「""(空文字)」「データが定義されていない」「undefined<sup>*1</sup>」などがありますが、isset関数は「NaN」「""(空文字)」でも「true」を返し、「null」もしくは「データが定義されていない」場合にのみ「false」を返します。
<p class="r">*1:正確にはphpには「undefined」型は明確には存在しません。</p>
例を用いて説明しますね♪<br />まずは、フォームを入力させるhtml(php)コードが以下のようになっているとします。
<br /><br />
<code class="html">
	&lt;form action="next.php" method="post"&gt;
		&lt;input type="text" name="fruit"&gt;
		&lt;input type="submit" value="登録"&gt;
	&lt;/form&gt;
</code>
<br />
「fruit」という名前をinputタグに付けています。<br />ここにユーザが「apple」と入力して登録ボタンを押したとします。
<br />
<code class="php">
	echo isset($_POST["fruit"]); //true!!
	echo isset($_POST["veggie"]); //false...

	echo $_POST["fruit"]; //「apple」と表示される
	echo $_POST["veggie"]; //データが存在しないため、エラーとなる
</code>
<br />
これは理解できますか???<br /><br />問題はユーザがテキストボックスに何も記入しなかった場合です。<br /><br />先ほどはユーザが「fruit」のテキストボックスに「apple」と入力したと仮定しましたが、今回は何も入力せずに登録ボタンを押したとしましょう。<br />どうなるでしょうか???
<br />
<code class="php">
	echo isset($_POST["fruit"]); //true!!
	echo isset($_POST["veggie"]); //false...

	echo $_POST["fruit"]; //何も表示されない
	echo $_POST["veggie"]; //データが存在しないため、エラーとなる
</code>
<br />
「$_POST["fruit"]」には一見何も入っていないように思われますが、前の画面で「name」を設定しているため「""(空文字列)」が入っているんです、、、<br /><br />最初の自己紹介カードでデータを送信すると以下のようなデータが送信されます。
<img class="isset-pics" src="../pics/isset0.png" alt="issetの画像(1)" />
名前・血液型・生年月日・自己紹介コメントが送られていますね♪<br /><br />では、何も入力せずに送信するとどうなるでしょうか???
<img class="isset-pics" src="../pics/isset1.png" alt="issetの画像(2)" />
<br />
未入力でも空文字が送信されています。<br /><br />このため「isset()」関数ではユーザ未入力の項目は判定できないことに注意してください。
<h2>file_get_contents()</h2>
ファイルの中身を取得します。
<br />
<div class="functions">
	file_get_contents(パス);
</div>
<br />
非常に簡単です。<br /><br />引数にファイルのパスを渡すだけです。<br /><br />ですけどパスって何でしょうか???<br />「path(道のり)」の意味で、ファイルまでの道のりを言います。<br />「file1.txt」を読み込んで!!って言っても、どこにある「file1.txt」なのか分からないですよね、、、<br />そこでパスを指定することでファイルまでの経路を示します。<br /><br />また、パスの指定方法は以下の2つがあります。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">絶対パス指定</td>
			<td width="50%">相対パス指定</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>一番上のフォルダから指定します。<br />windowsユーザなら「C\Program Files\XAMPP\htdocs\...\file1.txt」といった感じで、一番上のCドライブから指定します。</td>
			<td>今いる場所(自身が存在するフォルダ)から指定します。<br />自身のフォルダと同じフォルダにあれば「file1.txt」、ひとつ上ならば「../file1.txt」、もうひとつ上ならば「../../file1.txt」、ひとつ上のdirフォルダに入っていれば「../dir/file1.txt」といった感じで示します。</td>
		</tr>
	</tbody>
</table>
<br />
絶対パスと相対パスは一長一短ですが、特別な理由がない限り「相対パス指定」を使用することをオススメします。<br />理由は楽であるからと、フォルダ管理が効率化されるからです。<br /><br />では、実際に「file_get_contents()」を用いたコードを作ってみましょう♪
<br /><br />
<code class="php">
	$file = file_get_contents("file1.txt");
	echo $file;
</code>
<br />
file1.txtの内容を出力する簡単なプログラムです。
<h2>file_put_contents</h2>
今度はファイルに記述する関数です。
<br />
<div class="functions">
	file_put_contents(パス, データ, オプション);
</div>
<br />
こちらも簡単ですね♪<br /><br />第一引数にファイルのパスを、第二引数に書き込むデータを指定します。<br />指定したパスにファイルがあればそれを上書きし、なければ新しく作成します。<br /><br />第三引数ではオプションを使用しますが、オプションには以下の種類があります。
<br />
<ul>
	<li>FILE_APPEND</li>
	<li>LOCK_EX</li>
</ul>
<h3>FILE_APPEND</h3>
ファイルが存在すればデフォルトではファイルを上書きしますが、第三引数に「FILE_APPEND」を設定すると、上書きではなく追記します。
<h3>LOCK_EX</h3>
ファイルを書き込んでいる最中に他のプログラムがそのファイルにアクセスできなくなります。<br />銀行の処理(トランザクション)などでは必要とされる機能ですが、そもそもそのような処理はデータベースで行うべきなので、使う機会は少ないです。
<h2>nl2br()</h2>
file_put_contents()関数でファイルへの書込み方法を学びましたね♪<br /><br />ファイルに改行を入れる際には「"\n"」という文字列を入れるのですが、ユーザの入力文字に「"\n"」が含まれていた場合はファイル内で勝手に改行されてしまいます。<br /><br />ということで、ユーザが入力した改行コード("\n")をhtml上の改行コード(&lt;br /&gt;)に替える必要があります。<br /><br />そのための関数が「nl2br()」関数です。
<br /><br />
<code class="php">
	$data = $_POST["text"]; //ユーザが入力したデータを取得して、
	$data = htmlspecialchars($data); //まずは、データをエスケープ処理(無害化)して、
	$data = nl2br($data); //改行コードを変換して、
	file_put_contents("file1.txt", "\n". $data, FILE_APPANED); //最初に改行して追記します
</code>
<br /><br />
ここではphpに予め組み込まれている関数について学びましたが、自分で関数を作成することも可能です。<br />では、次は自分で関数を作ってみましょう♪
<?php footer(); ?>