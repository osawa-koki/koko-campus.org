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
<h2>idとクラス</h2>
次に説明するcssは原則として外部のファイルからスタイル(デザイン)を操作しますので、<strong>どの</strong>要素にスタイルを適用するのかを特定するための識別子が必要です。<br />識別子として働くものは以下の3つがあります。
<br /><br />
<ul>
	<li>タグ名</li>
	<li>id</li>
	<li>クラス</li>
</ul>
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>タグ名</th>
			<td>前の授業でhtmlタグについて学びましたね。<br />例えば「p」タグを対象にしたり、「h1」タグを対象にしたりしますが、同一のタグに対して異なるスタイルを適用できないため、あまり用いられません。</td>
		</tr>
		<tr>
			<th>id</th>
			<td>タグに付ける名前です。<br />html上で一意(オンリーワン)である識別子です。</td>
		</tr>
		<tr>
			<th>クラス</th>
			<td>idはhtml上で一意(オンリーワン)でしたが、htmlタグをグループ化する際にはクラスを使用します。</td>
		</tr>
	</tbody>
</table>
<h3>id</h3>
html上の要素を<strong>一意</strong>に識別します。<br />言い換えれば、同一のhtml上で同じidを2回以上使用することはできません。<br />間違って2回以上使用した場合は最後に書かれた要素に対してidが付与されます。「id="〇〇〇"」で指定します。<br />idとして日本語を使用することも可能ですが、原則として英数字(先頭文字は英字)とハイフン・アンダースコアで設定します。
<code class="html">
	&lt;div id="news"&gt;
		ニュースを表示するブロック要素
	&lt;/div&gt;
</code>
また、「a」タグの「href」属性に「#id名」と設定するとページ内リンクを生成できます。<br />id名を省略して「href="#"」とした場合はページの一番上に飛びます。
<h3>クラス</h3>
html上のタグをグループ化して一括して特定するために用いられます。<br />「class="〇〇〇"」で指定します。<br />idと同様に英字から始まる英数字とハイフン・アンダースコアで設定します。
<code class="html">
	&lt;div class="box1"&gt;
		box1クラスの中身
	&lt;/div&gt;
	&lt;div class="box1"&gt;
		box1クラスの中身
	&lt;/div&gt;
</code>
<div class="separator"></div>
次回はいよいよcssに入ります。
<?php footer(); ?>