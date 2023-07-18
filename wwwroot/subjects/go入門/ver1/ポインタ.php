<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-11",
	"updated" => "2022-02-11"
);
head($obj);
?>
<h2>ポインタ</h2>
c/c++やgo・rustなどのシステムプログラミング言語における最大の難関です。<br />システムプログラミング言語の学習でつまずく人の90%以上がこのポインタで挫折していると勝手に思っています。<br />では本題に、ポインタとはプログラムを動かす際に使用される変数(オブジェクト)に関して、メモリ上での変数(オブジェクト)の位置(アドレス)を指す識別子です。
<img src="../pics/ポインタ.png" alt="ポインタ" />
<h2>ポインタとアドレス演算子</h2>
変数のアドレスを取得するにはアドレス演算子(&amp;)を使用します。<br />変数の前に「&amp;」を付けるだけです。
<code class="go">
	&amp;変数
</code>
では整数型nのアドレスを表示してみましょう♪
<code class="go">
	func main() {
		var n int = 10
		fmt.Println(&amp;n)
	}

	/* &darr; コンソール &darr;
	0xc0000aa058
	*/
</code>
アドレスは当然、毎回異なります。<br />ではこのアドレスを変数に保存してみましょう♪
<code class="go">
	/* コンパイルエラー */

	func main() {
		var n int = 10
		var p int = &amp;n
		fmt.Println(&amp;n)
	}

	/* &darr; コンソール &darr;
	cannot use &n (value of type *int) as int value in variable declaration
	*/
</code>
アドレスは整数っぽいですが整数としては保存できません。<br />アドレスを格納するためにはポインタ型として変数を定義する必要があります。<br />ポインタ型は以下のように宣言します。
<code class="go">
	var 変数 *データ型
	変数 = アドレス
</code>
宣言を省略して型を推論させてもok!です。
<code class="go">
	変数 := アドレス
</code>
goではアドレスはその変数のデータ型に関わらず整数型(int32かint64)となります。<br />しかしながら、ポインタ型としてはデータ型が異なるポインタは別のデータ型として認識されます。<br />例えば、int型のポインタとstring型のポインタは異なるポインタ型として認識されます。<br /><br />では、先ほどのn変数をアドレスをポインタとしてp変数に代入して表示しましょう♪
<code class="go">
	func main() {
		var n int = 10
		var p *int = &n
		fmt.Println(p)
		fmt.Println(&n)
	}

	/* &darr; コンソール &darr;
	0xc0000aa058
	0xc0000aa058
	*/
</code>
アドレスは実行の都度異なりますが、両者は必ず一致します。
<h2>ポインタの参照</h2>
ポインタの参照先へアクセスするには以下のように書きます。
<code class="go">
	*ポインタ変数
</code>
では先ほど取得したポインタを使用してそのポインタが参照するデータを表示してみましょう♪
<code class="go">
	func main() {
		var n int = 10
		var p *int = &n
		fmt.Println(p)
		fmt.Println(*p)
	}

	/* &darr; コンソール &darr;
	0xc000012098
	10
	*/
</code>
これでアドレス「0xc000012098」にあるデータ(10)にアクセスできましたね♪
<h2>参照渡し</h2>
前回の関数の一番最後でスコープについて学びましたね♪<br />もう一度復習します。<br />以下のコードを実行すると何が出力されるでしょうか???
<code class="go">
	func fx(n int) {
		n = 123
	}

	func main() {
		var n int = 1
		fx(n)
		fmt.Println(n)
	}

	/* &darr; コンソール &darr;
	1
	*/
</code>
関数で宣言した変数にはスコープがあり、関数内で変数(引数)をどのように操作しようとも元のデータには何ら影響がないからでしたね♪<br />スコープが設けられていることは以下のコードで確認できます。
<code class="go">
	func fx(n int) {
		fmt.Println(&n)
	}

	func main() {
		var n int = 1
		fmt.Println(&n)
		fx(n)
	}

	/* &darr; コンソール &darr;
	0xc0000aa058
	0xc0000aa090
	*/
</code>
2つのアドレスが一致することは絶対にありません。<br />これで関数内の変数にスコープが設けられていることが確認できます。<br />では、アドレスそのものを渡してこれを表示してみましょう♪
<code class="go">
	func fx(n *int) {
		fmt.Println(n)
	}

	func main() {
		var n int = 1
		fmt.Println(&n)
		fx(&n)
	}

	/* &darr; コンソール &darr;
	0xc0000aa058
	0xc0000aa058
	*/
</code>
両者は必ず一致します。<br />これで関数のスコープの壁を破ることができました♪<br /><br />関数内でこの参照先を変更すれば元のデータも変更されるはずです。<br />確認してみましょう♪
<code class="go">
	func fx(n *int) {
		*n = 123
	}

	func main() {
		var n int = 1
		fx(&n)
		fmt.Println(n)
	}

	/* &darr; コンソール &darr;
	123
	*/
</code>
変更されました。<br />このように関数の引数にデータそのものではなく、データへのポインタ(参照)を渡すことを<strong>参照渡し(ポインタ渡し)</strong>と呼びます。<br /><br />複雑ですね、、、<br /><br />goはかなり簡単な方です。<br />c/c++はもっと複雑です、、、
<?php footer(); ?>