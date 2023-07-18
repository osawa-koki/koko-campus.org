<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-11",
	"updated" => "2022-02-11"
);
head($obj);
?>
<h2>条件分岐(if)</h2>
「もし～～～ならば」という条件を満たすかどうかで処理を変えます。<br />以下のように書きます。
<code class="go">
	if エントリー文; 条件式 {
		//条件式を満たした場合の処理
	} else {
		//条件式を満たさなかった場合の処理
	}
</code>
エントリー文とはif構文に入る前に一度だけ実行される文です。<br />省略することも可能です。<br />エントリー文で宣言された変数は当該ifブロック内でのみ有効となり、ifブロックを抜けると自動で解放されます。<br />前回の授業で文字列型のデータを整数型に変換して処理を行うプログラムを作成しましたね♪<br />コードを下に再掲します。
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
型変換で使用したAtoi関数の第二引数で渡されるエラー情報(err変数)はあくまでも型変換に成功したか否かでの条件分岐でしか使用しません。<br />したがって以下のように書き換えることでコードがよりシンプルになります。
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		txt = "123"
		if n, err := strconv.Atoi(txt); err == nil {
			fmt.Print(n + 456)
		}
	}
</code>
上のコードではn変数とerr変数は続くif構文の中でしか使用できません。<br />使用する変数を使用する場所だけで有効にしておくためにもエントリー文は有効です。<br />go特有のものですが、高い効果を発揮するので是非マスターしましょう♪<br /><br />またc/c++と異なり、条件式は真偽値である必要があります。<br />c/c++では「0」か「0以外」で判定し、他の言語でもこれを継承していることが多いですが、goでは条件式は必ず「true」か「false」を返すように設定してください。
<div class="separator"></div>
では入力した文字が奇数か偶数かを判定するプログラムを作成しましょう♪
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		fmt.Scan(&txt)
		if n, err := strconv.Atoi(txt); err == nil {
			if n%2 == 0 {
				fmt.Println("奇数です♪")
			} else {
				fmt.Println("偶数です♪")
			}
		} else {
			fmt.Println("数字を入力してね♪")
		}
	}
</code>
<img src="../pics/奇数-偶数判定プログラム.gif" alt="奇数-偶数判定プログラム" />
<div class="separator"></div>
if文を連鎖させることもできます。<br />下の例では入力した数字が「3の倍数」か「3の倍数 + 1」か「3の倍数 + 2」かを判定しています。
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		fmt.Scan(&txt)
		if n, err := strconv.Atoi(txt); err == nil {
			if n%3 == 0 {
				fmt.Println("3nです♪")
			} else if n%3 == 1 {
				fmt.Println("3n+1です♪")
			} else {
				fmt.Println("3n+2です♪")
			}
		} else {
			fmt.Println("数字を入力してね♪")
		}
	}
</code>
<img src="../pics/3n判定プログラム.gif" alt="3n判定プログラム" />
<h2>条件分岐(switch)</h2>
あるデータを他の複数のデータと比較して実行する処理を制御します。<br />「==」で判定するif文が複数連なっている場合はswitch文が有効です。<br />以下のように書きます。
<code class="go">
	switch エントリー文; 対象の比較対象の値 {
		case 値1, 値2, 値3:
			//処理X
		case 値4, 値5:
			//処理Y
		case 値6, 値7:
			//処理Z
		default:
			//いずれにもマッチしなかった場合の処理
	}
</code>
<img src="../pics/switch-説明.png" alt="switch文" />
他の言語ではあるcaseにマッチした場合は「break;」に出会うまでそれ以下の処理へ飛びますが、goではマッチしたcase直後の処理を実行し終わったらswitch文から抜け出します。<br />goで他の言語でのswitchのように「break;」でswitch文から抜け出さずに下の処理へ飛ばせる場合には「fallthrough」を使用します。
<code class="go">
	switch エントリー文; 対象の比較対象の値 {
		case 値1, 値2, 値3:
			//処理X
			fallthrough
		case 値4, 値5:
			//処理Y
			fallthrough
		case 値6, 値7:
			//処理Z
			fallthrough
		default:
			//いずれにもマッチしなかった場合の処理
	}
</code>
上のコードでは「case 値1, 値2, 値3:」を満たした場合は「処理X」「処理Y」「処理Z」「いずれにもマッチしなかった場合の処理」の全てが実行されます。<br /><br />また、switch文でもif同様にエントリー文を使用可能です。<br /><br />では、拡張子からファイルを判定するプログラムを作成してみましょう♪
<img src="../pics/拡張子判定プログラム.gif" alt="拡張子判定プログラム" />
<h3>真偽値判定switch</h3>
goでは他の言語と異なりcase内での真偽値によって処理を制御することもできます。<br />この場合はswitchの後に続く対象となる値は省略します。
<code class="go">
	switch エントリー文; {
		case 条件式1:
			//処理X
		case 条件式2:
			//処理Y
		case 条件式3:
			//処理Z
		default:
			//いずれも「true」でなかった場合の処理
	}
</code>
これはswitchの後のの比較対象のデータが自動で「true」にセットされているからです。<br />したがって、case以降の評価式で「true」となればマッチするため、その後の処理が実行されます。<br /><br />では入力した月から季節を返すプログラムを作成してみましょう♪
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		fmt.Scan(&txt)
		switch month, err := strconv.Atoi(txt); {
		case 3 &lt;= month && month &lt;= 5:
			fmt.Println("春")
		case 6 &lt;= month && month &lt;= 8:
			fmt.Println("夏")
		case 9 &lt;= month && month &lt;= 11:
			fmt.Println("秋")
		case 1 &lt;= month || month &lt;= 12:
			fmt.Println("冬")
		default:
			if err == nil {
				fmt.Println("月は1～12である必要があります。")
			} else {
				fmt.Println("月を入力してください。")
			}
		}
	}
</code>
<img src="../pics/季節判定プログラム.gif" alt="季節判定プログラム" />
<h2>反復処理(for)</h2>
ある処理を一定回数繰り返します。<br />以下のように書きます。
<code class="go">
	for 初期化; 条件式; 後処理 {
		//反復処理...
	}
</code>
括弧を用いない点を除けば他の言語と同じですね♪<br />では入力した回数だけ「go!!!」と表示するプログラムを作成してみましょう♪
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		fmt.Scan(&txt)
		n, err := strconv.Atoi(txt)
		if err == nil {
			for i := 0; i < n; i++ {
				fmt.Println("go!!!")
			}
		} else {
			fmt.Println("数字を入力してください。")
		}
	}
</code>
<img src="../pics/forプログラム.gif" alt="forプログラム" />
<h3>無限ループ</h3>
最初に実行する回数を指定せずに無限ループさせて、処理内である条件を満たしたら強制的にループから抜け出させることがあります。<br />この場合の反復処理は以下のように書きます。
<code class="go">
	for {
		//無限ループ
	}
</code>
他の言語ではforではなく、whileを用いて以下のように書くことが多いです。
<code class="go">
	while true {
		//無限ループ
	}
</code>
goでは大分簡単に書けますね♪<br />そうでもないかな???
<h3>ループからの抜け出し</h3>
ループから抜け出すには以下の2つの文を使用します。
<div class="scroll-600w">
	<table>
		<thead>
			<tr>
				<th width="50%">continue</th>
				<th width="50%">break</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>そのループから抜け出して次のループへ飛びます。</td>
				<td>反復処理全体(forブロック)から抜け出します。</td>
			</tr>
		</tbody>
	</table>
</div>
ではちょっと高度なプログラミングをしてみましょう♪<br />フィボナッチ数列を入力した数字まで表示してみましょう♪
<div class="quote">
	<div>フィボナッチ数列</div>
	初項と第2項を1とし、第3項以後次々に前2項の和をとって得られる数列を言います。<br />
	「1 + 1」は「2」、「2」とひとつ前の数字である「1」を足して「3」、「3」とひとつ前の数字である「2」を足して「5」、「5」とひとつ前の数字である「3」を足して「8」、、、<br />
	1, 1, 2, 3, 5, 8, 13, 21, 34,...と続きます。
</div>
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		fmt.Scan(&txt)
		n, err := strconv.Atoi(txt)
		var before, now, after int = 1, 1, 1
		fmt.Println("フィボナッチ数列!!!")
		fmt.Println(before)
		fmt.Println(now)
		if err == nil {
			for {
				after = now + before
				if n < after {
					break
				}
				fmt.Println(after)
				before = now
				now = after
			}
		} else {
			fmt.Println("数字を入力してください♪")
		}
	}
</code>
<img src="../pics/フィボナッチ数列.gif" alt="フィボナッチ数列プログラム" />
<?php footer(); ?>