<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-30",
	"updated" => "2022-01-30"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>css</h2>
cssとは「Cascading Style Sheets」の略で、htmlを装飾するためのファイルです。
<h3>適用方法</h3>
cssをhtmlに反映させる方法は以下の3通りあります。
<ol>
	<li>外部cssファイルの読み込み</li>
	<li>html内のstyle属性内に記述</li>
	<li>htmlタグ内のstyle属性に記述</li>
</ol>
原則として、外部cssファイルを読み込んで適用します。<br />理由はひとつのcssファイルを複数のhtmlファイルに適用可能であること、管理が楽であることがあげられます。<br />htmlから外部cssファイルを読み込む際には<span class="underline">「head」タグ内</span>に以下のように記述します。
<code class="html">
	&lt;link rel="stylesheet" href="style.css" /&gt;
</code>
<p class="r">style.cssの部分はcssファイルへのパスを指定してください。</p>
<h2>cssファイルの作成</h2>
では早速cssファイルを作成しましょう♪<br />ファイル名はなんでもok!ですが、慣例的にstyle.cssとすることが多いです。<br />ファイルの一行目には文字コードを指定するために「@charset "utf-8";」と記述してください。
<code class="css">
	@charset "utf-8";
</code>
<h2>コメントアウト</h2>
cssファイル内でコメントアウトを記述する際には「/*」と「*/」で囲みます。
<code class="css">
	@charset "utf-8";
	/*h1の文字色を赤に設定*/
	h1 {
		color: red;
	}
</code>
<h2>cssの構造</h2>
cssでhtml上の要素のスタイルを指定する際には以下のように記述します。
<code class="css">
	h1 {
		color: red;
	}
</code>
<img src="../pics/cssの構造.png" alt="cssの基本構造の画像" />
プロパティと値の間には「:(コロン)」をおいて、最後には「;(セミコロン)」を書きます。
<h3>セレクタ</h3>
<strong>どの要素を対象とするか</strong>を指定します。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>タグで指定</th>
			<td>タグ名をそのまま記述します。</td>
		</tr>
		<tr>
			<th>クラスで指定</th>
			<td>クラス名の前に「.」を付けて記述します。</td>
		</tr>
		<tr>
			<th>idで指定</th>
			<td>id名の前に「#」付けて記述します。</td>
		</tr>
	</tbody>
</table>
<br />
<code class="css">
	h1 { /*タグ名で指定*/
		color: red;
	}
	.news { /*クラスで指定*/
		font-size: 16px;
	}
	#title { /*idで指定*/
		font-weight: bold;
	}
</code>
中身は無視してok!です。<br />クラス名の前には「.」を付け、id名の前には「#」を付けることを覚えてください。
<h2>開発者ツール</h2>
では早速cssで要素のスタイルを変更してみましょう、と言いたいところなのですが、まずは簡単にスタイルの適用結果を確認・変更できる開発者ツールの使い方を説明します。<br /><br />対象のhtmlをブラウザで開いてどこでもいいので右クリックしてコンテキストメニューを表示します。<br />コンテキストメニューの一番下の「調査」(firefox)・「検証」(google chrome)・「開発者ツールで検証する」(microsoft edge)をクリックしてください。<br />右上にある「ページから要素を選択」を選択します。<br />このモードではhtml上にカーソルを置くと、その要素を自動で選択してくれます。<br />クリックすると、開発者ツールにhtml上の要素の位置とその要素に現在適用されているスタイルを確認できます。<br />開発者ツールのスタイルの部分を変更すればhtml上の表示も変更されるため、ここで微調整を行って良い感じになったらそのスタイルをコピペします。
<img class="no-max" src="../pics/開発者モードの使用.gif" alt="開発者モード" />
<?php footer(); ?>