<?php
require(__DIR__. "/../../framework/ver3/common.php");
$obj = array(
	"made" => "2022-02-10",
	"updated" => "2022-02-10"
);
head($obj);
?>
<h2>エンティティ</h2>
エンティティとは、データベース処理での登場人物のことを言い、実体とも呼ばれます。<br />一般的なECサイトを構築する際のデータベースを想定しましょう♪<br /><br />登場人物は以下のものが想定されます。
<ul>
	<li>顧客</li>
	<li>商品</li>
	<li>仕入先</li>
</ul>
これらはデータベース設計時にはエンティティと呼ばれます。
<h3>マスタとトランザクション</h3>
エンティティはマスタ型とトランザクション型に分類できます。<br /><br />その前にマスタデータとトランザクションデータの違いは知っていますか???<br />マスタデータとは何らかの取引のもととなるデータで、トランザクションデータはマスタデータを基に行われる処理によって発生するデータを言います。<br /><br />例えば、「商品名」「商品価格」などはマスタデータであり、「オーダーID」「注文金額」などはトランザクションデータです。<br /><br />僕が好きでよくサーフィンしている「<a href="https://wa3.i-3-i.info/diff372data.html">「分かりそう」で「分からない」でも「分かった」気になれるIT用語辞典</a>」では次のように説明されています。
<table>
	<thead>
		<tr>
			<th width="50%">マスタデータ</th>
			<th width="50%">トランザクションデータ</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>システムを使う前から入れておくデータ</td>
			<td>システムを使っていると増えていくデータ</td>
		</tr>
	</tbody>
</table>
では、次にマスタ型のエンティティとトランザクション型のエンティティについて説明します。<br />といっても、特に説明することもありませんが、、、<br /><br />マスタ型のエンティティとは、システムの基本データを管理するエンティティを指し、リソースエンティティとも呼ばれます。<br />「商品」「商品価格」などが該当します。<br /><br />トランザクション型のエンティティとは、システムの利用によって発生したエンティティのことを指し、イベントエンティティとも呼ばれます。<br />「入金」「受注」などが該当します。
<h2>リレーション</h2>
エンティティとエンティティの関係のことを言います。<br />例えば、「顧客」は「商品」を購入しますよね♪<br /><br />「顧客」と「商品」は共にエンティティですが、これらの関係として「購入」があります。<br />この「購入」がリレーションです。<br /><br />リレーションについては、以下の2点を覚えてください。
<ul>
	<li>依存・非依存</li>
	<li>多重度(カーディナリティ)</li>
</ul>
<h3>依存・非依存</h3>
これは現場では無視されることも多いですが、データベース構築では重要な知識です。<br /><br />リレーション状態にあるエンティティのうち、一方が削除されたらもう一方も削除されるべきかという問題です。
<h4>依存</h4>
依存の例では、「売上」と「売上明細」があげられます。<br />「売上」と「売上明細」を別のテーブルで管理していればの話ですが、、、<br /><br />「売上明細」は「売上」の補足的な立ち位置ですので、「売上」なくして存在しえません。<br /><br />このような関係が依存関係です。
<h4>非依存</h4>
非依存の例では、「商品」と「売上」があげられます。<br />「商品」がなくなったからと言って、「売上」からその商品を削除することはしませんよね、、、<br />同様に「売上」がなくなっても「商品」とは無関係ですよね、、、<br /><br />このような関係を非依存と言います。
<h3>多重度(カーディナリティ)</h3>
リレーションでつながれたエンティティ間の数量関係のことを言います。<br />例えば、「売上」と「売上明細」は常にセットで存在するため「1対1」の関係となります。<br />また、「商品」はひとつの「カテゴリ」に属し、「カテゴリ」は複数の「商品」を含むことができるため、「商品」と「カテゴリ」は「多対1」の関係となります。<br />「商品」が複数の「カテゴリ」に属することもありそうですが、、、<br /><br />「商品」が複数の「カテゴリ」に属してもok!とした場合には、「商品」と「カテゴリ」の関係は「多対多」となります。<br />「多対多」の関係では、正規化ができないため、通常は「商品カテゴリ」という緩衝用のエンティティを生成して無理やり「1対多」の関係に変換します。
<h2>ER図</h2>
「Entity - Relationship図」の略で、エンティティとそれらをつなぐリレーションをモデル化したものを言います。<br />データベース設計の最初にどのようなテーブルをどのようなカラムを設定して作成するかを判断する際に使用します。<br />ER図を作成する際には上で説明した以下の2点を特に意識して下さい。
<ul>
	<li>依存・非依存</li>
	<li>多重度(カーディナリティ)</li>
</ul>
ER図の書き方は大きく以下の3通りに分類できます。
<ul>
	<li>IE記法</li>
	<li>IDEF1X</li>
	<li>IPPA法</li>
</ul>
<h3>IR記法</h3>
「Information Engineering」の略です。<br />使用するマークが「<img class="normal-fontSize x" src="../pics/カラスの足.png" alt="カラスの足" />」と、カラスの足のようであるため、「カラスの足記法」または「鳥の足記法」とも呼ばれます。<br /><br />オフィスソフトで書きにくいという問題から現場ではあまり用いられませんが、事実上の標準として扱われています。<br /><br />特徴としては多重度(カーディナリティ)以外にもオプショナリティ・マンデートリーを表現できることです。<br />オプショナリティとは、多重度で「0」を許容する場合を言い、マンデートリーとは「0」を許容しない場合を言います。<br /><br />それぞれ、「Optionality」と「Mandatory」の和訳です。<br />なんだかそのままですね、、、笑笑<br /><br />では書き方を紹介します。
<img src="../pics/ie図-書き方.png" alt="IE図" />
「0 OK!」が「オプショナリティ」で、「0 NG!」がマンデートリーです。<br /><br />「2 &times; 2」で合計「4」通りのマークが存在します。
<img src="../pics/ie図.gif" alt="IE図" />
因みに、VS Codeを使用している方は簡単にIE記法で作図が可能な「draw.io」という拡張機能を使用することをオススメします。
<h3>IDEF1X</h3>
「アイデフイチエックス」と呼びます。<br />IE記法が鳥の足のような複雑な記法を使用しているのに対して、IDEF1X記法は丸と文字で表現するため、オフィスソフトなどで簡単に描写が可能です。<br /><br />覚えるべき点はIE記法と同じです。
<table>
	<tbody>
		<tr>
			<th class="left">● なし</th>
			<td>1</td>
		</tr>
		<tr>
			<th class="left">●</th>
			<td>0以上</td>
		</tr>
		<tr>
			<th class="left">● P</th>
			<td>1以上</td>
		</tr>
		<tr>
			<th class="left">● Z</th>
			<td>0 or 1</td>
		</tr>
		<tr>
			<th class="left">● N</th>
			<td>N</td>
		</tr>
		<tr>
			<th class="left">● N-M</th>
			<td>N ～ M</td>
		</tr>
	</tbody>
</table>
「1対多」の関係を覚えておけばまず大丈夫でしょう♪
<img src="../pics/idef1x.gif" alt="IDEF1X" />
<h3>IPA法</h3>
別に覚えなくてもok!です。<br />IPAが主催している情報処理試験では独自の記法を採用しているため、これを簡単に説明します。<br /><br />といっても、IDEF1Xの「●」を「▶」に変えるだけです。
<img src="../pics/ipa法.gif" alt="IPA法 ER図" />
<h2>候補キーと主キー</h2>
候補キーとは、レコード(行)を一意に識別するために必要な列または列の集まりを言います。<br />一般的にはIDやメールアドレスが該当します。<br /><br />また、主キーとは候補キーのうち、意味的に最もふさわしいものを言います。<br /><br />実際のところ、候補キーは理論的なもの、主キーは実践的なものと覚えておけばok!です。<br />現場では候補キーとはほとんど呼ばず、主キー呼びます。<br />また、主キーを英語でプライマリーキーと言いますが、こう呼ぶ人もいるためこの名称も覚えておきましょう♪<br /><br />主キーとなる列は以下の2つの制約が課せられます。
<table>
	<tbody>
		<tr>
			<th>一意性制約</th>
			<td>主キーは必ずそのテーブルで一意(ユニーク/オンリーワン)であること。</td>
		</tr>
		<tr>
			<th>非NULL制約</th>
			<td>主キーはNULLでないこと。</td>
		</tr>
	</tbody>
</table>
<h2>外部キー</h2>
リレーショナルモデルでは、テーブル間が密接な関係にあります。<br />したがって、テーブルのある列から他のテーブルの行を指定して結合することが多くあります。<br /><br />この際、呼び出し元のテーブルで呼び出すレコードを特定するための列を外部キーと言います。<br />この外部キー自体には制約は課されませんが、外部キーが参照する先は必ず存在する必要があります。<br /><br />これを参照制約と言います。<br /><br />参照制約違反を引き起こす危険性のある2つの処理を紹介します。
<table>
	<tbody>
		<tr>
			<th>呼び出し側<br />(参照元)</th>
			<td>参照先のない行の追加・更新</td>
		</tr>
		<tr>
			<th>呼び出し先<br />(参照先)</th>
			<td>参照先を失う行の削除・更新</td>
		</tr>
	</tbody>
</table>
実際には、参照制約違反を引き起こすSQLの実行をDBMSが禁止する仕組みが整っています。<br />また、カスケードと呼ばれる禁止ではなく、参照先の行を削除すると同時にそれを参照する行も同時に削除する仕組みも存在します。
<?php footer(); ?>