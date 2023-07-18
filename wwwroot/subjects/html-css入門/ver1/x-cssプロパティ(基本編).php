<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<h2>font-size</h2>
では実際にhtml要素にスタイルを適用させてみましょう♪<br />まずは、フォントのサイズを変更します。
<code class="html">
	&lt;p&gt;過ぎてゆく時間の中。あなたを思い出す。物憂げに眺める画面に映った二人。笑っていた。&lt;/p&gt;
	&lt;p&gt;知りたくないほど。知りすぎてくこと。ただ過ぎる日々に呑み込まれたの。それでもただもう一度だけ会いたくて。&lt;/p&gt;
	&lt;p class="sabi"&gt;あなたの言葉に頷き信じた私を。一人置き去りに時間は過ぎる。見えていたはずの未来も指の隙間をすり抜けた。&lt;/p&gt;
	&lt;p class="sabi"&gt;戻れない日々の欠片とあなたの気配を。今でも探してしまうよ。まだあの日の二人に手を伸ばしてる。&lt;/p&gt;
	&lt;!--「YOASOBI – ハルジオン」より--&gt;
</code>
<code class="css">
	.sabi {
		font-size: 20px;
	}
</code>
<div class="result">
	<p class="x">過ぎてゆく時間の中。あなたを思い出す。物憂げに眺める画面に映った二人。笑っていた。</p>
	<p class="x">知りたくないほど。知りすぎてくこと。ただ過ぎる日々に呑み込まれたの。それでもただもう一度だけ会いたくて。</p>
	<p class="x sabi">あなたの言葉に頷き信じた私を。一人置き去りに時間は過ぎる。見えていたはずの未来も指の隙間をすり抜けた。</p>
	<p class="x sabi">戻れない日々の欠片とあなたの気配を。今でも探してしまうよ。まだあの日の二人に手を伸ばしてる。</p>
	<!--「YOASOBI – ハルジオン」より-->
</div>
<h3>サイズ単位</h3>
cssで使用可能なサイズの単位には以下のものがあります。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>px</th>
			<td>ピクセル(画面表示上の最小単位)で指定します。<br />文字はデフォルトでは「16px」に設定されています。</td>
		</tr>
		<tr>
			<th>rem</th>
			<td>ルート要素(「html」要素)に指定された要素の何倍かを指定します。</td>
		</tr>
		<tr>
			<th>%</th>
			<td>親要素のサイズの何%かを指定します。</td>
		</tr>
		<tr>
			<th>vw</th>
			<td>ビューポート(画面の表示幅)の何%かを指定します。</td>
		</tr>
	</tbody>
</table>
<br />
当然目的に合って使い分けるべきですが、あくまでも参考までに僕の使い分け方を紹介します。<br /><br />僕は、テキストの文字サイズを指定する際には「rem」を原則として用いて、ボタンの中などの固定サイズブロックの中の文字は「px」で指定しています。<br /><br />理由はユーザビリティの観点から最近ではブラウザでルート要素のフォントサイズを変更可能になっていることが多いです。<br />「rem」を用いればこれに連動して文字サイズが変更されるためユーザにとって見やすいサイトになります。<br />しかしながら、ボタンなどの固定サイズのブロック内の文字をこれに連動させて変更するとボタン内も文字がボタンからはみ出たりしてしまうため、こういう場合には「px」で絶対値を指定します。
<h2>font-family</h2>
フォントの種類を指定します。<br />font-faceを使用しない限り、OSに標準で搭載されているフォントしか使用できません。<br /><br />指定したフォントがOSにインストールされていない場合は代替のフォントで表示されます。<br />通常はこういったケースを想定して複数のフォントを指定しておくことが多いです。<br />複数のフォントを設定する際には「,(カンマ)」で区切って指定します。<br />複数のフォントが指定された場合には前に書かれたフォントの優先度が高くなります。<br /><br />僕はコードの部分は「consolas」というフォントで表示し、それ以外の部分は設定せずブラウザに委ねています。
<code class="html">
	&lt;p class="consolas"&gt;consolas&lt;/p&gt;
	&lt;p class="gothic"&gt;MS P ゴシック&lt;/p&gt;
	&lt;p class="meiryo"&gt;メイリオ&lt;/p&gt;
	&lt;p class="century"&gt;Century&lt;/p&gt;
	&lt;p class="arial"&gt;arial&lt;/p&gt;
</code>
<code class="css">
	.consolas {
		font-family: "consolas";
	}
	.gothic {
		font-famiily: "MS P ゴシック";
	}
	.meiryo {
		font-family: "Meiryo";
	}
	.century {
		font-family: "Century";
	}
	.arial {
		font-family: "arial";
	}
</code>
<div class="result">
	<p class="consolas x">consolas</p>
	<p class="gothic x">MS P ゴシック</p>
	<p class="meiryo x">メイリオ</p>
	<p class="century x">Century</p>
	<p class="arial x">arial</p>
</div>
僕は「consolas」フォントが大好きです。<br />迷ったら「consolas」を選択しましょう♪
<h2>font-weight</h2>
フォントの太さを指定します。<br />「100」から「1000」までの数字で指定することも可能ですが、フォントによっては詳細に指定できない場合もあるので「bold(太い)」「normal(普通)」「細い(thin)」で指定することをオススメします。
<p class="r">thinはほとんど使わず、フォントのサイズを小さくすることが多いです。</p>
<code class="html">
	&lt;p class="bold"&gt;太め&lt;/p&gt;
	&lt;p class="normal"&gt;普通&lt;/p&gt;
	&lt;p class="thin"&gt;細め&lt;/p&gt;
</code>
<code class="css">
	.bold {
		font-weight: bold;
	}
	.normal {
		font-weight: normal;
	}
	.thin {
		font-weight: light;
	}
</code>
<div class="result">
	<p class="bold x">太め</p>
	<p class="normal x">普通</p>
	<p class="thin x">細め</p>
</div>
<p class="r">普通と細めが同じ幅で表示されることが多いです。</p>
<h2>letter-spacing</h2>
文字の間隔を指定します。<br />普通は「0px」か「1px」のどちらかです。
<code class="html">
	&lt;p class="letter-spacing_0px"&gt;間隔は0pxです。&lt;/p&gt;
	&lt;p class="letter-spacing_1px"&gt;間隔は1pxです。&lt;/p&gt;
	&lt;p class="letter-spacing_2px"&gt;間隔は2pxです。&lt;/p&gt;
	&lt;p class="letter-spacing_3px"&gt;間隔は3pxです。&lt;/p&gt;
	&lt;p class="letter-spacing_10px"&gt;間隔は10pxです。&lt;/p&gt;
</code>
<code class="css">
	.letter-spacing_0px {
		letter-spacing: 0px;
	}
	.letter-spacing_1px {
		letter-spacing: 1px;
	}
	.letter-spacing_2px {
		letter-spacing: 2px;
	}
	.letter-spacing_3px {
		letter-spacing: 3px;
	}
	.letter-spacing_10px {
		letter-spacing: 10px;
	}
</code>
<div class="result">
	<p class="letter-spacing_0px x">間隔は0pxです。</p>
	<p class="letter-spacing_1px x">間隔は1pxです。</p>
	<p class="letter-spacing_2px x">間隔は2pxです。</p>
	<p class="letter-spacing_3px x">間隔は3pxです。</p>
	<p class="letter-spacing_10px x">間隔は10pxです。</p>
</div>
<h2>line-height</h2>
行間の高さを指定します。
<code class="html">
	&lt;p class="line-height_16px x"&gt;行間の高さは&lt;br /&gt;0pxです。&lt;/p&gt;
	&lt;p class="line-height_17px x"&gt;行間の高さは&lt;br /&gt;1pxです。&lt;/p&gt;
	&lt;p class="line-height_18px x"&gt;行間の高さは&lt;br /&gt;2pxです。&lt;/p&gt;
	&lt;p class="line-height_20px x"&gt;行間の高さは&lt;br /&gt;3pxです。&lt;/p&gt;
	&lt;p class="line-height_25px x"&gt;行間の高さは&lt;br /&gt;10pxです。&lt;/p&gt;
</code>
<code class="css">
	p {
		font-size: 16px;
	}
	.line-height_16px {
		line-height: 16px;
	}
	.line-height_17px {
		line-height: 17px;
	}
	.line-height_18px {
		line-height: 18px;
	}
	.line-height_20px {
		line-height: 20px;
	}
	.line-height_25px {
		line-height: 25px;
	}
</code>
<div class="result border-bottom_div">
	<p class="line-height_16px x">行間の高さは<br />16pxです。</p>
	<p class="line-height_17px x">行間の高さは<br />17pxです。</p>
	<p class="line-height_18px x">行間の高さは<br />18pxです。</p>
	<p class="line-height_20px x">行間の高さは<br />20pxです。</p>
	<p class="line-height_25px x">行間の高さは<br />25pxです。</p>
</div>
<p class="r">見やすさのため、各「p」要素の終わりに傍線を加えています。</p>
<h2>text-align</h2>
文字の左右のどちらに揃えるかを指定します。<br />少し複雑なのですが、あくまでも中身がテキストの場合にのみ有効であって中身が「div」などのブロック要素の場合は適用されません。
<p class="r">正確にはテキストだけでなくインライン要素全てが対象なのですが複雑になるため、ここではテキストと表記します。</p>
<code class="html">
	&lt;p class="left"&gt;左寄せ&lt;/p&gt;
	&lt;p class="center"&gt;中央寄せ&lt;/p&gt;
	&lt;p class="right"&gt;右寄せ&lt;/p&gt;
</code>
<code class="css">
	.left {
		text-align: left;
	}
	.center {
		text-align: center;
	}
	.right {
		text-align: right;
	}
</code>
<div class="result border-bottom_div">
	<p class="left x">左寄せ</p>
	<p class="center x">中央寄せ</p>
	<p class="right x">右寄せ</p>
</div>
<p class="r">見やすさのため、各「p」要素の終わりに傍線を加えています。</p>
<h2>color</h2>
フォントの色を指定します。<br /><br />色の指定方法には主に以下の3通りあります。
<br />
<ul>
	<li>名前で指定</li>
	<li>16進数表記で指定</li>
	<li>rgba表記で指定</li>
</ul>
<br />
名前で指定する方法では、「red」「blue」「green」って感じで指定します。<br />とても簡単で分かりやすいのでこれで指定できる場合はこの方法で指定しましょう♪<br /><br />16進数で指定する方法は「#00FFFF」「#CCCC99」って感じで指定しますが複雑なのでオススメしません。<br /><br />rgbaで指定する方法ではr(red:赤)とg(green:緑)とb(blue:青)とa(alpha:透明度)の割合で色を指定します。<br />簡単かつ詳細に設定できるため、名前で指定できない場合にオススメします。<br />rgbaで指定する方法に関して、ちょっとしたサイトを開設したので良かったら是非訪れてください。<br />サイトは<a href="https://koko-campus.org/program/イロイロ/branch">こちら</a>。


<code class="html">
	&lt;p class="red"&gt;red&lt;/p&gt;
	&lt;p class="fuchsia"&gt;fuchsia&lt;/p&gt;
	&lt;p class="CC66FF"&gt;#CC66FF&lt;/p&gt;
	&lt;p class="rgba_135-235-225-90"&gt;rgba(135, 235, 225, 0.9)&lt;/p&gt;
</code>
<code class="css">
	.red {
		color: red;
	}
	.fuchsia {
		color: fuchsia;
	}
	.CC66FF {
		color: #CC66FF;
	}
	.rgba_135-235-225-90 {
		color: rgba(135, 235, 225, 0.9);
	}
</code>
<div class="result">
	<p class="red x">red</p>
	<p class="fuchsia x">fuchsia</p>
	<p class="CC66FF x">#CC66FF</p>
	<p class="rgba_135-235-225-90 x">rgba(135, 235, 225, 0.9)</p>
</div>
<h2>background-color</h2>
「color」が文字色を指定するのに対して、「background-color」では背景色を指定します。
<code class="html">
	&lt;p class="bg-red"&gt;red&lt;/p&gt;
	&lt;p class="bg-fuchsia"&gt;fuchsia&lt;/p&gt;
	&lt;p class="bg-CC66FF"&gt;#CC66FF&lt;/p&gt;
	&lt;p class="bg-rgba_135-235-225-90"&gt;rgba(135, 235, 225, 0.9)&lt;/p&gt;
</code>
<code class="css">
	.bg-red {
		background-color: red;
	}
	.bg-fuchsia {
		background-color: fuchsia;
	}
	.bg-CC66FF {
		background-color: #CC66FF;
	}
	.bg-rgba_135-235-225-90 {
		background-color: rgba(135, 235, 225, 0.9);
	}
</code>
<div class="result">
	<p class="bg-red x">red</p>
	<p class="bg-fuchsia x">fuchsia</p>
	<p class="bg-CC66FF x">#CC66FF</p>
	<p class="bg-rgba_135-235-225-90 x">rgba(135, 235, 225, 0.9)</p>
</div>
<h2>background-image</h2>
上では背景を単純な色で設定しましたが、背景に画像を設定することも可能です。<br />「url(画像へのパス)」で指定します。
<code class="html">
	&lt;p class="bg-cherry"&gt;この「p」タグでは&lt;br /&gt;背景画像に&lt;br /&gt;桜の画像を&lt;br /&gt;設定しています。&lt;/p&gt;
</code>
<code class="css">
	.bg-cherry {
		background-image: url(https://koko-campus.org/pics/cherry-bg.png);
	}
</code>
<div class="result">
	<p class="bg-cherry x">この「p」タグでは<br />背景画像に<br />桜の画像を<br />設定しています。</p>
</div>
<h3>background-repeat</h3>
背景画像が指定した要素より小さい場合にそれを繰り返して指定した要素全体に表示するかどうかを設定します。<br />デフォルトでは指定した要素を覆うように繰り返されますが、これを繰り返さないように設定できます。<br />両方向に繰り返す場合には何も指定しないか「repeat」と指定、x方向(横方向)にのみ繰り返す場合には「repeat-x」と指定、y方向(縦方向)にのみ繰り返す場合には「repeat-y」と指定、繰り返さない場合には「no-repeat」と指定します。
<code class="html">
	&lt;p class="bg_repeat-both"&gt;この「p」要素は&lt;br /&gt;背景画像を&lt;br /&gt;繰り返して&lt;br /&gt;表示しています。&lt;br /&gt;(デフォルト)&lt;/p&gt;
	&lt;p class="bg_repeat-x"&gt;この「p」要素は&lt;br /&gt;背景画像を&lt;br /&gt;x方向(横方向)にのみ繰り返して&lt;br /&gt;表示しています。&lt;/p&gt;
	&lt;p class="bg_repeat-y"&gt;この「p」要素は&lt;br /&gt;背景画像を&lt;br /&gt;y方向(縦方向)にのみ繰り返して&lt;br /&gt;表示しています。&lt;/p&gt;
	&lt;p class="bg_repeat-no"&gt;この「p」要素は&lt;br /&gt;背景画像を&lt;br /&gt;繰り返しません。&lt;/p&gt;
</code>
<code class="css">
	.bg_repeat-both {
		background-repeat: repeat;
	}
	.bg_repeat-x {
		background-repeat: repeat-x;
	}
	.bg_repeat-y {
		background-repeat: repeat-y;
	}
	.bg_repeat-no {
		background-repeat: no-repeat;
	}
</code>
<div class="result on-bg">
	<p class="bg_repeat-both x">この「p」要素は<br />背景画像を<br />繰り返して<br />表示しています。<br />(デフォルト)</p>
	<p class="bg_repeat-x x">この「p」要素は<br />背景画像を<br />x方向(横方向)にのみ繰り返して<br />表示しています。</p>
	<p class="bg_repeat-y x">この「p」要素は<br />背景画像を<br />y方向(縦方向)にのみ繰り返して<br />表示しています。</p>
	<p class="bg_repeat-no x">この「p」要素は<br />背景画像を<br />繰り返しません。</p>
</div>

<h3>background-position</h3>
背景画像を指定した要素のどこに設定するかを指定します。<br />「上下方向 左右方向」の順番で指定します。<br />上下方向には「top(上よせ)」「center(中央よせ)」「bottom(下よせ)」が設定可能で、左右方向には「left(左よせ)」「center(中央よせ)」「right(右よせ)」が設定可能です。<br /><br />また、上下方向・左右方向ともに「center」の場合は「center center」と書かずに「center」と一回だけ書けばok!です。
<code class="html">
	&lt;p class="bgimg_topleft"&gt;ここの「p」要素では&lt;br /&gt;背景画像を&lt;br /&gt;左上に設置しています。&lt;/p&gt;
	&lt;p class="bgimg_center-right"&gt;ここの「p」要素では&lt;br /&gt;背景画像を&lt;br /&gt;右中央に設置しています。&lt;/p&gt;
	&lt;p class="bgimg_center"&gt;ここの「p」要素では&lt;br /&gt;背景画像を&lt;br /&gt;真ん中に設置しています。&lt;/p&gt;
</code>
<code class="html">
	p {
		background-image: url(../pics/bg-img-sample.png);
	}
	.bgimg_topleft {
		background-position: top left;
	}
	.bgimg_center-right {
		background-position: center right;
	}
	.bgimg_center {
		background-position: center center;
	}
</code>
<div class="result on-bg_norepeat">
	<p class="bgimg_top-left x">ここの「p」要素では<br />背景画像を<br />左上に設置しています。</p>
	<p class="bgimg_center-right x">ここの「p」要素では<br />背景画像を<br />右中央に設置しています。</p>
	<p class="bgimg_center x">ここの「p」要素では<br />背景画像を<br />真ん中に設置しています。</p>
</div>
<?php footer(); ?>