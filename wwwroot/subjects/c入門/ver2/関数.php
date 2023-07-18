<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-04",
	"updated" => "2022-01-04"
);
head($obj);
?>
<h2>関数</h2>
関数とはある一定の処理をひとまとめにして名前を付けたもので、主な目的は関数にあるデータを与えて一定の処理をした結果を戻り値として取得することです。<br />一定の処理をコピペしても同じ結果になりますが、コードが汚くなるため原則として同じ処理が2回以上でてきたら関数化して処理をまとまるべきです。<br /><br />因みに何度も出てきた「int main(void) {...}」も関数です。
<img src="../pics/関数.png" alt="関数の説明画像" />
<h2>関数の構造</h2>
最初に引数に半径を指定して実行すると円周(半径 &times; 2 &times; 3.14)を戻り値として返す関数(pai_r2)を紹介します。
<img src="../pics/関数の構造(プレーン).png" alt="関数の構造の説明画像" />
詳しく説明します。<br />関数は主に以下の5つのパーツからなります。
<ul>
	<li>戻り値のデータ型</li>
	<li>関数名</li>
	<li>引数</li>
	<li>関数内の処理</li>
	<li>戻り値</li>
</ul>
<img src="../pics/関数の構造.png" alt="関数の構造の説明画像" />
<h3>戻り値のデータ型</h3>
戻り値のデータ型では関数が戻り値として返すデータの型を指定します。<br />整数を返すのであれば「int」、小数を返すのであれば「double」、文字を返すのであれば「str」とします。<br /><br />通常の関数は引数を与えて戻り値を取得することを目的としますが、特殊な関数では戻り値を取得することを目的とせずに何らかの処理を実行することだけを目的とする場合があります。<br />ファイルにデータを書き込む関数や、コンソール画面に何かを表示する関数などが該当します。<br />こういった場合はダミーでとりあえず「int」を設定して戻り値としてなんらかの整数型のデータを返すか、戻り値のデータ型として「void」を設定します。
<p class="r">fortranなどの古い言語では引数から戻り値を以外の目的を持つ処理の集まりを「関数」と呼ばずに「サブルーチン」と呼ぶ場合もあります。</p>
<h3>関数名</h3>
関数を実行するための識別子として働く名前を設定します。<br />変数名と同様に半角英数字とアンダースコアが使用可能で、先頭に数字を使用することはできません。
<h3>引数</h3>
引数とは関数になんらかの処理をお願いするデータのことで、引数は関数名の後の「()」内に指定します。<br />「引数のデータ型 引数名」とセットで指定します。<br />引数が複数個存在する場合には「,(カンマ)」で区切ります。<br />引数をとらない場合は「()」とするか、「(void)」とします。
<h3>関数内の処理</h3>
関数内の処理はメインの部分と同様です。<br />関数の範囲は「{}(ブレース)」で指定します。
<h3>戻り値</h3>
関数内での処理が終了して関数が呼び出し元に返却するデータを指定します。<br />関数内でreturn文に出会うと、関数はそこで関数から抜け出して元の処理に戻ります。
<p class="r">return文に出会わなかった場合、関数のスコープの終端である「}」に出会うと関数から抜け出して元の処理に戻ります。<br />(この場合の戻り値はありません。)</p>
<h2>関数の実行</h2>
関数は「関数名(引数)」で実行します。<br />引数を複数渡す場合には「,(カンマ)」で区切ります。<br />関数が実行されると関数内で算出された戻り値が呼び出し元に返されます。
<code class="c">
	double pai_r2(int r) {
		double r2, ccm;
		r2 = r * 2;
		ccm = r2 * 3.14;
		return ccm;
	}
	int main(void) {
		printf("%f", pai_r2(5)); /*半径「5」の円周*/
		printf("%f", pai_r2(10)); /*半径「10」の円周*/
		printf("%f", pai_r2(15)); /*半径「15」の円周*/
		return 0;
	}
</code>
<h3>関数実行における注意点</h3>
関数においては以下の2点について注意する必要があります。
<ul>
	<li>引数の値渡し・参照渡し</li>
	<li>宣言・実行順序</li>
</ul>
<h4>引数の値渡し</h4>
関数に渡した引数を関数内で変更した場合に元のデータが変更されない場合とされる場合があります。<br />それぞれ、「値渡し」と「参照渡し」と呼ばれます。
<h5>値渡し</h5>
関数に渡した引数が配列以外である場合は値渡しによって引数が受け渡しされます。<br />言い換えれば、配列以外の引数を関数内で変更した場合でも、元のデータは変更されません。
<code class="c">
	double add_1(int num) {
		num++;
		printf("%d", num); /*「11」と出力*/
	}
	int main(void) {
		int i;
		i = 10;
		add_1(i);
		printf("%d", i); /*「10」と出力(変更されない)*/
	}
</code>
<h5>参照渡し</h5>
関数に渡した引数が配列である場合は参照渡しによって引数が受け渡しされます。<br />言い換えれば、配列の引数を関数内で変更した場合は、元のデータも変更されます。<br />引数として配列を受け取る際には配列名の後に「[]」を付けます。
<code class="c">
	double change(int num[]) {
		num[1] = 999;
	}
	int main(void) {
		int i, ary[5] = {1, 2, 3, 4, 5};
		change(ary);
		for (i = 0; i < 5; i++) {
			printf("%d\n", ary[i]);
		}
	}
	/* &darr; コンソール &darr;
	1
	999
	3
	4
	5
	と出力
	*/
</code>
引数として渡される配列は、関数を実行する側で与えた引数の配列そのものであるため元の配列も変更されてしまいます。<br />しかしながら、勝手にデータを書き換えられてしまうのは困りますね、、、<br />ということで通常は引数として渡したデータを変更不可にする「const」修飾子を使用します。<br />受け取る引数の前に「const」と書くだけでok!です。
<code class="c">
	double change(const int num[]) {
		num[1] = 999; /*エラー*/
	}
	int main(void) {
		int i, ary[5] = {1, 2, 3, 4, 5};
		change(ary);
		for (i = 0; i < 5; i++) {
			printf("%d\n", ary[i]);
		}
	}
</code>
「const」修飾子を付けた配列の要素を変更しようとすると、エラーとなります。
<h4>宣言・実行順序</h4>
構造化言語の性質のひとつ「順次実行」により、プログラムは上から順に実行されます。<br />そのため、関数を実行する前に関数が宣言されていなければ関数は実行できず、エラーとなります。<br />例えば、先ほどの円周を求めるコードを以下のように書くとエラーとなります。
<code class="c">
	int main(void) {
		printf("%f", pai_r2(5)); /*半径「5」の円周*/
		printf("%f", pai_r2(10)); /*半径「10」の円周*/
		printf("%f", pai_r2(15)); /*半径「15」の円周*/
		return 0;
	}
	double pai_r2(int r) {
		double r2, ccm;
		r2 = r * 2;
		ccm = r2 * 3.14;
		return ccm;
	}
</code>
<h2>スコープ</h2>
別名、「有効範囲」です。<br />関数内で宣言された変数が使用できるのはその関数のブロック「{}」内だけです。<br />そのため、関数内で宣言された変数の範囲をブロックスコープと呼ぶこともあります。<br /><br />反対に関数の外で宣言された変数はそのプログラムコードのどこからでも使用可能です。<br />これをファイル有効範囲と呼びます。<br /><br />新しい言語では関数外で宣言した変数をグルーバル変数、関数内で宣言した変数をローカル変数と呼ぶこともあります。
<?php footer(); ?>