<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-14",
	"updated" => "2022-02-14"
);
head($obj);
?>
<h2>関数合成</h2>
関数の作成方法としては関数を一から定義する方法を学びましたね♪<br />それ以外にも方法があります。<br /><br />既存の関数を組み合わせて作成する方法です。
<img src="../pics/関数合成.png" alt="関数合成" />
非常に数学的な考え方です。<br /><br />以下のように関数を合成します。
<code class="haskell">
	h = (f. g)
</code>
3つ以上の関数を合成することもできます。
<code class="haskell">
	fn = (f. g. h)
</code>
注するべき点は関数合成は右側結合である点です。<br />したがって、上のコードは以下のようになります。
<code class="haskell">
	fn = f(g(h(arg)))
</code>
では、実際に関数合成をしてみましょう♪<br /><br />以下の3つの関数を合成します。
<ul>
	<li>add2(2を足す)</li>
	<li>double(2をかける)</li>
	<li>power2(2乗する)</li>
</ul>
<code class="haskell">
	add2 n = n + 2
	double n = n * 2
	power2 n = n * n

	fn1 = add2 . double . power2
	fn2 = power2 . double . add2

	main :: IO ()
	main = do
		print $ fn1 3 --- 20
		print $ fn2 3 --- 100
		print $ fn1 5 --- 52
		print $ fn2 5 --- 196
		print $ fn1 10 -- 202
		print $ fn2 10 -- 576
</code>
結合順序によって結果が変わっていますね♪
<h2>演算子の定義</h2>
haskellでは演算子を自作することもできます。<br />自作の演算子に使用可能な文字は以下の18種類です。
<ul id="operant" class="x">
	<li>!</li>
	<li>#</li>
	<li>$</li>
	<li>%</li>
	<li>&amp;</li>
	<li>*</li>
	<li>+</li>
	<li>.</li>
	<li>/</li>
	<li>&lt;</li>
	<li>=</li>
	<li>&gt;</li>
	<li>?</li>
	<li>\</li>
	<li>^</li>
	<li>|</li>
	<li>-</li>
	<li>~</li>
</ul>
以下のように定義します。
<code class="haskell">
	x 演算子 y = 式
</code>
例えば、「^^^」で左右の数字の和の2乗を算出するように定義する場合は以下のように書きます。
<code class="haskell">
	x ^^^ y = (x + y) * (x + y)
</code>
「** 2」としていないのは整数として扱うためです。<br /><br />では実際に使用してみましょう♪
<code class="haskell">
	x ^^^ y = (x + y) * (x + y)

	main :: IO ()
	main = do
		print $ 2 ^^^ 3 -- 25
		print $ 2 ^^^ 5 -- 49
		print $ 5 ^^^ 5 -- 100
</code>
<h2>結合性宣言</h2>
結合の優先度と左右どちらに対して優先的に結合するかを宣言することを言います。<br /><br />例えば以下のコードを見てください。
<code class="haskell">
	x ^^^ y = -- 大きい方を返す
		if x < y then y
		else x

	x !!! y = -- 小さい方を返す
		if x < y then x
		else y

	main :: IO ()
	main = do
		print $ 3 ^^^ 2 !!! 1
		
	{- &darr; コンソール &darr;
	1
	-}
</code>
なぜ「1」となるか分かりますか???<br /><br />最初に「3」と「2」から大きい「3」を選択し、次に「3」と「1」から小さい方を選択しているため「2」が出力されます。<br /><br />しかしながら、最初に「2」と「1」から小さい方(「1」)を選択し、その次に「3」と「1」から大きい「3」を出力する必要があることもあります。<br /><br />これらは結合の優先度として設定します。<br /><br />結合の優先度は以下のように設定します。
<code class="haskell">
	infixl 優先度 演算子 -- (左結合)

	infixr 優先度 演算子 -- (右結合)
</code>
優先度は「0 ～ 9」の間で指定できます。<br />「9」が最も強くなります。<br /><br />では先ほどの演算子の優先度を変更してみましょう♪
<code class="haskell">
	x ^^^ y = -- 大きい方を返す
		if x < y then y
		else x

	x !!! y = -- 小さい方を返す
		if x < y then x
		else y

	infixl 1 ^^^
	infixl 9 !!!

	main :: IO ()
	main = do
		print $ 3 ^^^ 2 !!! 1
	
	{- &darr; コンソール &darr;
	3
	-}
</code>
<h2>中置・前置演算子</h2>
haskellでは演算子と関数の区別が薄く、演算子を関数として扱うことや関数を演算子として扱うことができます。
<h3>演算子 -&gt; 関数</h3>
正確には関数となるわけではなく前置演算子として扱うだけなのですが、関数とほとんど同じ働きをするためここでも演算子を関数として扱うと表記します。<br /><br />演算子を関数として扱うためには括弧で囲んで2つの引数の先頭に置きます。
<code class="haskell">
	main :: IO ()
	main = do
		print $ (+) 2 5 --- 7
		print $ (-) 8 5 --- 3
		print $ (*) 2 3 --- 6
		print $ (/) 7 2 --- 3.5
		print $ (**) 2 5 -- 32.0
</code>
<h3>関数 -&gt; 演算子</h3>
引数を2つ持つ関数は「`(バッククォート)」で囲むことで演算子として扱うことができます。<br />因みに「`mod`」や「`div`」などの演算子も実は引数を2つ持つ関数だったんです!!!
<code class="haskell">
	main :: IO ()
	main = do
		print $ mod 9 2
		print $ div 9 2
	
	{- &darr; コンソール &darr;
	1
	4
	-}
</code>
では、引数を2つとる関数を作成して演算子として扱ってみましょう♪<br />ここでは第一引数に半径、第二引数に円周率をとって円の面積を算出するget_area関数を作成して演算子として扱ってみましょう♪
<code class="haskell">
	get_aera n pai = n * n * pai

	main :: IO ()
	main = do
		print $ get_aera 5 3.14
		print $ 5 `get_aera` 3.14

	{- &darr; コンソール &darr;
	78.5
	78.5
	-}
</code>
<?php footer(); ?>