<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-14",
	"updated" => "2022-02-14"
);
head($obj);
?>
<h2>リスト</h2>
既に説明しましたね♪<br />覚えていますか???<br /><br />リストとは同一のデータ型の値を複数まとめて格納するためのデータ型です。
<img src="../pics/リスト.png" alt="リスト" />
以下のように作成します。
<code class="haskell">
	リスト :: [データ型]
	リスト = [要素1, 要素2, 要素3, ...]
</code>
また、リストのデータ型を特に指定しない場合は「a」とします。
<code class="haskell">
	リスト :: [a]
	リスト = [要素1, 要素2, 要素3, ...]
</code>
これはあくまでもリスト型である必要があるけれど、その中のデータ型は特に指定しない場合に使用します。
<h2>リスト内包表記</h2>
リストはその中身を自動で埋める内包表記が可能です。<br />例えば、「1, 2, 3, ..., 100」のリストを作成する際には全てを書く必要がなく、以下のように省略して書くことができます。
<code class="haskell">
	[1..100]
</code>
内包表記ではカウントダウンや奇数の連続など複雑なものも扱えます。
<code class="haskell">
	main :: IO ()
	main = do
		print [1..10]
		print [1, 3..25]
		print [99, 98..90]
		print [0, 10..100]
		print ['a'..'z']
		print ['-'..'@']

	{- &darr; コンソール &darr;
	[1,2,3,4,5,6,7,8,9,10]
	[1,3,5,7,9,11,13,15,17,19,21,23,25]
	[99,98,97,96,95,94,93,92,91,90]
	[0,10,20,30,40,50,60,70,80,90,100]
	'abcdefghijklmnopqrstuvwxyz'
	'-./0123456789:;<=>?@'
	-}
</code>
<div class="separator"></div>
「|(パイプ)」を用いて内包表記を展開して加工することができます。<br />以下のように書きます。
<code class="haskell">
	[処理 | 変数 &lt;- [内包表記]]
</code>
また、「,(カンマ)」の後にガードを設定することができます。
<code class="haskell">
	[処理 | 変数 &lt;- [内包表記], ガード]
</code>
では、これらを使用したプログラムを作成してみましょう♪
<code class="haskell">
	main :: IO ()
	main = do
		print [x * x | x &lt;- [1..5]] -- 1から5までの二乗の結果を表示
		print [x * x | x &lt;- [1..10], x `mod` 2 == 0] -- 1から10までの偶数の整数の二乗の結果を表示

	{- &darr; コンソール &darr;
	[1,4,9,16,25]
	[4,16,36,64,100]
	-}
</code>
<h2>リスト用の関数</h2>
リストに対して適用することを想定しているデフォルトの関数を紹介します。<br />以下の関数が該当します。
<ul>
	<li>length</li>
	<li>head</li>
	<li>last</li>
	<li>tail</li>
	<li>init</li>
	<li>reverse</li>
	<li>filter</li>
	<li>map</li>
</ul>
<h3>length</h3>
リストの要素の数を取得します。
<h3>!! n</h3>
リストのn番目の要素を取得します。
<h3>head</h3>
リストの先頭の要素を返します。
<h3>last</h3>
リストの最後の要素を返します。
<h3>init</h3>
リストの最後の要素を除いたものを返します。
<h3>tail</h3>
リストの先頭の要素を除いたものを返します。
<h3>reverse</h3>
リストを逆にしたものを返します。
<h3>filter</h3>
リストに条件をかけてその条件を満たすものだけを抽出して返します。
<h3>map</h3>
リストにある一定の処理をしてものを返します。
<div class="separator"></div>
<code class="haskell">
	x :: [Int]
	x = [1..10]

	main :: IO ()
	main = do
		print $ length x
		print $ x !! 3
		print $ head x
		print $ last x
		print $ init x
		print $ tail x
		print $ filter (< 5) x -- 5未満の要素だけを表示
		print $ map (* 2) x -- 要素を2倍にして表示

	{- &darr; コンソール &darr;
	10
	4
	1
	10
	[1,2,3,4,5,6,7,8,9]
	[2,3,4,5,6,7,8,9,10]
	[1,2,3,4]
	[2,4,6,8,10,12,14,16,18,20]
	-}
</code>
<h2>タプル</h2>
リストのデータ型が異なってもok!バージョンです。<br />これも既に説明済みです。<br /><br />複数のデータをまとめる目的で使用されるほか、パターンによる変数の束縛でも使用されます。<br />パターンによる変数の束縛とはタプル内でまとめて変数を宣言することを言います。
<code class="haskell">
	(hs, pai, ok) = ("haskell", 3.14, True)

	main :: IO ()
	main = do
		print hs
		print pai
		print ok

	{- &darr; コンソール &darr;
	'haskell'
	3.14
	True
	-}
</code>
また、変数にタプルそのものを拘束する場合は以下のように書きます。
<code class="haskell">
	変数 @ タプル
</code>
では上のコードでタプルそのものを変数に拘束してみましょう♪
<code class="haskell">
	tp@(hs, pai, ok) = ("haskell", 3.14, True)

	main :: IO ()
	main = do
		print hs
		print pai
		print ok
		print tp

	{- &darr; コンソール &darr;
	'haskell'
	3.14
	True
	('haskell',3.14,True)
	-}
</code>
<h2>リスト引数</h2>
後述しますが、haskellでは関数はデフォルトでカリー化されてひとつの関数は原則としてひとつだけ引数を持てます。<br />これがhaskellなどの関数型言語の醍醐味であって特に問題があるわけではありませんが、どうしても複数の引数をとりたい場合があります。<br />このような場合は複数の引数をタプルを用いてひとつの値としてして扱い、引数に渡します。<br /><br />関数に関しては後ほど説明するのでスルーして下さい。<br />ここでは複数の値をタプルとしてまとめてひとつの値として扱っていることに着目してください。
<code class="haskell">
	fx (x, y, z) = x * y * z

	main :: IO ()
	main = do
		print $ fx (2, 5, 3)
</code>
これに関してはカリー化をすればいいのでタプルを使用する意味あありませんが、、、
<?php footer(); ?>