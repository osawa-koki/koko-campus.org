<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<h2>htmlとcss</h2>
htmlとは「Hypertext Markup Language」の略で、テキストや画像・動画などを用いてwebサイトを作成する際に用いられます。<br /><br />cssとは「Cascading Style Sheets」の略で単なるテキストであるhtmlをデザインを設定するために用いられます。<br /><br />一般的なwebサイトはこのhtml・cssとjavascriptで作成されます。<br />javascriptに関してはhtmlとcssの知識が必要不可欠ですので、この授業が終了したら学習しましょう♪
<h3>webサイトとは</h3>
おそらくwebサイトと言えばなんとなくどんなものかイメージできる人が多いと思います。<br />インターネットを用いてアクセス可能なhtmlで書かれたページと思ってください。<br />このページもwebサイトです。
<h4>仕組み</h4>
webサイトが表示されるには、webクライアント(ブラウザ)がwebサーバに対してhttpリクエストを送信して、webサーバがそれに対してhttpレスポンス(html + α)を返します。
<p class="r">httpレスポンスに関してはapache(nginx)などの知識が必要ですが、レンタルサーバを使用すれば特に意識することなくwebサイトが構築できるため、ここでは省略します。</p>
<img src="../pics/webサイトの仕組み.png" alt="webサイトの仕組みの画像" />
<h4>url(uri)</h4>
「Uniform Resource Locator(Identifier)」の略で、インターネット上のホストを一意に識別するために使用されます。<br />インターネット上の住所としてipアドレスがありますが、ipアドレスは単なる数字(IPv6では16進数の数字)ですのでなんだか美しくありません、、、<br />企業のwebサイトを紹介するページで「<?php echo $_SERVER["REMOTE_ADDR"]; ?>」って書いてあったら何だか、、、ですよね、、、<br />「https://koko-campus.org/」の方が良いですよね。<br /><br />通常はレンタルサーバ(vps)を契約する際に同時に契約します。<br />特に難しい設定はありません。<br />レンタルサーバとドメインを提供している会社を簡単に紹介しますね♪
<br />
<ul>
	<li><a href="https://www.onamae.com">お名前ドットコム</a></li>
	<li><a href="https://www.sakura.ne.jp">さくらインターネット</a></li>
	<li><a href="https://muumuu-domain.com">ムームードメイン</a>(ドメインのみ)</li>
	<li><a href="https://lolipop.jp">ロリポップ</a>(サーバのみ)</li>
</ul>
<br />
<h4>ブラウザ</h4>
webサイトはブラウザアプリ(google chrome・safari・microfost edge・firefox・internet explorer)などを通して閲覧します。<Br />ブラウザごとに若干動作が異なるため、google chromeとsafariで表示が違うといったことも起こります。<br />最近はブラウザ間の差異は小さくなっていますが、これに関しても意識する必要があります。<br /><br />全てのブラウザでの動作確認を実施するのは困難ですので、特にシェアが高いブラウザでチェックすることをオススメします。<br />google chrome・safari・microfost edge・firefox・internet explorerの5つです。
<p class="r">internet explorerに関しては2022年(あと少し!!)でサポート終了が決まっていているため別にチェックしなくてもokな気がしますが、従来のno.1ブラウザなだけあって未だにかなり使われているのでチェックする人も多いです。<br />僕はinternet explorerというブラウザは聞いたことがないのでチェックしません。</p>
<h2>環境構築</h2>
環境構築というと大げさですが、簡単にhtml&cssをコーディング・チェックする環境を整えましょう♪<br />コーディング(プログラミング)は実際にコードを書く工程と書いたコードが期待通りの動作をするかチェックする工程の2つに分類できます。
<h3>エディタ</h3>
エディタとは実際にコードを書くためのプログラムです。<br />有名なエディタとして以下のものがあられます。
<br />
<ul>
	<li><a href="https://atom.io">atom</a></li>
	<li><a href="https://code.visualstudio.com/">visual studio</a></li>
	<li><a href="https://www.sublimetext.com/">sublime text</a></li>
</ul>
<br />
どれでも構いませんが、kokoはatomをオススメします。<br />理由は、ユーザが多いため多くの情報が存在すること、オープンソースであり様々なプラグイン(追加機能)が使用可能であること、無料であることがあげられます。<br />上のリンクからatom公式サイトに移動してダウンロードして下さい。<br />ダウンロードが完了したらすぐに使用可能です。<br />日本語用のプラグインを使用することもできますが、atomを用いるうえで特に高度な英語スキルは必要ないのでここでは省略します。<br /><br />左上の「file」から新規ファイルの作成(New File)、ファイルの保存(Save)、名前を付けて保存(Save as...)が可能です。<br />これだけ覚えればひとまずok!でしょう♪
<h3>ブラウザ</h3>
windowsユーザならばPC購入時に標準でmicrosoft edgeが搭載されていると思います。<br />これで問題ありませんが、kokoはhtml・css・javascriptの開発者用のサイトである<a href="https://developer.mozilla.org/ja/docs/Web">MDN</a>をよく利用するので、その開発元が運営しているfirefoxを使用することが多いです。<br />一応主要なブラウザのダウンロードサイトを紹介します。
<br />
<ul>
	<li><a href="https://www.mozilla.org/ja/firefox/new/">firefox</a></li>
	<li><a href="https://www.google.com/intl/ja/chrome/">google chrome</a></li>
	<li><a href="https://www.microsoft.com/ja-jp/edge">microsoft edge</a></li>
	<li><a href="https://support.apple.com/ja_JP/downloads/safari">safari</a></li>
</ul>
<br />
<div class="separator"></div>
以上で環境構築は終了です。お疲れさまでした。<br />次はhtmlの基本について学びましょう♪
<?php footer(); ?>