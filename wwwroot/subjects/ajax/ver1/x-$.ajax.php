<?php
include(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "XMLHttpRequest",
	"made" => "2021-10-25",
	"updated" => "2021-10-25"
);
head($obj);
?>
<h2>$.ajax</h2>
jqueryライブラリを使用したajax通信を実現する技術です。<br />httpヘッダの設定やデータの加工・通信の監視等の複雑な処理をする必要がなく簡単にajax通信を実現できます。<br /><br />$.ajax以外にもGETメソッド専用の$.get、POST専用の$.POSTなどがあります。
<h2>$.ajaxの全体像</h2>
<h3>$.ajax</h3>
<code class="jq">
	let url = "https://koko-campus.org/example";
	let body = {
		"type" : "get",
		"dataType" : "json"
	};
	let data = {
		"data0" : "ILoveYou",
		"data1" : "IReallyLoveYou"
	};
	body["data"] = data;
	$.ajax(url, body);
	.done((response) => {
		console.log(response);
	})
	.fail(() => {
		console.log("I am an error");
	});
</code>
<h3>$.get</h3>
<code class="jq">
	let url = "https://koko-campus.org/example";
	let data = {
		"data0" : "ILoveYou",
		"data1" : "IReallyLoveYou"
	};
	$.get(url, data)
	.done((response) => {
		console.log(response)
	})
	.fail(() => {
		console.log("I am an error");
	});
</code>
<h3>$.post</h3>
<code class="jq">
	let url = "https://koko-campus.org/example";
	let data = {
		"data0" : "ILoveYou",
		"data1" : "IReallyLoveYou"
	};
	$.post(url, data)
	.done((response) => {
		console.log(response)
	})
	.fail(() => {
		console.log("I am an error");
	});
</code>
<h2>$.ajaxの手順</h2>
jqueryライブラリを使用したajax通信では、以下の3つの手順を踏みます。
<br />
<ol>
	<li>データの加工</li>
	<li>httpリクエストの送信</li>
	<li>受信データの受取り</li>
</ol>
<br />
また、$.getや$.postでは「1.データの加工」の必要がなく、より簡単に実装が可能です。<br />以下で詳細に説明します。
<h2>$.ajax</h2>
$.ajaxはjqueryライブラリを用いていながら処理の複雑さはプレーンjavascriptと変わらないため、原則としてGETメソッドならば$.get、POSTメソッドならば$.postを使用することをオススメします。
<h3>データの加工</h3>
最初にajax通信先urlと送信するデータを作成して、それらを合体させます。
<code class="jq">
	let url = "https://koko-campus.org/example";
	let body = {
		"type" : "get",
		"dataType" : "json"
	};
	let data = {
		"data0" : "ILoveYou",
		"data1" : "IReallyLoveYou"
	};
	body["data"] = data;
</code>
少し見づらくなりますが、直接データ全体を作成することも可能です。
<code class="jq">
	let url = "https://koko-campus.org/example";
	let body = {
		"type" : "get",
		"dataType" : "json",
		"data" :  {
			"data0" : "ILoveYou",
			"data1" : "IReallyLoveYou"
		};
	};
</code>
<h3>httpリクエストの送信</h3>
$オブジェクトのgetメソッドでhttpリクエストを送信します。<br />この戻り値に対してデータを受け取る処理を続けるため、「;」は付けません。
<code class="jq">
	$.get(url, data)
</code>
<h3>受信データの受取り</h3>
成功時にはdoneメソッドが呼び出され、第一引数にはデータが格納されます。<br />第二引数にはstatusコード、第三引数にはjqXHRオブジェクトを格納しますが、一般的なajax通信利用時には使用しないためここでは第一引数のデータのみ取得します。<br /><br />また、失敗時にはfailメソッドが呼び出されます。
<code class="jq">
	.done((response) => {
		console.log(response);
	})
	.fail(() => {
		console.log("I am an error");
	});
</code>
<h2>$.get</h2>
$.ajaxのGETメソッド専用バージョンで、データを加工する必要がないため、簡単に実装できます。
<h3>httpリクエストの送信</h3>
$.get()の第一引数にajax通信先のurlを、第二引数に送信するオブジェクト型のデータを渡します。
<code class="jq">
	let data = {
		"data0" : "ILoveYou",
		"data1" : "IReallyLoveYou"
	};
	$.get("https://koko-campus.org/example", data);
</code>
受信データの受取りは$.ajaxと同様です。
<code class="jq">
	.done((response) => {
		console.log(response);
	})
	.fail(() => {
		console.log("I am an error");
	});
</code>
<h2>$.get</h2>
$.getのPOSTメソッドバージョンです。<br />使用方法は$.getと同様です。
<h3>httpリクエストの送信</h3>
$.post()の第一引数にajax通信先のurlを、第二引数に送信するオブジェクト型のデータを渡します。
<code class="jq">
	let data = {
		"data0" : "ILoveYou",
		"data1" : "IReallyLoveYou"
	};
	$.post("https://koko-campus.org/example", data);
</code>
受信データの受取りは$.ajaxと同様です。
<code class="jq">
	.done((response) => {
		console.log(response);
	})
	.fail(() => {
		console.log("I am an error");
	});
</code>
<h2>load</h2>
ページの一部をリロードするためのメソッドです。<br /><br />update-buttonが押されたら、date.phpにhttpリクエストを送信して、その結果をdatetime挿入します。<br /><br />(javascriptでそのまま現在時刻を取得した方が良さそうですが、、、笑)
<code class="">
	$("#update-button").click(function() {
		$("#datetime").load("date.php");
	});
</code>
load関数の第二引数にコールバック関数を指定することでページのロード終了後の処理を指定できます。
<code class="jq">
	$("#update-button").click(function() {
		$("#datetime").load("date.php", () => {
			console.log("Hi! I am updated!!");
		});
	});
</code>
<?php footer(); ?>