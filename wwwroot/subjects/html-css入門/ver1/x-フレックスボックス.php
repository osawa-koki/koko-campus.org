<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<h2>フレックスボックス</h2>
cssのレイアウトの定番とも言えるプロパティです。<br />要素のレイアウトを簡単に実装できます。<br />ページ全体のレイアウトを調整することを主な目的とします。<br /><br />従来レイアウトに用いられていた「float」プロパティの進化バージョンです。<br /><br />レイアウト調整の対象である要素をflexアイテムと呼び、flexアイテムの親要素をflexコンテナと呼びます。
<img src="../pics/flexbox-outlook.png" alt="flexboxの概要" />
フレックスボックスの使用方法はflexコンテナのcssプロパティ「display」に「flex」を設定します。
<code class="html">
	&lt;div class="flex"&gt;
		&lt;div class="item"&gt;item1&lt;/div&gt;
		&lt;div class="item"&gt;item2&lt;/div&gt;
		&lt;div class="item"&gt;item3&lt;/div&gt;
		&lt;div class="item"&gt;item4&lt;/div&gt;
	&lt;/div&gt;
</code>
<code class="css">
	.flex {
		display: flex;
		background-color: lightgrey;
	}
	.item {
		background-color: rgb(0, 210, 210);
		margin: 5px;
		padding: 5px 10px;
	}
</code>
<div class="result">
	<div class="flex">
		<div class="item">item1</div>
		<div class="item">item2</div>
		<div class="item">item3</div>
		<div class="item">item4</div>
	</div>
</div>
<h3>flex-direction</h3>
デフォルト(row)では左から右にflexアイテムが配置されますが、これを右から左(row-reverse)、上から下(column)、下から上(column-reverse)、の配置に変更できます。
<code class="html">
	&lt;div class="flex"&gt;
		&lt;div class="item"&gt;item1&lt;/div&gt;
		&lt;div class="item"&gt;item2&lt;/div&gt;
		&lt;div class="item"&gt;item3&lt;/div&gt;
		&lt;div class="item"&gt;item4&lt;/div&gt;
	&lt;/div&gt;
</code>
<code class="css">
	.flex {
		display: flex;
		<span class="red">flex-direction: <span id="flex-direction_show">row</span></span>;
		background-color: lightgrey;
		max-width: 600px;
	}
	.item {
		background-color: rgb(0, 210, 210);
		margin: 10px;
		padding: 5px 10px;
	}
</code>
下のボタンでそれぞれの結果を確認できます。
<div class="flex-go">
	<div class="item-go" onclick="flex_direction(this)">row</div>
	<div class="item-go" onclick="flex_direction(this)">row-reverse</div>
	<div class="item-go" onclick="flex_direction(this)">column</div>
	<div class="item-go" onclick="flex_direction(this)">column-reverse</div>
</div>
<script charset = "UTF-8" type="text/javascript">
	"use strict";
	function flex_direction(arg) {
		const atr = arg.textContent;
		document.getElementById("flex-direction_show").textContent = atr;
		document.getElementById("flex-direction_result").style["flex-direction"] = atr;
	}
</script>
<div class="result">
	<div id="flex-direction_result" class="flex">
		<div class="item">item1</div>
		<div class="item">item2</div>
		<div class="item">item3</div>
		<div class="item">item4</div>
	</div>
</div>
<h3>flex-wrap</h3>
デフォルト(nowrap)ではflexアイテムは一列に並べられますが、端まで到達したら折り返して表示する(wrap)、折り返す際に下から上に並べる(wrap-reverse)を設定できます。
<code class="html">
	&lt;div class="flex"&gt;
		&lt;div class="item"&gt;item1&lt;/div&gt;
		&lt;div class="item"&gt;item2&lt;/div&gt;
		&lt;div class="item"&gt;item3&lt;/div&gt;
		&lt;div class="item"&gt;item4&lt;/div&gt;
		&lt;div class="item"&gt;item5&lt;/div&gt;
		&lt;div class="item"&gt;item6&lt;/div&gt;
		&lt;div class="item"&gt;item7&lt;/div&gt;
		&lt;div class="item"&gt;item8&lt;/div&gt;
		&lt;div class="item"&gt;item9&lt;/div&gt;
		&lt;div class="item"&gt;item10&lt;/div&gt;
	&lt;/div&gt;
</code>
<code class="css">
	.flex {
		display: flex;
		<span class="red">flex-wrap: <span id="flex-wrap_show">nowrap</span></span>;
		background-color: lightgrey;
		max-width: 600px;
	}
	.item {
		background-color: rgb(0, 210, 210);
		margin: 10px;
		padding: 5px 10px;
	}
</code>
下のボタンでそれぞれの結果を確認できます。
<div class="flex-go">
	<div class="item-go" onclick="flex_wrap(this)">nowrap</div>
	<div class="item-go" onclick="flex_wrap(this)">wrap</div>
	<div class="item-go" onclick="flex_wrap(this)">wrap-reverse</div>
</div>
<script charset = "UTF-8" type="text/javascript">
	"use strict";
	function flex_wrap(arg) {
		const atr = arg.textContent;
		document.getElementById("flex-wrap_show").textContent = atr;
		document.getElementById("flex-wrap_result").style["flex-wrap"] = atr;
	}
</script>
<div class="result">
	<div id="flex-wrap_result" class="flex">
		<div class="item">item1</div>
		<div class="item">item2</div>
		<div class="item">item3</div>
		<div class="item">item4</div>
		<div class="item">item5</div>
		<div class="item">item6</div>
		<div class="item">item7</div>
		<div class="item">item8</div>
		<div class="item">item9</div>
		<div class="item">item10</div>
	</div>
</div>
<h3>justify-content</h3>
デフォルト(flex-start)ではflexアイテムはflexコンテナ内で左によせられますが、以下の値を設定できます。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>flex-start</th>
			<td>左寄せ</td>
		</tr>
		<tr>
			<th>flex-end</th>
			<td>右寄せ</td>
		</tr>
		<tr>
			<th>center</th>
			<td>中央寄せ</td>
		</tr>
		<tr>
			<th>space-between</th>
			<td>両端と等間隔</td>
		</tr>
		<tr>
			<th>space-around</th>
			<td>等間隔</td>
		</tr>
	</tbody>
</table>
<code class="html">
	&lt;div class="flex"&gt;
		&lt;div class="item"&gt;item1&lt;/div&gt;
		&lt;div class="item"&gt;item2&lt;/div&gt;
		&lt;div class="item"&gt;item3&lt;/div&gt;
	&lt;/div&gt;
</code>
<code class="css">
	.flex {
		display: flex;
		<span class="red">justify-content: <span id="justify-content_show">flex-start</span></span>;
		background-color: lightgrey;
		max-width: 600px;
	}
	.item {
		background-color: rgb(0, 210, 210);
		margin: 10px;
		padding: 5px 10px;
	}
</code>
下のボタンでそれぞれの結果を確認できます。
<div class="flex-go">
	<div class="item-go" onclick="justifyContent(this)">flex-start</div>
	<div class="item-go" onclick="justifyContent(this)">flex-end</div>
	<div class="item-go" onclick="justifyContent(this)">center</div>
	<div class="item-go" onclick="justifyContent(this)">space-between</div>
	<div class="item-go" onclick="justifyContent(this)">space-around</div>
</div>
<script charset = "UTF-8" type="text/javascript">
	"use strict";
	function justifyContent(arg) {
		const atr = arg.textContent;
		document.getElementById("justify-content_show").textContent = atr;
		document.getElementById("justify-content_result").style["justify-content"] = atr;
	}
</script>
<div class="result">
	<div id="justify-content_result" class="flex">
		<div class="item">item1</div>
		<div class="item">item2</div>
		<div class="item">item3</div>
	</div>
</div>
<h3>align-items</h3>
デフォルト(streach)ではflexアイテムはflexコンテナいっぱいに広がりますが、広げずに上ぞろえ(flex-start)、広げずに下ぞろえ(flex-end)、広げずに中央ぞろえ(center)を設定可能です。
<code class="html">
	&lt;div class="flex"&gt;
		&lt;div class="item"&gt;item1&lt;/div&gt;
		&lt;div class="item"&gt;item2&lt;/div&gt;
		&lt;div class="item"&gt;item3&lt;/div&gt;
	&lt;/div&gt;
</code>
<code class="css">
	.flex {
		display: flex;
		<span class="red">align-items: <span id="align-items_show">stretch</span></span>;
		background-color: lightgrey;
		max-width: 600px;
		height: 300px;
	}
	.item {
		background-color: rgb(0, 210, 210);
		margin: 10px;
		padding: 5px 10px;
	}
</code>
下のボタンでそれぞれの結果を確認できます。
<div class="flex-go">
	<div class="item-go" onclick="alignItems(this)">stretch</div>
	<div class="item-go" onclick="alignItems(this)">flex-start</div>
	<div class="item-go" onclick="alignItems(this)">flex-end</div>
	<div class="item-go" onclick="alignItems(this)">center</div>
</div>
<script charset = "UTF-8" type="text/javascript">
	"use strict";
	function alignItems(arg) {
		const atr = arg.textContent;
		document.getElementById("align-items_show").textContent = atr;
		document.getElementById("align-items_result").style["align-items"] = atr;
	}
</script>
<div class="result">
	<div id="align-items_result" class="flex">
		<div class="item">item1</div>
		<div class="item">item2</div>
		<div class="item">item3</div>
	</div>
</div>
<h3>align-content</h3>
「justify-content」+「align-items」で、複数行の場合のレイアウトを設定します。
<code class="html">
	&lt;div class="flex"&gt;
		&lt;div class="item"&gt;item1&lt;/div&gt;
		&lt;div class="item"&gt;item2&lt;/div&gt;
		&lt;div class="item"&gt;item3&lt;/div&gt;
		&lt;div class="item"&gt;item4&lt;/div&gt;
		&lt;div class="item"&gt;item5&lt;/div&gt;
		&lt;div class="item"&gt;item6&lt;/div&gt;
		&lt;div class="item"&gt;item7&lt;/div&gt;
		&lt;div class="item"&gt;item8&lt;/div&gt;
		&lt;div class="item"&gt;item9&lt;/div&gt;
		&lt;div class="item"&gt;item10&lt;/div&gt;
	&lt;/div&gt;
</code>
<code class="css">
	.flex {
		display: flex;
		flex-wrap: wrap;
		<span class="red">align-content: <span id="align-content_show">stretch</span></span>;
		background-color: lightgrey;
		max-width: 600px;
		height: 300px;
	}
	.item {
		background-color: rgb(0, 210, 210);
		margin: 10px;
		padding: 5px 10px;
	}
</code>
下のボタンでそれぞれの結果を確認できます。
<div class="flex-go">
	<div class="item-go" onclick="alignContent(this)">stretch</div>
	<div class="item-go" onclick="alignContent(this)">flex-start</div>
	<div class="item-go" onclick="alignContent(this)">flex-end</div>
	<div class="item-go" onclick="alignContent(this)">center</div>
	<div class="item-go" onclick="alignContent(this)">space-between</div>
	<div class="item-go" onclick="alignContent(this)">space-around</div>
</div>
<script charset = "UTF-8" type="text/javascript">
	"use strict";
	function alignContent(arg) {
		const atr = arg.textContent;
		document.getElementById("align-content_show").textContent = atr;
		document.getElementById("align-content_result").style["align-content"] = atr;
	}
</script>
<div class="result">
	<div id="align-content_result" class="flex">
		<div class="item">item1</div>
		<div class="item">item2</div>
		<div class="item">item3</div>
		<div class="item">item4</div>
		<div class="item">item5</div>
		<div class="item">item6</div>
		<div class="item">item7</div>
		<div class="item">item8</div>
		<div class="item">item9</div>
		<div class="item">item10</div>
	</div>
</div>
<h2>フレックスボックスの練習</h2>
説明だけだと理解しにくいですよね、、、<br />かといって自分で書くもの面倒くさいし、、、<br /><br />ということで、簡単にフレックスボックスを練習できるようにプログラムを組みました。<br /><br />それでは、Let's Practice!!
<div id="buttons">
	<div onclick="add()">要素を追加</div>
	<div onclick="del()">要素を削除</div>
</div>
<script charset = "UTF-8" type="text/javascript" defer>
	"use strict";
	function add() {
		const d = document.getElementById("practice-result"),
			n = d.childElementCount,
			e = document.createElement("div");
		e.textContent = `item${n + 1}`;
		d.appendChild(e);
	}
	function del() {
		try {
			document.getElementById("practice-result").lastElementChild.remove();
		} catch(error) {}
	}
	function run_it(arg) {
		const d = document.getElementById("practice-result"),
			p = arg.parentNode.previousElementSibling.textContent,
			v = arg.value;
		d.style[p] = v;
	}
</script>
<div id="practice-result">
	<div>item1</div>
	<div>item2</div>
	<div>item3</div>
</div>
<table border="1" id="flex-property">
	<tbody>
		<tr>
			<td>display</td>
			<td>flex</td>
		</tr>
		<tr>
			<td>flex-direction</td>
			<td>
				<select onchange="run_it(this)">
					<option value="row">row</option>
					<option value="row-reverse">row-reverse</option>
					<option value="column">column</option>
					<option value="column-reverse">column-reverse</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>flex-wrap</td>
			<td>
				<select onchange="run_it(this)">
					<option value="nowrap">nowrap</option>
					<option value="wrap">wrap</option>
					<option value="wrap-reverse">wrap-reverse</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>justify-content</td>
			<td>
				<select onchange="run_it(this)">
					<option value="flex-start">flex-start</option>
					<option value="flex-end">flex-end</option>
					<option value="center">center</option>
					<option value="space-between">space-between</option>
					<option value="space-around">space-around</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>align-items</td>
			<td>
				<select onchange="run_it(this)">
					<option value="stretch">stretch</option>
					<option value="flex-start">flex-start</option>
					<option value="flex-end">flex-end</option>
					<option value="center">center</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>align-content</td>
			<td>
				<select onchange="run_it(this)">
					<option value="stretch">stretch</option>
					<option value="flex-start">flex-start</option>
					<option value="flex-end">flex-end</option>
					<option value="center">center</option>
					<option value="space-between">space-between</option>
					<option value="space-around">space-around</option>
				</select>
			</td>
		</tr>
	</tbody>
</table>




<?php footer(); ?>