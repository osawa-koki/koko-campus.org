<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-18",
	"updated" => "2022-03-18"
);
head($obj);
?>
<p id="message">シラバス通りに進めるとネットワークのセキュリティ・データベースのセキュリティ・アプリケーションのセキュリティについて学ぶことになっていますが、ネットワークのセキュリティとデータベースのセキュリティは後ほど、「ネットワーク」と「データベース」の授業で重点的に扱うので、ここでは扱いません。<br /><br />それでは、Let's smile!!</p>
<h2>アプリケーションセキュリティ</h2>
アプリケーションセキュリティってかなり抽象的な表現を用いていますが、具体的には以下の用語を学びます。
<ul>
	<li>セキュリティバイデザイン</li>
	<li>プライバシーバイデザイン</li>
	<li>脅威モデリング</li>
	<li>セキュアプログラミング</li>
	<li>脆弱性低減技術</li>
	<li>Same Origin Policy</li>
	<li>CORS</li>
	<li>cookieのSecure属性指定</li>
	<li>HSTS</li>
	<li>UUID</li>
</ul>
<h2>セキュリティバイデザイン</h2>
<span class="underline">企画・設計段階から</span>セキュリティを意識してシステム開発をすることを言います。<br /><br />特にIoTシステムの開発において利用される考え方です。<br /><br />セキュリティバイデザインを採用することの利点として以下のものがあげられます。
<ul>
	<li>計画的に進行可能</li>
	<li>コスト削減に貢献</li>
	<li>保守性向上</li>
</ul>
<h2>プライバシーバイデザイン</h2>
アン・カブキアン博士が提唱した概念で、システム開発全体を通してプライバシーを意識することを言います。<br /><br />以下の7つの基本原則からなります。
<ul>
	<li>事後的ではなく、事前的；救済的でなく予防的</li>
	<li>初期設定としてのプライバシー</li>
	<li>デザインに組み込まれるプライバシー</li>
	<li>全機能的—ゼロサムではなく、ポジティブサム</li>
	<li>最初から最後までのセキュリティ—すべてのライフサイクルを保護</li>
	<li>可視性と透明性—公開の維持</li>
	<li>利用者のプライバシーの尊重—利用者中心主義を維持する</li>
</ul>
<p>引用元は<a href="https://www.soumu.go.jp/main_content/000196322.pdf">こちら</a>。</p>
<img src="../pics/privacy-by-design.png" alt="Privacy By Design" />
<h2>脅威モデリング</h2>
開発対象のソフトウェアがどのようなセキュリティ脅威にさらされており、攻略される可能性を持ちうるかを洗い出す活動です。<br /><br />潜在するセキュリティ脆弱性を<span class="underline">上流工程で</span>見つけ出すことによって、より効果的に脆弱性を排除することを狙います。<br /><br />具体的には以下の5つの手順を踏みます。
<ol>
	<li>システム構造図</li>
	<li>データフローライン</li>
	<li>データフローラインをたどる</li>
	<li>脅威の洗い出し</li>
	<li>シナリオ数分繰り返し</li>
</ol>
<p>引用元は<a href="https://www.ipa.go.jp/security/awareness/vendor/programmingv2/contents/c101.html">こちら</a>。</p>
<h2>セキュアプログラミング</h2>
プログラムは動けばOK!ではなくて、しっかりとセキュリティ対策を実施することが必要です。<br /><br />プログラミング全体を通してセキュリティを意識してコードを書こうね♪ってい考え方がセキュアプログラミングです。<br /><br />カーネギーメロン大学のCERTが公表している安全なコーディングのプラクティス10個を紹介しますね♪
<ol>
	<li>入力の検証</li>
	<li>コンパイラの警告の注視</li>
	<li>セキュリティポリシーの構成・設計</li>
	<li>シンプルに保つ</li>
	<li>デフォルトで拒否</li>
	<li>最小特権の原則に固執</li>
	<li> 他のシステムに送信するデータの無害化</li>
	<li>多層防御の実践</li>
	<li>効果的な品質保証テクニックの利用</li>
	<li>セキュアコーディング標準の採用</li>
</ol>
<p>引用元は<a href="https://wiki.sei.cmu.edu/confluence/display/seccode/Top+10+Secure+Coding+Practices">こちら</a>。</p>
試験に直接関係のない内容ですが、、、<br />IPAが公表している<a href="https://www.ipa.go.jp/security/awareness/vendor/programming/index.html">セキュアプログラミング講座</a>は分かりやすく、かつ体系的に学ぶことができるのでオススメです。
<h2>脆弱性低減技術</h2>
出荷前のソフトウェアの脆弱性を低減するためのチェック技法について学びます。<br /><br />具体的には、以下の手法があります。
<ul>
	<li>ソースコード静的検査</li>
	<li>プログラムの動的検査</li>
	<li>ファジング</li>
</ul>
以下で簡単に説明しますね♪
<div class="explanation">
	<div class="title">ソースコードの静的検査</div>
	プログラムを実行せずに行う検査のことを言います。<br /><br />以下の2つに分類できます。
	<ul>
		<li>規約違反の検出</li>
		<li>脆弱性を検出</li>
	</ul>
	<p>参考サイトは<a href="https://www.ipa.go.jp/files/000024762.pdf">こちら</a>。</p>
</div>
<div class="explanation">
	<div class="title">プログラムの動的検査</div>
	プログラムコードを実行して、その結果からソフトウェアのバグを検出検出する方法です。
</div>
<div class="explanation">
	<div class="title">ファジング</div>
	fuzz(極端に長い文字列・通常使わない制御文字など)を大量に送信してその結果を観察する脆弱性検査方法です。
</div>
<h2>CORS</h2>
「Cross-Origin Resource Sharing」の略で、「クロスオリジンリソース共有」と訳されます。<br /><br />CORSの説明の前に、SOPについて説明しますね♪
<div class="explanation">
	<div class="title">SOP</div>
	「Same-Origin Policy」の略で、「同一生成元ポリシ」と訳されます。<br /><br />あるオリジンによって読み込まれた文書やスクリプトが、他のオリジンにあるリソースへのアクセスを制限する機能を言います。<br /><br />2つのページのプロトコル・ポート番号・ホストが等しい場合に両者のページは同じオリジンとして認識されます。
</div>
通常はSOPによって同一ドメインのリソースにのみアクセスできるという制限が存在しますが、webサーバでCROSの指定を行うことで、複数のドメインにまたがってリソースを共有できます。
<h2>cookieのSecure属性指定</h2>
最初にcookieについて復習しますね♪
<div class="explanation">
	<div class="title">cookie</div>
	<span class="cancel">「小麦粉・バター・卵・砂糖をよく混ぜたものを170度のオーブントースターでいい感じの焼き具合になるまで、、、」</span><br />webサーバがアクセスしてきたクライアントとのセッションを維持するためにHTTPヘッダに設定する情報のことを言います。<br /><br />以下の情報を含みます。
	<ul>
		<li>expires(有効期限)</li>
		<li>domain(有効ドメイン)</li>
		<li>path(有効ディレクトリ)</li>
		<li>secure(下で説明します)</li>
		<li>HttpOnly(http(s)通信に限定)</li>
	</ul>
</div>
cookieのsecure属性を設定することで、HTTP<span class="underline">S</span>で通信している場合にのみcookieを発行して、盗聴によってcookieが盗まれるのを防ぎます。
<div class="exam">
	&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問12 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	cookieにsecure属性を設定した際のwebサーバとwebクライアントの処理としては、「<strong>Webサーバでは、cookie発行時に "Secure" を設定し、Webブラウザでは、それを参照し、HTTPS通信時にだけそのcookieを送信する。</strong>」と説明しています。
	<div class="super_separator"></div>
	&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問11 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	cookieにsecure属性を付したときの動作として、「<strong>URL内のスキームがhttpsのときだけ、WebブラウザからCookieが送出される。</strong>」と説明しています。
</div>
<h2>HSTS</h2>
「HTTP Strict Transport Security」の略で、webサイトがHTTPSでアクセスしたブラウザに対して「max-age」で指定した有効期限までの間はHTTPS通信の使用を強制させる機構です。<br /><br />具体的には、HTTPSの応答ヘッダに「Strict-Transport-Security」を指定します。<br /><br />しかしながらHSTSには大きな欠陥があります。<br />一回目のアクセスに対しては、有効でないという点です。<br />これを克服する技術が「<span class="underline">HSTSプリロード</span>」です。<br />HSTSプリロードとは、登録済みのwebサイトではHTTPS通信をするようにブラウザに要求することで、一回目のアクセスに対しても安全性を保証します。
<div class="exam">
	&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問15 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	HSTSを「<strong>HSTSを利用するWebサイトにWebブラウザがHTTPでアクセスした場合に、Webブラウザから当該サイトへのその後のアクセスを強制的にHTTP over TLS(HTTPS)にする。</strong>」と説明しています。
	<div class="super_separator"></div>
	&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問15 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	HSTSの動作に関して、「<strong>Webサイトにアクセスすると、Webブラウザは、以降の指定された期間、当該サイトには全てHTTPSによって接続する。</strong>」と説明しています。
</div>
<h2>UUID</h2>
「Universally Unique IDentifier」の略で、「汎用一意識別子」と訳されます。<br />また、「Universally」の代わりに「Globally」が用いられて「GUID」と呼ばれることもありますが同義です。<br /><br />「世界中でたったひとつしか存在しない(重複のない)識別子」を言います。<br /><a href="https://datatracker.ietf.org/doc/html/rfc4122">RFC4122</a>によって規定されています。
<?php footer(); ?>