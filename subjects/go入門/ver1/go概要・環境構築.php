<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>go言語</h2>
<div class="bg-logo-go入門">
	go言語は2009年にgoogleによって開発されたプログラミング言語です。<br />c/c++などと同じくシステムプログラミングである一方で、シンプルな文法であるため初心者にも理解しやすいです。<br /><br />特徴としてはとにかく高速なこと、シンプルなこと、汎用的であることがあげられます。<br />また、徹底的に複雑な機能を除いているため、バグを最小限に抑えることが可能です。<br />c/c++の代替になるかどうかは差し置いて、今後シェアが急速に高まることは間違いなしの言語です。<br /><br />因みにですけど、、、go言語ってオブジェクト指向をサポートしていないんですよね、、、<br />この良し悪しは人によりますが、とにかくシンプルにかけるため、プログラムの寿命が延びて保守性が重要視される今日では高い効果を発揮する言語であると言えます。<br /><br />それでは、Let's&nbsp;Go!!!
</div>
<h2>エディタのダウンロード</h2>
プログラミングするにはコードを書くアプリが必要ですね♪<br />デフォルトでインストールされているメモ帳でもできますが、使いずらいです。<br /><br />是非プログラミング専用のエディタを使用しましょう♪<br />良く使用されるエディタには以下のものがあります。
<ul>
	<li><a href="https://code.visualstudio.com/">visual studio code</a></li>
	<li><a href="https://atom.io">atom</a></li>
	<li><a href="https://www.sublimetext.com/">sublime text</a></li>
	<li><a href="https://brackets.io/">brackects</a></li>
</ul>
僕はvisual studio codeをオススメします。<br />理由はgo言語用の様々なプラグインが使用可能だからです。<br />以下のリンクからダウンロードして下さい。
<a href="https://code.visualstudio.com/" class="link to-vs-code">visual studio code</a>
特に設定することなく使用可能です。<br />左側の拡張機能メニューからgo言語用のプラグインを使用することをオススメします。
<img src="../pics/vs-code-拡張機能.png" alt="vs code" class="max-400w" />
<h2>コンパイルとビルド</h2>
コンピュータは我々が書いた英語みたいなコードを直接実行することはできません。<br />コンピュータが実行することができるのは「0」と「1」だけで書かれたバイナリデータと呼ばれるものだけです。<br />そのため、我々が書いたコード(ソースコード)をコンピュータが実行できるように変換する必要があります。<br />これを「<strong>コンパイル</strong>」ないしは「<strong>ビルド</strong>」と呼びます。
<img src="../pics/コンパイル.png" alt="コンパイルの説明画像" />
<h3>コンパイル</h3>
プログラミングでは、英語っぽいコード(<strong>ソースコード</strong>)を入力しますがコンピュータはこのコードを直接実行することはできません。<br /><br />コンピュータが我々が書いたソースコードを実行するためには一度ソースコードをコンピュータが実行できるコード(<strong>実行可能プログラム</strong>)へ変換する必要があります。<br /><br />この作業を「<strong>コンパイル</strong>」と呼びます。
<h3>ビルド</h3>
コンパイルの進化バージョンです。<br />入力されたコードをチェックして、さらには実行時に必要なライブラリを結合させて実行可能なプログラムを作成することを言います。<br />ここでは、コンパイルとビルドを厳密に区別することはしませんが、これ以降にビルドと言ったら「コンパイル + α」の作業だと捉えてください。
<h2>goコンパイラのインストール</h2>
では早速goコンパイラをインストールしましょう♪<br />以下のリンクからインストーラをダウンロードします。
<a href="https://go.dev/dl/" class="link to-golang">go</a>
インストーラがダウンロードされたらそのまま起動します。<br />設定は全てデフォルトでok!です。<br />そのまま進めてください。
<img src="../pics/インストール.gif" alt="goコンパイラのインストール" />
インストールが完了したらシェルで以下のコマンドを実行してください。
<code class="shell">
	go version
</code>
バージョンが表示されたらgoコンパイラのインストールに成功しています。
<img src="../pics/インストール-確認.gif" alt="goコンパイラのインストール" />
<h2>goコマンド</h2>
goコマンドを確認しましょう♪<br />通常使用するコマンド(引数)は以下の3つです。
<ul>
	<li>run</li>
	<li>build</li>
	<li>install</li>
</ul>
<h3>run</h3>
ソースコードをコンパイル・実行します。
<code class="shell">
	go run ファイルへのパス
</code>
では試しに以下のコードを実行してみましょう♪<br />中身は気にしなくてok!です。
<code class="hello-dot-go">
	package main

	import (
		"fmt"
	)

	func main() {
		fmt.Println("Hello World!!!")
	}
</code>
ファイル名は慣例として「.go」として下さい。
<code class="shell">
	go run hello.go
</code>
<img src="../pics/go-run.gif" alt="go runコマンド" />
<h3>build</h3>
ソースコードをビルドします。
<code class="go">
	go build ファイルへのパス
</code>
では先ほどのgoソースコードをビルドしてみましょう♪
<code class="shell">
	go build hello.go
</code>
カレントディレクトリに実行可能プログラム(windowsならexeファイル)が生成されます。
<img src="../pics/go-build.gif" alt="go buildコマンド" />
<h3>import</h3>
パッケージをインポートするためのコマンドです。<br />後ほど説明します。
<?php footer(); ?>