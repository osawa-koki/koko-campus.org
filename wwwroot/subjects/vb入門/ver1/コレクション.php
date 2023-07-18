<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>コレクション</h2>
コレクションとは配列に似たデータ型で複数のデータを格納するデータ型ですが、配列と異なり格納するデータのデータ型が異なってもok!です。<br />また、インデックス番号以外の要素の識別子であるキーを設定できるため、他の言語でいう連想配列に似ています。
<img src="../pics/コレクション.png" alt="コレクション" />
配列と異なり、インデックス番号は「1」から始まります。
<h2>コレクションの定義</h2>
コレクションは以下のように定義します。
<code class="vb-dot-net">
	Dim コレクション名 As New Collection()
</code>
また、定義と初期化を同時に行うには以下のように記述します。
<code class="vb-dot-net">
	Dim コレクション名 As New Collection() From {
		要素1,
		要素2,
		要素3,
		...
	}
</code>
<h2>コレクション要素の追加</h2>
コレクションに要素を追加するには以下のように記述します。
<code class="vb-dot-net">
	コレクション名.Add("追加する要素", "キー", "挿入位置")
</code>
キーと挿入位置は省略可能です。<br />挿入位置を省略した場合は一番最後に追加されます。
<h2>コレクション要素の参照</h2>
コレクションの要素へのアクセスにはインデックス番号かキーを使用します。
<code class="vb-dot-net">
	コレクション名(インデックス番号)

	コレクション名(キー)
</code>
では、プログラミング言語を格納したコレクションから要素を取得して表示してみましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
			Dim lang As New Collection()
			lang.Add("python", "py")
			lang.Add("vb.net", "vb")
			lang.Add("rust", "rs")
			lang.Add("c++", "cpp", 2)
			Label1.Text = lang(1)
			Label2.Text = lang("py")
			Label3.Text = lang("vb")
			Label4.Text = lang(4)
		End Sub
	End Class
</code>
<img src="../pics/プログラム-コレクション要素の追加.gif" alt="コレクション" />
<h2>コレクション要素の削除</h2>
コレクション要素を削除するには以下のように記述します。
<code class="vb-dot-net">
	コレクション名.Remove(インデックス番号)
	
	コレクション名.Remove(キー)
</code>
<h2>コレクションの要素数</h2>
コレクションの要素数を取得するにはコレクションオブジェクトのCountメソッドを使用します。
<code class="vb-dot-net">
	Dim lang As New Collection() From {
		"python",
		"rust",
		"vb.net"
	}
	lang.Add("c/c++")
	Label1.Text = lang.Count() '「4」
</code>
<div class="separator"></div>
コレクション要素を全て削除するにはClearメソッドを使用します。
<code class="vb-dot-net">
	コレクション名.Clear()
</code>
<h2>コレクションの走査</h2>
配列の要素と同様にforループ、またはfor each文を使用して走査します。
<?php footer(); ?>