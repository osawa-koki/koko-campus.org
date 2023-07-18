<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-11",
	"updated" => "2022-02-11"
);
head($obj);
?>
<h2>関数</h2>
関数とはある一定の処理をまとめたものを言います。
<img src="../pics/関数.png" alt="関数" />
主な目的としては処理を求めることによるコードの簡素化・コードの可読性の向上、さらには関数内で宣言した変数にはスコープと呼ばれる有効範囲が設けられるため、変数が汚染されることを防止することがあげられます。
<h2>関数の定義</h2>
関数は以下のように定義します。
<code class="go">
	func 関数名(引数名 引数のデータ型) 戻り値 {
		//関数内の処理...
		return 戻り値
	}
</code>
<h3>関数名</h3>
全角文字も使用可能ですが、原則として全て半角英数字で小文字とします。<br />外部にパッケージとして公開することを目的とする場合は大文字を使用します。<br />addという名前の関数を定義する場合には以下のように書きます。
関数は以下のように定義します。
<code class="go">
	func add(引数名 引数のデータ型) 戻り値 {
		//関数内の処理...
		return 戻り値
	}
</code>
<h3>引数</h3>
関数に処理をお願いするデータを引数と呼びます。<br />引数は引数を受け取る変数とその引数のデータ型をセットで書きます。<br />また、引数が複数存在する場合には「,(カンマ)」で区切って表します。<br />例えば、整数型のデータを2つ引数としてとるadd関数は以下のように書きます。
<code class="go">
	func add(x int, y int) 戻り値 {
		//関数内の処理
		return 戻り値
	}
</code>
<h4>配列形式引数</h4>
複数の数の引数を配列として受け取ることもできます。<br />例えば引数として受け取ったn個の整数の総和を返す関数では予め引数の数を設定できません。<br />したがって、以下のように書くことで複数の引数をひとつの配列として受け取ることができます。
<code class="go">
	func関数名(変数 ...データ型) 戻り値 {
		//関数内の処理
		return 戻り値
	}
</code>
変数には配列形式で複数の引数が格納されます。
<h3>戻り値</h3>
関数が処理をしたデータを関数の呼び出しもとに返すデータのデータ型を指定します。<br />では、add関数の戻り値を設定してみましょう♪
<code class="go">
	func add(x int, y int) int {
		z := x + y
		return 戻り値
	}
</code>
goでは戻り値を複数設定する多値返却が可能です。<br />戻り値を複数設定する場合には括弧の中に「,(カンマ)」で区切って表します。
<code class="go">
	func 関数名(引数) (戻り値1のデータ型, 戻り値2のデータ型) {
		//関数内の処理
		return 戻り値
	}
</code>
<h4>名前付き戻り値</h4>
先ほどのadd関数では引数xと引数yを足してz変数に代入して、それを返すことを想定しています。<br />この場合、戻り値のデータ型(int)と戻り値の変数(z)をセットで書くことで自動的に戻り値を設定することが可能です。
<code class="go">
	func add(x int, y int) z int {
		z = x + y
		return 戻り値
	}
</code>
名前付き戻り値として設定された変数は宣言が不要です。
<h3>return</h3>
関数の戻り値を設定します。<br />関数内でreturn文に出会うと関数から抜け出し、return文の後のデータを戻り値として返します。
<code class="go">
	func add(x int, y int) int {
		z := x + y
		return z
	}
</code>
戻り値が複数ある場合には「,(カンマ)」で区切って表します。
<code class="go">
	func 関数名(引数) (戻り値1のデータ型, 戻り値2のデータ型) {
		//関数内の処理
		return 戻り値1, 戻り値2
	}
</code>
<div class="separator2"></div>
では、引数として受け取った数字の約数を全てスライス型で返すdivisor関数を定義してみましょう♪
<code class="go">
	func fx(num int) []int {
		ary := []int{} //空のスライスを作成(後で追加する目的)
		for i := 1; i < num/2; i++ { //1から引数の半分までループ
			if num%i == 0 { //引数÷iが割り切れれば、、、
				ary = append(ary, i) //その数をスライスに追加
			}
		}
		ary = append(ary, num) //最後にその数自体を追加
		return ary
	}
</code>
1から引数までループさせずに引数の半分までしかループさせなかったのは、ある数の半分以上の約数はその数しかないからです。<br />例えば「10」の約数は「10」を除いて絶対に「5(10/2)」以下ですよね♪<br />引数までループさせても問題ありませんが、、、
<h2>関数の使用</h2>
既に使用していますね♪<br />Print関数・Println関数やappend関数と使い方は同じです。
<code class="go">
	関数名(引数)
</code>
では先ほど作成したdivisor関数を使用してみましょう♪
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func divisor(num int) []int {
		ary := []int{}
		for i := 1; i < num/2; i++ {
			if num%i == 0 {
				ary = append(ary, i)
			}
		}
		ary = append(ary, num)
		return ary
	}

	func main() {
		var txt string
		fmt.Scan(&txt)
		n, err := strconv.Atoi(txt)
		if err == nil {
			x := divisor(n)
			fmt.Println(x)
		}
	}
</code>
<img src="../pics/関数の使用.gif" alt="関数の使用" />
<h2>特殊な関数</h2>
では、少し特殊な関数を使用してみましょう♪<br />特殊な関数とは戻り値を複数持つ関数・名前付き戻り値を使用した関数・配列型引数を使用している関数など既に説明したものです。
<h3>複数の戻り値を持つ関数</h3>
2つの整数を引数として受け取り、その和を第一戻り値として返し、第二引数には「この関数を使ってくれてありがとう♪」とのメッセージを返します。
<code class="go">
	func add(x int, y int) (int, string) {
		z := x + y
		thank_you := "この関数を使ってくれてありがとう♪"
		return z, thank_you
	}

	func main() {
		a, b := add(3, 5)
		fmt.Println(a)
		fmt.Println(b)
	}

	/* &darr; コンソール &darr;
	8
	この関数を使ってくれてありがとう♪
	*/
</code>
<h3>名前付き戻り値を使用した関数</h3>
では先ほどの関数を名前付き戻り値を使用して書き換えてみましょう♪
<code class="go">
	func add(x int, y int) (z int, thank_you string) {
		z = x + y
		thank_you = "この関数を使ってくれてありがとう♪"
		return
	}

	func main() {
		a, b := add(3, 5)
		fmt.Println(a)
		fmt.Println(b)
	}

	/* &darr; コンソール &darr;
	8
	この関数を使ってくれてありがとう♪
	*/
</code>
<h3>配列型引数を使用した関数</h3>
ではn個の引数の和を返す関数を作成してみましょう♪
<code class="go">
	func add_all(num ...int) (z int) {
		z = 0
		for i := 0; i < len(num); i++ {
			z = z + num[i]
		}
		return
	}

	func main() {
		n := add_all(3, 1, 5, 7)
		fmt.Println(n)
	}

	/* &darr; コンソール &darr;
	16
	*/
</code>
<h2>スコープ</h2>
関数内で宣言された変数はスコープ(有効範囲)が存在し、当該関数内でのみ有効です。<br />例えば以下のコードを実行したら何が出力されると思いますか???
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
引数で渡したn変数を関数内で書き換えても、関数内で受け取った引数も変数でありスコープが存在するため、これを変更しても元のデータは変更されません。<br />これを引数の<strong>値渡し</strong>と呼びます。<br />関数に渡したデータそのものを変更したい場合は<strong>参照渡し</strong>をする必要がありますが、これは次に学ぶポインタの知識が必要となります。<br /><br />それではシステムプログラミング言語の最大の難関、ポインタへLet's&nbsp;go!!!
<?php footer(); ?>