<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-22",
	"updated" => "2022-03-22"
);
head($obj);
?>
<p id="message">データベースの基礎を学んで、データベースの設計を学んで、、、<br /><br />次はデータベースを操作しましょう♪<br /><br />それでは、Let's shine!!</p>
<h2>SQL</h2>
「Structed Query Language」の略で、データベースを操作するための言語です。<br /><br />SQLの機能は以下の3つに大別されます。
<ul>
	<li>データ定義言語(DDL)</li>
	<li>データ操作言語(DML)</li>
	<li>データ制御言語(DCL)</li>
</ul>
<h3>データ定義言語</h3>
DDL(Data Definition Language)と略されます。<br /><br />データベースのデータ構造を定義する言語です。
<ul>
	<li>CREATE(表の作成)</li>
	<li>DROP(表の削除)</li>
</ul>
<h3>データ操作言語</h3>
DML(Data Manipulation Language)と略されます。<br /><br />データの検索・更新・削除・追加を行うための言語です。
<ul>
	<li>SELECT(検索)</li>
	<li>UPDATE(更新)</li>
	<li>DELETE(削除)</li>
	<li>INSERT(追加)</li>
</ul>
<h3>データ制御言語</h3>
DCL(Data Control Language)と略されます。<br /><br />データベースへのアクセス制御を設定する言語です。
<ul>
	<li>GRANT(権限付与)</li>
	<li>REVOKE(権限剥奪)</li>
</ul>
<h2>会話型SQL・埋込型SQL</h2>
SQLには実行形態から以下の2つに分類されます。
<ul>
	<li>会話型SQL</li>
	<li>埋込型SQL</li>
</ul>
<h3>会話型SQL</h3>
isqlなどのコマンドを用いてコマンドラインからSQL文を実行します。
<h3>埋込型SQL</h3>
CやPHPなどのプログラミング言語に記述されたプログラムに埋め込んでSQL文を実行します。<br />ソースコードに直接SQL文を記述します。<br /><br />埋込型SQLで複数行からなる表を操作する際には<span class="underline">カーソル</span>を用いる必要があります。
<div class="explanation">
	<div class="title">カーソル</div>
	SELECTで複数行が選択された場合に、現在位置を示すポインタとして動作します。<br /><br />FETCH文を用いることで、選択された行を1行ずつ処理を行うことを可能にします。
</div>
<p>埋込型に似たSQL形式としてモジュール言語があります。</p>
<h2>独立言語方式・親言語方式</h2>
<h3>独立言語方式</h3>
プログラムを記述するプログラミング言語からは独立して動作するSQL文を言います。<br />コマンドラインから実行されます。<br /><br />前述の埋込型SQLが該当します。
<h3>親言語方式</h3>
高水準言語(C・PHP)に埋め込んでSQL文を実行する方式で、以下の2種類があります。
<ul>
	<li>埋込型SQL</li>
	<li>モジュール言語<br /><small> (SQLをモジュールとして扱います)</small></li>
</ul>
<?php footer(); ?>