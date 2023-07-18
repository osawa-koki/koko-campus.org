<?php
include(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "Ajax",
	"made" => "2021-10-25",
	"updated" => "2021-10-25"
);
head($obj);
?>
<h2>Ajax</h2>
<p>「Asynchronous JavaScript + XML」の略で、非同期(Asynchronous)のJavaScriptによるXML通信を行う技術を言います。</p>
まずは、Ajaxを以下の3つに分解して説明します。<br>
<ul>
	<li>非同期(Asynchronous)</li>
	<li>JavaScript</li>
	<li>XML</li>
</ul>
<h3>非同期</h3>
<p>WebサーバにHTTPリクエストを送信した際に、当該リクエストに対する応答を待たずに他の処理を可能にする技術です。</p>
例えばTwittterでいいね!をした際には何らかのデータ(HTTPリクエスト)がTwitterのサーバに送信されますが、その応答を受け取るためにページがリロードされることはないと思います。<br>そのページのままユーザはHTTPリクエストを送信したことを意識せずに操作が続けられます。<br>これが<strong>非同期</strong>通信です。<br><br>反対に非同期でない(同期)通信とは、何らかの入力フォームにデータを入力した後に入力確認フォームを押してデータを送信する通信を言います。<br>この方法ではWebサーバから送られるHTTPレスポンスを受け取ってから新しいページが表示されます。
<h3>JavaScript</h3>
<p>Webブラウザ上で動作するプログラミング(スクリプト)言語です。</p>
Ajax通信を学習している皆さんはある程度JavaScriptに関する知識を有していると思います。<br>Webブラウザ上で動作することを要求するAjax通信には必要不可欠な技術です。
<h3>XML</h3>
「eXtensible Markup Language」の略で、ツリー階層のデータを言います。<br>XMLという文字が含まれていますが、Ajax通信はXML以外のデータの通信も可能です。<br>どちらかというと、Ajax通信ではXML形式のデータではなくjson形式のデータがやり取りされることが多いです。
<h2>実装方法</h2>
JavaScriptによるAjax通信を実現する技術には以下の2つがあります。<br>
<ul>
	<li>XMLHttpRequest</li>
	<li>fetch</li>
</ul>
<p>一般に「XMLHttpRequest」は古くからある非同期通信技術で2021年現在においても広く使用されていますが、ここ最近は簡単に実装できる「fetch」の使用も増えてきています。</p>
<h2>注意点</h2>
<p>Ajax通信は単一のページ内でWebサーバと通信することを実現する便利な技術ですが、使い方には要注意です。<br>Ajax通信を使用する際に注意するべき点は以下の通りです。</p>
<ul>
	<li>Webサーバの負荷の増大</li>
	<li>文字コード制限</li>
	<li>クロスドメイン制限</li>
</ul>
<h3>Webサーバの負荷の増大</h3>
必然的にサーバのデータ処理の必要性が増加するため、Webサーバがこの負荷に耐えられる性能が要求されます。
<h3>文字コード制限</h3>
文字コードは原則として「<strong>UTF-8</strong>」で指定する必要があります。<br>UTF-8以外の文字コードを指定すると文字化けをおこす可能性があります。
<h3>クロスドメイン制限</h3>
同一オリジンポリシに基づいて、JavaScriptによるAjax通信ではHTMLと同一ドメイン上にあるファイルしか取得できません。<br>
<span class="r">
	!同一オリジンポリシ!
	?あるオリジンによって読み込まれた文書やスクリプトが、他のオリジンにあるリソースにアクセスできる方法を制限するものです。<br><br><span class="q">https://developer.mozilla.org/ja/docs/Web/Security/Same-origin_policy</span>
</span>


<?php footer(); ?>