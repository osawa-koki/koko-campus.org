<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-14",
	"updated" => "2022-02-14"
);
head($obj);
?>
<h2>haskell</h2>
<div class="bg-logo-haskell入門">
	haskellとは1990年に開発された関数型プログラミング言語です。<br />開発者であるハスケル・カリーが数学者・論理学者であり、言語の使用もかなり数学的・論理的に構成されたものとなっています。<br /><br />haskellを使用する目的はかなり限定されていて、現在では綺麗なコードを書くための練習として用いられることが多いです。<br />再帰関数・高階関数などの理解が難しいプログラミング仕様の理解につながるほか、カリー化・モナドなどの関数型言語特有の仕組みにも触れることで他の言語でコードを書く際にもより論理的に優れたコードが書けるようになります。<br /><br />初心者にはオススメしません。<br />python・vb.net・java・c++などのオブジェクト指向をサポートしているプログラミングができるようになってからチャレンジするべきでしょう。
</div>
<h2>関数型言語</h2>
プログラムの処理を関数の定義と適用によって行う言語を言います。<br />関数型言語では関数を値として扱うことができます。<br />言い換えれば、関数を変数に代入することや関数の引数に関数を渡すこと、さらには関数の戻り値に関数を返すことが可能です。<br /><br />これに対して、python・vb.net・java・c++などは命令型言語と呼ばれます。<br />これは、これらの言語での文一つ一つが命令であり、これを逐次に実行していくからです。<br />関数はあくまでもこの処理をサポートする立場にあり、主となる処理は変数に対する代入(更新)であって、変数に関数を適用するという概念はありません。<br /><br />もっとも、関数型言語と命令型言語は完全に区別されるものではなく、関数型言語に近い命令型言語や命令型言語に近い関数型言語も存在します。<br />例えば、javascriptは命令型言語でありながら、関数を値として変数に代入する評価式型関数の生成が可能です。
<h2>haskellコンパイラの取得</h2>
haskellのコンパイラは以下の方法で取得できます。
<ul>
	<li><a href="https://www.haskell.org/ghc/">GHC</a></li>
	<li><a href="https://wiki.haskell.org/UHC">UHC</a></li>
	<li><a href="https://wiki.haskell.org/Jhc">JHC</a></li>
</ul>
ここでは最も一般的なGHCを利用します。<br />以下のリンクから自分の環境に合ったzipファイルをダウンロードして下さい。
<a href="https://www.haskell.org/ghc/" class="link to-ghc">GHC</a>
<p class="r">以前はhaskell platformの仕様が推奨されていましたが、2022年から仕様が非推奨となりました。</p>
ダウンロードしたzipファイルを解凍すると、「ghc-9.0.2-x86_64-unknown-mingw32」ディレクトリが作成されます。<br />このままでもok!ですが、名前を分かりやすく変更しましょう♪<br />僕は「ghc-haskell」としました。<br />このフォルダの中には以下の5つのディレクトリがあります。
<ul>
	<li>bin</li>
	<li>docs</li>
	<li>include</li>
	<li>lib</li>
	<li>mingw</li>
</ul>
この中の「bin」ディレクトリまでパスを通します。
<img src="../pics/環境変数.png" alt="環境変数" />
では、実際にインストールに成功したか確認してみましょう♪<br />シェルから以下のコマンドを実行します。
<code class="shall">
	ghc --version
</code>
<img src="../pics/インストール-確認.gif" alt="haskellコンパイラ インストール" />
<h2>haskellコマンド</h2>
haskell(ghc)に関するコマンドは以下の2つを覚えましょう♪
<ul>
	<li>ghc</li>
	<li>ghci</li>
</ul>
<h3>ghc</h3>
haskellファイルをコンパイルするのに使用します。<br />以下のように記述します。
<code class="shell">
	ghc ファイル名
</code>
試しに以下のコードを書いたhaskellファイルをコンパイルしてみましょう♪<br />ファイルの拡張子は慣例として「.hs」とします。
<code class="haskell">
	main :: IO ()
	main = putStrLn "welcome to haskell"
</code>
ここではファイル名を「main.hs」としてファイルを指定します。
<code class="shell">
	ghc main.hs
</code>
<img src="../pics/ghc.gif" alt="ghc" />
カレントディレクトリに実行可能プログラム(windowsならexeファイル)が生成されます。
<h3>ghci</h3>
対話型(インタプリタ型)でhaskellコードを実行します。<br />以下のコマンドを実行します。
<code class="shell">
	ghci
</code>
簡単な四則演算をしてみましょう♪
<img src="../pics/ghci.gif" alt="ghci" />
ghciの会話型モードから離脱するには以下のコマンドを実行します。
<code class="haskell">
	:q
</code>
<h2>エディタ</h2>
皆さん、どんなIDE・エディタを使用していますか???<br />haskell用の有名なIDEは2022年2月時点では存在しないので、エディタでコーディングしてシェルでコンパイルして、、、<br />って操作をすることになります。<br /><br />エディタはマイクロソフト社が提供しているvisual studio codeをオススメします。<br />個人であれば無料で使用でき、様々な言語に対応してたプラグインが存在するからです。
<a href="https://code.visualstudio.com/" class="link to-vs-code">visual studio code</a>
特に設定することなく使用可能です。<br />左側の拡張機能メニューからhaskell用のプラグインを使用することをオススメします。
<img src="../pics/vscode-拡張機能.png" alt="vs code" class="max-400w" />
<?php footer(); ?>