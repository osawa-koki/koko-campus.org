<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-01-15",
	"updated" => "2022-01-15"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>属性の操作</h2>
スタイル属性については既に説明しましたね♪<br />ここではスタイル以外の属性の取得・設定方法を学びます。<br />では早速ですが、属性を取得・設定するには以下のコードを使用します。
<code class="javascript">
	//属性の取得
	要素.getAttribute("属性名");

	//属性の設定
	要素.setAttribute("属性名", "値");
</code>
ではinput属性のtype属性を取得変更するプログラムを作成してみましょう♪<br />完成形を最初に紹介しますね♪
<div id="attribute-example_div">
	<input id="attribute-example_ipt" type="text" />
	<br />
	<label for="attribute-example_opt">type属性を選択してください。</label>
	<br />
	<select id="attribute-example_opt">
		<option value="text">text</option>
		<option value="number">number</option>
		<option value="date">date</option>
		<option value="range">range</option>
		<option value="password">password</option>
	</select>
	<br />
	<input id="attribute-example_btn" type="button" value="クリック!!" />
</div>
<script charset="utf-8" type="text/javascript">
	(function() {
		const ipt = document.getElementById("attribute-example_ipt");
		const opt = document.getElementById("attribute-example_opt");
		document.getElementById("attribute-example_btn").addEventListener("click", () => {
			window.alert(`現在のtype属性は${ipt.getAttribute("type")}`);
			ipt.setAttribute("type", opt.value);
		});
	})();
</script>
ではコードを紹介します。
<code class="html">
	&lt;input id="ipt" type="text" /&gt;
	&lt;br /&gt;
	&lt;label for="opt"&gt;type属性を選択してください。&lt;/label&gt;
	&lt;br /&gt;
	&lt;select id="opt"&gt;
		&lt;option value="text"&gt;text&lt;/option&gt;
		&lt;option value="number"&gt;number&lt;/option&gt;
		&lt;option value="date"&gt;date&lt;/option&gt;
		&lt;option value="range"&gt;range&lt;/option&gt;
		&lt;option value="password"&gt;password&lt;/option&gt;
	&lt;/select&gt;
	&lt;br /&gt;
	&lt;input id="btn" type="button" value="クリック!!" /&gt;
</code>
<code class="javascript">
	const ipt = document.getElementById("ipt");
	const opt = document.getElementById("opt");
	document.getElementById("btn").addEventListener("click", () => {
		window.alert(`現在のtype属性は${ipt.getAttribute("type")}`);
		ipt.setAttribute("type", opt.value);
	});
</code>
<h2>innerHTML</h2>
textContentプロパティに似ていますが、textContentでは「&lt;」や「&gt;」がhtml上のタグと認識されないように自動でエスケープ処理されるのに対して、innerHTMLではこれをレンダリングしてhtml上のタグとして認識します。<br />両者の違いを比べてみましょう♪
<h3>textContent</h3>
idがtargetに設定されているタグのtextContentプロパティに「ピチュー&lt;br /&gt;ピカチュウ&lt;br /&gt;&lt;input type="text" /&gt;」を設定してみましょう♪
<code class="javascript">
	const tgt = document.getElementById("target");
	tgt.textContent = "ピチュー&lt;br /&gt;ピカチュウ&lt;br /&gt;&lt;input type="text" /&gt;";
</code>
<img class="no-max" src="../pics/textContent-vs-innerHTML(textContent).gif" alt="textContent" />
自動的にエスケープ処理されているのが分かりますね♪
<h3>innerHTML</h3>
idがtargetに設定されているタグのinnerHTMLプロパティに「ピチュー&lt;br /&gt;ピカチュウ&lt;br /&gt;&lt;input type="text" /&gt;」を設定してみましょう♪
<code class="javascript">
	const tgt = document.getElementById("target");
	tgt.innerHTML = "ピチュー&lt;br /&gt;ピカチュウ&lt;br /&gt;&lt;input type="text" /&gt;";
</code>
<img class="no-max" src="../pics/textContent-vs-innerHTML(innerHTML).gif" alt="innerHTML" />
ユーザが入力したデータをinnerHTMLで表示するとhtmlを不正に操作される危険性があります。<br />例えばユーザフォームに以下のように入力して不正なjsファイルを実行させます。
<img src="../pics/xss.png" alt="xss" />
これをhtml上に表示してしまうと、危険なjsを実行される危険性があります。<br />いわゆる、クロスサイトスクリプティング(XSS)と呼ばれるハッキング手法です。<br />したがって、原則としてinnerHTMLは使用するべきではないです。<br />もし、使用する場合には絶対にユーザから受け取ったデータを他の人に表示する際に用いないでください。<br />ユーザが入力したデータをそのユーザだけが使用するために使用するならok!です。
<h2>outerHTML</h2>
innerHTMLが自身のタグの中のデータが対象であったのに対してouterHTMLは自身も含めたプロパティです。<br />例えば以下のhtmlのouterHTMLを取得して表示すると違いが一目瞭然だと思います。
<code class="html">
	&lt;div id="target"&gt;
		はぁ、今日も&lt;strong&gt;疲れた&lt;/strong&gt;なぁ～～～、、、
	&lt;/div&gt;
</code>
<h3>innerHTML</h3>
<code class="javascript">
	const tgt = document.getElementById("target");
	console.log(tgt.innerHTML);
</code>
<img class="no-max" src="../pics/innerHTML-vs-outerHTML(innerHTML).gif" alt="innerHTML" />
<h3>outerHTML</h3>
<code class="javascript">
	const tgt = document.getElementById("target");
	console.log(tgt.outerHTML);
</code>
<img class="no-max" src="../pics/innerHTML-vs-outerHTML(outerHTML).gif" alt="outerHTML" />
<h2>insertAdjacentHTML</h2>
既に学習したappendChildは要素を自身の最後の子要素として追加しましたが、もっと詳細に追加するメソッドがinsertAdjacentHTMLです。<br />そのメソッドで追加する要素はcreateElementメソッドで作成したものではなく、「&lt;div&gt;ピカチュウ♪&lt;/div&gt;」のようにhtmlタグをそのまま書いた文字列である必要があります。<br />以下のように書きます。
<code class="javascript">
	基準の要素.insertAdjacentHTML("挿入する位置", 挿入する要素);
</code>
<table>
	<caption>挿入する位置</caption>
	<tbody>
		<tr>
			<th>beforebegin</th>
			<td>基準の要素のひとつ前の要素として挿入します。</td>
		</tr>
		<tr>
			<th>afterend</th>
			<td>基準の要素のひとつ後の要素として挿入します。</td>
		</tr>
		<tr>
			<th>afterbegin</th>
			<td>基準の要素の最初の子要素として挿入します。</td>
		</tr>
		<tr>
			<th>beforeend</th>
			<td>基準の要素の最後の子要素として挿入します。<br />appendChildと同様の効果です。</td>
		</tr>
	</tbody>
</table>
<h3>beforebegin</h3>
<img class="no-max" src="../pics/insertAdjacentHTML-beforebegin.gif" alt="insertAdjacentHTML" />
<h3>afterend</h3>
<img class="no-max" src="../pics/insertAdjacentHTML-afterend.gif" alt="insertAdjacentHTML" />
<h3>afterbegin</h3>
<img class="no-max" src="../pics/insertAdjacentHTML-afterbegin.gif" alt="insertAdjacentHTML" />
<h3>beforeend</h3>
<img class="no-max" src="../pics/insertAdjacentHTML-beforeend.gif" alt="insertAdjacentHTML" />
<div class="separator"></div>
innerHTMLやouterHTMLと同様にxssの危険性があるので原則として用いるべきではありません。<br />もし、使用する場合はあるユーザが入力したデータを第三者のjsでこれを使用しないようにしてください。<br />ユーザが入力したデータをそのユーザだけが使用するために使用するならok!です。
<?php footer(); ?>