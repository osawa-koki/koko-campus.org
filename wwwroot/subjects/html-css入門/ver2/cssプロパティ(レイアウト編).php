<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-30",
	"updated" => "2022-01-30"
);
head($obj);
?>
<h2>レイアウト</h2>
レイアウトとはページ上でどのように表示するかを指定するもので、テキストではなくブロック要素(divなど)を対象にします。<br />代表的なブロック要素には以下のものがあります。
<ul>
	<li>div</li>
	<li>main</li>
	<li>p</li>
	<li>section</li>
	<li>article</li>
</ul>
「display」プロパティを変更してインライン要素をブロック要素にすることもできますが、原則としてデフォルトの設定に従うべきです。
<h2>幅と高さ</h2>
それぞれ、「width」「height」プロパティで設定します。<br />単位として「px」「%」「rem」「vw」などが使用可能ですが、ブロック要素に関しては原則として「px」もしくは「%」による指定をオススメします。
<code class="html">
	&lt;div class="w100px-h50px"&gt;
		幅は100px&lt;br /&gt;高さは50px
	&lt;/div&gt;
	&lt;div class="w50pc-h100px"&gt;
		幅は50%&lt;br /&gt;高さは100px
	&lt;/div&gt;
</code>
<code class="css">
	div {
		background-color: orange;
	}
	.w100px-h50px {
		width: 100px;
		height: 50px;
	}
	.w50pc-h100px {
		width: 50%;
		height: 100px;
	}
</code>
<div class="result width-height">
	<div class="w100px-h50px">
		幅は100px<br />高さは50px
	</div>
	<div class="w50pc-h100px">
		幅は50%<br />高さは100px
	</div>
</div>
<h2>margin</h2>
ブロックの<strong>外側</strong>の余白を設定します。<br />値を4つ指定した場合は「上 右 下 左」の順となり、値を2つ指定した場合は「上下 左右」の順となり、値を1つ指定した場合は「上下左右」となります。<br />「margin-top」「margin-right」「margin-bottom」「margin-left」と分けて設定することもできます。
<img src="../pics/margin.png" alt="marginの説明画像" />
「margin-right」と「margin-left」に「auto」を設定するとブロック要素が親要素に対して中央に配置されます。
<h2>padding</h2>
ブロックの<strong>内側</strong>の余白を設定します。<br />値を4つ指定した場合は「上 右 下 左」の順となり、値を2つ指定した場合は「上下 左右」の順となり、値を1つ指定した場合は「上下左右」となります。
<img src="../pics/padding.png" alt="paddingの説明画像" />
<?php footer(); ?>