<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-11",
	"updated" => "2022-03-11"
);
head($obj);
?>
<p id="message">前回の授業では、攻撃者の種類とそれに対する予防策を学びましたね♪<br /><br />今回から6回の授業は具体的な攻撃手法について学んでいきます。<br /><br />今回はパスワードを解読するパスワードクラックについて学びます。<br /><br />それでは、Let's fly!</p>
<h2>辞書攻撃</h2>
パスワードとして用いられそうな文字列が大量に登録されたファイル(辞書)を用いて順次試していく攻撃方法です。<br />一般的に業務用のパスワードでは「sys」「root」「admin」「pw」「pass」「temp」などの文字列が使われることが多いため、それらを成功するまで何度も入力していきます。
<svg
	id="dict-attack"
	viewBox="0 0 600 400"
	version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<ellipse
		class="bad_face"
		cx="85.411"
		cy="194.59"
		rx="50.151"
		ry="43.84" />
	<path
		class="eye"
		d="m 111.66,175.35 -24.91,21.92 c 0,0 10.073,1.03 14.95,0 3.2,-0.68 6.8,-1.53 8.97,-3.99 2.29,-2.6 2.9,-6.49 2.99,-9.96 0.1,-2.74 -2,-7.97 -2,-7.97 z" />
	<path
		class="eye"
		d="m 51.872,175.35 24.913,21.92 c 0,0 -10.074,1.03 -14.948,0 -3.2,-0.68 -6.806,-1.53 -8.968,-3.99 -2.292,-2.6 -2.909,-6.49 -2.99,-9.96 -0.06,-2.74 1.993,-7.97 1.993,-7.97 z" />
	<rect
		class="server"
		width="79.72"
		height="129.55"
		x="480.37"
		y="127.52" />
	<rect
		class="window"
		width="33.212"
		height="14.613"
		x="492.26"
		y="142.78" />
	<rect
		class="window"
		width="33.212"
		height="14.613"
		x="492.93"
		y="172" />
	<text
		x="150"
		y="170">
		root
	</text>
	<text
		x="150"
		y="200">
		sys
	</text>
	<text
		x="150"
		y="230">
		admin
	</text>
</svg>
<script charset="utf-8" type="text/javascript">
	"use strict";
	(() => {
		const words = ["iloveyou", "temp", "sys", "admin", "pw", "pass", "password", "tmp"];
		const txt = document.getElementById("dict-attack").getElementsByTagName("text");
		setInterval(() => {
			Array.from(txt).forEach(e => {
				const dv = 3,
					tms = 30,
					r = parseInt(Math.random() * dv);
				let n = parseInt(e.getAttribute("x"));
				n += r + tms;
				if (450 < n) {
					n = 150;
					e.textContent = words[parseInt(Math.random() * words.length)]
				}
				e.setAttribute("x", n);
			});
		}, 300);
	})();
</script>
<p class="step">一般的な辞書に載っている単語や情報システムで良く用いられる用語の使用を避けて、ランダムな文字列にする。<br />IDに酷似したパスワードを用いない。</p>
<h2>ブルートフォース攻撃</h2>
ブルートフォース(brute force)とは「強引な」の意味で、有り得るパスワード全て入力していきます。<br />別名「総当たり攻撃」です。
<svg
	id="brute-attack"
	viewBox="0 0 600 400"
	version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<ellipse
		class="bad_face"
		cx="85.411"
		cy="194.59"
		rx="50.151"
		ry="43.84" />
	<path
		class="eye"
		d="m 111.66,175.35 -24.91,21.92 c 0,0 10.073,1.03 14.95,0 3.2,-0.68 6.8,-1.53 8.97,-3.99 2.29,-2.6 2.9,-6.49 2.99,-9.96 0.1,-2.74 -2,-7.97 -2,-7.97 z" />
	<path
		class="eye"
		d="m 51.872,175.35 24.913,21.92 c 0,0 -10.074,1.03 -14.948,0 -3.2,-0.68 -6.806,-1.53 -8.968,-3.99 -2.292,-2.6 -2.909,-6.49 -2.99,-9.96 -0.06,-2.74 1.993,-7.97 1.993,-7.97 z" />
	<rect
		class="server"
		width="79.72"
		height="129.55"
		x="480.37"
		y="127.52" />
	<rect
		class="window"
		width="33.212"
		height="14.613"
		x="492.26"
		y="142.78" />
	<rect
		class="window"
		width="33.212"
		height="14.613"
		x="492.93"
		y="172" />
	<text
		x="180"
		y="150">
		IDを固定 × パスワードを総当たりで!
	</text>
	<text
		class="text"
		x="150"
		y="200">
		0000
	</text>
</svg>
<script charset="utf-8" type="text/javascript">
	"use strict";
	(() => {
		function zero_padding(num) {
			return ("000" + num).slice(-4);
		}
		const txt = document.getElementById("brute-attack").getElementsByClassName("text");
		setInterval(() => {
			Array.from(txt).forEach(e => {
				const dv = 3,
					tms = 30,
					r = parseInt(Math.random() * dv);
				let n = parseInt(e.getAttribute("x"));
				n += r + tms;
				if (450 < n) {
					n = 150;
					let nm = parseInt(e.textContent);
					nm++;
					e.textContent = zero_padding(nm);
				}
				e.setAttribute("x", n);
			});
		}, 300);
	})();
</script>
<p class="step">パスワードの長さを十分に長く設置して、ランダムな文字列にする。</p>
<h2>リバースブルートフォース攻撃</h2>
前述したブルートフォース攻撃がひとつのIDに対して大量のパスワードを入力するのに対して、リバースブルートフォース攻撃ではひとつのパスワードに対して大量のIDを入力していきます。<br /><br />最近では、同一のIDで何回かログインに失敗したら一時的にログイン試行をロックするシステムが増えたのでその逆手をとる攻撃手法です。IDを特定していないので特定の人のアカウントへのログインを試みるのではなく、誰彼構わずにログインを試みる場合に用いられます。
<svg
	id="rbrute-attack"
	viewBox="0 0 600 400"
	version="1.1"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:svg="http://www.w3.org/2000/svg">
	<ellipse
		class="bad_face"
		cx="85.411"
		cy="194.59"
		rx="50.151"
		ry="43.84" />
	<path
		class="eye"
		d="m 111.66,175.35 -24.91,21.92 c 0,0 10.073,1.03 14.95,0 3.2,-0.68 6.8,-1.53 8.97,-3.99 2.29,-2.6 2.9,-6.49 2.99,-9.96 0.1,-2.74 -2,-7.97 -2,-7.97 z" />
	<path
		class="eye"
		d="m 51.872,175.35 24.913,21.92 c 0,0 -10.074,1.03 -14.948,0 -3.2,-0.68 -6.806,-1.53 -8.968,-3.99 -2.292,-2.6 -2.909,-6.49 -2.99,-9.96 -0.06,-2.74 1.993,-7.97 1.993,-7.97 z" />
	<rect
		class="server"
		width="79.72"
		height="129.55"
		x="480.37"
		y="127.52" />
	<rect
		class="window"
		width="33.212"
		height="14.613"
		x="492.26"
		y="142.78" />
	<rect
		class="window"
		width="33.212"
		height="14.613"
		x="492.93"
		y="172" />
	<text
		x="180"
		y="150">
		PWを固定 × IDを総当たりで!
	</text>
	<text
		class="text"
		x="150"
		y="200">
		DY8840
	</text>
</svg>
<script charset="utf-8" type="text/javascript">
	"use strict";
	(() => {
		function zero_padding(num) {
			return ("000" + num).slice(-4);
		}
		const txt = document.getElementById("rbrute-attack").getElementsByClassName("text");
		setInterval(() => {
			Array.from(txt).forEach(e => {
				const dv = 3,
					tms = 30,
					r = parseInt(Math.random() * dv);
				let n = parseInt(e.getAttribute("x"));
				n += r + tms;
				if (450 < n) {
					n = 150;
					let nm = parseInt(e.textContent.match(/\d+/));
					nm++;
					e.textContent = "DY" + zero_padding(nm);
				}
				e.setAttribute("x", n);
			});
		}, 300);
	})();
</script>
<p class="step">パスワード長さを十分に長く設置して、ランダムな文字列にする。</p>
<h2>レインボー攻撃</h2>
レインボー攻撃の前にハッシュとは、、、<br /><br />平文を暗号化して第三者に平文を特定されなくする技術で、ハッシュ演算では一方向性(「平文=>ハッシュダイジェスト」は求められるが、「ハッシュダイジェスト=>平文」は求められない)を保証します。<br /><br />ハッシュ攻撃とは、ハッシュ演算で算出されたハッシュダイジェストから平文を特定する攻撃です。<br />具体的には、大量の「平文<=>ハッシュダイジェスト」の組み合わせを求めてそれを格納したレインボーテーブルを作成して、それを用いて「ハッシュダイジェスト=>平文」の特定に挑戦します。
<div class="scroll-600w">
	<table>
		<caption>レインボーテーブル(sha256)</caption>
		<thead>
			<tr>
				<th>平文</th>
				<th>ハッシュダイジェスト</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>ILoveYou!</th>
				<td>7502d2589a3588f2572619b7467c13afaa90e4559367537f1a9dfbf6c76c4e26</td>
			</tr>
			<tr>
				<th>ILikeYou</th>
				<td>13c7e1fb3c6d6f6b6dad7fe091f17b86e57f0f9f060921bd93d0dd528c8368fe</td>
			</tr>
			<tr>
				<th>INeedYou</th>
				<td>58301fe855d649c27817c02b28976263771600e7565ae472ac08d5972993e8a9</td>
			</tr>
			<tr>
				<th>IWantYou</th>
				<td>deafd2f0369e86e7adc5014e89645a21bb83f901a44f20eac17a75acc72f5b1d</td>
			</tr>
			<tr>
				<th>IPreferYou</th>
				<td>7f32a5cdcb99c8ad3a5c3c5007fed10fdc57167719f95fec09cef1998ecb331e</td>
			</tr>
			<tr>
				<th>...</th>
				<th>...</th>
			</tr>
		</tbody>
	</table>
</div>
<p class="step">ソルトを使用する。<br />平文にソルト(適当な文字列)を付加してハッシュダイジェストを求めると、ソルトを用いないで算出したハッシュダイジェストとは全く異なるものとなり、「ハッシュダイジェスト -&gt; 平文(ソルトなし)」の特定が困難になる。<br />例えば上の「ILoveYou」にソルト「!」を付して、「ILoveYou!」のハッシュダイジェストを求めてみる。<br />「4194972483854c69e09e363d...」となり、1文字足すだけでハッシュダイジェストは全く異なるものとなることが分かる。この性質により、ソルトはレインボー攻撃に対する有効な対策となる。</p>
<h2>パスワードリスト攻撃</h2>
<p>他サイトから流出したIDとパスワードのセットを用いて、ログインを試みます。</p>
<p class="step">信頼できないwebサイトには登録しない。<br />複数のサイト間でパスワードを使いまわさない。</p>
<?php footer(); ?>