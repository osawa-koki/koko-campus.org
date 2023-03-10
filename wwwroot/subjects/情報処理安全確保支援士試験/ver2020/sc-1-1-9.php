<?php
require_once("common.php");
include_head("論理的クラッキング(1)");
?>

<div id = "main">
	<p id = "my_comment">はい♪攻撃手法の第五弾です。<br><br>今回は前回までと異なって技術的なクラッキング方法ではなくて論理的な(戦略的/環境的な??)クラッキング方法について学びます。<br><br>それでは、Let's go!</p>
	<h2>論理的クラッキング(1)</h2>
	<p>論理的クラッキングでは、以下の5つを学びます。<br>頑張りましょう♪</p>
	<ul>
		<li>APT</li>
		<li>水飲み場攻撃</li>
		<li>やり取り型攻撃</li>
		<li>フィッシング</li>
		<li>サプライチェーン攻撃</li>
	</ul>
	<h2>APT</h2>
	<p>「Advanced Persistent Threats」の略で、直訳すると持続的標的型攻撃です。内容としては、特定の企業を対象に何度もしつこく攻撃します。<br>特定の企業を標的としている分、論理的・環境的な部分に対する注意も払う必要があります。<br><br>IPAはこの攻撃を「新しいタイプの攻撃」と呼んでいます。</p>
	<h2>水飲み場攻撃</h2>
	<p>攻撃者が標的がよく利用するwebサイトを把握して、そのwebサイトを改竄することで標的をマルウェアに感染させる攻撃を指します。<br><br>「水飲み場攻撃」という名前は、草食動物が水を飲みに水辺にやってくることを知っている肉食動物が水辺で待ち伏せする状態にちなんで付けられました。</p>
	<h2>やり取り型攻撃</h2>
	<p>いきなりマルウェアを送信するのではなく、最初に何度かいい感じのやり取りをして安心させた後にマルウェアを送信する攻撃です。</p>
	<h2>フィッシング</h2>
	<p>銀行・クレジットカード会社・ショッピングサイトを名乗るメールを送信して、そこに本物のサイトを模倣したサイトへのリンクを添付して個人情報を盗む攻撃を言います。</p>
	<h2>サプライチェーン攻撃</h2>
	<p>標的となる企業を直接攻撃するのではなく、標的となる企業の周りの企業(子会社・取引先企業)を最初に攻撃して、それを踏み台として標的企業に攻撃を仕掛ける方法を言います。<br><br>標的企業が大企業でありセキュリティ対策が進んでいる場合によく用いられる手法です。</p>
	<h2></h2>
</div>


<?php
include_footer();
?>