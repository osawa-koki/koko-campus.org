<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-14",
	"updated" => "2022-02-14"
);
head($obj);
?>
<h2>let</h2>
main関数内で変数を宣言する際に使用しましたね♪<br />let文は変数にスコープを設けて宣言する際に使用します。<br />以下のように書きます。
<code class="haskell">
	let 変数1 = 値1
		変数2 = 値2
		変数3 = 値3
	in 式
</code>
let内で宣言された変数1と変数2と変数3は、続くinの後の式の中でのみ有効です。<br />では、これを用いたコードを書いてみましょう♪
<code class="haskell">
	hs =
		let h = "ha" -- 局所的に変数を宣言
			s = "skell" -- 局所的に変数を宣言
		in h ++ s -- 変数hとsはこの式でのみ有効

	main :: IO ()
	main = do
		print hs

	{- &darr; コンソール &darr;
	haskell
	-}
</code>
let内で宣言された変数にinに続く式の外からアクセスするとエラーとなります。
<code class="haskell">
	{- コンパイルエラー -}

	hs =
	let h = "ha"
		s = "skell"
	in h ++ s

	main :: IO ()
	main = do
		putStr hs
		putStr h -- ここから変数hにアクセスできない、、、

	{- &darr; コンソール &darr;
	Variable not in scope: h :: String
	-}
</code>
<h2>where</h2>
letと同じ効果をもたらしますが、書き方が異なります。
<code class="haskell">
	式
	where
		変数1 = 値1
		変数2 = 値2
		変数3 = 値3
</code>
where内で宣言された変数はwhereの直前の式内でのみアクセスできます。<br /><br />では、先ほどletを用いて書いたコードをwhereを用いて書き換えてみましょう♪
<code class="haskell">
	hs =
		h ++ s
		where
			h = "ha"
			s = "skell"

	main :: IO ()
	main = do
		putStr hs
	
	{- &darr; コンソール &darr;
	haskell
	-}
</code>
where内で宣言された変数にwhereの直前の式以外からアクセスするとエラーになります。
<code class="haskell">
	{- コンパイルエラー -}

	hs =
		h ++ s
		where
			h = "ha"
			s = "skell"

	main :: IO ()
	main = do
		putStr hs
		putStr h

	{- &darr; コンソール &darr;
	Variable not in scope: h :: String
	-}
</code>
<h2>条件分岐(if)</h2>
仕組みは他の言語と同様です。<br />以下のように書きます。
<code class="haskell">
	if 条件式 then 式1 else 式2
</code>
では、整数の絶対値を返すコードを書いてみましょう♪
<code class="haskell">
	n1 = 10
	n2 = -50
	n3 = -25

	main :: IO ()
	main = do
		print (if n1 < 0 then -n1 else n1)
		print (if n2 < 0 then -n2 else n2)
		print (if n3 < 0 then -n3 else n3)

	{- &darr; コンソール &darr;
	10
	50
	25
	-}
</code>
<h2>条件分岐(case)</h2>
パターンマッチングと呼ばれ、式の値がパターンにマッチするかで使用する式を制御します。<br />以下のように書きます。
<code class="haskell">
	case 式 of
		パターン1 -> 式1
		パターン2 -> 式2
		パターン3 -> 式3
</code>
では、拡張子からプログラミング言語を表示するプログラムを作成してみましょう♪
<code class="haskell">
	main :: IO ()
	main = do
		ext <- getLine
		let lang = case ext of "hs" -> "haskell"
							"rs" -> "rust"
							"py" -> "python"
							"go" -> "go"
							_ -> "unknown"
		putStr lang
</code>
「_(アンダースコア)」は全てにマッチするため、case内の最後に記述していずれにもマッチしなかった場合に採用する式を記述します。<br />パターンは上から順にチェックされていくため、「_(アンダースコア)」を途中においてしまうと「_(アンダースコア)」以下のパターンは絶対に参照されなくなってしまいます。したがって、「_(アンダースコア)」一番最後に書くようにします。
<img src="../pics/パターンマッチング.gif" alt="パターンマッチング" />
<h2>ガード(case)</h2>
caseを用いたパターンマッチングの進化版で、パターンマッチングに加えて条件式による制御も行います。<br />以下のように記述します。
<code class="haskell">
	case 式 of
		pt1 | 条件式A -> pt1パターンにマッチして、条件式Aを満たす場合の式
			| 条件式B -> pt1パターンにマッチして、条件式Aを満たさず条件式Bを満たす場合の式
			| oterwise -> pt1パターンにマッチして、条件式Aも条件式Bも満たさない場合の処理
		pt2 | 条件式A -> pt2パターンにマッチして、条件式Aを満たす場合の式
			| 条件式B -> pt2パターンにマッチして、条件式Aを満たさず条件式Bを満たす場合の式
			| oterwise -> pt2パターンにマッチして、条件式Aも条件式Bも満たさない場合の処理
		_ -> pt1にもpt2にもマッチしない場合の式
</code>
「|(パイプ)」を用いてパターンにマッチした後の条件分岐を設定します。<br />otherwiseはtrueと等価で上のいずれの条件式も満たさなかった場合を意味します。<br /><br />では、拡張子とその言語が開発された年を入力して「〇〇〇言語は古い/新しい」と出力するプログラムを作成しましょう♪<br />なんだかよくわからないプログラムですけど、練習ということでスルーして下さい。
<code class="haskell">
	main :: IO ()
	main = do
		ext <- getLine
		input <- getLine
		let age = read input :: Int
		let lang = case ext of "hs" | age < 2000 -> "haskellは古い"
									| otherwise -> "haskellは新しい"
							&nbsp;&nbsp;&nbsp;"rs" | age < 2000 -> "rustは古い"
									| otherwise -> "rustは古い"
							&nbsp;&nbsp;&nbsp;"py" | age < 2000 -> "pythonは古い"
									| otherwise -> "pythonは新しい"
							&nbsp;&nbsp;&nbsp;_ -> "unknown"
		putStr lang
</code>
<img src="../pics/ガード.gif" alt="ガード" />









<?php footer(); ?>