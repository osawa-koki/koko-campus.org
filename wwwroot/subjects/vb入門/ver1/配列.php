<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>配列</h2>
配列とは一定のデータ型のデータを複数個格納するためのデータ型です。
<img src="../pics/配列.png" alt="配列" />
配列は各要素を「0」から始まるインデックス番号で管理します。<br />「1」からではなくて、「0」から始まることに注意してください。
<h2>配列の定義</h2>
配列は以下のように定義します。
<code class="vb-dot-net">
	Dim 配列名(要素数) As データ型
</code>
宣言と同時に初期化をする場合には以下のように書きます。
<code class="vb-dot-net">
	Dim 配列名() As データ型 = {
		要素1,
		要素2,
		要素3,
		...
	}
</code>
宣言と初期化を同時に行う場合には括弧の中の要素数は指定しません。
<h2>配列の要素へのアクセス</h2>
配列の要素へアクセスするには以下のように書きます。
<code class="vb-dot-net">
	配列名(インデックス番号)
</code>
では、配列の要素へアクセスするプログラムを簡単に作成してみましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click() Handles Button1.Click
			Dim lang() As String = {
				"vb.net",
				"python",
				"c/c++",
				"rust",
				"haskell"
			}
			Label1.Text = lang(0)
			Label2.Text = lang(1)
			Label3.Text = lang(3)
			Label4.Text = lang(4)
		End Sub
	End Class
</code>
<img src="../pics/配列の要素の指定.gif" alt="配列の要素の指定" />
<h2>配列の走査</h2>
配列の要素をひとつずつ取り出して処理する方法には以下の2通りあります。
<ul>
	<li>for</li>
	<li>for each</li>
</ul>
<h3>配列の走査(for)</h3>
通常のforループを用いて配列の要素をすべて取り出します。<br />複数の候補を選択させるコンボボックスに配列の要素を候補として追加してみましょう♪<br />コンボボックスに要素を追加するには以下のように書きます。
<code class="vb-dot-net">
	コンボボックス.Items.Add("選択肢1")
	コンボボックス.Items.Add("選択肢2")
	コンボボックス.Items.Add("選択肢3")
</code>
これをひとつずつ書くのは大変なので、forループで対応しましょう♪<br />また、コンボボックスに候補を追加するのはボタンクリック時ではなくフォーム作成時であるため、フォーム作成時に実行される新しいサブルーチンを作成します。<br />イベント名はNewです。
<img src="../pics/フォーム初期化時の処理.gif" alt="フォーム作成時の処理" />
ここでコンボボックスに配列の要素を走査して追加してみましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Public Sub New()

			' この呼び出しはデザイナーで必要です。
			InitializeComponent()

			' InitializeComponent() 呼び出しの後で初期化を追加します。
			Dim lang As String() = {
				"vb.net",
				"python",
				"c/c++",
				"rust",
				"haskell"
			}
			Dim i As Integer
			For i = 0 To lang.Length - 1
				ComboBox1.Items.Add(lang(i))
			Next
		End Sub
	End Class
</code>
<img src="../pics/プログラム-配列の走査(for).gif" alt="配列の走査(for)" />
<h3>配列の走査(for each)</h3>
配列に対してひとつずつ要素を取り出して処理を実行します。<br />以下のように記述します。
<code class="vb-dot-net">
	DIm elm As データ型
	For Each elm In 配列
		 '各要素に対する処理
	Next
</code>
では先ほどのプログラムをfor eachを用いて書いてみましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Public Sub New()

			' この呼び出しはデザイナーで必要です。
			InitializeComponent()

			' InitializeComponent() 呼び出しの後で初期化を追加します。
			Dim lang As String() = {
				"vb.net",
				"python",
				"c/c++",
				"rust",
				"haskell"
			}
			Dim elm As String
			For Each elm In lang
				ComboBox1.Items.Add(elm)
			Next
		End Sub
	End Class
</code>
<img src="../pics/プログラム-配列の走査(for-each).gif" alt="配列の走査(for each)" />
<?php footer(); ?>