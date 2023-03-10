<?php
require_once("common.php");
include_head("サービス不能型攻撃");
?>

<div id = "main">
	<p id = "my_comment">攻撃手法シリーズの半分が終了して第四弾です。<br><br>ここでは大量のデータを送り付けてサービスを停止させる攻撃について学びます。<br><br>それでは、Let's Explore!</p>

	<h2>サービス不能型攻撃</h2>
	<p>問題です♪<br><br>大量のデータを送り付けてサーバに過度な負担をかける攻撃は情報セキュリティの特性(CIA)のうちのどれを損なわせる攻撃でしょうか?</p>
	<span class = "quiz"></span>
	<div>
		<span>A(可用性)</span>
		<p>サービスを使わせなくする攻撃は情報セキュリティ特性の可用性(A)を損なわせます。</p>
	</div>
	<p>サービス不能型攻撃には以下の種類があります。</p>
	<ul>
		<li>DoS攻撃</li>
		<li>DDoS攻撃</li>
		<li>EDoS攻撃</li>
		<li>ICMP Flood攻撃</li>
		<li>Smurf攻撃</li>
		<li>SYN Flood攻撃</li>
		<li>Connection Flood攻撃</li>
		<li>UDP Flood攻撃</li>
		<li>電子メール爆弾</li>
		<li>リフレクション攻撃</li>
		<li>アンプリファイア攻撃</li>
		<li>DNS水責め攻撃</li>
		<li>クリプトジャッキング</li>
	</ul>
	<h2>DoS攻撃</h2>
	<p>DoS攻撃とは、サービス(Service)の(of)否定(Denial)攻撃の略で、大量のデータ・パケットを送り付けてCPU・メモリやネットワーク帯域を溢れさせる攻撃です。<br><br>DoS攻撃はあくまでも大量のデータを送り付けてサービスを停止させる攻撃の総称です。</p>
	<h2>DDoS攻撃</h2>
	<p>DoS攻撃の分散型(Distributed)バージョンで、<span class = "underline">インターネット上で多数の踏み台サイトから</span>一斉にデータ・パケットを送り付けてサービスを停止させます。</p>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問13 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		マルチベクトル型DDoS攻撃に該当するものとして、「<strong>Webサイトに対して、SYN Flood攻撃とHTTP POST Flood攻撃を同時に行う。</strong>」を挙げています。<br><br>
		<small>※マルチベクトル型DDoS攻撃とは、<span class = "underline">複数のDDoS攻撃手法を組み合わせて</span>標的のサービス停止を狙う攻撃です。</small>
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問4 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		マルチベクトル型DDoS攻撃に該当するものとして、「<strong>攻撃対象のWebサーバ1台に対して、多数のPCから一斉にリクエストを送ってサーバのリソースを枯渇させる攻撃と、大量のDNS通信によってネットワークの帯域を消費させる攻撃を豪時に行う。</strong>」を挙げています。
		&#9836;&#9836;&#9836; 平成30年秋試験午前&#8545;問7 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		UDPの性質を悪用したDDoS攻撃該当するものとして、「<strong>DNSリフレクタ攻撃</strong>」を挙げています。<br><br>
	</div>
	<h2>EDoS攻撃</h2>
	<p>DoS攻撃のお金を浪費させる(Economic)バージョンです。<br><br>使用料に応じて課金される仕組みを悪用して経済的な損失を出させます。</p>
	<h2>ICMP Flood攻撃</h2>
	<p>別名、「Ping Flood攻撃」です。攻撃対象のホストに対して大量のICMP echo request(ping)を送り付けてサービスを停止させる攻撃です。</p>
	<div class = "explanation">ICMPとは、、、<br><br>Internet Control Message Protocolの略で、TCP/IPでいうネットワーク層においてノードに対する通信状態の確認をするために使われるプロトコルです。<br>「Ping監視」(死活監視/可用性監視)に用いられます。
	</div>
	<div class = "step">
		<ul>
			<li>FWの適切な設定</li>
			<li>ブロードキャストアドレス向けのパケットを遮断する。<br><small>※踏み台にならないための対策</small></li>
		</ul>
	</div>
	<h2>smurf攻撃</h2>
	<p>ICMP Flood攻撃の反射させて攻撃するバージョンです。<br>ICMP Flood攻撃は攻撃者が標的に直接大量のデータを送信するのに対して、smurf攻撃では<span class = "underline">発信元IPアドレスを標的に設定して、</span>対策がなされていないホストに大量に送信することで標的サイトに大量の応答が返ってくることでDoS攻撃を実現します。</p>
<svg
   width="600"
   height="400"
   viewBox="0 0 158.75 105.83334"
   version="1.1"
   id="smurf"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
    	<filter
	    	id="filter"
	    	x="-0.24476986"
	    	y="-0.38741724"
	    	width="1.4895397"
	    	height="1.7748345">
	    	<feGaussianBlur
				stdDeviation="6"/>
    	</filter>
  <rect
		width="16.52751"
		height="10.552107"
		x="34.060448"
		y="21.420782"
		class="pc" />
  <rect
		width="16.444685"
		height="10.466186"
		x="75.393158"
		y="52.145924"
		transform="matrix(1,0,-0.79025633,0.61277642,0,0)"
		class="pc"/>
  <rect
		width="13.389375"
		height="7.474412"
		x="35.68182"
		y="23.097036"
		class="monitor" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="13.205558"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="14.518119"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="14.591436"
		y="88.263542"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="37.388481"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="38.701042"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="38.774361"
		y="88.26355"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="61.571392"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="62.883953"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="62.957272"
		y="88.263542"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="85.754303"
		y="83.909447"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="87.066864"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="87.140182"
		y="88.263542"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="109.93723"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="111.24979"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="111.3231"
		y="88.263542"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="134.12016"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="135.43272"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="135.50604"
		y="88.263542"
		class="window" />
  <ellipse
		cx="115.16688"
		cy="30.864017"
		rx="11.396826"
		ry="9.368619"
		class="bad_face" />
  <path
		d="m 121.1324,26.752184 -5.66141,4.684923 c 0,0 2.28923,0.221034 3.39686,0 0.72724,-0.145129 1.54676,-0.32714 2.0381,-0.851804 0.52084,-0.556171 0.66105,-1.38862 0.67937,-2.129511 0.0145,-0.585188 -0.45292,-1.703608 -0.45292,-1.703608 z"
		class="bad_eyes" />
  <path
		d="m 107.54501,26.752184 5.66142,4.684923 c 0,0 -2.28924,0.221034 -3.39686,0 -0.72724,-0.145129 -1.54676,-0.32714 -2.0381,-0.851804 -0.52086,-0.556171 -0.66107,-1.38862 -0.67937,-2.129511 -0.0145,-0.585188 0.45291,-1.703608 0.45291,-1.703608 z"
		class="bad_eyes" />
  <path
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		transform="matrix(-4.3048061e-4,-0.0016545,0.18188529,-0.10705216,40.484951,69.570205)"
		class="arw_go" />
  <path
		transform="matrix(-0.00140755,-0.00190221,0.13138173,-0.09787323,59.7957,69.412192)"
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="arw_go" />
  <path
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="arw_go"
		transform="matrix(-0.00220909,-0.00113407,0.08979235,-0.09172109,77.487936,69.959511)" />
  <path
		transform="matrix(-0.00220298,-0.00159787,0.04110111,-0.08317575,97.532968,69.779365)"
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="arw_go" />
  <path
		transform="matrix(-0.00276149,-4.08592e-4,0.00291793,-0.08240297,114.97336,69.575024)"
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="arw_go" />
  <path
		transform="matrix(0.00241818,-0.0013687,-0.03692953,-0.08290854,132.60226,69.754205)"
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="arw_go" />
  <path
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z"
		transform="matrix(-0.00550598,-0.00123774,0.0542827,-0.14899195,19.778784,75.855834)"
		class="arw_back" />
  <path
		transform="matrix(-0.00559303,8.2419191e-4,-0.00826583,-0.14708776,41.532712,76.064147)"
		class="arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <path
		transform="matrix(-0.00475888,0.00335339,-0.07607968,-0.14505466,62.473976,75.729438)"
		class="arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <path
		transform="matrix(-0.00489888,-2.1228466e-4,-0.22613194,-0.16652122,104.96522,75.135138)"
		class="arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <path
		transform="matrix(-0.00411003,0.00163806,-0.1547088,-0.15595525,84.379668,75.028714)"
		class="arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <path
		transform="matrix(-0.0059905,5.3320788e-4,-0.30508662,-0.17608104,125.67252,74.899805)"
		class="arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <ellipse
		id="poizoned"
		cx="42.027084"
		cy="30.553812"
		rx="29.805559"
		ry="18.831125"
		transform="matrix(0.86292874,0,0,0.93601617,3.1418082,2.2043689)" />
	<text
		xml:space="preserve"
		id="smurf_txt0"
		x="35"
		y="20" >tori
	</text>
	<text
		xml:space="preserve"
		id="smurf_txt1"
		x="95"
		y="20" >拙者、<tspan id = "tori">tori</tspan>でござる。
	</text>
	<text
		xml:space="preserve"
		class="smurf_return"
		x="0"
		y="102" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="smurf_return"
		x="50"
		y="105" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="smurf_return"
		x="105"
		y="80" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="smurf_return"
		x="15"
		y="80" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="smurf_return"
		x="100"
		y="103" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="smurf_return"
		x="52"
		y="82" >toriにデータを返さねば!
	</text>
</svg>
	<span id = "smurf_button" class = "svg_button">smurf攻撃</span>
	<div class = "step">
		<ul>
			<li>FWでICMP echo replyを遮断する。</li>
		</ul>
	</div>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問4 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		smurf攻撃に関して、「<strong>ICMPの応答パケットを大量に発生させ、それが攻撃対象に送られるようにする</strong>」と説明しています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問6 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		smurf攻撃を「<strong>ICMPの応答パケットを大量に発生させ、それが攻撃対象に送られるようにする。</strong>」と説明しています。
	</div>
	<h2>SYN Flood攻撃</h2>
	<p>TCPの接続開始要求(SYN)を大量に送り付けるます。<br>SYNを受け取ったホストはSYN/ACKを返した後にその応答であるACKをしばらく待ちますが、攻撃者はこれを無視してひたすらにSYNを送る続けます。<br><br>SYN Flood攻撃の際にはIPアドレスを偽装したパケットが送られることが多く、攻撃者の特定は困難です。</p>
	<div class = "step">
		<ul>
			<li>コネクション確立時のウェイトタイムを短くする。</li>
			<li>SYN Flood攻撃対策が可能なFWを使用する。</li>
		</ul>
	</div>
	<svg
		width="600"
		height="400"
		viewBox="0 0 158.75 105.83334"
		version="1.1"
		id="ping_attack"
		xmlns="http://www.w3.org/2000/svg"
		xmlns:svg="http://www.w3.org/2000/svg" >
		<rect
			id="session_line0"
			class="line"
			width="1.0581948"
			height="78.218246"
			x="26.983967"
			y="24.250275" />
		<rect
			id="session_line1"
			class="line"
			width="1.0581948"
			height="76.190018"
			x="121.6924"
			y="26.895788" />
		<rect
			id="session_my_mua0"
			class="pc"
			width="13.932898"
			height="8.4655581"
			x="24.315931"
			y="6.6060491" />
		<rect
			id="session_my_mua1"
			class="pc"
			width="13.863076"
			height="8.6654387"
			x="44.823879"
			y="25.35722"
			transform="matrix(1,0,-0.80463679,0.59376733,0,0)" />
		<rect
			id="session_my_mua2"
			class="pc"
			width="11.287411"
			height="5.996439"
			x="25.682768"
			y="7.9508443" />
		<rect
			id="session_cache0"
			width="12.633839"
			height="18.279276"
			x="115.55184"
			y="6.0278206" />
		<rect
			id="session_cache1"
			class="window"
			width="5.2634101"
			height="2.0620072"
			x="117.43695"
			y="8.1813469" />
		<rect
			id="session_cache2"
			class="window"
			width="5.2634101"
			height="2.0620072"
			x="117.54223"
			y="12.305359" />
		<path
			class="arw"
			d="M 311.29258,95.320852 186.52023,166.69161 61.747894,238.06239 62.325176,94.320983 62.902443,-49.42042 187.09751,22.950223 Z"
			transform="matrix(0.30570224,0.05,-0.00138463,0.00880529,20,25)" />
		<path
			class="arw"
			d="M 311.29259,95.320853 186.52024,166.69161 61.747903,238.06239 62.325186,94.320984 62.902453,-49.420419 187.09752,22.950224 Z"
			transform="matrix(0.30570224,0.05,-0.00138463,0.00880529,20,35)" />
		<path
			class="arw"
			d="M 311.29259,95.320853 186.52024,166.69161 61.747903,238.06239 62.325186,94.320984 62.902453,-49.420419 187.09752,22.950224 Z"
			transform="matrix(0.30570224,0.05,-0.00138463,0.00880529,20,45)" />
		<path
			class="arw"
			d="M 311.29259,95.320853 186.52024,166.69161 61.747903,238.06239 62.325186,94.320984 62.902453,-49.420419 187.09752,22.950224 Z"
			transform="matrix(0.30570224,0.05,-0.00138463,0.00880529,20,55)" />
		<path
			class="arw"
			d="M 311.29259,95.320853 186.52024,166.69161 61.747903,238.06239 62.325186,94.320984 62.902453,-49.420419 187.09752,22.950224 Z"
			transform="matrix(0.30570224,0.05,-0.00138463,0.00880529,20,65)" />
		<path
			class="arw"
			d="M 311.29259,95.320853 186.52024,166.69161 61.747903,238.06239 62.325186,94.320984 62.902453,-49.420419 187.09752,22.950224 Z"
			transform="matrix(0.30570224,0.05,-0.00138463,0.00880529,20,75)" />
		<path
			class="arw"
			d="M 311.29259,95.320853 186.52024,166.69161 61.747903,238.06239 62.325186,94.320984 62.902453,-49.420419 187.09752,22.950224 Z"
			transform="matrix(0.30570224,0.05,-0.00138463,0.00880529,20,85)" />
		<text
			class="session_txt"
			x=65
			y=32 >SYN
		</text>
		<text
			class="session_txt"
			x=65
			y=42 >SYN
		</text>
		<text
			class="session_txt"
			x=65
			y=52 >SYN
		</text>
		<text
			class="session_txt"
			x=65
			y=62 >SYN
		</text>
		<text
			class="session_txt"
			x=65
			y=72 >SYN
		</text>
		<text
			class="session_txt"
			x=65
			y=82 >SYN
		</text>
		<text
			class="session_txt"
			x=65
			y=92 >SYN
		</text>
		<text
			xml:space="preserve"
			transform="rotate(-30 105 2)"
			class="q"
			x=75
			y=12 >
			?
		</text>
		<text
			xml:space="preserve"
			transform="rotate(-30 130 0)"
			class="q"
			x=125
			y=12 >
			?
		</text>
	</svg>
	<span id = "ping_attack_button">ICMP Flood攻撃</span>
	<h2>Connection Flood攻撃</h2>
	<p>標的ホストに対して大量にTCPコネクションを確立することで、標的のTCPコネクションを占領する攻撃のことを指します。<br><br>この攻撃では実際にTCPコネクションを確立するためIPアドレスの偽装は困難ですが、実際にTCPコネクションを確立するということは攻撃の影響が確実に出るということを意味します。</p>
	<div class = "step">
		<ul>
			<li>ロードバランサの使用</li>
			<li>FWの適切な設定</li>
		</ul>
	</div>
	<h2>UDP Flood攻撃</h2>
	<p>標的ホストのUDPポートに対して、大量のパケットを送り付けてサービスを停止させる攻撃を指します。<br><br>UDPはコネクションレスであるため、攻撃者を特定することは困難です。</p>
	<div class = "step">
		<ul>
			<li>FWを適切に設定する。</li>
			<li>不要なUDPポートを閉じる。</li>
		</ul>
	</div>
	<h2>電子メール爆弾</h2>
	<p>前回の授業で、メールの送信方法について学びましたね♪<br><br>メールはMTAが受信した後に一旦MDAによってメールBOXに保存されてその後MUAからの要求に応じてMRAがメールBOXからメールを取り出してMUAにメールを送信することを覚えていますか???<br><br>電子メール爆弾とは大量のメールを送信して、標的のメールBOXに大量にメール保存させて可用性を損なわせる攻撃のことを指します。</p>
	<div class = "step">
		<ul>
			<li>電子メールフィルタリング</li>
		</ul>
	</div>
	<h2>リフレクション攻撃</h2>
	<p>別名、「反射攻撃」ですが、後述するアンプリファイア攻撃と合わせて「反射・増幅型攻撃」と呼ばれることが多いです。<br><br>リフレクション(reflection)とは「反射」の意味で、直接標的サイトに大量のデータを送り付けるのではなく、発信元のIPアドレスを標的のIPアドレスに偽装したパケットを踏み台とするノードに大量に送り付けて、その応答パケットを標的サイトに送られるよう仕向けて(反射させて)標的サイトを可用性を損なわせる攻撃を指します。<br><br>前述したsmurf攻撃がリフレクション攻撃に該当します。</p>
	<div class = "step">
		<ul>
			<li>適切なアクセス制限をかける。</li>
			<li>ACLを適切に設定する。</li>
		</ul>
	</div>
<svg
   width="600"
   height="400"
   viewBox="0 0 158.75 105.83334"
   version="1.1"
   id="reflection"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
    	<filter
	    	id="reflection_filter"
	    	x="-0.24476986"
	    	y="-0.38741724"
	    	width="1.4895397"
	    	height="1.7748345">
	    	<feGaussianBlur
				stdDeviation="6"/>
    	</filter>
  <rect
		width="16.52751"
		height="10.552107"
		x="34.060448"
		y="21.420782"
		class="pc" />
  <rect
		width="16.444685"
		height="10.466186"
		x="75.393158"
		y="52.145924"
		transform="matrix(1,0,-0.79025633,0.61277642,0,0)"
		class="pc"/>
  <rect
		width="13.389375"
		height="7.474412"
		x="35.68182"
		y="23.097036"
		class="monitor" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="13.205558"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="14.518119"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="14.591436"
		y="88.263542"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="37.388481"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="38.701042"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="38.774361"
		y="88.26355"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="61.571392"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="62.883953"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="62.957272"
		y="88.263542"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="85.754303"
		y="83.909447"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="87.066864"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="87.140182"
		y="88.263542"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="109.93723"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="111.24979"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="111.3231"
		y="88.263542"
		class="window" />
  <rect
		width="8.7967043"
		height="12.678484"
		x="134.12016"
		y="83.909454"
		class="server" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="135.43272"
		y="85.403137"
		class="window" />
  <rect
		width="3.6648135"
		height="1.4302057"
		x="135.50604"
		y="88.263542"
		class="window" />
  <ellipse
		cx="115.16688"
		cy="30.864017"
		rx="11.396826"
		ry="9.368619"
		class="bad_face" />
  <path
		d="m 121.1324,26.752184 -5.66141,4.684923 c 0,0 2.28923,0.221034 3.39686,0 0.72724,-0.145129 1.54676,-0.32714 2.0381,-0.851804 0.52084,-0.556171 0.66105,-1.38862 0.67937,-2.129511 0.0145,-0.585188 -0.45292,-1.703608 -0.45292,-1.703608 z"
		class="reflection_bad_eyes" />
  <path
		d="m 107.54501,26.752184 5.66142,4.684923 c 0,0 -2.28924,0.221034 -3.39686,0 -0.72724,-0.145129 -1.54676,-0.32714 -2.0381,-0.851804 -0.52086,-0.556171 -0.66107,-1.38862 -0.67937,-2.129511 -0.0145,-0.585188 0.45291,-1.703608 0.45291,-1.703608 z"
		class="reflection_bad_eyes" />
  <path
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		transform="matrix(-4.3048061e-4,-0.0016545,0.18188529,-0.10705216,40.484951,69.570205)"
		class="reflection_arw_go" />
  <path
		transform="matrix(-0.00140755,-0.00190221,0.13138173,-0.09787323,59.7957,69.412192)"
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="reflection_arw_go" />
  <path
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="reflection_arw_go"
		transform="matrix(-0.00220909,-0.00113407,0.08979235,-0.09172109,77.487936,69.959511)" />
  <path
		transform="matrix(-0.00220298,-0.00159787,0.04110111,-0.08317575,97.532968,69.779365)"
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="reflection_arw_go" />
  <path
		transform="matrix(-0.00276149,-4.08592e-4,0.00291793,-0.08240297,114.97336,69.575024)"
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="reflection_arw_go" />
  <path
		transform="matrix(0.00241818,-0.0013687,-0.03692953,-0.08290854,132.60226,69.754205)"
		d="m 510.00001,330 -259.95192,0.0833 -259.9519051,0.0833 L 120,105 249.90381,-120.16661 379.95191,104.9167 Z"
		class="reflection_arw_go" />
  <path
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z"
		transform="matrix(-0.00550598,-0.00123774,0.0542827,-0.14899195,19.778784,75.855834)"
		class="reflection_arw_back" />
  <path
		transform="matrix(-0.00559303,8.2419191e-4,-0.00826583,-0.14708776,41.532712,76.064147)"
		class="reflection_arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <path
		transform="matrix(-0.00475888,0.00335339,-0.07607968,-0.14505466,62.473976,75.729438)"
		class="reflection_arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <path
		transform="matrix(-0.00489888,-2.1228466e-4,-0.22613194,-0.16652122,104.96522,75.135138)"
		class="reflection_arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <path
		transform="matrix(-0.00411003,0.00163806,-0.1547088,-0.15595525,84.379668,75.028714)"
		class="reflection_arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <path
		transform="matrix(-0.0059905,5.3320788e-4,-0.30508662,-0.17608104,125.67252,74.899805)"
		class="reflection_arw_back"
		d="M -9.9999952,230 -87.942287,94.999998 -165.88458,-39.999996 -9.999998,-40 l 155.884568,-4e-6 -77.942285,135.000006 z" />
  <ellipse
		id="reflection_poizoned"
		cx="42.027084"
		cy="30.553812"
		rx="29.805559"
		ry="18.831125"
		transform="matrix(0.86292874,0,0,0.93601617,3.1418082,2.2043689)" />
	<text
		xml:space="preserve"
		id="reflection_txt0"
		x="35"
		y="20" >tori
	</text>
	<text
		xml:space="preserve"
		id="reflection_txt1"
		x="95"
		y="20" >拙者、<tspan id = "reflection_tori">tori</tspan>でござる。
	</text>
	<text
		xml:space="preserve"
		class="reflection_return"
		x="0"
		y="102" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="reflection_return"
		x="50"
		y="105" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="reflection_return"
		x="105"
		y="80" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="reflection_return"
		x="15"
		y="80" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="reflection_return"
		x="100"
		y="103" >toriにデータを返さねば!
	</text>
	<text
		xml:space="preserve"
		class="reflection_return"
		x="52"
		y="82" >toriにデータを返さねば!
	</text>
</svg>
	<span id = "reflection_button">リフレクション攻撃</span><br><br>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問1 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		リフレクト攻撃(リフレクション攻撃)に悪用されることが多いサービスとして、「<strong>DNS・Memcached・NTP</strong>」を挙げています。<br><br>
		これらの特徴として、「<strong>誰にでも応答パケットを返す・リクエストに対するレスポンスが大きい(増幅率が高い)</strong>」ことがあげられます。<br><br>
		<small>因みにMemcachedとは、データをキャッシュ上に保存することでデータベースでの検索回数を減らして実行効率を向上させるプログラムです。</small>
	</div>
	<h2>アンプリファイア攻撃</h2>
	<p>別名、「増幅攻撃」ですが、前述したリフレクション攻撃と合わせて「反射・増幅型攻撃」と呼ばれることが多いです。<br><br>リフレクション攻撃はなぜ攻撃者は自分で標的に直接大量のデータを送らずに、踏み台を利用して反射させて大量のデータを送ると思いますか???<br><br><br>答えは踏み台を利用した方が強力になるからです。<br>攻撃者のコンピュータ資源だけをフル稼働させても標的に対してサービスを停止させる程のダメージを与えることってかなり難しいんです。利用できるコンピュータ資源を使っちゃえって感じです。<br><br>アンプリファイア攻撃はリフレクション攻撃とほとんど同義です。要求パケットを反射させて応答パケットで攻撃するのがリフレクション攻撃ですが、要求パケットに対する応答パケットの方が大きい場合はその分だけより強力な増大された(アンプリファイド)攻撃をすることが可能になります。換言すれば、反射させる際にパケットが大きく増長する(増幅率が高い)場合は攻撃者自身が豊富なコンピュータ資源を有していなくても十分な攻撃が可能になります。<br><br>「反射・増幅型攻撃」はその性質上、<span class = "underline">コネクションを確立しないUDPであること</span>と<span class = "underline">問い合わせ元を制限しない</span>機能が攻撃対象となりますが、この2つを満たす機能として「NTP」「DNS」「SSDP」「RIP」があげられます。</p>
	<div class = "step">
		<ul>
			<li>適切なアクセス制限をかける。</li>
			<li>ACLを適切に設定する。</li>
		</ul>
	</div>
<svg
	width="600"
	height="400"
	viewBox="0 0 158.75 105.83334"
	version="1.1"
	id="amp"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<defs
		id="defs2">
	<filter
			id="amp_filter"
			x="-0.24476986"
			y="-0.38741724"
			width="1.4895397"
			height="1.7748345">
		 <feGaussianBlur
			stdDeviation="6.0795856" />
	</filter>
	</defs>
	<rect
		width="16.52751"
		height="10.552107"
		x="133.17802"
		y="41.879215"
		class="pc" />
	<rect
		width="16.444685"
		height="10.466186"
		x="200.89459"
		y="85.532379"
		transform="matrix(1,0,-0.79025633,0.61277642,0,0)"
		class="pc" />
	<rect
		width="13.389375"
		height="7.474412"
		x="134.79939"
		y="43.55547"
		class="monitor" />
	<rect
		width="8.7967043"
		height="12.678484"
		x="42.163616"
		y="33.292473"
		class="server" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="43.476177"
		y="34.786156"
		class="window" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="43.549496"
		y="37.646561"
		class="window" />
	<rect
		width="8.7967043"
		height="12.678484"
		x="42.163616"
		y="59.394608"
		class="server" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="43.476177"
		y="60.88829"
		class="window" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="43.549496"
		y="63.748707"
		class="window" />
	<rect
		width="8.7967043"
		height="12.678484"
		x="80.297272"
		y="6.6612353"
		class="server" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="81.609833"
		y="8.1549187"
		class="window" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="81.683151"
		y="11.015324"
		class="window"
		id="rect14-4" />
	<rect
		width="8.7967043"
		height="12.678484"
		x="80.297272"
		y="33.703987"
		class="server" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="81.609833"
		y="35.197678"
		class="window" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="81.683151"
		y="38.058083"
		class="window" />
	<rect
		width="8.7967043"
		height="12.678484"
		x="80.297272"
		y="60.74675"
		class="server" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="81.609825"
		y="62.240433"
		class="window" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="81.683136"
		y="65.100838"
		class="window" />
	<rect
		width="8.7967043"
		height="12.678484"
		x="80.297272"
		y="87.789505"
		class="server" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="81.609833"
		y="89.283188"
		class="window" />
	<rect
		width="3.6648135"
		height="1.4302057"
		x="81.683151"
		y="92.143593"
		class="window" />
	<ellipse
		cx="14.81474"
		cy="53.350658"
		rx="9.6464596"
		ry="8.4118986"
		class="bad_face" />
	<path
		d="m 8.3634663,49.658722 4.7919187,4.2065 c 0,0 -1.93765,0.198462 -2.875158,0 C 9.6646794,53.734914 8.971024,53.57149 8.5551458,53.100404 8.1142814,52.601029 7.9956053,51.85359 7.9801159,51.188358 7.9678429,50.66293 8.3634663,49.658722 8.3634663,49.658722 Z"
		class="bad_eyes" />
	<path
		d="m 19.864055,49.658722 -4.79191,4.2065 c 0,0 1.937642,0.198462 2.875158,0 0.615548,-0.130308 1.309203,-0.293732 1.725081,-0.764818 0.440848,-0.499375 0.559524,-1.246814 0.57503,-1.912046 0.01227,-0.525428 -0.383359,-1.529636 -0.383359,-1.529636 z"
		class="bad_eyes" />
	<path
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z"
		transform="matrix(0.00157242,0.00341444,-0.03172085,0.01460808,36.212191,40.711383)"
		class="amp_arw amp_arw0" />
	<path
		transform="matrix(0.00157242,-0.0027986,-0.03172085,-0.01197331,36.15733,64.327814)"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z"
		class="amp_arw amp_arw0" />
	<path
		transform="matrix(0.00188699,0.00325134,-0.05265874,0.03106335,71.060691,19.933709)"
		class="amp_arw amp_arw1"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(0.00188699,-0.003455,-0.05265874,-0.03300908,71.678083,86.602106)"
		class="amp_arw amp_arw1"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-6.2076918e-4,0.00370759,-0.05207694,-0.00844621,72.4909,37.819668)"
		class="amp_arw amp_arw1"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-6.2076918e-4,-0.00370759,-0.05207694,0.00844621,72.4909,68.013665)"
		class="amp_arw amp_arw1"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-0.00234381,0.00293922,-0.05530211,-0.04328125,73.939596,54.678812)"
		class="amp_arw amp_arw1"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-0.00234381,-0.00293922,-0.05530211,0.04328125,73.416099,51.879335)"
		class="amp_arw amp_arw1"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-0.00331503,0.00177357,-0.05101727,-0.09177678,72.144257,77.777502)"
		class="amp_arw amp_arw1"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-0.00331503,-0.00177357,-0.05101727,0.09177678,72.144257,29.378748)"
		class="amp_arw amp_arw1"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-0.00463321,0.00513803,-0.05879757,-0.05239101,116.31805,34.916506)"
		class="amp_arw amp_arw2"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-0.00463321,-0.00513803,-0.05879757,0.05239101,115.37787,70.895281)"
		class="amp_arw amp_arw2"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-0.00243242,0.00647676,-0.06292455,-0.02332027,113.4136,47.00371)"
		class="amp_arw amp_arw2"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<path
		transform="matrix(-0.00214325,-0.00657812,-0.06389542,0.0205112,114.00933,60.552177)"
		class="amp_arw amp_arw2"
		d="m 139.3151,-102.65322 131.56636,226.69334 131.56636,226.69335 -262.10537,0.59314 -262.10538,0.59314 L 8.7760862,124.63327 Z" />
	<ellipse
		id="amp_poisoned"
		cx="42.027084"
		cy="30.553812"
		rx="20.805559"
		ry="18.831125"
		transform="matrix(0.62454345,0,0,1.0135265,112.63076,19.941834)" />
</svg>
	<span id = "amp_button">反射・増幅攻撃</span>
	<h2>DNS水攻め攻撃</h2>
	<p>別名、「ランサムサブドメイン攻撃」です。<br>オープンリゾルバとなっているDNSキャッシュサーバに対して、標的ドメインのランダムなサブドメインに関する名前解決要求を大量に送信させて、標的ドメインの権威DNSサーバ(コンテンツサーバ)の可用性を損なわせる攻撃のことを指します。</p>
	<div class = "step">
		<ul>
			<li>不必要なオープンリゾルバを無くす。</li>
			<li>ログの監視を強化する。</li>
		</ul>
	</div>
	<h2>クリプトジャッキング</h2>
	<p>ECMAScriptコードをhtmlに埋め込み、webサイト利用者のコンピュータ資源を使って仮想通貨のマイニングを行わせる攻撃です。</p>
	<div class = "step">
		<ul>
			<li>信頼できないwebサイトは訪問しない。</li>
		</ul>
	</div>
	<div class = "exam">
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問5 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		クリプトジャッキングを「<strong>仮想通貨環境において、報酬を得るために他人のPC又はサーバに侵入して計算資源を不正に使用し、台帳への追記の計算を行う。</strong>」と説明しています。
	</div>
	<h2></h2>
</div>


<?php
include_footer();
?>