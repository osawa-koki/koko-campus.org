<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>goコードの雛形</h2>
最初にgoコードの雛形を紹介します。
<code class="go">
	package パッケージ名

	import (
		パッケージ名
	)

	func main() {
		//プログラムへのエントリーポイント
		/*
		メインプログラムでの処理...
		メインプログラムでの処理...
		メインプログラムでの処理...
		*/
	}
</code>
<h3>package</h3>
プログラムに対する名前を設定します。<br />ここではパッケージではなく、メインプログラム(実際にコンパイルして動かすプログラム)を想定するため、名前はmainとします。
<code class="go">
	package main
</code>
<h3>import</h3>
使用するパッケージをインポートします。<br />ここでは、最初に作成するコンソールアプリで使用する標準入出力に必要なfmtパッケージをインポートします。
<code class="go">
	import (
		"fmt"
	)
</code>
複数のパッケージをインポートする際は「,(カンマ)」で区切らずに以下のように書きます。
<code class="go">
	import (
		"fmt"
		"bufio"
		"os"
	)
</code>
<h3>func main() {...}</h3>
c/c++やrustと同様にプログラムへのエントリーポイントはmain関数となります。<br />ここにプログラムでの処理を記述します。
<code class="go">
	func main() {
		//処理...
		//処理...
		//処理...
	}
</code>
<div class="separator"></div>
これ以降は特殊なパッケージを使用しない限りは、packageやimportの部分は省略してfunc main() {...}の部分だけを記述します。
<h2>コメントアウト</h2>
goコードでコメントアウト(コード内でのメモ書き)をするには以下の2つの方法があります。
<ul>
	<li>// ～～～</li>
	<li>/* ～～～ */</li>
</ul>
<h3>// ～～～</h3>
単一行でのコメントアウトです。<br />その行の「//」以降がプログラム実行時に無視されます。
<code class="go">
	func main() {
		//今日も
		//いい天気
		//ダネ♪
	}
</code>
<h3>/* ～～～ */</h3>
複数行にわたるコメントアウトを書く場合にはこちらを使用します。
<code class="go">
	func main() {
		/*
		今日も
		いい天気
		ダネ♪
		*/
	}
</code>
<h2>コーディングの際の注意点</h2>
実際にコードを書く際には以下の点に注意してください。
<ul>
	<li>全角文字禁止</li>
	<li>小文字と大文字の区別</li>
	<li>演算子の前後の空白文字の非推奨</li>
	<li>ハードタブの使用</li>
</ul>
<h3>全角文字の禁止</h3>
goに限ったことではありませんが、プログラムコードでは全角文字を使用できません。<br />文字、または文字列として使用する場合には「'(シングルクォーテーション)」ないしは「"(ダブルクォーテーション)」で囲んで記述します。<br /><br />また、全角の空白文字(スペース)が間違って混入するとこれもエラーとなり、さらには発見がしにくいためwindowsの設定で全角の空白文字を入力できなくするようにすることをオススメします。
<p class="r">設定の仕方は<a href="../../../blog/index?date=20211128">こちら</a>。</p>
<h3>小文字と大文字の区別</h3>
小文字と大文字は別の文字として扱われます。<br />これも他の言語と同様ですね♪<br />大文字と小文字を区別しないのはvb.netやsqlぐらいでしょうか???
<h3>演算子の前後の空白文字の非推奨</h3>
go特有の規則です。<br />エラーとはなりませんが、go言語では「+」「-」などの演算子の前後には空白文字を入れません。<br />以下のように続けて書きます。
<code class="go">
	1 + 1 //非推奨

	1+1 //こうやって書く
</code>
これは空白文字を括弧の代わりに使用して演算の優先順位を簡単に示すことを目的としています。<br />慣れるまでが少し大変ですけど、慣れたら楽ちんです。
<h3>ハードタブの使用</h3>
コードを見やすくするためのインデント(行の一番左にある空白類似文字)はソフトタブ(空白文字/スペース)ではなく、ハードタブ(タブ文字)を使用します。<br />このサイトでコードを紹介する場合は自動的にタブ文字が空白文字に変換されて表示されるので、これは気にせずにタブ文字をインデントに使用してください。<br /><br />visual studio codeのgoプラグインを使用していれば自動でハードタブが使用されます。
<h2>標準出力</h2>
コンソール画面に文字列を表示するには以下の2つの関数を使用します。
<ul>
	<li>Print</li>
	<li>Println</li>
</ul>
<h3>Print</h3>
以下のように書きます。
<code class="go">
	fmt.Print("表示する文字列")
</code>
fmtパッケージに用意されています。<br />次に説明するPrintlnと異なり、自動で改行されません。
<code class="go">
	func main() {
		fmt.Print("自動で")
		fmt.Print("改行")
		fmt.Print("されないよ♪")
	}
</code>
<img src="../pics/print.gif" alt="print関数" />
文字列内で改行したい場合は「\n」を使用します。<br />文字列内で「\n」を使用する場合には「\\n」と書きます。
<code class="go">
	func main() {
		fmt.Print("文字列内で\n改行するためには\n「\\n」を使用するよ♪")
	}
	
	/* &darr; コンソール &darr;
	文字列内で
	改行するためには
	「\n」を使用するよ♪
	*/
</code>
<div class="separator"></div>
また、カンマで区切って複数のデータを表示することもできます。
<code class="go">
	func main() {
		fmt.Print("りんご", 10, true, 10.25)
	}
	
	/* &darr; コンソール &darr;
	りんご10 true 10.25
	*/
</code>
異なるデータ型のデータを表示する際に重宝します。
<p class="r">データ型については後ほど説明します。</p>
<h3>Println</h3>
Print関数の自動で改行されるバージョンです。
<code class="go">
	fmt.Println("表示する文字列")
</code>
これもPrint関数と同様にfmtパッケージに用意されています。
<code class="go">
	func main() {
		fmt.Println("自動で")
		fmt.Println("改行")
		fmt.Println("されるよ♪")
	}
</code>
<img src="../pics/println.gif" alt="println関数" />
<h2>標準入力</h2>
コンソール画面から文字を入力します。
<code class="go">
	var 変数名 データ型
	fmt.Scan(&amp;変数名)
</code>
変数やら「&amp;」やらが出てきましたね、、、<br />この段階では無視してok!です。<br />とりあえずここでは、fmtパッケージに用意されているScan関数を使用することを覚えてください。<br /><br />では、入力した文字を若干加工して表示する簡単なプログラムを作成してみましょう♪
<code class="go">
	func main() {
		var lang string
		fmt.Scan(&lang)
		fmt.Println("あなたの好きな言語は" + lang + "ですね♪")
	}
</code>
<img src="../pics/scan.gif" alt="scan関数" />
<?php footer(); ?>