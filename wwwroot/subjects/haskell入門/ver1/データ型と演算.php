<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-14",
	"updated" => "2022-02-14"
);
head($obj);
?>
<h2>データ型(単独型)</h2>
haskellでは変数への値の拘束時に自動で型が推論されるため、変数の拘束に関してはデータ型について意識する必要はありません。<br />しかしながら、変数に関してデータ型を明示的に指定することもできます。<br />明示的にデータ型を指定する目的としては変数に対する処理を明確にすることや複数の推論可能なデータ型からひとつのデータ型を指定することがあげられます。<br />変数のデータ型を指定するには以下のように書きます。
<code class="haskell">
	変数 :: データ型
</code>
データ型には以下のものがあります。
<table>
	<caption>データ型(単独型)</caption>
	<tbody>
		<tr>
			<th>Int</th>
			<td>固定精度整数型で、比較的小さな整数(約±2<sup>31</sup>)までの整数であればこれを使用します。<br />「10」「25」「-99」のように整数をそのまま書きます。</td>
		</tr>
		<tr>
			<th>Integer</th>
			<td>多倍長整数型で、Intよりも大きい整数を表すのにはこちらを使用します。<br />「10」「25」「-99」のように整数をそのまま書きます。</td>
		</tr>
		<tr>
			<th>Float</th>
			<td>単精度浮動小数点数型で、比較的小さな小数(32ビット)を格納するためのデータ型です。<br />「10.25」「25.01」「-99.9」のように整数をそのまま書きます。</td>
		</tr>
		<tr>
			<th>Double</th>
			<td>倍精度浮動小数点数型で、比較的大きな小数(64ビット)を格納するためのデータ型です。<br />「10.25」「25.01」「-99.9」のように整数をそのまま書きます。</td>
		</tr>
		<tr>
			<th>Char</th>
			<td>文字型で、ユニコード文字1文字を格納するために使用されます。<br />「'A'」「'あ'」「'桜'」のように「'(シングルクォーテーション)」で囲んで表記します。</td>
		</tr>
		<tr>
			<th>String</th>
			<td>文字列型で、文字型のデータの連続を格納するために使用されます。<br />「"りんご"」「"Apple"」のように「"(ダブルクォーテーション)」で囲んで表記します。</td>
		</tr>
		<tr>
			<th>Bool</th>
			<td>真偽値型で、真を「True」、偽を「False」とします。</td>
		</tr>
	</tbody>
</table>
整数を表すのにInt型とInteger型の2種類がありますね、、、<br />さらには整数も小数として表すことも可能です、、、<br />データ型を推論させた場合はどれが採用されるのでしょうか???<br /><br />答えは微妙です。<br />haskellでは複数のデータ型制約を持つ多重定義型とみなされます。<br />あるデータ型の変数を作成したい場合は明示的に指定してください。
<code class="haskell">
	n :: Float -- nを浮動小数点数型として宣言
	n = 3 -- nに3を拘束

	main = do 
		print n

	{- &darr; コンソール &darr;
	3.0
	-}
</code>
<h2>データ型(複合型)</h2>
haskellでは複合型のデータ型として以下の2つがあります。
<ul>
	<li>リスト型</li>
	<li>タプル型</li>
</ul>
<h3>リスト型</h3>
同じデータ型の値を複数個格納するためのデータ型です。<br />配列型と異なり、各要素の最後に次の要素へのポインタが格納されて、それを辿ることで要素を管理します。<br />したがって、配列と異なりn番目の要素へのアクセスに時間がかかります。
<img src="../pics/リスト.png" alt="リスト" />
「[](スクエアブラケット)」を使用して要素を「,(カンマ)」で区切って表します。
<code class="haskell">
	pokemon = ["フシギバナ", "ヒトカゲ", "ゼニガメ", "ピカチュウ"]
</code>
<code class="haskell">
	lang = ["haskell", "rust", "go", "c/c++", "fortran"]

	main = do
		print lang

	{- &darr; コンソール &darr;
	['haskell','rust','go','c/c++','fortran']
	-}
</code>
また、配列の要素のデータ型を指定する際には以下のように書きます。
<code class="haskell">
	[要素1, 要素2, 要素3, ...]::[データ型]
</code>
先ほどのコードをデータ型を指定して書き換えると以下のようになります。
<code class="haskell">
	lang = ["haskell", "rust", "go", "c/c++", "fortran"]::[String]

	main = do
		print lang

	{- &darr; コンソール &darr;
	['haskell','rust','go','c/c++','fortran']
	-}
</code>
<h3>タプル型</h3>
有限個の要素の組を表します。<br />要素のデータ型は異なってもok!です。<br />括弧を用いて要素を「,(カンマ)」で区切って表します。
<code class="haskell">
	hs = ("haskell", 1990, True)

	main = do
		print hs

	{- &darr; コンソール &darr;
	('haskell',1990,True)
	-}
</code>
データ型を指定する場合には以下のように書きます。
<code class="haskell">
	(要素1, 要素2, 要素3, ...)::(要素1のデータ型, 要素2のデータ型, 要素3のデータ型, ...)
</code>
先ほどのコードをデータ型を指定して書き換えてみましょう♪
<code class="haskell">
	hs = ("haskell", 1990, True)::(String, Integer, Bool)

	main = do
		print hs

	{- &darr; コンソール &darr;
	('haskell',1990,True)
	-}
</code>
<h2>演算</h2>
<h3>算術演算</h3>
<table>
	<caption>算術演算</caption>
	<tbody>
		<tr>
			<th>+</th>
			<td>足し算です。<br />「10 + 25」は「35」、「9 + 9」は「18」となります。</td>
		</tr>
		<tr>
			<th>-</th>
			<td>引き算です。<br />「25 - 10」は「15」、「10 - 25」は「-15」となります。</td>
		</tr>
		<tr>
			<th>*</th>
			<td>掛け算です。<br />「5 * 2」は「10」、「-2 * 10」は「-20」となります。</td>
		</tr>
		<tr>
			<th>/</th>
			<td>割り算です。<br />「5 / 2」は「2.5」、「7 / 2」は「3.5」となります。</td>
		</tr>
		<tr>
			<th>`div`</th>
			<td>割り算の商です。<br />「5 `div` 2」は「2」、「17 `div` 3」は「5」となります。</td>
		</tr>
		<tr>
			<th>`mod`</th>
			<td>割り算の余りを求めます。<br />「5 `mod` 2」は「1」、「10 `mod` 7」は「3」となります。</td>
		</tr>
		<tr>
			<th>**</th>
			<td>べき乗を求めます。<br />「3 ** 2」は「9」、「5 ** 2」は「25」となります。</td>
		</tr>
	</tbody>
</table>
<code class="haskell">
	main = do
		print (2 + 5) -- 7
		print (2 - 5) -- -3
		print (15 * 4) -- 60
		print (15 / 4) -- 3.75
		print (17 `div` 3) -- 5
		print (15 `mod` 4) -- 3
		print (2 ** 5) -- 32.0
</code>
また、数字型同士でもデータ型が異なれば演算できません。
<code class="haskell">
	{- コンパイルエラー -}

	x :: Int
	y :: Integer

	x = 10
	y = 25

	main :: IO ()
	main = do
		print (x + y)

	{- &darr; コンソール &darr;
	Couldn't match expected type ‘Int’ with actual type ‘Integer’
	-}
</code>
Int型とInteger型の演算やInt型とFloat型の演算ではデータ型を変換してから演算をする必要があります。<br /><br />型変換については後ほど説明します。
<h3>比較演算</h3>
<table>
	<caption>比較演算</caption>
	<tbody>
		<tr>
			<th>&lt;</th>
			<td>「小なり」<br />右の数字が左の数字よりも(同じを含まない)大きければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&lt;=</th>
			<td>「小なりイコール」<br />右の数字が左の数字以上(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;</th>
			<td>「大なり」<br />右の数字が左の数字よりも(同じを含まない)小さければ「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>&gt;=</th>
			<td>「大なりイコール」<br />右の数字が左の数字以下(同じを含む)であれば「真」、それ以外は「偽」となります。</td>
		</tr>
		<tr>
			<th>==</th>
			<td>「イコール(等価演算)」<br />左と右のデータ同じであれば「True」、異なれば「False」となります。<br />左と右のデータの型は同じである必要があります。</td>
		</tr>
		<tr>
			<th>/=</th>
			<td>「ノットイコール(等価演算)」<br />「==」の結果を反転したものです。</td>
		</tr>
	</tbody>
</table>
<code class="haskell">
	main = do
		print (1 <= 1) -- True
		print (1 < 1) -- False
		print (5 == 10) -- False
		print (5 /= 10) -- True
</code>
<h3>論理演算</h3>
<table>
	<caption>論理演算</caption>
	<thead>
		<tr>
			<th>かつ</th>
			<th>または</th>
		</tr>
		<tr>
			<th>&amp;&amp;</th>
			<th>||</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>2つの条件式の両方が「真」の場合に「真」、どちらか一方でも「偽」の場合は「偽」となります。</td>
			<td>2つの条件式のいずれか一方でも「真」の場合に「真」、両方とも「偽」の場合は「偽」となります。</td>
		</tr>
	</tbody>
</table>
また、真偽値を判定させる演算として否定演算(not)があります。
<code class="haskell">
	main = do
		print (True && True) -- True
		print (True && False) -- False
		print (True || False) -- True
		print (False || False) -- False
		print (True) -- True
		print (not False) -- True
</code>
<h3>文字列の結合</h3>
haskellで文字列を結合するには「++」を使用します。
<code class="haskell">
	main = do
		let h = "has"
		let k = "kell"
		putStr (h ++ k)
	
	{- &darr; コンソール &darr;
	haskell
	-}
</code>
<h2>型変換</h2>
<h3>整数と整数(小数)</h3>
整数同士(IntとInteger)や整数(IntやInteger)と小数(FloatやDouble)の演算ではfromIntegral関数を使ってNum型に変換してから計算します。<br />Num型とはInteger・Int・Float・Double型全てに対応できる型だと思って下さい。<br /><br />型が異なる整数型同士の演算ではどちらをNum型に変換してもok!です。
<code class="haskell">
	x :: Int
	y :: Integer

	x = 10
	y = 25

	main :: IO ()
	main = do
		print ((fromIntegral (x)) + y)
		print (x + (fromIntegral (y)))

	{- &darr; コンソール &darr;
	35
	35
	-}
</code>
整数型と小数型の演算では整数型の値をNum型に変換してから演算をします。
<code class="haskell">
	x :: Int
	y :: Float

	x = 10
	y = 25.55

	main :: IO ()
	main = do
		print ((fromIntegral (x)) + y)

	{- &darr; コンソール &darr;
	35.55
	-}
</code>
<h3>小数同士</h3>
小数型同士(FloatとDouble)の演算ではrealToFrac関数を使用してFractional型に変換してから演算をします。<br />Fractional型とはFloatとDobleのどちらにも対応できる型だと思って下さい。
<code class="haskell">
	x :: Float
	y :: Double

	x = 10.25
	y = 25.55

	main :: IO ()
	main = do
		print ((realToFrac (x)) + y)
		print (x + realToFrac (y))

	{- &darr; コンソール &darr;
	35.88
	35.88
	-}
</code>
<h3>文字列型から数字型へ</h3>
文字列型から数字型へ変換するには以下のように書きます。
<code class="haskell">
	read 文字列 :: 数字型
</code>
例えば、「"10"」と「"12.345"」をそれぞれInt型とFloat型に変換してから和を求めるには以下のように書きます。
<code class="haskell">
	s1 = "10"
	s2 = "12.345"

	n1 = read s1 :: Int
	n2 = read s2 :: Float

	main :: IO ()
	main = do
		print (fromIntegral (n1) + n2)

	{- &darr; コンソール &darr;
	22.345001
	-}
</code>
<h3>数字型から文字列型へ</h3>
今度は逆に数字型の値を文字列型に変換してみましょう♪<br />以下のように書きます。
<code class="haskell">
	show 数字型
</code>
では、先ほどの逆の処理をしてみましょう♪
<code class="haskell">
	n1 = 10
	n2 = 12.345

	s1 = show n1
	s2 = show n2

	main :: IO ()
	main = do
		print (s1 ++ s2)

	{- &darr; コンソール &darr;
	'1012.345'
	-}
</code>
文字列として連結されましたね♪
<?php footer(); ?>