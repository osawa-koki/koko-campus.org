<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<h2>display</h2>
要素をどのように表示するかを設定します。<br />表示の方法にはインラインとブロックの2つがあります。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">インライン</td>
			<td width="50%">ブロック</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>主にテキストの一部をタグで囲むことを目的とします。</td>
			<td>要素の集合をタグで囲むことを目的とします。</td>
		</tr>
		<tr>
			<td>
				高さやは中身のテキストに依存するため、設定不可。<br />(height・padding-top・padding-bottom・margin-top・margin-bottomは使用不可)
				<p class="r">
					設定することは可能ですがレイアウトが崩れるため、通常は使用しません。
				</p>
			</td>
			<td>高さや幅を独自に設定可能</td>
		</tr>
		<tr>
			<td>親要素に「text-align: center」を設定することを中央に配置可能</td>
			<td>自身に「margin-right: auto」「margin-left: auto」を設定することで中央に配置可能</td>
		</tr>
	</tbody>
</table>
<br />
<p class="r"><a href="https://developer.mozilla.org/en-US/docs/Web/CSS/display/two-value_syntax_of_display">MDNのサイト</a>では、「CSS Display Module Level 3 describes the two-value syntax for the display property.」とあり、displayプロパティに対して要素の外部と内部の両方の表示方法を示すことが可能ですが、ここでは要素の外部(要素自体)の表示に関して設定します。</p>
<p>「inline-block」に関してはここでは説明しません。</p>
<p>「display: none」に設定すれば要素を非表示にできます。</p>
<h3>インライン</h3>
テキストの一部を装飾する際に使用します。<br />主に「span」タグが用いられます。
<code class="html">
	&lt;p&gt;
		&lt;span class="machigatteru"&gt;間違ってるんだよ。&lt;/span&gt;わかってないよ、あんたら人間も。
		本当も愛も世界も苦しさも人生もどうでもいいよ。
		正しいかどうか知りたいのだって防衛本能だ。
		考えたんだ。あんたのせいだ。
	&lt;/p&gt;
	&lt;!--「ヨルシカ – だから僕は音楽を辞めた」より--&gt;
</code>
<code class="css">
	.machigatteru {
		font-size: 16px; /*フォントサイズを大きく*/
		font-weight: bold; /*フォントを濃く*/
	}
</code>
<div class="result">
	<p class="x">
		<span class="machigatteru">間違ってるんだよ。</span>わかってないよ、あんたら人間も。
		本当も愛も世界も苦しさも人生もどうでもいいよ。
		正しいかどうか知りたいのだって防衛本能だ。
		考えたんだ。あんたのせいだ。
	</p>
	<!--「ヨルシカ – だから僕は音楽を辞めた」より-->
</div>
インライン要素に関して高さ指定(height・padding-top・padding-bottom・margin-top・margin-bottom)を行うとレイアウトか崩れるため、原則として行いません。
<code class="html">
	&lt;p&gt;
		&lt;span class="machigatteru"&gt;間違ってるんだよ。&lt;/span&gt;わかってないよ、あんたら人間も。
		本当も愛も世界も苦しさも人生もどうでもいいよ。
		正しいかどうか知りたいのだって防衛本能だ。
		考えたんだ。あんたのせいだ。
	&lt;/p&gt;
	&lt;!--「ヨルシカ – だから僕は音楽を辞めた」より--&gt;
</code>
<code class="css">
	.machigatteru2 {
		font-size: 16px;
		font-weight: bold;
		padding: 5px;
		margin: 5px;
		background-color: #CCCCCC; /*見やすさの観点から背景色を設定*/
	}
</code>
<div class="result">
	<p class="x">
		<span class="machigatteru2">間違ってるんだよ。</span>わかってないよ、あんたら人間も。
		本当も愛も世界も苦しさも人生もどうでもいいよ。
		正しいかどうか知りたいのだって防衛本能だ。
		考えたんだ。あんたのせいだ。
	</p>
	<!--「ヨルシカ – だから僕は音楽を辞めた」より-->
</div>
幅に関しては設定可能ですが、インライン要素はあくまでもテキストを囲むことが目的であり、レイアウトは調整すべきではないと考えてください。
<h3>ブロック</h3>
なんらかの要素の集まりであるブロックを形成するためのタグを紹介します。<br />あくまでもブロックを形成することを目的とするため、表示上は特に変化ありません。<br />後ほど学習するcssでレイアウトを調整するために用います。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>「header」タグ</th>
			<td>ページ上部のヘッダー部分を作成するタグです。<br />「head」タグと異なることに注意してください。</td>
		</tr>
		<tr>
			<th>「main」タグ</th>
			<td>ページのメインの部分を作成するタグです。</td>
		</tr>
		<tr>
			<th>「aside」タグ</th>
			<td>「main」タグに対して、補足情報などの部分を作成するタグです。</td>
		</tr>
		<tr>
			<th>「section」タグ</th>
			<td>セクション(まとまり)を作成するためのタグです。</td>
		</tr>
		<tr>
			<th>「footer」タグ</th>
			<td>ページ下部のフッター部分を作成するタグです。<br />「header」タグの下バージョンです。</td>
		</tr>
		<tr>
			<th>「div」タグ</th>
			<td>特に意味のないブロック要素を作成するタグです。</td>
		</tr>
	</tbody>
</table>
<br />
cssレイアウトでは主にこのブロック要素に関して表示上の設定をします。<br /><br />ページの本体のレイアウト調整では「div」タグが用いられることがほとんどです。<br />下に任天堂のホームページを紹介します。<br />「div」タグが多用されていることを確認できると思います。
<img src="../pics/div.png" alt="divタグの画像" />
全て「div」タグを用いてレイアウトを調整してもok!ですが、SEOの観点から適切なタグを用いることをオススメします。
<code class="html">
	&lt;div class="left-div"&gt;
		あのね、私実は気付いてるの。ほら、君がいったこと。
	&lt;/div&gt;
	&lt;div class="center-div"&gt;
		あまり考えたいと思えなくて。忘れてたんだけど。
	&lt;/div&gt;
	&lt;div class="right-div"&gt;
		盲目的に盲動的に妄想的に生きて。衝動的な焦燥的な、消極的なままじゃ駄目だったんだ。
	&lt;/div&gt;
	&lt;!--「言って。 – ヨルシカ」より--&gt;
</code>
<code class="css">
	div {
		padding: 25px;
		border: 1px solid black;
		background-color: lightyellow;
	}
	.left-div {
		width: 150px;
		text-align: left;
		margin: 25px;
	}
	.center-div {
		width: 80%;
		text-align: center;
		margin: 25px auto;
	}
	.right-div {
		width: 250px;
		margin: 25px 0;
		textalign: left;
	}
</code>
<div class="result divs">
	<div class="left-div">
		あのね、私実は気付いてるの。ほら、君がいったこと。
	</div>
	<div class="center-div">
		あまり考えたいと思えなくて。忘れてたんだけど。
	</div>
	<div class="right-div">
		盲目的に盲動的に妄想的に生きて。衝動的な焦燥的な、消極的なままじゃ駄目だったんだ。
	</div>
	<!--「言って。 – ヨルシカ」より-->
</div>
<h2>position</h2>
要素をどこに配置するかです。<br />デフォルトは「static」に設定されていて、上から順に良い感じに配置されます。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>static</th>
			<td>要素が重ならないように上から順に配置していきます。</td>
		</tr>
		<tr>
			<th>relative</th>
			<td>staticで配置される予定だった場所を基準として相対位置で指定します。</td>
		</tr>
		<tr>
			<th>absolute</th>
			<td>「position: relative」が設定されている親要素を基準に指定します。</td>
		</tr>
		<tr>
			<th>fixed</th>
			<td>画面全体を基準とした表示位置を指定します。</td>
		</tr>
	</tbody>
</table>
<br />
「static」以外を選択した場合は、基準となる要素に対して「top」「right」「bottom」「left」を指定して配置場所を設定します。<br /><br />また、この際に要素が重なる場合にはその重なりの順番を「z-index」を用いて設定します。<br />「z-index」の値には整数を指定し、その値が大きい方が上に表示されます。
<h3>relative</h3>
僕がこれを用いる場合は以下の2つです。
<br />
<ul>
	<li>absoluteの親として設定</li>
	<li>box-shadow調整用</li>
</ul>
<br />
<h4>absoluteの親として設定</h4>
子要素を「absolute」として親要素からの絶対位置で表示場所をしていする際にはその親要素のに対して「position: relative」を設定する必要があります。<br />「position: relative」を設定された親要素の表示位置は変更されません。
<h4>box-shadow調整用</h4>
ボタンなどでマウスのカーソルがのっている際に若干そのボタンをへこませるように表示するデザインで用います。<br />例えば以下のボタンにマウスのカーソルを合わせてみてください。
<p class="r">パソコン用です。</p>
<div id="button-x">
	ここにカーソルを!!
</div>
これを再現しようとすると疑似要素の知識が必要になるのでここではしません。<br />また後ほど説明します。
<h3>absolute</h3>
親要素内での絶対位置を指定します。<br />詳細な表示に関する指定をする際に行われます。
<code class="html">
	&lt;!--左上に表示される「html」という文字を親要素からの絶対位置(「position: absolute」「top: 0px」「left: 0px」)で指定している--&gt;
</code>
<h3>fixed</h3>
画面(スクリーン)を基準として表示位置を指定します。<br />画面の一番上に固定して表示している「ロゴ」「html&css入門」の部分が「position: fixed」で指定されています。
<?php footer(); ?>