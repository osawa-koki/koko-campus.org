<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-11",
	"updated" => "2022-02-11"
);
head($obj);
?>
<h2>ファイル操作</h2>
ここでは、ファイルの読み込みとファイルへの書き込み方法について学びます。<br />ファイル操作は以下の3つの手順を踏みます。
<img src="../pics/ファイル操作.png" alt="ファイル操作" />
<h2>ファイルを開く</h2>
ファイルを開くにはosパッケージに用意されているOpenFile関数を使用します。
<code class="go">
	変数1, 変数2 := os.OpenFile("ファイルへのパス", フラグ, パーミッション)
</code>
変数1には指定したファイルに関するファイル構造体が代入され、変数2にはファイルを開くのに失敗した場合のエラー情報が代入されます。
<table>
	<caption>フラグ</caption>
	<tbody>
		<tr>
			<th>O_RDONLY</th>
			<td>読み込み</td>
		</tr>
		<tr>
			<th>O_WRONLY</th>
			<td>書き込み</td>
		</tr>
		<tr>
			<th>O_RDWR</th>
			<td>読み込みと書き込み</td>
		</tr>
		<tr>
			<th>O_APPEND</th>
			<td>追記</td>
		</tr>
		<tr>
			<th>O_CREATE</th>
			<td>ファイルが存在しない場合に新たに作成</td>
		</tr>
		<tr>
			<th>O_TRUNC</th>
			<td>ファイルの内容を切り詰めてオープン</td>
		</tr>
	</tbody>
</table>
これらは全てosパッケージに用意されている定数です。<br />複数のフラグを選択する場合には「|(パイプ)」で結合します。<br /><br />第三引数のパーミッションではファイルに関する権限を指定します。<br />通常は「os.ModePerm」を指定すればok!です。<br />linux環境では「0777」に該当します。<br /><br />例えば、同じディレクトリ内にある「file.txt」を読み込み専用で開く場合は以下のように書きます。
<code class="go">
	fs, err := os.OpenFile("file.txt", os.O_RDONLY, os.ModePerm)
</code>
<h2>ファイルを閉じる</h2>
ファイルを開いて処理が完了したらファイルを忘れずに閉じましょう♪<br />ファイルの操作は後ほど説明しますので、ここではファイルを閉じる方法を説明します。<br />ファイルを閉じるには以下のように書きます。
<code class="go">
	ファイル構造体.Close()
</code>
ではファイルを開いて閉じるだけのプログラムを作成しましょう♪<br />何もしていないように思えますが、ファイルを開けるか(ファイルが存在するか)の判定をしています。
<code class="go">
	import (
		"fmt"
		"os"
	)

	func main() {
		var path string
		fmt.Scan(&amp;path)
		_, err := os.OpenFile(path+".txt", os.O_RDONLY, os.ModePerm)
		if err == nil {
			fmt.Println(path + ".txtファイルは存在します♪")
		} else {
			fmt.Println("ファイルが存在しません、、、")
		}
	}
</code>
<img src="../pics/プログラム-ファイル存在判定.gif" alt="ファイルの操作" />
ファイルを開けるかどうかだけ判定するため、開いた際のファイル構造体は使用しないため、「_(アンダースコア)」で捨てています。
<h2>ファイル操作</h2>
ここでは以下の2つを学びます。
<ul>
	<li>ファイルの読み込み</li>
	<li>ファイルへの書き込み</li>
</ul>
<h3>ファイルの読み込み</h3>
ioutilパッケージに用意されているReadAll関数を使用します。<br />第一引数にOpenFileの第一戻り値として取得したファイル構造体を渡します。<br />第一戻り値にはファイルの中身が渡され、第二戻り値にはファイルの内容の取得に失敗したときのエラー情報が渡されます。
<code class="go">
	変数1, 変数2 := ioutil.ReadAll(ファイル構造体)
</code>
ではfile.txtの中身を取得して表示しましょう♪
<code class="go">
	import (
		"fmt"
		"io/ioutil"
		"os"
	)

	func main() {
		path := "file"
		fs, err := os.OpenFile(path+".txt", os.O_RDONLY, os.ModePerm)
		if err == nil {
			txt, err := ioutil.ReadAll(fs)
			if err == nil {
				fmt.Println(txt)
			}
			fs.Close()
		} else {
			fmt.Println(path + ".txtファイルは存在しません、、、")
		}
	}

	/* &darr; コンソール &darr;
	[73 32 76 111 118 101 32 71 111 45 108 97 110 103 13 10 103 111 108 97 110 103 32 105 115 32 98 101 97 117 116 105 102 117 108 13 10 71 111 32 71 111 32 71 111 32 33 33 33]
	*/
</code>
なんだか、数字がたくさん表示されました、、、<br />これはファイルの内容は全てbyte配列で返されるからです。<br />これを文字列に変換するにはstring関数を使用します。<br /><br />では、先ほどのコードを書き換えてみましょう♪
<code class="go">
	import (
		"fmt"
		"io/ioutil"
		"os"
	)

	func main() {
		path := "file"
		fs, err := os.OpenFile(path+".txt", os.O_RDONLY, os.ModePerm)
		if err == nil {
			data, err := ioutil.ReadAll(fs)
			txt := string(data) //byte配列を文字列に変換
			if err == nil {
				fmt.Println(txt)
			}
			fs.Close()
		} else {
			fmt.Println(path + ".txtファイルは存在しません、、、")
		}
	}

	/* &darr; コンソール &darr;
	I Love Go-lang
	golang is beautiful
	Go Go Go !!!
	*/
</code>
文字列として表示されました♪
<h3>ファイルへの書き込み</h3>
ファイルへ文字列を書き込みには以下のように書きます。
<code class="go">
	変数1, 変数2 := ファイル構造体.WriteString("書き込む文字列")
</code>
変数1は使用しないため、「_(アンダースコア)」で捨てます。<br />変数2には書き込みに失敗した際にエラー情報が格納されます。<br /><br />では、入力した文字列をファイルに保存するプログラムを作成しましょう♪
<code class="go">
	import (
		"fmt"
		"os"
	)

	func main() {
		path := "file"

		var input string
		fmt.Scan(&amp;input)

		fs, err := os.OpenFile(path+".txt", os.O_WRONLY|os.O_TRUNC, os.ModePerm)
		if err == nil {
			_, err := fs.WriteString(input + "\n")
			if err == nil {
				fmt.Println("ファイルへの書き込み成功♪")
			} else {
				fmt.Println("ファイルへの書き込み失敗、、、")
			}
			fs.Close()
		} else {
			fmt.Println(path + ".txtファイルは存在しません、、、")
		}
	}
</code>
<img src="../pics/プログラム-ファイルへの書き込み.gif" alt="ファイル操作" />
typeコマンドはwindowsのコマンドでファイルの中身を表示します。<br />linuxでいうcatコマンドに該当します。<br /><br />次はファイルに追記するプログラムを作成しましょう♪<br />OpenFile関数のモードを変更するだけです。
<code class="go">
	import (
		"fmt"
		"os"
	)

	func main() {
		path := "file"

		var input string
		fmt.Scan(&amp;input)

		fs, err := os.OpenFile(path+".txt", os.O_APPEND, os.ModePerm)
		if err == nil {
			_, err := fs.WriteString(input + "\n")
			if err == nil {
				fmt.Println("ファイルへの書き込み成功♪")
			} else {
				fmt.Println("ファイルへの書き込み失敗、、、")
			}
			fs.Close()
		} else {
			fmt.Println(path + ".txtファイルは存在しません、、、")
		}
	}
</code>
<img src="../pics/プログラム-ファイルへの追記.gif" alt="ファイル操作" />
<h2>ReadFile関数</h2>
ioutilパッケージに用意されているファイルの読み込み専用の関数です。<br />ファイルを開いて、閉じる操作を省略できます。<br />ファイルの内容を単に読み込みだけならReadFile関数を使用しましょう♪<br />以下のように書きます。
<code class="go">
	変数1, 変数2 := ioutil.ReadFile("ファイルへのパス")
</code>
変数1にはファイルの中身がbyte配列で格納され、変数2にはファイルの読み込みに失敗した際にエラー情報が格納されます。<br />では、OpenFile関数を使用してファイルの中身を表示するプログラムをReadFile関数を使用して書き換えましょう♪
<code class="go">
	import (
		"fmt"
		"io/ioutil"
	)

	func main() {
		path := "file"

		data, err := ioutil.ReadFile(path + ".txt")
		if err == nil {
			txt := string(data) //byte配列を文字列に変換
			fmt.Println(txt)
		} else {
			fmt.Println(path + ".txtファイルは存在しません、、、")
		}
	}

	/* &darr; コンソール &darr;
	I Love Go-lang
	golang is beautiful
	Go Go Go !!!
	*/
</code>
<h2>WriteFile関数</h2>
ReadFile関数の書き込みバージョンです。<br />以下のように書きます。
<code class="go">
	変数 := ioutil.WriteFile("ファイルへのパス", byte配列, パーミッション)
</code>
通常は変数は「_(アンダースコア)」に格納して捨てます。<br /><br />書き込み文字列はbyte配列型である必要がありますので、文字列からbyte文字列に変換します。<br />以下のように書きます。
<code class="go">
	変数 := []byte("文字列")
</code>
また、パーミッションは「os.PermMode」を使用します。<br /><br />ではOpenFile関数を用いたファイルへ書き込みプログラムをWriteFile関数を使用して書き換えてみましょう♪
<code class="go">
	import (
		"fmt"
		"io/ioutil"
		"os"
	)

	func main() {
		path := "file"

		var input string
		fmt.Scan(&amp;input)

		_ = ioutil.WriteFile(
			path+".txt",
			[]byte(input),
			os.ModePerm,
		)
		fmt.Println([]byte(input))
	}
</code>
<div class="separator2"></div>
お疲れ様でした。<br />以上でgo入門-ver1は終了です。<br /><br />go中級編でお会いしましょう♪
<a href="../../go中級/branch" class="link-subject to-go中級"></a>
<?php footer(); ?>