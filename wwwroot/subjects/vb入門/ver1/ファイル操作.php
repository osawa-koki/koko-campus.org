<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>ファイル操作</h2>
ここでは、ファイルの読み込みとファイルへの書き込み方法について学びます。<br />ファイル操作は以下の3つの手順を踏みます。
<img src="../pics/ファイル操作.png" alt="ファイル操作" />
<h2>ファイルを開く</h2>
ファイルを開くには以下のように書きます。
<code class="vb-dot-net">
	Dim fs As New System.IO.ストリームクラス("ファイルへのパス")
</code>
ストリームクラスは書き込みと読み込みで異なります。
<table>
	<tbody>
		<tr>
			<th>読み込み</th>
			<td>StreamReader</td>
		</tr>
		<tr>
			<th>書き込み</th>
			<td>StreamWriter</td>
		</tr>
	</tbody>
</table>
ファイルへのパスには「C:\」から始まる絶対パスと自身の位置から指定する相対パスの両方が使用可能です。
<h2>ファイルを閉じる</h2>
ファイルを開いて処理をしたら必ずファイルを閉じる必要があります。<br />ファイルの操作について説明する前に、ファイルを閉じる方法を説明します。<br />ファイルを閉じるには以下のように書きます。
<code class="vb-dot-net">
	fs.Close()
</code>
<h2>ファイルの操作(読み込み)</h2>
ファイルを読み込みには以下の3つのメソッドを使用します。
<table>
	<tbody>
		<tr>
			<th>Read</th>
			<td>ファイルの内容を1文字ずつ読み込みます。</td>
		</tr>
		<tr>
			<th>ReadLine</th>
			<td>ファイルの内容を1行ずつ読み込みます。</td>
		</tr>
		<tr>
			<th>ReadToEnd</th>
			<td>ファイルの内容を全部読み込みます。<br />通常はこれを使用します。</td>
		</tr>
	</tbody>
</table>
<code class="vb-dot-net">
	Dim fs As New System.IO.StreamReader("ファイルへのパス")
	Dim txt As String = fs.ReadToEnd()
</code>
<h2>ファイルの操作(書き込み)</h2>
ファイルへの書き込みには以下の2つのメソッドを使用します。
<table>
	<tbody>
		<tr>
			<th>Write</th>
			<td>1文字ずつ書き込みます。</td>
		</tr>
		<tr>
			<th>WriteLine</th>
			<td>1行ずつ書き込みます。</td>
		</tr>
	</tbody>
</table>
<code class="vb-dot-net">
	Dim fs As New System.IO.StreamWriter("ファイルへのパス")
	fs.Write("Hello")
</code>
<div class="separator"></div>
また、ファイルへ追記したい場合はファイルを開く際の第二引数にTrueを指定します。
<code class="vb-dot-net">
	Dim fs As New System.IO.StreamWriter("ファイルへのパス", True)
</code>
ではテキストボックスに入力した文字をファイルに入力、それを表示するプログラムを作成してみましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim fs As New System.IO.StreamReader("C:\Hello.txt")
			Label1.Text = fs.ReadToEnd()
			fs.Close()
		End Sub
		Private Sub Button2_Click() Handles Button2.Click
			Dim fs As New System.IO.StreamWriter("C:\Hello.txt", True)
			fs.WriteLine(TextBox1.Text)
			TextBox1.Text = ""
			fs.Close()
		End Sub
	End Class
</code>
<img src="../pics/ファイルの書き込み・読み込み.gif" alt="ファイル操作" />
<div class="separator2"></div>
vb.net入門-ver1はこれで終了です。<br />お疲れ様でした。<br /><br />それでは、vb.net中級編へLet's go!!<br />また、excelの操作を自動化するマクロであるvbaもvb.netで書くことができるため、vbaを学んでみてのもいいですね♪
<div class="subjects-container">
	<a href="../../vb中級/branch" class="link-subject to-vb中級"></a>
	<a href="../../excel-vba/branch" class="link-subject to-excel-vba"></a>
</div>
<?php footer(); ?>