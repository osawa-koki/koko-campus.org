<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-14",
	"updated" => "2022-02-14"
);
head($obj);
?>
<h2>コメントアウト</h2>
ここからは実際にhaskellを用いてプログラミングしていきます。<br />プログラムコード中にコメントアウト(メモ書き)をするには以下の2通りの方法があります。
<ul>
	<li>-- ～～～</li>
	<li>{- ～～～ -}</li>
</ul>
<h3>-- ～～～</h3>
単一行でのコメントアウトです。<br />「--」以降がコメントアウトとなります。
<code class="haskell">
	main :: IO () -- 標準入出力
	main = putStrLn "welcome to haskell" -- 文字列を表示
</code>
<h3>{- ～～～ -}</h3>
複数行でのコメントアウトです。<br />「{-」と「-}」に囲まれた部分がコメントアウトとなります。
<code class="haskell">
	{-
	今日も
	良い
	天気だね♪
	-}
	main :: IO () -- 標準入出力
	main = putStrLn "welcome to haskell" -- 文字列を表示
</code>
<h2>haskellプログラムの雛形</h2>
haskellプログラムは以下のように記述します。<br />あくまでも初心者用ですので、スキルを得たら必要に応じて書き換えてください。
<code class="haskell">
	main = do
		-- メインプログラムの処理...
		-- メインプログラムの処理...
		-- メインプログラムの処理...
</code>
もしくは複合文ブロック(「{...}」)を使用して以下のように書きます。
<code class="haskell">
	main = do {
		-- メインプログラムの処理...
		-- メインプログラムの処理...
		-- メインプログラムの処理...
	}
</code>
この場合は「{...}」内の各文の終わりに「;(セミコロン)
<div class="separator"></div>
haskellではmain関数を含む関数は値として処理されるため、haskellプログラムへのエントリーポイントであるmain変数にメインとなる処理群を代入します。
<h2>haskellコードの留意点</h2>
haskellでプログラミングする際には以下の点に注意してください。
<ul>
	<li>インデントによる複合文の管理</li>
	<li>ソフトタブの使用</li>
</ul>
<h3>インデントによる複合文の管理</h3>
haskellでは原則として複合文ブロック(「{...}」)ではなく、インデント(行頭に配置する空白類似文字)で複数の命令文をまとめます。<br />どちらでも構いませんが、<a href="https://www.haskell.org/documentation/">公式ドキュメント</a>のコードではインデントによって管理されていることが多いので、ここでもインデントを用いて管理することとします。
<h3>ソフトタブの使用</h3>
インデントに使用する空白類似文字として、ハードタブ(タブ文字)とソフトタブ(スペース)の2種類がありますが、haskellではソフトタブの使用が推奨されています。<br />ハードタブを使用するとコンパイル時に警告が発せられます。
<p class="r">エラーとはなりませんが、使用すべきではありません。</p>
<img src="../pics/ハードタブの警告.png" alt="ハードタブ コンパイルウォーニング" />
<h2>標準入出力</h2>
<h3>標準出力</h3>
コンソール画面に表示するには以下の文を使用します。
<ul>
	<li>putStr</li>
	<li>putStrLn</li>
	<li>print</li>
</ul>
<table>
	<tbody>
		<tr>
			<th>putStr</th>
			<td>文字列型のデータをコンソール画面に表示します。</td>
		</tr>
		<tr>
			<th>putStrLn</th>
			<td>文字列型のデータをコンソール画面に表示します。<br />文字列の最後に自動的に改行文字が追加されます。</td>
		</tr>
		<tr>
			<th>print</th>
			<td>型を気にせずに、データをコンソール画面に表示します。<br />デバグ目的で使用します。<br />日本語文字を表示するとエスケープシーケンスに変換されるため、うまく表示されません。</td>
		</tr>
	</tbody>
</table>
データ型については後ほど詳しく説明しますので、ここでは本番環境ではputStrとputStrLnを使用して、開発環境ではprintを使用すると覚えてください。
<code class="haskell">
	main = do
		putStr "自動でネ"
		putStr "改行ネ"
		putStr "されないネ"

	{- &darr; コンソール &darr;
	自動でネ改行ネされないネ
	-}
</code>
<code class="haskell">
	main = do
		putStrLn "自動でネ"
		putStrLn "改行ネ"
		putStrLn "されるネ"

	{- &darr; コンソール &darr;
	自動でネ
	改行ネ
	されるネ
	-}
</code>
<h3>標準入力</h3>
以下のように書きます。
<code class="haskell">
	変数 &lt;- getLine
</code>
では入力した文字列を取得して表示してみましょう♪
<code class="haskell">
	main = do
		x <- getLine
		putStr "好きな言語は"
		putStr x
</code>
<img src="../pics/標準入出力.gif" alt="標準入出力" />
<h2>変数</h2>
変数とはプログラムの実行に際して必要となる一時的なデータを保存するための箱です。<br />変数は以下のように宣言します。
<code class="haskell">
	変数 = 値
</code>
宣言などは特に必要ありませんが、doブロック内で変数を作成する場合には「let」修飾子を使用します。<br />「let」修飾子は関数内などで変数を局所的に定義する際に使用されます。
<code class="haskell">
	love = "I Love "

	main = do
		let hs = "haskell"
		putStr love
		putStr hs
	
	{- &darr; コンソール &darr;
	I Love haskell
	-}
</code>
また、doブロックの中と外で同一名の変数を作成することもできます。<br />この場合には、ブロック内で作成された値が参照されます。
<code class="haskell">
	side = "outside"

	main = do
		let side = "inside"
		putStr side

	{- &darr; コンソール &darr;
	inside
	-}
</code>
haskellで注意するべき点は変数は不可変(イミュータブル)である点です。<br />haskellでは一度変数に値を代入したらこれを変更することができません。<br /><br />もはや<strong>変</strong>数とも呼ばない気がしますね、、、<br />したがって以下のコードはエラーとなります。
<code class="haskell">
	{- コンパイルエラー -}

	x = "haskell"
	x = "HASKELL"

	main = do
		putStr x
	
	{- &darr; コンソール &darr;
	Multiple declarations of ‘x’
	-}
</code>
haskellでは変数の不可変という性質から変数に値を代入すると言う代わりに、変数に値を拘束すると言うことが多いです。
<div class="separator"></div>
値を変更できる真の変数も使用することができますが、haskellを使用する上で特別な理由がない限りは使用するべきではありません。<br />参考までに紹介します。
<code class="haskell">
	import Data.IORef -- 「Data.IORef」モジュールを使用

	main = do 
		v <- newIORef "haskell" -- vに「haskell」を代入
		show1 <- readIORef v -- vの値をshow1に拘束
		putStrLn show1 -- show1の値を出力

		writeIORef v ("HASKELL") -- vの値を更新
		show2 <- readIORef v -- vの値をshow2に拘束
		putStrLn show2 -- show2の値を出力
</code>
<?php footer(); ?>