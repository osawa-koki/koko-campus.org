<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-19",
	"updated" => "2022-03-19"
);
head($obj);
?>
<!--
ネットワーク社会，ICT（Information and Communication Technology：情報通信技術）インターネットサービスプロバイダ（ISP），従量制，月額固定料金，IDF（Intermediate Distribution Frame），MDF（Main Distribution Frame），パケット交換網，回線交換網，センサネットワーク同軸ケーブル，より対線，光ファイバケーブルパケット，VoIP（Voice over Internet Protocol），SIP
-->
<p id="message">セキュリティ面の学習、お疲れさまでした。<br /><br />今回からは、ネットワークの勉強に入ります。<br />最初はネットワークの基礎(無線LAN等)の仕組みついて学びましょう♪<br /><br />それでは、Let's dance!!</p>
<h2>無線LAN</h2>
いわゆる「Wi-Fi」ですね、、、<br />IEEE 802.11シリーズで標準化されています。<br /><br />媒体アクセス制御方式として「<span class="underline">CSMA/CA</span>」方式を採用しています。<br /><br />以下にIEEE 802.11シリーズの特徴をまとめました。
<div class="scroll-600w">
	<table>
		<caption>IEEE 802.11シリーズ</caption>
		<thead>
			<tr>
				<th>規格</th>
				<th>周波数</th>
				<th>通信速度</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>IEEE802.11b</th>
				<td>2.4GHz</td>
				<td>11Mbps</td>
			</tr>
			<tr>
				<th>IEEE802.11a</th>
				<td>5GHz</td>
				<td>54Mbps</td>
			</tr>
			<tr>
				<th>IEEE802.11g</th>
				<td>2.4GHz</td>
				<td>54Mbps</td>
			</tr>
			<tr>
				<th>IEEE802.11n</th>
				<td>2.4GHz 5GHz</td>
				<td>600Mbps</td>
			</tr>
			<tr>
				<th>IEEE802.11ac</th>
				<td>5GHz</td>
				<td>6.9Gbps</td>
			</tr>
			<tr>
				<th>IEEE802.11ad</th>
				<td>60GHz</td>
				<td>6.8Gbps</td>
			</tr>
			<tr>
				<th>IEEE802.11ax</th>
				<td>2.4GHz 5GHz</td>
				<td>9.6Gbps</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問20 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	IEEE 802.11n 及び IEEE 802.11ac で使用される周波数の帯域の組み合わせは以下の通りです。
	<table>
		<thead>
			<tr>
				<th>IEEE 802.11n</th>
				<th>IEEE 802.11ac</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>2.4GHz, 5GHz</td>
				<td>5GHz</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="explanation">
	<span class="underline">媒体アクセス制御方式</span>とは、、、<br /><br />L2(データリンク層)において、データのやりとりをする際の方式のことを言います。<br /><br />方式には「CSMA/CD」と「CSMA/CA」の2つがあります。
	<div class="scroll-600w">
		<table>
			<caption>媒体アクセス制御方式</caption>
			<tbody>
				<tr>
					<th>CSMA/CD</th>
					<td>正式名称、「搬送波感知多重アクセス/衝突<span class="underline">検知</span>方式」です。<br /><span class="underline">有線LAN</span>において用いられます。<br />伝送路にフレームが流れていないことを確認してからフレームを送信します。</td>
				</tr>
				<tr>
					<th>CSMA/CA</th>
					<td>正式名称、「搬送波感知多重アクセス/衝突<span class="underline">回避</span>方式」です。<br /><span class="underline">無線LAN</span>において用いられます。<br />無線LANではフレームの衝突を検知できないので、一定期間回線が開いていることを確認してからフレームを送信します。<br /><br />無線LANでは有線LANと違ってCSMA/CAを採用しているため以下の問題が生じます。
					<ul>
						<li><span class="underline">隠れ端末問題</span><br />互いに相手の通信を検知できない関係にある複数の機器が、同時に信号を送信することでフレームの衝突(コリジョン)が生じる問題を言います。</li>
						<li><span class="underline">さらし端末問題</span><br />自分とは別の相手と通信している近隣の機器の信号との干渉を回避するため、過剰に送信の抑制が行われてしまう状態を言います。</li>
					</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="explanation">
	<div class="title">bps</div>
	「bit per second」の略で、通信速度の指標として用いられます。
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問18 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	無線LANの隠れ端末問題に関して、「<strong>端末がアクセスポイントとは通信できるが、他の端末のキャリアを検出できない状況にあり、送信フレームが衝突を起こしやすく問題。</strong>」と説明しています。
</div>
<h2>SSID</h2>
「Service Set ID」の略で、ネットワーク(無線LAN)におけるアクセスポイントの識別子のことです。<br />SSIDには、「ESSID」と「BSSID」の2種類あります。
<div class="scroll-600w">
	<table>
		<caption>SSIDの種類</caption>
		<tbody>
			<tr>
				<th>BSSID</th>
				<td>BSS(Basic Service Set / 1つのAPとそのAPの電波内にいる配下の無線LANクライアントで構成されるネットワーク)の最長48ビットの識別子です。<br />通常はMACアドレスが用いられます。</td>
			</tr>
			<tr>
				<th>ESSID</th>
				<td>ESS(Extended Service Set / 複数のBSSで構成される無線LANのネットワーク)の最長32オクテットの識別子です。<br />単にSSIDというときは、こちらを指す時が多いです。</td>
			</tr>
		</tbody>
	</table>
</div>
また、無線LANのモードには「インフラストラクチャモード」と「アドホックモード」の2つに分類されます。
<div class="scroll-600w">
	<table>
		<caption>無線LANのモード</caption>
		<tbody>
			<tr>
				<th>インフラストラクチャ<br />モード</th>
				<td>無線LANアクセスポイントを介して通信するモードです。<br />通常の無線LANのモードがこちらに該当します。</td>
			</tr>
			<tr>
				<th>アドホックモード</th>
				<td>アドホック(ad hoc/特定の目的の)通信用のモードです。<br />アドホック通信(ピアツーピア通信)用で、主にパソコンとプリンタを無線LANでつなぐ際に用いられます。</td>
			</tr>
		</tbody>
	</table>
</div>
無線LANに関する知識は後ほど学習する<a href=ネットワークセキュリティ?to=href_l2-security">無線LANのセキュリティ</a>でも必要なのでここでしっかりと覚えましょう♪
<h2>トラフィック理論</h2>
ネットワーク上でどのようにデータを送受信するのが効率的かどうかについての理論です。<br /><br />僕が受験した際には全く知らなかった知識です。<br />初めて勉強したときは「ほぅ」と思いました。<br /><br />トラフィック理論で用いられる用語等を説明しますね♪
<div class="scroll-600w">
	<table>
		<caption>トラフィック理論</caption>
		<tbody>
			<tr>
				<th>呼数</th>
				<td>電話の送受信回数のことです。</td>
			</tr>
			<tr>
				<th>呼量</th>
				<td>単位時間当たりの通話量のことで、「呼数×平均保留時間÷測定時間」で計算されます。</td>
			</tr>
			<tr>
				<th>呼損</th>
				<td>かけた電話がつながらないことを言います。</td>
			</tr>
			<tr>
				<th>呼損率</th>
				<td>かけた電話がつながらない割合を言います。<br />具体的には、つながらなかった呼量を要求された全呼量で割って求めます。</td>
			</tr>
			<tr>
				<th>アーラン</th>
				<td>呼量の単位(erl)で、単位時間当たりの通話量を意味します。</td>
			</tr>
			<tr>
				<th>アーランB式</th>
				<td>呼損率を求めるための式です。<br />以下の式から導き出されます。<br /><small>※MathMLを使用しているため、「safari・mozilla」等以外では適切に表示されません。<br />(2021年9月18日時点)</small>
				<br />
					<math xmlns="http://www.w3.org/1998/Math/MathML">
						<mi>B</mi>
						<mo>=</mo>
						<mfrac>
							<mrow>
								<mfrac>
									<mrow>
										<msup>
											<mi>a</mi>
											<mi>n</mi>
										</msup>
									</mrow>
									<mrow>
										<mi>n!</mi>
									</mrow>
								</mfrac>
							</mrow>
							<mrow>
								<mi>1</mi>
								<mo>+</mo>
								<mfrac>
									<mi>a</mi>
									<mrow>
										<mn>1</mn><mi>!</mi>
									</mrow>
								</mfrac>
								<mo>+</mo>
								<mfrac>
									<mrow>
										<msup>
											<mi>a</mi>
											<mn>2</mn>
										</msup>
									</mrow>
									<mrow>
										<mn>2</mn><mi>!</mi>
									</mrow>
								</mfrac>
								<mo>+</mo>
								<mfrac>
									<mrow>
										<msup>
											<mi>a</mi>
											<mn>3</mn>
										</msup>
									</mrow>
									<mrow>
										<mn>3</mn><mi>!</mi>
									</mrow>
								</mfrac>
								<mo>+</mo>
								<mo>・・・</mo>
								<mo>+</mo>
								<mfrac>
									<mrow>
										<msup>
											<mi>a</mi>
											<mi>n</mi>
										</msup>
									</mrow>
									<mrow>
										<mi>n!</mi>
									</mrow>
								</mfrac>
							</mrow>
						</mfrac>
					</math><br />
					<small>B・・・呼損率<br />a・・・呼量(アーラン)<br />n・・・回線数</small>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<!-- トラフィック設計，性能評価 -->
<?php footer(); ?>