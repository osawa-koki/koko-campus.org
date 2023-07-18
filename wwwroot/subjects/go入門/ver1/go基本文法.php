<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>変数</h2>
変数とはプログラムを実行するにあたって使用する一時的なデータを保存するための箱を言います。<br />変数については以下の3つを学びます。
<ul>
	<li>変数の宣言</li>
	<li>変数の代入</li>
	<li>変数へのアクセス</li>
</ul>
<h3>変数の宣言</h3>
変数はvar修飾子を使用して宣言します。
<code class="go">
	var 変数 データ型
</code>
データ型については後で詳しく説明しますが、データの種類だと思ってください。<br />整数型・小数型・文字列型・etc...があります。<br />同一のデータ型の変数を複数宣言する場合には「,(カンマ)」で区切って連続して宣言することも可能です。
<code class="go">
	var x, y, z データ型
</code>
<h3>変数の代入</h3>
変数の代入とは宣言した変数に実際に値を格納することを言います。<br />「=」を用います。<br />「=」とはプログラミングの世界では「同じ」を意味するのではなく、右のデータを左に代入することを意味します。
<code class="go">
	変数 = データ
</code>
<div class="separator"></div>
変数の宣言と代入を同時に行うこともできます
<code class="go">
	var 変数 データ型 = データ
</code>
この場合は変数のデータ型を推論することが可能なので、データ型は省略することも可能です。
<code class="go">
	var 変数 = データ
</code>
<h3>変数へのアクセス</h3>
変数にアクセスするには変数をそのまま書きます。
<code class="go">
	変数
</code>
例えば変数に代入した「I Love Go」という文字列をPrint関数で表示するには以下のように書きます。
<code class="go">
	var txt = "I Love Go"
	fmt.Println(txt) //「I Love Go」
</code>
<div class="separator2"></div>
goでは変数の宣言を省略することもできます。<br />「:=」演算子を使用します。
<code class="go">
	変数 := データ
</code>
この方法では宣言と代入(初期化)を同時に行う方法と同様にデータ型は推論されます。<br />また、変数の宣言を書く必要がないため、より簡単に書けます。
<h2>定数</h2>
goでは最初に代入したデータを書き換えられない定数が存在します。<br />間違ってこれを上書するとエラーを発生させるため、コンパイル時のチェックをより強力にします。<br />varの代わりにconst修飾子を使用することで定数を宣言します。<br />定数という性質上、宣言と代入(初期化)を同時に行う必要があります。
<code class="go">
	const 定数 = データ

	const 定数 データ型 = データ
</code>
定数もデータ型と同様にデータ型を指定しないことで、データ型を推論することができます。<br />データ型を指定しないことで異なるデータ型との演算も可能になります。<br /><br />例えば固定数(100)を「int」型に固定した場合に整数型のデータ(5)と浮動小数点数型のデータ(2.5)と演算する場合を想定してください。
<code class="go">
	/* コンパイルエラー */

	func main() {
		const fixed int = 100
		fmt.Println(fixed * 5)
		fmt.Println(fixed * 2.5)
	}

	/* &darr; コンソール &darr;
	constant 2.5 truncated to integer
	*/
</code>
この処理をするためには型を変換する必要があります。
<code class="go">
	func main() {
		const fixed int = 100
		fmt.Println(fixed * 5)
		fmt.Println(float64(fixed) * 2.5)
	}

	/* &darr; コンソール &darr;
	500
	250
	*/
</code>
いちいち型変換をするのは大変ですよね、、、<br />固定数の初期化時にデータ型を宣言しなければ、型が推論されるためより簡単に書けます。
<code class="go">
	func main() {
		const fixed = 100
		fmt.Println(fixed * 5)
		fmt.Println(fixed * 2.5)
	}

	/* &darr; コンソール &darr;
	500
	250
	*/
</code>
<h2>データ型</h2>
少しだけ説明しましたね♪<br />データにはその種類を表すデータ型が存在します。<br />「25」は整数であって、「りんご」は文字列であって、「12.34」は小数であって、、、<br />こんな感じです。<br />データ型には大きく以下の5種類あります。
<ul>
	<li>整数型</li>
	<li>浮動小数点数型</li>
	<li>複素数型</li>
	<li>文字列型</li>
	<li>真偽値型</li>
</ul>
<h3>整数型</h3>
整数を表すデータ型です。<br />「10」「25」「-999」のようにそのまま数字を書きます。<br />マイナスを格納する場合は「符号あり」を使用し、「0」と正の整数のみを表す場合は「符号なし」を使用します。
<table>
	<caption>符号あり整数</caption>
	<tbody>
		<tr>
			<th>int</th>
			<td>32ビット型のOSなら32ビット、64ビット型のOSなら64ビットで符号あり整数を表します。</td>
		</tr>
		<tr>
			<th>int8</th>
			<td>8ビットで符号あり整数を表します。</td>
		</tr>
		<tr>
			<th>int16</th>
			<td>16ビットで符号あり整数を表します。</td>
		</tr>
		<tr>
			<th>int32</th>
			<td>32ビットで符号あり整数を表します。</td>
		</tr>
		<tr>
			<th>int64</th>
			<td>64ビットで符号あり整数を表します。</td>
		</tr>
	</tbody>
</table>
<table>
	<caption>符号なし整数</caption>
	<tbody>
		<tr>
			<th>uint</th>
			<td>32ビット型のOSなら32ビット、64ビット型のOSなら64ビットで符号なし整数を表します。</td>
		</tr>
		<tr>
			<th>uint8</th>
			<td>8ビットで符号なし整数を表します。</td>
		</tr>
		<tr>
			<th>uint16</th>
			<td>16ビットで符号なし整数を表します。</td>
		</tr>
		<tr>
			<th>uint32</th>
			<td>32ビットで符号なし整数を表します。</td>
		</tr>
		<tr>
			<th>uint64</th>
			<td>64ビットで符号なし整数を表します。</td>
		</tr>
	</tbody>
</table>
通常は「int」型を使用します。<br />また、同じ整数型でもビット数が異なれば異なるデータ型として扱われます。
<div class="separator"></div>
また、ポインタを扱うための符号なし整数型に「uintptr」型があります。<br />ポインタの授業で扱います。
<h3>浮動小数点数型</h3>
小数を扱います。<br />「10.25」「0.01」「-99.99」のようにそのまま数字を書きます。
<table>
	<tbody>
		<tr>
			<th>float32</th>
			<td>32ビットで浮動小数点数を表します。</td>
		</tr>
		<tr>
			<th>float64</th>
			<td>64ビットで浮動小数点数を表します。</td>
		</tr>
	</tbody>
</table>
通常は「float64」型を使用します。<br />また、同じ浮動小数点数型でもビット数が異なれば異なるデータ型として扱われます。
<h3>複素数型</h3>
goには複素数型なんてのもあります。<br />他の言語で複素数計算を行う場合は実数部と虚数部に分けて計算を行っていましたが、goではそんなことをする必要がありません。<br />「complex(実数部,虚数部)」と表記します。
<table>
	<tbody>
		<tr>
			<th>complex64</th>
			<td>実数部と虚数部をそれぞれ32ビットで表します。</td>
		</tr>
		<tr>
			<th>complex128</th>
			<td>実数部と虚数部をぞれぞれ64ビットで表します。</td>
		</tr>
	</tbody>
</table>
<h3>文字列型</h3>
文字列型は「string」型の1つだけです。<br />「"(ダブルクォーテーション)」で囲んで「"りんご"」「"タンポポ"」「"25"」のように表記します。
<div class="separator"></div>
また、1文字だけを扱う場合には「rune」型を使用することもできます。<br />「rune」型はユニコードをint32で表すことを専門にしたデータ型です。<br />この場合は「'(シングルクォーテーション)」で囲んで「'あ'」「'桜'」「'A'」のように表記します。
<h3>真偽値型</h3>
真の場合は「true」、偽の場合は「false」を使用します。
<h2>演算</h2>
演算は他の言語とほとんど同じです。<br />注意点としては説明した通り、演算子の前後の空白文字は原則として使用しません。
<code class="go">
	1 + 1 //非推奨

	1+1 //こうやって書く
</code>
<h3>算術演算</h3>
<table>
	<caption>算術演算</caption>
	<tbody>
		<tr>
			<th>+</th>
			<td>足し算です。<br />「10+25」は「35」、「9+9」は「18」となります。。</td>
		</tr>
		<tr>
			<th>-</th>
			<td>引き算です。<br />「25-10」は「15」、「10-25」は「-15」となります。</td>
		</tr>
		<tr>
			<th>*</th>
			<td>掛け算です。<br />「5*2」は「10」、「-2*10」は「-20」となります。</td>
		</tr>
		<tr>
			<th>/</th>
			<td>割り算です。<br />「5/2」は「2.5」、「7/2」は「3.5」となります。</td>
		</tr>
		<tr>
			<th>%</th>
			<td>割り算の余りを求めます。<br />「5%2」は「1」、「10%7」は「3」となります。</td>
		</tr>
	</tbody>
</table>
<code class="go">
	func main() {
		fmt.Print("10+25 は ")
		fmt.Print(10+25)
		fmt.Println() //改行

		fmt.Print("5-25 は ")
		fmt.Print(5-25)
		fmt.Println() //改行

		fmt.Print("3*5 は ")
		fmt.Print(3*5)
		fmt.Println() //改行

		fmt.Print("25/5 は ")
		fmt.Print(25/5)
		fmt.Println() //改行
	}
</code>
<img src="../pics/算術演算.gif" alt="算術演算" />
<h3>文字列演算</h3>
文字列は「+」を用いて結合できます。
<code class="go">
	"隣の客は" + "よく柿食う客だ" //隣の客はよく柿食う客だ
</code>
<h3>論理演算</h3>
真偽値に関する演算です。<br />論理和演算と論理積演算があります。
<table>
	<caption>論理演算</caption>
	<thead>
		<tr>
			<th>かつ</th>
			<th>または</th>
		</tr>
		<tr>
			<th>&amp;&amp;</th>
			<th>||</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2つの条件式の両方が「真」の場合に「真」、どちらか一方でも「偽」の場合は「偽」となります。</td>
			<td>2つの条件式のいずれか一方でも「真」の場合に「真」、両方とも「偽」の場合は「偽」となります。</td>
		</tr>
	</tbody>
</table>
また、「!」演算子を用いれば「真」と「偽」を入れ替えることができます。
<h3>関係演算</h3>
2つの文字の大小関係から真偽値を算出する演算です。
<table>
	<caption>関係演算</caption>
	<tbody>
		<tr>
			<th>&lt;</th>
			<td>「小なり」<br />右の数字が左の数字よりも(同じを含まない)大きければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;=</th>
			<td>「小なりイコール」<br />右の数字が左の数字以上(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>「大なり」<br />右の数字が左の数字よりも(同じを含まない)小さければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;=</th>
			<td>「大なりイコール」<br />右の数字が左の数字以下(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>==</th>
			<td>左と右のデータが同じであれば「true」となります。<br />型が異なる場合は「false」とならずにエラーとなります。</td>
		</tr>

		<tr>
			<th>!=</th>
			<td>左と右のデータが異なれば「true」となります。<br />型が異なる場合は「true」とならずにエラーとなります。</td>
		</tr>
	</tbody>
</table>
goでは「==(等価演算子)」と「===(厳密等価演算子)」の区別はありません。<br />データ型が一致しているのは絶対条件で、データ型が異なればコンパイルエラーとなります。<br />同じ整数型でもビット数が異なれば異なるデータ型として扱われるため、以下のコードはエラーとなります。
<code class="go">
	/* コンパイルエラー */

	func main() {
		var x int8 = 5
		var y int16 = 5
		fmt.Println(x == y)
	}

	/* &darr; コンソール &darr;
	invalid operation: x == y (mismatched types int8 and int16)
	*/
</code>
<h2>型変換</h2>
<h3>数字型 &lt;---&gt; 数字型</h3>
goでは数字型同士の演算において、暗黙の型変換が行われません。<br />例えば、javaや/c++では自動的に大きい方に型変換されますが、goではこれがなされません。
<code class="c">
	int main(void) {
		int x; //xは整数型
		float y; //yは浮動小数点数型
		x = 2; //xに「2」を代入
		y = x; //xのデータ(2)をyに代入
		printf("%f", y); //「2.000000」
		return 0;
	}
</code>
整数型で宣言したx変数のデータを浮動小数点数型で宣言したy変数に代入するとその数値が暗黙に浮動小数点数型に変換されます。<br />go言語ではどうなるでしょうか???
<code class="go">
	/* コンパイルエラー */

	func main() {
		var x int //xは整数型
		var y float32 //yは浮動小数点数型
		x = 2 //xに「2」を代入
		y = x //xのデータ(2)をyに代入
		fmt.Print(y)
	}

	/* &darr; コンソール &darr;
	cannot use x (type int) as type float32 in assignment
	*/
</code>
go言語では暗黙の型変換が行われないため、明示的に型を変換する必要があります。<br />型は以下のように変換します。
<code class="go">
	型名(データ)
</code>
先ほどの例では以下のように型変換をする必要があります。
<code class="go">
	func main() {
		var x int
		var y float32
		x = 2
		y = float32(x)
		fmt.Print(y) //「2」
	}
</code>
これでok!です。<br />暗黙の型変換は便利である反面、思わぬバグを生む危険性を孕んでいるためgoやrustなどの新しい言語では禁止されています。
<h3>文字列型 &lt;---&gt; 整数型</h3>
文字列型を整数型に変換するには「strconv」パッケージに用意されている「Atoi」関数を使用します。
<code class="go">
	strconv.Atoi(データ)
</code>
では実際に型変換をしてみましょう♪
<code class="go">
	/* コンパイルエラー */

	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		txt = "123"
		fmt.Print(strconv.Atoi(txt) + 456)
	}

	/* &darr; コンソール &darr;
	cannot use n (type int8) as type string in argument to strconv.Atoi
	multiple-value strconv.Atoi() in single-value context
	*/
</code>
エラーコードを訳すと、「整数型のデータを文字列型として扱えないよ」「Atoi関数は複数の値を返すのに、単一の値しか想定されていないよ」となります。<br /><br />go特有のエラーです。<br />go言語では他の言語と異なり、複数の戻り値返すことができるんです。<br />びっくりですね♪<br />第一戻り値には型変換されたデータが返され、第二戻り値には型変換に失敗したとき用のエラー情報が格納されます。<br />型変換に成功した場合には第二戻り値は「nil(値が存在しない)」となります。<br /><br />したがって、先ほどのコードは以下のように書き直す必要があります。
<code class="go">
	/* コンパイルエラー */

	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		txt = "123"
		n, err := strconv.Atoi(txt)
		fmt.Print(n + 456)
	}

	/* &darr; コンソール &darr;
	err declared but not used
	*/
</code>
またしてもエラーです、、、<br />型変換に失敗したときにエラー情報を返す戻り値(第二戻り値)を格納するためのerr変数を宣言したのにも関わらず、使用していないためです。<br /><br />goでは宣言した変数は必ず使用する必要があります。<br />宣言して使用しないという選択肢はありません。<br />う～～～ん、、、<br />厳格ですね、、、<br /><br />goと同じく同じくc/c++の後継として期待されているrustは警告を発するだけでエラーになならないんですけどね、、、<br /><br />ではさらにプログラムを書き換えてみましょう♪
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		txt = "123"
		n, err := strconv.Atoi(txt)
		if err == nil {
			fmt.Print(n + 456)
		}
	}
</code>
条件分岐を使用しました。<br />条件分岐については後ほど説明しますが、errがnilであったら(型変換に成功したら)という条件を課しています。<br />型変換に失敗したのに無理やり演算を行うと思わぬバグの温床になりかねませんからね、、、<br /><br />大変だとは思いますが、コンパイル時にここまでチェックしてくれればプログラムの信頼性も高まりますね♪<br />プログラマがどれだけ注意してもヒューマンエラーは必ず発生しましからね、、、
<div class="separator"></div>
宣言した変数を使用しない方法も存在します。<br />使用することはオススメしませんが、、、<br />変数名を「_(アンダースコア)」とすると宣言して使用しなくてもエラーとなりません。<br />では、先ほどのコードをこれを用いて書き換えてみましょう♪
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		txt = "123"
		n, _ := strconv.Atoi(txt)
		fmt.Print(n + 456)
	}
</code>
取得されるデータは全てなんらかの意味を持つため、これを捨てることはエラーの温床になりかねません。<br />したがって、原則としては用いるべきではありません。<br />上の例では数字に変換できないデータを受け取ったのにもかかわらず、これをエラー処理できないためセキュリティ上問題であると言えます。
<h3>整数型 &lt;---&gt; 数字型</h3>
「strconv」パッケージに要されている「Itoa」関数を使用します。<br />Itoa関数と異なり、文字列への型変換は必ず成功するためエラー情報を返す第二戻り値は存在しません。<br />また、変換元の数字は「int」型である必要があり、「int8」「int16」などではエラーとなります。
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var n int
		n = 123
		txt := strconv.Itoa(n)
		fmt.Print(txt + "456")
	}

	/* &darr; コンソール &darr;
	123456
	*/
</code>
<?php footer(); ?>