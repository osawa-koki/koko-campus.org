<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-30",
	"updated" => "2022-01-30"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>疑似要素</h2>
疑似クラスと似ていますが、疑似クラスがあくまでもスタイルを設定するだけなのに対して、疑似要素は要素全体を設定します。<br />例えば「p」タグの前に「・」を加えたり、quoteクラスを持つ要素の直前に「※」を追加することが可能になります。<br /><br />疑似要素には以下の種類があります。
<ul>
	<li>::before</li>
	<li>::after</li>
	<li>::first-line</li>
	<li>::first-letter</li>
	<li>::selection</li>
</ul>
疑似要素は疑似クラスと異なり、「::疑似要素名」で指定します。
<code class="css">
	p::before {
		content: "・";
		color: grey;
	}
	p::first-line {
		font-size: 16px;
	}
	p::first-letter {
		font-size: 20px;
		font-weight: bold;
	}
</code>
<p class="r">疑似クラスと同じく「:」で書いても動作することもありますが、css3からは疑似要素は疑似クラスと区別するために「::」とすることとなったのでこれに従いましょう♪</p>
<h2>::before</h2>
要素の直前に要素を追加します。<br />例えば「p」タグの前に「・」を追加したり、quoteクラスを持つ要素の直前に「※」を追加したりします。<br />表示するテキストは「content: 表示するテキスト」で指定します。
<p class="r">表示するテキストは「""(ダブルクォーテーション)」ないしは「''(シングルクォーテーション)」で囲みます。</p>
<code class="html">
	&lt;p&gt;さよなら、ありがとう、声の限り。&lt;/p&gt;
	&lt;p&gt;悲しみよりもっと大事なこと。&lt;/p&gt;
	&lt;p&gt;去りゆく背中に伝えたくて。&lt;/p&gt;
	&lt;p&gt;ぬくもりと痛みに間に合うように。&lt;/p&gt;
	&lt;!--「LiSA - 炎」より--&gt;
</code>
<code class="css">
	p::before {
		content: "・";
		color: red;
		font-size: 18px;
		font-weight: bold;
	}
</code>
<div class="result" id="pseudo-b4">
	<p class="x">さよなら、ありがとう、声の限り。</p>
	<p class="x">悲しみよりもっと大事なこと。</p>
	<p class="x">去りゆく背中に伝えたくて。</p>
	<p class="x">ぬくもりと痛みに間に合うように。</p>
	<!--「LiSA - 炎」より-->
</div>
<h2>::after</h2>
::beforeの直後バージョンで、要素の直後に要素を追加します。
<code class="html" id="pseudo-after">
	&lt;p&gt;強くなれる理由を知った、僕を連れて進め。&lt;/p&gt;
	&lt;p&gt;泥だらけの走馬灯に酔う、こわばる心&lt;/p&gt;
	&lt;p&gt;震える手は掴みたいものがある、それだけさ。&lt;/p&gt;
	&lt;p&gt;夜の匂いに空睨んでも、変わっていけるのは自分自身だけ、それだけさ。&lt;/p&gt;
	&lt;!--「LiSA - 紅蓮華」より--&gt;
</code>
<code class="css">
	p::after {
		content: " ♪";
		color: blue;
		font-size: 18px;
		font-weight: bold;
	}
</code>
<div class="result" id="pseudo-after">
	<p class="x">強くなれる理由を知った、僕を連れて進め。</p>
	<p class="x">泥だらけの走馬灯に酔う、こわばる心</p>
	<p class="x">震える手は掴みたいものがある、それだけさ。</p>
	<p class="x">夜の匂いに空睨んでも、変わっていけるのは自分自身だけ、それだけさ。</p>
	<!--「LiSA - 紅蓮華」より-->
</div>
<h2>::first-line</h2>
テキストの最初の一行のみに対してスタイルを適用します。
<code class="html">
	&lt;p&gt;
		心の穴を埋めたいから、優しいフリして笑った。
		出会いと別れがせわしく、僕の肩を駆けていくよ。
		ダメな自分が悔しいほど、わかってしまうから損だ。
		強くはなりきれないから、ただ目をつぶって耐えてた。
		ほら見えてくるよ。
	&lt;/p&gt;
	&lt;!--「いきものがかり - 帰りたくなったよ」より--&gt;
</code>
<code class="css">
	p::first-line {
		font-size: 16px;
		font-weight: bold;
	}
</code>
<div class="result" id="first-line">
	<p class="x">心の穴を埋めたいから、優しいフリして笑った。出会いと別れがせわしく、僕の肩を駆けていくよ。ダメな自分が悔しいほど、わかってしまうから損だ。強くはなりきれないから、ただ目をつぶって耐えてた。ほら見えてくるよ。</p>
	<!--「いきものがかり - 帰りたくなったよ」より-->
</div>
<h2>::first-letter</h2>
テキストの最初の文字のみに対してスタイルを適用します。
<code class="html">
	&lt;p&gt;
		飛翔いたら、戻らないと言って、目指したのは蒼い蒼いあの空。
		「悲しみ」はまだ覚えられず　「切なさ」は今つかみはじめた。
		あなたへと抱くこの感情も、今「言葉」に変わっていく。
	&lt;/p&gt;
	&lt;!--「いきものがかり - ブルーバード」より--&gt;
</code>
<code class="css">
	p::first-letter {
		font-size: 20px;
		font-weight: bold;
	}
</code>
<div class="result" id="first-letter">
	<p class="x">
		飛翔いたら、戻らないと言って、目指したのは蒼い蒼いあの空。
		「悲しみ」はまだ覚えられず　「切なさ」は今つかみはじめた。
		あなたへと抱くこの感情も、今「言葉」に変わっていく。
	</p>
	<!--「いきものがかり - ブルーバード」より-->
</div>
<h2>::selection</h2>
ユーザが選択したテキストに対してドラッグ・クリックで選択した部分に対してスタイルを設定します。
<code class="html">
	&lt;p class="selection1"&gt;このテキストを選択すると背景は青、文字色は白になります。&lt;/p&gt;
	&lt;p class="selection2"&gt;このテキストを選択すると背景は黒、文字色は白になります。&lt;/p&gt;
	&lt;p class="selection3"&gt;このテキストを選択すると背景は黄、文字色は青になります。&lt;/p&gt;
</code>
<code class="css">
	.selection1::selection {
		color: white;
		background-color: blue;
	}
	.selection2::selection {
		color: white;
		background-color: black;
	}
	.selection3::selection {
		color: blue;
		background-color: yellow;
	}
</code>
<div class="result">
	<p class="selection1 x">このテキストを選択すると背景は青、文字色は白になります。</p>
	<p class="selection2 x">このテキストを選択すると背景は黒、文字色は白になります。</p>
	<p class="selection3 x">このテキストを選択すると背景は黄、文字色は青になります。</p>
</div>
<div class="separator2"></div>
お疲れ様でした。<br />以上でhtml&amp;css入門-ver2は終了です。<br />次はjavascript入門、ないしはphp入門へ進んでみてはいかがでしょうか???
<div class="subjects-container">
	<a href="../../javascript入門/branch" class="link-subject to-javascript入門"></a>
	<a href="../../php入門/branch" class="link-subject to-php入門"></a>
</div>
<?php footer(); ?>