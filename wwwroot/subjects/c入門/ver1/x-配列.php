<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2022-11-22",
	"updated" => "2021-11-22"
);
head($obj);
?>
<h2>配列</h2>
同じデータ型のデータを複数格納するためのデータ型です。<br />配列に格納されるデータは「要素」と呼ばれ、配列内での各要素の位置は「0」から始まるインデックス番号で管理されます。
<h2>配列の作成</h2>
配列を作成するためには「配列の型 変数名[要素の数];」で定義します。
<code class="c">
	int main(void) {
		int ary[5]; /*整数型のデータを「5」つ格納する配列を作成*/
		return 0;
	}
</code>
<h2>配列の要素の代入</h2>
配列の各要素にデータを代入するためには「配列名[インデックス番号] = 代入するデータ」で実行します。
<code class="c">
	int main(void) {
		int ary[3];
		ary[0] = 111;
		ary[1] = 222;
		ary[2] = 333;
		return 0;
	}
</code>
<h2>配列の初期化</h2>
配列の宣言と代入を同時に行うためには「{}(ブレース)」を使用します。
<code class="c">
	int main(void) {
		int ary[3] = {111, 222, 333};
		return 0;
	}
</code>
<h2>配列の走査</h2>
配列の要素を順にひとつずつ取り出します。<br />配列の各要素は「配列名[インデックス番号]」でアクセスできるため、forを用いて反復処理を行うことでこれを実現します。
<code class="c">
	int main(void) {
		int i;
		int ary[3] = {111, 222, 333};
		for (i = 0; i < 3; i++) {
			printf("%d\n", ary[i]);
		}
		return 0;
	}
</code>
<h3>配列のコピー</h3>
ちなみにですけど配列をコピーするのに「=」は使用できません。<br />コンパイルエラーとなります。<br />配列をコピーするにはコピー元の配列の要素をforループでひとつずつ取り出してコピー先の配列の各要素に代入する必要があります。
<code class="c">
	int main(void) {
		int i;
		int ary[3] = {111, 222, 333};
		int copied[3];
		for (i = 0; i < 3; i++) {
			copied[i] = ary[i];
		}
		return 0;
	}
</code>
<?php footer(); ?>