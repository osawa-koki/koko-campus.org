<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-05",
	"updated" => "2022-05-05"
);
head($obj);
?>
<h2>gitとgithub</h2>
gitとは、代表的な分散型バージョン管理システムのうちのひとつで、複数あるバージョン管理システムの中でも人気度No.1です。
<div class="koko-graph max-300w">
	<span class="url">../data/share.csv</span>
</div>
<script src="../../../package/js-modules/koko-graph/ver1.js" charset="utf-8" defer></script>
<p><a href="https://trends.google.com/trends/?geo=JP">google trends</a>より作成。</p>
バージョン管理システムとは、その名の通りシステムのバージョンを管理するシステムです。<br />新しいバージョンを作成する際に、「2022-05-05/〇〇〇」ってフォルダをいちいち作成するのは大変ですよね、、、<br />バージョン管理システムを使用すればこのような作業は不要になります。<br /><br />githubとは、gitリポジトリをインターネット上で管理するサービスを言います。<br />これは世界中のプログラマが共同でシステム開発を行うことを助けることを目的として開発されました。<br /><br />githubで公開されているソースコードは必ずgitというバージョン管理システムで管理されています。<br />ということで、最初にgitについて説明して、その後にgithubについて説明します。
<h2>gitの特徴</h2>
バージョン管理システムはgit以外にも複数ありますが、他のシステムと比べた時のgitの特徴を紹介します。
<ul>
	<li>分散型</li>
	<li>githubとの連携</li>
	<li>pull request</li>
	<li>シェア急拡大中</li>
</ul>
<h3>分散型</h3>
ソースコードの貯蔵庫であるリポジトリを複数個で管理します。
<img src="../pics/集中型-分散型.png" alt="分散型バージョン管理システム" />
2005年くらいまではSubVersionという集中型バージョン管理システムが主流でしたが、オフラインでの操作が困難であるという点から現在では人気は逓減しています。<br />gitは集中型バージョン管理を採用し、リポジトリ間の連携が困難であるという問題は「fork」「pull request」というコマンドで克服しています。
<h3>githubとの連携</h3>
githubを用いれば世界中の人とコードを共有することが可能です。<br />共同でプログラミングをする機会が増えている現在、githubでソースコードを世界中で共有できるgitはとっても便利です。<br /><br />因みに、githubでコードを世界中に公開しないプライベートリポジトリは従来は有料でしたが、数年前から無料で作成できるようになりました。
<h3>pull request</h3>
「pull request」コマンドについては後ほど詳しく説明しますが、プログラマ同士がコードの修正をし合うことを助けるツールだと思ってください。<br /><br />これによって「ソーシャルコーディング」が容易になりました。<br />ソーシャルコーディングとは「みんなでコードを書く」ということ意味する言葉です。<br /><br />OSSの人気が増している中で、コードを世界中で共有する必要性は増しています。<br />これに伴い、コードの修正案を出し合うことを可能にする「pull request」も重宝されます。
<h3>シェア拡大中</h3>
これは特徴というかなんというか、、、<br /><br />gitはとにかくシェアを拡大し続けています。<br />これはgitを支えるツールの開発にも進めて、gitを使用する際のツールも豊富に存在します。<br /><br />また、ユーザが多いことからインターネット上に豊富な情報が存在します。<br />したがって、簡単にgitを使用する環境が整っていると言えます。
<h2>アカウントの作成</h2>
<a href="https://github.co.jp/" class="link to-gitHP">git</a>
特に説明することはありません。<br />そのまま登録すればok!です。
<img src="../pics/アカウント作成.gif" alt="アカウント作成" />
因みに、ここで設定するUsernameはgithubページのurlとしても使用されます。<br />僕はUsernameを「koko-campus」に設定しているため、僕のgithubアカウントのurlは「https://github.com/koko-campus」となっています。
<img src="../pics/username.gif" alt="ユーザネーム" />
<h2>インストール</h2>
以下のリンクからダウンロード可能です。
<a href="https://desktop.github.com/" class="link to-gitInstaller">git</a>
上のアプリはgitをGUIで操作する用です。<br />特に設定は必要ありません。<br />そのままログインすればok!です。<br /><br />続いてCLIで操作するためのアプリをインストールしましょう♪
<a href="https://gitforwindows.org/" class="link to-gitInstaller">git</a>
設定はデフォルトでok!です。
<img src="../pics/インストール.gif" alt="git インストール" />
設定が完了したら試しに以下のコマンドを実行してみましょう♪
<code class="shell">
	git --version
</code>
gitのバージョンが表示されると思います。
<img src="../pics/git--version.gif" alt="git インストール確認" />
バージョンが表示されない場合は、環境変数の「Path」にgit実行ファイルへのパスが登録されているか確認してください。
<img src="../pics/環境変数.gif" alt="環境変数" />
「C:\Program Files\Git\cmd\」が登録されているかチェックして下さい。
<?php footer(); ?>