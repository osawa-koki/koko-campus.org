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
<h2>javascript</h2>
<div class="bg-logo-javascript入門">
	javascriptとは1995年にNetscape Navigator社によって開発されたプログラミング言語です。<br />ブラウザ上に表示されるhtmlを操作するための言語で、webサイトを作成する際には間違いなく使用される技術です。<br />皆さんがよく使用するtwitter・facebook・instagramアプリもjavascriptで書かれています。<br /><br />html&cssだけで作ることができるのは静的ページ(固定されたページ)であるため、ユーザの操作によってhtmlを変更することができません。<br />javascriptを使用することでユーザのアクションを受けてhtml上のデータを操作することが可能で、いわゆる動的ページを作成できます。<br />例えば、メニューボタンをユーザが押したらメニューが表示されるようにしたり、入力欄に対して文字チェックを行ったり、一定量のスクロールされたら画面を横からスライド表示させたり、、、
</div>
<img src="../pics/html-js.png" alt="javascript" />
<h2>html基礎</h2>
javascriptはhtmlを操作する言語ですので、htmlに関する基礎的な知識が必要です。<br />まずは、htmlについて復習しましょう♪
<p class="r">html&amp;cssを一から勉強したい方は下のリンクへ♪</p>
<a href="../../html-css入門/branch" class="link-subject to-html-css入門"></a>
<h3>タグ</h3>
htmlは「&lt;」と「&gt;」を用いてタグを作成します。<br />具体的には以下のような構造になっています。
<img src="../pics/タグ.png" alt="タグ" />
<h3>木構造</h3>
htmlでは要素が複数の要素を含み、その要素がさらに他の複数個の要素を含んで、、、<br />ある要素を含む立場にある要素を親要素、含まれる立場にある要素を子要素を呼びます。<br />さらに、親要素を辿ってたどり着く要素を祖先要素、子要素を辿ってたどり着く要素を子孫要素と呼びます。<br />また、同一の親要素を持つ要素同士を兄弟要素と呼び、ある要素の兄弟要素のうち、それよりも前にある要素を親要素、後にある要素を弟要素と呼びます。
<img src="../pics/木構造.png" alt="木構造" />
<h2>ドキュメントオブジェクト</h2>
先ほどはhtml要素が木構造をとることを学びましたね♪<br />ブラウザ上ではhtml要素をhtmlドキュメントオブジェクト(Document Object)として扱います。<br />javascriptではこのhtmlドキュメントオブジェクトを操作することで、webページを操作します。<br />html要素が木構造をとるため、html要素をレンダリングして生成されるドキュメントオブジェクトも当然に木構造をとります。
<img src="../pics/ドキュメントオブジェクト.png" alt="ドキュメントオブジェクト" />
<h2>オブジェクト</h2>
そもそも、オブジェクトってなんでしょうか???<br />Object、直訳すれば「モノ」になりますが、この「モノ」(オブジェクト)はひとつ、ないしは複数のデータと処理を保有します。<br />オブジェクトが保有するデータをプロパティ、処理をメソッドと呼びます。
<img src="../pics/オブジェクト.png" alt="オブジェクト" />
また、オブジェクトはそのプロパティとして他のオブジェクトを保有することができます。
<h3>プロパティ</h3>
オブジェクトが保有するデータを言います。<br />オブジェクト内のプロパティにアクセスするには「オブジェクト.プロパティ」と書きます。<br />後ほど詳しく説明しますが、オブジェクトのプロパティを変更するには「オブジェクト名.プロパティ = 変更後のデータ」と書きます。
<h3>メソッド</h3>
オブジェクトが保有する処理(関数)を言います。<br />オブジェクトのメソッドを実行するには「オブジェクト名.メソッド()」と書きます。<br />後ほど詳しく説明しますが、オブジェクトのメソッド実行時に何らかのデータを渡す場合には「オブジェクト名.メソッド(渡したいデータ)」と書きます。
<p class="r">渡したいデータを引数と呼びます。</p>
<h2>環境構築</h2>
では実際にjavascriptを動かすための環境を構築しましょう♪<br />環境構築っていうと大げさですが、、、<br />以下の3つを行います。
<ul>
	<li>ブラウザのインストール</li>
	<li>コンソールの表示</li>
	<li>エディタのインストール</li>
</ul>
<h3>ブラウザのインストール</h3>
通常はデフォルトで「google chrome」「microsoft edge」「safari」などのブラウザがOSに標準搭載されていますのでこれを使用すればok!です。<br />僕はmozillaが提供しているMDNという開発者向け情報提供サービスをよく利用するので、同じくmozillaが運営しているfirefoxを利用しています。<br />firefoxは標準で搭載されていない場合が多いのでfirefoxを使用したい方は以下のリンクからインストールして下さい。
<a class="link firefox" href="https://www.mozilla.org/ja/firefox/new/">firefox</a>
<h3>コンソールの表示</h3>
プログラミングってコーディングするだけではなくて、実際にデータを出力させたり、プログラムが想定した動作をしなかった場合はデバッグ(原因追及と修正)を行う必要がありますが、これを簡単に行うためのツールがブラウザに標準搭載されているコンソール画面です。<br />通常はユーザに表示されないので、これを表示するように設定します。<br />webページのどこでもいいので右クリック、「調査/開発者ツール」をクリックしてください。<br />右側に開発者ツールが表示されるので、その中のメニューのうちの「コンソール」を選択してください。
<h4>firefox</h4>
<img class="no-max" src="../pics/console-firefox.gif" alt="開発者ツール" />
<h4>google chrome</h4>
<img class="no-max" src="../pics/console-chrome.gif" alt="開発者ツール" />
<h4>microsoft edge</h4>
<img class="no-max" src="../pics/console-edge.gif" alt="開発者ツール" />
<h3>エディタのインストール</h3>
エディタとは実際にプログラムコードを入力するアプリケーションプログラムです。<br />windowsにデフォルトで搭載されているメモ帳でもok!ですが、オススメしません。<br />見にくい、機能が貧相だからです。
<img class="border" src="../pics/メモ帳.png" alt="エディタ" />
<img class="border" src="../pics/atom-editer.png" alt="エディタ" />
下のエディタの方が見やすいですよね♪<br />代表的なエディタには以下のものがあります。
<ul>
	<li><a href="https://atom.io/">atom</a></li>
	<li><a href="https://brackets.io/">brakets</a></li>
	<li><a href="https://visualstudio.microsoft.com/ja/downloads/">visual studio</a></li>
	<li><a href="https://www.sublimetext.com/download">sublimetext</a></li>
</ul>
どれを使用してもok!です。<br />因みに、僕はatomを使用してます。<br />理由はOSSでプラグインが使用可能であるからです。<br />ダウンロードが完了すればすぐに使用可能ですが、見やすさの観点からフォントを変更することをオススメします。<br />「file &gt; setting &gt; editor」から「font family」を「consolas」に、「font size」を「15」に設定すればok!です。
<h2>javascriptの読み込み</h2>
以下の2つに分けて説明します。
<ul>
	<li>html部分</li>
	<li>js部分</li>
</ul>
<h3>html部分</h3>
まずはhtmlの雛形を紹介します。
<code class="html">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja" dir="ltr"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8"&gt;
			&lt;title&gt;koko's lesson&lt;/title&gt;
			&lt;link rel="stylesheet" href="style.css"&gt;
		&lt;/head&gt;
		&lt;body&gt;
			&lt;!--html本体--&gt;
		&lt;/body&gt;
	&lt;/html&gt;
</code>
javascriptファイルを読み込むためにはbodyタグ内に以下のように記述します。
<code class="html">
	&lt;script charset="UTF-8" type="text/javascript" src="読み込むjsファイル" defer&gt;&lt;/script&gt;
</code>
僕はbodyタグの内の一番最後に書くことをオススメします。
<code class="html">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja" dir="ltr"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8"&gt;
			&lt;title&gt;koko's lesson&lt;/title&gt;
			&lt;link rel="stylesheet" href="style.css"&gt;
		&lt;/head&gt;
		&lt;body&gt;
			&lt;!--html本体--&gt;
			&lt;script charset="UTF-8" type="text/javascript" src="読み込むjsファイル" defer&gt;&lt;/script&gt;
		&lt;/body&gt;
	&lt;/html&gt;
</code>
「defer」については無くてもok!な場合もありますが、極力つけて下さい。
<p class="r">deferの説明は<a href="../../../blog/index?date=20220104">こちら</a>。</p>
<h3>js部分</h3>
これ以降はjavascriptを略してjsと呼びます。<br />読み込むjsファイルを作成しましょう♪<br />ファイル名は任意でok!ですが、拡張子は慣例として「.js」としてください。<br />jsファイルの一行目には以下のように記述します。
<code class="javascript">
	"use strict";
</code>
これは新しいバージョンのjsだよ♪ってブラウザに解釈してもらうための記述します。
<p class="r">書かなくてもok!な場合もありますが、原則として書いてください。</p>
これ以降にjsコードを紹介する際には「"use strict";」は省略します。
<div class="separator"></div>
外部jsファイルではなく、htmlファイル内に書く方法もありますが、保守性の観点から推奨されていません。<br />一応紹介しますが、htmlに直接記述する積極的な理由がない限りは外部jsファイルを読み込んでください。
<code class="html">
	&lt;script charset="UTF-8" type="text/javascript"&gt;
		//ここにjsのコードを直接記述します!!
	&lt;/script&gt;
</code>
<?php footer(); ?>