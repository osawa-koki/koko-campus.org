<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>エラーハンドリング</h2>
プログラムは必ずしも想定したデータをユーザが入力するとは限りません。<br />プログラミングする際には不測の事態への対応は必要不可欠です。<br /><br />エラーになるかもしれない処理を対処することをエラーハンドリング(例外処理)と呼びます。
<h2>Try ～ Catch</h2>
エラーになりそうな処理を実行してみて、エラーとなったら処理を切り替えます。<br />以下のように書きます。
<code class="vb-dot-net">
	Try
		'エラーになりそうな処理...
		'エラーになりそうな処理...
		'エラーになりそうな処理...
	Catch ex As Exception
		'エラーとなった場合の処理...
	End Try
</code>
エラーとなった場合はExceptionオブジェクトのMessageプロパティにエラーの内容が格納されます。<br />したがって、上のコードでは「ex.Message」でエラーの内容を取得できます。
<div class="separator"></div>
では、2つのテキストボックスを使用して左&divide;右をするプログラムを作成してみましょう♪<br />オブジェクト名は「TextBox1 &divide; TextBox2 = answer」と設定しています。
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim x, y As Integer
			Try
				x = CInt(TextBox1.Text)
				y = CInt(TextBox2.Text)
				answer.Text = x / y
			Catch ex As Exception
				MsgBox(ex.Message)
			End Try
		End Sub
	End Class
</code>
入力された文字列を整数型に変換できない場合はエラーとなるため、これを適切にハンドリングします。
<img src="../pics/エラーハンドリング.gif" alt="エラーハンドリング" />
<h2>エラーの作成</h2>
あれれ???<br />「0」で割ると無限大(∞)になってしまいますね、、、<br />これはダメです。<br />プログラミング言語によっては「0 division error」を発してくれるのですが、、、
<img src="../pics/0-division-error(py).png" alt="エラーハンドリング" />
では、自分でこれをエラーとなるように設定しましょう♪<br />エラーを発生させるには以下のように書きます。
<code class="vb-dot-net">
	Throw New Exception("エラーの説明")
</code>
通常は条件分岐と併用して使用します。<br />では、先ほどのプログラムで「0」で割った場合にエラーを発生させましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim x, y As Integer
			Try
				x = CInt(TextBox1.Text)
				y = CInt(TextBox2.Text)
				If y = 0 Then
					Throw New Exception("0で割っちゃダメ!!!")
				End If
				answer.Text = x / y
			Catch ex As Exception
				MsgBox(ex.Message)
			End Try
		End Sub
	End Class
</code>
<img src="../pics/0-division-error.gif" alt="エラーハンドリング" />
これで、エラーを発生させることが可能になりました。<br />プログラマーたるもの、エラーハンドリングを怠ってはなりません。
<?php footer(); ?>