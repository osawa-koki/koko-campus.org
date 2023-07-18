<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-11",
	"updated" => "2022-02-11"
);
head($obj);
?>
<h2>配列とスライス・マップ</h2>
配列とスライスは同一のデータ型の複数のデータを格納する複合的なデータ型です。<br />配列・スライス内の要素は「0」から始まるインデックス番号で管理されます。
<img src="../pics/配列とスライス.png" alt="配列とスライス" />
配列とスライスの違いは、配列が固定長であるのに対して、スライスは可変長であることです。<br />予め配列に格納するデータの数が決まっている場合に配列を使用し、後から追加・削除する場合にはスライスを使用します。
<div class="separator"></div>
配列とスライスがインデックス番号で要素を管理するのに対して、マップではキーと呼ばれる文字列を用いて要素を管理します。<br />他の言語でいう連想配列に該当します。
<img src="../pics/マップ.png" alt="マップ" />
<h2>配列</h2>
配列に関しては以下の3つを学びましょう♪
<ul>
	<li>配列の定義</li>
	<li>配列の要素へのアクセス</li>
	<li>配列の走査</li>
</ul>
<h3>配列の定義</h3>
以下のように配列を定義します。<br />初期化しない方法もありますが、固定長という性質上初期化するのが一般的であると言えます。
<code class="go">
	var 変数[要素数] データ型 = [要素数] データ型 {
		要素1,
		要素2,
		要素3,
	}
</code>
goは少し特殊で、「{...}」内の最後のカンマは改行しなければ不要ですが、改行する場合には付けないと「missing ',' before newline in composite literal」とエラーになります。<br /><br />面倒くさいので「:=」を使用してもっと簡単に書きましょう♪<br />また、この方法では要素数が省略可能です。
<code class="go">
	変数 := [...] データ型 {
		要素1,
		要素2,
		要素3,
	}
</code>
「[...]」は要素数を省略することを意味します。<br />「[]」としないのは、後ほど説明するスライスと区別するためです。<br /><br />では、プログラミング言語を格納する配列を作成してみましょう♪
<code class="go">
	lang := [...] string {
		"go",
		"rust",
		"python",
		"c/c++",
		"haskell",
	}
</code>
<h3>配列の要素へのアクセス</h3>
配列の要素へは「0」から始まるインデックス番号を用いてアクセスします。
<code class="go">
	配列[インデックス番号]
</code>
では先ほど作成した配列の要素にアクセスしてみましょう♪
<code class="go">
	import (
		"fmt"
		"strconv"
	)

	func main() {
		var txt string
		fmt.Scan(&txt)
		n, err := strconv.Atoi(txt)
		var lang [5]string = [5]string{
			"go",
			"rust",
			"python",
			"c/c++",
			"haskell",
		}
		if err == nil {
			fmt.Println(lang[n])
		} else {
			fmt.Println("数字を入力してください♪")
		}
	}
</code>
<img src="../pics/配列の要素へのアクセス.gif" alt="配列の要素へのアクセス" />
<h3>配列の走査</h3>
配列の要素をひとつずつ取り出して処理をしましょう♪<br />前回学習したforループを使用します。<br />また、反復処理の回数を指定するためには配列の要素数を得る必要がありますが、これはlen関数を使用します。<br />関数に関しては後ほど学習しますが、あるデータを基に何らかのデータを取得する処理だと思ってください。
<code class="go">
	len(配列)
</code>
forループを0から「len(配列)」まで回します。
<code class="go">
	func main() {
		var lang [5]string = [5]string{
			"go",
			"rust",
			"python",
			"c/c++",
			"haskell",
		}
		for i := 0; i < len(lang); i++ {
			fmt.Println(lang[i])
		}
	}

	/* &darr; コンソール &darr;
	go
	rust
	python
	c/c++
	haskell
	*/
</code>
<h2>スライス</h2>
スライスとは配列の可変長バージョンです。<br />性質は配列と同様ですが、若干処理が異なります。<br />スライスに関しては以下の4つを学びます。
<ul>
	<li>スライスの定義</li>
	<li>スライスの参照性</li>
	<li>長さと容量</li>
	<li>要素の追加・削除</li>
</ul>
<h3>スライスの定義</h3>
スライスを定義するには、配列と同様に初期化して定義する方法と配列から抽出して定義する方法があります。
<h4>配列と同様の方法</h4>
以下のように書きます。
<code class="go">
	スライス := [] データ型 {
		要素1,
		要素2,
		要素3,
	}
</code>
要素数は指定しません。
<h4>配列から抽出する方法</h4>
以下のように書きます。
<code class="go">
	配列 := [要素数] データ型 {
		要素1,
		要素2,
		要素3,
	}

	スライス := 配列[スタート : エンド]
</code>
これでスタートからエンドで指定した部分の要素からなるスライスを生成できます。<br />配列の全要素を抽出してスライスを生成する場合には以下のように書きます。
<code class="go">
	スライス := 配列[:]
</code>
では先ほど作成した配列からスライスを作成してみましょう♪
<code class="go">
	func main() {
		lang := [...]string{
			"go",
			"rust",
			"python",
			"c/c++",
			"haskell",
		}
		lang2 := lang[1:4]
		for i := 0; i < len(lang2); i++ {
			fmt.Println(lang2[i])
		}
	}

	/* &darr; コンソール &darr;
	rust
	python
	c/c++
	*/
</code>
langという配列からlang2というスライスを作成しています。
<h3>スライスの参照性</h3>
最初に以下のコードを見てください♪<br />
<code class="go">
	func main() {
		lang := [...]string{
			"go",
			"rust",
			"python",
			"c/c++",
			"haskell",
		}
		lang2 := lang[1:4]
		lang[2] = "fortran" //元の配列を変更♪♪♪
		for i := 0; i < len(lang2); i++ {
			fmt.Println(lang2[i])
		}
	}

	/* &darr; コンソール &darr;
	rust
	fortran
	c/c++
	*/
</code>
配列からスライスを作成した後に元の配列を変更すると、スライスも変更されることが確認できますね♪<br />これは配列からスライスを作成した場合は、スライスは配列の要素をコピーして作られるのではなく、元の配列を参照しているだけだからです。
<h2>長さと容量</h2>
スライスには配列と異なり、長さ(length)と容量(capacity)というパラメータを持ちます。
<table>
	<thead>
		<tr>
			<th width="50%">長さ</th>
			<th width="50%">容量</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>スライスが格納している要素の数を言います。<br />len関数で取得します。</td>
			<td>スライスが参照する配列の大きさを言います。<br />スライスの先頭の要素から数えることに注意してください。<br />cap関数で取得します。</td>
		</tr>
	</tbody>
</table>
では、実際に確認してみましょう♪
<code class="go">
	func main() {
		lang := [...]string{
			"go",
			"rust",
			"python",
			"c/c++",
			"haskell",
		}
		lang2 := lang[0:3]
		fmt.Println(len(lang2))
		fmt.Println(cap(lang2))
	}

	/* &darr; コンソール &darr;
	3
	5
	*/
</code>
<img src="../pics/長さと容量.png" alt="スライスの長さ・容量" />
なんだかややこしいですね、、、<br />他の言語ではオブジェクトの参照という性質はあっても参照の一部を抽出して操作することはありませんもんね、、、<br />僕も未だに混乱することがあります。
<h3>要素の追加・削除</h3>
append関数を使用します。<br />スライスの一番最後に要素が追加されます。
<code class="go">
	新しいスライス := append(元のスライス, 要素1, 要素2, 要素3)
</code>
また、goはオブジェクト指向をサポートしていないため、メソッドではないことに注意してください。<br />したがって、破壊的な動作をしません。<br />戻り値として新しいスライスを返すため、これを新たな変数に格納する必要があります。<br /><br />では、先ほど作成したスライスに要素を追加してみましょう♪
<code class="go">
	func main() {
		lang := [...]string{
			"go",
			"rust",
			"python",
			"c/c++",
			"haskell",
		}
		lang2 := lang[0:3] //スライスの生成
		lang3 := append(lang2, "ruby") //スライスに「ruby」を追加
		fmt.Println(lang2) //元のスライスは変更されない
		fmt.Println(lang3)
	}

	/* &darr; コンソール &darr;
	[go rust python]
	[go rust python ruby]
	*/
</code>
これは理解できると思います。<br />では上のコードで元の配列はどう変化したと思いますか???
<code class="go">
	func main() {
		lang := [...]string{
			"go",
			"rust",
			"python",
			"c/c++",
			"haskell",
		}
		lang2 := lang[0:3]
		lang3 := append(lang2, "ruby")
		fmt.Println(lang) //元の配列はどうなるでしょう???
		fmt.Println(lang2)
		fmt.Println(lang3)
	}
	/* &darr; コンソール &darr;
	[go rust python ruby haskell]
	[go rust python]
	[go rust python ruby]
	*/
</code>
分かりましたか???<br />スライスの一番最後に要素が追加されるため、配列の一部を抽出してスライスを生成している場合は途中に要素が追加されます。
<img src="../pics/append-スライス.png" alt="append関数 スライス" />
スライスへの要素の追加・削除の方法はappend関数だけです。<br />スライスからさらに一部を抽出してスライスを生成することができるため、これを利用して指定の位置に要素を追加します。
<h2>マップ</h2>
配列・スライスの独自に設定する文字列で要素を管理するバージョンです。<br />要素を特定する文字列をキーと呼び、要素自体をバリューと呼びます。
<img src="../pics/キー・バリュー.png" alt="キー バリュー" />
マップに関しては以下の5つを学びましょう♪
<ul>
	<li>マップの定義</li>
	<li>マップの要素へのアクセス</li>
	<li>要素の追加</li>
	<li>要素の削除</li>
	<li>マップの走査</li>
</ul>
<h3>マップの定義</h3>
定義は配列・スライスとほとんど同じです。キーとバリューを「:」で区切ります。
<code class="go">
	var マップ名 map[キーのデータ型] バリューのデータ型 = map[キーのデータ型] バリューのデータ型 {
		キー1: バリュー1,
		キー2: バリュー2,
		キー3: バリュー3,
	}
</code>
ここまできたらもう分かりますね♪<br />「:=」を用いてもっと簡単に書きましょう♪
<code class="go">
	マップ名 := map[キーのデータ型] バリューのデータ型 {
		キー1: バリュー1,
		キー2: バリュー2,
		キー3: バリュー3,
	}
</code>
では、拡張子をキーとしてプログラミング言語名をバリューとするマップを定義しましょう♪
<code class="go">
	func main() {
		var lang map[string]string = map[string]string{
			"go": "go",
			"py": "python",
			"rs": "rust",
			"hs": "haskell",
			"f":  "fortran",
		}
		fmt.Println(lang)
	}

	/* &darr; コンソール &darr;
	map[f:fortran go:go hs:haskell py:python rs:rust]
	*/
</code>
マップでは要素はキーによってのみ管理されるため、書いた順に表示されるとは限らない点に注意してください。
<h3>マップの要素へのアクセス</h3>
マップの要素にアクセスするには以下のように書きます。
<code class="go">
	マップ[キー]
</code>
<code class="go">
	func main() {
		var lang map[string]string = map[string]string{
			"go": "go",
			"py": "python",
			"rs": "rust",
			"hs": "haskell",
			"f":  "fortran",
		}
		fmt.Println(lang["go"])
		fmt.Println(lang["rs"])
		fmt.Println(lang["f"])
	}

	/* &darr; コンソール &darr;
	go
	rust
	fortran
	*/
</code>
<h3>要素の追加</h3>
以下のように書きます。
<code class="go">
	マップ[キー] = バリュー
</code>
既にそのキーが存在すればデータを上書きします。
<code class="go">
	func main() {
		var lang map[string]string = map[string]string{
			"go": "go",
			"py": "python",
			"rs": "rust",
			"hs": "haskell",
			"f":  "fortran",
		}
		lang["rb"] = "ruby" //rb:rubyを追加
		lang["py"] = "python3" //pyのバリューをpython3に上書き
		fmt.Println(lang)
	}

	/* &darr; コンソール &darr;
	map[f:fortran go:go hs:haskell py:python3 rb:ruby rs:rust]
	*/
</code>
<h3>要素の削除</h3>
要素を削除するにはdelete関数を使用します。
<code class="go">
	delete(マップ, キー)
</code>
delete関数は指定した要素を返すのではなく、マップそのものを変更します。
<code class="go">
	func main() {
		var lang map[string]string = map[string]string{
			"go": "go",
			"py": "python",
			"rs": "rust",
			"hs": "haskell",
			"f":  "fortran",
		}
		delete(lang, "f")
		delete(lang, "py")
		fmt.Println(lang)
	}

	/* &darr; コンソール &darr;
	map[go:go hs:haskell rs:rust]
	*/
</code>
<h3>マップの走査</h3>
rangeキーワードを使用します。<br />rangeキーワードとはマップからキーと要素をセットで取り出すために使用されます。<br />以下のように記述します。
<code class="go">
	変数1, 変数2 := range マップ
</code>
変数1にキーが代入され、変数2にバリューが代入されます。<br />マップから全ての要素を取り出して処理するためには以下のように書きます。
<code class="go">
	for k, v := range マップ {
		//キーはk
		//バリューはv
	}
</code>
では先ほど作成したプログラミング言語を格納したマップを走査してみましょう♪
<code class="go">
	func main() {
		var lang map[string]string = map[string]string{
			"go": "go",
			"py": "python",
			"rs": "rust",
			"hs": "haskell",
			"f":  "fortran",
		}
		for k, v := range lang {
			fmt.Print("拡張子 " + k + " の言語は " + v + "ですね♪\n")
		}
	}

	/* &darr; コンソール &darr;
	拡張子 go の言語は goですね♪
	拡張子 py の言語は pythonですね♪
	拡張子 rs の言語は rustですね♪
	拡張子 hs の言語は haskellですね♪
	拡張子 f の言語は fortranですね♪
	*/
</code>
<?php footer(); ?>