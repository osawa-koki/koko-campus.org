<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-14",
	"updated" => "2022-02-14"
);
head($obj);
?>
<h2>高階関数</h2>
引数として関数を受け取る関数や戻り値として関数を返す関数を高階関数と呼びます。<br />これは関数型言語では関数が値であり第一級の対象であるため、関数自体を引数として受け取ったり関数自体を戻り値として返却したりできる性質を利用しています。<br /><br />他の言語ではコールバック関数として関数を引数に渡すことはあってもこれを連鎖させることはほとんどありません。<br />hsakellなどの関数型言語では基本として高階関数を使用していて、処理を論理的に構成します。
<h2>カリー化</h2>
複数の引数をとって単一の戻り値を返す関数を、複数の単一の引数をとって単一の戻り値を返す関数に分解することを言います。
<img src="../pics/カリー化.png" alt="カリー化" />
関数のデータ型を指定する際に以下のように書きますね♪
<code class="haskell">
	fx :: Int -&gt; Int -&gt; Int -&gt; Int
	fx a b c
</code>
どうして複数の引数を連続させて書いているか理解できましたか???<br /><br />haskellでは複数の引数を持つ関数はタプル型の引数を用いない限りは存在せず、複数の単一の引数をとって単一の戻り値を返す関数に分解されているからです。<br />今までなんとなく用いてきた複数の引数を持つ関数もカリー化された関数だったんですね♪
<h3>結合の優先度</h3>
カリー化された関数の連続はどの関数を最初に結合するかに関する優先度があります。<br />優先度はデータ型の宣言時と関数の適用時で異なります。
<h4>データ型の宣言時の結合優先度</h4>
データ型の宣言時には右結合がなされます。<br />したがって、先ほどのfx関数のデータ型の指定は以下のように書き換えられます。
<code class="haskell">
	fx :: Int -&gt; (Int -&gt; (Int -&gt; Int))
</code>
<h4>関数の適用時の結合優先度</h4>
関数の適用時には左結合がなされます。<br />したがって、先ほどのfx関数の適用は以下のように書き換えられます。
<code class="haskell">
	(((fx a) b ) c)
</code>
例えば以下のコードを見て下さい。
<code class="haskell">
	{- コンパイルエラー -}

	x = [1..10]

	main :: IO ()
	main = do
		print head x

	{- &darr; コンソール &darr;
	Couldn't match expected type: [a1] -> IO ()
		with actual type: IO ()
	-}
</code>
なぜエラーになるか分かりますか???<br />関数の評価では左結合が行われるため、先ほどのコードは以下のように実行されるからです。
<code class="haskell">
	((print head) x)
</code>
「head x」の部分を先に実行してその結果を「print」するので意図的に「$x」の部分を先に実行してその結果を「print」するので意図的に「$」ないしは括弧を用いて結合の優先度を指定する必要があります。
<code class="haskell">
	main :: IO ()
	main = do
		print $ head x
		print (head x)

	{- &darr; コンソール &darr;
	1
	1
	-}
</code>
<h2>コロン演算子</h2>
これから代表的な高階関数であるfilter関数とmap関数を解析しますが、そのための前提知識となるコロン演算子をここで紹介します。<br />コロン演算子はどこで使用するかのよって機能が変わります。<br />使用場所は以下の2通りあります。
<h3>リストに対するパターンマッチ</h3>
リストに対するパターンマッチとして使用するとリストを先頭の要素とそれ以外の要素に分類します。
<code class="haskell">
	x = ['a'..'n'] -- aからnまでのリスト

	f (x:xs) = x -- 最初の要素を返す
	l (x:xs) = xs -- 最初の要素以外を返す

	main :: IO ()
	main = do
		print $ f x
		print $ l x

	{- &darr; コンソール &darr;
	'a'
	'bcdefghijklmn'
	-}
</code>
慣例として最初の要素は「x」で取得し、それ以外は複数形のsを付けて「xs」とします。
<h3>関数定義内</h3>
関数の定義の中で使用されるコロン演算子はリスト(ys)の先頭に(y)を追加したリストを生成します。
<code class="haskell">
	x = ['a'..'n']

	a (x:xs) = 'A' : xs -- 最初の要素以外の要素の先頭に「A」を追加して返す(先頭を「A」に変換)
	z (x:xs) = 'Z' : xs -- 最初の要素以外の要素の先頭に「Z」を追加して返す(先頭を「Z」に変換)

	main :: IO ()
	main = do
		print $ a x
		print $ z x

	{- &darr; コンソール &darr;
	'Abcdefghijklmn'
	'Zbcdefghijklmn'
	-}
</code>
<h2>演算子引数</h2>
こちらもfilter関数を解析する際に使用します。<br />演算子を引数として渡します。<br />他の言語ではほとんど実装されていないかなり珍しい技術ですね、、、<br />使用方法は引数に演算子の一部をそのまま書けばok!です。<br />演算子をどう書いたかに関わらず、演算子の一部を最初に書く必要があります。<br /><br />演算子の一部を受け取って実際に式として使用する場合にはスペースでつなげて書けばok!です。
<code class="haskell">
	calc p = p 5 -- pを最初に書く!

	main :: IO ()
	main = do
		print $ calc (3+) ------ 8
		print $ calc (3-) ------ -2
		print $ calc (+ (-3)) -- 2
		print $ calc (**2) ----- 25.0
		print $ calc (2**) ----- 32.0
</code>
条件式を渡すこともできます。
<code class="haskell">
	check p = p 5

	main :: IO ()
	main = do
		print $ check (5 ==) -- True
		print $ check (== 5) -- True
		print $ check (/= 5) -- False
		print $ check (5 /=) -- False
		print $ check (3 &gt;) --- False
		print $ check (8 &gt;) --- True
		print $ check (&lt; 3) --- False
		print $ check (&lt; 8) --- True
</code>
<h2>filter関数</h2>
高階関数の代表格ともいえる関数です。<br />リストの中からある条件に一致する要素だけを返します。<br /><br />ではfilter関数を実際に使用してみましょう♪<br />filter関数は以下のように書きます。
<code class="haskell">
	filter (条件式) リスト
</code>
条件式に合致するリストの要素だけを抽出して返します。
<code class="haskell">
	x = [1..10]
	
	main :: IO ()
	main = do
	print $ filter (5 &lt;=) x
	
	{- &darr; コンソール &darr;
		[5,6,7,8,9,10]
	-}
</code>
<div class="separator"></div>
では、filter関数を解析する前にリストの中から偶数だけを返すeven_関数を作成してみましょう♪
<p class="r">evenという名前は予約語で使用できないため、最後に「_(アンダースコア)」を付けています。</p>
<code class="haskell">
	x = [1..10]

	even_ [] = []
	even_ (x:xs)
		| x `mod` 2 == 0 = x : even_ xs  -- 先頭が偶数ならば、それ以外の要素を再帰的に偶数チェックして得たリストの先頭に追加して返却
		| otherwise = even_ xs -- 先頭が奇数ならば、それ以外の要素を再帰的に偶数チェックして得たリストを返却

	main :: IO ()
	main = do
		print $ even_ x

	{- &darr; コンソール &darr;
	[2,4,6,8,10]
	-}
</code>
<div class="separator"></div>
では、遂にfilter関数を解析しましょう♪<br />といってもここまで理解できた方なら簡単に書けると思いますが、、、
<code class="haskell">
	x = [1..10]

	filter_ p [] = []
	filter_ p (x:xs)
		| p x = x : filter_ p xs
		| otherwise = filter_ p xs

	main :: IO ()
	main = do
		print $ filter_ (5 <=) x

	{- &darr; コンソール &darr;
	[2,4,6,8,10]
	-}
</code>
次は少し難しいかもしれません、<br />上のコードでは関数のデータ型を省略して推論させましたが、明示的に指定するとどうなるでしょうか???<br />考えてみましょう♪<br /><br /><br />正解を下に書きますね♪
<code class="haskell">
	filter_ :: (a -&gt; Bool) -&gt; [a] -&gt; [a]
</code>
最初に先頭の要素が条件を満たすかどうかを判定していますね♪<br />満たした場合のみそれを追加して、それ以外の要素にもう一度filter_関数を適用します。<br />その連鎖の結果がfilter関数の最終的な戻り値です。
<h2>map関数</h2>
次はmap関数です。<br />こちらもfilter関数と同様に高階関数の代表格です。<br />map関数はリストの各要素に一定の処理をして新しいリストを返却します。<br /><br />では最初にmap関数を使用してみましょう♪
<code class="haskell">
	x = [1..10]

	main :: IO ()
	main = do
		print $ map (** 2) x -- リストの要素を二乗

	{- &darr; コンソール &darr;
	[1.0,4.0,9.0,16.0,25.0,36.0,49.0,64.0,81.0,100.0]
	-}
</code>
<div class="separator"></div>
では、map関数の中身を解析してみましょう♪<br />おそらくこんな感じになっています。
<code class="haskell">
	x = [1..10]

	map_ p [] = []
	map_ p (x:xs) = p x: map_ p xs

	main :: IO ()
	main = do
		print $ map_ (** 2) x

	{- &darr; コンソール &darr;
	[1.0,4.0,9.0,16.0,25.0,36.0,49.0,64.0,81.0,100.0]
	-}
</code>
では、map関数のデータ型を考えてみましょう♪<br />どうなっているでしょうか???<br /><br /><br />正解は以下の通りです。
<code class="haskell">
	map_ :: (a -&gt; b) -&gt; [a] -&gt; [a]
</code>
最初に先頭の要素にある処理を行っていますね♪<br />その処理によってデータ型が変わることも想定されるため、「b」としておきます。<br />「a」を一度使用すると、次に使用する時もそれと同じ型である必要がありますので、、、<br /><br />それ以外の要素に対して再帰的に処理を行って、最終的な戻り値も最初のリストのデータ型と同じになります。
<?php footer(); ?>