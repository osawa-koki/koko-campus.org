<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj=array(
	"made" => "2021-11-20",
	"updated" => "2021-11-20"
);
head($obj);
?>
<h2>html</h2>
htmlについては簡単な書き方を理解していますか?<br />ここはphpがテーマですのでhtmlに関する深い知識は必要ありませんが、webサイトを構築するにあたってhtmlの知識は必要不可欠です。<br />htmlについてのページで学習してください。
<p class="r">htmlのページは<a href="../../html&css入門/branch">こちら</a>。</p>
一応コピペで対応できるようにはしますが、望ましくないです。<br />他のサイトではコピペをかなり揶揄していることが多く、僕自身もコピペではなく自分で書いてほしいと思うのですが、途中でプログラミングの楽しさに気づいてくれるかもしれませんので、、、!!
<br /><br />
最初にhtmlを用いる際にひな形となるhtmlファイルを作成しましょう♪
<code class="html">
	&lt;!DOCTYPE html&gt;
	&lt;html lang="ja"&gt;
		&lt;head&gt;
			&lt;meta charset="utf-8" /&gt;
			&lt;title&gt;自己紹介しましょう♪&lt;/title&gt;
		&lt;/head&gt;
		&lt;body&gt;
			!!ここにhtmlの本体を書いていきます!!
		&lt;/body&gt;
	&lt;/html&gt;
</code>
これ以降のhtmlコードは「!!ここにhtmlの本体を書いていきます!!」の部分のみ記述します。<br /><br />このhtmlは必要最低限な情報です。<br />あくまでもフォームを作成するためのサイトですので、、、
<h2>フォーム</h2>
ユーザに何かを入力させるための部分を「フォーム」と言います。<br />htmlでは「form」タグを用います。<br /><br />具体的には以下のようになります。
<code class="html">
	&lt;form method="post" action="next.php"&gt;
		!!ここに入力させる情報を入れていきます。!!
	&lt;/form&gt;
</code>
<h3>フォームの構成</h3>
フォームは以下の属性値を持ちます。
<table class="exp">
	<caption>formの属性値</caption>
	<tbody>
		<tr>
			<th>method</th>
			<td>https通信の方法で、「GET」と「POST」を覚えてください。<br />簡単なデータならば「GET」・大量または重要なデータならば「POST」を使用してください。<br />ここでは原則として「POST」を用います。</td>
		</tr>
		<tr>
			<th>action</th>
			<td>
				submit(送信)ボタンを押した際に遷移するページを指定します。<br />ここでは「next.php」とします。
				<p class="r">僕が作成した「.htaccess」ファイルを使用している方は拡張子である「.php」を省略して「next」だけでもok!です。</p>
			</td>
		</tr>
	</tbody>
</table>
<h3>送信データ</h3>
では、ユーザにどんなデータを送信させましょうか???<br />先ほどのhtmlのひな形のタイトルを見た方は察することができると思いますが、ここではユーザに自己紹介をしてもらいましょう♪<br /><br />なぜ自己紹介にしたかというと、文字列の入力だけでなく日付や選択式のデータも入力させることができるからです。<br /><br />ここでは以下の内容をユーザに登録してもらいましょう♪
<br />
<ul>
	<li>名前</li>
	<li>生年月日</li>
	<li>血液型</li>
	<li>自己紹介</li>
</ul>
<div class="goal">
	<div class="goal-title">
		自己紹介記入カード
	</div>
	名前
	<br />
	<input type="text" name="name" />
	<br />
	生年月日
	<br />
	<input type="date" name="birthday" />
	<br />
	血液型
	<br />
	<select name="blood-type">
		<option value="a">A型</option>
		<option value="b">B型</option>
		<option value="ab">AB型</option>
		<option value="o">O型</option>
	</select>
	<br />
	自己紹介
	<br />
	<textarea name="hello-comment" rows="5" cols="30"></textarea>
	<br />
	<input type="submit" value="登録" disabled />
</div>
<br />
こんな感じです。<br /><br />これらのデータは以下のように説明できます。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>名前</th>
			<td>テキスト(文字列)です。</td>
		</tr>
		<tr>
			<th>生年月日</th>
			<td>日付型です。</td>
		</tr>
		<tr>
			<th>血液型</th>
			<td>A・B・AB・Oのいずれかです。</td>
		</tr>
		<tr>
			<th>自己紹介</th>
			<td>長いテキスト(文字列)です。</td>
		</tr>
	</tbody>
</table>
<br />
ということでさっそくひとつずつ説明していきます。
<h4>input</h4>
formタグ内にinputタグを入れることでユーザがテキストを入力する用のエリアを作成します。<br />コードは以下のようになります。
<code class="html">
	&lt;input type="text" name="name" required /&gt;
	&lt;input type="date" name="birthday" required /&gt;
	&lt;input type="submit" value="登録" /&gt;
</code>
inputタグの属性値は以下のようになります。
<table class="exp">
	<caption>inputの属性値</caption>
	<tbody>
		<tr>
			<th>type</th>
			<td>入力する内容のタイプを指定します。<br />「text」「date」「password」「submit」が指定できます。<br /><br />ここではユーザの名前を「text」、ユーザの生年月日を「date」、登録ボタンを「submit」で指定しています。<br />また、登録ボタンの文字はvalue=「・・・」で指定します。</td>
		</tr>
		<tr>
			<th>name</th>
			<td>遷移先のページでユーザが入力したデータを取り出すための識別子です。<br />重複したものは付けられません。<br /><br />ここではユーザの名前を「name」、ユーザの生年月日を「birthday」としています。</td>
		</tr>
		<tr>
			<th>required</th>
			<td>「required」と付けることで、入力を強制して未入力の状態でボタンが押せなくなります。</td>
		</tr>
	</tbody>
</table>
<h4>select・option</h4>
ユーザに選択肢を選択させます。<br />コードは以下のようになります。
<code class="html">
	&lt;select name="blood-type"&gt;
		&lt;option value="a"&gt;A型&lt;/option&gt;
		&lt;option value="b"&gt;B型&lt;/option&gt;
		&lt;option value="ab"&gt;AB型&lt;/option&gt;
		&lt;option value="o"&gt;O型&lt;/option&gt;
	&lt;/select&gt;
</code>
<br />
selectの構成は以下のようになっています。
<table class="exp">
	<caption>selectの属性値</caption>
	<tbody>
		<tr>
			<th>name</th>
			<td>遷移先のページでユーザが入力したデータを取り出すための識別子です。<br /><br />ここではユーザの血液型を「blood-type」としています。</td>
		</tr>
	</tbody>
</table>
<br />
また、select内のoption(選択肢)は以下のようになっています。
<br />
<table class="exp">
	<caption>optionの属性値</caption>
	<tbody>
		<tr>
			<th>value</th>
			<td>遷移先のページでユーザが入力したデータを指定する値となります。<br />具体的にはユーザが血液型で「B型」を選択すると、遷移先での「blood-type」にはvalueで設定された「b」が入ります。</td>
		</tr>
	</tbody>
</table>
<h4>textarea</h4>
ユーザに複数行のテキストを入力するエリアを作成します。<br />コードは以下のようになっています。
<code class="html">
	&lt;textarea name="hello-comment" rows="5" cols="30" required&gt;&lt;/textarea&gt;
</code>
textareaの構成は以下のようになっています。
<table class="exp">
	<caption>textareaの属性値</caption>
	<tbody>
		<tr>
			<th>name</th>
			<td>遷移先のページでユーザが入力したデータを取り出すための識別子です。<br /><br />ここではユーザの自己紹介文を「hello-comment」としています。</td>
		</tr>
		<tr>
			<th>rows</th>
			<td>行数(縦)を指定します。</td>
		</tr>
		<tr>
			<th>cols</th>
			<td>列数(横)を指定します。</td>
		</tr>
		<tr>
			<th>required</th>
			<td>「required」と付けることで、入力を強制して未入力の状態でボタンが押せなくなります。</td>
		</tr>
	</tbody>
</table>
<br />
以上です。<br />最終的なコードを以下に記載します。
<br />
<code class="html">
	&lt;form action="next.php" method="post"&gt;
		&lt;div class="goal-title"&gt;
			自己紹介記入カード
		&lt;/div&gt;
		名前
		&lt;br /&gt;
		&lt;input type="text" name="name" required /&gt;
		&lt;br /&gt;
		生年月日
		&lt;br /&gt;
		&lt;input type="date" name="birthday" required /&gt;
		&lt;br /&gt;
		血液型
		&lt;br /&gt;
		&lt;select name="blood-type"&gt;
			&lt;option value="a"&gt;A型&lt;/option&gt;
			&lt;option value="b"&gt;B型&lt;/option&gt;
			&lt;option value="ab"&gt;AB型&lt;/option&gt;
			&lt;option value="o"&gt;O型&lt;/option&gt;
		&lt;/select&gt;
		&lt;br /&gt;
		自己紹介
		&lt;br /&gt;
		&lt;textarea name="hello-comment" rows="5" cols="30" required&gt;&lt;/textarea&gt;
		&lt;br /&gt;
		&lt;input type="submit" value="登録"/&gt;
	&lt;/form&gt;
</code>
<br /><br />実際にどんなことをするかを実演してみますね♪<br />以下のフォームを実際に入力して送信ボタンを押してください。<br />
<p class="r">普通に次へ進むボタンを押してもokです。</p>
<div id="real-form" class="goal">
	<form action="x-php基礎(1)" method="post">
		<div class="goal-title">
			自己紹介記入カード
		</div>
		名前
		<br />
		<input type="text" name="name" required />
		<br />
		生年月日
		<br />
		<input type="date" name="birthday" required />
		<br />
		血液型
		<br />
		<select name="blood-type">
			<option value="a">A型</option>
			<option value="b">B型</option>
			<option value="ab">AB型</option>
			<option value="o">O型</option>
		</select>
		<br />
		自己紹介
		<br />
		<textarea name="hello-comment" rows="5" cols="30" required></textarea>
		<br />
		<input type="submit" value="登録"/>
	</form>
</div>
<?php footer(); ?>