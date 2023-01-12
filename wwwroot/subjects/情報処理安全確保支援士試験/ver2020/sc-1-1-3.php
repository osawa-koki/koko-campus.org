<?php
require_once("common.php");
include_head("不正のメカニズム");
?>

<script charset = "UTF-8" type = "text/javascript" src = "jquery-3.6.0.min.js" defer></script>

<div id = "main">
	<p id = "my_comment">前回の授業では、脅威と脆弱性について学びましたね♪<br><br>次は実際に攻撃する側の特徴と対策について学びましょう♪<br>今回は内部からの攻撃者(内部不正)について、次回は外部からの攻撃者(クラッカー)について学びます。<br><br>それでは、Let's smile!</p>

	<h2>不正のメカニズム</h2>
	<p>会社を攻撃する人は必ずしも、会社外部の人であるとは限りません。<br>普通に仕事をしていて真面目そうに見える人が会社のお金を横領していた、、、なんてこともあります。<br>実際に会社内部の人が行う不正は数多く報告されていて、会社内部の情報に容易にアクセスできる分、かなり悪質で予防が困難な行為であると言えます。<br>IPAの報告書によると従業員300名以上の会社で内部不正を経験したことがあると答えた人の割合は8%を上回るとされています。<br><small>※引用元は<a href = "https://www.ipa.go.jp/files/000051140.pdf">こちら</a>。</small><br><br>では、内部不正を防ぐためにはどのような対策が必要だと思いますか?<br><br>その前に内部不正はどのように起こるのでしょうか???<br><br>米国の組織犯罪研究者であるドナルド・クレッシーが発表した<span class = "underline">「不正のトライアングル」理論</span>によると、不正行為は<span class = "underline">「動機」「機会」「正当化」</span>の3つの要因がそろった時に発生するとされています。</p>
	<div class = "margin"></div>
	<div id = "fraud_triangle">
		<div id = "circle0" class = "circle"><div class = "inter">機会</div></div>
		<div id = "circle1" class = "circle"><div class = "inter">動機</div></div>
		<div id = "circle2" class = "circle"><div class = "inter">正当化</div></div>
		<div id = "arrow0" class="arrow"></div>
		<div id = "arrow1" class="arrow"></div>
		<div id = "arrow2" class="arrow"></div>
		<div id = "word">不正</div>
	</div>
	<div class = "margin"></div>
	<p>次に、「動機」「機会」「正当化」について「赤信号無視」の不正事例を用いて簡単に説明しますね♪</p>
	<div class = "scroll_x">
		<table border = "1" id = "triangle_table">
			<caption>不正のトライアングル</caption>
			<thead>
				<tr>
					<th>要因</th>
					<th>具体例</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th><span class = "underline">動機</span></th>
					<td>時間ギリギリだっ!!急がなきゃ!!</td>
				</tr>
				<tr>
					<th><span class = "underline">機会</span></th>
					<td>パトカーもいないし、車も来てないし大丈夫でしょ!</td>
				</tr>
				<tr>
					<th><span class = "underline">正当化</span></th>
					<td>みんな、赤信号無視くらいするし問題ない!</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p>ここまでくれば、内部不正に対する効果的な策が分かりましたか???<br>内部不正を防ぐためには、不正を生み出す3つの要因(「動機」「機会」「正当化」)を徹底的に取り除く必要があることが分かりますね♪<br>では3つの要因の内容を具体的に見ていきましょう。</p>
	<div class = "scroll_x">
		<table border = "1" id = "fraud_example">
			<caption>不正の要因の具体例</caption>
			<tbody>
				<tr>
					<th>動機</th>
					<td>過度なノルマ・上司への不満・金銭トラブル</td>
				</tr>
				<tr>
					<th>機会</th>
					<td>ずさんなルール・不十分な統制環境</td>
				</tr>
				<tr>
					<th>正当化</th>
					<td>都合の良い解釈・責任転嫁</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class = "svg_box">
		<svg
			id = "svg_traffic_light"
			height="400"
			viewBox="0 0 200 100"
			version="1.1"
			xmlns="http://www.w3.org/2000/svg"
			xmlns:svg="http://www.w3.org/2000/svg">
			<path
				d="M 52.916666,92.604166 V 10.583333 c 0,0 41.101396,-9.1553521 58.208334,0 2.80363,1.500459 5.29167,4.757603 5.29167,7.9375 0,3.179897 -2.48804,6.437041 -5.29167,7.9375 -15.551762,8.323047 -52.916667,0 -52.916667,0 v 66.145833 h -5.291667"
				id="traffic_light"
				class = "light_body" />
			<ellipse
				id="light0"
				class="light light_body"
				cx="64.822914"
				cy="18.520834"
				rx="6.614583"
				ry="5.2916665" />
			<ellipse
				id="light1"
				class="light light_body"
				cx="85.46048"
				cy="18.521873"
				rx="6.614583"
				ry="5.2916665" />
			<ellipse
				id="light2"
				class="light light_body"
				cx="105.39223"
				cy="18.345852"
				rx="6.614583"
				ry="5.2916665" />
		</svg>
	</div>
	<h2>状況的犯罪予防</h2>
	<p>状況的犯罪予防とは、犯罪予防についてのイギリスの専門家であるロナルド・クラークの「合理的選択理論」によって提唱されました。<br>「合理的選択理論」とは、犯罪者は我々と異なるサイコパスなどではなく合理的な人間であり、<strong>「メリット > デメリット」</strong>ではないことなんかしないよねっていう理論です。<br><br>言い換えれば、犯罪を犯すことのメリットを小さくして、犯罪を犯すことのデメリットを大きくすれば犯罪は予防できるよねってことです。<br><br>クラークが提唱した具体的な犯罪予防策は以下の5つです。</p>
	<ul>
		<li>犯罪の労力(手間)の増加</li>
		<li>犯罪のリスクの増加</li>
		<li>犯罪の利益の減少</li>
		<li>犯罪の口実の排除</li>
		<li>挑発の削減</li>
	</ul>
	<span><small>※引用元(webページ)は<a href = "https://www.ipa.go.jp/security/fy24/reports/insider/">こちら</a>。<br>※引用元(pdfファイル)は<a href = "https://www.ipa.go.jp/files/000057060.pdf">こちら</a>。</small></span>
	<h2></h2>
</div>


<?php
include_footer();
?>