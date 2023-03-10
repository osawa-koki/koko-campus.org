<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-04-07",
	"updated" => "2022-04-07"
);
head($obj);
?>
<h2>セキュリティ</h2>
セキュリティは直訳すれば「安全」となりますが、システムに対してセキュリティという単語を用いる際には、具体的には<strong>「情報の<span class="underline">機密性、完全性、可用性</span>を確保すること」</strong>と定義されます。<br />それぞれの頭文字を取って<strong>CIA</strong>とよく表されます。
<table>
	<caption>情報セキュリティの特性</caption>
	<tbody>
		<tr>
			<th>C</th>
			<td>機密性(Confidentiality)</td>
		</tr>
		<tr>
			<th>I</th>
			<td>完全性(Integrity)</td>
		</tr>
		<tr>
			<th>A</th>
			<td>可用性(Availability)</td>
		</tr>
	</tbody>
</table>
<img src="../pics/cia.png" alt="情報セキュリティ" />
<table>
	<tbody>
		<tr>
			<th>機密性</th>
			<td>秘密にするべき情報を秘密に保持すること。</td>
		</tr>
		<tr>
			<th>完全性</th>
			<td>保有する情報が不正に書き換えられたり(改竄されたり)しないこと。</td>
		</tr>
		<tr>
			<th>可用性</th>
			<td>そのシステムが利用したいときに利用できる状態にあること。</td>
		</tr>
	</tbody>
</table>
<div class="separator"></div>
また、前述したセキュリティの特性(CIA)を達成するにあたり、大切となる付加的な特性について学びましょう♪<br />情報セキュリティの付加的な特性とは、<sapn class="underline">「真正性」「責任追跡性」「否認防止」「信頼性」</sapn>の4つです。
<table>
	<caption>情報セキュリティの付加的特性</caption>
	<tbody>
		<tr>
			<th>真正性</th>
			<td>利用者、プロセス、システム、情報などが、主張どおりであることを確実する特性のことです。<br />真正性を妨げる要因として<strong>なりすまし</strong>があげられます。</td>
		</tr>
		<tr>
			<th>責任追跡性</th>
			<td>情報を操作(閲覧・削除・変更)した人を追跡できる特性のことです。<br />責任追跡性を達成するためには<strong>ログ</strong>を保持しておくことが大切です。</td>
		</tr>
		<tr>
			<th>否認防止</th>
			<td>ある人物がある行為を行なったことを、後になって否定できないようにすることです。</td>
		</tr>
		<tr>
			<th>信頼性</th>
			<td>システムが期待通りの動作をすることです。<br />簡単に言えば「バグ」がないことを指します。</td>
		</tr>
	</tbody>
</table>
<h2>脅威と脆弱性</h2>
セキュリティに関連する用語として「脅威」と「脆弱性」について覚えましょう♪
<table>
	<thead>
		<tr>
			<th width="50%">脅威</th>
			<th width="50%">脆弱性</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				セキュリティを損なう事由を言います。<br />脅威は以下の3つに分類できます。
				<ul>
					<li>人的脅威</li>
					<li>技術的脅威</li>
					<li>物理的脅威</li>
				</ul>
			</td>
			<td>システムのセキュリティ上の弱点を言います。</td>
		</tr>
	</tbody>
</table>
<h2>リスク</h2>
脅威と脆弱性が重なると、「リスク」が発生します。
<img src="../pics/リスク.png" alt="リスク" />
「risk」を直訳すると「危険」の意味になりますが、ここでは「危険を含む不確実性」という風に捉えてください。<br />場面によって異なることがありますが、一般的には不確実性・曖昧さを意味することが多いです。<br />数学的・統計学的に説明するならば「標準偏差・分散」となります。
<h3>リスクマネジメント</h3>
リスクをそのように管理するかについて学びます。<br />リスクマネジメントは以下の4つの流れからなります。
<ol>
	<li>リスク特定</li>
	<li>リスク分析</li>
	<li>リスク評価</li>
	<li>リスク対応</li>
</ol>
また、リスクの対応方法には以下の種類があります。
<div class="scroll-600w">
	<table>
		<caption>リスク対応</caption>
		<tbody>
			<tr>
				<th rowspan=5>リスク<br />コントロール</th>
				<th colspan=2>リスク回避</th>
				<td>リスク発生の原因を排除します。</td>
			</tr>
			<tr>
				<th rowspan=4>リスク低減</th>
				<th>損失予防</th>
				<td>損失の発生頻度を減らします。
			</tr>
			<tr>
				<th>損失軽減</th>
				<td>損失の大きさを小さくします。</td>
			</tr>
			<tr>
				<th>分離・分割</th>
				<td>損失を受ける資産を小さな単位まで分離・分割します。</td>
			</tr>
			<tr>
				<th>集中・集約</th>
				<td>損失を受ける資産を結合して集中化します。</td>
			</tr>
			<tr>
				<th rowspan=2>リスク<br />ファイナンシング</th>
				<th colspan=2>保有</th>
				<td>リスクが顕在化したときの対応費用を企業が自己負担します。<br />残留(残余)リスクの受け入れとして利用されます。</td>
			</tr>
			<tr>
				<th colspan=2>移転</th>
				<td>保険等を利用して、損失負担のリスクを外部へ移転します。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>ISMS</h2>
ISMSとは「Infromation Security Management System」の略で、「情報セキュリティマネジメントシステム」と訳されます。<br /><br />具体的な内容としては情報セキュリティの特性である<span class="underline">「機密性」「完全性」「可用性」「真正性」「責任追跡性」「否認防止」「信頼性」</span>を<span class="underline">継続的に確保</span>するために、企業が構築すべき企業体制・実施するべき運用に関するシステムのことを言います。<br /><br />大切なのは<span class="underline">継続的</span>という部分です。<br /><br />これは一度強固なセキュリティを確保したら終了ではなく、繰り返し改善していくことが求められます。<br />これを実行するためにPDCAサイクルが推奨されます。
<h3>PDCAサイクル</h3>
聞いたことがある人も多いと思います。
<ol>
	<li>P: Plan(計画)</li>
	<li>D: Do(実行)</li>
	<li>C: Check(評価)</li>
	<li>A: Action(改善)</li>
</ol>
これを繰り返すことでISMSをよりよいものにしていきます。
<h2>脅威の種類</h2>
先ほどは脅威と脆弱性が重なる部分がリスクとなることを説明しましたね♪<br />ここでは具体的に何が脅威となるのかについて説明します。
<h3>人的脅威</h3>
以下のものが該当します。
<ul>
	<li>漏えい</li>
	<li>紛失</li>
	<li>破損</li>
	<li>盗み見</li>
	<li>盗聴</li>
	<li>なりすまし</li>
	<li>クラッキング</li>
	<li>ソーシャルエンジニアリング</li>
	<li>内部不正</li>
	<li>誤操作</li>
	<li>ビジネスメール詐欺(BEC)</li>
	<li>ダークウェブ</li>
</ul>
ソーシャルエンジニアリングとは会社のごみを漁ったり、電車の隣の席から覗き見したりするなど、社会的な(ソーシャル)方法で情報を盗むことを言います。<br /><br />ビジネスメール詐欺とはオレオレメールの会社バージョンです。<br />取引先を装ってお金を振り込ませたりします。<br /><br />ダークウェブとはsafariやchrome・edgeなどの一般のブラウザではアクセスできないサーバからなるサイバー空間を言います。
<h3>物理的脅威</h3>
物理的に脅威に関してはシラバスでは以下の3つが説明されています。
<ul>
	<li>災害</li>
	<li>破壊</li>
	<li>妨害行為</li>
</ul>
<h3>技術的脅威</h3>
技術的脅威には以下のものがあります。
<ul>
	<li>マルウェア</li>
	<li>ワーム</li>
	<li>トロイの木馬</li>
	<li>RAT</li>
	<li>マクロウイルス</li>
	<li>ガンブラー</li>
	<li>バックドア</li>
	<li>ファイル交換ソフトウェア</li>
	<li>SPAM</li>
</ul>
<h3>マルウェア</h3>
「Malicious Software」の略で、「悪意のあるソフトウェア」という意味です。<br />かなりざっくりとしていますが、悪いことするソフトウェア全般を指す用語です。<br /><br />マルウェアは以下の3つに分類されます。
<div class="scroll-600w">
	<table>
		<caption>マルウェアの分類</caption>
		<thead>
			<tr>
				<th></th>
				<th>ウイルス</th>
				<th>ワーム</th>
				<th>トロイの木馬</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>自己増殖<br />の有無</th>
				<td>自己増殖する</td>
				<td>自己増殖する</td>
				<td>自己増殖しない</td>
			</tr>
			<tr>
				<th>活動方法</th>
				<td>宿主に寄生して活動</td>
				<td>単独で活動</td>
				<td>偽装して活動</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>ワーム</h3>
上で説明した通り、自己増殖して単独で活動するマルウェアです。
<h3>トロイの木馬</h3>
上で説明した通り、自己増殖せず偽造して活動するタイプのマルウェアです。
<h3>コンピュータウイルス</h3>
上で説明した通り、自己増殖して宿主に寄生して活動するタイプのマルウェアです。<br />一般的には「ウイルス」と略して呼びます。<br /><br />以下の3つの機能を持ちます。
<table>
	<tbody>
		<tr>
			<th>自己伝染機能</th>
			<td>自分自身をコピーして、他のプログラムへと伝染していきます。</td>
		</tr>
		<tr>
			<th>潜伏機能</th>
			<td>ある条件を満たすまでは悪意のある動作をせず、身を隠します。<br />したがって、ウイルスに感染したことが判別しにくいという問題があります。</td>
		</tr>
		<tr>
			<th>発病機能</th>
			<td>ユーザが意図しない不正な処理を実行します。</td>
		</tr>
	</tbody>
</table>
<h3>RAT</h3>
「Remote Administration Tool」の略で、管理者権限を持ち、ネットワークを用いてコンピュータを不正に遠隔操作するためのプログラムです。<br />管理者権限とは、そのコンピュータ上で最高の権限で、何でもすることができる権限です。
<h3>マクロウイルス</h3>
ワードやエクセルなどのオフィスソフトなどに存在するマクロ(自動処理プログラム)として記述されたコードで、そのファイルに寄生して活動します。
<h3>ガンブラー</h3>
Webサイトを改竄して不正なスクリプトを埋め込むことで、Webサイトの訪問者をマルウェア感染させる攻撃を言います。
<h3>バックドア</h3>
侵入成功後に、さらなる不正侵入がしやすくなるように隠されて設置されたアクセス手段を言います。
<h3>ファイル交換ソフトウェア</h3>
インターネット上で、不特定多数のコンピュータ間でファイル(データ)をやり取りできるソフトウェアで、P2P(Peer to Peer)ソフトとも呼ばれています。
<p>引用元は<a href="https://www.ipa.go.jp/security/personal/protect/leakage/">こちら</a>。</p>
ファイルを交換することを目的としているため、必然的にマルウェアが侵入するリスクや情報が漏洩するリスクが高くなります。
<h3>SPAM</h3>
受信者の意思とは関係なく送り付けられる電子メールを言います。<br />迷惑メールのようなものです。
<h2>脆弱性の種類</h2>
今度はどのようなものが脆弱性となるかについて説明します。
<h3>外部からの脅威に関する脆弱性</h3>
外部からの脅威に関しては以下のものが脆弱性となります。
<ul>
	<li>バグ</li>
	<li>セキュリティホール</li>
	<li>人的脆弱性</li>
	<li>シャドーIT</li>
</ul>
バグとはプログラミングをする際に生じた欠陥のことを言い、セキュリティホールとはバグ等から生じたセキュリティ上の抜け穴のことを言います。<br /><br />シャドーITとは企業が把握していないIT機器のことを言い、従業員が企業に報告しないで業務用に使用しているスマホ等が該当します。
<h3>内部からの脅威に関する脆弱性</h3>
<strong>不正</strong>が該当します。<br />これはもはや、脅威であるとも捉えられますが、シラバスでは脆弱性として扱われていたのでここでも脆弱性として説明します。<br /><br />不正とは経営者や従業員などの企業内部の人による悪意のある行為を指します。<br />いわゆるスパイみたいなものです。<br /><br />アメリカの犯罪学者であるドナルド・D・クレッシーの報告によると、不正は以下の3つの要因が揃ったときに行われます。
<img src="../pics/不正のトライアングル.png" alt="不正のトライアングル" />
<table>
	<tbody>
		<tr>
			<th>動機</th>
			<td>不正行為を働くことに至った事情やプレッシャーのことです。<br />過度なノルマなどが該当します。</td>
		</tr>
		<tr>
			<th>機会</th>
			<td>不正を働くことを許した環境のことです。<br />杜撰な管理などが該当します。</td>
		</tr>
		<tr>
			<th>正当化</th>
			<td>働いた不正行為を自ら納得させる理由付けのことです。<br />みんなやってるからなどです。</td>
		</tr>
	</tbody>
</table>
<h2>攻撃手法</h2>
ハッカー育成試験ではないので、具体的な説明はしませんし、そこまで深く理解する必要はないです。<br />どんなタイプの攻撃方法なのかと、その対策方法を覚えてください。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>辞書攻撃</th>
				<td>パスワードとして使用されそうな単語を全て入力していきます。<br />例えば、「root」「admin」「pw」などはよく使用されるのでこれを大量に入力していきます。<br />対策として、ランダムな文字列をパスワードに設定することが挙げられます。</td>
			</tr>
			<tr>
				<th>ブルートフォース攻撃</th>
				<td>別名、総当たり攻撃です。<br />使用可能な文字列全てを順に入力していきます。<br />対策として、十分な長さのランダムな文字列にすることが挙げられます。</td>
			</tr>
			<tr>
				<th>パスワードリスト攻撃</th>
				<td>他サイトから流出したID・パスワードの組み合わせを使用してログインを試みます。<br />対策として、パスワードに使いまわしをしないことが挙げられます。</td>
			</tr>
			<tr>
				<th>XSS</th>
				<td>クロスサイトスクリプティングの略で、サイトを超えてスクリプトを実行させます。<br />webページに不正なスクリプトを埋め込むように細工することで、サイトの閲覧者に悪意のある処理を実行させます。</td>
			</tr>
			<tr>
				<th>CSRF</th>
				<td>クロスサイトリクエストフォージェリの略で、XSSのリクエストを偽る(フォージェリ)バージョンです。<br />サイトの閲覧者に悪意のあるリクエストをユーザの意思であるかのように偽ります。</td>
			</tr>
			<tr>
				<th>クリックジャッキング</th>
				<td>webページに他のページを表示して、この上に装飾をするなどして表示を偽り、ユーザにはその下にあるwebページを不正に操作させる攻撃です。</td>
			</tr>
			<tr>
				<th>ドライブバイダウンロード</th>
				<td>webページを閲覧しただけでマルウェア等をダウンロードさせます。</td>
			</tr>
			<tr>
				<th>SQLインジェクション</th>
				<td>SQLというデータベースを操作する言語を使用するプログラムに対して、不正なリクエストを送信することで悪意のあるデータねース操作をさせる攻撃です。</td>
			</tr>
			<tr>
				<th>ディレクトリトラバーサル</th>
				<td>リクエストからファイルへのパスを取得してファイル情報を出力するプログラムに対して、悪意のあるデータを送信して本来操作するべきではないファイルを操作させます。<br />例えば、id名を取得してそのid名からなるファイルを操作する場合に「../pass」とすることで、ひとつ上のディレクトリにあるpassファイルを操作させます。<br />対策として、入力されたデータをチェックすることが挙げられます。</td>
			</tr>
			<tr>
				<th>中間者攻撃</th>
				<td>正規の通信を行う二者間に入って、両者の通信を盗聴したり情報を改竄したりします。<br />対策として、フリーWiFiを使用しない、HTTPS通信を使用することが挙げられます。</td>
			</tr>
			<tr>
				<th>MITB攻撃</th>
				<td>「Man In The Browser」の略で、攻撃者はブラウザを乗っ取ることでユーザが入力した情報などを盗みます。<br />対策として、セキュリティソフトを導入する、安全ではないファイルをダウンロードしないことが挙げられます。</td>
			</tr>
			<tr>
				<th>第三者中継</th>
				<td>他人のメールサーバを踏み台にして外部にメールを送信させる攻撃です。<br />対策はかなり技術的な説明になるのでここでは省略します。</td>
			</tr>
			<tr>
				<th>IPスプーフィング</th>
				<td>IPアドレスを騙す(スプーフ)行為を言います。<br />IPアドレス自体を偽装してもそのうえで動作するTCPではシーケンス番号を必要とするため、実際には不正な通信が行われることはほとんどありません。<br />IPアドレスを偽装すること自体が目的ではなく、IPアドレスを偽装して大量のデータを送り付けるDoS攻撃を行ったりします。</td>
			</tr>
			<tr>
				<th>キャッシュポイズニング</th>
				<td>DNSサーバからの名前解決要求に対して、不正な応答をすることで間違ったデータをDNSサーバのキャッシュに登録させます。<br />対策として、DNSSECを使用することが挙げられます。</td>
			</tr>
			<tr>
				<th>セッションハイジャック</th>
				<td>セッションとはノード間の通信の関係を維持するための仕組みです。<br />これを乗っ取る(ハイジャック)することで他人を装った通信をします。<br />対策として、URLパラメタでセッションIDをやり取りしない、セッションIDをリセットすることが挙げられます。</td>
			</tr>
			<tr>
				<th>DoS攻撃</th>
				<td>「Denial of Service」の略で、サービス不能攻撃と訳されます。<br />大量のデータを送り付けてサービスを妨害します。<br />対策として、ファイアウォールによるパケットフィルタリングが挙げられます。</td>
			</tr>
			<tr>
				<th>DDoS攻撃</th>
				<td>「Distributed Denial of Service」の略で、分散型サービス不能攻撃と訳されます。<br />多数の踏み台サーバを用いてDoS攻撃を行います。<br />対策として、ファイアウォールによるパケットフィルタリングが挙げられます</td>
			</tr>
			<tr>
				<th>標的型攻撃</th>
				<td>不特定多数に対して行うのではなく、特定の攻撃対象を持って行う攻撃を言います。<br />また、これをさらにしつこく行うものを<strong>APT</strong>と言います。</td>
			</tr>
			<tr>
				<th>フィッシング</th>
				<td>「Phishing」の略で、簡単に言えば詐欺行為が該当します。</td>
			</tr>
			<tr>
				<th>ゼロデイ攻撃</th>
				<td>「ゼロ(0)」「デイ(day)」のことで、ハッキング方法が公開された直後に攻撃を行うことで、対策されていない状態で攻撃を行います。</td>
			</tr>
			<tr>
				<th>ポートスキャン</th>
				<td>これ自体は攻撃にはなりませんが、攻撃前の偵察として良く用いられます。<br />ポートとはコンピュータへの入り口に該当するもので、このポートが開いているか閉じているかをひとつひとつチェックしていきます。<br />不要なポートがたくさん空いている場合は、セキュリティ意識が低いとみなされて攻撃される危険性が高まります。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>情報セキュリティ組織・機関</h2>
セキュリティに関連する組織・機関について説明します。
<div class="scroll-600w">
	<caption>組織・機関</caption>
	<table>
		<tbody>
			<tr>
				<th>情報セキュリティ委員会</th>
				<td>企業の情報セキュリティ全体の管理を行う部門です。</td>
			</tr>
			<tr>
				<th>CSIRT</th>
				<td>「Computer Security Incident Response Team」の略で、「シーサート」と発音されます。<br />事故(インシデント)発生時に問題に対応することを目的とした組織です。</td>
			</tr>
			<tr>
				<th>SOC</th>
				<td>「Security Operation Center」の略で、情報セキュリティに関する問題の対応を行う組織です。</td>
			</tr>
			<tr>
				<th>J-CSIP</th>
				<td>「initiative for Cyber Security Information sharing Partnership of Japan」の略で、サイバー情報共有イニシアチブと訳されます。<br />IPAにサイバー攻撃情報を集約して共有することで、より高度なサイバー攻撃への対策につなげる取り組みです。</td>
			</tr>
			<tr>
				<th>J-CRAT</th>
				<td>「Cyber Rescue and Advice Team against targeted attack of Japan」の略で、サイバーレスキュー隊と訳されます。<br />IPAが発足させた、標的型サイバー攻撃特別相談窓口です。</td>
			</tr>
			<tr>
				<th>SECURITY ACTION</th>
				<td>
					「SECURITY ACTION」は中小企業自らが、情報セキュリティ対策に取組むことを自己宣言する制度です。
					<p>引用元は<a href="https://www.ipa.go.jp/security/security-action/sa/index.html">こちら</a>。</p>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="scroll-600w">
	<table>
		<caption>制度</caption>
		<tbody>
			<tr>
				<th>コンピュータ不正アクセス届出制度</th>
				<td>コンピュータで不正アクセスが生じた場合に、IPAに届け出る制度です。<br />経済産業省による「コンピュータウイルス対策基準」に基づいて開始されました。</td>
			</tr>
			<tr>
				<th>コンピュータウイルス届出制度</th>
				<td>コンピュータウイルスを発見・感染した場合にIPAに届け出る制度です。<br />経済産業省による「コンピュータウイルス対策基準」に基づいて開始されました。</td>
			</tr>
			<tr>
				<th>ソフトウェア等の脆弱性関連情報に関する届出制度</th>
				<td>国内で使用されているソフトウェア等(DBMS・アプリケーション)などの脆弱性を発見した場合にIPAに届け出る制度です。<br />経済産業省による「ソフトウェア等脆弱性関連情報取扱基準」に基づいて開始されました。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>情報セキュリティ対策</h2>
次は具体的に行うべきセキュリティ対策について紹介します。
<h3>人的セキュリティ対策</h3>
簡単に説明すれば、教育です。<br />僕は1週間前に就職して現在研修期間なのですが、2割近くセキュリティについて説明されています。<br />「教育」「訓練」「監視」などで従業員全体にセキュリティに対して最大限の注意を払わせるようにする必要があります。
<h3>技術的セキュリティ対策</h3>
セキュリティ対策のメインパートです。<br />シラバスの用語例で説明されている単語を説明します。
<div class="scroll-600w">
	<table>
		<tbody>
			<tr>
				<th>コールバック</th>
				<td>シラバスにはコールバックとだけ書かれていましたが、より正確に書くならば「コールバック通信の監視」です。<br />マルウェアは一度侵入に成功したら終わりではなく、ネットワーク内から攻撃者と通信を行うことがあります。<br />これがコールバックと言われます。<br />侵入を防ぐだけでなく、侵入された後に被害を拡大させないようにセキュリティ体制を確保する必要があります。</td>
			</tr>
			<tr>
				<th>アクセス制御</th>
				<td>ある人がしてよい行為としてはいけない行為を技術的にサポートすることです。<br />アクセス制御はセキュリティの基本中の基本です。</td>
			</tr>
			<tr>
				<th>ファイアウォール</th>
				<td>企業内部のネットワークと外部のネットワークの境界線に置く壁です。<br />セキュリティと言えばファイアウォールという認識の方も多いと思います。<br />目的としては正しい通信だけを許可して、不正な通信を遮断します。</td>
			</tr>
			<tr>
				<th>IDS</th>
				<td>「Intrusion Detection System」の略で、侵入検知システムと訳されます。<br />検知とありますが、検知した後はアクセスを遮断することもできます。<br />ファイアウォールがネットワークレベルでの壁として機能するのに対して、IDSはその上のミドルウェアレベルでの壁として絵機能します。</td>
			</tr>
			<tr>
				<th>IPS</th>
				<td>「Intrusion Prevention System」の略で、侵入防止システムと訳されます。<br />役割としてはIDSとほとんど同じですが、IDSが検知した後に対して遮断するため第一弾は遮断できないという問題を抱えているのに対して、IPSではこれを克服しています。<br />といっても設置方法次第ですが、、、<br />IDSの進化バージョンだと思ってください。</td>
			</tr>
			<tr>
				<th>DLP</th>
				<td>「Data Loss Prevention」の略で、データの漏洩を防ぐ技術です。<br />データそのものをチェックするため、情報漏洩に対する防御としてはかなり有用ですが、設定にかなりに労力を要するという問題も指摘されています。</td>
			</tr>
			<tr>
				<th>SIEM</th>
				<td>「Security Information and Event Management」の略で、「シーム」と発音します。<br />セキュリティに関する事象を一元管理するためのツールです。</td>
			</tr>
			<tr>
				<th>検疫ネットワーク</th>
				<td>セキュリティが十分でない機器を一時的に社内ネットワークから隔離することを言います。<br />日本に入国した外国人のうち、コロナ陰性が明確でない人は2週間の自宅隔離生活を要求するアレのITセキュリティバージョンです。</td>
			</tr>
			<tr>
				<th>DMZ</th>
				<td>「DeMilitalized Zone」の略で、非武装地帯と訳されます。<br />企業外部のネットワークと企業内部のネットワークの間に設置され、緩衝地帯としての役割を果たします。</td>
			</tr>
			<tr>
				<th>SSL/TLS</th>
				<td>「Secure Sockets Layer/Transport Layer Security」の略で、通信を暗号化する技術です。<br />従来はSSLという技術で、最近はTLSという技術へ移行しましたが、一般的には両者を合わせてSSL/TLSと呼ぶことが多いです。<br />HTTPS通信の「S」はSSL/TLSによって暗号化されていることを意味します。</td>
			</tr>
			<tr>
				<th>VPN</th>
				<td>「Virtual Private Network」の略で、インターネット上にプライベートな回線を構築する技術です。<br />拠点同士で重要なデータをやり取りする際には、不特定多数に見られるインターネットを通した通信では危険で、拠点間をつなぐ専用の回線を引くことが一般的です。<br />しかしながら、専用の回線を引くには莫大な費用が係るという問題があります。<br />これを克服する技術がVPNで、インターネット上に仮想的なプライベートネットワークを構築することで、インターネットを使用しながらも機密情報を安全に送受信することができます。</td>
			</tr>
			<tr>
				<th>MDM</th>
				<td>「Mobile Device Management」の略で、従業員が所有するIT端末を一括管理するシステムです。</td>
			</tr>
			<tr>
				<th>電子透かし</th>
				<td>画像・動画・音声などのデータに対して、秘密に特定の情報を埋め込むことで、そのデータの正当性を保証する技術です。</td>
			</tr>
			<tr>
				<th>ディジタルフォレンジックス</th>
				<td>フォレンジックスとは鑑識を意味し、警察などが事件の証拠を探したりすることを言います。<br />ディジタルフォレンジックスとはこのITバージョンで、ITでの犯罪に関してログ等の証拠を用いて分析することです。</td>
			</tr>
			<tr>
				<th>ペネトレーションテスト</th>
				<td>ペネトレーションとは侵入の意味で、実際にシステムに対してハッキング行為を実演してみて、その防御力をチェックする方法です。</td>
			</tr>
			<tr>
				<th>ブロックチェーン</th>
				<td>仮想通貨の信頼性を保つための技術です。<br />日本の紙幣って光にあてると肖像画が透けて見えますよね。<br />この技術によって偽装を防止していますが、仮想通貨での偽装を防止する技術がブロックチェーンです。<br />具体的な技術は難しいのでここでは説明しませんが、面白いので興味のある方はぜひ調べてみてください。</td>
			</tr>
			<tr>
				<th>対タンパ性</th>
				<td>タンパとはいじくるという意味で、対タンパ性で、不正にいじくれなくする性質となります。<br />SuicaやpasmoなどのICチップに対して不正な改竄を行わせない性質を言います。</td>
			</tr>
			<tr>
				<th>セキュアブート</th>
				<td>安全(セキュア)に、コンピュータを起動(ブート)する技術です。<br />ディジタル署名を確認して起動するソフトウェアを検証することで、コンピュータ起動時の安全性を確保します。</td>
			</tr>
			<tr>
				<th>TPM</th>
				<td>「Trusted Platform Module」の略で、セキュリティチップとも呼ばれます。<br />ハードウェアレベルで暗号化技術を実装するための装置で、マザーボードに取り付けられます。</td>
			</tr>
			<tr>
				<th>PCI DSS</th>
				<td>「Payment Card Industry Data Security Standard」の略で、クレジットカード業界の情報セキュリティ基準です。</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>物理的セキュリティ対策</h3>
最後に物理的なセキュリティ対策手法を説明します。<br /><br />といっても関係者以外を施設内に入れなければ基本はok!です。<br />そのために、セキュリティキー等によるロックを行ったり監視カメラで監視をしたりすることで、セキュリティレベルを向上させます。<br /><br />また、クリアデスク・クリアスクリーンも大切です。<br />クリアデスクとは席を離れるときに、机の上に書類や記憶媒体などを放置しないことで、クリアスクリーンとは席を離れるときにコンピュータのスクリーンを非表示にすることです。
<h2>暗号</h2>
暗号とは、あるデータ(文字・記号)を第三者に解読されないように何らかのルールに則って他の文字・記号に変換することを言います。<br /><br />例えば、「すきだよ」という言葉を暗号化してみましょう。<br />僕は「せくぢわ」になりました。<br />僕がどのようなルールに則って暗号化したと思いますか???<br />答えは単純に文字を50音で考えてひとつ先に進めました。<br /><br />ですけどこれだとすぐ解読されてしまいますよね、、、<br /><br />ではもう一度暗号化してみますね♪<br />「4s57&(:*gDyf」になりました。<br />今回はどんなルールに則って変換したか分からないと思います。<br />テキトーにキーボードを叩いただけなので笑<br /><br />ですけど、これだと本当に伝えたい相手にも「すきだよ」って伝えられないですよね、、、<br /><br />暗号技術で大切なことは<span class="underline">「暗号化と復号」</span>です。
<img src="../pics/暗号.png" alt="暗号" />
<span class="underline">暗号化するためのアルゴリズムを暗号鍵、復号するするためのアルゴリズムを復号鍵</span>と呼びます。
<h3>暗号方式</h3>
では、どうやって暗号化するかですよね、、、<br />いくつか方法があるので紹介しますね♪
<div class="scroll-600w">
	<table>
		<caption>主な暗号方式</caption>
		<tbody>
			<tr>
				<th>転置式暗号方式</th>
				<td>一定のルーにル則って文字・記号の順番を入れ替え方法です。<br />「すきだよ」&rarr;「きよすだ」</td>
			</tr>
			<tr>
				<th>換字式暗号方式</th>
				<td>一定のルールに則って文字・記号を他の文字に変換します。<br />「すきだよ」&rarr;「せくぢわ」</td>
			</tr>
			<tr>
				<th>共通鍵暗号方式</th>
				<td>かなり数学的な方法です。<br />覚えてほしいのは、<span class="underline">暗号と復号で同じ鍵を用いる</span>ことです。</td>
			</tr>
			<tr>
				<th>公開鍵暗号方式</th>
				<td>かなり数学的な方法です。<br />覚えてほしいのは、<span class="underline">暗号と復号で異なる鍵を用いる</span>ことです。</td>
			</tr>
			<tr>
				<th>ハイブリッド暗号方式</th>
				<td>共通鍵暗号方式と公開鍵暗号方式を組み合わせた方式です。<br />データの暗号化には共通鍵暗号方式を用いて、鍵の送信に関しては公開鍵暗号方式を用います。</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>ハッシュ関数</h3>
復号をしない暗号です。<br />復号をしない暗号って何???って思うと思いますが、必ずしも暗号は復号をする必要はありません。<br /><br />例えば、パスワードを保存する際にそのままパスワードを保存していたら危険です。<br />流出した際に他のサイトに対してパスワードリスト攻撃を仕掛けられる危険性もありますからね、、、
<img src="../pics/暗号-ハッシュ.png" alt="ハッシュ関数" />
<div class="separator"></div>
もっとも、ユーザがパスワードの使いまわしをしなければいいのですが、そんなことをしている人は残念ながらほとんどいません、、、<br /><br />試験に直接関係はありませんが、パスワードは本当に大切ですよ、、、<br />8文字は危険です。<br />最低でも12文字以上で、小文字・大文字・数字・記号全て入れたランダムな文字列に設定しましょう♪
<div id="pw-img-box">
	<img src="../pics/ipa-pw0.jpg" alt="パスワードの重要性" />
</div>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const bx = document.getElementById("pw-img-box"),
			obj = [],
			upto = 8;
		let i;
		bx.firstElementChild.style.maxWidth = "300px";
		for (i = 0; i < upto; i++) {
			const e = document.createElement("img");
			e.src = `../pics/ipa-pw${i}.jpg`;
			e.alt = "パスワードの重要性";
			e.style.maxWidth = "300px";
			obj.push(e);
		}
		i = 1;
		setInterval(() => {
			bx.removeChild(bx.firstElementChild);
			bx.appendChild(obj[i]);
			i++;
			i = (i === upto) ? 0 : i;
		}, 3000);
	})();
</script>
<h2>認証</h2>
認証とはユーザの真正性を確かめることです。<br />言い換えれば、なりすましを防ぐための技術であると言えます。<br />最も一般的な認証はIDとパスワードによるユーザチェックです。<br /><br />認証は、ユーザに対して行われる以外に、コンピュータやアプリケーション・データの真正性を確認する際にも使用されます。
<h3>ユーザに対する認証</h3>
ユーザに対する認証では主に以下の3つの方法があります。
<ul>
	<li>記憶による認証</li>
	<li>所有による認証</li>
	<li>生体による認証</li>
</ul>
<h4>記憶による認証</h4>
ユーザの記憶を使用した認証方法です。<br />パスワードや秘密の質問・暗証番号による認証が該当します。<br />非常に簡単に導入できるという利点がありますが、不正に使用される危険性が高いという問題があります。
<h4>所有による認証</h4>
モノを所有することによる認証方法です。<br />トークンやキャッシュカード・ICカードなどによる認証が該当します。
<p>正確には、お金を引き出すにはキャッシュカードは所有しているだけではダメで暗証番号も必要であるため、ハイブリッド型の認証です。</p>
比較的安全な認証方法ですが、盗難によって不正が引き起こされるという問題があります。
<h4>生体による認証</h4>
生体的特徴を使用した認証方法です。<br />指紋や顔などを使用します。<br /><br />近年、主流となっている認証方法です。<br /><br />かなり安全ですが、例えば寝ている人の指を用いて不正に認証を突破する危険性もあります。<br /><br />また、双子などの似ている人を正しく識別できないという問題もあります。
<table>
	<thead>
		<tr>
			<th width="50%">本人拒否率<br />FRR</th>
			<th width="50%">他人受入率<br />FAR</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>本人なのに「本人ではない」と判定されて、拒否される確率。</td>
			<td>他人なのに「本人である」と判定されて、受けれられる確率。</td>
		</tr>
	</tbody>
</table>
本人拒否率と他人受入率はトレードオフの関係にあり、本人拒否率を低くしようとすると他人受入率は高くなり、他人受入率を低くしようとすると他人受入率は高くなります。
<h3>コンピュータに対する認証</h3>
色々な認証がありますが、ここでは以下の2つを説明します。<br />これはITパスポート試験の上位試験である基本情報技術者試験や応用情報技術者試験などでもよく出題される範囲で、現在のインターネット技術の根幹技術でもあるため、しっかりと覚えましょう♪<br />といってもかなり難しいです、、、
<h3>ディジタル署名</h3>
ディジタル署名では以下の2つを実現します。
<ul>
	<li>ユーザ認証(なりすましの検知)</li>
	<li>メッセージ認証(改竄の検知)</li>
</ul>
大切なのでもう一度書きます。<br /><br />ディジタル署名では以下の2つを実現します。
<ul>
	<li>ユーザ認証(なりすましの検知)</li>
	<li>メッセージ認証(改竄の検知)</li>
</ul>
<span class="cancel">大切なのでもう一度</span><br /><br />もう大丈夫ですね♪
<svg version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<g id="faces" stroke-width="3.7462">
		<g>
			<ellipse class="e_node_face" cx="76.904" cy="46.805" rx="33.365" ry="30.615" fill="#00d2ff"/>
			<g fill="#fff">
				<circle class="white" cx="85.467" cy="39.025" r="6.9664"/>
				<circle class="white" cx="68.28" cy="38.743" r="6.9664"/>
				<path class="white" d="m54.356 48.858 22.458 22.458 22.548-22.548-22.462 12.965z"/>
			</g>
		</g>
		<g>
			<ellipse class="d_node_face" cx="479.98" cy="48.783" rx="31.322" ry="28.74" fill="#ff14ff"/>
			<g fill="#fff">
				<circle class="white" cx="488.03" cy="41.48" r="6.5397"/>
				<circle class="white" cx="471.89" cy="41.216" r="6.5397"/>
				<path class="white" d="m458.81 50.712 21.09 21.08 21.17-21.166-21.09 12.171z"/>
			</g>
		</g>
	</g>
	<path id="doc" class="doc num0" d="m50,102h39.71l11.61 14.61v50.95h-51.32z" stroke-width="1" style="fill: white; stroke: black;" />
	<g id="arws" stroke-width="1">
		<path id="arw0" class="arw num1 d" d="m108.15 150.64 2.76-3.82 2.77-3.82 38.18 33.46-21.86-12.91z"/>
		<path id="arw1" class="arw num2 d" d="m150.02 86.447 6.36-1.873 7.5-1.499 13.11 87.655 12.36 85.04-20.23-83.91z"/>
		<path id="arw2" class="arw num3 d" d="m149.64 247.53 12.74-9.37-50.57-53.19z"/>
		<path id="arw3" class="arw num3 d" d="m180.36 75.957 5.62 2.997 6.37 4.87-44.21 59.186-42.33 56.94 36.34-62.19z"/>
		<path id="arw4" class="arw num4 d" d="m130.91 176.73-0.75-18.74-0.37-23.6 138.98 6.37 135.98 6.74-136.73 16.49z"/>
		<path id="arw_" class="arw num3 d" d="m186.73 81.202 6.74 2.248 7.12 1.873-43.46 134.11-43.45 131.49 35.96-133.36z"/>
		<path id="arw5" class="arw num5 d" d="m419.74 178.6h14.98l-7.49 43.83z"/>
		<path id="arw6" class="arw num5 d" d="m498.41 178.6h14.98l-7.49 43.83z"/>
	</g>
	<g id="box" stroke-width="1">
		<rect id="box1" class="h num1 d" x="155" y="186" width="52" height="30"/>
		<rect id="box2" class="public num3 d" x="50" y="195" width="52" height="30"/>
		<rect id="box3" class="h num1 d" x="400" y="230" width="52" height="30"/>
	</g>
	<g id="icons" stroke="#000">
		<path id="s_key" class="key" d="m144.4,35.5c11.61 -5.544 18.35 3.671 10.49 13.112l4.49 6.368 5.62 -4.121 1.5 2.248 -6 3.746 3.38 4.87 5.62 -3.746 1.49 1.873 -7.49 4.87-10.49-14.61c-11.61 3.372-17.23 -5.994 -8.61-14.61z" fill="#fff"/>
		<path id="p_key" class="key" d="m198,32.5 6.74 12.101 -8.99 5.244 3.74 6.743 6 -3.371 1.12 2.247 -5.99 3.372 2.99 4.87 5.62 -3.372 1.13 1.874 -7.87 4.12 -8.62-15.359 -8.24 4.495 -7.11-12.175z" fill="#fff"/>
		<path id="ico_hash" class="hash" d="m232.5,62.5 -7.49-13.111 7.49-13.187 7.49 13.187z" fill="red"/>
		<path id="ico_hash0" class="hash" d="m232.5,62.5 -7.49-13.111 7.49-13.187 7.49 13.187z" fill="red"/>
	</g>
	<g id="info">
		<g stroke="#000">
			<path class="hash" d="m523.75 391.09-7.49-13.11 7.49-13.19 7.49 13.19z" fill="red"/>
			<path class="key" d="m323.79 366.27c11.62-5.55 18.37 3.67 10.5 13.11l4.49 6.37 5.62-4.12 1.5 2.24-5.99 3.75 3.37 4.87 5.62-3.75 1.5 1.88-7.49 4.87-10.49-14.61c-11.63 3.37-17.25-6-8.63-14.61z" fill="#fff"/>
			<path class="key" d="m436.72 362.54 6.74 12.1-8.99 5.24 3.75 6.74 5.99-3.37 1.13 2.25-6 3.37 3 4.87 5.62-3.37 1.12 1.87-7.87 4.12-8.61-15.36-8.24 4.5-7.12-12.18z" fill="#fff"/>
		</g>
		<g font-family="Consolas" font-size="16px">
			<text id="text3171" x="350.4" y="382.62" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">秘密鍵</text>
			<text id="text3703" x="447.99" y="382.59" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">公開鍵</text>
			<text id="text4455" x="534.72" y="382.34" style="font-variant-ligatures:none;line-height:1.25" xml:space="preserve">ハッシュ</text>
		</g>
	</g>
</svg>
<div class="button" id="d_sign-button">次へ</div>
<div class="r-border" id="d_sign-info"></div>
<script type="text/javascript" charset="utf-8" src="svg-animation.js" defer></script>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const d = document.getElementsByClassName("d"),
			info = document.getElementById("d_sign-info");
		function reset() {
			Array.from(d).forEach(e => {
				e.style.fill = "none";
				e.style.stroke = "none";
			});
			(() => {
				const orgn = [
					["box1", 155, 186],
					["box2", 50, 195],
					["box3", 400, 230],
					["s_key", 144.4, 32.4],
					["p_key", 198, 32.4],
					["ico_hash", 232.5, 62.5],
					["ico_hash0", 232.5, 62.5],
					["doc", 50, 102]
				];
				orgn.forEach(e => {
					const n = e[0],
						x = e[1],
						y = e[2],
						obj = document.getElementById(n),
						t = obj.tagName.toLowerCase();
					if (t === "path") {
						let d = obj.getAttribute("d");
						d = d.replace(/\d+\.*\d*(?=,)/, x);
						d = d.replace(/,\d+\.*\d*/, "," + y);
						obj.setAttribute("d", d);
					} else if (t === "rect") {
						obj.setAttribute("x", x);
						obj.setAttribute("y", y);
					}
				});
				info.textContent = "";
			})();
		}
		reset();
		let x_lock = false,
			now = 0;
		document.getElementById("d_sign-button").addEventListener("click", () => {
			if (!x_lock) {
				x_lock = true;
				switch (now) {
					case 0:
						document.getElementById("arw0").style.fill = "#00FF00";
						document.getElementById("box1").style.fill = "#FFFF00";
						document.getElementById("box1").style.stroke = "#000000";
						$$("ico_hash").move(165, 215, function() {x_lock = false;});
						info.textContent = "送信者はハッシュ関数を用いて送信する文書のメッセージダイジェスト(MD)を作成します。";
						break;
					case 1:
						document.getElementById("arw0").style.fill = "none";
						$$("box1").move(155, 255);
						$$("ico_hash").move(165, 285, function() {
							document.getElementById("arw1").style.fill = "#00FF00";
							$$("s_key").move(182, 255, function() {
								document.getElementById("box1").style.fill = "#9966FF";
								x_lock = false;
							})
						});
						info.textContent = "MDを送信者の秘密鍵で暗号化してディジタル署名を作成します。";
						break;
					case 2:
						document.getElementById("arw1").style.fill = "none";
						document.getElementById("arw2").style.fill = "#00FF00";
						document.getElementById("arw3").style.fill = "#00FF00";
						$$("ico_hash").move(60, 195);
						$$("s_key").move(77, 168);
						$$("box1").move(50, 168, function() {
							document.getElementById("box2").style.stroke = "#000000";
							document.getElementById("box2").style.fill = "#FF00FF";
							$$("p_key").move(80, 195, function() {
								document.getElementById("arw2").style.fill = "none";
								document.getElementById("arw3").style.fill = "none";
								x_lock = false;
							});
						});
						info.textContent = "文書(平文)・ディジタル署名(暗号化されたMD)・ディジタル証明書(送信者の公開鍵)の3つをまとめます。";
						break;
					case 3:
						document.getElementById("arw4").style.fill = "#00FF00";
						$$("doc").move(455, 102);
						$$("box1").move(455, 168);
						$$("box2").move(455, 196);
						$$("ico_hash").move(465, 195);
						$$("s_key").move(485, 168);
						$$("p_key").move(482, 195, function() {
							document.getElementById("arw4").style.fill = "none";
							x_lock = false;
						});
						info.textContent = "文書(平文)・ディジタル署名(暗号化されたMD)・ディジタル証明書(送信者の公開鍵)の三点セットを送信します。";
						break;
					case 4:
						$$("doc").move(400, 102);
						$$("box1").move(478, 108);
						$$("box2").move(478, 138);
						$$("ico_hash").move(490, 136);
						$$("s_key").move(505, 108);
						$$("p_key").move(508, 135, function() {
							x_lock = false;
						});
						info.textContent = "ディジタル署名(暗号化されたMD)・ディジタル証明書(送信者の公開鍵)から文書(平文)の正当性を検証する準備をします。";
						break;
					case 5:
						document.getElementById("arw5").style.fill = "#00FF00";
						document.getElementById("box3").style.fill = "#ffff00";
						document.getElementById("box3").style.stroke = "#000000";
						$$("ico_hash0").move(415, 258, function() {
							x_lock = false;
						});
						info.textContent = "受信者は受信データから文書(平文)を取り出してハッシュ関数を用いてメッセージダイジェストを作成します。";
						break;
					case 6:
						document.getElementById("arw6").style.fill = "#00ff00";
						$$("box1").move(478, 230);
						$$("ico_hash").move(490, 260);
						$$("s_key").move(505, 232, function() {
							x_lock = false;
						});
						info.textContent = "受信されたデータのうち、ディジタル署名(暗号化されたMD)を取り出します。";
						break;
					case 7:
						$$("box2").move(310, 75, false, 200);
						$$("p_key").move(340, 72, function() {
							$$("box2").move(658, 382);
							$$("p_key").move(688, 378);
							setTimeout(function() {
								$$("s_key").move(275, 415, false, 50);
								document.getElementById("box1").style.fill = "#ffff00";
								document.getElementById("arw5").style.fill = "none";
								document.getElementById("arw6").style.fill = "none";
								setTimeout(() => {
									reset();
									x_lock = false;
								}, 5000);
							}, 600)
						}, 200);
						info.textContent = "ディジタル署名を復号して、受信者がハッシュ関数で生成したMDと一致するかを検証します。";
						break;
				}
				now++;
			}
		});
	})();
</script>
ディジタル署名の概要を説明します。<br /><br />ディジタル署名では、<span class="underline">送信者の秘密鍵(復号鍵)で暗号化して、送信者の公開鍵(暗号鍵)で復号します。</span><br /><br />復号鍵で暗号!?暗号鍵で復号!?って思う方もいると思いますが、結果的には同じになります。<br />また、ディジタル署名の際は、送信者の秘密鍵(復号鍵)を<span class="underline">署名鍵</span>、送信者の公開鍵(暗号鍵)を<span class="underline">検証鍵</span>ということが多いです。<br />ディジタル署名はセキュリティ技術の中でも基盤となる技術ですので、今しっかりと覚えちゃいましょう♪
<h3>ディジタル証明書</h3>
ABC銀行のwebサイトかと思ってクレジットカード情報などの機密情報を入力したら、実はなりしましたサーバでした、、、<br />なんてことはあってはなりません。<br /><br />コンピュータが通信を行う際には相手のサーバの真正性を確認する必要があります。<br /><br />これを実現する技術が<strong>PKI</strong>です。<br />PKIとは「Public Key Infrastructure」の略で、公開鍵基盤と訳されます。<br />簡単に言えば、サーバが本当に正しいサーバかどうかを<span class="underline">信頼できる第三者</span>に証明してもらうことで真正性を保証する仕組みです。<br />信頼できる第三者機関を<strong>認証局(CA: Certification Authority)</strong>と言い、認証局が発行する証明書を<strong>ディジタル証明書</strong>と言います。<br />また、ひとつの認証局が全てのサーバの真正性を保証するのは困難であるため、認証局は階層構造をとって上位の認証局が下位の認証局を認証する形をとっています。<br />ディジタル証明書には認証局のユーザの公開鍵を含めて、これに認証局のディジタル署名を付して信頼性を高めています。
<img src="../pics/認証局.png" alt="認証局" />
また、ユーザがサーバに付与されたディジタル証明書に関して、上位の認証局のディジタル証明書を遡って検証することで当該サーバの真正性を確認します。
<img src="../pics/pki.png" alt="公開鍵基盤" />
<div class="separator"></div>
以上でITパスポート試験対策講座は終了です。<br />お疲れさまでした。
<?php footer(); ?>