<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-05-05",
	"updated" => "2022-05-05"
);
head($obj);
?>
<h2>操作の流れ</h2>
gitでのバージョン管理は以下のような流れとなります。
<ol>
	<li>リポジトリの初期化</li>
	<li>インデックスへのファイルの追加</li>
	<li>コミット</li>
</ol>
<img src="../pics/git-手順.png" alt="git 手順" />
また、上記手順を踏む上で便利なツールとして以下のコマンドがあります。
<ul>
	<li>リポジトリの状態の確認</li>
	<li>コミットログの確認</li>
	<li>変更差分の確認</li>
</ul>
<div class="separator"></div>
最初に例として使用するバージョン管理の対象となるファイルを説明します。
<code class="dir dummy">
	koko
	&nbsp;&nbsp;|--&gt; readme.txt
	&nbsp;&nbsp;|--&gt; code.py
	&nbsp;&nbsp;|--&gt; var
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--&gt;about-setteing.txt
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--&gt;setting.json
</code>
<h2>リポジトリの初期化</h2>
gitでバージョン管理をする際に一番最初にするべき処理です。<br />以下のコマンドを実行します。
<code class="shell">
	git init
</code>
gitに関するコマンドは一般的にはカレントディレクトリを対象とするため、バージョン管理をしたいフォルダにcdコマンドで移動して実行してください。<br />デフォルトフォルダを設定する方法もありますが、あまり用いられないためここでは説明しません。<br /><br />では、早速「koko」フォルダへ移動してリポジトリ初期化コマンドを実行しましょう♪
<img class="no-max" src="../pics/git-init.gif" alt="git initコマンド" />
「.git」フォルダが生成されます。<br />このフォルダ内にバージョン管理に必要なデータが保存されます。<br />gitコマンドを実行すると自動で操作され、ユーザが直接操作することはありません。<br /><br />また、「git init」コマンドを実行したフォルダ以下をワークツリーと呼び、このワークツリーでファイルの編集を行います。<br />以前のバージョンに戻すコマンドを実行すると、以前のファイル群はこのワークツリー上に展開されます。
<h2>インデックスへのファイルの追加</h2>
インデックスとはコミットをする前の一時的にファイルを保存する領域のことを言います。<br />この処理をステージングと呼ぶこともあります。<br /><br />以下のコマンドを実行します。
<code class="shell">
	git add 追加するファイル名
</code>
例えば、「code.py」をステージングする場合には以下のコマンドを実行します。
<code class="shell">
	git add code.py
</code>
また、カレントディレクトリの全ファイル・ディレクトリをステージングする場合にはファイル名を「.」とします。
<code class="shell">
	git add .
</code>
<img src="../pics/git-add.gif" alt="ステージング" />
<h2>コミット</h2>
ステージングしたファイル群を実際にリポジトリ内に保存する処理を言います。<br />以下のコマンドを実行します。
<code class="shell">
	git commit -m "1st commit"
</code>
「-m」はコマンドオプションで一行のコミットメッセージを登録します。<br />コミットメッセージとはコミットに関する簡単な説明文です。<br />このコミットメッセージを基にどのコミット状態まで復元するかを選択します。<br /><br />では実際にkokoフォルダでコミット処理を実行してみます。
<img src="../pics/git-commit_1st.gif" alt="git commit" />
<div class="separator"></div>
因みに、先ほどコミットしたファイルの中身を紹介します。
<code class="code-dot-py">
	print(0)
</code>
<code class="readme-dot-txt">
	git管理のためのテストフォルダ

	# 初期状態
</code>
「var」ディレクトリ内のファイルについては省略します。
<h2>リポジトリの状態の確認</h2>
以下のコマンドでgitリポジトリの状態を確認できます。
<code class="shell">
	git status
</code>
<img src="../pics/git-status.gif" alt="git status" />
「On Branch Master」とあり、「Branch Master」上にいることが分かります。<br />ところで、「Branch Master」ってなんでしょう???<br />後ほど説明します。<br /><br />「git status」コマンドでは、簡単な英語でリポジトリの状態を説明してくれることを覚えてください。
<h2>コミットログの確認</h2>
では、コミットの履歴を確認しましょう♪<br />以下のコマンドで実行可能です。
<code class="shell">
	git log
</code>
<img src="../pics/git-log.gif" alt="git log" />
<div class="separator"></div>
これだけだと、つまらないためもう一度ステージング・コミットを行った後にログを表示してみましょう♪
<code class="code-dot-py">
	print(1)
</code>
<code class="readme-dot-txt">
	git管理のためのテストフォルダ

	# 初期状態
	# 一度、修正済み - print(1)
</code>
とファイルを修正しました。<br /><br />次にステージングとコミットを行います。
<code class="shell">
	git add .
	git commit -m "2nd commit"
</code>
<img src="../pics/git-commit_2nd.gif" alt="git commit" />
続いて、ログを表示してみましょう♪
<img src="../pics/git-log_2.gif" alt="git log" />
二回分のログが表示されます。
<h2>変更差分の表示</h2>
差分の対象となる2つのファイル群は以下の3通りに分類されます。
<ul>
	<li>ワークツリーとステージ領域</li>
	<li>ステージ領域と最新コミット分</li>
	<li>ワークツリーと最新コミット分</li>
</ul>
<img src="../pics/差分の関係.png" alt="差分の関係" />
<h3>ワークツリーとステージ領域</h3>
「git add」コマンドでステージングしたファイルからワークツリーに変更を加えた部分を表示します。<br />以下のコマンドで実行します。
<code class="shell">
	git diff
</code>
例えば、最初に以下のファイルをステージングします。
<code class="code-dot-py">
	print(1)
</code>
次に、ファイルの中身を以下のように変更します。
<code class="code-dot-py">
	print(2)
</code>
この状態で、差分表示コマンドを実行します。
<code class="shell">
	git diff
</code>
<img src="../pics/git-diff.gif" alt="git diff" />
「print(1)」が無くなって、「print(2)」が増えているよ♪って教えてくれます。
<div class="separator"></div>
因みに、ワークツリーのファイルを以下のように変更して、ステージングしたファイルと同じに設定します。
<code class="code-dot-py">
	print(1)
</code>
この状態で、差分を表示してみましょう♪
<img src="../pics/git-diff_NONE.gif" alt="git diff" />
差分がないため、何も表示されません。
<h3>ステージ領域と最新コミット分</h3>
ステージ領域と最新コミット分の差分を表示するには以下のコマンドを実行します。
<code class="shell">
	git diff --cached
</code>
現在の最新のコミットされたファイルは以下の通りです。
<code class="code-dot-py">
	print(1)
</code>
また、ステージングされたファイルは以下の通りです。
<code class="code-dot-py">
	print(2)
</code>
この状態で、差分を表示してみます。
<code class="shell">
	git diff --cached
</code>
<img src="../pics/git-diff-cached.gif" alt="git diff --cached" />
<h3>ワークツリーと最新コミット分</h3>
最後に、ワークツリーと最新コミット分の差分を表示するコマンドを紹介します。
<code class="shell">
	git diff HEAD
</code>
例として、以下のファイルを最新のコミットファイルとします。
<code class="code-dot-py">
	print(1)
</code>
コミット後に、ワークツリーのファイルを以下のように変更します。
<code class="code-dot-py">
	print(2)
</code>
この状態で、差分を表示してみます。
<code class="shell">
	git diff HEAD
</code>
<img src="../pics/git-diff-HEAD.gif" alt="git diff HEAD" />
<div class="separator2"></div>
まとめとして、以下の状態を想定して下さい。
<img src="../pics/git-diff_状態の例示.png" alt="git diff" />
この状態で、それぞれの差分表示コマンドを実行します。
<img src="../pics/git-diff_まとめ.gif" alt="git diff" />
<?php footer(); ?>