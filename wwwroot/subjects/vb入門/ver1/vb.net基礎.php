<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>コメントアウト</h2>
これからはプログラムコードを実際に書いていきます。<br />保守性(プログラムの修正のしやすさ)の観点からプログラムコード中にメモ書きを書くことがあります。<br />これをコメントアウトと呼びますが、これは「'(シングルクォーテーション)」の後の部分が自動的にコメントアウトとして解釈されます。
<code class="vb-dot-net">
	Public Class From1
		Private Sub hello() Handles Button1.Click
			'ここはコメントアウトです。
			'実際に実行されない部分です。
			'メモ書きとして使用します。
		End Sub
	End Class
</code>
<h2>変数</h2>
プログラムを実行する上で使用する一時的なデータを保存する箱です。<br />一度変数に値を代入すれば、その変数を使用してその値に簡単にアクセスできるようになります。<br />変数に関しては以下の3つの処理方法を学びます。
<ul>
	<li>変数の宣言</li>
	<li>変数の代入</li>
	<li>変数の参照</li>
	<li>変数のスコープ</li>
</ul>
<h3>変数の宣言</h3>
これから「〇〇〇」という名前で変数を使用するよ♪って宣言します。<br />以下のように宣言します。
<code class="vb-dot-net">
	Dim 変数名 As データ型
</code>
複数の変数を宣言する場合には「,(カンマ)」で区切ります。
<code class="vb-dot-net">
	Dim 変数1 As データ型, 変数2 As データ型, 変数3 As データ型
</code>
同じデータ型の変数を複数宣言する場合には以下のように記述します。
<code class="vb-dot-net">
	Dim 変数1, 変数2, 変数3 As データ型
</code>
<h4>データ型</h4>
変数に入れるデータの種類です。<br />以下のデータ型があります。
<table>
	<tbody>
		<tr>
			<th>Integer</th>
			<td>整数を格納します。<br />「10」「25」「99」が該当します。</td>
		</tr>
		<tr>
			<th>Long</th>
			<td>大きめの整数を格納します。<br />「32,768」よりも大きい整数はこちらを使用します。</td>
		</tr>
		<tr>
			<th>Single</th>
			<td>「単精度浮動小数点数型」で、小さめの小数を格納します。</td>
		</tr>
		<tr>
			<th>Double</th>
			<td>「倍精度浮動小数点数型」で、大きめの小数を格納します。</td>
		</tr>
		<tr>
			<th>String</th>
			<td>「文字列型」です。<br />文字列を代入する際には「"(ダブルクォーテーション)」ないしは「'(シングルクォーテーション)」で囲みます。<br />「"ピカチュウ"」「"pika-pika"」などが該当します。</td>
		</tr>
		<tr>
			<th>Boolean</th>
			<td>「真偽値型」です。「true」か「False」を格納します。</td>
		</tr>
		<tr>
			<th>Date</th>
			<td>「日付型」です。<br />日付を格納します。</td>
		</tr>
	</tbody>
</table>
<code class="vb-dot-net">
	Dim x As Integer  '「x」変数を整数型で宣言
	Dim y As Single, z As Double  '「y」変数を単精度浮動小数点数型、「z」変数を倍精度浮動小数点数型で宣言
</code>
<h3>変数の代入</h3>
「変数 = 代入したいデータ」で実行します。
<code class="vb-dot-net">
	Dim x As Integer  '「x」変数を整数型で宣言
	Dim y As String  '「y」変数を文字列型で宣言
	x = 10  '「x」変数に「10」を代入
	y = "ぴかちゅう"  '「y」変数に「ぴかちゅう」を代入
</code>
<div class="separator"></div>
変数の宣言と代入を同時に行うこともできます。
<code class="vb-dot-net">
	Dim x As Integer = 10
</code>
また、この方法ではDimの代わりにConstを使用することで固定数として宣言することもできます。
<code class="vb-dot-net">
	Const pai As Float = 3.14159265
</code>
変数ではなく、固定数を使用する主な目的は変数を間違って上書きすることを防ぐためです。
<h3>変数の参照</h3>
実際に変数に代入した値を使用します。<br />そのまま変数名を書けば使用できます。
<code class="vb-dot-net">
	Dim x As String  '「x」変数を文字列型で宣言
	x = "ぴかちゅう"  '「x」変数に「ぴかちゅう」を代入
	Label1.value = x  'Label1の文字(Text)を「x」変数の値にセット
</code>
<h3>変数のスコープ</h3>
変数には参照できる範囲(有効範囲)があり、これをスコープと呼びます。<br />subプロシージャ内で宣言した変数はそのsubプロシージャ内でのみ有効です。
<h2>演算</h2>
プログラミングと言えばやっぱり演算ですよね♪<br />vb.netでは以下の演算子を用いて演算を行います。
<table>
	<tbody>
		<tr>
			<th>+</th>
			<td>足し算です。</td>
		</tr>
		<tr>
			<th>-</th>
			<td>引き算です。</td>
		</tr>
		<tr>
			<th>*</th>
			<td>掛け算です。</td>
		</tr>
		<tr>
			<th>/</th>
			<td>割り算です。<br />「7 / 2」は「3.5」となります。</td>
		</tr>
		<tr>
			<th>\</th>
			<td>割り算の商(割り算の結果の整数部分)です。<br />「7 \ 2」は「3」となります。</td>
		</tr>
		<tr>
			<th>Mod</th>
			<td>割り算の余りです。<br />「7 Mod 2」は「1」となります。</td>
		</tr>
		<tr>
			<th>^</th>
			<td>べき乗です。<br />「2 ^ 4」は「16」になります。</td>
		</tr>
		<tr>
			<th>&amp;</th>
			<td>文字列同士を連結します。<br />「"ぴか" &amp; "ちゅう"」で「"ぴかちゅう"」となります。</td>
		</tr>
	</tbody>
</table>
<div class="separator"></div>
では、実際に簡単なプログラムを作成してみましょう♪<br />xを「10」、yを「25」として和差積商を計算して表示してみましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim x, y As Integer
			x = 10
			y = 25
			Label1.Text = x + y
			Label2.Text = x - y
			Label3.Text = x * y
			Label4.Text = x / y
		End Sub
	End Class
</code>
<img src="../pics/プログラム-演算.gif" alt="演算" />
<h2>型変換</h2>
文字列を数字として扱う、ないしは数字を文字列として扱うには型を明示的に変換する必要があります。<br />型を変換するためには以下の関数を使用します。
<p class="r">関数についてはプロシージャの授業で詳しく説明しますが、与えたデータに何らかの処理をしてくれるものだと思ってください。</p>
<h3>整数型に変換</h3>
CInt関数を使用します。
<code class="vb-dot-net">
	Dim x As String, y As Integer
	x = "25" '「"25"」は文字列型
	y = CInt(x) 'xの値を整数型に変換してyに代入
</code>
<h3>文字列型に変換</h3>
CStr関数を使用します。
<code class="vb-dot-net">
	Dim x As Integer, y As String
	x = 25 '「25」は整数型
	y = CStr(x) 'xの値を文字列型に変換してyに代入
</code>
<h3>指定したデータ型に変換</h3>
データを指定したデータ型に変換します。<br />CType関数を使用します。
<code class="vb-dot-net">
	Dim x As String, y As Integer
	x = "25" '「"25"」は文字列型
	y = CType(x, Integer) 'xの値を整数型に変換してyに代入
</code>
<?php footer(); ?>