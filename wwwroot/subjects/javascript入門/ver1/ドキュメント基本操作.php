<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-15",
	"updated" => "2022-01-15"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>オブジェクト構造</h2>
javascriptは「window」オブジェクトをルートとした木構造をとっています。
<img src="../pics/window.png" alt="windowオブジェクト" />
<h2>ドキュメント</h2>
javascriptでhtmlを操作する際にはドキュメントオブジェクトを変更します。<br />ドキュメントオブジェクトはwindowオブジェクトのdocumentにあります。<br />したがって、以下のコードで取得できます。
<code class="javascript">
	window.document
</code>
windowオブジェクトは特別に省略することもできます。<br />通常は省略して書きます。
<code class="javascript">
	document
</code>
<h2>要素の取得</h2>
では実際にドキュメントオブジェクトから特定の要素を取得しましょう♪<br />要素の取得方法には大きく以下の3つの方法があります。
<ul>
	<li>idで取得</li>
	<li>タグ名で取得</li>
	<li>クラスで取得</li>
</ul>
<h3>idで取得</h3>
html要素に設定されたidで要素を取得します。<br />idで要素を取得するためのコードは以下のようになります。
<code class="javascript">
	document.getElementById("id名");
</code>
idはhtmlドキュメント内で一意(オンリーワン)であるため、このメソッドによって取得される要素の数も1つです。<br />では、実際に要素を取得してみましょう♪<br />以下のhtmlコードにおいてidに「pikapika」が設定されているピカチュウの要素を取得するには以下のコードを実行します。
<code class="html">
	&lt;ul&gt;
		&lt;li&gt;ピチュー&lt;/li&gt;
		&lt;li id="pikapika"&gt;ピカチュウ&lt;/li&gt;
		&lt;li&gt;ライチュウ&lt;/li&gt;
	&lt;/ul&gt;
</code>
<code class="javascript">
	document.getElementById("pikapika");
</code>
<img class="no-max" src="../pics/getElementById.gif" alt="getElementById" />
<h3>タグ名で取得</h3>
html要素のタグ名で要素を取得します。<br />タグ名で要素を取得するためのコードは以下のようになります。
<code class="javascript">
	document.getElementsByTagName("タグ名");
</code>
getElement<strong>s</strong>ByTagNameと、複数形の「s」がつくことに注意してください。<br />例えば、以下のhtmlコードにおいて「li」要素を取得するには以下のコードを実行します。
<code class="html">
	&lt;ul&gt;
		&lt;li&gt;ピチュー&lt;/li&gt;
		&lt;li&gt;ピカチュウ&lt;/li&gt;
		&lt;li&gt;ライチュウ&lt;/li&gt;
	&lt;/ul&gt;
</code>
<code class="javascript">
	document.getElementsByTagName("li");
</code>
<img class="no-max" src="../pics/getElementsByTagName.gif" alt="getElementsByTag" />
タグ名で取得する場合にはクラスで取得する場合と同様に、配列型に似た複数のデータを包括するhtmlcollection型を取得するので、その中の特定の要素を取得するにはインデックス番号で指定する必要があります。<br />インデックス番号は上にある要素から順に「0」から始まる整数が振られます。
<p class="r">インデックス番号は「0」から始まることに注意してください。</p>
<code class="javascript">
	let obj;
	obj = document.getElementsByTagName("li");
	console.log(obj[0]); //1つ目の「li」要素
	console.log(obj[1]); //2つ目の「li」要素
	console.log(obj[2]); //3つ目の「li」要素
</code>
<h3>クラスで取得</h3>
html要素に設定されたクラスで要素を取得します。<br />クラスで要素を取得するためのコードは以下のようになります。
<code class="javascript">
	document.getElementsByClassName("クラス名");
</code>
getElementsByTagName同様に、getElement<strong>s</strong>ByClassNameと、複数形の「s」がつくことに注意してください。<br />例えば、以下のhtmlコードにおいてクラスに「pika」が設定されている要素を取得するには以下のコードを実行します。
<code class="html">
	&lt;ul&gt;
		&lt;li class="pika"&gt;ピチュー&lt;/li&gt;
		&lt;li class="pika"&gt;ピカチュウ&lt;/li&gt;
		&lt;li&gt;ライチュウ&lt;/li&gt;
	&lt;/ul&gt;
</code>
<code class="javascript">
	document.getElementsByClassName("pikapika");
</code>
<img class="no-max" src="../pics/getElementsByClassName.gif" alt="getElementsByClassName" />
クラス名で取得する場合には配列型に似た複数のデータを包括するhtmlcollection型を取得するので、その中の特定の要素を取得するにはインデックス番号で指定する必要があります。
<h2>documentオブジェクトの操作</h2>
先ほどは、documentオブジェクトを取得しましたね♪<br />ここでは取得したdocumentオブジェクトを簡単に操作してみましょう♪
<img src="../pics/documentオブジェクト.png" alt="documentオブジェクト" />
<h3>textContent</h3>
要素の中身は「textContent」プロパティで操作します。
<img src="../pics/documentオブジェクト(textContent).png" alt="documentオブジェクト" />
以下のコードで要素の中身を変更します。
<code class="javascript">
	オブジェクト.textContent = "変更後のデータ";
</code>
では実際に要素の中身を変更してみましょう♪
<code class="html">
	&lt;ul&gt;
		&lt;li&gt;緑茶&lt;/li&gt;
		&lt;li id="target"&gt;ウーロン茶&lt;/li&gt;
		&lt;li&gt;紅茶&lt;/li&gt;
	&lt;/ul&gt;
</code>
<code class="javascript">
	let obj; //要素を格納するための変数の宣言
	obj = document.getElementById("target"); //要素を変数に格納
	obj.textContent = "ほうじ茶"; //要素の中身を変更
</code>
<img class="no-max" src="../pics/textContent.gif" alt="textContent" />
<h3>style</h3>
要素のスタイルを操作します。
<img src="../pics/documentオブジェクト(style).png" alt="documentオブジェクト" />
「style」プロパティはさらに下にcssプロパティを持ちます。
<img src="../pics/styleプロパティ.png" alt="styleプロパティ" />
cssで使用するプロパティと同じですが、cssと異なり「-(ハイフン)」を使用できません。<br />「font-size」のように「-(ハイフン)」を使用する場合は「fontSize」のようにハイフンを省略して、ハイフンの次の文字を大文字にします。
<p class="r">ハイフンを用いて各単語を結合する記法をケバブケース、2単語名以降の最初の文字を大文字にして結合する記法をキャメル記法と呼びます。</p>
<img src="../pics/ケース.png" alt="ケース" />
では実際に要素のスタイルを変更してみましょう♪
<code class="html">
	&lt;ul&gt;
		&lt;li&gt;ピチュー&lt;/li&gt;
		&lt;li&gt;ピカチュウ&lt;/li&gt;
		&lt;li&gt;ライチュウ&lt;/li&gt;
	&lt;/ul&gt;
</code>
<code class="javascript">
	let obj; //documentオブジェクト格納用の変数を宣言
	obj = document.getElementsByTagName("li"); //「li」要素を取得
	obj[0].style.fontSize = "20px"; //1つ目の「li」要素のフォントサイズを「20px」に
	obj[1].style.color = "red"; //2つ目の「li」要素のフォント色を赤に
	obj[2].style.backgroundColor = "cyan"; //3つ目の「li」要素の背景色を水色に
</code>
<img class="no-max" src="../pics/style.property.gif" alt="style" />
<h3>createElement</h3>
jsでhtml要素を作成します。<br />以下のコードで要素を作成できます。
<code class="javascript">
	let obj;
	obj = document.createElement("タグ名");
</code>
これだけだと作成した要素を変数に代入しただけなので、次に説明するappendChildまたは、insertAdjacentHTMLで実際に要素を追加する必要があります。<br />作成した要素の中身を設定するには、先ほど説明したtextContentプロパティを変更すればok!です。
<code class="javascript">
	let obj;
	obj = document.createElement("li"); //「li」要素を作成
	obj.textContent = "new"; //作成した要素の中身に「new」を設定
</code>
<h3>appendChild</h3>
要素を指定した要素の一番最後に追加します。<br />以下のように書きます。
<code class="javascript">
	追加先のオブジェクト.appendChild(追加するオブジェクト);
</code>
では実際に先ほど作成した要素を追加しましょう♪
<code class="html">
	&lt;ul id="parent"&gt;
		&lt;li&gt;ピチュー&lt;/li&gt;
		&lt;li&gt;ピカチュウ&lt;/li&gt;
	&lt;/ul&gt;
</code>
<code class="javascript">
	let pr, obj; //追加先と作成するオブジェクト用の変数を宣言
	pr = document.getElementById("parent"); //追加先のオブジェクトを取得
	obj = document.createElement("li"); //追加する要素を作成
	obj.textContent = "ライチュウ"; //作成した要素の中身を設定
	pr.appendChild(obj); //作成した要素を追加
</code>
<img class="no-max" src="../pics/appendChild.gif" alt="appendChild" />
<h2>classList</h2>
ドキュメントオブジェクトのclassListプロパティを使用してクラスを操作できます。<br />クラスの操作に関しては以下の4つをメソッドを使用します。
<ul>
	<li>add</li>
	<li>remove</li>
	<li>toggle</li>
	<li>contains</li>
</ul>
<h3>add</h3>
ドキュメントオブジェクトに引数で渡したクラスを追加します。<br />要素に既にそのクラスが存在した場合は何も起こりません。
<code class="javascript">
	要素.classList.add("追加するクラス");
</code>
<h3>remove</h3>
ドキュメントオブジェクトから引数で渡したクラスを削除します。<br />要素にのクラスが存在しない場合は何も起こりません。
<code class="javascript">
	要素.classList.remove("追加するクラス");
</code>
<h3>toggle</h3>
ドキュメントオブジェクトのクラスを引数で渡したクラスが存在すれば削除、なければ追加します。<br />メニューの表示・非表示を切り替える際に使用します。
<code class="javascript">
	要素.classList.toggle("切り替えするクラス");
</code>
<h3>contains</h3>
ドキュメントオブジェクトに引数で渡したクラスが含まれるかどうかを判定します。<br />含まれれば「true」、含まれなければ「false」を返します。
<code class="javascript">
	if (要素.classList.contains("判定対象のクラス")) {
		//クラスが含まれる場合の処理
	} else {
		//クラスが含まれない場合の処理
	}
</code>
<?php footer(); ?>