<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>オブジェクト指向</h2>
オブジェクト指向については既に学びましたね♪<br />オブジェクト指向とは、データ(フィールド)とメソッドをひとまとめにオブジェクトとして扱う考え方を言います。<br />クラスオブジェクトではプロパティをフィールドと呼びこともありますが、ここではプロパティとメソッドという名称を使用します。<br /><br />また、オブジェクト内のプロパティとメソッドを総称してメンバと呼びます。
<img src="../pics/オブジェクト.png" alt="オブジェクト指向" />
<h2>クラスとインスタンス</h2>
クラスとはオブジェクト指向の考え方において、オブジェクトの雛形となる部分です。<br />オブジェクトの設計図としての役割を持ち、クラスから実際にオブジェクトを作成することでこれを使用します。<br /><br />オブジェクトの設計図としてのオブジェクトをクラスオブジェクト、ないしは単にクラスと呼び、クラスから実際に作成されたオブジェクトをインスタンオブジェクト、ないしは単にインスタンスと呼びます。<br /><br />オブジェクトという名称はクラスオブジェクトを意味するのかインスタンスオブジェクトを意味するのか不明瞭であるため原則として使用しません。
<img src="../pics/クラス・インスタンス.png" alt="クラス・インスタンス" />
たこ焼きってアウトラインは決まっていますよね、、、<img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><img src="../pics/たこ焼き.png" alt="たこ焼き" class="絵文字 x" /><br />客によって変えるのはトッピングだとか具材だけですので、雛形を作成してそこから実際のたこ焼きを作ってしまえば楽ちんです。
<h2>オブジェクト指向の目的</h2>
で、なぜクラスを作成してオブジェクト指向を使用するかですよね、、、<br />目的は「見やすく」書くためです。<br />プログラムの寿命が伸びている現在は、プログラムの修正のしやすさ(保守性)がとっても大切です。<br />最初にプログラミングしている時には問題ありませんが、1年後、2年後、さらには5年後にプログラムを修正しようとしてコードを見てもチンプンカンプンですよね、、、<br /><br />クラスを使用して、ある程度データにまとまりを設けていればコードの可読性が向上します。<br /><br />最近は読みやすいコード(リーダブルコード)がとっても重要視されていますので、是非オブジェクト指向をマスターしましょう♪
<h2>オブジェクト指向の特徴</h2>
オブジェクト指向の特徴は以下の3つです。
<ul>
	<li>隠蔽性</li>
	<li>継承性</li>
	<li>多態性</li>
</ul>
<h3>隠蔽性</h3>
オブジェクトの中身へのアクセスを制限することで、データが勝手に書き換えられることを防ぎます。<br />オブジェクト内のデータは定められた専用のメソッドを使用することでデータとそれに関連する処理がまとめられ、コードの可読性向上につながります。
<h3>継承性</h3>
データは階層性質を持つことが多いです。<br />例えば、食べ物には「甘味」「塩味」「酸味」「苦味」「うま味」という性質がありますね♪<br /><br />僕の大好物のラーメンも味噌汁もこの5つの性質を持っています。<br /><br />ラーメンにはさらに「麺の硬さ」「油の多さ」「味の濃さ」という性質が加わり、味噌汁にはさらに「味噌の味」という性質が加わり、、。<br /><br />こんな感じで階層構造になっているデータをオブジェクト指向では簡単に管理することができます。<br /><br />具体的にはラーメンは食べ物オブジェクトを継承することで食べ物オブジェクトが持つ「甘味」「塩味」「酸味」「苦味」「うま味」という性質を使用することができます。
<h3>多態性</h3>
う～～～ん、、、<br />とっても難しい考え方です。<br /><br />辞書的な説明をすると、あるオブジェクトに対して複数の異なる形態を持たせることができます。<br /><br />例えば、「25」と「12.34」はデータの型が整数型と浮動小数点数型で異なるのにも関わらず、演算が可能ですよね♪<br />これが多態性という性質です。<br /><br />分からなければ飛ばしてもok!です。
<h2>クラスの定義</h2>
クラスは以下のように定義します。
<code class="vb-dot-net">
	Public Class クラス名
		Private プロパティ As データ型
		Private プロパティ As データ型
		Private プロパティ As データ型 = 初期値

		Public Sub メソッド名()
			'メソッドの処理...
		End Sub

		Public Function メソッド名() As データ型
			'メソッドの処理
		End Function
	End Class
</code>
PublicやPrivateとは外部から参照できるかどうかを設定しています。
<table>
	<tbody>
		<tr>
			<th>Private</th>
			<td>他のオブジェクトからオブジェクト内部のプロパティ・メソッドにアクセスできなくなります。</td>
		</tr>
		<tr>
			<th>Public</th>
			<td>他のオブジェクトからオブジェクト内部のプロパティ・メソッドにアクセスすることができます。</td>
		</tr>
	</tbody>
</table>
<div class="separator"></div>
では、実際にクラスを定義してみましょう♪<br />ここでは四角形クラスを作成します。<br />幅と高さをプロパティとして持ち、面積を返す関数をメソッドをして持ちます。
<code class="vb-dot-net">
	Public Class Rect
		Public width As Integer
		Public height As Integer
		Public Function get_area()
			Return width * height
		End Function
	End Class
</code>
<h2>インスタンスの生成</h2>
では、実際にクラスからインスタンスを生成してみましょう♪<br />以下のように書きます。
<code class="vb-dot-net">
	Dim インスタンス名 As クラス名
	インスタンス名 = New クラス名
</code>
省略して以下のように書きこともできます。
<code class="vb-dot-net">
	DIm インスタンス名 As New クラス名
</code>
<div class="separator"></div>
では、先ほど作成したrectクラスからshikakuインスタンスを生成してみましょう♪
<code class="vb-dot-net">
	Dim shikaku As New Rect
</code>
<h2>インスタンスのメンバへのアクセス</h2>
オブジェクトのインスタンスへアクセスするには以下のように書きます。
<code class="vb-dot-net">
	インスタンス名.メンバ名
</code>
<div class="separator"></div>
では、幅と高さプロパティを設定してメソッドを用いて面積を取得して表示しましょう♪
<code class="vb-dot-net">
	shikaku.width = 5 '幅を「5」に設定
	shikaku.height = 7 '高さを「7」に設定
	Label1.Text = shikaku.get_area() '面積を取得して表示
</code>
<div class="separator2"></div>
完成形を以下に紹介します。
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
			Dim shikaku As New Rect
			shikaku.width = 5
			shikaku.height = 7
			Label1.Text = shikaku.get_area()
		End Sub
		Public Class Rect
			Public width As Integer
			Public height As Integer
			Public Function get_area()
				Return width * height
			End Function
		End Class
	End Class
</code>
<img src="../pics/プログラム-クラスとインスタンス.gif" alt="クラスとインスタンス" />
<h2>コンストラクタ</h2>
先ほどはインスタンスを生成して、その後にプロパティをひとつずつ設定しますが、これは面倒くさいですよね、、、<br />インスタンス生成時に自動的に設定したいです!!<br />これを実現するのがコンストラクタです。<br />コンストラクタとはインスタンス生成時に自動で実行されるサブルーチンを言います。
<code class="vb-dot-net">
	Public Class クラス名
		'プロパティ1...
		'プロパティ2...
		'メソッド1...
		Public Sub New(引数1, 引数2, ...)
			プロパティ1 = 引数1
			プロパティ2 = 引数2
		End Sub
	End Class
</code>
では、先ほどのshikakuインスタンスのプロパティをもっと簡単に設定してみましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
			Dim shikaku As New Rect(5, 7) 'インスタンス生成時にインスタンスのプロパティを設定
			Label1.Text = shikaku.get_area()
		End Sub
		Public Class Rect
			Public width As Integer
			Public height As Integer
			Public Function get_area()
				Return width * height
			End Function

			'コンストラクタ
			Public Sub New(ByVal w As Integer, ByVal h As Integer) 'コンストラクタ引数として幅と高さを取得
				width = w 'コンストラクタ内で幅を設定
				height = h 'コンストラクタ内で高さを設定
			End Sub
		End Class
	End Class
</code>
コンストラクタ内でプロパティを設定すれば、インスタンス内のプロパティに対してメソッドを通してアクセスする必要がありませんね♪<br />思わぬバグを防止する観点からこれをアクセスできないようにPublic修飾子からPrivate修飾子に変更しましょう♪
<code class="vb-dot-net">
	Public Class Form1
		Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
			Dim shikaku As New Rect(5, 7)
			Label1.Text = shikaku.get_area()
		End Sub
		Public Class Rect
			Private width As Integer 'Private修飾子に
			Private height As Integer 'Private修飾子に
			Public Function get_area()
				Return width * height
			End Function

			'コンストラクタ
			Public Sub New(ByVal w As Integer, ByVal h As Integer)
				width = w
				height = h
			End Sub
		End Class
	End Class
</code>
<h2>Propertyメソッド</h2>
vb.netではプロパティを設定・取得することを専門としたメソッドを定義することができます。<br />前述のコンストラクタで実行すればok!ですが、一応ここでも説明しておきます。<br />Propertyメソッドのうち、プロパティを設定する部分をsetアクセサと呼び、プロパティを取得する部分をgetアクセサと呼びます。
<code class="vb-dot-net">
	Public Class クラス名
		Private n As Integer
		Public Property Propertyメソッド名 As データ型
			Get
				Return n
			End Get
			Set(引数)
				n = 引数
			End Set
		End Property
	End Class
</code>
プロパティとメソッドの中間として機能しますが、使用する機会は多くありません。<br />プロパティを設定するならコンストラクタで、プロパティを取得するには専用のメソッドで行うことが多いです。
<h2>With文</h2>
同一のインスタンスに対する複数のメンバにアクセスする際にはWith文を使用することで簡単にコードを書けます。<br />先ほど例ではコンストラクタを使用せずにshikakuインスタンスの高さと幅にデータを設定するには以下のように書く必要があります。
<code class="vb-dot-net">
	shikaku.width = 7
	shikaku.height = 5
</code>
shikakuと何回も書くのはたいっへんですね、、、<br />With文を用いると以下のように書くことができます。
<code class="vb-dot-net">
	With shikaku
		.width = 7
		.height = 5
	End With
</code>
簡単ですね♪
<?php footer(); ?>