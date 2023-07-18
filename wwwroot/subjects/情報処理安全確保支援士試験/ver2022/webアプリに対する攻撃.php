<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-11",
	"updated" => "2022-03-11"
);
head($obj);
?>
<p id="message">前回はパスワードクラックについて学びましたね♪<br /><br />今回は攻撃手法の第二弾です。webアプリケーションに対する攻撃について学びます。<br />近年は会社がwebシステムを用いることが当たり前ですよね♪<br />そうなれば必然的にwebアプリに対する攻撃も増えてきます。ここでは、webアプリケーションに対する攻撃について学びましょう♪<br /><br />それではLet's Dance!
<div class="separator"></div>
途中でドライブバイダウンロード攻撃の実演があります。体験してみたい方は下のチェックボックスをクリックしてください。
<p>安全なファイルを自動的にダウンロードさせます。</p>
<input id="check_drive" type="checkbox" value="" /><label for="check_drive">ドライブバイダウンロード攻撃を体験してみる</label>
<h2>不正な命令を実行させる攻撃の種類</h2>
不正な命令・スクリプトを実行させる攻撃には以下のものがあります。
<ul>
	<li>XSS</li>
	<li>CSRF</li>
	<li>SQLインジェクション</li>
	<li>OSコマンドインジェクション</li>
	<li>TTTPヘッダインジェクション</li>
	<li>メールヘッダインジェクション</li>
	<li>クリックジャッキング</li>
	<li>ドライブバイダウンロード</li>
	<li>ディレクトリトラバーサル</li>
	<li>バッファオーバーフロー</li>
</ul>
<h2>XSS</h2>
XSSとはクロスサイトスクリプティングの略で、<span class="underline">入力欄に不正なスクリプト(命令文)を打ち込んで、ユーザの入力情報を処理するプログラムに悪意ある動作をさせる</span>ことです。<br /><br />例) HTMLにECMAScript(JavaScript)のスクリプトを埋め込むには、&lt;script&gt;~~~&lt;/script&gt;という感じに記述します。そこで、ユーザの入力欄に&lt;script&gt;~~~&lt;/script&gt;と打ち込むとプログラムがそれを入力データではなく、命令(スクリプト)であると勘違いしてそれを実行します。
<div class="how scroll-600w">
	正常な入力
	<table class="bg-white">
		<tbody>
			<tr>
				<th>名前</th>
				<td>koko</td>
			</tr>
			<tr>
				<th>パスワード</th>
				<td>pass0123</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="how scroll-600w">
	悪意ある入力
	<table class="bg-white">
		<tbody>
			<tr>
				<th>名前</th>
				<td>koko</td>
			</tr>
			<tr>
				<th>パスワード</th>
				<td>&lt;script&gt;window.alert("abc");&lt;/script&gt;</td>
			</tr>
		</tbody>
	</table>
	<br />パスワードに含まれる「&lt;script&gt;window.alert("abc");&lt;/script&gt;」をブラウザが文字列ではなく、命令文であると誤解してabcというポップアップ画面を表示してしまう。</span>
</div>
<div class="separator"></div>
XSS攻撃は<span class="underline">「反射型XSS」「格納型XSS」「DOM型XSS」</span>3つに分類されます。<br />以下でそれぞれの特徴をおさえましょう♪
<div class="scroll-600w">
	<table>
		<caption>XSSの種類</caption>
		<thead>
			<th>種類</th>
			<th>説明</th>
		</thead>
		<tbody>
			<tr>
				<th>反射型XSS</th>
				<td>不正なスクリプトを含んだデータを処理して<span class="underline">レスポンスとして返した際に</span>不正な命令を実行します。</td>
			</tr>
			<tr>
				<th>格納型XSS</th>
				<td>入力データを保存するシステムにて入力された不正なスクリプトを保存することで、<span class="underline">その情報を呼び出す際に</span>毎回その不正なスクリプトが実行されます。</td>
			</tr>
			<tr>
				<th>DOM型XSS</th>
				<td>webページに含まれる正規のスクリプトにより動的にwebページを操作した場合に、悪意あるwebページを出力させる攻撃です。</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="margin"></div>
次にこれらの攻撃に対する有効な対策について説明します。
<div class="scroll-600w">
	<table>
		<caption>XSSへの対策</caption>
		<thead>
			<th>種類</th>
			<th>対策</th>
		</thead>
		<tbody>
			<tr>
				<th>反射型XSS</th>
				<td rowspan=2>
					<ul>
						<li>httpレスポンスヘッダのContent-typeフィールドに文字コードを指定する。</li>
						<li>タグの属性値を「" "」(ダブルクオーテーション)で囲む。</li>
						<li>メタキャラクタをエスケープ処理する。</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th>格納型XSS</th>
			</tr>
			<tr>
				<th>DOM型XSS</th>
				<td>
					<ul>
						<li>innerHTML・outerHTML・document.write等のプロパティ・メソッドの使用を避けて、createElement・createTextNode等のDOM操作系のメソッド・プロパティを用いる。</li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="explanation">エスケープ処理とは、、、<br /><br />メタキャラクタ(プログラム上で特別な働きをする文字(「/」「<span class="en">\</span>」「(」「)」「&lt;」「&gt;」「.」「$」「&」「?」「;」「^」「|」))を単なる文字列として扱うための処理をすることです。<br />例えば「&lt;」「&gt;」はhtmlではタグの識別子として働くため、「&lt;」「&gt;」という文字をhtml上で扱う際には「&amp;lt;」「&amp;gt;」と入力します。
<div class="separator"></div>
<p>勘のいいひとなら察することができると思いますが、「&amp;lt;」ってhtml上に出力する際に、「&amp;lt;」って入力すると当然、「&lt;」って画面上では表示されてしまうので、さらにこの「&amp;」の部分をエスケープ処理して、「&ampamp;lt;」って入力する必要があります。そしてさらに「&ampamp;lt;」って表示するには「&ampampamp;lt;」って入力しています、、、(永遠に続く)</div>
<h2>CSRF</h2>
CSRFとは、、、<br /><br />クロスサイトリクエストフォージェリの略で、サイトを超えて(クロスサイト/Cross Site)、ユーザの要求と偽造して(フォージェリ/Forger)、リクエストを送る(リクエスト/Request)攻撃方法です。<br /><br />具体的な方法としては正規のwebサイトを改竄して悪意のあるwebサイトへのリンクを付加して、ユーザを悪意のあるwebサイトに誘導します。ユーザがその悪意のあるwebサイトへアクセスしたら、標的のwebサイトに対する不正なリクエストを送信させます。<br /><br />CSRFではユーザの個人情報が盗まれる等のユーザへの直接的な被害が生じることはありませんが、知らない間にいたずらな書き込みや犯罪予告といった操作が行われるほか、大量のリクエストを送信してサーバーに負荷をかけるDoS攻撃にも加担してしまうことになります。
<div class="exam">
	&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問10 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	CRLFへの対策として<span class="dashed">効果がない</span>ものとして、「<strong>WebブラウザからのリクエストをWebサーバで受け付けた際に、リクエストに含まれる "<" や ">" などの特殊文字を、タグとして認識されない "&amp;lt;" や "&amp;gt;" などの文字列に置き換える。</strong>」を挙げています。<br /><br />	反対に効果がある対策として以下のものがあげられます。
	<ul>
		<li>「Webサイトでの決済などの重要な操作の都度、利用者のパスワードを入力させる。」</li>
		<li>「Webサイトへのログイン後、毎回異なる値をHTTPレスポンスに含め、Webブラウザからのリクエストごとに送付されるその値を、Webサーバ側で照合する。」</li>
		<li>「Webブラウザからのリクエスト中のrefererによって正しいリンク元からの遷移であることを確認する。」</li>
	</ul>
</div>
<h2>SQLインジェクション</h2>
最初に学んだXSSの「デーダベース」バージョンです。<br /><br />SQLとは(Structed Query Language)の略でデーダベースを操作(挿入・削除・参照・更新)するための言語です。<br />入力された情報からSQL文を作成してデーダベースを操作するシステムにおいて、不正なスクリプトを含むデータを入力することで悪意のあるデータベース操作を実行させます。<br /><br />以下で具体的な攻撃方法を紹介しますね♪
<div class="how scroll-600w">正常な入力<br />
	<table class="bg-white">
		<tbody>
			<tr>
				<th>名前</th>
				<td>koko</td>
			</tr>
			<tr>
				<th>パスワード</th>
				<td>pass0123</td>
			</tr>
		</tbody>
	</table>
	<div>
		<div>作成されたSQL文:<span class="highlight0">WHERE name=koko AND password=pass0123;</span></div>
		<div>意味:<span class="highlight1">名前がkokoでパスワードがpass0123の行を選択</span></div>
	</div>
</div>
<div class="how scroll-600w">悪意ある入力<br />
	<table class="bg-white">
		<tbody>
			<tr>
				<th>名前</th>
				<td>koko</td>
			</tr>
			<tr>
				<th>パスワード</th>
				<td>'' OR 1=1</td>
			</tr>
		</tbody>
	</table>
	<div>
		<div>作成されたSQL文:<span class="highlight0">WHERE name=koko AND password='' OR 1=1;</span></div>
		<div>意味:<span class="highlight1">名前がkokoでパスワードが空か1=1が成立する行を選択(パスワードが違っていても選択されてしまう。)</span></div>
	</div>
</div>
<div class="step">
	<ul>
		<li><span class="underline">バインド機構</span>の使用</li>
		<li>エスケープ処理</li>
		<li>WAFの設定<span class="sup">※</span><span class="small">(後ほど学習します。)</span></li>
		<li>DBMSのアクセス権を必要最小限に!</li>
	</ul>
</div>
<div class="explanation">バインド機構とは、、、<br /><br />SQL文の変数部分にプレースホルダ(「?」)を予め挿入してSQL文のひな形を完成させて、実際にデータを受け取ったらプレースホルダに割り当てます。<br />プレースホルダに割り当てられる変数は自動的にエスケープ処理されるため、メタキャラクタ含まれていたとしても問題ありません。</div>
<div>
	試験とは関係ありませんが、SQLインジェクションはサイバー攻撃の中での致命的なダメージを企業に与えます。<br />皆さんがシステムを開発をする際には、特にこの「SQLインジェクション攻撃」には注意して下さいね♪<br /><br />因みにですけど、IT企業の製品の脆弱性を発見してそれを企業に報告したら報奨金が貰える制度(バグバウンティ)があるんですけど、報奨金としていくらもらえるかはどんな種類の攻撃かによって異なってくるんですね、、、<br /><br />サイボウズのバグバウンティでの各種類の攻撃方法での最低価格を少し紹介しますね♪
	<table>
		<tbody>
			<tr>
				<th>SQLインジェクション</th>
				<td><strong>60,000</strong></td>
			</tr>
			<tr>
				<th>インジェクション(SQL以外)</th>
				<td>20,000</td>
			</tr>
			<tr>
				<th>アクセス制御の不備</th>
				<td>20,000</td>
			</tr>
			<tr>
				<th>入力確認の不備</th>
				<td>20,000</td>
			</tr>
			<tr>
				<th>XSS</th>
				<td>40,000</td>
			</tr>
		</tbody>
	</table>
	<p>リンクは<a href="https://cybozu.co.jp/products/bug-bounty/">こちら</a>。(2021年9月時点)</p>
	これを見ればSQLインジェクション攻撃の威力が分かると思います。<br /><br />SQLインジェクションに関して、IPAがSQLインジェクション攻撃に対する有効な対策をまとめてくれているので、これを活用して勉強してみて下さい♪
	<p>リンクは<a href="https://www.ipa.go.jp/files/000017320.pdf">こちら</a>。</p>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問12 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	SQLインジェクション攻撃への対策として「<strong>SQL文の組立てに静的プレースホルダを使用する</strong>」ことを紹介しています。<br /><br />
	<div class="super_separator"></div>
	&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問17 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	SQLインジェクション対策について、「<strong>プレースホルダを使用する。</strong>」(Webアプリケーション実装における対策)、「<strong>Webアプリケーションプログラムが利用するデータベースアカウントがもつデータベースアクセス権限を必要最小限にする。</strong>」(Webアプリケーションプログラムの実装以外の対策)と説明しています。
</div>
<h2>OSコマンドインジェクション</h2>
ユーザの入力データからOSのコマンドを呼び出して処理するシステムにおいて、ユーザが不正なスクリプトを入力することでシステムに悪意ある動作をさせる攻撃です。<br /><br />OSコマンドを実行する以下の関数は注意が必要です。
<div>
	使用する言語を選択してください。
	<br /><br />
	<select id="os-injection_select">
		<option value="php">PHP</option>
		<option value="c">C/C++</option>
		<option value="perl">Perl</option>
		<option value="ruby">Ruby</option>
	</select>
</div>
<table id="php" class="os">
	<caption>PHP</caption>
	<tbody>
		<tr>
			<th>`command`</th>
		</tr>
		<tr>
			<th>system(command)</th>
		</tr>
		<tr>
			<th>exec(command)</th>
		</tr>
		<tr>
			<th>shell_exec(command)</th>
		</tr>
		<tr>
			<th>passthru(command)</th>
		</tr>
		<tr>
			<th>popen(command)</th>
		</tr>
	</tbody>
</table>
<table id="perl" class="os hidden">
	<caption>Perl</caption>
	<tbody>
		<tr>
			<th>`command`</th>
		</tr>
		<tr>
			<th>system `command`</th>
		</tr>
		<tr>
			<th>exec `command`</th>
		</tr>
	</tbody>
</table>
<table id="ruby" class="os hidden">
	<caption>Ruby</caption>
	<tbody>
		<tr>
			<th>`command`</th>
		</tr>
		<tr>
			<th>system(command)</th>
		</tr>
		<tr>
			<th>exec(command)</th>
		</tr>
		<tr>
			<th>%x(command)</th>
		</tr>
		<tr>
			<th>popen(command)</th>
		</tr>
	</tbody>
</table>
<table id="c" class="os hidden">
	<caption>C/C++</caption>
	<tbody>
		<tr>
			<th>system(command)</th>
		</tr>
		<tr>
			<th>exec(command)</th>
		</tr>
	</tbody>
</table>
<script type="text/javascript" charset="utf-8">
	"use strict";
	const os = document.getElementsByClassName("os");
	document.getElementById("os-injection_select").addEventListener("change", function() {
		const v = this.value;
		Array.from(os).forEach(e => {
			e.classList.add("hidden");
		});
		document.getElementById(v).classList.remove("hidden");
	});
</script>
<div class="step">
	<ul>
		<li>極力、OSコマンドの呼び出しを行わない。</li>
		<li>入力可能な文字を正しく設定する。</li>
		<li>入力不可な文字を受けた場合はエラーを飛ばす。</li>
		<li>WAFの設定<span class="sup">※</span><span class="small">(後ほど学習します。)</span></li>
		<li>エスケープ処理???<span class="sup">※</span><span class="small">(複雑化して見落としが多くなるため、好ましくないです。)</span></li>
	</ul>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問1 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	GET /cgi-bin/submit.cgi?user=;cat%20/etc/passwd HTTP/1.1<br />
	のHTTPリクエストがOSコマンドインジェクションと推測できるという問いが出題されました。<br /><br />
	ここでは、「cat」という文字列がOSコマンド(ファイルの中身の確認・ファイルの中身の連結)が含まれていることから判断しますが、Linuxを普段操作しない人は分からないですよね、、、
	<div class="super_separator"></div>
	&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問13 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	OSコマンドインジェクションに関して、「<strong>Webアプリケーションの脆弱性を悪用する攻撃手法のうち、Webページ上で入力した文字列がPerlのsystem関数やPHPのexec関数などの渡されることを想定し、不正にシェルスクリプトを実行させるもの</strong>」と説明しています。
</div>
<h2>HTTPヘッダインジェクション</h2>
ユーザの入力データからHTTPレスポンスを作成するシステムにおいて、ユーザが不正なスクリプトを入力することでシステムに悪意ある動作をさせる攻撃です。<br /><br />「Set-Cookie」「Location」等のHTTPレスポンスの生成にユーザの入力データを含んでおり、そのチェックが正しく機能していない場合に起こります。
<div class="step">
	<ul>
		<li>ヘッダの出力を直接行わず、ウェブアプリケーションの実行環境や言語に用意されているヘッダ出力用APIを使用する。</li>
		<li>改行コードを適切に処理するヘッダ出力用APIを利用できない場合は、改行を許可しないよう、開発者自身で適切な処理を実装する。</li>
		<li>外部からの入力の全てについて、改行コードを削除する。<span class="sup">※</span><span class="small">(保険的対策)</span></li>
	</ul>
</div>
<p>※引用元は<a href="https://www.ipa.go.jp/security/vuln/websecurity-HTML-1_7.html">こちら</a>。</p>
<h2>メールヘッダインジェクション</h2>
ユーザの入力データからメールを送信するシステムにおいて、ユーザが不正なスクリプトを入力することでシステムに悪意ある動作をさせる攻撃です。<br /><br />改行コードとして「%0d%0a」が、「:」として「%3a」が、スペース記号として「%20」が用いられるため、これを入力データに混入させることで第三者にメールを送信させる攻撃です。<br />個人情報が盗まれることはありませんが、自分のメールアドレスから迷惑メールを第三者に送られる可能性があります。
<div class="how scroll-600w">
	正常な入力
	<table class="bg-white">
		<tbody>
			<tr>
				<th>名前</th>
				<td>koko</td>
			</tr>
			<tr>
				<th>メールアドレス</th>
				<td>me@koko-campus.org</td>
			</tr>
		</tbody>
	</table>
	To: me@koko-campus.org<br />From: origin@koko-campus.org</span>
</div>
<div class="how scroll-600w">悪意ある入力<br />
	<table class="bg-white">
		<tbody>
			<tr>
				<th>名前</th>
				<td>koko</td>
			</tr>
			<tr>
				<th>メールアドレス</th>
				<td>me@koko-campus.org<%0d%0aBcc%3a%20you@koko-campus.org</td>
			</tr>
		</tbody>
	</table>
	To: me@koko-campus.org<br />Bcc: you@koko-campus.org<small> &lt;- 第三者にメールが送られてしまう。</small><br />From: origin@koko-campus.org</span>
</div>
<div class="step">
	<ul>
		<li>メールヘッダを固定値にして、外部からの入力はすべてメール本文に出力する。</li>
		<li>メールヘッダを固定値にできない場合、ウェブアプリケーションの実行環境や言語に用意されているメール送信用APIを使用する。</li>
		<li>HTMLで宛先を指定しない。</li>
		<li>外部からの入力の全てについて、改行コードを削除する。<span class="sup">※</span><span class="small">(保険的対策)</span></li>
	</ul>
</div>
<p>引用元は<a href="https://www.ipa.go.jp/security/vuln/websecurity-HTML-1_8.html">こちら</a>。</p>
<h2>クリックジャッキング</h2>
webサイトにiframeなどで他のwebサイトを表示してそれを透明化して利用者に分からない状態にして、利用者に悪意ある操作をさせる攻撃です。<br /><br />webページって以下の感じで他サイトを貼り付けることができるんです。<br /><small>※このページはkoko-campus.orgのトップページです。</small>
<iframe title="frame" id="iframe0" src="https://koko-campus.org"></iframe>
またこんな風に透明度を下げてユーザに識別させなくすることも可能です。
<iframe title="frame" id="iframe1" src="https://koko-campus.org"></iframe>
ちなみに、透明度を0.001にした場合はこんな感じになります。↓↓↓<br />まず識別不可能ですよね、、、(´;ω;｀)<br />この上にユーザを騙す装飾をしてユーザに不正な操作をさせるのがクリックジャッキングです。
<iframe title="frame" id="iframe2" src="https://koko-campus.org"></iframe>
<script type="text/javascript" charset="utf-8">
	"use strict";
	const ifm = Array.from(document.getElementsByTagName("iframe")),
		w = document.getElementsByTagName("main")[0].clientWidth;
	ifm.forEach(e => {
		e.setAttribute("width", (500 < w) ? w * 0.5 : 300);
		e.setAttribute("height", w * 0.5);
	});
</script>
<div class="step">
	<ul>
		<li>X-FRAME-OPTIONSを「DENY」「SAMEORIGIN」に設定する。</li>
	</ul>
	<p>X-FRAME-OPTIONSを「DENY」「SAMEORIGIN」に設定するとiframeで他のサイトを表示できなくなります。</p>
</div>
<div class="scroll-600w">
	<iframe title="frame" src="https://www.ipa.go.jp/"></iframe>
</div>
IPAはしっかりとX-FRAME-OPTIONSを「SAMEORIGIN」に設定しているため、このwebサイトから表示することができません。<br /><small>iframeって参考サイトとかを載せることができて便利なので、IPAも全部のページをブロックするのではなくて大切な情報を扱うページだけをブロックすればいいのにって思っています、、、</small>
<div id="drive-where"></div>
<h2>ドライブバイダウンロード</h2>
webサイトを閲覧しただけで、マルウェアをダウンロードさせる攻撃方法です。<br /><br />最初の確認画面でチェックを入れた方は、このセクションに到達する際に自動的にファイルをダウンロードさせられたと思います。<br /><small>モバイル端末だと確認画面が入るかな???</small><br />皆さんがダウンロードしたファイルはただの画像ファイルですので安心してください。<br /><br />こんな感じでwebサイトを訪問しただけで悪意のマルウェアをダウンロードさせる攻撃方法がドライブバイダウンロードです。
<script type="text/javascript" charset="utf-8">
	function downloadImage() {
		const src = "drive-by-download.png";
		let xhr = new XMLHttpRequest();
		xhr.open("GET", src, true);
		xhr.responseType = "blob";
		xhr.onload = downloadImageToLocal;
		xhr.send();
	}
	function downloadImageToLocal() {
		let dlLink = document.createElement("a");
		const dataUrl = URL.createObjectURL(this.response);
		dlLink.href = dataUrl;
		const fileName = `koko-campus(drive-by-download).png`;
		dlLink.download = fileName;
		document.body.insertAdjacentElement("beforeEnd", dlLink);
		dlLink.click();
		dlLink.remove();
	}
	window.addEventListener("load", function() {
		let drive_ok = true;
		const where = document.getElementById("drive-where").getBoundingClientRect().top;
		window.addEventListener("scroll", () => {
			const scrolled = window.scrollY;
			if (where < scrolled && drive_ok) {
				const checked = document.getElementById("check_drive").checked;
				if (checked) {
					drive_ok = false;
					downloadImage();
				}
			}
		})
	})
</script>
<div class="step">
	<ul>
		<li>FTPアカウントを適切に管理する。(サーバサイド)</li>
		<li>信頼できないサイトを訪れない。(クライアントサイド)</li>
		<li>セキュリティソフト・ブラウザ・OSを最新版に保つ。(クライアントサイド)</li>
	</ul>
</div>
<h2>ディレクトリトラバーサル</h2>
ユーザの入力データからファイル名を取得するシステムにおいて、不正なディレクトリの階層を指示する文字列を含むデータを受け取ることで、非公開のファイルへの攻撃を可能にする攻撃です。<br />ひとつ上の階層を意味する「../」(UNIX・LINUX系)や「..\」(Windows)を挿入することで、非公開へのディレクトリへのアクセスを許してしまいます。
<div class="step">
	<ul>
		<li>basename()関数を使用して、パス名からファイル名のみを取り出す。</li>
		<li>webサーバ内のファイルへのアクセス権を正しく設定する。(.htaccessファイルの適切な設定)</li>
		<li>入力データに「../」「..<span class="en">\</span>」が含まれていないかチェックする。</li>
	</ul>
</div>
<span id="href_bof"></span>
<h2>バッファオーバーフロー</h2>
通称BOF(Buffer Over Flow)です。<br />簡単に説明すると、プログラムに「あれやってね♪」「次にこれしてよ~」「それ終わったらこれね♪」...ってたくさん命令してプログラムの短期記憶領域(バッファ/メモリ)を溢れさせた(オーバーフロー)後にしれっと悪いことをさせます。<br /><br />コンピュータの短期記憶領域は大きく「スタック領域」と「ヒープ領域」に分けられ、BOF攻撃もそれに応じて「スタックベースBOF攻撃」と「ヒープベースBOF攻撃」に分けられますが、ここでは「スタックベースBOF攻撃」を対象とします。<br />正しい関数を用いれば、大量の命令を受け付けてもキャパオーバー状態になることはないのですがC言語・C++言語で以下の関数を用いる場合は要注意です。
<div class="scroll-600w">
	<table>
		<caption>BOF攻撃に注意すべき関数(C/C++)</caption>
		<thead>
			<tr>
				<th>要注意な関数</th>
				<th>代替案</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>gets()</td>
				<td>fgets()</td>
			</tr>
			<tr>
				<td>strcpy()</td>
				<td>strncpy()</td>
			</tr>
			<tr>
				<td>strcat()</td>
				<td>strncat()</td>
			</tr>
			<tr>
				<td>sprintf()</td>
				<td>snprintf()<br />format内で精度を指定</td>
			</tr>
			<tr>
				<td>scanf()</td>
				<td>format内で精度を指定</td>
			</tr>
			<tr>
				<td>sscanf()</td>
				<td>format内で精度を指定</td>
			</tr>
			<tr>
				<td>fscanf()</td>
				<td>format内で精度を指定</td>
			</tr>
			<tr>
				<td>vfscanf()</td>
				<td>format内で精度を指定</td>
			</tr>
			<tr>
				<td>vsprintf()</td>
				<td>vsnprint()<br />format内で精度を指定</td>
			</tr>
			<tr>
				<td>vscanf()</td>
				<td>format内で精度を指定</td>
			</tr>
			<tr>
				<td>vsscanf()</td>
				<td>format内で精度を指定</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="explanation">精度の指定とは、、、<br /><br />実引数から格納する文字の最大長を指定することです。<br /><br />簡単に言えば命令する時に今からこのくらいの量の命令をするからその分を準備しといてね♪って事前に知らせることです。</div>
<div class="step">
	<ul>
		<li>適切な関数を使用する。</li>
		<li>format内で精度を正しく指定する。</li>
		<li>DEP(データ実行防止機能)を設定する。<span class="sup">※</span><span class="small">(return-to-libc攻撃には無効)</span></li>
		<li>アドレス空間配置ランダム化(ASLR)を搭載しているOSを使用する。</li>
		<li>セキュリティソフト・OSを最新版に保つ。</li>
		<li>IDS・IPSを使用する。<span class="sup">※</span><span class="small">(IDS・IPSについては後ほど勉強します)</span></li>
	</ul>
</div>
<?php footer(); ?>