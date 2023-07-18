<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-11",
	"updated" => "2022-02-11"
);
head($obj);
?>
<h2>構造体</h2>
構造体とは複数のデータをまとめて管理するデータ型です。<br />性質としてはマップに似ていますが、マップが同じデータ型の複数の要素をキーで管理するのに対して、構造体では異なるデータ型の複数の要素(メンバ)をキーで管理します。
<p class="r">同一のデータ型でもok!ですが、この場合はマップを使うべきです。</p>
<p class="r">構造体では要素のことをメンバと呼びます。</p>
また、構造体は複数のデータの集合体の雛形としての役割を持ち、そこから実際のデータを派生して作成することを想定しています。<br />これについては後ほど説明します。
<img src="../pics/構造体.png" alt="構造体" />
<h2>構造体の定義</h2>
構造体は以下のように定義します。
<code class="go">
	var 変数 struct {
		キー データ型
		キー データ型
		キー データ型
	}
</code>
キーの1文字目は大文字で書くことが多いです。<br />ではピカチュウ構造体を定義してみましょう♪
<code class="go">
	var pikachu struct {
		No   int
		Name string
		Type [2]string
		Waza [4]string
	}
</code>
<h2>メンバへのアクセス</h2>
構造体のメンバへアクセスするには以下のように書きます。
<code class="go">
	構造体変数.キー
</code>
では先ほど作成したポケモン構造体にピカチュウのデータを入力して完成させましょう♪
<code class="go">
	func main() {
		var pikachu struct {
			No   int
			Name string
			Type [2]string
			Waza [4]string
		}
		pikachu.No = 25
		pikachu.Name = "ピカチュウ"
		pikachu.Type = [2]string{"でんき", "なし"}
		pikachu.Waza = [4]string{"ボルテッカー", "十万ボルト", "でんこうせっか", "ひかりのかべ"}
		fmt.Println(pikachu)
	}

	/* &darr; コンソール &darr;
	{25 ピカチュウ [でんき なし] [ボルテッカー 十万ボルト でんこうせっか ひかりのかべ]}
	*/
</code>
<h2>構造体型の定義</h2>
先ほどは構造体というひとつのデータを作成しましたが、これではひとつのデータしか生成できません。<br />ピカチュウ構造体以外のチコリータ構造体やヒトカゲ構造体はまた別に定義しなければなりません。<br /><br />ということでポケモン全体に適用可能なpokemon構造体を作成して、そこからピカチュウやチコリータやヒトカゲのデータを派生して作成しましょう♪<br />このためにはtypeで構造体を型として定義する必要があります。
<code class="go">
	type 型名 struct {
		キー データ型
		キー データ型
		キー データ型
	}
</code>
ではこれを使用してpokemon構造体型を定義してみましょう♪
<code class="go">
	type pokemon struct {
		No   int
		Name string
		Type [2]string
		Waza [4]string
	}
</code>
これでpokemonはintやstringのようなデータ型と同様に扱うことができます。<br />したがって、これから複数のデータを派生させることができます。
<h2>構造体型のデータの生成</h2>
では、実際に構造体型のデータからデータを生成してみましょう♪<br />以下のように書きます。
<code class="go">
	var 変数 構造体型 = 構造体型 {
		キー データ型
		キー データ型
		キー データ型
	}
</code>
ではpokemon構造体型からpikachu構造体を生成してみましょう♪
<code class="go">
	type pokemon struct {
		No   int
		Name string
		Type [2]string
		Waza [4]string
	}

	func main() {
		var pikachu pokemon = pokemon{
			25,
			"ピカチュウ",
			[2]string{"でんき", "なし"},
			[4]string{"ボルテッカー", "十万ボルト", "でんこうせっか", "ひかりのかべ"},
		}
		fmt.Println(pikachu)
	}

	/* &darr; コンソール &darr;
	{25 ピカチュウ [でんき なし] [ボルテッカー 十万ボルト でんこうせっか ひかりのかべ]}
	*/
</code>
「:=」を使用して簡単に書くと以下のようになります。
<code class="go">
	type pokemon struct {
		No   int
		Name string
		Type [2]string
		Waza [4]string
	}

	func main() {
		pikachu := pokemon{
			25,
			"ピカチュウ",
			[2]string{"でんき", "なし"},
			[4]string{"ボルテッカー", "十万ボルト", "でんこうせっか", "ひかりのかべ"},
		}
		fmt.Println(pikachu)
	}

	/* &darr; コンソール &darr;
	{25 ピカチュウ [でんき なし] [ボルテッカー 十万ボルト でんこうせっか ひかりのかべ]}
	*/
</code>
<h2>new</h2>
あるデータ型を初期化するために使用されます。<br />初期化とはデータ型から実際のデータを派生して作成することを言います。<br />先ほどの例ではpokemon構造体はあくまでも雛形としての役割しか果たさないため、これ自身を使用することはできません。<br />したがって、ここから実際に使用可能なデータを作成する必要がありますが、これを初期化と呼びます。<br /><br />pikachu構造体を生成したように初期値を与えることもありますが、new関数を使用すれば全て空の状態で初期化することができます。<br /><br />また、new関数は戻り値としてデータそのものではなく、データへのポインタを返すことに注意してください。<br /><br />例えば以下のコードを確認してください。
<code class="go">
	type pokemon struct {
		No   int
		Name string
		Type [2]string
		Waza [4]string
	}

	func main() {
		pikachu := new(pokemon)
		fmt.Println(*pikachu)
	}

	/* &darr; コンソール &darr;
	&{0  [ ] [   ]}
	*/
</code>
先頭に「&amp;」がついていますね♪<br />これはポインタが返されていることを意味しています。<br />因みにこれをpokemon型として取得しようとすると当然エラーとなります。
<code class="go">
	/* コンパイルエラー */

	type pokemon struct {
		No   int
		Name string
		Type [2]string
		Waza [4]string
	}

	func main() {
		var pikachu pokemon = new(pokemon)
		fmt.Println(*pikachu)
	}

	/* &darr; コンソール &darr;
	cannot use new(pokemon) (value of type *pokemon) as pokemon value in variable
	*/
</code>
<h2>メソッド</h2>
goではオブジェクト指向をサポートしていませんが、構造体にメソッドを付与することができるため、これで疑似的にオブジェクトを作成できます。<br />関数を定義する際にその組み込み先のデータ型を指定することで実現します。<br />以下のように書きます。
<code class="go">
	func (変数 対象のデータ型) 関数名 (引数) 戻り値 {
		//関数の処理...
		//変数.キーで構造体内のメンバへアクセス
		return 戻り値
	}
</code>
対象のデータ型とセットで指定する変数はメソッド内でその構造体自体を指すのに使用されます。<br />僕はpythonでオブジェクト自身を表す慣例の変数とされているselfとすることが多いです。<br />メソッドは以下のように実行します。
<code class="go">
	構造体.メソッド(引数)
</code>
では、構造体内のデータを良い感じに表示するメソッドを作成してみましょう♪
<code class="go">
	type pokemon struct {
		No   int
		Name string
		Type [2]string
		Waza [4]string
	}

	func (self *pokemon) show() {
		fmt.Println("図鑑番号は", self.No)
		fmt.Println("名前&nbsp;&nbsp;&nbsp;&nbsp;は", self.Name)
		fmt.Println("タイプ&nbsp;&nbsp;は", self.Type)
		fmt.Println("技&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;は", self.Waza)
	}

	func main() {
		pikachu := pokemon{
			25,
			"ピカチュウ",
			[2]string{"でんき", "なし"},
			[4]string{"ボルテッカー", "十万ボルト", "でんこうせっか", "ひかりのかべ"},
		}
		pikachu.show()
	}

	/* &darr; コンソール &darr;
	図鑑番号は&nbsp;25
	名前&nbsp;&nbsp;&nbsp;&nbsp;は&nbsp;ピカチュウ
	タイプ&nbsp;&nbsp;は&nbsp;[でんき&nbsp;なし]
	技&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;は&nbsp;[ボルテッカー&nbsp;十万ボルト&nbsp;でんこうせっか&nbsp;ひかりのかべ]
	*/
</code>
また、構造体などの大きなデータを引数として渡すと、引数は通常は値渡しで行われるため実行効率が大幅に低下します。<br />したがって、構造体は原則として参照渡しとします。
<?php footer(); ?>