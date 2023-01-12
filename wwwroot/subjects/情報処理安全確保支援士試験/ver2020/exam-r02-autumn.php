<?php
require_once("common.php");
include_head("令和2年度秋期試験");
?>

<div id = "main">
	<p id = "my_comment">あくまでもkoko自身の備忘録としてのページです。<br><br>資格試験勉強用のページでしたら<a href = "../../index">トップページ</a>からお願いします。</p>
	<h2>午前&#8544;問&#8544;</h2>
	<div class = "explanation">
		<span class = "underline">サーバ証明書</span>について、、、<br><br>
		サーバ証明書を発行するまでの手順は以下の通りです。
		<ol>
			<li>鍵ペア(秘密鍵・公開鍵)の生成</li>
			<li>秘密鍵を用いてCSRを生成</li>
			<li>CSRを用いて証明書を生成</li>
			<li>http通信を暗号化</li>
		</ol>
		ブラウザは指定したアドレスと接続先サーバ証明書のcommonNameが一致しているかどうかを検証します。<br><small>(subjectAltName(ドメイン名の別名)があればこちらも検証する)</small>
	</div>
	<h2>午前&#8544;問&#8545;</h2>
	<div class = "explanation">
		<span class = "underline">サーバ証明書</span>について、、、<br><br>
		サーバ証明書を発行するまでの手順は以下の通りです。
		<ol>
			<li>鍵ペア(秘密鍵・公開鍵)の生成</li>
			<li>秘密鍵を用いてCSRを生成</li>
			<li>CSRを用いて証明書を生成</li>
			<li>http通信を暗号化</li>
		</ol>
		ブラウザは指定したアドレスと接続先サーバ証明書のcommonNameが一致しているかどうかを検証します。<br><small>(subjectAltName(ドメイン名の別名)があればこちらも検証する)</small>
	</div>
	<h2>午後&#8545;問&#8544;</h2>
	<p>セキュアプログラミングに関する内容のためスキップ</p>
	<h2>午後&#8545;問&#8545;</h2>
	<div class = "explanation">
		<span class = "underline">シェアードシークレット</span>とは、、、<br><br>
		サーバ・クライアント間で共有する秘密鍵を言います。
	</div>

	<h2></h2>
</div>

<?php
include_footer();
?>