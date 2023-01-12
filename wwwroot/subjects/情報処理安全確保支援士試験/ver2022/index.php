<?php
require(__DIR__. "/../../framework/ver3.1/common.php");
$obj = array(
	"made" => "2022-03-11",
	"updated" => "2022-03-11"
);
head($obj);
?>
<h2>情報処理安全確保支援士試験</h2>
ITが社会の基盤として使用される今日は、それに対する攻撃を防ぐ必要性が増しています。<br />便利であるということは、攻撃対象になりやすいことを意味しますからね、、、<br /><br />ということで、日本政府のIT部門であるIPAはITに対する攻撃を防ぐプロフェッショナルとして情報処理安全確保支援士という制度を設けました。<br />情報処理技術者試験は、「世界最先端のIT国家」の実現に向けて、2001年にスタートした「e-Japan戦略」の一環として情報システムのセキュリティのプロフェッショナルを育成する「情報セキュリティアドミニストレータ試験」の後継である試験です。<br /><br />IPAのシラバスでは「サイバーセキュリティに関する専門的な知識・技能を活用して企業や組織における安全な情報システムの企画・設計・開発・運用を支援し，また，サイバーセキュリティ対策の調査・分析・評価を行い，その結果に基づき必要な指導・助言を行う者」を対象者像としてあげています。
<img src="../pics/体系.png" alt="情報処理技術者試験の体系" />
<div class="separator"></div>
ver1(2020年版)を元にページを全体的に改良しました。<br />ver1へは以下のリンクから飛べます。
<a href="../ver2020/top" class="link ver1">ver1</a>
<h2>概要</h2>
<table>
	<tbody>
		<tr>
			<th>難易度</th>
			<td>難しい</td>
		</tr>
		<tr>
			<th>勉強時間</th>
			<td>100時間程度(応用情報技術者合格者)</td>
		</tr>
		<tr>
			<th>資格区分</th>
			<td>国家試験</td>
		</tr>
		<tr>
			<th>ホームページ</th>
			<td><a href="https://www.jitec.ipa.go.jp/1_11seido/sc.html">IPA</a></td>
		</tr>
		<tr>
			<th>テスト方式</th>
			<td>ペーパーテスト</td>
		</tr>
		<tr>
			<th>試験日</th>
			<td>4月・10月</td>
		</tr>
		<tr>
			<th>合格率</th>
			<td>15%前後</td>
		</tr>
	</tbody>
</table>
<h2>出題範囲</h2>
<h3>午前Ⅰ</h3>
応用情報技術者試験を合格した人はスキップ可能です。<br />応用情報技術者試験と同じレベルの問題です。<br /><br />ここでは、応用情報技術者試験合格者を想定しているため、午前Ⅰについては解説しません。
<h3>午前Ⅱ</h3>
<div id="index-subs_box">
	<div>
		<div>テクノロジ系</div>
		<div>
			<div>技術要素</div>
			<div class="subjects-box">
				<div>セキュリティ</div>
				<a>情報セキュリティ</a>
				<a>脅威と脆弱性</a>
				<a>不正のメカニズム</a>
				<a>攻撃者の種類</a>
				<a>パスワードクラック</a>
				<a>webアプリに対する攻撃</a>
				<a>エージェント型攻撃</a>
				<a>サービス不能型攻撃</a>
				<a>論理的クラッキング</a>
				<a>攻撃の準備</a>
				<a>暗号技術</a>
				<a>認証</a>
				<a>認証技術</a>
				<a>公開鍵基盤</a>
				<a>情報セキュリティ管理</a>
				<a>リスク</a>
				<a>情報セキュリティ継続</a>
				<a>ISMS</a>
				<a>セキュリティ技術評価</a>
				<a>情報セキュリティ対策</a>
				<a>セキュアプロトコル</a>
				<a>認証プロトコル</a>
				<a>OSのセキュリティ</a>
				<a>アプリケーションセキュリティ</a>
				<a>安全な技術</a>
			</div>
			<div class="subjects-box">
				<div>ネットワーク</div>
				<a>ネットワーク基礎</a>
				<a>OSI基本参照モデル</a>
				<a>ファイアウォール</a>
				<a>IDS・IPS・WAF</a>
				<a>データ通信と制御</a>
				<a>通信プロトコル</a>
				<a>ネットワーク管理</a>
				<a>ネットワークセキュリティ</a>
			</div>
			<div class="subjects-box">
				<div>データベース</div>
				<a>データベース</a>
				<a>データベース設計</a>
				<a>データベース操作</a>
				<a>データベース管理</a>
			</div>
		</div>
		<div>
			<div>開発技術</div>
			<div class="subjects-box">
				<a>システム開発技術</a>
				<a>ソフトウェア開発管理技術</a>
			</div>
		</div>
	</div>
	<div>
		<div>マネジメント系</div>
		<div>
			<div>サービスマネジメント</div>
			<div class="subjects-box">
				<a>サービスマネジメント</a>
				<a>システム監査</a>
			</div>
		</div>
	</div>
</div>
<script charset="UTF-8" type="text/javascript">
	const pr = document.getElementById("index-subs_box"),
		a = pr.getElementsByTagName("a"),
		b = pr.getElementsByClassName("subjects-box");
	Array.from(a).forEach(e => {
		const name = e.textContent;
		e.setAttribute("href", name);
		e.classList.add("x");
	});
	let i;
	for (i = 0; i < b.length; i++) {
		b[i].style.backgroundColor = `hsla(${i * 360 / b.length}, 100%, 50%, 0.2)`
	}
</script>
<h3>午後Ⅲ・Ⅳ</h3>
<ol>
	<li>情報セキュリティシステムの企画・要件定義・開発・運用・保守に関すること</li>
	<li>情報セキュリティの運用に関すること</li>
	<li>情報セキュリティ技術に関すること</li>
	<li>開発の管理に関すること</li>
	<li>情報セキュリティ関連の法的要求事項に関すること</li>
</ol>
<p><a href = "https://www.ipa.go.jp">IPA</a>より引用(リンク先は<a href = "https://www.jitec.ipa.go.jp/1_04hanni_sukiru/_index_hanni_skill.html">こちら</a>)<br>(2022年03月11日時点)</p>
<p>シラバスは<a href = "syllabus-am.pdf">こちら</a>。(午前科目)</p>
<p>シラバスは<a href = "syllabus-pm.pdf">こちら</a>。(午後科目)</p>
<?php footer(); ?>