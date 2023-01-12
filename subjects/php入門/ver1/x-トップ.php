<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-11-20",
	"updated" => "2021-11-20"
);
head($obj);
?>
<h2>phpとは</h2>
phpとは「Hypertext Preprocessor」の略で、html文書に埋込ことができるなど、webサイト構築に特化した汎用プログラミング言語です。<br /><br />webサイトの75%以上はこのphpで作成されているほど、webサイト構築では人気な言語です。<br />
<p class="r"><a href="https://w3techs.com/">w3techs</a>より。(2021年11月時点)</p>
<br /><br />このページに到達した人はおそらくhtmlやcssの学習が終了してECMAScript(旧javascript)やrubyなどの次の言語に進もうとしている人が多いと思います。<br /><br />phpはサーバーサイドの言語の中でもかなり簡単ですので、サーバーサイドの言語に難しいイメージを抱いている人でも学びやすいです。<br /><br />是非phpへ進みましょう♪
<h2>環境構築</h2>
実際にphpプログラムを動作させる環境を構築していきましょう♪<br /><br />具体的には以下の2つの処理をします。
<br />
<ol>
	<li>エディタのインストール</li>
	<li>xamppのインストール</li>
</ol>
<br />
<h3>エディタのインストール</h3>
エディタとは実際にコードを打ち込むアプリケーションです。<br /><br />windowsユーザならばデフォルトでメモ帳が搭載されていますが、オススメしません。<br />理由は使いにくいし機能が少ないからです。<br /><br />ということで一般的に良く用いられているエディタを紹介します。
<br />
<ul>
	<li>atom</li>
	<li>sublimetext3</li>
	<li>visual stadio code</li>
</ul>
<br />
このなかでもkokoは「atom」をオススメします。<br /><br />理由としては、豊富なプラグイン機能が存在していること、使用しているユーザが多いため情報もたくさん存在すること、githubというバージョン管理システムとの連携が可能であることがあげられます。<br /><br />ということでさっそくatomをインストールしましょう♪
<a class="install" href="https://atom.io/" target="_blank">atomのwebサイトへ</a>
インストールが終了したらすぐに使用可能です。<br />日本語のプラグインもありますが、英語版atomでもfile・edit・NewFile・Saveなど簡単な英語が分かれば使えるのでここではプラグインの説明はしません。<br />
<h3>xamppのインストール</h3>
phpというのは説明した通りサーバサイドで動く言語です。<br /><br />みなさんが用いているパソコン(クライアント)ではなく、サーバでの利用が想定されています。<br /><br />しかしながら、十万円をはるかに超えるサーバを用意なんてできないですよね、、、<br />皆さが実際にwebサイトを構築する際にはレンタルサーバやVPSを借りることになるのですが、あくまでも練習用(開発用)で使用したいので、皆さんが使っているパソコン上に仮想的にサーバを作成してphpを稼働させるアプリケーションであるxamppを使用します。
<a class="install" href="https://www.apachefriends.org/jp/index.html" target="_blank">xamppのwebサイトへ</a>
容量が大きいですので、インストールに10分程度かかります。<br /><br />インストールしている時間にkokoのプログラミング論を聞いてください笑
<br /><br />
<div id="what-i-like-to-tell">
	kokoはいわゆる私立文系大学出身です。<br />世間一般的には私立文系エンジニアはあまり優秀ではないだとか、、、<br />あくまでも割合の話ですが、この傾向は顕著で、僕も実際その通りだと思います、、、<br /><br />なぜ私立文系出身のエンジニアは優秀ではないと言われるのか、、、<br /><br />その理由については色々語られていますが、kokoの意見としては私立だとか文系だとかいうよりも、単純にプログラミングを好きな人が私立文系出身者には少ないだけだと思います。<br /><br />ということで、使命感で?嫌々?プログラミングするのではなく、「好きでプログラミングをする」「プログラミングで作りたいものを作る」これを忘れないでプログラミングしてほしいです。<br /><br /><br />kokoより
</div>
<br />
xamppのインストールは終了しましたか?
ではxamppに関して以下の3つの処理をして環境構築は完了です。
<br />
<ol>
	<li>htdocsフォルダの登録</li>
	<li>.htaccessファイルの設定</li>
	<li>xamppの起動</li>
</ol>
<h4>htdocsフォルダの登録</h4>
xamppのインストール時に特殊な設定をしなければ、「C:\Program Files\XAMPP」フォルダに「htdocs」というフォルダがあると思います。<br /><br />この「htdocs」フォルダがwebページをアップロードする先です。<br />このフォルダはよく使うのでクイックアクセスに登録しておきましょう♪(登録しなくても問題はありません。)
<h4>.htaccessファイルの設定</h4>
.htaccessファイルとはapacheというwebサーバ用のプログラムの設定を記述するファイルです。<br />以下の内容のファイルを作成します。
<code class="htaccess">
	# webサーバの文字コード(UTF-8)指定
	php_value output_buffering OFF
	php_value default_charset UTF-8
	php_value mbstraing.detect_order SJIS,EUC-JP,JIS,UTF-8,ASCII
	php_value mbstraing.http_input pass
	php_value mbstraing.http.output pass
	php_value mbstraing.internal_encoding UTF-8
	php_value mbstraing.substitude_character none
	php_value mbstraing.encoding_translation OFF

	# php拡張子を削除
	&lt;IfModule mod_rewrite.c&gt;
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME}\.php -f
	RewriteRule ^(.+)$ $1\.php
	&lt;/IfModule&gt;

	# phpエラー出力の有無
	php_flag display_errors on

	# タイムゾーンの設定
	php_value date.timezone Asia/Tokyo

	# デフォルトファイルの設定
	DirectoryIndex index.php

	# ファイル・ディレクトリ一覧の非表示
	Options -Indexes
</code>
プログラミングはただコードをコピーするのはngですが、これに関しては特に説明することがないので以下にダウンロード用のリンクを貼ります。
<a class="install" href="htaccess.txt" download="htaccess.txt">.htaccessファイル</a>
ファイル名が「htaccess.txt」となっているのでこれを「.htaccess」に変更して下さい。<br />「.htaccess」という名前のファイルは直接ダウンロードができないので、、、<br /><br />「.htaccess」と、「.(ドット)」から始まる<span class="u">拡張子がない</span>ファイル名にして下さい。<br />windowsだとデフォルトで拡張子が表示されず、拡張子があるファイルでも拡張子がないように表示されてしまうため、エクスプローラ(ファイルを管理するアプリ)を開いて、左上にある「表示」のボタンを押して「ファイル名拡張子」にチェックを入れてください。<br /><br />ファイル名を変更したらこのファイルを「htdocs」フォルダに移動させてください。
<h4>xamppの起動</h4>
とっても簡単です。<br />xamppの画面から「apache」のstartボタンを押すだけです。<br /><br />後ほど説明しますが、データベースを操作する際にはその下の「mysql」もスタートします。
<br /><br />
<img src="../pics/xampp.png" alt="xamppの画像" />
<br />
以上で環境構築は終了です。お疲れさまでした。<br />次はwebページにデータを入力させて遷移先で受け取る処理に挑戦してみましょう♪
<?php footer(); ?>