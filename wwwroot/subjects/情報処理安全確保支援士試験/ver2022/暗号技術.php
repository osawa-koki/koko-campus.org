<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-17",
	"updated" => "2022-03-17"
);
head($obj);
?>
<p id="message">情報セキュリティ特性のCIAを覚えていますか???<br /><br />「機密性・完全性・可用性」でしたね♪<br />今回はそのうちの「機密性」を保証するための技術、<span class="underline">暗号</span>について学んでいきます。<br /><br />それでは、Let's yell!</p>
<h2>CRYPTREC暗号リスト</h2>
<strong>CRYPTREC</strong> (<strong>Crypt</strong>ography <strong>R</strong>esearch and <strong>E</strong>valution <strong>C</strong>ommittees)とは、電子政府推奨暗号の安全性を評価・監視し、暗号技術の適切な実装・運用を図るプロジェクトであり、そのCRYPTRECがオススメしている暗号一覧がCRYPTREC暗号リストです。<br /><br />以下でCRYPTREC暗号リストの内容を紹介しますね♪<br />これからの複数回の授業で扱う内容の概要です。
<div class="scroll-600w">
	<table>
		<caption>CRYPTREC暗号リスト</caption>
		<tbody>
			<tr>
				<th rowspan=7>公開鍵技術</th>
				<th rowspan=4>署名</th>
				<td>DSA</td>
			</tr>
			<tr>
				<td>ECDSA</td>
			</tr>
			<tr>
				<td>RSA-PSS</td>
			</tr>
			<tr>
				<td>RSASSA-PKCS1-v1_5</td>
			</tr>
			<tr>
				<th>守秘</th>
				<td>RSA-OAEP</td>
			</tr>
			<tr>
				<th rowspan=2>鍵共有</th>
				<td>DH</td>
			</tr>
			<tr>
				<td>ECDH</td>
			</tr>
			<tr>
				<th rowspan=4>共通鍵暗号</th>
				<th>64ビットブロック暗号</th>
				<td>該当なし</td>
			</tr>
			<tr>
				<th rowspan=2>128ビットブロック暗号</th>
				<td>AES</td>
			</tr>
			<tr>
				<td>Camellia</td>
			</tr>
			<tr>
				<th>ストリーム暗号</th>
				<td>KCipher</td>
			</tr>
			<tr>
				<th rowspan=3 colspan=2>ハッシュ暗号</th>
				<td>SHA-256</td>
			</tr>
			<tr>
				<td>SHA-384</td>
			</tr>
			<tr>
				<td>SHA-512</td>
			</tr>
			<tr>
				<th rowspan=6>暗号利用モード</th>
				<th rowspan=4>秘匿モード</th>
				<td>CBC</td>
			</tr>
			<tr>
				<td>CFB</td>
			</tr>
			<tr>
				<td>CTR</td>
			</tr>
			<tr>
				<td>OFB</td>
			</tr>
			<tr>
				<th rowspan=2>秘匿モード</th>
				<td>CCM</td>
			</tr>
			<tr>
				<td>GCM</td>
			</tr>
			<tr>
				<th rowspan=2 colspan=2>メッセージ認証コード</th>
				<td>CMAC</td>
			</tr>
			<tr>
				<td>HMAC</td>
			</tr>
			<tr>
				<th colspan=2>認証技術</th>
				<td>該当なし</td>
			</tr>
			<tr>
				<th rowspan=2 colspan=2>エンティティ認証</th>
				<td>ISO/IEC 9798-2</td>
			</tr>
			<tr>
				<td>ISO/IEC 9798-3</td>
			</tr>
		</tbody>
	</table>
</div>
<p>引用元は<a href="https://www.cryptrec.go.jp/list.html">こちら</a>。</p>
<p>暗号に関するその他の規格は<a href="column/encript-standards">こちら</a>。</p>
いっきに全部を覚えるのは難しいと思いますが、これから複数回にわたる暗号技術の授業で役に立つと思いますので何度も見返しに来てくださいね♪
<div class="exam">
	&#9836;&#9836;&#9836; 令和2年秋試験午前&#8545;問8 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	CRIPTRECの活動として「<strong>暗号技術の技術的検討並びに国際的競争力の向上及び運用面での安全的向上に関する検討を行う</strong>」と説明されています。
	<div class="super_separator"></div>
	&#9836;&#9836;&#9836; 令和元年秋試験午前&#8545;問8 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	CRIPTRECを構成する暗号リストに関して、「<strong>電子政府推奨暗号リストとは、CRIPTRECによって安全性及び実装性能が確認された暗号技術のうち、市場における利用実績が十分であるか今後の普及が見込まれると判断され、当該技術の利用を推奨するもののリストである。</strong>」と説明されています。
	<div class="super_separator"></div>
	&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問9 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	CRYPTREC暗号リストにある推奨候補リストに関して、「<strong>安全性及び実装機能が確認され、今後、電子政府推奨暗号リストに掲載される可能性がある暗号技術のリストである。</strong>」と説明しています。
</div>
<h2>暗号</h2>
暗号とは、あるデータ(文字・記号)を第三者に解読されないように何らかのルールに則って他の文字・記号に変換することを言います。<br /><br />例えば、「すきだよ」という言葉を暗号化してみましょう。<br />僕は「せくぢわ」になりました。<br />僕がどのようなルールに則って暗号化したと思いますか???<br />答えは単純に文字を50音で考えてひとつ先に進めました。<br /><br />ですけどこれだとすぐ解読されてしまいますよね、、、<br /><br />ではもう一度暗号化してみますね♪<br />「4s57&(:*gDyf」になりました。<br />今回はどんなルールに則って変換したか分からないと思います。<br />テキトーにキーボードを叩いただけなので笑<br /><br />ですけど、これだと本当に伝えたい相手にも「すきだよ」って伝えられないですよね、、、<br /><br />暗号技術で大切なことは<span class="underline">「暗号化と復号」</span>です。<br /><span class="underline">暗号化するためのアルゴリズムを暗号鍵、復号するするためのアルゴリズムを復号鍵</span>と呼びます。
<h2>暗号方式</h2>
では、どうやって暗号化するかですよね、、、<br />いくつか方法があるので紹介しますね♪
<div class="scroll-600w">
	<table>
		<caption>主な暗号方式</caption>
		<tbody>
			<tr>
				<th>転置式暗号方式</th>
				<td>一定のルーにル則って文字・記号の順番を入れ替え方法です。<br />「すきだよ」→「きよすだ」</td>
			</tr>
			<tr>
				<th>換字式暗号方式</th>
				<td>一定のルールに則って文字・記号を他の文字に変換します。<br />「すきだよ」→「せくぢわ」</td>
			</tr>
			<tr>
				<th>共通鍵暗号方式</th>
				<td>かなり数学的な方法です。<br />覚えてほしいのは、<span class="underline">暗号と復号で同じ鍵を用いる</span>ことです。</td>
			</tr>
			<tr>
				<th>公開鍵暗号方式</th>
				<td>かなり数学的な方法です。<br />覚えてほしいのは、<span class="underline">暗号と復号で異なる鍵を用いる</span>ことです。</td>
			</tr>
		</tbody>
	</table>
</div>
<span id="href_ckey"></span>
<h2>共通鍵暗号方式</h2>
共通鍵暗号方式は暗号化と復号に同じ鍵(アルゴリズム)を用いる暗号手法です。
<img src="../pics/共通鍵暗号方式.png" alt="共通鍵暗号方式" />
<div class="scroll-600w">
	<table>
		<caption>共通鍵暗号方式</caption>
		<tbody>
			<tr>
				<th>利点</th>
				<td>
					<ul>
						<li>単純であるため処理が簡単。</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th>欠点</th>
				<td>
					<ul>
						<li>送信相手に安全に鍵を送るのが困難。</li>
						<li>鍵の数が多くなり管理が困難。</li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<h3>共通鍵暗号方式の種類</h3>
最初のCRIPTREC暗号リストで簡単に説明しましたが、共通鍵暗号方式は「ブロック暗号方式」と「ストリーム暗号方式」に分類されます。<br /><br />それぞれの特徴を覚えましょう♪
<div class="scroll-600w">
	<table>
		<caption>共通鍵暗号方式の種類</caption>
		<tbody>
			<tr>
				<th>ストリーム暗号方式</th>
				<td>平文を<span class="underline">ビット・バイト・文字ごとに暗号化</span>します。<br /><br />代表的な方法に「RC4」や「KCipher-2」があります。<br /><small>※RC4は危殆化が進んでいるため非推奨。</small></td>
			</tr>
			<tr>
				<th>ブロック暗号方式</th>
				<td>平文を一定のサイズ(ブロック)に分割して暗号化を行う方法です。<br /><br />代表的な方法に「DES」・「3DES」・「AES」・「Camellia」・「IDEA」があります。<br /><small>※「DES」と「3DES」は危殆化が進んでいるため非推奨。</small><br /><br />また、各ブロックごとにどのように暗号化するかによって<span class="underline">「ECB」・「CBC」・「CFB」・「OFB」</span>に分類されます。(暗号モード)</td>
			</tr>
		</tbody>
	</table>
</div>
ストリーム暗号方式とブロック暗号方式の代表的な方法について説明しますね♪
<h4>ストリーム暗号方式</h4>
<div class="scroll-600w">
	<table>
		<caption>ストリーム暗号方式</caption>
		<tbody>
			<tr>
				<th>RC4</th>
				<td>Ron Rivestが1987年に開発して事実上標準のストリーム暗号方式となったが、近年は危殆化が進んでいるため非推奨。</td>
			</tr>
			<tr>
				<th>KCipher-2</th>
				<td>developed by 「九州大学 & KDDI研究所」<br />CRIPTREC暗号リスト推奨。<br />鍵とIVの長さは「128ビット」。</td>
			</tr>
		</tbody>
	</table>
</div>
<h4>ブロック暗号方式</h4>
<div class="scroll-600w">
	<table>
		<caption>ブロック暗号方式</caption>
		<tbody>
			<tr>
				<th>DES</th>
				<td>「Data Encription Standard」の略で少し前までは米政府の標準。<br />ブロック長は「64ビット」。<br />危殆化が進んでいるため非推奨。</td>
			</tr>
			<tr>
				<th>3DES</th>
				<td>「Triple DES」の略で、DESの3重バージョンです。こちらも危殆化が進んでいるため非推奨。</td>
			</tr>
			<tr>
				<th>AES</th>
				<td>「Advanced Encription Standard」の略で、DESの進化バージョン。<br />ブロック長は「128/192/256ビット」。<br /><span class="underline">CRIPTREC暗号リスト推奨</span>。</td>
			</tr>
			<tr>
				<th>Camellia</th>
				<td>developed by 「NTT &amp; 三菱電機」<br />AESと同等の強度・効率性。<br />ブロック長は「128/192/256ビット」<br /><span class="underline">CRIPTREC暗号リスト推奨</span>。</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問7 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	AESの鍵長の条件として、「<strong>128ビット、192ビット、256ビットから選択する。</strong>」と説明しています。
	<div class="super_separator"></div>
	&#9836;&#9836;&#9836; 平成30年春試験午前&#8545;問1 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	AESの特徴として、「<strong>鍵長によって、段数が決まる。</strong>」と説明しています。
</div>
<span id="href_mode"></span>
<div class="separator"></div>
次にブロック暗号方式の暗号モード(各ブロックごとにどのように暗号化するか)を4つ紹介します。
<div class="explanation">
	<div class="title">ECB</div>
	「Electronic Code Book」の略で、単にブロックに分割してそれぞれを独立して暗号化する方法です。<br />ブロック暗号方式を採用する意味があまりないような、、、って感じです。
	<img src="../pics/ecb.png" alt="ECB暗号モード" />
</div>
<div class="explanation">
	<div class="title">CBC</div>
	「Cipher Block Chaining」の略で、初期ブロックの暗号ブロックと次の平文ブロックを排他的論理和(XOR)演算をしてその結果を暗号化する方法です。<br />最初の平文ブロックに対しては前の暗号ブロックの代わりに初期ベクトル(IV)が与えられます。
	<img src="../pics/cbc.png" alt="CBC暗号モード" />
</div>
<div class="explanation">
	<div class="title">CFB</div>
	「Cipher Feedback」の略で、最初にIVを暗号化して最初の平文ブロックとの排他的論理和演算(XOR演算)によって最初の暗号をブロックを生成します。<br />以降はひとつ前に生成された暗号ブロックを暗号化してその結果と次の平文ブロックを排他的論理和演算をして暗号化する流れを繰り返します。
	<img src="../pics/cfb.png" alt="CFB暗号モード" />
</div>
<div class="explanation">
	<div class="title">OFB</div>
	「Output Feedback」の略で、最初にIVを暗号化します。次に暗号化されたIVと最初の平文ブロックを排他的論理和演算(XOR演算)して暗号ブロックを生成します。暗号されたIVを再度暗号化して、それと次の平文ブロックを排他的論理和演算(XOR演算)して二つ目の暗号ブロックを生成します。2回暗号化されたIVをさらに暗号化してその結果と次の平文ブロックを排他的論理和演算(XOR演算)して、、、
	<img src="../pics/ofb.png" alt="OFB暗号モード" />
</div>
<span id="href_pkey"></span>
<h2>公開鍵暗号方式</h2>
別名、「非対称鍵暗号方式」です。暗号と復号に異なる鍵(アルゴリズム)を用いる暗号化手法です。
<img src="../pics/公開鍵暗号方式.png" alt="公開鍵暗号方式" />
次に公開鍵暗号方式の利点と欠点について学びましょう♪
<div class="scroll-600w">
	<table>
		<tr>
			<th>利点</th>
			<td>
				<ul>
					<li>自身の秘密鍵のみを保存するだけでよいため、管理が簡単。</li>
					<li>相手に鍵を送る必要がない。</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>欠点</th>
			<td>
				<ul>
					<li>ロジックが複雑であるため、システムへの組み入れが困難である。</li>
				</ul>	
			</td>
		</tr>
	</table>
</div>
<span class="underline">受信者の暗号用の鍵は公開鍵として公開して、受信者の復号用の鍵は秘密鍵として秘密に保存します。</span><br /><br />受信側は予め自分にデータを送信する人(不特定)のために暗号鍵を公開しといて、送信する側はその受信者の暗号鍵を用いて暗号化して送信します。<br />受信者はデータを受け取ったら秘密に保持されている復号鍵を用いてデータを復号します。<br /><br />代表的な公開鍵暗号方式には「RSA」や「楕円曲線暗号」があります。<br />以下で詳細に説明しますね♪
<h3>公開鍵暗号方式の種類</h3>
<div class="scroll-600w">
	<table>
		<caption>公開鍵暗号方式の種類</caption>
		<tbody>
			<tr>
				<th>RSA</th>
				<td>桁の大きな合成数の素因数分解が困難であるという数学的な性質を安全の背景とした暗号化技術です。<br /><br />例えば、「1121893841」という数字は2つの素数の積です。<br />(p × q=1121893841)を満たす整数pとqを求めてみてみましょう♪<br /><br />無理ですね笑<br />答えは「21193」「52937」ですが、これの桁数を150桁近くにするとコンピュータを用いても計算できません。</td>
			</tr>
			<tr>
				<th>楕円曲線暗号</th>
				<td>楕円曲線上の離散対数問題の難しさを安全性の根拠とした暗号化技術です。</td>
			</tr>
		</tbody>
	</table>
</div>
<h2>鍵の数</h2>
ここでは、共通鍵暗号方式と公開鍵暗号方式でそれぞれ必要な鍵の数を覚えましょう♪
<table>
	<caption>必要な鍵の数</caption>
	<tbody>
		<tr>
			<th>共通鍵暗号方式</th>
			<td><sub>n</sub>C<sub>2</sub> = <span class="fraction"><span class="fraction_n">n(n - 1)</span><span class="fraction_d">2</span></span></td>
		</tr>
		<tr>
			<th>公開鍵暗号方式</th>
			<td>2n</td>
		</tr>
	</tbody>
</table>
<svg version="1.1" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
	<path d="m50 50v300h500" fill="none" stroke="#000" stroke-width="1px"/>
	<text x="9.332" y="35.329" font-family="Consolas" font-size="16px">鍵の数(80個)</text>
	<text x="463.27" y="373.95" font-family="Consolas" font-size="16px">相手の数(30人)</text>
	<polyline id="c_key-curve" style="stroke: aqua;" />
	<polyline id="p_key-curve" style="stroke: lime;" />
	<text x="110" y="380" font-family="Consolas" font-size="14px" style="fill: aqua;">共通鍵の数</text>
	<text x="220" y="380" font-family="Consolas" font-size="14px" style="fill: lime;">暗号鍵の数</text>
</svg>
<script type="text/javascript" charset="utf-8">
	(() => {
		const x_from = 50,
			x_upto = 550,
			x_diff = x_upto - x_from,
			y_from = 50,
			y_upto = 350,
			y_diff = y_upto - y_from,
			x_from_ = 0,
			x_upto_ = 30,
			x_diff_ = x_upto_ - x_from_,
			y_from_ = 0,
			y_upto_ = 80,
			y_diff_ = y_upto_ - y_from_;
		(() => {
			const k = document.getElementById("p_key-curve");
			let pts = "",
				i;
			for (i = x_from_; i <= x_upto_; i++) {
				pts += (i * x_diff / x_diff_ + x_from).toString() + ", ";
				pts += (y_upto - (i * 2) * y_diff / y_diff_).toString() + " ";
			}
			k.setAttribute("points", pts);
		})();
		(() => {
			const k = document.getElementById("c_key-curve");
			let pts = "",
				i;
			for (i = x_from_; i <= x_upto_; i++) {
				pts += (i * x_diff / x_diff_ + x_from).toString() + ", ";
				pts += (y_upto - (i * (i - 1) / 2) * y_diff / y_diff_).toString() + " ";
			}
			k.setAttribute("points", pts);
		})();
	})();
</script>
n=5の時に両者は10で等しくなり、nがそれより大きいと共通鍵暗号方式の鍵の数は準階乗方式で増えていきます。
<h2>ハイブリッド暗号方式</h2>
共通鍵暗号方式と公開鍵暗号方式を組み合わせた方式(ハイブリッド/hybrid)です。<br /><br />データの暗号化には共通鍵暗号方式を用います。<br />共通鍵暗号方式の欠点である鍵の安全な送信が困難という問題については、公開鍵暗号方式を用いて暗号化して送信する方法です。
<h2>DH鍵共有方式</h2>
DiffieとHellmanが開発した鍵交換・共有のためのアルゴリズムです。<br />離散対数問題の難しさを安全性の根拠としています。
<div class="explanation">
	<div class="title">離散対数問題</div>
	素数pと定数gが与えられ、整数yを素数pでg<sup>x</sup>を除したときときの剰余とするとき、yについて整数解xを求める問題です。<br /><br />「y=g<sup>x</sup> mod p」に関して、「x -&gt; y」を求めるのは簡単だが、「y -&gt; x」を求めるのは困難であるという問題のことを言います。
</div>
<span id="href_hash"></span>
<h2>ハッシュ関数</h2>
準暗号アルゴリズムです。<br />暗号技術では、「暗号化」と「復号」が大切だと言いましたが、ハッシュ関数は<span class="underline">「復号が不可能」</span>な暗号技術です。<br /><br />復号しなくていいの???って思う人もいるかもしれませんが、入力データが一致していることだけを確認するためには復号は不要です。<br />むしろパスワードのような「一致を確認するだけ &times; とても大切」な情報は復号できない方がいいんです。<br /><br />パスワードを例にして説明しますね♪<br />ユーザが「pass0123」というパスワードを登録したとしますね♪<br />プログラムはこれをハッシュ化して「jGY45G%6HFFh00」にして保存します。<br />ログイン時にはユーザが入力した「pass0123」をハッシュ化して「jGY45G%6HFFh00」を生成して、登録されている「jGY45G%6HFFh00」と一致するかどうかを判断します。<br /><br />ハッシュ関数は以下の3つの性質を備えている必要があります。
<div class="scroll-600w">
	<table>
		<caption>ハッシュ関数の性質</caption>
		<tbody>
			<tr>
				<th>衝突発見困難性</th>
				<td>先ほどの例では、「pass0123」から「jGY45G%6HFFh00」が生成されましたよね♪<br />ですけど、「iloveyou」をハッシュ化して「jGY45G%6HFFh00」になってしまったら、不正なログインを許してしまいます、、、<br /><span class="underline">異なる文字をハッシュ化して同じ文字列にならない性質が「衝突発見困難性」</span>です。</td>
			</tr>
			<tr>
				<th>第２現像計算困難性</th>
				<td>衝突発見困難性と似ていますが、こちらはデータとハッシュ化されたデータが既知の際の衝突発見困難性です。</td>
			</tr>
			<tr>
				<th>現像計算困難性</th>
				<td>別名、「一方向性」です。ハッシュ化されたデータを元のデータに復号できない性質です。</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="exam">
	&#9836;&#9836;&#9836; 令和3年春試験午前&#8545;問3 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	衝突発見困難性に関して、「<strong>ハッシュ値が一致する2つのメッセージの発見に要する計算量が大きいことによる、発見の困難性</strong>」と説明しています。
	<div class="super_separator"></div>
	&#9836;&#9836;&#9836; 平成31年春試験午前&#8545;問4 &#9836;&#9836;&#9836;
	<div class="separator"></div>
	衝突発見困難性に関して、「<strong>ハッシュ値が一致する二つのメッセージの発見に要する計算量が大きいことによる、発見の困難性のことである。</strong>」と説明しています。
</div>
ハッシュ関数は以上3つの性質を有するため、「メッセージ認証」・「OTPの生成」・「<a href="認証?to=href_d-sign">ディジタル署名</a>」に利用されています。
<p>すべて後ほど学習します。</p>
次に代表的なハッシュ関数について説明しますね♪
<div class="scroll-600w">
	<table>
		<caption>ハッシュ関数</caption>
		<tbody>
			<tr>
				<th>MD4</th>
				<td>RC4(ストリーム暗号方式)の開発者であるRon Rivestが開発した関数です。<br />「128ビット」のハッシュ値を生成します。<br />「S/Keys」で利用されていましたが、アルゴリズムに幾つか欠点が報告されています。</td>
			</tr>
			<tr>
				<th>MD5</th>
				<td>Ron RivestがMD4を進化させたのがMD5です。<br />MD4同様、「128ビット」のハッシュ値を生成します。</td>
			</tr>
			<tr>
				<th>SHA-1</th>
				<td>NIST(アメリカ国立標準技術研究所)がMD4を改良して開発したハッシュ関数です。<br />「160ビット」のハッシュ値を生成します。<br />近年は危殆化が進んでいるため非推奨。</td>
			</tr>
			<tr>
				<th>SHA-2</th>
				<td>「SHA-224」「SHA-256」「SHA-384」「SHA-512」の総称です。<br />SHAの後の数字がハッシュ値のビット数を表します。<br />「SHA-224」を除いてCRIPTREC暗号リストの推奨暗号です。</td>
			</tr>
			<tr>
				<th>SHA-3</th>
				<td>NISTが2012年に開催した暗号技術大会で「Keccak」がSHA-3に選出されました。<br />「224/256/384/512ビット」ハッシュ値を生成します。</td>
			</tr>
		</tbody>
	</table>
</div>
<!-- 鍵生成，疑似乱数，乱数生成，疑似乱数生成器（PRNG），鍵管理，ストレージ暗号化，ファイル暗号化，危殆化，ゼロ知識証明，SSL/TLS 暗号設定ガイドライン -->
<?php footer(); ?>