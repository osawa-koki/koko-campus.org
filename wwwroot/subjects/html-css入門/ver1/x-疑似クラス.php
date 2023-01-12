<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>疑似クラス</h2>
疑似クラスとは、html上はクラスとして設定していないがcss上でクラスっぽく捉えることが可能なものを言います。<br />よくわからないですよね、、、<br /><br />例えば以下のリンクを見てください。<br />最初は青っぽい色をしていますよね。<br />このリンクは自分自身に対するリンクを設定しています。<br />では、これをクリックしてみましょう♪
<br /><br />
<a id="link" href="#link">リンク</a>
<br /><br />
紫っぽくなりましたね♪<br />皆さん、これは経験したことがあると思います。<br />あとはマウスのカーソルを合わせると色を変えたり、要素がクリックされている際の色を変更したり、、、<br />疑似クラスを用いればこんなことができます。<br /><br />疑似クラスには以下の種類があります。
<br />
<ul>
	<li>:link</li>
	<li>:visited</li>
	<li>:hover</li>
	<li>:active</li>
	<li>:nth-child(n)</li>
	<li>:nth-of-type(n)</li>
	<li>:not(selector)</li>
</ul>
<br />
疑似クラスを指定するためには対象の要素に対して「:疑似クラス名」と指定します。
<code class="css">
	.dir:link {
		color: red;
	}
	.button:hover {
		background-color: blue;
	}
	#main:visited {
		color: orange;
	}
</code>
<h3>:link</h3>
未訪問のリンク要素(「a」タグ)に関するスタイルを指定します。<br />デフォルトでは「青(rgb(0, 0, 238)/chromeの場合)」が設定されています。<br />リンクはリンクってユーザに簡単に識別できるようにするため、原則としてこれを変更するべきではありませんが、ページのデザインに合わせることを目的として変更することもあります。
<span id="link-dummy1"></span>
<span id="link-dummy2"></span>
<span id="link-dummy3"></span>
<code class="html">
	&lt;a id="link-blue" href="#link-to"&gt;青リンク&lt;/a&gt;
	&lt;br /&gt;
	&lt;a id="link-red" href="#link-to"&gt;赤リンク&lt;/a&gt;
	&lt;br /&gt;
	&lt;a id="link-green" href="#link-to"&gt;緑リンク(ミドリンク)&lt;/a&gt;
</code>
<code class="css">
	#link-blue:link {
		color: blue;
	}
	#link-red:link {
		color: red;
	}
	#link-green:link {
		color: green
	}
</code>
<div class="result">
	<a id="link-blue" href="#link-dummy1">青リンク</a>
	<br />
	<a id="link-red" href="#link-dummy2">赤リンク</a>
	<br />
	<a id="link-green" href="#link-dummy3">緑リンク(ミドリンク)</a>
</div>
実際にリンクをクリックしたら色は元の紫に変わります。
<h3>:visited</h3>
「:link」が未訪問の要素の対する疑似クラスだったのに対して、「:visited」では訪問済みのリンクに対してスタイルを設定します。
<span id="visited-dummy1"></span>
<span id="visited-dummy2"></span>
<span id="visited-dummy3"></span>
<code class="html">
	&lt;a id="visited-blue" href="#visited-to"&gt;青リンク&lt;/a&gt;
	&lt;br /&gt;
	&lt;a id="visited-red" href="#visited-to"&gt;赤リンク&lt;/a&gt;
	&lt;br /&gt;
	&lt;a id="visited-green" href="#visited-to"&gt;緑リンク(ミドリンク)&lt;/a&gt;
</code>
<code class="css">
	#visited-blue:visited {
		color: blue;
	}
	#visited-red:visited {
		color: red;
	}
	#visited-green:visited {
		color: green
	}
</code>
<div class="result">
	<a id="visited-blue" href="#visited-dummy1">青リンク</a>
	<br />
	<a id="visited-red" href="#visited-dummy2">赤リンク</a>
	<br />
	<a id="visited-green" href="#visited-dummy3">緑リンク(ミドリンク)</a>
</div>
<h3>:hover</h3>
カーソルが上にのっているさいのスタイルを指定します。
<code class="html">
	&lt;a id="hover-blue" href="#hover-to"&gt;青リンク&lt;/a&gt;
	&lt;br /&gt;
	&lt;a id="hover-red" href="#hover-to"&gt;赤リンク&lt;/a&gt;
	&lt;br /&gt;
	&lt;a id="hover-green" href="#hover-to"&gt;緑リンク(ミドリンク)&lt;/a&gt;
</code>
<code class="css">
	#hover-blue:hover {
		color: blue;
	}
	#hover-red:hover {
		color: red;
	}
	#hover-green:hover {
		color: green
	}
</code>
<div class="result">
	<a id="hover-blue" href="#hover-dummy1">青リンク</a>
	<br />
	<a id="hover-red" href="#hover-dummy2">赤リンク</a>
	<br />
	<a id="hover-green" href="#hover-dummy3">緑リンク(ミドリンク)</a>
</div>
<h3>:active</h3>
アクティブな状態の要素のスタイルを設定します。<br />アクティブな状態ってかなり説明が難しいですが、マウスをクリックしてそれが離れるまでの瞬間だと思えばok!です。
<code class="html">
	&lt;a id="active-blue" href="#active-to"&gt;青リンク&lt;/a&gt;
	&lt;br /&gt;
	&lt;a id="active-red" href="#active-to"&gt;赤リンク&lt;/a&gt;
	&lt;br /&gt;
	&lt;a id="active-green" href="#active-to"&gt;緑リンク(ミドリンク)&lt;/a&gt;
</code>
<code class="css">
	#active-blue:active {
		color: blue;
	}
	#active-red:active {
		color: red;
	}
	#active-green:active {
		color: green
	}
</code>
<div class="result">
	<a id="active-blue" href="#active-dummy1">青リンク</a>
	<br />
	<a id="active-red" href="#active-dummy2">赤リンク</a>
	<br />
	<a id="active-green" href="#active-dummy3">緑リンク(ミドリンク)</a>
</div>
<h3>:nth-child(n)</h3>
何番目の要素に対してのみスタイルを適用します。<br />例えば、「li:nth-child(3)」とした場合は3番目の「li」要素のみにスタイルを適用することができます。<br />また、「n」は整数を表すため、「2n+1」で奇数(oddでもok!)、「2n」で偶数(evenでもok!)などを表すこともできます。
<p class="r">後述する「nth-of-type」と異なり、兄弟要素内での順番を指定します。</p>
<code class="html">
	&lt;div class="odd-even"&gt;
		&lt;p&gt;奇数&lt;/p&gt;
		&lt;p&gt;偶数&lt;/p&gt;
		&lt;p&gt;奇数&lt;/p&gt;
		&lt;div&gt;お邪魔します♪&lt;/div&gt;
		&lt;p&gt;偶数&lt;/p&gt;
		&lt;p&gt;奇数&lt;/p&gt;
		&lt;p&gt;偶数&lt;/p&gt;
	&lt;/div&gt;
</code>
<code class="css">
	.odd-even p:nth-child(2n) {
		color: red;
	}
	.odd-even p:nth-child(2n+1) {
		color: blue;
	}
</code>
<div class="result">
	<div class="odd-even x">
		<p class="x">奇数</p>
		<p class="x">偶数</p>
		<p class="x">奇数</p>
		<div class="x">お邪魔します♪</div>
		<p class="x">偶数</p>
		<p class="x">奇数</p>
		<p class="x">偶数</p>
	</div>
</div>
<h3>:nth-of-type(n)</h3>
「nth-child」の同じ要素内での順番を指定するバージョンです。
<code class="html">
	&lt;div class="odd-even2"&gt;
		&lt;p&gt;奇数&lt;/p&gt;
		&lt;p&gt;偶数&lt;/p&gt;
		&lt;p&gt;奇数&lt;/p&gt;
		&lt;div&gt;お邪魔します♪&lt;/div&gt;
		&lt;p&gt;偶数&lt;/p&gt;
		&lt;p&gt;奇数&lt;/p&gt;
		&lt;p&gt;偶数&lt;/p&gt;
	&lt;/div&gt;
</code>
<code class="css">
	.odd-even2 p:nth-of-type(2n) {
		color: red;
	}
	.odd-even2 p:nth-of-type(2n+1) {
		color: blue;
	}
</code>
<div class="result">
	<div class="odd-even2 x">
		<p class="x">奇数</p>
		<p class="x">偶数</p>
		<p class="x">奇数</p>
		<div class="x">お邪魔します♪</div>
		<p class="x">偶数</p>
		<p class="x">奇数</p>
		<p class="x">偶数</p>
	</div>
</div>
<h3>:not(selector)</h3>
あるセレクタに該当しないセレクタを指定します。<br />例えば、「exclude-me」クラスを付与されていない「div」要素を対象とする際に用いられます。
<code class="html">
	&lt;ul class="not-selector"&gt;
		&lt;li class="electricity"&gt;ピカチュウ&lt;/li&gt;
		&lt;li&gt;バシャーモ&lt;/li&gt;
		&lt;li class="electricity"&gt;エモンガ&lt;/li&gt;
		&lt;li&gt;チコリータ&lt;/li&gt;
		&lt;li&gt;ゼニガメ&lt;/li&gt;
	&lt;/ul&gt;
</code>
<code class="css">
	.not-selector li:not(.electricity) {
		color: red;
	}
</code>
<div class="result">
	<ul class="not-selector x">
		<li class="electricity">ピカチュウ</li>
		<li>バシャーモ</li>
		<li class="electricity">エモンガ</li>
		<li>チコリータ</li>
		<li>ゼニガメ</li>
	</ul>
</div>
<?php footer(); ?>