<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-11-26",
	"updated" => "2021-11-26"
);
head($obj);
?>
<h2>sqlの種類</h2>
sql(structed query language)は以下の3つに分類できます。
<br />
<ul>
	<li>データ定義言語</li>
	<li>データ制御言語</li>
	<li>データ操作言語</li>
</ul>
<br />
<h3>データ定義言語</h3>
「data definition language」で、「DDL」と略されます。<br /><br />データベースのデータ構造を定義します。<br /><br />表を作成する「CREATE」や表を削除する「DROP」が該当します。
<h3>データ制御言語</h3>
「data control language」で、「DCL」と略されます。<br /><br />データベースに対するアクセス制御を定義します。<br /><br />権限を与える「GRANT」や権限を剥奪する「REVOKE」が該当します。
<h3>データ操作言語</h3>
「data manipulation language」で、「DML」と略されます。<br /><br />データの検索・更新・削除・追加を行うための言語です。<br /><br />ここでは、このデータ操作言語について説明しますね♪
<h2>データ操作の種類</h2>
上で説明した通り、データ操作は以下の4つに分類されます。
<br />
<ul>
	<li>検索</li>
	<li>更新</li>
	<li>削除</li>
	<li>追加</li>
</ul>
<h3>検索</h3>
検索文の基本構造は「<strong>SELECT 列名 FROM テーブル名 WHERE 条件</strong>」です。<br /><br />例えば以下のデータを保存しているデータベースの「generation3」表からtype1が「ほのお」である「name」を抜き出すsqlはこうなります。
<br />
<div class="sql">
	SELECT name FROM generation3 WHERE type1 = 'ほのお'
</div>
<br />
<table class="db" border="1">
	<caption>generation3</caption>
	<thead>
		<tr>
			<td>number</td>
			<td>name</td>
			<td>type1</td>
			<td>type2</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>4</td>
			<td>アチャモ</td>
			<td>ほのお</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>31</td>
			<td>サーナイト</td>
			<td>エスパー</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>82</td>
			<td>スバメ</td>
			<td>ノーマル</td>
			<td>ひこう</td>
		</tr>
		<tr>
			<td>154</td>
			<td>キュウコン</td>
			<td>ほのお</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>186</td>
			<td>キングドラ</td>
			<td>みず</td>
			<td>ドラゴン</td>
		</tr>
		<tr>
			<td>204</td>
			<td>ニンフィア</td>
			<td>フェアリー</td>
			<td>NULL</td>
		</tr>
	</tbody>
</table>
<p>検索するカラムが複数存在する際には「,(カンマ)」で区切って書きます。<br />「SELECT id, name」</p>
<p>全てのカラムを検索する際には「*(アスタリスク)」を使用します。<br />「SELECT *」</p>
<h3>更新</h3>
あっ!<br />そういえば!!!<br /><br />「X・Y」の時代からフェアリータイプが追加されて、サーナイトのtype2にフェアリーが追加されましたね♪<br /><br />sqlを用いて更新してみましょう♪
<div class="sql">
	UPDATE generation3 SET type2 = 'フェアリー' WHERE name = 'サーナイト'
</div>
<table class="db" border="1">
	<caption>generation3</caption>
	<thead>
		<tr>
			<td>number</td>
			<td>name</td>
			<td>type1</td>
			<td>type2</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>4</td>
			<td>アチャモ</td>
			<td>ほのお</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>31</td>
			<td>サーナイト</td>
			<td>エスパー</td>
			<td><span class="u">フェアリー</span></td>
		</tr>
		<tr>
			<td>82</td>
			<td>スバメ</td>
			<td>ノーマル</td>
			<td>ひこう</td>
		</tr>
		<tr>
			<td>154</td>
			<td>キュウコン</td>
			<td>ほのお</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>186</td>
			<td>キングドラ</td>
			<td>みず</td>
			<td>ドラゴン</td>
		</tr>
		<tr>
			<td>204</td>
			<td>ニンフィア</td>
			<td>フェアリー</td>
			<td>NULL</td>
		</tr>
	</tbody>
</table>
<br />
このように更新用のsqlは「<strong>UPDATE テーブル名 SET 列名 = 値 WHERE 条件</strong>」で作成します。
<p>SETの内容が複数存在する場合には「,(カンマ)」で区切って表します。<br />「SET type1 = 'エスパー', type2 = 'フェアリー'」</p>
<p>WHERE句で条件を設定しないと全部のデータが変更されることに注意してください。</p>
<h3>削除</h3>
皆さんご存じの通り、ニンフィアは第三世代のポケモンではありませんね♪<br /><br />ではニンフィアを削除してみましょう♪
<br />
<div class="sql">
	DELETE FROM generation3 WHERE name = 'ニンフィア'
</div>
<table class="db" border="1">
	<caption>generation3</caption>
	<thead>
		<tr>
			<td>number</td>
			<td>name</td>
			<td>type1</td>
			<td>type2</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>4</td>
			<td>アチャモ</td>
			<td>ほのお</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>31</td>
			<td>サーナイト</td>
			<td>エスパー</td>
			<td>フェアリー</td>
		</tr>
		<tr>
			<td>82</td>
			<td>スバメ</td>
			<td>ノーマル</td>
			<td>ひこう</td>
		</tr>
		<tr>
			<td>154</td>
			<td>キュウコン</td>
			<td>ほのお</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>186</td>
			<td>キングドラ</td>
			<td>みず</td>
			<td>ドラゴン</td>
		</tr>
	</tbody>
</table>
<br />
このように削除用のsqlは「<strong>DELETE FROM テーブル名 WHERE 条件式</strong>」で作成します。
<p>WHERE句で条件を指定しないと全データを削除することに注意してください。</p>
<h3>追加</h3>
第三世代と言えば「レックウザ」ですよね♪<br /><br />追加しましょう♪
<br />
<div class="sql">
	INSERT INTO generation3 (id, name, type1, type2) VALUES (200, レックウザ, ドラゴン, ひこう)
</div>
<table class="db" border="1">
	<caption>generation3</caption>
	<thead>
		<tr>
			<td>number</td>
			<td>name</td>
			<td>type1</td>
			<td>type2</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>4</td>
			<td>アチャモ</td>
			<td>ほのお</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>31</td>
			<td>サーナイト</td>
			<td>エスパー</td>
			<td>フェアリー</td>
		</tr>
		<tr>
			<td>82</td>
			<td>スバメ</td>
			<td>ノーマル</td>
			<td>ひこう</td>
		</tr>
		<tr>
			<td>154</td>
			<td>キュウコン</td>
			<td>ほのお</td>
			<td>NULL</td>
		</tr>
		<tr>
			<td>186</td>
			<td>キングドラ</td>
			<td>みず</td>
			<td>ドラゴン</td>
		</tr>
		<tr>
			<td>200</td>
			<td>レックウザ</td>
			<td>ドラゴン</td>
			<td>ひこう</td>
		</tr>
	</tbody>
</table>
<br />
このように追加用のsqlは「<strong>INSERT INTO generation3 (カラム1, カラム2, カラム3, ...) VALUES (値1, 値2, 値3, ...)</strong>」で作成します。
<br /><br /><br />
以上です。<br />もっと詳しくsqlについて学びたい方はsql入門へ進んでください。
<?php footer(); ?>