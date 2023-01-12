<?php
require_once("common.php");
include_head("ネットワークセキュリティ");
?>

<div id = "main">
	<p id = "my_comment">ネットワークのセキュリティについて学びましょう♪<br><br>セキュリティの分野で学んだこともあると思いますが、総復習として Let's study!!</p>
	<span id = "href_l2-security"></span>
	<h2>無線LANのセキュリティ</h2>
	<p>無線LANのセキュリティは大きく2つのステップに分けられます。</p>
	<ol class = "lili">
		<li>LANポートにアクセスさせない</li>
		<li>LANポートアクセス後の利用者認証</li>
	</ol>
		<div class = "separator"></div>
		<h3>LANポートにアクセスさせない</h3>
		<p><a href = "sc-1-2-1">無線LAN</a>への接続にはまず、無線LANのアクセスポイントへ端末がアクセス要求をします。<br>端末はアクセスポイントに設定されたESSIDが分からないとその無線LANにアクセラレータ機能できませんが、アクセスポイントは自身を見つけられるようにするため通常<span class = "underline">ビーコン信号機能</span>を搭載しています。<br><br>無線LANセキュリティを高めるためにはこのビーコン信号機能の停止(<span class = "underline">SSIDステルス</span>)が有効です。<br><br>また、端末がアクセスポイントを探索するために発信する「ANYプローブ要求」に対する応答である「ANYプローブ応答」を発信しないように設定することも無線LANのセキュリティ向上に有効です。</p>
		<h3>LANポートアクセス後の利用者認証</h3>
		<p>端末がLANポートへ接続した後に、なりすましや不正アクセスを防ぐ目的で使用されます。<br>IEEE 802.1X規格によって標準化されています。</p>
		<div class = "explanation">
			<span class = "underline">IEEE 802.1X</span>とは、、、<br><br>
			物理的に無線LANに接続した後に、端末認証を実施することでより強固なセキュリティを築く技術です。<br><br>
			IEEE 802.1X認証を実現するためには、IEEE802.1Xに対応したLANスイッチ(オーセンティケータ)と認証サーバ、端末にインストールするソフトウェア(サプリカント)が必要です。<br><br>
			認証を実現する技術として、「<a href = "sc-1-1-14?to=href_eap">EAP</a>」と「<a href = "sc-1-1-14?to=href_radius">RADIUS</a>」が挙げられます。
		</div>
	<h2>SPENGO</h2>
	<p>「Simple and Protected Generic Security Service Application Program Interface」の略で、RFC4178による認証システムと連携してシングルサインオンを実現します。</p>

	<h2></h2>
</div>

<?php
include_footer();
?>