<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-11",
	"updated" => "2022-02-11"
);
head($obj);
?>
<h2>構造体とオブジェクト</h2>
構造体の授業で構造体とオブジェクトの類似性を感じましたか???<br />構造体は複数のデータをまとめることができ、さらにはそれ専用の関数(メソッド)を定義できることから、goでの事実上のオブジェクトであると言えます。<br /><br />しかしながら、構造体への関数の組み込みがいわゆるオブジェクトとは異なりますね、、、<br />他の言語ではクラスオブジェクトの中にデータ(プロパティ/フィールド)とメソッド(関数)をまとめて定義するのに対して、goでは構造体はデフォルトでデータ(プロパティ/フィールド)だけを格納し、外部で関数を定義してそれを構造体に組込みます。
<img src="../pics/オブジェクトと構造体.png" alt="オブジェクト 構造体" />
<h2>インターフェース</h2>
インターフェースとは構造体に組み込まれるメソッド(関数)をひとまとめにするための技術です。<br />インターフェースを使用する主な目的としては構造体に組み込むべきメソッドを適切に実装できているかを確認することです。<br />構造体に組み込まれているメソッド一覧を確認するには全ての関数をチェックしないといけませんね、、、<br />100行程度のコードであれば簡単に見つけられると思いますが、コードが1000行以上になるとこれが困難になりますね、、、<br />ひっとしたら見落としているかもしれません。<br /><br />インターフェースを使用することで構造体に組み込んでいる関数を簡単にチェックできます。<br /><br />コメントアウトで書き留めてもok!ですが、技術的にサポートした方が安心ですもんね♪
<img src="../pics/インターフェース.png" alt="インターフェース" />
<h2>インターフェースの定義</h2>
インターフェースは以下のように定義します。
<code class="go">
	type インターフェース名 interface {
		メソッド1
		メソッド2
		メソッド3
	}
</code>
インターフェース内で指定されたメソッドが全て構造体に追加されると、その構造体は自動でインターフェースを実行します。<br />また、インターフェースを実装するためには、インターフェース内のメソッドの名前と引数と戻り値がデータ型も含めて一致している必要があります。<br /><br />では、pkemon構造体のメンバを表示するメソッドを2つ定義しましょう♪<br />1つはshowメソッドで引数として受け取った値から構造体のメンバをセットし、もう一つはshowメソッドで構造体のデータを表示します。<br />そしてこの2つをインターフェースに実装してpoke_terfaceインターフェースを生成し、pokemon型のデータをpoke_terface型のデータとして扱いましょう♪
<code class="go">
	type pokemon struct {
		No int
		Name string
		Type [2]string
		Waza [4]string
	}

	type poke_terface interface {
		show()
		init(no int, name string, Type [2]string, waza [4]string)
	}

	func (self *pokemon) init(no int, name string, Type [2]string, waza [4]string) {
		self.No = no
		self.Name = name
		self.Type = Type
		self.Waza = waza
	}

	func (self *pokemon) show() {
		fmt.Println("図鑑番号は", self.No)
		fmt.Println("名前&nbsp;&nbsp;&nbsp;&nbsp;は", self.Name)
		fmt.Println("タイプ&nbsp;&nbsp;は", self.Type)
		fmt.Println("技&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;は", self.Waza)
	}
</code>
initメソッドもshowメソッドも引数と戻り値が完全に一致しているため、pokemon構造体にpoke_terfaceインターフェースが実装されています。
<h2>インターフェースの利用</h2>
インターフェースが実装されると、その対象の構造体型は当該構造体型であると同時に実装されたインターフェースのデータ型であると認識されます。<br /><br />したがって、pokemon構造体をpoke_terface型であるとも認識できます。<br />したがって、以下のコードが実行可能です。
<code class="go">
	type pokemon struct {
		No int
		Name string
		Type [2]string
		Waza [4]string
	}

	type poke_terface interface {
		show()
		init(no int, name string, Type [2]string, waza [4]string)
	}

	func (self *pokemon) init(no int, name string, Type [2]string, waza [4]string) {
		self.No = no
		self.Name = name
		self.Type = Type
		self.Waza = waza
	}

	func (self *pokemon) show() {
		fmt.Println("図鑑番号は", self.No)
		fmt.Println("名前&nbsp;&nbsp;&nbsp;&nbsp;は", self.Name)
		fmt.Println("タイプ&nbsp;&nbsp;は", self.Type)
		fmt.Println("技&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;は", self.Waza)
	}

	func main() {
		var pikachu poke_terface = new(pokemon)
		pikachu.init(
			25,
			"ピカチュウ",
			[2]string{"でんき", "なし"},
			[4]string{"ボルテッカー", "十万ボルト", "でんこうせっか", "ひかりのかべ"},
		)
		pikachu.show()
	}

	/* &darr; コンソール &darr;
	図鑑番号は 25
	名前&nbsp;&nbsp;&nbsp;&nbsp;は ピカチュウ
	タイプ&nbsp;&nbsp;は [でんき なし]
	技&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;は [ボルテッカー 十万ボルト でんこうせっか ひかりのかべ]
	*/
</code>
着目してほしいのはmain関数の一番最初の文です。
<code class="go">
	var pikachu poke_terface = new(pokemon)
</code>
この文はpokemon構造体をnew関数で初期化してpoke_terface型のpikachu変数に代入しています。<br />このコードは変数の宣言と代入を同時に行っているため、さらにこれを分解してみましょう♪
<code class="go">
	var pikachu poke_terface
	pikachu = new(pokemon)
</code>
pikachuという変数をpoke_terfaceというインターフェースのデータ型で宣言しています。<br />さらにこの変数にnew関数で初期化されたデータを代入しています。<br />う～～～ん、、、<br />難しいですね、、、<br /><br />これはpoke_terfaceインターフェース型がpokemon型に実装されているため、pokemon型のデータがpoke_terface型であるようにも扱えるからです。<br />なんとなく理解できましたか???
<h2>インターフェースの実装失敗</h2>
ではよくあるインターフェースの実装失敗例を確認してみましょう♪<br />以下の2つが考えられます。
<ul>
	<li>引数・戻り値の不一致</li>
	<li>インターフェースでのメソッドの不網羅</li>
</ul>
<h3>引数・戻り値の不一致</h3>
では先ほどの完成形を変更して、引数を一致していない状態にしてみましょう♪<br />インターフェース内のshow関数の引数にダミーでstring型のdummy引数を設定してみます。<br />show関数は引数をとらないため、インターフェース内のメソッドと構造体に組み込まれているメソッドが完全一致していない状態になりました。
<code class="go">
	/* 上のコード(完成形)の一部抜粋 */
	/* コンパイルエラー */

	type poke_terface interface {
		show(dummy string) //ダミーの引数を追加
		init(no int, name string, Type [2]string, waza [4]string)
	}

	func (self *pokemon) show() { //こちらは引数なし
		fmt.Println("図鑑番号は", self.No)
		fmt.Println("名前    は", self.Name)
		fmt.Println("タイプ  は", self.Type)
		fmt.Println("技      は", self.Waza)
	}

	/* &darr; コンソール &darr;
	cannot use new(pokemon) (type *pokemon) as type poke_terface in assignment:
		*pokemon does not implement poke_terface (wrong type for init method)
			have init(int, string, [2]string, [4]string, string)
			want init(int, string, [2]string, [4]string)
	*/
</code>
簡単に説明するとpoke_terfaceインターフェースがpokemon構造体に実装されていないため、エラーとなります。<br />エラーとあるのは以下のコードです。
<code class="go">
	var pikachu poke_terface = new(pokemon)
</code>
<p class="r">main関数の最後に実行されているshow関数でも引数が合っていないためエラーとなりますが、ここでは問題ではないためスルー♪</p>
理由はpokemon型のデータをpoke_terface型に代入しているからです。<br />インターフェースが実装されていない以上、2つのデータ型は異なるためこれはできません。
<h3>インターフェースでのメソッドの不網羅</h3>
今度はインターフェースにダミーのメソッドを追加してみましょう♪<br />このダミーのメソッドはpokemon構造体に組み込みません。<br />したがって、インターフェース内のメソッド全てが対象の構造体に組み込まれていない状態になります。
<code class="go">
	/* 上のコード(完成形)の一部抜粋 */
	/* コンパイルエラー */

	type poke_terface interface {
		show()
		init(no int, name string, Type [2]string, waza [4]string)
		dummy()
	}

	func dummy() {
		//何もしない(ダミー)
	}

	/* &darr; コンソール &darr;
	cannot use new(pokemon) (type *pokemon) as type poke_terface in assignment:
		*pokemon does not implement poke_terface (missing dummy method)
	*/
</code>
これはpokemon構造体がpoke_terfaceインターフェースを実装していない(dummyメソッドが不足している)から、pokemon構造体型のデータをpoke_terfaceインターフェース型として扱えないよ、、、<br />ってことです。
<div class="separator"></div>
う～～～ん、、、<br />難しいですね、、、(´;ω;｀)
<?php footer(); ?>