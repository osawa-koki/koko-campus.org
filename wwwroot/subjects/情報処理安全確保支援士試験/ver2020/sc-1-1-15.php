<?php
require_once("common.php");
include_head("公開鍵基盤(PKI)");
?>

<div id = "main">
	<p id = "my_comment">前回は「Authentication」認証について学びましたね。<br><br>今回はもうひとつの認証、「Certification」認証(三者間認証)について学びましょう♪<br><br>それでは、Let's laugh!!</p>
	<h2>PKI</h2>
	<p><a  href = "sc-1-1-12#href_pkey">公開鍵暗号技術</a>について覚えていますか???<br><br>特徴として、<span class = "underline">受信者の暗号用の鍵は公開鍵として公開して</span>、受信者の復号用の鍵は秘密鍵として秘密に保存することがあげられますね♪<br><br>ですけど、どうやって公開するのでしょうか?<br><br>本人かどうか確認するために必要なもの(公開鍵)の正当性を確認する必要があるんですね、、、<br><small>まるで、服を買いに行く服がない状態のよう、、、</small><br><br>ということで、公開鍵の公開は<span class = "underline">信頼できる第三者</span>の存在が必要不可欠ですね。<br><br>この公開鍵を公開する信頼できる第三者のことを<span class = "underline">認証局(CA)</span>といい、認証局は公開鍵の正当性を証明するために<span class = "underline">ディジタル証明書(公開鍵証明書)</span>を発行します。<br><br>この認証局を通して公開鍵を適切に公開する仕組みを<span>PKI</span>(Public Key Infrastructure)と言います。</p>
	<h2>ディジタル証明書</h2>
	<p>認証局(CA)が発行する公開鍵の正当性を証明する電子証明書のことを言います。<br><br>ITU-T勧告のX.509に定義された内容によると、ディジタル証明書は<span class = "underline">「識別情報・公開鍵・有効期限・シリアル番号・CA自身のディジタル署名」</span>を含みます。<br><br>また、ディジタル証明書は公開鍵の正当性を証明する内容も含まれることから、「公開鍵証明書」とも呼ばれます。<br><br>以下で、PKIに関連する用語を説明しますね♪</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>PKI関連用語</caption>
			<tbody>
				<tr>
					<th>RA</th>
					<td>「<span class = "underline">登録局</span>」(Registration Authority)と呼ばれ、ディジタル証明書発行に際する審査・利用者情報の登録・登録された公開鍵の管理を担当します。</td>
				</tr>
				<tr>
					<th>CP/CPS</th>
					<td>CPとは「Certificate Policy」、CPSとは「Certification Practice Statement」の略で、CAが発行するディジタル証明発行業務をどのようなルールで行うかを明示したものを言います。<br>他人の正当性を証明する立場にあるわけですから、絶対の信頼が必要なわけですので業務に関してオープンでなければいけませんね♪</td>
				</tr>
				<tr>
					<th>CSR</th>
					<td>「<span class = "underline">証明書署名要求</span>」(Certificate Signing Request)と呼ばれ、ディジタル証明書の申請者がディジタル証明書の発行をCAに申請する際に生成する要求のことを言います。<br><br>「公開鍵」「URL(FQDN)」「組織名」「部門名」「市区町村名」「都道府県名」「国別番号」が含まれます。</td>
				</tr>
				<tr>
					<th>CRL</th>
					<td>「<span class = "underline">証明書失効リスト</span>」(Certification Revocation List)と呼ばれ、ディジタル証明書が不測の自体(不正利用・誤発行)によって有効期限内に失効させられたディジタル証明書が登録されたリストを言います。</td>
				</tr>
				<tr>
					<th>VA</th>
					<td>「<span class = "underline">証明書有効性検証局</span>」(Validation Authority)と呼ばれ、CRLの確認を担当してディジタル証明書の失効情報を集中管理します。</td>
				</tr>
				<tr>
					<th>リポジトリ<br>(ディレクトリ)</th>
					<td>ディジタル証明書利用者の情報やディジタル証明書・CRLを保存して利用者に提供するサービスのことを指します。<br><br>具体的な実装技術として、LDAPがあります。</td>
				</tr>
				<tr>
					<th>OCSP</th>
					<td>「Online Certificate Status Protocol」の略で、ディジタル証明書の有効性をオンラインで確認することを実現するプロトコルのことを言います。</td>
				</tr>
				<tr>
					<th>コードサイニング証明書</th>
					<td>ソフトウェアに対して発行されるディジタル証明書のことで、ソフトウェアの配布元を検証します。</td>
				</tr>
			</tbody>
		</table>
	</div><br>
	<div class = "exam">
		&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問2 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		PKIを構成するOCSPに関して「<strong>ディジタル証明書の失効情報を問い合わせる</strong>」と説明しています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問3 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		VAに関して、「<strong>ディジタル証明書の失効状態についての問合せに応答する。</strong>」と説明しています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問6 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		X.509におけるCRLに関する記述として、「<strong>認証局は、有効期限内のディジタル証明書のシリアル番号をCRLに記載することがある。</strong>」としています。
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問1 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		CRLに掲載されるものとして、「<strong>有効期限内に失効したディジタル証明書のシリアル番号</strong>」を挙げています。<br>
		<div class = "bigger_wrapper"><span class = "bigger">&#x27b8;<!--&#8620;&#8688;&#x27a2;&#x27ff;--></span>「有効期限切れになったディジタル証明書の公開鍵・有効期限切れになったディジタル証明書のシリアル番号・有効期限内に失効したディジタル証明書のシリアル番号」は掲載されません。</div>
		<div class = "super_separator"></div>
		&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問2 &#9836;&#9836;&#9836;
		<div class = "separator"></div>
		PKIを構成するOCSPを利用する目的として、「<strong>ディジタル証明書の失効情報を問い合わせる。</strong>」を挙げています。<br>
	</div>
	<p>PKIの具体的な仕様について説明します。<br><br>ディジタル証明書を発行するCAはセキュリティの観点から階層構造を形成して、上位のCAが下位のCAの正当性を証明する仕組みになっています。一番上に位置するCAのことを特に「<strong>ルートCA</strong>」と呼び、ルートCAが発行するディジタル証明書を「<strong>ルート証明書</strong>」といいます。<br>ルート証明書にはルートCAが自身でディジタル署名を付すため「自己署名証明書」とも呼びます。<br>また、webサーバがCAから受けるディジタル証明書を「<strong>サーバ証明書(SSLサーバ証明書)</strong>」といいます。<br><small>このwebページもサーバ証明書の発行を受けています。</small><br><br>サーバ証明書にはホストを識別するためための固有の番号であるサブジェクト名が記載されます。<br><br>またクライアントに対して発行され、ユーザの正当性を証明する証明書を「<strong>クライアント証明書</strong>」と言います。<br><br>CAが階層構造上位から下位にディジタル署名をする仕組みであるため、下位で発行されるサーバ証明書を受け取ったクライアントは下位のディジタル証明書から遡ってルート証明書まで検証することで当該サーバ証明書の正当性を検証しますが、この一連のディジタル証明書の検証を「<strong>証明書パス検証</strong>」と言います。</p>
	<h2>ディジタル証明書のレベル</h2>
	<p>ディジタル証明書はどのレベルまで証明するかによって以下の3つに分類されます。</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>証明書のレベル</caption>
			<tbody>
				<tr>
					<th>DV</th>
					<td>「Domain Validation」の略で、ドメインだけを証明します。</td>
				</tr>
				<tr>
					<th>OV</th>
					<td>「Organization Validation」の略で、企業の実在性も確認します。</td>
				</tr>
				<tr>
					<th>EV</th>
					<td>「Extended Validation」の略で、 DV・OVよりも厳格にWebサーバ運営組織に対する確認をします。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>PMI</h2>
	<p>次に、<span class = "underline">PMI(権限管理基盤)</span>について説明します。<br>PKIが所有者の本人性を証明するのに対して、PMIでは<span class = "underline">所有者の「属性(役割・権限)」</span>を証明する基盤となります。<br><br>以下で、PMIに関連する用語を紹介しますね♪</p>
	<div class = "scroll_x">
		<table border = "1">
			<caption>PMI関連用語</caption>
			<tbody>
				<tr>
					<th>AC</th>
					<td>「属性証明書」と呼ばれ、ディジタル証明書と異なり所有者の属性(役割・権限)を登録します。<br>ACの発行者はAA(属性認証局)です。<br><br>属性はディジタル証明書に記載される事項と異なり頻繁に変更されるため、ディジタル証明書からは独立したACによって管理されます。</td>
				</tr>
				<tr>
					<th>ACRL</th>
					<td>CRLのACバージョンです。</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h2>GPKI</h2>
	<p>PKIの政府(Government)バージョンで、「政府認証基盤」といいます。<br>国民と政府との間のやり取りをネットワークを経由して行う際に、「データが本人によって作成されたものか」「データが途中で改竄されていないか」を確認するための基盤のこと言います。<br><small>※政府公式ページは<a href = "https://www.gpki.go.jp/documents/gpki.html">こちら</a>。</small><br><br>法務省が管理するブリッジ認証局が各認証局が発行する官職認証や職責証明書などの証明書やその失効情報などを一元的に提供して、申請者が受け取った証明書の有効性を検証することを可能にします。<br><small>※参考サイトは<a href = "https://www.jpki.go.jp/ca/ca_rules.html">こちら</a>。</small></p>

	<h2></h2>
</div>


<?php
include_footer();
?>