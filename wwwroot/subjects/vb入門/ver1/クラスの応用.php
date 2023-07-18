<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>オーバーロード</h2>
オブジェクト内のメンバ名は重複が許されませんが、メソッドに関しては引数の型や引数の数が異なれば名前が重複してもok!です。<br />引数の型や引数の数が異なる同一名のメソッドを定義することをオーバーロード言います。
<code class="vb-dot-net">
	Public Class overload
		Public Sub show(ByVal n As Integer)
			Label1.Text = "整数型×引数1つ"
		End Sub
	
		Public Sub show(ByVal n As Integer, ByVal m As Integer)
			Label1.Text = "整数型×引数2つ"
		End Sub
	
		Public Sub show(ByVal n As Double)
			Label1.Text = "浮動小数点数型×引数1つ"
		End Sub
	
		Public Sub show(ByVal n As String)
			Label1.Text = "文字列型×引数1つ"
		End Sub
	End Class
</code>
ではoverloadクラスからインスタンスを生成して、showメソッドの引数を変えて実行してみましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
			Dim x As New overload
			x.show("ここに入れる引数を変化させてみましょう♪")
		End Sub
		Public Class overload
			Public Sub show(ByVal n As Integer)
				Form1.Label1.Text = "整数型×引数1つ"
			End Sub
			Public Sub show(ByVal n As Integer, ByVal m As Integer)
				Form1.Label1.Text = "整数型×引数2つ"
			End Sub
			Public Sub show(ByVal n As Double)
				Form1.Label1.Text = "浮動小数点数型×引数1つ"
			End Sub
			Public Sub show(ByVal n As String)
				Form1.Label1.Text = "文字列型×引数1つ"
			End Sub
		End Class
	End Class
</code>
<img src="../pics/プログラム-オーバーロード.gif" alt="オーバーロード" />
クラス内で他のクラスを参照する際には少し工夫が必要です。<br />ここでは、Label1インスタンスを生成するためにForm1インスタンスのメンバとしてのLabel1インスタンスと指定しています。
<h2>継承</h2>
あるクラスが他のクラスの性質(メンバ)を継承して再定義することなく使用することができる性質を継承と言います。
<img src="../pics/継承.png" alt="継承" />
継承するには以下のように書きます。
<code class="vb-dot-net">
	Public Class クラス名
		Inherits 基本クラス名
		'クラスメンバの定義...
		'クラスメンバの定義...
		'クラスメンバの定義...
	End Class
</code>
では最初にfoodオブジェクトを作成してみましょう♪
<code class="vb-dot-net">
	Public Class food
		Private amami As Integer
		Private umami As Integer
		Private enmi As Integer
		Private sanmi As Integer
		Private nigami As Integer

		Public Sub eat()
			'eatメソッド
		End Sub

		Public Sub take_photo()
			'take_photoメソッド
		End Sub
	End Class
</code>
では、これを継承したramenクラスを作成してみましょう♪
<code class="vb-dot-net">
	Public Class ramen
		Inherits food
		Private katasa As Integer
		Private kosa As Integer
		Private abura As Integer

		Public Sub foo_foo()
			'foo_fooメソッド
		End Sub
	End Class
</code>
<h2>オーバーライド</h2>
基本クラスのメンバを派生クラスで上書きすること言います。<br />オーバーライドをするにはメンバにoverridable修飾子を付けます。
<code class="vb-dot-net">
	Public Class 派生クラス名
		Inherits 基本クラス名

		Public Overridable Sub メソッド名()
			'メソッド
		End Sub
	End Class
</code>
メソッドをオーバーライドするには引数の型と引数の数が一致している必要があります。<br />引数の型と引数の数のいずれかが一致していない場合はオーバーロードされるため、オーバーライドされません。<br /><br />オーバーライドとオーバーロードを混同しないように注意してくださいね♪
<h2>抽象クラス</h2>
実際にfoodっていう食べ物はありませんよね、、、<br />foodクラスはあくまでもここからramenクラスやpastaクラスを派生させるために定義しています。<br />このように、そのクラス自体のインスタンスを生成せずに、継承させて使用することを想定するクラスを抽象クラスと呼びます。<br /><br />抽象クラスとするためにはMustInherit修飾子をつけます。
<code class="vb-dot-net">
	Public MustInherit Class food
		Private amami As Integer
		Private umami As Integer
		Private enmi As Integer
		Private sanmi As Integer
		Private nigami As Integer

		Public Sub eat()
			'eatメソッド
		End Sub

		Public Sub take_photo()
			'take_photoメソッド
		End Sub
	End Class
</code>
これで、間違ってfoodクラスからインスタンスを生成することを防げ、さらには継承目的であることが明確になりました。
<h2>Me</h2>
オブジェクト内で自分自身を指すためにはMeを使用します。<br />他の言語ではthisとすることが多いです。<br /><br />vb.netではMeを省略してもok!ですが、オブジェクト内のメンバを参照していることを明確にするために使用することをオススメします。
<h2>インターフェース</h2>
インターフェースとは継承関係のないクラスに機能を提供する仕組みを言います。<br />抽象クラスの継承関係を持たないバージョンだと思えばok!です。<br /><br />クラスと同様にプロパティとメソッドを定義します。
<code class="vb-dot-net">
	Public Interface インターフェース名
		Sub メソッド名()
			'メソッドの処理
		End Sub
	
		Sub メソッド名()
			'メソッドの処理
		End Sub
	End Interface
</code>
インターフェースをクラスで使用するにはImplementsを使用します。
<code class="vb-dot-net">
	Public Class クラス名
		Implements 使用するインターフェース名
		'メンバ
		'メンバ
		'メンバ
	End Class
</code>
<h2>名前空間</h2>
クラスが所属するグループとしての役割を果たします。<br />異なる名前空間であれば、同一の名前のクラスを作成することができます。<br />名前空間は以下のように定義します。
<code class="vb-dot-net">
	Namespace 名前空間名
		'クラスの定義
	End Namespace
</code>
ある名前空間内のクラスにアクセスするには以下のように書きます。
<code class="vb-dot-net">
	名前空間名.クラス名
</code>
名前空間は入れ子にすることができます。
<code class="vb-dot-net">
	Namespace  parent
		Namespace child
			'クラスの定義
		End Namespace
	End Namespace
</code>
この場合は、親となる名前空間から順に指定していきます。
<code class="vb-dot-net">
	parent.child.クラス名
</code>
<div class="separator"></div>
わざわざ、名前空間を指定するのは大変ですよね、、、<br />Imports文を使用することで名前空間空間を省略することができます。<br />例えば、先ほどの入れ子にした名前空間内のクラスをImports文を使用して書くと以下のようになります。
<code class="vb-dot-net">
	Imports parent.child
	クラス名
</code>
また、それ以外の方法として名前空間に名前を付けることもできます。
<code class="vb-dot-net">
	Imports ns = parent.child
	ns.クラス名
</code>
名前空間は主に大規模なプログラムでクラスを大量に使用する場合に使用されます。
<h2>構造体</h2>
構造体とはクラスの値渡しバージョンです。<br />ほとんどクラスと同じだと思ってok!です。<br />クラスと同様の定義方法です。<br />構造体の定義ではClassの代わりにStructureを使用します。
<code class="vb-dot-net">
	Public Structure 構造体名
		Private x As Integer
		Private y As String

		Public Sub pcd()
			'メソッドの処理
		End Sub

		Public Function fx()
			'メソッドの処理
		End Function
	End Structure
</code>
構造体もクラスと同様に名前空間を使用することができます。
<?php footer(); ?>