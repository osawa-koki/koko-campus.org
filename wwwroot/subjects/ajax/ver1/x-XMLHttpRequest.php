<?php
include(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "XMLHttpRequest",
	"made" => "2021-10-25",
	"updated" => "2021-10-25"
);
head($obj);
?>
<h2>XMLHttpRequest</h2>
前の授業でAjax通信(非同期通信)について説明しました。<br>XMLHttpRequestはAjax通信を実装する主要な技術です。
<h2>XMLHttpRequest通信の全体像</h2>
当然、幾つかの方法を選択可能ですが、ここではkokoがオススメする方法を紹介します。
<h3>GETメソッド</h3>
<code class="js">
	let xhr = new XMLHttpRequest();
	xhr.addEventListener("load", function() {
		console.log(this.responseText);
	});
	xhr.open("GET", "https://koko-campus.org/example");
	xhr.send();
</code>
<h3>POSTメソッド</h3>
<code class="js">
	let xhr = new XMLHttpRequest();
	xhr.onload = function() {
		console.log(this.responseText);
	};
	xhr.open("POST", "https://koko-campus.org/example");
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded;charset=UTF-8');
	xhr.send("data0=ILoveYou&amp;data1=IReallyLoveYou");
</code>
<h2>実装手順</h2>
以下の4つの手順で非同期通信が行われます。<br>
<ol>
	<li>XMLHttpRequestオブジェクトの生成</li>
	<li>HTTPレスポンス受信時の処理の設定</li>
	<li>HTTPリクエストのメソッドとURLの指定</li>
	<li>HTTPリクエストの送信</li>
</ol><br>
<h2>1.XMLHttpRequestオブジェクトの生成</h2>
<code class="js">
	let xhr = new XMLHttpRequest();
</code>
「xhr」という変数にXMLHttpRequestインスタンスを代入します。
<h2>2.HTTPレスポンス受信時の処理の設定</h2>
HTTPレスポンス受信時の処理の設定では主に以下の2つの方法があります。
<br />
<ul>
	<li>「onload」を使用する方法 (kokoのオススメ!)</li>
	<li>「addEventListener」を使用する方法 (そこそこ簡単)</li>
	<li>「onreadystatechange」を使用する方法 (上級者向け)</li>
</ul>
<h3>2.1.「onload」を使用する方法</h3>
kokoがオススメするとっても簡単な方法です。<br />「xhr」のonloadメソッドを使用します。<br />受信データはxhrのresponseTextプロパティに格納されているため、this.responseTextで取り出せます。
<code class="js">
	xhr.onload = () => {
		if (this.state === 200) {
			console.log(this.responseText); //通信成功時の処理
		} else {
			console.error("Hi! I am an error!"); //通信失敗時の処理...
		}
	}
</code>
ajax通信が成功か失敗かを判定するためには「xhr.state」が「200」であるかどうかで判断します。<br /><br />成功時にhttpステータスコードが200以外を返す場合はこれをif条件に追加するか、もしくはサーバの設定を変更して「200」を返すようにします。<br /><br />上では簡単のため、アロー関数を使用しましたが、通常の関数(無記名関数)を使用すると以下のようになります。
<code class="js">
	xhr.onload = function() {
		if (this.state === 200) {
			console.log(this.responseText); //通信成功時の処理
		} else {
			console.error("Hi! I am an error!"); //通信失敗時の処理...
		}
	});
</code>
<h3>2.2.「addEventListener」を使用する方法</h3>
「onload」を使用する方法と同じく、とっても簡単です。<br />「xhr」にイベントリスナー「load」を設定して、呼び出された関数内で受信データを受け取ります。
<code class="js">
	xhr.addEventListener("load", function() {
		if (this.state === 200) {
			console.log(this.responseText); //通信成功時の処理
		} else {
			console.error("Hi! I am an error!"); //通信失敗時の処理...
		}
	});
</code>
<h3>2.3.「onreadystatechange」を使用する方法</h3>
ajax通信の進行を詳細に把握して、それに応じた処理が可能です。
<code class="js">
	xhr.onreadystatechange = function() {
		switch (xhr.readyState) {
			case 0:
				//unsent(初期化中の処理)...
				break;
			case 1:
				//opened(送信中の処理)...
				break;
			case 2:
				//headers_received(応答待ちの処理)...
				break;
			case 3:
				//loading(受信中の処理)...
				break;
			case 4:
				//done(ajax通信完了)...
				break;
		}
	}
</code>
xhrのプロパティである「readyState」が変更されると呼び出されます。<br />「readyState」の値の意味は以下の通りです。<br />
<br />
<table>
	<thead>
		<tr>
			<td>readyState</td>
			<td>意味</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>0</td>
			<td>unsent<br /><p>open()メソッドが呼び出されていない状態です。</p></td>
		</tr>
		<tr>
			<td>1</td>
			<td>opened<br /><p>open()メソッドが呼び出されている状態です。</p></td>
		</tr>
		<tr>
			<td>2</td>
			<td>headers_received<br /><p>send()メソッドが呼び出されている状態です。</p></td>
		</tr>
		<tr>
			<td>3</td>
			<td>
				loading<br /><p>httpレスポンスデータを受信している状態です。</p>
				※xhr.onproress = 関数...と同じです。
			</td>
		</tr>
		<tr>
			<td>4</td>
			<td>
				done<br /><p>ajax通信が完全に完了または失敗した状態です。</p>
				※xhr.onload = 関数...と同じです。
			</td>
		</tr>
	</tbody>
</table>
<br />
通常は「readyState」が「4」(done)になった際に、ajax通信が成功か失敗かを判定して処理をします。
<code class="js">
	if (this.state === 200) {
		console.log(this.responseText); //通信成功時の処理...
	} else {
		console.error("Hi! I am an error!"); //通信失敗時の処理...
	}
</code>
「onreadystatechange」を使用してデータ受信時の処理のみを行う場合は以下のコードを使用してください。
<code class="js">
	xhr.onreadystatechange = function() {
		if (this.readyState === 4 &amp;&amp; this.state === 200) {
			console.log(this.responseText);
		}
	}
</code>
実際のところ、「this.state === 200」の場合(http応答が成功したという情報を受け取った場合)は、絶対に「readyState === 4」(httpリクエストを送信済み)が成立しているハズなので省略できますが、準公式ドキュメントである<a href="https://developer.mozilla.org/ja/docs/Web/API/XMLHttpRequest/Using_XMLHttpRequest">MDNのwebサイト</a>にしたがって「readyState === 4」を条件に入れています。
<h2>3.HTTPリクエストのメソッドとURLの指定</h2>
HTTPリクエストの種類として「GET」メソッドと「POST」メソッドがあります。<br />簡単なデータを送信する際には「GET」メソッド、機密データや大量のデータを送信する際には「POST」メソッドを採用してください。
<h3>3.1.GETメソッド</h3>
第一引数に「GET」を指定し、第二引数にクエリストリングを含んだurlを指定します。<br />urlは「?」の後に「キー」=「バリュー」の形で付加します。<br />複数個存在する場合には「&amp;」で結合します。<br />以下は「data0」に「ILoveYou」を、「data1」に「IReallyLoveYou」を送信する例です。
<code class="js">
	xhr.open("GET", "http://koko-campus.org/example?data0=ILoveYou&amp;data1=IReallyLoveYou");
</code>
<h3>3.2.POST</h3>
httpリクエストのボディ部にデータを格納します。<br />ここでは、第一引数に「POST」を指定します。<br />データの引渡しはここでは行わずに次で行います。
<code class="js">
	xhr.open("POST", "http://koko-campus.org/example");
</code>
<h2>4.HTTPリクエストの送信</h2>
<h3>GET</h3>
GETメソッドでは、引数は空でsendメソッドを呼び出します。
<code class="js">
	xhr.send();
</code>
<h3>POST</h3>
POSTメソッドでは、最初にhttpリクエストヘッダで送信するデータの形式をsetRequestHeaderメソッドで指定します。<br />具体的には「Content-Type」に「application/x-www-form-urlencoded;charset=UTF-8」を指定します。(文字コードは原則UTF-8を指定)<br />次にsendメソッドを呼び出し、引数に「キー」= 「バリュー」を「&amp;」でつないだ文字列を渡します。
<code class="js">
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded;charset=UTF-8');
	xhr.send("data0=ILoveYou&amp;data1=IReallyLoveYou");
</code>
「キー」= 「バリュー」を「&amp;」でつないだ文字列を作成するのが億劫な人のために、簡単に作成するcreate_qstring関数を作成しました♪<br />引数にオブジェクト型のデータを渡して実行すると、「キー」= 「バリュー」を「&amp;」でつないだ文字列を戻り値で返します。
<code class="js">
	function create_qstring(arg) {
		let ary = new Array;
		for (let key in arg) {
			ary.push(key + "=" + arg[key]);
		}
		return ary.join("&amp;");
	}
</code>
<h2>留意点・注意点</h2>
<ul>
	<li>同一ドメインポリシに基づいて、原則として異なるドメインに存在するデータはajax通信では取得できません。</li>
	<li>ajax通信はjavascriptを使用しているため、ユーザがjavascriptをオフにしている際にはデータを取得できません。</li>
	<li>ブラウザに過度な負荷をかける危険性があります。</li>
</ul>
<br>
最近では、XMLHttpRequestよりも簡単にajax通信を実行できるfetchが用いられることが多くなっています。<br />では、fetchの授業に進みましょう♪
<?php footer(); ?>