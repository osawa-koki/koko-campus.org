<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-01",
	"updated" => "2022-02-01"
);
head($obj);
?>
<h2>phpとは</h2>
<div class="bg-logo-php入門">
	phpとは「Hypertext Preprocessor」の略で、html文書に埋込ことができるなど、webサイト構築に特化した汎用プログラミング言語です。<br /><br />webサイトの75%以上はこのphpで作成されているほど、webサイト構築では人気な言語です。
	<p class="r"><a href="https://w3techs.com/">w3techs</a>より。(2021年11月時点)</p>
	因みに、webサイト用のCMS最大手であるwordpressもphpで書かれています。<br />このページに到達した人はおそらくhtmlやcssの学習が終了してecmacript(旧javascript)やrubyなどの次の言語に進もうとしている人が多いと思います。<br /><br />phpはサーバーサイドの言語の中でもかなり簡単ですので、サーバーサイドの言語に難しいイメージを抱いている人でも学びやすいです。<br />是非phpへ進みましょう♪
</div>
<h2>環境構築</h2>
実際にphpプログラムを動作させる環境を構築していきましょう♪<br />具体的には以下の2つの処理をします。
<ol>
	<li>エディタのインストール</li>
	<li>xamppのインストール</li>
</ol>
<h3>エディタのインストール</h3>
エディタとは実際にコードを打ち込むアプリケーションです。<br /><br />windowsユーザならばデフォルトでメモ帳が搭載されていますが、オススメしません。<br />理由は使いにくいし機能が少ないからです。
<img src="../pics/メモ帳.png" alt="メモ帳の画像" />
<img src="../pics/atom-editer.png" alt="エディタの画像" />
下のエディタの方が見やすいですよね♪<br />ということで一般的に良く用いられているエディタを紹介します。
<ul>
	<li>atom</li>
	<li>sublimetext3</li>
	<li>brackets</li>
	<li>visual stadio code</li>
</ul>
このなかでも僕は「atom」をオススメします。<br /><br />理由としては、豊富なプラグイン機能が存在していること、使用しているユーザが多いため情報もたくさん存在すること、githubというバージョン管理システムとの連携が可能であることがあげられます。<br /><br />ということでさっそくatomをインストールしましょう♪
<a class="link to-atom" href="https://atom.io/">atom</a>
インストールが終了したらすぐに使用可能です。<br />日本語のプラグインもありますが、英語版atomでもfile・edit・NewFile・Saveなど簡単な英語が分かれば使えるのでここではプラグインの説明はしません。
<h3>xamppのインストール</h3>
phpというのは説明した通りサーバサイドで動く言語です。<br /><br />みなさんが使用しているパソコン(クライアント)ではなく、サーバでの利用が想定されています。<br /><br />しかしながら、十万円をはるかに超えるサーバを用意なんてできないですよね、、、<br />皆さんが実際にwebサイトを構築する際にはレンタルサーバやvpsを借りることになるのですが、あくまでも練習用(開発用)で使用したいので、皆さんが使っているパソコン上に仮想的にサーバを作成してphpを稼働させるアプリケーションであるxamppを使用します。
<a class="link to-xampp" href="https://www.apachefriends.org/jp/index.html">xampp</a>
容量が大きいですので、インストールに10分程度かかります。<br />xamppに関して以下の3つの処理をして環境構築は完了です。
<ol>
	<li>htdocsフォルダの登録</li>
	<li>.htaccessファイルの設定</li>
	<li>xamppの起動</li>
</ol>
<h4>htdocsフォルダの登録</h4>
xamppのインストール時に特殊な設定をしなければ、「C:\Program Files\XAMPP」フォルダに「htdocs」というフォルダがあると思います。<br /><br />この「htdocs」フォルダがwebページのアップロード先です。
<img src="../pics/dir-to-htdocs.gif" alt="htdocsフォルダ" />
このフォルダはよく使うのでクイックアクセスに登録しておきましょう♪(登録しなくても問題はありません。)
<h4>.htaccessファイルの設定</h4>
.htaccessファイルとはapacheというwebサーバ用のプログラムの設定を記述するファイルです。<br />以下の内容のファイルを作成します。
<code class="dummy -dot-htaccess">
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
<a class="link to-htaccess" href="htaccess.txt" download="htaccess.txt">.htaccessファイル</a>
ファイル名が「htaccess.txt」となっているのでこれを「.htaccess」に変更して下さい。<br />「.htaccess」という名前のファイルは直接ダウンロードができないので、、、<br /><br />「.htaccess」と、「.(ドット)」から始まる<span class="u">拡張子が「htaccess」である</span>ファイル名にして下さい。<br />windowsだとデフォルトで拡張子が表示されず、拡張子があるファイルでも拡張子がないように表示されてしまうため、エクスプローラ(ファイルを管理するアプリ)を開いて、左上にある「表示」のボタンを押して「ファイル名拡張子」にチェックを入れてください。<br /><br />ファイル名を変更したらこのファイルを「htdocs」フォルダに移動させてください。
<h4>xamppの起動</h4>
とっても簡単です。<br />xamppの画面から「apache」のstartボタンを押すだけです。<br /><br />後ほど説明しますが、データベースを操作する際にはその下の「mysql」もスタートします。
<img src="../pics/start-xampp.gif" alt="xamppの開始" />
緑色に変化すれば起動に成功しています。
<div class="separator"></div>
早速ブラウザを用いてhtdocsディレクトリにアップしたファイル(webページ)を閲覧するにはurlの欄に「http://localhost/」から始まるパスを書きます。<br />例えば、htdocsディレクトリにindex.phpというファイルをアップした場合は「http://localhost/index.php」、htdocsディレクトリにあるmemberディレクトリ内のlogin.phpファイルにアクセスするには「http://localhost/member/login.php」と入力してください。<br />「\(バックスラッシュ)」ははなく、「/(スラッシュ)」を使用してください。
<div class="separator"></div>
以上で環境構築は終了です。お疲れさまでした。<br />次はwebページにデータを入力させて遷移先で受け取る処理に挑戦してみましょう♪
<?php footer(); ?>