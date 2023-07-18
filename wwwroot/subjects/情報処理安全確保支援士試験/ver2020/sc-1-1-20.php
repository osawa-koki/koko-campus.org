<?php
require_once("common.php");
include_head("セキュリティ技術評価");
?>

<div id = "main">
	<p id = "my_comment">良いセキュリティ製品・悪いセキュリティ製品って何でしょうか???<br>ここでは、セキュリティ水準を測るための技術について学びましょう♪<br><br>それでは、Let's dance!!</p>
	<h2>ISO/IEC 15408</h2>
	<p>CC(Common Criteria)とも呼ばれます。<br><br>IT関連製品や情報システムのセキュリティを評価するための国際規格で、「JIS X 5070」によってJIS化されています。<br><br>ISO/IEC 15408は以下の3つの章から構成されています。
		<ol class = "lili">
			<li>概説と一般モデル</li>
			<li>セキュリティ機能要件</li>
			<li>セキュリティ保証要件</li>
		</ol>
		詳しく説明しますね♪
	</p>
	<div class = "scroll_x">
		<table border = "1">
			<tbody>
				<tr>
					<th>概説と一般モデル</th>
					<td>TOE(評価対象であるIT製品・サービス)に関するセキュリティ仕様書である<span class = "underline">セキュリティ基本設計書(ST / Security Target)</span>を最重要項目として定義しています。<br><br>STはPP(各分野ごとに作成される共通仕様書)へ準拠することを記述することで省略可能です。</td>
				</tr>
				<tr>
					<th>セキュリティ<br class = "w" />機能要件</th>
					<td>製品・システムに対して、セキュリティ対策として実装すべき機能に関する要件を規定しています。<br><br>内容は以下の通りです。
						<ul>
							<li>セキュリティ監査</li>
							<li>通信</li>
							<li>暗号サポート</li>
							<li>利用者データ保護</li>
							<li>識別と認証</li>
							<li>セキュリティ管理</li>
							<li>プライバシー</li>
							<li>TSFの保護</li>
							<li>資源利用</li>
							<li>TOEアクセス</li>
							<li>高信頼パス/チャネル</li>
						</ul>
					</td>
				</tr>
				<tr>
					<th>セキュリティ<br class = "w" />保証要件</th>
					<td>セキュリティ機能要件が正しく実装されていることを保証するための8項目からなる要件を規定しています。<br><br>内容は以下の通りです。
						<ul>
							<li>プロテクションプロファイル評価</li>
							<li>セキュリティターゲット評価</li>
							<li>開発</li>
							<li>ガイダンス文書</li>
							<li>ライフサイクルレポート</li>
							<li>テスト</li>
							<li>脆弱性評価</li>
							<li>統合</li>
						</ul>
						また、セキュリティ保証要件ではEAL(Evalution Assurance Level)と呼ばれる評価保証レベルを7段階で規定しています。
						<ol>
							<li>機能テスト</li>
							<li>構造化テスト</li>
							<li>方式的テスト・チェック</li>
							<li>方式的設計・レビュー</li>
							<li>準形式的設計・テスト</li>
							<li>準形式的検証済み設計・テスト</li>
							<li>形式的検証済み設計・テスト</li>
						</ol>
					</td>
				</tr>
			</tbody>
		</table>
	</div><br>
	<span class = "underline">CCRA</span>(Common Criteria Recognition Arrangement / 共通基準承認アレンジメント)と呼ばれる「ISO/IEC 15408」に関する協定では、国を超えた認証を可能にしています。<br><br>また、CCに基づいた評価が、異なる制度や評価機関でなされても、その評価結果が均質である必要があります。そのため、評価に使用される手法を明確にした<span class = "underline">CEM</span>(Common Evaluation Methodology / 共通評価方法)がCCとともに開発されました。(ISO/IEC 15405)<br><small>※引用元は<a href = "https://www.ipa.go.jp/security/jisec/about_cc.html">こちら</a>。</small><br><br><br>同時に<span class = "underline">JISEC</span>についてもここで説明しますね♪<br>「ITセキュリティ評価及び認証制度(Japan Information Technology Security Evaluation and Certification Scheme / JISEC)」とは、IT関連製品のセキュリティ機能の適切性･確実性を、セキュリティ評価基準の国際標準であるISO/IEC 15408に基づいて第三者が評価し、その評価結果を認証機関が認証する、わが国の制度です。<br><small>※引用元は<a href = "https://www.ipa.go.jp/security/jisec/scheme/index.html">こちら</a>。</small><br>日本政府がIT製品・サービスを購入する際の指針となるもので、前回説明した「NISTのSP800」の日本・世界版とも言えます。
	<h2>CSMS</h2>
	<p>「Control Systems Security Management Systems」の略で、「IACS(産業用オートメーション及び制御システム)を対象としたサイバーセキュリティのマネジメントシステム」と訳されます。<br><br>前回の授業で説明したISMSを覚えていますか???<br>CSMSはISMSの「社会全体に影響を及ぼす業界」バージョンです。<br>(鉄道・エネルギー・食品etc...)<br><br>また、ISMS適合性評価制度同様に、CSMS適合性評価制度があります。<br><small>※参考サイトは<a href = "https://isms.jp/csms/index.html">こちら</a>。</small></p>
	<h2>EDSA認証</h2>
	<p>「Embedded Device Security Assurance」の略で、組込み機器である制御機器を評価対象とした認証制度です。<br><br>米国のISA(International Society of Automation)のセキュリティ適合性認定協会(ISCI)が運営しています。</p>
	<h2>セキュリティ情報共有技術</h2>
	<p>ここではサイバー攻撃活動に関する情報を記述・交換するための技術仕様である<span class = "underline">「STIX」「TAXII」</span>を紹介しますね♪</p>
	<div class = "explanation">
		<span class = "underline">STIX</span>とは、、、<br><br>「Structured Threat Information eXpression」の略で、「脅威情報構造化記述形式」と訳されます。<br><br>非営利団体「<a href = "https://attack.mitre.org/">MITRE</a>」が中心となって仕様を策定しています。<br><br>内容としては、サイバー空間における脅威やサイバー攻撃の分析、サイバー攻撃を特徴付ける事象の特定、サイバー攻撃活動の管理、サイバー攻撃に関する情報を共有することを目的としています。<br><br>以下の8つの情報群から構成されています。
		<ul class = "lili">
			<li>サイバー攻撃活動</li>
			<li>攻撃者</li>
			<li>攻撃手口</li>
			<li>検知指標</li>
			<li>観測事象</li>
			<li>インシデント</li>
			<li>対処措置</li>
			<li>攻撃対象</li>
		</ul>
		<span class = "quote">※参考サイトは<a href = "https://www.ipa.go.jp/security/vuln/STIX.html">こちら</a>。</span>
	</div>
	<div class = "explanation">
		<span class = "underline">TAXII</span>とは、、、<br><br>「Trusted Automated eXchange of Indicator Information」の略で、「検知指標情報自動交換手順」と訳されます。<br><br>内容は、「STIXなどで記述されたサイバー攻撃活動に関連する脅威情報を交換するための仕様」です。<br><small>※参考サイトは<a href = "https://www.ipa.go.jp/security/vuln/TAXII.html">こちら</a>。</small>
	</div>

	<h2></h2>
</div>


<?php
include_footer();
?>