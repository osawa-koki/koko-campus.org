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
<h2>htmlドキュメント</h2>
htmlはxmlの一種で、「&lt;」「&gt;」によるタグを形成し、ドキュメントツリー階層のデータを形成します。<br /><br />なんのこっちゃ???って感じですよね、、、<br />「タグ」と「ドキュメントツリー」に分けて説明します。
<h3>タグ</h3>
<div class="para2">
	初めまして、僕の名前はkokoです。う～ん、今日も良い天気ですね。なんだか気分が高まります。<br /><br />そういえば、今日は12月20日。クリスマスが近づいてきましたが、皆さんの予定はどうでしょうか。僕はずっとプログラミングしている予定です。
</div>
普通に読みやすい文章ですよね♪<br />これがもし以下のようになっていたらどうでしょうか?
<div class="para2">
	初めまして僕の名前はkokoですう～ん今日も良い天気ですねなんだか気分が高まりますそういえば今日は12月20日クリスマスが近づいてきましたが皆さんの予定はどうでしょうか僕はずっとプログラミングしている予定です
</div>
読みずらい!!<br />日本語では「句点(、)」や「読点(。)」を用いて文字(データ)を区切って読みやすくしていますよね。<br /><br />htmlないしは他の言語でもこのようにテキスト(データ)を良い感じに区切って表現する必要があるんです。<br />xmlではこれを「&lt;」と「&gt;」を用いて実現します。<br />こんな感じです。
<code class="html">
	&lt;html&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8" /&gt;
			&lt;title>タイトル&lt;/title&gt;
		&lt;head&gt;
	&lt;html&gt;
</code>
<p class="r">中身は無視してok!です。</p>
タグは以下のように「タグ名」と「属性(省略可)」と「属性値(省略可)」からなります。
<img src="../pics/タグ2.png" alt="タグの仕組みの画像" />
また、「&lt;/タグ名&gt;」からなる閉じタグでテキストコンテントをはさむことで、タグの範囲を指定します。<br />開始タグと閉じタグで囲まれた部分全体を要素と呼びます。
<h2>ドキュメントツリー</h2>
タグは以下のように入れ子(タグの中身にタグを入れる)にすることも可能です。
<code class="html">
	&lt;div&gt;
		&lt;div&gt;
			&lt;span&gt;&lt;/span&gt;
			&lt;span&gt;&lt;/span&gt;
		&lt;/div&gt;
		&lt;div&gt;
			&lt;span&gt;&lt;/span&gt;
			&lt;span&gt;&lt;/span&gt;
		&lt;/div&gt;
		&lt;div&gt;
			&lt;span&gt;&lt;/span&gt;
			&lt;span&gt;&lt;/span&gt;
		&lt;/div&gt;
	&lt;/div&gt;
</code>
入れ子になっていない場合もブラウザが良い感じに解釈してくれますが、原則として避けてください。
このようにして木(ツリー)構造のデータを作成します。
<code class="html">
	&lt;japan&gt;
		&lt;saitama&gt;
			&lt;soka&gt;&lt;/soka&gt;
			&lt;koshigaya&gt;&lt;/koshigaya&gt;
			&lt;kasakabe&gt;&lt;/kasakabe&gt;
			&lt;kawaguchi&gt;&lt;/kawaguchi&gt;
		&lt;/saitama&gt;
		&lt;tokyo&gt;
			&lt;adachi&gt;&lt;/adachi&gt;
			&lt;chiyoda&gt;&lt;/chiyoda&gt;
			&lt;sumida&gt;&lt;/sumida&gt;
			&lt;shibuya&gt;&lt;/shibuya&gt;
		&lt;/tokyo&gt;
	&lt;/japan&gt;
</code>
<img src="../pics/ドキュメントツリー2.png" alt="ドキュメントツリーの画像" />
また、ある要素の直下にある要素を子要素、ある要素のひとつ上にある要素を親要素、ある要素の子要素の下にある要素を子孫要素、ある要素の親要素の上にある要素を祖先要素、同一の親要素をもつ要素のうち自分よりも先にある要素を兄要素、同一の親要素をもつ要素のうち自分よりも後にある要素を弟要素と呼びます。
<img src="../pics/木構造.png" alt="木構造" />
<h2>htmlの基本構造</h2>
まずは完成形から、、、
<code class="html">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8" /&gt;
			&lt;meta name="viewport" content="width=device-width,initial-scale=1" /&gt;
			&lt;title&gt;タイトル&lt;/title&gt;
			&lt;link rel="stylesheet" href="style.css"&gt;
		&lt;/head&gt;
		&lt;body&gt;
			本文
		&lt;/body&gt;
	&lt;/html&gt;
</code>
先ほどの画像にするならこんな感じです。
<img src="../pics/head-body.png" alt="html構造の画像" />
headタグはユーザが直接見ることができない部分で、htmlファイルの設定を行います。<br />body部分はユーザが直接見ることができる部分で、ここにユーザに表示する内容を書きます。
<div class="scroll-600w">
	<table>
		<thead>
			<tr>
				<th colspan="2">html</th>
			</tr>
			<tr>
				<th width="50%">head</th>
				<th width="50%">body</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					ユーザには見えないhtmlの補足情報を記述します。<br />主に以下の内容を記述します。
					<ul>
						<li>文字コードの指定</li>
						<li>タイトル</li>
						<li>cssファイルの指定</li>
						<li>viewportの設定</li>
					</ul>
					テンプレートを紹介するので、ここの部分はコピペでok!です。
				</td>
				<td>
					ユーザが見ることができる、htmlの本体の部分です。<br />ここの記述方法について学びます。
				</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>htmlのひな形</h3>
<code class="html">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8" /&gt;
			&lt;meta name="viewport" content="width=device-width,initial-scale=1" /&gt;
			&lt;title&gt;タイトル&lt;/title&gt;
			&lt;link rel="stylesheet" href="style.css"&gt;
		&lt;/head&gt;
		&lt;body&gt;
			本文
		&lt;/body&gt;
	&lt;/html&gt;
</code>
一応、headタグ内のタグについて簡単に説明します。
<br /><br />
<table>
	<tbody>
		<tr>
			<th>文字コード</th>
			<td>「&lt;meta charset="utf-8" /&gt;」で指定します。<br />原則として文字コードは「utf-8」を採用してください。</td>
		</tr>
		<tr>
			<th>viewport</th>
			<td>「&lt;meta name="viewport" content="width=device-width,initial-scale=1" /&gt;」でok!です。<br />画面サイズが異なるPC・スマホ・タブレットで最適化して表示するための呪文です。</td>
		</tr>
		<tr>
			<th>タイトル</th>
			<td>「&lt;title&gt;タイトル&lt;/title&gt;」と記述します。<br />あくまでもgooogle等の検索用に書くもので、ページには表示されません。<br />ページの内容を簡潔に説明して下さい。</td>
		</tr>
		<tr>
			<th>stylesheet</th>
			<td>cssの部分で説明します。<br />簡単に説明すると、htmlは単なるテキストのみを格納し、デザインの部分はcssファイルに記述しますが、このcssファイルを指定します。</td>
		</tr>
	</tbody>
</table>
<br />
以降では、このheadの部分は省略してコードを提示します。
<?php footer(); ?>