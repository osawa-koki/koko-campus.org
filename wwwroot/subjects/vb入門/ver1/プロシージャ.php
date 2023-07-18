<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>プロシージャ</h2>
プロシージャとは一連の処理をまとめたものを言います。<br />プロシージャは一連の処理が終わった後に戻り値としてデータを返すかどうかでサブルーチンと関数に分類されます。<br />戻り値を返さない単なる処理の集まりの場合はサブルーチンと呼ばれ、引数として受け取ったデータを加工してそのデータを戻り値として返す場合は関数と呼ばれます。
<img src="../pics/プロシージャ.png" alt="プロシージャ" />
<h2>サブルーチン・関数</h2>
説明した通り、サブルーチンが単なる処理の集まりを指すのに対して、関数はあるデータから別のデータを算出するための処理の集まりを言います。
<img src="../pics/サブルーチンと関数.png" alt="サブルーチンと関数" />
他の言語では関数とまとめて呼ぶこともありますが、vb.netでは戻り値の有無でサブルーチンと関数を使い分けています。
<h2>引数と戻り値</h2>
サブルーチンと関数では、引数と戻り値によってサブルーチン・関数外とサブルーチン・関数内でデータをやり取りします。
<p class="r">サブルーチンに戻り値はありません。</p>
サブルーチン・関数に与えるデータのことを引数と呼び、関数から受け取るデータのことを戻り値と呼びます。
<img src="../pics/引数と戻り値.png" alt="引数と戻り値" />
<h2>プロシージャの定義</h2>
<h3>サブルーチンの定義</h3>
サブルーチンは以下のように定義します。
<code class="vb-dot-net">
	Private Sub サブルーチン名(引数)
		 'サブルーチンの処理...
		 'サブルーチンの処理...
		 'サブルーチンの処理...
	End Sub
</code>
<h3>関数の定義</h3>
Subの代わりにFunctionを使用します。<br />また、戻り値はReturn文を使用して指定します。
<code class="vb-dot-net">
	Private Function 関数名(引数)
		 '関数の処理...
		 '関数の処理...
		 '関数の処理...
		Return 戻り値
	End Function
</code>
<h3>仮引数</h3>
関数内で受け取る引数を仮引数と呼び、反対に関数呼び出し時に渡す引数のことを実引数と呼びます。
<p class="r">両者まとめて引数と呼ぶこともあります。</p>
仮引数は以下のように書きます。
<code class="vb-dot-net">
	プロシージャ名(渡し方 変数名 As データ型)
</code>
引数が複数ある場合には「,(カンマ)」で区切って表します。
<code class="vb-dot-net">
	プロシージャ名(渡し方 変数名 As データ型, 渡し方 変数名 As データ型, 渡し方 変数名 As データ型)
</code>
<h4>渡し方</h4>
実引数を仮引数として渡す方法には以下の2通りあります。
<table>
	<tbody>
		<tr>
			<th>ByVal</th>
			<td><strong>値渡し</strong>という意味です。<br />引数として渡したデータが関数内で変更されても、呼び出し元のデータは変更されません。<br />綺麗なコードにするためには、原則としてこちらを使用します。</td>
		</tr>
		<tr>
			<th>ByRef</th>
			<td><strong>参照渡し</strong>という意味です。<br />引数として渡したデータが関数内で変更されると、呼び出し元のデータも変更されます。</td>
		</tr>
	</tbody>
</table>
<img src="../pics/仮引数と実引数.png" alt="仮引数と実引数" />
<h4>Optional</h4>
実引数を省略して時に仮引数としてデフォルトで設定される引数を設定することができます。<br />以下のように書きます。
<code class="vb-dot-net">
	関数名(ByVal x As Integer = 10)
</code>
この場合は、実引数が与えられた場合はその値が採用され、省略された場合にはデフォルトの「10」が採用されます。
<div class="separator"></div>
では練習として引数として受け取った整数2つの和を返すadd関数を作成してみましょう♪
<code class="vb-dot-net">
	Private Function add(ByVal x As Integer, ByVal y As Integer)
		Return x + y
	End Function
</code>
<h2>プロシージャの呼び出し</h2>
関数は以下のように呼び出します。
<code class="vb-dot-net">
	プロシージャ名(実引数)
</code>
関数では、これが評価(実行)されると戻り値が返されます。<br />また、実引数は書いた順番に仮引数に渡されます。
<p class="r">名前付き引数で実引数と仮引数を結びつける方法もありますが、コードが複雑化するためオススメしません。</p>
<h2>スコープ</h2>
変数にはスコープ(有効範囲)が存在し、関数内で宣言した変数は関数外で使用することができません。
<img src="../pics/スコープ.png" alt="スコープ" />
<h2>作ってみよう♪</h2>
では、実際にプロシージャを使用した簡単なプログラムを作成してみましょう♪<br />まずは、サブルーチンを使用してみましょう♪<br />Label1の文字を「Happy」に、Label2の文字を「Halloween」に変更するサブルーチンを作成して使用します。
<code class="vb-dot-net">
	Public Class Form1
		Private Sub halloween() 'halloweenサブルーチンの定義
			Label1.Text = "Happy"
			Label2.Text = "Halloween"
		End Sub

		Private Sub Button1_Click() Handles Button1.Click
			halloween() 'halloweenサブルーチンを実行
		End Sub
	End Class
</code>
<img src="../pics/プログラム-サブルーチン.gif" alt="サブルーチン" />
今度は関数を作成してみましょう♪<br />引数2つの和を返すplus関数と差を返すminus関数を作成します。
<code class="vb-dot-net">
	Public Class Form1
		Private Function plus(ByVal x As Integer, ByVal y As Integer) 'plus関数の定義
			Return x + y
		End Function
	
		Private Function minus(ByVal x As Integer, ByVal y As Integer) 'minus関数の定義
			Return x - y
		End Function
	
		Private Sub Button1_Click() Handles Button1.Click
			Dim x, y As Integer
			x = 10
			y = 25
			Label1.Text = plus(x, y) 'plus関数に「10」「25」を引数として渡し、戻り値をLabel1の文字列に設定
			Label2.Text = minus(x, y) 'minus関数に「10」「25」を引数として渡し、戻り値をLabel2の文字列に設定
		End Sub
	End Class
</code>
<img src="../pics/プログラム-関数.gif" alt="関数" />
<?php footer(); ?>