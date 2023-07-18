<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"made" => "2021-12-20",
	"updated" => "2021-12-20"
);
head($obj);
?>
<!--
<(\/?)(.+?)>
&lt;$1$2&gt;
-->
<h2>コメントアウト</h2>
htmlの中にちょっとしたメモ書きをするためには「&lt;!--コメントアウト--&gt;」を使用します。
<code class="html">
	あいうえお
	&lt;!--ここに書いた内容はページ上には表示されません--&gt;
</code>
<div class="result">
	あいうえお
	<!--ここに書いた内容はページ上には表示されません-->
</div>
ブラウザの開発者ツールからは見ることができるので機密情報は絶対に書かないでください。<br />あくまでもメモ書きとして用いてください。
<h2>改行タグ</h2>
html内で使用したスペース・タブ文字はページに表示される際には無視されます。
<p class="r">スペースに関しては文字の間で使用した場合は表示されます。</p>
<br />
意図的に改行したい場合は、「&lt;br /&gt;」を使用します。
<code class="html">
	はじめまして。&lt;br /&gt;今日も
	良い天気ですね♪
</code>
<div class="result">
	はじめまして。<br />今日も
	良い天気ですね♪
</div>
「br」タグは少し特殊で閉じタグを持ちません。<br />開始タグ内で閉じタグ(/)を入れますが、これは省略して「&lt;br&gt;」と書くこともできます。
<p class="r">htmlでは省略可能ですがxmlでは省略が原則不可ですので、省略せずに書く癖を付けましょう♪</p>
「&lt;br /&gt;」を複数個連続で使用すればページに空白を作成することができますが、ページ上の空白は後で説明するmargin・paddingで調整するべきであって、「&lt;br /&gt;」でページ上の余白を作成するのは推奨されません。
<h2>見出し</h2>
見出しには「&lt;1&gt;」～「&lt;6&gt;」のタグを使用します。
<code class="html">
	&lt;h1&gt;見出し1&lt;/h1&gt;
	&lt;h2&gt;見出し2&lt;/h2&gt;
	&lt;h3&gt;見出し3&lt;/h3&gt;
	&lt;h4&gt;見出し4&lt;/h4&gt;
	&lt;h5&gt;見出し5&lt;/h5&gt;
	&lt;h6&gt;見出し6&lt;/h6&gt;
</code>
<div class="result">
	<h1 class="x">見出し1</h1>
	<h2 class="x">見出し2</h2>
	<h3 class="x">見出し3</h3>
	<h4 class="x">見出し4</h4>
	<h5 class="x">見出し5</h5>
	<h6 class="x">見出し6</h6>
</div>
見出しはあくまでも見出し用のタグとして用いるべきであって乱用するべきではありません。<br />また、構成として適切であるべきで、いきなりh3から始まったり、h2の中にh1があったり、h1の次にいきなりh4に飛んだりするべきではありません。
<h2>リスト</h2>
リストを作成します。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">ul</td>
			<td width="50%">ol</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>箇条書きのリストを作成します。</td>
			<td>順序付きのリストを作成します。</td>
		</tr>
	</tbody>
</table>
<br />
リストの要素は「li」タグを使用します。
<code class="html">
	&lt;ul&gt;
		&lt;li&gt;なえとる&lt;/li&gt;
		&lt;li&gt;ひこざる&lt;/li&gt;
		&lt;li&gt;ぽっちゃま&lt;/li&gt;
	&lt;/ul&gt;
	&lt;br /&gt;
	&lt;ol&gt;
		&lt;li&gt;ちこりーた&lt;/li&gt;
		&lt;li&gt;ひのあらし&lt;/li&gt;
		&lt;li&gt;わにのこ&lt;/li&gt;
	&lt;/ol&gt;
</code>
<div class="result">
	<ul class="x">
		<li>なえとる</li>
		<li>ひこざる</li>
		<li>ぽっちゃま</li>
	</ul>
	<br />
	<ol class="x">
		<li>ちこりーた</li>
		<li>ひのあらし</li>
		<li>わにのこ</li>
	</ol>
</div>
<h2>文章</h2>
文章を表すためには「p」タグを使用します。<br />「p」タグを使用すると、「&lt;br /&gt;」を使用しなくても自動で改行されます。
<code class="html">
	&lt;p&gt;「さよなら」だけだった。その一言で全てが分かった。日が沈み出した空と君の姿。フェンス越しに重なっていた。&lt;/p&gt;
	&lt;p&gt;初めて会った日から。僕の心の全てを奪った。どこか儚い空気を纏う君は。寂しい目をしてたんだ。&lt;/p&gt;
	&lt;p&gt;いつだってチックタックと。鳴る世界で何度だってさ。触れる心無い言葉うるさい声に。涙が零れそうでも。ありきたりな喜びきっと二人なら見つけられる。&lt;/p&gt;
	&lt;!--「夜に駆ける – YOASOBI」より--&gt;
</code>
<div class="result">
	<p class="x">「さよなら」だけだった。その一言で全てが分かった。日が沈み出した空と君の姿。フェンス越しに重なっていた。</p>
	<p class="x">初めて会った日から。僕の心の全てを奪った。どこか儚い空気を纏う君は。寂しい目をしてたんだ。</p>
	<p class="x">いつだってチックタックと。鳴る世界で何度だってさ。触れる心無い言葉うるさい声に。涙が零れそうでも。ありきたりな喜びきっと二人なら見つけられる。</p>
	<!--「夜に駆ける – YOASOBI」より-->
</div>
<h2>表</h2>
<table class="exp">
	<tbody>
		<tr>
			<th>「table」タグ</th>
			<td>表を表すタグです。<br />「thead」タグ、ないしは、「tbody」タグを含みます。</td>
		</tr>
		<tr>
			<th>「thead」タグ</th>
			<td>表の見出しを作成します。<br />「tr」タグを含みます。</td>
		</tr>
		<tr>
			<th>「tbody」タグ</th>
			<td>表の中身を作成します。<br />「thead」タグと同様に「tr」タグを含みます。</td>
		</tr>
		<tr>
			<th>「tr」タグ</th>
			<td>「table row」で、表の行(横のライン)を作成します。<br />「th」タグ・「td」タグを含みます。</td>
		</tr>
		<tr>
			<th>「th」タグ</th>
			<td>表の見出しを作成します。<br />「thead」のセルバージョンです。<br />表示するデータを含みます。</td>
		</tr>
		<tr>
			<th>「td」タグ</th>
			<td>「table data」で、表のセル(一番小さな単位)を作成します。<br />表示するデータを含みます。</td>
		</tr>
	</tbody>
</table>
<br />
因みに上の表も「table」タグで作成しています。<br />上の表のコードを紹介しますね♪
<p class="r">若干修正しています。</p>
<code class="html">
	&lt;table border="1"&gt;
		&lt;tbody&gt;
			&lt;tr&gt;
				&lt;th&gt;「table」タグ&lt;/th&gt;
				&lt;td&gt;表を表すタグです。&lt;br /&gt;「thead」タグ、ないしは、「tbody」タグを含みます。&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;th&gt;「thead」タグ&lt;/th&gt;
				&lt;td&gt;表の見出しを作成します。&lt;br /&gt;「tr」タグを含みます。&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;th&gt;「tbody」タグ&lt;/th&gt;
				&lt;td&gt;表の中身を作成します。&lt;br /&gt;「thead」タグと同様に「tr」タグを含みます。&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;th&gt;「tr」タグ&lt;/th&gt;
				&lt;td&gt;「table row」で、表の行(横のライン)を作成します。&lt;br /&gt;「th」タグ・「td」タグを含みます。&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;th&gt;「th」タグ&lt;/th&gt;
				&lt;td&gt;表の見出しを作成します。&lt;br /&gt;「thead」のセルバージョンです。&lt;br /&gt;表示するデータを含みます。&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;th&gt;「td」タグ&lt;/th&gt;
				&lt;td&gt;「table data」で、表のセル(一番小さな単位)を作成します。&lt;br /&gt;表示するデータを含みます。&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
</code>
tableの「border」属性に「1」を設定して、表の枠を表示しています。
<h3>セルの結合</h3>
複数のセルを結合して1つの大きなセルを作成することもできます。<br />横方向につなげる際は「td」タグに「colspan="つなげるセルの数"」、縦方向につなげる際には「td」タグに「rowspan="つなげるセルの数"」を設定します。
<code class="html">
	&lt;table border="1"&gt;
		&lt;tbody&gt;
			&lt;tr&gt;
				&lt;td colspan="2"&gt;横方向に結合&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td rowspan="2"&gt;縦方向に結合&lt;/td&gt;
				&lt;td&gt;通常のセル&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td&gt;通常のセル&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
</code>
<div class="result">
	<table border="1">
		<tbody>
			<tr>
				<td colspan="2">横方向に結合</td>
			</tr>
			<tr>
				<td rowspan="2">縦方向に結合</td>
				<td>通常のセル</td>
			</tr>
			<tr>
				<td>通常のセル</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>画像</h2>
画像を表示する場合は「img」タグを使用します。<br />「img」タグは「&lt;br /&gt;」タグ同様に閉じタグを持ちません。<br />「img」タグの属性には以下の2つを設定します。
<br /><br />
<table class="exp">
	<tbody>
		<tr>
			<th>src</th>
			<td>画像ファイルへのパス(画像ファイルの保存場所)を指定します。</td>
		</tr>
		<tr>
			<th>alt</th>
			<td>画像ファイルの表示に失敗した際に代わりに表示するテキストを設定します。</td>
		</tr>
	</tbody>
</table>
<h3>src</h3>
src属性で画像ファイルのパス(path/道のり)を指定する方法には以下の2つがあります。
<br /><br />
<table class="exp">
	<thead>
		<tr>
			<td width="50%">絶対パス指定</td>
			<td width="50%">相対パス指定</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>httpから始まる完全なパスを指定します。</td>
			<td>今いるhtmlファイルの保存場所を起点として画像ファイルの場所を指定します。</td>
		</tr>
	</tbody>
</table>
<h4>絶対パス指定</h4>
サイトのロゴなどの絶対に保存場所が変わらない場合に使用します。<br />全部絶対パスではディレクトリを移動させた際に指定が崩れてしまうという問題や、コードを書く量が増えてしまうという問題があります。<br /><br />このページでは、左上に表示されているkoko-campusのロゴに対して使用しています。<br /><br />「src="koko-campus.org/pics/logo.png"」って感じで使用します。
<h4>相対パス指定</h4>
同一ディレクトリ内、もしくは保存しているディレクトリが近い場合に指定します。<br />この方法では、ディレクトリごと移動させた場合にパス指定が崩れないという問題があります。<br />もっとも、一度アップしたサイトの場所を頻繁に変更するには外部からのハイパーリンクが機能しなくなるため推奨できませんが、、、<br />コード量を抑えるというメリットもあります。<br /><br />あまりwebサイトの内部情報を公開したくありませんが、このページではhtml&css入門でしか用いない画像はhtml&cssディレクトリ内のpicsディレクトリにまとめているので、これを相対パスで指定しています。<br /><br />ひとつ上のpicsディレクトリにあるlogo.pngを指定する場合は「../pics/logo.png」、ふたつ上の場合は「../../pics/logo.png」、同一ディレクトリ内にあるlogo.pngを指定する場合は「logo.png」、同一ディレクトリ内のpicsディレクトリ内にあるlogo.pngを指定する場合は「pics/logo.png」と指定します。
<h3>alt</h3>
画像ファイルが存在しない、もしくは、その他の理由によって表示できない場合に代替として表示するテキストを設定します。
<code class="html">
	&lt;img src="../pics/パームジュメイラ.png" alt="パームジュメイラの画像" /&gt;
	&lt;img src="../pics/ツチノコ.png" alt="ツチノコの画像" /&gt;
</code>
<div class="result">
	<img src="../pics/パームジュメイラ.png" alt="パームジュメイラの画像" />
	<img src="../pics/ツチノコ.png" alt="ツチノコの画像" />
</div>
<h2>リンク</h2>
htmlで他のページへのリンクを貼ることができます。<br />「a」タグを使用します。<br />「href」属性で遷移先のurlを指定します。<br />このurlの指定に関しても「相対パス指定」と「絶対パス指定」が使用可能です。
<code class="html">
	トップページは&lt;a href="https://koko-campus.org"&gt;こちら&lt;/a&gt;。
</code>
<div class="result">
	トップページは<a href="https://koko-campus.org">こちら</a>。
</div>
また、「target」属性に「_blank」を設定すると、別タブを開いて遷移先のページを表示します。
<code class="html">
	トップページは&lt;a href="https://koko-campus.org" target="_blank"&gt;こちら&lt;/a&gt;。
</code>
<div class="result">
	トップページは<a href="https://koko-campus.org" target="_blank">こちら</a>。
</div>
<h2>フォーム</h2>
ユーザに情報を入力させます。<br />ユーザが入力したデータを取得するにはphpなどのサーバサイドの言語を学ぶ必要があるためここでは扱いません。<br />あくまでもフォームの部分のみ説明します。
<p class="r">phpの授業は<a href="../../php入門/branch">こちら</a>。</p>
フォームの作成には「form」タグを用います。<br />具体的には以下のコードを記述します。
<code class="html">
	&lt;form method="post" action="next.php"&gt;
		&lt;!--ここに入力させる情報を入れていきます。--&gt;
	&lt;/form&gt;
</code>
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
			</td>
		</tr>
	</tbody>
</table>
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
			<td>入力する内容のタイプを指定します。<br />「text」「date」「password」「submit」が指定できます。</td>
		</tr>
		<tr>
			<th>name</th>
			<td>遷移先のページでユーザが入力したデータを取り出すための識別子です。<br />重複したものは付けられません。</td>
		</tr>
		<tr>
			<th>required</th>
			<td>「required」と付けることで、入力を強制して未入力の状態でボタンが押せなくなります。</td>
		</tr>
	</tbody>
</table>
<br />
また「input」タグは「br」タグ・「img」タグ同様に閉じタグがありません。
<code class="html">
	&lt;form method="post" action="next.php"&gt;
		名前
		&lt;br /&gt;
		&lt;input type="text" name="txt" /&gt;
		&lt;br /&gt;&lt;br /&gt;
		性別
		&lt;br /&gt;
		&lt;input type="radio" name="sex" value="male" /&gt;男
		&lt;input type="radio" name="sex" value="female" /&gt;女
		&lt;input type="radio" name="sex" value="other" /&gt;その他
		&lt;br /&gt;&lt;br /&gt;
		生年月日
		&lt;br /&gt;
		&lt;input type="date" name="date" /&gt;
		&lt;br /&gt;&lt;br /&gt;
		パスワード
		&lt;br /&gt;
		&lt;input type="password" name="pw" /&gt;
		&lt;br /&gt;&lt;br /&gt;
		好きなポケモン
		&lt;br /&gt;
		&lt;input type="checkbox" name="pokemon" value="0" /&gt;ピカチュウ
		&lt;input type="checkbox" name="pokemon" value="1" /&gt;フシギダネ
		&lt;input type="checkbox" name="pokemon" value="2" /&gt;ヒトカゲ
		&lt;input type="checkbox" name="pokemon" value="3" /&gt;カメックス
		&lt;br /&gt;&lt;br /&gt;
		&lt;input type="submit" value="登録" disabled /&gt;
	&lt;/form&gt;
</code>
<div class="result">
	<form method="post" action="next.php">
		名前
		<br />
		<input type="text" name="txt" />
		<br /><br />
		性別
		<br />
		<input type="radio" name="sex" value="male" />男
		<input type="radio" name="sex" value="female" />女
		<input type="radio" name="sex" value="other" />その他
		<br /><br />
		生年月日
		<br />
		<input type="date" name="date" />
		<br /><br />
		パスワード
		<br />
		<input type="password" name="pw" />
		<br /><br />
		好きなポケモン
		<br />
		<input type="checkbox" name="pokemon" value="0" />ピカチュウ
		<input type="checkbox" name="pokemon" value="1" />フシギダネ
		<input type="checkbox" name="pokemon" value="2" />ヒトカゲ
		<input type="checkbox" name="pokemon" value="3" />カメックス
		<br /><br />
		<input type="submit" value="登録" disabled />
	</form>
</div>
<h4>select・option</h4>
ユーザに選択肢を選択させます。<br />selectの構成は以下のようになっています。
<table class="exp">
	<caption>selectの属性値</caption>
	<tbody>
		<tr>
			<th>name</th>
			<td>遷移先のページでユーザが入力したデータを取り出すための識別子です。</td>
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
			<td>遷移先のページでユーザが入力したデータを指定する値となります。</td>
		</tr>
	</tbody>
</table>
<code class="html">
	&lt;select name="blood-type"&gt;
		&lt;option value="a"&gt;A型&lt;/option&gt;
		&lt;option value="b"&gt;B型&lt;/option&gt;
		&lt;option value="ab"&gt;AB型&lt;/option&gt;
		&lt;option value="o"&gt;O型&lt;/option&gt;
	&lt;/select&gt;
</code>
<div class="result">
	<select name="blood-type">
		<option value="a">A型</option>
		<option value="b">B型</option>
		<option value="ab">AB型</option>
		<option value="o">O型</option>
	</select>
</div>
<h4>textarea</h4>
ユーザに複数行のテキストを入力するエリアを作成します。<br />textareaの構成は以下のようになっています。
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
「textarea」タグは「input」タグ・「option」タグと異なり閉じタグを持ちます。
<code class="html">
	&lt;textarea name="message" rows="5" cols="30"&gt;&lt;/textarea&gt;
</code>
<div class="result">
	<textarea name="message" rows="5" cols="30"></textarea>
</div>
<div class="separator"></div>
長かったですね、、、<br />一休みしたら、次に進みましょう♪
<?php footer(); ?>