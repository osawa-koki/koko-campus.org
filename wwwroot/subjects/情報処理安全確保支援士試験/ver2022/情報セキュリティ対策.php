<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-18",
	"updated" => "2022-03-18"
);
head($obj);
?>
<p id="message">今回はとても少ないです。<br /><br />セキュリティ対策について学びます。<br /><br />それでは、Let's explorer!!</p>
<h2>情報セキュリティ対策</h2>
情報セキュリティ対策は大きく以下の3つに分けられます。
<ul>
	<li>人的セキュリティ</li>
	<li>技術的セキュリティ</li>
	<li>物理的セキュリティ</li>
</ul>
次に、それぞれの具体的な対策方法を紹介します。
<p>シラバスから紹介</p>
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>人的セキュリティ</th>
				<td>
					<ul>
						<li>内部不正防止ガイドライン</li>
						<li>情報セキュリティ啓発</li>
						<li>情報セキュリティ訓練</li>
						<li>パスワード管理</li>
						<li>利用者アクセスの管理</li>
						<li>ログ管理</li>
						<li>監視</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th>技術的セキュリティ</th>
				<td>
					<ul>
						<li>クラッキング対策</li>
						<li>不正アクセス対策</li>
						<li>情報漏えい対策</li>
						<li>マルウェア・不正プログラム対策</li>
						<li class="information-security_list">入口・出口対策</li>
						<li class="information-security_list">多層防御</li>
						<li>暗号処理</li>
						<li class="information-security_list">秘密分散</li>
						<li class="information-security_list">秘匿化</li>
						<li>アクセス制御</li>
						<li>脆弱性管理</li>
						<li>ネットワーク監視</li>
						<li>ネットワークアクセス権の設定</li>
						<li>侵入検知</li>
						<li>侵入防止</li>
						<li class="information-security_list">検疫ネットワーク</li>
						<li class="information-security_list">メール無害化</li>
						<li>メール誤送信対策</li>
						<li class="information-security_list">URLフィルタリング</li>
						<li class="information-security_list">コンテンツフィルタリング</li>
						<li class="information-security_list">TPM</li>
						<li class="information-security_list">SED</li>
						<li class="information-security_list">TNC</li>
						<li class="information-security_list">WORM</li>
						<li class="information-security_list">セキュアブート</li>
						<li class="information-security_list">電子透かし</li>
						<li class="information-security_list">ディジタルフォレンジックス</li>
						<li class="information-security_list">DLP</li>
						<li class="information-security_list">SIEM</li>
						<li class="information-security_list">EDR</li>
						<li>WAF</li>
						<li class="information-security_list">RASP</li>
						<li>IDP</li>
						<li>IPS</li>
						<li class="information-security_list">UTM</li>
						<li class="information-security_list">MDM</li>
						<li class="information-security_list">CASB</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th>物理的セキュリティ</th>
				<td>
					<ul>
						<li class="information-security_list">RASIS</li>
						<li class="information-security_list">RAS技術</li>
						<li>耐震耐火設備</li>
						<li class="information-security_list">UPS</li>
						<li class="information-security_list">多重化技術</li>
						<li class="information-security_list">ストレージのミラーリング</li>
						<li>監視カメラ</li>
						<li class="information-security_list">セキュリティゲート</li>
						<li class="information-security_list">アンチパスバック</li>
						<li>インタロック</li>
						<li class="information-security_list">クリアデスク・クリアスクリーン</li>
						<li class="information-security_list">USBキー</li>
						<li class="information-security_list">セキュリティケーブル</li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div id="information-security_show">
	<div>
		一般にセキュリティ対策というと、マルウェアの侵入を防ぐ対策を思い浮かべると思いますが、この初期感染を防ぐ対策を「<span class="underline">入口対策</span>」と言います。<br /><br />反対に、侵入に成功したマルウェアを自由に活動させないための対策を「<span class="underline">出口対策</span>」と言います。<br /><br />マルウェア対策では「入口対策」「出口対策」の両方が求められます。
	</div>
	<div>
		<span class="underline">複数のセキュリティを採用することで</span>サイバー攻撃から情報を守ることです。
	</div>
	<div>
		データを分散して安全に保存することで情報流出のリスクを分散させる方法です。<br /><br />具体的には以下の手順を踏むます。
		<ol>
			<li>元の情報を複数個に分ける。</li>
			<li>分散した情報を、用途に合わせそれぞれ送信や保管などする。</li>
			<li>分散した情報の全てあるいは特定の数がそろえて、元の情報を復元する。</li>
		</ol>
		<p>参考サイトは<a href="https://cybersecurity-jp.com/column/53826">こちら</a>。</p>
	</div>
	<div>
		個人情報を単純にマスキングするのではなく、個人情報属性を維持したまま意味のあるデータに書き換えることを言います。
	</div>
	<div>
		最初に検疫とは、、、「伝染病がひろがるのを防ぐため、ある地域に出入りする人や物を検査し、必要な処置をとること。」を言います。
		<p><a href="https://languages.oup.com/google-dictionary-ja/">Oxford Languages</a>より。</p>
		検疫ネットワークとは、このネットワークバージョンで、安全かどうか分からないIT機器を安全と判明するまで、社内ネットワークから隔離する方法です。
	</div>
	<div>
		受信したメールに添付されたマルウェアなどに対して、被害を最小限に抑えるために安全な状態に処理を行うことを言います。<br /><br />具体的には以下の方法があります。
		<ul>
			<li>添付ファイルの削除</li>
			<li>添付ファイルの無害化(CDR)</li>
			<li>HTMLメールをテキストメールに変換</li>
			<li>メール本文のURL削除</li>
			<li>メール本文のURLリンクの無効化</li>
		</ul>
		CDRとは「Content Disarm and Reconstruction」の略で、「内容の無害化・再構築」と訳されます。<br />ファイルの中身を分解した後に、スクリプト・リンクなどを取り除いた後にもとの形式に戻してファイルを無害化する方法です。
		<p>参考サイトは<a href="https://www.soliton.co.jp/column/filezens/network-isolation/email-sanitization.html">こちら</a>。</p>
	</div>
	<div>
		アクセスを禁止したいWebサイトにアクセスさせないための技術です。<br /><br />実装手段として以下の3つがあげられます。
		<ul>
			<li>ホワイトリスト型</li>
			<li>ブラックリスト型</li>
			<li>カテゴリー型</li>
		</ul>
	</div>
	<div>
		1つ前で紹介したurlフィルタリングの「urlで判断する」のではなくて「中身で判断する」バージョンです。
	</div>
	<div>
		「Trusted Platform Module」の略で、対タンパ性に優れたPCに直付けされされているセキュリティチップです。<br /><br />暗号化技術で用いられる鍵の安全な生成・保存を担当します。<br /><br />TCG(Trusted Computing Group)によって策定されています。
	</div>
	<div>
		「Self Encrypting Drives」の略で、自身を暗号化する機能を持つハードディスクドライブ(HDD)のことを言います。
		<p>参考サイトは<a href="https://it-trend.jp/encryption/article/64-0090">こちら</a>。</p>
	</div>
	<div>
		「Trusted Network Communications」の略で、ネットワークの冗長化を図り、システム全体のセキュリティを高める技術です。
	</div>
	<div>
		「Write Once Read Many」の略で、直訳すると「一度だけ書いて、何度も読み取る」です。<br /><br />一度書き込んだデータを消去・変更できない追記型の記憶方式です。<br /><br />データの削除・変更ができないので、セキュリティ対策として有効です。
	</div>
	<div>
		安全に(セキュア)、コンピュータを起動(ブート)するための技術です。<br /><br />具体的には、コンピュータの<span class="underline">起動時の</span>安全性を確保するため、ディジタル署名で起動するソフトウェアを検証する機能を言います。<br /><br />BIOS(UEFI)レベルで動作するため、OSレベルの攻撃でもセキュリティを維持できます。
		<div class="explanation">
			<div class="title">BIOS</div>
			コンピュータの電源ONを検知してからOSを読み込ませるためのファームウェア(ハードウェアとソフトウェアの中間)を言います。<br /><br />BIOSの進化バージョンがUEFIです。
		</div>
	</div>
	<div>
		画像や動画、音声などのデータに、特定の情報を埋め込むことによって、オリジナルかコピーされたものかを判別できるようにする技術です。<br />ステガノグラフィーという技術から生まれました。<br /><small>引用元は<a href="https://www.otsuka-shokai.co.jp/words/digital-watermark.html">こちら</a>。</small><br /><br />主に著作権を主張するために用いられます。
		<div class="explanation">
			<div class="title">ステガノグラフィー</div>
			あるデータ(画像・動画・音声・etc...)に秘密のデータを保持する技術です。<br /><br />絵画の額縁の裏にお金を隠す「へそくり」の情報バージョンですね♪
		</div>
	</div>
	<div>
		フォレンジックスとは、「鑑識」の意味です。<br /><br />ディジタルフォレンジックスはITバージョンの「鑑識」です。<br />コンピュータ法科学と呼ばれることもあります。<br />コンピュータに残る電磁的記録を収集・分析して、その法的な証拠を明らかにする手技術を言います。
	</div>
	<div>
		「Data Loss(Leak) Prevention」の略で、直訳すると「データ損失予防」となります。<br /><br />機密情報の外部への持ち出しを検知・防御する技術で、具体的には以下の3つの種類があります。
		<ul>
			<li>DLPエージェント</li>
			<li>DLPサーバ</li>
			<li>DLPアプライアンス</li>
		</ul>
	</div>
	<div>
		「Security Information and Event Management」の略で、直訳すると「セキュリティ情報・事象管理」となります。<br />「シーム」と発音されます。<br /><br />FW・IDP・IPSなどのセキュリティソフトウェアから集められるセキュリティに関連する情報を一元管理する技術を言います。
	</div>
	<div>
		「Endpoint Detection & Response」の略で、PCやサーバなどのエンドポイント環境で発生している事象を監視・分析することでマルウェアの侵入・活動を検知する技術です。
		<div class="explanation">
			<div class="title">エンドポイント</div>
			ネットワークに接続している端末のことを言います。<br />主に「PC」と「サーバ」を指します。
		</div>
	</div>
	<div>
		「Runtime Application Self Protection」の略で、直訳すると「実行時アプリケーションセルフ保護」となります。<br />分かりにくい訳ですね、、、ここではRuntimeが「<span class="underline">実行時</span>」と訳されたことと<span class="underline">application</span>という単語が入っていることに着目してください。<br /><br />近年はクラウド技術や「FaaS・PaaS・CaaS」の利用が進んで、アプリケーション層(OSに依存しない)でのセキュリティ対策が必要とされる機会が増えています。<br /><br />これを実現する技術がRASPです。<br /><br />また、実行時(Runtime)に必要なライブラリを読み込むだけで利用可能なので、導入に際して大規模な改修を必要としません。
	</div>
	<div>
		「Unified Threat Management」の略で、「統合脅威管理」と訳されます。<br /><br />セキュリティ関連の情報(脅威 / Thread)を統合して(Unified)管理する技術です。
	</div>
	<div>
		「Mobile Device Management」の略で、「携帯端末管理」と訳されます。<br /><br />最近は従業員がひとり一台モバイル端末仕事でも用いることが増えましたよね。<br /><br />当然に問題となってくるのがこれらの管理ですが、これを一括で管理するための技術を言います。<br /><br />具体的には、以下の機能を備えます。
		<ul>
			<li>リモートロック<br /><small>(遠隔から対象端末をロックする機能)</small></li>
			<li>リモートワイプ<br /><small>(遠隔から対象端末のデータを消去する機能)</small></li>
			<li>ローカルワイプ<br /><small>(モバイル端末上でパスワード入力を一定回数間違えると、データを消去する機能)</small></li>
			<li>画面ロック<br /><small>(パスワード入力をしないと画面のロックを解除しない機能)</small></li>
		</ul>
	</div>
	<div>
		「Cloud Access Security Broker」の略で、「キャスビー」と発音されます。<br /><br />「ユーザーと複数のクラウドプロバイダーの間に単一のコントロールポイントを設け、ここでクラウド利用の可視化や制御を行うことで、全体として一貫性のあるポリシーを適用できるようにする」技術です。<br /><small>※引用元は<a href="https://www.cybernet.co.jp/netskope/casb/">こちら</a>。</small><br /><br />
		「SaaS」の利用が進むとことで、<a href="情報セキュリティ?to=href_shadow">シャドーIT</a>(企業が管理できていないIT機器)も当然に増えていきます。<br /><br />これを適切に管理することをサポートする技術がCASBです。
		<p>僕もこのページを作成するまで知らない単語でした。かなりトレンドになっているらしいです。僕ももっと勉強してみますね♪</p>
		以下の4つの機能を持ちます。
		<ul>
			<li>可視化・分析</li>
			<li>コントロール</li>
			<li>データ保護</li>
			<li>脅威防御</li>
		</ul>
		<div class="exam">
			&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問11 &#9836;&#9836;&#9836;
			<div class="separator"></div>
			CASBの効果として、「<strong>クラウドサービス利用組織の管理者が、組織の利用者が利用している全てのクラウドサービスの利用状況の可視化を行うことによって、許可を得ずにクラウドサービスを利用している者を特定できる</strong>」と説明しています。
		</div>
	</div>
	<div>
		コンピュータシステムに関する評価指標で、以下の5つからなります。
		<ul>
			<li><strong>R</strong>eliability(信頼性)</li>
			<li><strong>A</strong>vailability(可用性)</li>
			<li><strong>S</strong>erviceability(保守性)</li>
			<li><strong>I</strong>ntegrity(保全性)</li>
			<li><strong>S</strong>ecurity(安全性)</li>
		</ul>
	</div>
	<div>
		RASIS(前述)のうちの特に大事な最初の3つです。
		<ul>
			<li><strong>R</strong>eliability(信頼性)</li>
			<li><strong>A</strong>vailability(可用性)</li>
			<li><strong>S</strong>erviceability(保守性)</li>		
		</ul>
	</div>
	<div>
		「Uninterruptible Power Supply」の略で、「無停電電源供給」と訳されます。<br /><br />電源供給の障害(停電・電圧変化・周波数変動)からハードウェアを守るための装置です。
	</div>
	<div>
		複数の信号を同時に送ることで通信の可用性・経済性を高める技術です。
	</div>
	<div>
		「mirror(鏡)」のように同じものを映す(保存する)ことで、あるストレージが破損してもミラーリングされたストレージから復元できるようにする技術です。<br /><br />RAID1.0で、実現されます。<br /><br />シラバスには記載されていませんが、RAIDはとても大事な技術ですのでここで説明しますね♪<br /><br />RAIDとは「Redundant Arrays of Inexpensive Disks」の略で、「複数台のハードディスクを組み合わせることで仮想的な1台のハードディスクとしすることで可用性を高める技術です。<br />RAIDには「0」から「6」までのレベルがあります。
		<ol start="0">
			<li>ストライピング</li>
			<li>ミラーリング</li>
			<li>ストラインピング+ハミング符号</li>
			<li>ストラインピング(ビット単位)+パリティ</li>
			<li>ストラインピング(ブロック単位)+パリティ</li>
			<li>ストラインピング+パリティ分散</li>
			<li>ストラインピング+パリティ分散(2種類)</li>
		</ol>
	</div>
	<div>
		入退室を管理するゲートです。<br />IDカードをタップするとゲートが開いて入館できるようになることで許可されていない人が建物に侵入することを防ぎます。<br />一回ゲートが開いた際に複数人が入ってしまう共連れ(ピギーバック)を行為を防ぐ目的で導入されます。
	</div>
	<div>
		入退室に際して、入室の記録がなければ退室不可、また退室の記録がなければ入室不可にすることで、不正な侵入を防ぐことを目的としますが、前述した共連れ(ピギーバック)行為を防ぐことはできません。
	</div>
	<div>
		他人のデスク上の書類やパソコンのモニタを覗き見できないようにする対策を言います。
	</div>
	<div>
		USBキーの抜き差しでパソコンをロックすることで、ID&パスワードよりも安全な認証を実現します。
	</div>
	<div>
		PCなどの情報処理をする機器が持ち出されないようにロックするワイヤーのことです。
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		let now = 0,
			last = -1;
		const s = document.getElementById("information-security_show"),
			h = Array.from(s.children),
			l = Array.from(document.getElementsByClassName("information-security_list"));
		if (h.length === l.length) {
			let i;
			for (i = 0; i < h.length; i++) {
				h[i].classList.add("hidden");
				const e = document.createElement("div");
				e.classList.add("title");
				e.textContent = l[i].textContent;
				h[i].insertBefore(e, h[i].firstChild);
				l[i].addEventListener("click", function() {
					try {
						h[last].classList.add("hidden");
					} catch {}
					const n = l.indexOf(this);
					l[n].classList.add("visited");
					h[n].classList.add("explanation");
					h[n].classList.remove("hidden");
					last = n;
					scroll_to(s);
				});
			}
		}
	})();
</script>
<h2>物理的攻撃手法</h2>
上で物理的セキュリティに関して説明しましたが、代表的な物理的攻撃手法を2つ紹介しますね♪
<div class="explanation">
	<div class="title">ソーシャルエンジニアリング</div>
	物理環境で行われる不正な情報収集の総称です。<br /><br />以下の方法があげられます。
	<ul>
		<li>ゴミをあさる</li>
		<li>偽の電話</li>
		<li>従業員のスマホの盗み見</li>
		<li>建物に侵入</li>
		<li>従業員と仲良くなって情報を聞き出す</li>
	</ul>
</div>
<div class="explanation">
	<div class="title">TEMPEST攻撃</div>
	「transient electromagnetic pulse surveillance technology attack」の略で、IT機器から放射される微量な電磁波を傍受・解析して情報を盗みます。<br /><br />対策として、VCCI規格を満たしているIT機器を用いることがあげられます。
</div>
<?php footer(); ?>