<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-11-22",
	"updated" => "2021-11-22"
);
head($obj);
?>
<h2>関数化の目的</h2>
なぜ関数を作成するのでしょうか???<br /><br />僕の答えは以下の3つです。
<br />
<ol>
	<li>保守性の向上</li>
	<li>変数の汚染防止</li>
	<li>コード量の削減</li>
</ol>
<h3>保守性の向上</h3>
関数で処理をまとめなくてもコピペでいいじゃん!!って思う方もいると思いますが、コピペには大きな問題があります。<br />コードを変更する必要が生じた際に、そのコードをコピペした部分を全て探し出して修正しなければいけません。<br /><br />関数を作成してそれを色々な場所で呼び出す仕組みをとっていれば、その関数の処理を変更するだけでok!ですのでかなり楽ですよね♪<br /><br />システムの変更のしやすさのことを「保守性」と言いますが、関数を作成することで保守性が大幅に向上します。
<h3>変数の汚染の防止</h3>
皆さん、プログラミングを学ぶ際にまず変数について学んだと思います。<br />変数はプログラミングの基本中の基本ですね♪<br /><br />そこでですが、簡単な問題を出しますね♪<br /><br />以下のコードを実行するとどんな文字が出力されるでしょうか?
<br /><br />
<code class="php">
	$data = "好き";
	$data = "嫌い";
	$data = "好き";
	$data = "嫌い";
	$data = "好き";
	echo "ポニョ、プログラミング、". $data;
</code>
<br />
分かりましたか?<br /><br />答えは、「ポニョ、プログラミング、好き」と出力されます。<br /><br />$dataという変数には「好き」と「嫌い」という文字列が何度も代入されて最終的に「好き」で終わっているため、これが出力されます。<br /><br />後で詳しく説明しますが、関数内で使用する変数は関数外の変数を上書きせず別のものとするため、ひとつのプログラミング内で同じ関数名を使用可能です。<br /><br />おそらく僕のプログラミングでのエラーの原因で一番多いのが変数を間違って上書きしてしまうことです。<br />僕の変数の名前の付け方はかなり特殊で、全てポケモンの名前を付けているんです。<br />「$pikachu = ...」「$chikorita = ...」みたいな感じで、、、<br />生粋なポケモンファンですので!!<br /><br />そうすると、結構な頻度で変数名が被ってしまうんです、、、<br /><br />関数を使用することでこの問題は多少は軽減されます。
<h3>コード量の削減</h3>
当然のことですけど、処理をまとめることでコード量は削減されます。<br />
<h2>関数の作成方法</h2>
最初にコードを掲示しますね♪
<br /><br />
<code class="php">
	function get_file_some_contents($file, $from, $to, $direction = 1) {
		$contents = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$start_index = count($contents) - ($to - $from);
		if ($start_index < 0) {
			$start_index = 0;
		}
		$array = array();
		if ($direction !== 1) {
			for ($i = 0; $i < count($contents); $i++) {
				array_push($array, $contents[$i]);
			}
		} else if ($direction === 1) {
			for ($i = count($contents) - 1; $i >= 0; $i--) {
				array_push($array, $contents[$i]);
			}
		}
		return $array;
	}
</code>
<br />
上記の関数はファイルの引数で指定した範囲の行を取得して戻り値として返す関数です。
<br /><br />
<p>最初の「function」で関数であることを示します。</p>
<p>続く「get_file_some_contents」は関数の名前です。<br />英数字とアンダースコアが使用可能です。</p>
<p>関数名の後の括弧の中は引数を指定します。<br />実際に関数を実行する際に引数として渡す順番で記述します。<br />複数存在する場合には括弧で囲みます。<br />また引数が渡されなかった際に使用するデフォルトの引数は「$direction = 1」のように「変数 = デフォルトの引数」として設定します。</p>
<p>引数の括弧の中の「{}」内が関数の処理の範囲です。<br />ここで関数が行う処理を記述します。</p>
<p>「return $array;」で$arrayに格納されたデータを戻り値として返します。<br /></p>
<br /><br />
では実際に関数を作成してみましょう♪
<br />
<div class="challenge">No.1(レベル1)</div>
<br />
とっても簡単です。<br />引数を2つとって、その合計を戻り値として返す関数を作成してみましょう♪
<br /><br />
<code class="php">
	function add($arg1, $arg2) {
		return $arg1 + $arg2;
	}
	echo add(10, 15); //「25」と出力される
</code>
<div class="challenge">No.2(レベル2)</div>
<br />
次は引数を2つとって、そのうちの大きい方を返す関数を作成してみましょう♪
<br /><br />
<code class="php">
	function bigger($arg1, $arg2) {
		if ($arg2 < $arg1) {
			return $arg1;
		} else {
			return $arg2;
		}
	}
	echo bigger(25, 10); //「25」と出力される
</code>
<div class="challenge">No.3(レベル3)</div>
<br />
では、レベル3です。<br />引数を1つ配列型で取得してその中身を全てエスケープ処理(htmlspecialchar)と改行コードの「br化」(nl2br)して配列型で返す関数を作成してみましょう♪
<br /><br />
<code class="php">
	function escape($array) {
		for ($i = 0; $i < count($array); $i++) {
			$answer[] = nl2br(htmlspecialchars($array[$i]));
		}
		return $answer;
	}
</code>
<h2>スコープ</h2>
いきなりですけど問題です。<br />以下のコードを実行すると何が出力されるでしょうか???
<br /><br />
<code class="php">
	$data = "iam global";
	function dummy() {
		$data = "iam local";
	}
	dummy();
	echo $data;
</code>
<br />
答えは「iam global」と出力されます。<br />関数内で「$data = "iam global"」と$dataを上書きしているように思えますが、dummy関数内の$dataはdummy関数内でのみ有効であるため、関数の外にある$dataの中身を上書きしません。<br /><br />また、関数外の変数を関数内で取得することもできません。<br /><br />例えば以下のコードはエラーとなります。
<br /><br />
<code class="php">
	$data = "hi!";
	function say_hi() {
		echo $data;
	}
	say_hi(); //関数内で$dataという変数は存在しないためエラーとなる(「hi!」とは出力されない)
</code>
<br />
関数外の変数を関数内で使用するために、「global」修飾子を使用する方法もありますがオススメしません。<br />いわゆるスパゲッティコード化してシステムの保守性が損なわれるからです。<br /><br />関数外のデータを関数内で使用する際には関数実行時にそのデータを引数として渡してその結果を戻り値として受け取ってください。
<h3>グローバル変数とローカル変数</h3>
説明した通り原則として関数外の変数と関数内の変数は別のものとして扱われ、それぞれグローバル変数とローカル変数と呼ばれます。<br /><br />あくまで一時的な処理をするために変数が保存されるため、処理をまとめられるローカル変数の使用を推奨します。<br /><br />関数で処理をまとめられる部分については関数を作成してその中にローカル変数を設定して、その関数を実行する部分(関数外/メインモジュール)の処理は極力減らしましょう♪<br />グローバル変数を多用するとコードが複雑化して綺麗でなくなります。
<?php footer(); ?>