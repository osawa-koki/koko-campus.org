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
<h2>フォーム</h2>
最初にフォームの説明をします。<br />フォームとは例えば以下のものを言います。
<p>詳しくは<a href="../../html&css入門/branch">html&amp;css</a>の授業で説明しています。</p>
<br />
<input type="text" />
<br />
<input type="number" />
<br />
<input type="range" />
<br />
<input type="submit" />
<br />
<textarea rows="8" cols="30"></textarea>
<h2>イベントリスナー</h2>
イベントリスナーとはイベントを待機してイベントが発生したら処理を実行する機能を言います。<br />良く用いるものには以下のイベントリスナーがあります。
<ul>
	<li>クリック</li>
	<li>入力</li>
	<li>入力完了</li>
	<li>ロード完了</li>
</ul>
<table>
	<caption>イベント</caption>
	<tbody>
		<tr>
			<th>click</th>
			<td>要素がクリックされたら処理を実行します。</td>
		</tr>
		<tr>
			<th>input</th>
			<td>フォームに文字が入力されるたびに処理を実行します。</td>
		</tr>
		<tr>
			<th>change</th>
			<td>フォームに文字が入力し終わって、フォーカスが外れるなどのイベントが発生した場合に処理を実行します。</td>
		</tr>
		<tr>
			<th>load</th>
			<td>読み込みが完了したら処理を実行します。</td>
		</tr>
	</tbody>
</table>
<h2>イベントリスナーの設定</h2>
では早速イベントリスナーを設定しましょう♪<br />以下のように設定します。
<code class="javascript">
	要素.addEventListener("イベント", 関数);
</code>
関数を別に宣言する必要がありますが、あくまでも処理を実行することを目的として関数を作成する必要がない場合は即時関数を使用して以下のように書くこともできます。
<code class="javascript">
	要素.addEventListener("イベント", function() {
		//処理...
	});
</code>
関数をアロー関数で宣言することも可能ですが、この場合はthisの指す値がそのイベントを受け取ったオブジェクトではなくなってしまうので注意が必要です。
<h2>click</h2>
では早速、クリックされたらメッセージダイアログが表示されるプログラムを作成しましょう♪<br />下のボタンを押して下さい。
<br />
<input type="button" value="押してね♪" id="incode-button" />
<script charset="utf-8" type="text/javascript">
	document.getElementById("incode-button").addEventListener("click", function() {
		window.alert("押されました!!!");
	});
</script>
<code class="html">
	&lt;input id="btn" type="button" value="押してね♪" /&gt;
</code>
<code class="javascript">
	let btn = document.getElementById("btn");
	btn.addEventListener("click", () => {
		window.alert("押されました!!!");
	});
</code>
イベントリスナーで設定された関数内でイベントを受け取ったオブジェクトを使用する必要がない(thisを用いない)ため、アロー関数を使用して関数を定義しました。<br />windowオブジェクトのalertメソッドは引数で受け取った文字列をメッセージダイアログに表示します。
<h2>input</h2>
文字が入力される度に処理を実行します。<br />では以下のテキストボックスに文字を入力してください。
<br /><br />
<input type="text" id="incode-input" />
<div>入力した文字は「<span id="incode-input_show"></span>」です。</div>
<script charset="utf-8" type="text/javascript">
	const incodeInput_show = document.getElementById("incode-input_show");
	document.getElementById("incode-input").addEventListener("input", function() {
		incodeInput_show.textContent = this.value;
	});
</script>
<code class="html">
	&lt;input type="text" id="form" /&gt;
	&lt;br /&gt;
	&lt;div&gt;入力した文字は「&lt;span id="show"&gt;&lt;/span&gt;」です。&lt;/div&gt;
</code>
<code class="javascript">
	let s = document.getElementById("show");
	let f = document.getElementById("form");
	f.addEventListener("input", function() {
		s.textContent = this.value;
	});
</code>
イベントが設定されている要素は関数内で「this」を用いて指定できます。<br />また、フォームの値は要素のvalueプロパティに格納されているので、これを使用します。<br /><br />また、イベントリスナーで実行される関数の第一引数にはイベントに関する様々な情報が含まれるので、これを使用することを推奨している人もいます。<br />イベントリスナーで実行される関数の第一引数のtargetプロパティにはそのイベントを受け取ったオブジェクトが代入されているのでこれをthisの代わりに使用することもできます。
<p class="r">どちらでも問題ありませんが、大人の事情でこちらを推奨します。<br />僕は面倒くさがり屋なのでthisを使用していますが、、、</p>
イベントリスナーで受け取った引数からそのイベントを受け取ったオブジェクトを取得する場合のコードは以下のようになります。
<p class="r">「this」を「e.target」に変えただけです。</p>
<code class="javascript">
	let s = document.getElementById("show");
	let f = document.getElementById("form");
	f.addEventListener("input", function(e) {
		s.textContent = e.target.value;
	});
</code>
<h2>change</h2>
inputが入力される度に実行されるのに対して、changeは入力が完了して何かしらのアクションを起こした際に処理が実行されます。
<br /><br />
<input type="text" id="incode-change" />
<div>入力した文字は「<span id="incode-change_show"></span>」です。</div>
<script charset="utf-8" type="text/javascript">
	const incodeChange_show = document.getElementById("incode-change_show");
	document.getElementById("incode-change").addEventListener("change", function() {
		incodeChange_show.textContent = this.value;
	});
</script>
「input」の部分を「change」に変えただけです。
<code class="html">
	&lt;input type="text" id="form" /&gt;
	&lt;br /&gt;
	&lt;div&gt;入力した文字は「&lt;span id="show"&gt;&lt;/span&gt;」です。&lt;/div&gt;
</code>
<code class="javascript">
	let s = document.getElementById("show");
	let f = document.getElementById("form");
	f.addEventListener("change", function() {
		s.textContent = this.value;
	});
</code>
<h2>load</h2>
htmlの読み込みが完了した時点で処理を実行します。<br />僕が最初にjsファイルを読み込むためのscriptタグはbodyの一番最後に書くように説明したのを覚えていますか???<br />これを守っていればこれを使用する必要はありません。<br />htmlの読み込み途中でjsファイルを読み込んだ場合はまだ読み込まれていないのにjsが実行されてしまうとエラーが発生します。<br />これを回避するためにhtmlが読み込まれたら処理を実行するように指定する際に用いられます。<br /><br />大抵の人は以下のように書きます。
<code class="javascript">
	window.addEventListener("load", () => {
		//処理の開始...
	});
</code>
これでhtmlの読み込みが終わったらjsが実行されるため、htmlのどこにscriptタグを設置しても問題なく動作するようになります。<br />多くのサイトではこうするように教えていますが、bodyタグの最後にscriptタグを書けば必要ないこと、不必要なイベントリスナーが実行効率に悪い影響を及ぼすことから僕は使用を推奨していません。
<h2>複雑なイベントリスナーの設定</h2>
では今度はもっと複雑なイベントリスナーを設定してみましょう♪<br />ポケモンを入力させてボタンを押したらこれをリストに追加、さらにはその要素をクリックしたらその要素を削除するかどうかの確認ダイアログを表示して削除orそのまま、というプログラムを作成します。<br /><br />まずは完成形を紹介します。
<div id="eventlistener-example">
	<input type="text" id="eventlistener-example_input" />
	<br /><br />
	<input type="button" value="追加!!" id="eventlistener-example_button" />
	<ul id="eventlistener-example_ul" class="x">
		<li>ピチュー</li>
		<li>ピカチュウ</li>
		<li>ライチュウ</li>
	</ul>
</div>
<script charset="utf-8" type="text/javascript">
	"use strict";
	(function() {
		function delete_it() {
			if (window.confirm(`${this.textContent}を本当に削除しますか???`)) {
				this.remove();
			}
		}
		const ul = document.getElementById("eventlistener-example_ul"),
			f = document.getElementById("eventlistener-example_input"),
			btn = document.getElementById("eventlistener-example_button");
		btn.addEventListener("click", function() {
			const elm = document.createElement("li");
			elm.textContent =f.value;
			elm.addEventListener("click", delete_it);
			ul.appendChild(elm);
		});
	})();
</script>
ではコードの説明をします。
<code class="html">
	&lt;input type="text" id="f" /&gt;
	&lt;br /&gt;&lt;br /&gt;
	&lt;input type="button" value="追加!!" id="btn" /&gt;
	&lt;ul id="parent"&gt;
		&lt;li&gt;ピチュー&lt;/li&gt;
		&lt;li&gt;ピカチュウ&lt;/li&gt;
		&lt;li&gt;ライチュウ&lt;/li&gt;
	&lt;/ul&gt;
</code>
<code class="javascript">
	/*削除する用の関数の定義*/
	function delete_it() {
		//window.confirmは確認するダイアログを表示
		//「はい」か「いいえ」かで条件分岐
		if (window.confirm(this.textContent + "を本当に削除しますか???")) {
			//「はい」と答えれば削除
			this.remove(); //thisを削除(thisはクリックされたリスト要素を指す)
		}
	}

	/*オブジェクトを取得して変数に格納*/
	let parent = document.getElementById("parent");
	let f = document.getElementById("f");
	let btn = document.getElementById("btn");

	/*ボタンがクリックされた際の処理*/
	btn.addEventListener("click", function() {
		const elm = document.createElement("li"); //リスト要素を作成
		elm.textContent =f.value; //作成したリストのテキストコンテントをインプット要素の値に設定
		elm.addEventListener("click", delete_it); //作成した要素がクリックされたら削除用の関数を実行
		ul.appendChild(elm); //作成した要素を追加
	});
</code>
こんな感じですかね、、、<br />少し複雑ですけど、イベントリスナーはjavascriptの中でも根幹をなす技術ですので是非ともマスターしましょう♪
<?php footer(); ?>