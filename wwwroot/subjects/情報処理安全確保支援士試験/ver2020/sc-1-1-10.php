<?php
require_once("common.php");
include_head("論理的クラッキング(2)");
?>

<div id = "main">
	<p id = "my_comment">いよいよ攻撃方法シリーズの最終弾です。<br><br>今回は前回の続き、「論理的クラッキング」について学びます。<br><br>それでは、Let's step!</p>

	<h2>ゼロデイ攻撃</h2>
	<p>ソフトウェアに脆弱性が発見された際に、標的がパッチを適用するよりも先にその脆弱性を攻撃する攻撃を言います。</p>
	<div class = "explanation">
		パッチとは、、、<br><br>ソフトウェアのリリース後に発見された脆弱性を修正するためのプログラムを指します。<br>一般的にバージョンのアップデートまでの一時的な対応策として使われます。
	</div>
	<h2>サイドチャネル攻撃</h2>
	<p>サイドチャネル攻撃の前に、、、<br><br>ICチップ(Suica・Pasmoとかに入ってる電子部品)に対する攻撃は大きく「破壊攻撃」と「非破壊攻撃」に分類されます。<br>以下で、それぞれの特徴を学びましょう♪</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>ICチップに対する攻撃</caption>
			<tbody>
				<tr>
					<th>破壊攻撃</th>
					<td>ICチップを破壊して集積回路を直接操作する攻撃です。<br><br>例) プロービング・リバースエンジニアリング</td>
				</tr>
				<tr>
					<th>非破壊攻撃<br>(サイドチャネル攻撃)</th>
					<td>ICチップを破壊することなく、外部から観察可能な範囲内で情報を収集します。<br><br>例) DPA・SPA・グリッチ・光反射・タイミング攻撃</td>
				</tr>
			</tbody>
		</table>
	</div>
	<p>サイドチャネル攻撃とは何か理解できましたか???<br><br>サイドチャネル攻撃とは、ICチップに対する攻撃のうち、<span class = "underline">ICチップを破壊しない</span>攻撃のことです。<br><br>最近は、ICカードは生活に大きく入り込んでいるのでこれらに対する攻撃に関する知識が必要ですね♪<br><br>僕は文系の人間なのでチンプンカンプンです、、、泣</p>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問4 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		「<strong>暗号アルゴリズムを実装した攻撃対象の物理デバイスから得られる物理量やエラーメッセージから、攻撃対象の機密情報を得る</strong>」と説明しています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問5 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		「<strong>暗号化装置における暗号処理時の消費電力などの測定や統計情報によって、当該装置内部の秘密情報を推定する攻撃</strong>」と説明しています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 令和元年春試験午前&#8545;問2 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		「<strong>機器が発する電磁波を測定することによって秘密情報の取得を試みる。</strong>」と説明しています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問7 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		「<strong>暗号化装置における暗号化処理時の消費電力などの測定や統計情報によって、当該装置内部の秘密情報を推定する攻撃</strong>」と説明しています。
	</div>
	<h2>RLO攻撃</h2>
	<p>シラバスには「サービス及びソフトウェアの機能の悪用」のひとつとして説明されています。<br><br>RLOとは「Right to Left Override」の略です。アラビア語「حقا يشبه」って右から左に読むらしいんですけど、これを悪用した攻撃方法です。<br><br>ちょっとした問題を用意しました!!!<br>以下の3つのファイルの拡張子を当ててください!!</p>
<svg
	width="600"
	height="400"
	viewBox="0 0 158.75 105.83334"
	version="1.1"
	id="rlo"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<rect
		id="path_box"
		width="148.50204"
		height="13.042841"
		x="5.9624414"
		y="3.912852" />
	<rect
		class="rlo_select"
		width="131.74525"
		height="15.288486"
		x="14.445479"
		y="28.251146" />
	<rect
		class="rlo_select"
		width="131.74525"
		height="15.288486"
		x="14.445479"
		y="47.395485" />
	<rect
		class="rlo_select"
		width="131.74525"
		height="15.288486"
		x="14.445479"
		y="66.539825" />
	<path
		id="excel_icon0"
		d="M 17.814182,32.252089 29.440988,30.442106 29.393141,42.025997 17.814182,40.125515 Z" />
	<text
		xml:space="preserve"
		id="e"
		x="21"
		y="39" >X
	</text>
	<path
		id="pdf_icon0"
		d="M 17.799355,51.123274 29.42616,49.313291 29.37831,60.897182 17.799352,58.9967 Z" />
	<text
		xml:space="preserve"
		id="pdf"
		x="20"
		y="56" >pdf
	</text>
	<path
		id="img0"
		d="m 18.818955,67.822771 h 8.244939 c 2.189333,1.770098 0,0 2.189333,1.770098 V 80.306632 H 18.818955 Z" />
	<rect
		id="img1"
		width="8.5943003"
		height="5.147264"
		x="19.797169"
		y="71.898659" />
	<path
		id="img2"
		d="m -193.91239,270.96616 -9.78479,0 -9.7848,0 4.8924,-8.47389 4.8924,-8.47388 4.8924,8.47388 z"
		transform="matrix(0.26458333,0,0,0.26458333,77.674773,5.007519)" />
	<circle
		id="img3"
		cx="26.528206"
		cy="73.505722"
		r="0.69872355" />
	<rect
		id="lib"
		width="5.9624405"
		height="8.5710115"
		x="10.247946"
		y="6.1487675" />
	<text
		xml:space="preserve"
		class="rlo_name"
		x="20"
		y="12" >PC
	</text>
	<text
		xml:space="preserve"
		class="rlo_name"
		x="38"
		y="12" >OS(C:)
	</text>
	<text
		xml:space="preserve"
		class="rlo_name"
		x="70"
		y="12" >I
	</text>
	<text
		xml:space="preserve"
		class="rlo_name"
		x="88"
		y="12" >Love
	</text>
	<text
		xml:space="preserve"
		class="rlo_name"
		x="115"
		y="12" >You
	</text>
	<polyline
		points="31,8 33,10 31,12"/>
	<polyline
		points="61,8 63,10 61,12"/>
	<polyline
		points="78,8 80,10 78,12"/>
	<polyline
		points="105,8 107,10 105,12"/>
	<text
		xml:space="preserve"
		class="rlo_name"
		x="40"
		y="38" >love-lovexe.xlsx
	</text>
	<text
		xml:space="preserve"
		class="rlo_name"
		x="40"
		y="57" >love-lovedmc.pdf
	</text>
	<text
		xml:space="preserve"
		class="rlo_name"
		x="40"
		y="76" >love-love.jpeg
	</text>
	<text
		xml:space="preserve"
		class="rlo_answer"
		x="100"
		y="38" >アプリケーション(exeファイル)
	</text>
	<text
		xml:space="preserve"
		class="rlo_answer"
		x="100"
		y="57" >cmd(コマンドスクリプト)
	</text>
	<text
		xml:space="preserve"
		class="rlo_answer"
		x="100"
		y="76" >jpeg(画像ファイル)
	</text>
</svg>
	<div class = "scroll_x">
		<table border = "1" id = "rlo_table">
			<tbody>
				<tr>
					<th>1つ目</th>
					<td>
						<label for = "rlo_select0"></label>
						<select id = "rlo_select0" class = "rlo_select">
							<option value = "xlsx">xlsx(Excelファイル)</option>
							<option value = "pdf">PDF</option>
							<option value = "jpeg">JPEG(画像ファイル)</option>
							<option value = "docs">docs</option>
							<option value = "exe">アプリケーション</option>
							<option value = "cmd">cmd(コマンドスクリプト)</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>2つ目</th>
					<td>
						<label for = "rlo_select1"></label>
						<select id = "rlo_select1" class = "rlo_select">
							<option value = "xlsx">xlsx(Excelファイル)</option>
							<option value = "pdf">PDF</option>
							<option value = "jpeg">JPEG(画像ファイル)</option>
							<option value = "docs">docs</option>
							<option value = "exe">アプリケーション(exeファイル)</option>
							<option value = "cmd">cmd(コマンドスクリプト)</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>3つ目</th>
					<td>
						<label for = "rlo_select2"></label>
						<select id = "rlo_select2" class = "rlo_select">
							<option value = "xlsx">xlsx(Excelファイル)</option>
							<option value = "pdf">PDF</option>
							<option value = "jpeg">Jpeg(画像ファイル)</option>
							<option value = "docs">docs</option>
							<option value = "exe">アプリケーション</option>
							<option value = "cmd">cmd(コマンドスクリプト)</option>
						</select>
					</td>
				</tr>
				<tr>
					<th colspan = 2 id = "rlo_button_div"><button onclick = "check_rlo()">答え合わせ</button></th>
				</tr>
			</tbody>
		</table>
	</div>
	<p>なぜこのようか結果になるか分かりましたか???<br><br>例えば最初のファイル「love-lovexe.xlsx」は本当は「love-lovxslx.exe」なんです。<br>そうすると拡張子から「exeファイル」だって分かりますよね♪<br><br>ですけど、なぜ拡張子が「xlsx」であるかのように見えたのでしょうか???<br><br>解説しますね♪<br>最初の「love-lovexe.xlsx」を「love-lov」と「exe.xlsx」に分解してください。<br>次に、「exe.xlsx」にUnicode制御文字の[RLO]を挿入して逆さまにするすることで「xslx.exe」になりますね♪<br>こんな感じで拡張子を偽装する攻撃がRLO攻撃です。<br><br>もしかしたら本当は「xlsx」のエクセルファイルかもしれませんでしたけど、、、<br>また、アイコンは簡単に偽装ができるのでアイコンでファイルの拡張子を判断する行為はとても危険です。<br><br>大切なのは、<span class = "underline">ファイル名やアイコンで拡張子は分からない</span>ということです。<br>さらにWindowユーザならデフォルトで拡張子が非表示になっているので「koko.pdf.exe」というexeファイルは「koko.pdf」と表示され、さもpdfファイルであるかのように表示されます。</p>
	<h2>オープンリゾルバの悪用</h2>
	<p>「サービス及びソフトウェアの機能の悪用」のひとつです。<br><br>3つ前の授業でDNSサーバについて学んだのを覚えていますか???<small>(※リンクは<a href = "sc-1-1-7#dns_from_outside">こちら</a>。)</small><br><br>そこで、フルサービスリゾルバ(キャッシュサーバ)について学びましたよね♪<br>スタブリゾルバからの再帰的な名前解決要求に対して必要なら他のDNSサーバに問い合わせてその結果を返すサーバのことです。<br>このフルサービスリゾルバのうち、問い合わせ元のドメイン・名前解決対象のドメインに制限なく名前解決を行うDNSサーバのことを特に<span class = "underline">「オープンリゾルバ」</span>と呼びます。<br><br>このオープンリゾルバはDNSキャッシュポイズニング攻撃やDNSリフレクション攻撃に対して脆弱であるため、特別な注意が必要です。</p>
	<h2>オープンリダイレクトの悪用</h2>
	<p>「サービス及びソフトウェアの機能の悪用」のひとつです。<br><br>リダイレクト機能(ページを移動させる機能)を悪用して、正規のwebサイトから悪意あるwebサイトに誘導する攻撃方法です。<br><br>主にフィッシング目的で利用されます。</p>
	<div class = "step">
		<ul>
			<li>中間にクッションページを設置する。</li>
			<li>リダイレクト先をよく確認する。</li>
		</ul>
	</div>
	<h2>バージョンロールバック攻撃</h2>
	<p>標的が使用しているプロトコルのバージョンを脆弱性が存在が確認されているバージョンを使用するように誘導して、その脆弱性をついて攻撃する方法を言います。<br>ダウングレード攻撃のひとつです。<br><br>有名な攻撃方法だと、HTTPS通信において危殆化が報告されている「SSL 2.0」での通信を要求する攻撃があげられます。</p>
	<p class = "explanation">ダウングレード攻撃とは、、、<br><br>ソフトウェアのバージョンを降格(Downgrade)させる攻撃を指します。<br><br>有名な例だと、FREAK攻撃(強度の低いRSA暗号の使用を要求する攻撃)やLogjam攻撃(DH鍵交換の強度を弱める攻撃)があります。</p>
	<div class = "step">
		<ul>
			<li>脆弱性のあるプロトコルを無効化する。</li>
		</ul>
	</div>
	<h2></h2>
</div>


<?php
include_footer();
?>