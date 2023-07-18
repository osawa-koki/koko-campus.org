<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-02",
	"updated" => "2022-02-02"
);
head($obj);
?>
<h2>セッションとは</h2>
現在のwebの仕組みは「REST」と呼ばれるステートレスな通信を実現するアーキテクシャによって構成されているため、クライアント・サーバ間で状態を維持するためには「セッション」という概念が使用されます。
<div id="question-mark">
	<span>?</span><span>?</span><span>?</span>
</div>
って感じでよね、、、<br /><br />セッションについて説明するために以下の2つについて説明しますね♪
<br />
<ol>
	<li>http通信</li>
	<li>ステートレス</li>
</ol>
<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
if (strstr($ua, 'Edge') || strstr($ua, 'Edg')) {
  $ua = "Microsoft Edge";
} elseif (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
  $ua = "Microsoft Internet Explorer";
} elseif (strstr($ua, 'OPR') || strstr($ua, 'Opera')) {
  $ua = "Opera";
} elseif (strstr($ua, 'Chrome')) {
  $ua = "Google Chrome";
} elseif (strstr($ua, 'Firefox')) {
  $ua = "Firefox";
} elseif (strstr($ua, 'Safari')) {
  $ua = "Safari";
} else {
  $ua = "Unknown";
}
?>
<h3>http通信</h3>
httpというプロトコルを用いた通信の仕組みです。<br />chromeやsafariやfirefoxなどのブラウザを使用した通信が該当します。<br />http通信では通信をスタートさせる側を「クライアント」、通信に応答する側を「サーバ」と呼びます。<br /><br />ここでいえば、皆さんが現在使用している「<?php echo $ua; ?>」がクライアントになり、僕が動作させている「apacheサーバ」がサーバに該当します。<br /><br />仕組みとしては、皆さんが僕が保有するサーバに対してhttpリクエストを送信して、そのリクエストに対してサーバが皆さんのブラウザに対してhttpレスポンスを返します。
<h3>ステートレス</h3>
http通信において大切なのは、<span class="u">クライアントがhttpリクエストを送信してそれに対してサーバがhttpレスポンスを返した時点でhttp通信は終了する</span>という点です。<br />これをステートレス(状態がない)と言い、これでは不便な場合があります。<br /><br />例えば皆さんがあるショッピングサイトにログインするために「id」と「パスワード」をhttpリクエストに含めて送信したとします。<br />これに対してサーバは送られきた「id」と「パスワード」をデータベースからチェックしてok!ならばその人用のマイページを返します。<br /><br />http通信はここで終了です。<br />ユーザがこのページから何かを買い物かごに追加しようとしてもサーバはクライアントが誰なのかを識別できないためもう一度、「id」と「パスワード」を送信する必要があります。<br />購入画面に遷移する際にも、購入確認画面に遷移する際にも、実際に購入を確定する際にも同様に「id」と「パスワード」を送信する必要があります。<br /><br />面倒くさいですよね、、、<br />ということで、http通信そのものはセッション(状態)を管理できませんが、何らかの識別用データをhttpリクエストに挿入して、セッションを疑似的に実現します。
<h2>セッション情報の格納場所</h2>
では、httpリクエストのどこにユーザ識別用のデータを挿入するかですよね♪<br />具体的には以下の3つの場所があげられます。
<ul>
	<li>クエリストリング(get)</li>
	<li>hidden field(post)</li>
	<li>cookie</li>
</ul>
<h3>クエリストリング</h3>
urlのパラメータとして送信します。<br />例えば「https://koko-campus.org/member/mypage?sid=0123456789」といった感じです。<br /><br />古いシステムでよくみるセッション管理の仕組みです。<br />簡単に実装可能ですが、<strong>絶対に使用しないで下さい。</strong><br /><br />理由はセキュリティ上の観点から簡単にセッションを横取りされてしまうからです。
<p class="r">これはセッションハイジャック攻撃と呼ばれます。</p>
<h3>hidden filed</h3>
通常のformタグ内にユーザを識別するための隠しデータを非表示にして差し込みます。<br />inputタグのtype属性に「hidden」を設定することで実現します。
<br /><br />
<code class="html">
	&lt;form action="index.html" method="post"&gt;
		&lt;input type="text" name="name" /&gt;
		&lt;input type="button" value="送信" /&gt;
		&lt;input type="hidden" name="id" value="id1234" /&gt;
		&lt;input type="hidden" name="pw" value="pw1234" /&gt;
	&lt;/form&gt;
</code>
ユーザには表示されませんが、ボタンを押したら他のデータと一緒に送信されます。<br />postメソッドで通信されるためhttps通信されている限りはセキュリティ上は問題ありません。<br />しかしながら毎回の通信に際して「id」と「パスワード」を送信するのはあまり好ましくはないです。<br /><br />「id」と「パスワード」以外の識別子を入れることでこの問題は回避できますが、何だか、、、美しくないです、、、
<h3>cookie</h3>
<span class="cancel">バターと砂糖と卵をよく混ぜて、170度に熱したオーブントースターで焦げ目が出るまで、、、</span><br /><br />httpリクエストヘッダ内のcookieという領域にユーザを識別するデータを挿入します。<br />セキュリティ上安全で、かつ美しいため僕はこのcookieを用いたセッション管理をオススメします。<br /><br />以下ではこのcookieを用いたセッション管理の方法について説明します。
<h2>セッションの開始</h2>
phpでセッション管理を開始するためには「session_start()」関数を使用します。<br /><br />大切なのはhtmlを出力してからセッションの開始はできないため、必ずphpファイルいおいて「&lt;?php ~~~ ?&gt;」の外で、もしくは「echo $data;」で何かhtmlを出力する前に書いてください。<br />常にphpファイルの先頭でセッションを開始する癖を付けましょう♪
<code class="php">
	&lt;?php
	session_start();
	?&gt;
</code>
空白文字でもhtmlとして出力されていたらエラーとなります。
<code class="php">
	&nbsp; //←空白の行があるためエラー
	&lt;?php
	session_start();
	?&gt;
</code>
phpの記述エリア内の空白でしたらok!ですが、特に理由が無ければこれも避けることをオススメします。
<code class="php">
	&lt;?php
	&nbsp; //&larr;「&lt;?php ~~~ ?&gt;」の中ならhtmlとしては認識されないためok!
	session_start();
	?&gt;
</code>
「session_start()」関数を実行するとブラウザのcookie領域にランダムな32桁の文字列が設定され、これと同じものをサーバにも設定してユーザの識別に用いられます。<br />強度を高める場合には32以上のランダムな文字列を設定する必要がありますが、この設定には「php.ini」の変更が必要となるためここでは省略します。<br /><br />また、「session_start();」の後にはセッション識別データを変更するための関数である「session_regenerate_id(true);」を入れることをオススメします。<br />これはセッションハイジャック攻撃を防止するために、毎回セッションデータ(セッションid)を変更するためのものです。<br />特に重要なデータを用いない場合は用いる必要がないという意見もありますが、僕は使用することをオススメします。<br />実際にセッションハイジャック攻撃の成立を妨ぐ必要性が小さくても、このサイトはセキュリティが強固です!!とアピールすることでそもそもハッキングの対象になりにくくなるからです。
<code class="php">
	&lt;?php
	session_start();
	session_regenerate_id(true);
	?&gt;
</code>
<h2>セッション変数</h2>
これでセッションそのものは作成できました。<br />次は実際にユーザのデータを格納する特別な変数である「セッション変数」へ進みましょう♪<br />ユーザ専用のデータを格納するには「$_SESSION」という連想配列を用います。<br /><br />例えばユーザがログインした際に当該ユーザのidをそのセッション変数に格納することで、どのページからでもユーザを特定できます。<br />パスワードはセッション変数に格納する必要はありません。<br />パスワードはあくまでの最初のログインチェックにのみ使用します。
<code class="php">
	&lt;?php
	session_start();
	session_regenerate_id(true);

	$id = $_POST["id"];
	$pw = $_POST["pw"]:

	//データベースから$idと$pwの検証を行う
	//ngならばセッション破棄(後述)
	//okならば次へ進む

	$_SESSION["id"] = $id;
	?&gt;
</code>
取り出す際には他の連想配列と同様に「$_SESSION[キー]」で取得します。
<code class="php">
	$sid = $_SESSION["id"]; //セッション変数に格納されたidという名前の要素を$sidに格納
</code>
また、遷移先の会員専用のページではログインが完了していない($_SESSION["login"]が空である)ユーザを排除する必要があります。
<code class="php">
	&lt;?php
	session_start();
	session_regenerate_id(true);

	if (isset($_SESSION["id"])) {
		//ユーザがログイン済みである場合の処理
	} else {
		//ユーザが不正にページ遷移した場合の処理
	}
	?&gt;
</code>
<h3>セッション破棄</h3>
ログインに成功した場合の処理を全てifの後の「{}」で囲むのは綺麗ではないですよね、、、<br /><br />ということでログインに成功していないユーザに対してはphpプログラムを強制的に終了させます。<br />このための関数には「exit()」があります。<br />また同時にユーザが他のセッション変数を持っている場合も考慮してセッション変数のリセットとをセッションそのものの破棄を行いましょう♪<br />セッション破棄は以下の3つの処理を行います。
<ol>
	<li>セッション変数のリセット</li>
	<li>セッションの破棄</li>
	<li>phpプログラムの強制終了</li>
</ol>
<h4>セッション変数のリセット</h4>
最初に「$_SESSION」に格納されている全てのデータを削除します。<br />全てのデータをfor文でループして削除してもok!ですが、新しい空の配列で上書きした方が楽ですね♪<br />セッション変数のリセットはこう書きます。
<code class="php">
	$_SESSION = array(); //空の配列で上書き
</code>
<h4>セッションの破棄</h4>
呪文のように覚えてください。<br />こう書きます。
<code class="php">
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), "", time()-42000, "/");
	}
	session_destroy();
</code>
セッションはブラウザ側ではcookieとして保存されていますがこれを削除して、次にセッションそのものを「session_destroy()」で破棄します。
<h4>phpプログラムの強制終了</h4>
これ以降のページはユーザに見せないためphpプログラムを強制的に終了させる「exit()」を使用します。
<code class="php">
	exit();
</code>
ですけど、これだとユーザに空白のページが表示されてユーザに不快感を与える?ユーザを混乱させる?可能性があるため「exit()」でphpプログラムを強制的に終了させるのではなく、強制的に他のページへリダイレクトさせる方法が好まれます。<br />他のページへのリダイレクトは「header()」関数を使用します。
<code class="php">
	header("Location: 遷移後のurl");
</code>
例えば、以下のように記述します。
<code class="php">
	header("Location: error/index.html");
</code>
これで不正に遷移してきたユーザを「error/index.html」にリダイレクトさせることに成功しました。<br /><br />「error/index.html」では「不正なページ遷移です。以下のリンクからログインして下さい。」っていうテキストに添えてログインページへのリンクを貼ればok!です。
<h2>cookie変数</h2>
$_SESSIONを用いた方法ではcookieにはユーザを識別するためのデータのみを格納して、それ以外のデータは全てサーバ側で「$_SESSION」に格納しましたね。<br /><br />セキュリティ上はこの方法が好ましいのですが、この方法はサーバ側で管理する「$_SESSION」の影響を受けてサーバ側の処理が増大して応答時間が長くなってしまうという問題もあります。<br /><br />そこでサーバではなくクライアント側でcookieとしてデータを管理する方法もあります。<br /><br /><span class="u">cookie内のデータはユーザが同時に変更可能である為、「id」などのユーザを識別する用のデータは絶対に用いないでください。</span><br /><br />cookieにデータとして格納してもok!なものは第三者が偽造しても大きな問題はないデータに限られます。<br /><br />僕がcookieに識別用ではなくてデータとして保存しているのはトップページに表示する簡単なアンケートの番号です。<br />アンケートの番号は悪意のあるユーザが偽造しても全然ok!ですので!!<br /><br />では実際にcookieを設定してみましょう♪
<h3>set_cookie</h3>
cookieを設定するには「set_cookie()」関数を使用します。<br /><br />「set_cookie(クッキーの名前, クッキーの値)」で設定します。<br />このページのトップページで使用しているcookieでは以下のコードを使用しています。
<code class="php">
	//最初にアンケートの内容とアンケートのidを取得
	//$questionaire_id = $_POST["puestionaire-id"]; //アンケートの番号を取得して$questionaire_idに代入
	set_cookie("questionaire-id", $questionaire_id); //「questionaire_idという名前でアンケートの番号(id)をcookieに設定
</code>
cookieデータを取得するには「$_SESSION」同様に「$_COOKIE」で取得します。
<code class="php">
	$cookie = $_SESSION["questionaire-id"]; //「questionaire-id」キーのクッキー変数を$cookieに格納
</code>
<?php footer(); ?>