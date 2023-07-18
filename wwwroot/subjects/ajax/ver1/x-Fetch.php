<?php
include(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "XMLHttpRequest",
	"made" => "2021-10-25",
	"updated" => "2021-10-25"
);
head($obj);
?>
<h2>Fetch</h2>
XMLHttpRequestよりも簡単に実現可能なajax通信技術です。<br />XMLHttpRequestと異なり、ハンドラを開いて、それにデータを付与して、それを送信して、、、なんて煩雑な処理は不要です。<br />しかしながら、ajax通信の状態を把握することができず、単にサーバからデータを取得する技術であるため、ajax通信の状態に応じた処理を行う際はXMLHttpReques
tを用いる必要があります。<br /><br />また、実装方法は「GET」メソッドと「POST」メソッドで異なります。
<h2>Fetchの全体像</h2>
<h3>GETメソッド</h3>
<code class="js">
	fetch("https://koko-campus.org/example?data0=ILoveYou&amp;data1=IReallyLoveYou")
	.then((response) => response.json())
	.then((response) => {
		console.log(response);
	})
</code>
<h3>POSTメソッド</h3>
<code class="js">
	let url = "https://koko-campus.org/example";
	let post_data = {
		"data0" : "ILoveYou",
		"data1" : "IReallyLoveYou"
	};
	post_data = JSON.stringify(post_data);
	let data = {
		method: "POST",
		mode: "cors",
		headers: {
			"Accept": "application/json",
			"Content-Type": "application/json",
		}
	};
	data["body"] = post_data;
	fetch(url, data)
	.then((response) => response.json())
	.then((response) => {
		console.log(response);
	})
</code>
サーバサイドでデータを取得する際には、Content-Typeを正しく設定して、かつ、データをその形式に変換して送信する必要があります。<br /><br />ここでは、送信データも受信データもjson形式のデータを想定します。
<h2>Promise(then)</h2>
「then」という見慣れないメソッドが出現しましたね。<br />「then」について説明するために、まずはPromiseについて説明します。<br />Promiseとは、非同期処理を実行して、その結果を戻り値として返却するクラスオブジェクトです。<br /><br />thenメソッドはPromiseオブジェクトに対して呼び出されるメソッドで、Promiseオブジェクトで実行された非同期処理が完了してから実行する関数を引数に指定します。<br /><br />非同期処理の実行に失敗するとcatchメソッドが呼び出されます。
<code class="js">
	let promise = new Promise((ok) => {
		//時間がかかる処理...
		ok("finished!");
	});
	promise
	.then((arg) => {
		console.log("I'm " + arg); //I'm finished!
	})
	.catch(() => {
		console.log("I gave up..."); //I gave up...
	})
</code>
ajax通信は非同期で行われる通信でしたよね♪<br />ajax通信で受信したデータを処理する関数を、データを受信する前に実行すると当然エラーになってしまいます。<br /><br />ということで、ajax通信でデータを受信してから、thenメソッドで処理する関数を実行します。
<h2>Fetch(GETメソッド)</h2>
fetch関数では、第一引数にajax通信先のurlを指定します。<br />GETメソッドでデータを送信する際にはクエリストリングとして「?」の後に「キー」=「バリュー」で送信します。<br />複数個ある場合には「&amp;」で結合します。
<code class="js">
	fetch("http://koko-campus.org/example?data0=ILoveYou&amp;data1=IReallyLoveYou")
		.then(response => response.json())
		.then(response => console.log(response));
</code>
<div class="column">
	.then(...).then(...)と、thenメソッドが2回続くのは、fetch関数の戻り値として返されるPromiseオブジェクトをパース(jsonメソッド・textメソッド)した際の戻り値は純粋なjson・textデータではなく、そのオブジェクトで解決されるPromiseオブジェクトであるためです。
</div>
<h2>Fetch(POSTメソッド)</h2>
1.ajax通信先urlと送信するオブジェクト形式のデータを指定して、送信するオブジェクト型のデータをjson形式に変換します。
<code class="js">
	let url = "https://koko-campus.com/update/information";
	let post = {
		"data0" : "ILoveYou",
		"data1" : "IReallyLoveYou"
	};
	post = JSON.stringify(post);
</code>
2.httpリクエストの設定用のオブジェクト形式のデータを作成します。
<code class="js">
	let data = {
		method: "POST",
		mode: "cors",
		headers: {
			"Accept": "application/json",
			"Content-Type": "application/json",
		}
	};
</code>
3.httpリクエストの設定用のオブジェクト形式のデータにjson化されたPOSTデータを追加します。
<code class="js">
	data["body"] = post;
</code>
4.fetch関数を実行します。
<code class="js">
	fetch(url, data)
	.then((response) => response.json())
	.then((response) => {
		console.log(response);
	})
</code>
<h2>留意点・注意点</h2>
XMLHttpRequestと同様に以下の点に注意してください。
<br />
<ul>
	<li>同一ドメインポリシに基づいて、原則として異なるドメインに存在するデータはajax通信では取得できません。</li>
	<li>ajax通信はjavascriptを使用しているため、ユーザがjavascriptをオフにしている際にはデータを取得できません。</li>
	<li>ブラウザに過度な負荷をかける危険性があります。</li>
</ul>
<br>
次はjqueryライブラリを用いた際のajax通信について学びましょう♪
<?php footer(); ?>