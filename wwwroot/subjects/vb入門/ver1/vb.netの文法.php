<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-10",
	"updated" => "2022-01-10"
);
head($obj);
?>
<h2>条件分岐(if)</h2>
もし明日雨ならば傘を持っていき、雨ではないならば傘を持って行かない。という風に条件によってプログラムを制御します。<br />条件分岐にはif文を使用します。
<code class="vb-dot-net">
	If 条件式 Then
		 '条件式を満たす場合の処理
	Else
		 '条件式を満たさない場合の処理
	End If
</code>
条件を満たした場合のみの処理を記述して、満たさない場合は何も処理をしない場合には「Else」は省略することができます。<br />また、複数の条件分岐を連ねる場合には「ElseIf」を用いて書きます。
<code class="vb-dot-net">
	If 条件式1 Then
		 '条件式1を満たした場合の処理
	ElseIf 条件式2 Then
		 '条件式2を満たした場合の処理
	ElseIf 条件式3 Then
		 '条件式3を満たした場合の処理
	Else
		 '条件式のいずれも満たさなかった場合の処理
	End If
</code>
<h3>条件式</h3>
条件式には以下の6個の演算子を使用します。
<table>
	<tbody>
		<tr>
			<th>&lt;</th>
			<td>左が右よりも小さい場合に「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;=</th>
			<td>左が右以下の場合に「真」、それ以外に「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>左が右よりも大きい場合に「真」、それ以外に「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;=</th>
			<td>左が右以上の場合に「真」、それ以外に「偽」となります。</td>
		</tr>
		<tr>
			<th>=</th>
			<td>左と右が等しい場合に「真」、それ以外に「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;&gt;</th>
			<td>左と右が等しくない場合に「真」、それ以外に「偽」となります。</td>
		</tr>
	</tbody>
</table>
また、複数の条件を組み合わせることもできます。
<table>
	<thead>
		<tr>
			<th>And</th>
			<th>Or</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>「かつ」を意味します。<br />左右の条件式の両方を満たす場合に「真」、それ以外は「偽」となります。</td>
			<td>「または」を意味します。<br />左右の条件式のいずれかを満たす場合に「真」、それ以外は「偽」となります。</td>
		</tr>
	</tbody>
</table>
<div class="separator"></div>
では実際にプログラミングしてみましょう♪<br />テキストボックスに入力された数字が偶数なら偶数と、奇数ならば奇数とラベルに表示します。
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim n As Integer
			n = CInt(TextBox1.Text) 'テキストボックスに入力された文字列を整数型に変換してnに代入
			If n Mod 2 = 0 Then 'nを「2」で割った余りが「0」ならば、、、
				Label1.Text = "偶数です♪"
			Else 'nを「2」で割った余りが「0」でなければ、、、
				Label1.Text = "奇数です!!!"
			End If
		End Sub
	End Class
</code>
<img src="../pics/プログラム-if.gif" alt="if文" />
<h2>条件分岐(select)</h2>
if文以外ではselect文を用いて条件分岐を実現できます。<br />if文と違ってひとつの値を条件分岐で複数の処理に分ける際に使用します。<br />以下のように書きます。
<code class="vb-dot-net">
	Select Case 対象の値
		Case 条件式1
			 '条件式1を満たした場合の処理
		Case 条件式2
			 '条件式2を満たした場合の処理
		Case 条件式3
			 '条件式3を満たした場合の処理
		Case Else
			 '条件式のいずれも満たさなかった場合の処理
	End Select
</code>
条件式内で対象の値は「Is」を用いて表します。<br />例えばテキストボックスの値を取得して、「正」「0」「負」を判定するプログラムを書いてみましょう♪
<code class="vb-dot-net">
	Sub zero_plus_minus()
		Dim x As Integer, y As String  '「x」変数を整数型で、「y」変数を文字列型で宣言
		x = Range("A1").Value  '「x」変数にA1セルの値を代入
		Select Case x
			Case Is < 0
				y = "マイナス"  '「y」変数に「マイナス」を代入
			Case Is = 0
				y = "ゼロ"  '「y」変数に「ゼロ」を代入
			Case Is > 0
				y = "プラス"  '「y」変数に「プラス」を代入
		End Select
		Range("B1").Value = y  '「y」変数の値をB1セルにセット
	End Sub
</code>
<img src="../pics/プログラム-select.gif" alt="select文" />
<h2>反復処理</h2>
反復処理とはある一定回数処理を繰り返すことです。これを実現するためには以下の文を使用します。
<ul>
	<li>for</li>
	<li>do until</li>
	<li>do while</li>
	<li>for each</li>
</ul>
たくさんありますね、、、<br />それぞれ使いべき場面が異なります。
<h3>for</h3>
ある一定回数処理を繰り返す際に用います。
<h3>do until</h3>
ある条件に一致するまで処理を繰り返します。
<h3>do while</h3>
ある条件に一致する限り、処理を繰り返します。
<h3>for each</h3>
反復可能なオブジェクトの集まりに対してひとつずつ処理を実行します。
<h2>反復処理(for)</h2>
指定した回数分、処理を繰り返します。<br />for文は以下のように記述します。
<code class="vb-dot-net">
	Dim i As Integer  '「i」変数を整数型で宣言
	For i = スタート To フィニッシュ
		 '反復処理の内容
	Next i
</code>
Forの後の「i」はカウンタ変数と呼ばれ、繰り返す回数を制御するために使用されます。<br />「i」を整数型で宣言して、それを処理が終わるごとに「1」ずつ加算していき、フィニッシュに到達するまで処理を繰り返します。<br />ではfor文を用いてテキストボックスに入力された文字の階乗を表示するプログラムを作成してみましょう♪
<div class="quote">
	<div>階乗とは</div>
	1からnまでのすべての整数の積で算出されます。<br />例えば、3の階乗は「1 &times; 2 &times; 3」で計算され、5の階乗は「1 &times; 2 &times; 3 &times; 4 &times; 5」で計算されます。
</div>
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim n, i, z As Integer
			n = CInt(TextBox1.Text) '入力された整数
			i = 1 'forループのカウント用
			z = 1 '階乗の計算の結果用(初期値は「1」)
			For i = 1 To n
				z = z * i '前回までの結果 × 今回の数字
			Next i
			Label1.Text = z
		End Sub
	End Class
</code>
<img src="../pics/プログラム-for.gif" alt="for文" />
<!--
<h3>ループの入れ子</h3>
ループの中にループを入れることもできます。<br />内側のループがn周するたびに外側のループが1周します。<br />これを用いて掛け算九九を表示するプログラムを作成しましょう♪
<code class="vb-dot-net">
	Sub kuku()
		Dim i, j As Integer
		For i = 1 To 9  '外側のループ
			For j = 1 To 9  '内側のループ
				Cells(i, j).Value = i * j
			Next j
		Next i
	End Sub
</code>
<img src="../pics/掛け算九九.gif" alt="入れ子ループの説明画像" />
-->
<h2>do until</h2>
条件に一致するまで処理を繰り返します。<br />以下のように記述します。
<code class="vb-dot-net">
	Do Until 条件式
		 '条件式に一致するまで継続して実行する処理
	Loop
</code>
for文と異なり条件を満たす限りはループ処理を続けます。<br />では、階乗を求めるプログラムをdo untilを用いて書き換えましょう♪<br />
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim n, i, z As Integer
			n = CInt(TextBox1.Text) '入力された整数
			i = 1 'forループのカウント用
			z = 1 '階乗の計算の結果用(初期値は「1」)
			Do until n < i 'iが入力された整数(n)を超えるまでループ
				z = z * i '前回までの結果 × 今回の数字
				i = i + 1 'iを「1」ずつ加算
			Loop
			Label1.Text = z
		End Sub
	End Class
</code>
<img src="../pics/プログラム-do-until(後).gif" alt="do until文" />
また、上のコードでは処理を一度実行してから条件を判定していますが、最初に条件を判定してから処理を実行する書き方もあります。
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim n, i, z As Integer
			n = CInt(TextBox1.Text) '入力された整数
			i = 1 'forループのカウント用
			z = 1 '階乗の計算の結果用(初期値は「1」)
			Do
				z = z * i '前回までの結果 × 今回の数字
				i = i + 1 'iを「1」ずつ加算
			Loop until n < i 'iが入力された整数(n)を超えるまでループ
			Label1.Text = z
		End Sub
	End Class
</code>
<img src="../pics/プログラム-do-until(先).gif" alt="do until文" />
両者の違いは最低一回は処理がされるかどうかです。<br />何度も(1回以上)ループさせることを想定している場合、違いはありません。
<h2>do while</h2>
条件に一致し続ける限り、処理を繰り返します。<br />ほとんど、「do until」と同様の処理を実行可能です。<br />条件式に「do until」の逆のことを書けばok!です。
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim n, i, z As Integer
			n = CInt(TextBox1.Text) '入力された整数
			i = 1 'forループのカウント用
			z = 1 '階乗の計算の結果用(初期値は「1」)
			Do while i <= n 'iが入力された整数(n)を超えない限りループ
				z = z * i '前回までの結果 × 今回の数字
				i = i + 1 'iを「1」ずつ加算
			Loop
			Label1.Text = z
		End Sub
	End Class
</code>
<img src="../pics/プログラム-do-while(後).gif" alt="do while文" />
「do while」も「do until」同様に条件式の判定を最初にする書き方ができます。
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim n, i, z As Integer
			n = CInt(TextBox1.Text) '入力された整数
			i = 1 'forループのカウント用
			z = 1 '階乗の計算の結果用(初期値は「1」)
			Do
				z = z * i '前回までの結果 × 今回の数字
				i = i + 1 'iを「1」ずつ加算
			Loop while i <= n 'iが入力された整数(n)を超えない限りループ
			Label1.Text = z
		End Sub
	End Class
</code>
<img src="../pics/プログラム-do-while(先).gif" alt="do while文" />
<?php footer(); ?>