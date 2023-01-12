<?php
require_once("common.php");
include_head("情報処理安全確保支援士試験");
?>

<div class = "get_it_center">
	<div class="ribbon">
	  	<h1>SC試験</h1>
	</div>
</div>



<!-- ここから本文の始まり -->
<div id = "main">
	<div class = "subject_entire get_it_center">
		<h1 class = "show_hide highlight">SC試験の概要</h1>

			<table class = "hidden get_it_center" border = 1>
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
					<td><a href = "https://www.jitec.ipa.go.jp/1_11seido/sc.html">IPA</a></td>
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
			</table>



		<h1 class = "show_hide highlight">SC試験の出題範囲</h1>


		<div id = "subjects" class = "hidden">
			<div class = "get_it_left">
				<p><small>※クリックしたらその下の分類が表示されます。青くなっている文字をクリックするとそのページへ遷移します。<br>※ここでは、応用情報技術者合格者を想定するため、午前Ⅰについては説明しません。</small></p>
			</div>

			<h2><span id = "am">午前Ⅱ</span></h2>
			<div id = "tec_sub1">
			<h2 class = "show_hide">テクノロジ系</h2>
				<div class = "hidden">
					<div class = "tec_sub2">
					<h4 class = "show_hide">-技術要素</h4>
						<div class = "hidden">
							<h6><a href = "sc-1-1-1">-セキュリティ</a></h6>
							<h6><a href = "sc-1-2-1">-データベース</a></h6>
							<h6><a href = "sc-1-3-1">-ネットワーク</a></h6>
						</div>
					</div>
					<div class = "tec_sub2">
					<h4 class = "show_hide">-開発技術</h4>
						<div class = "hidden">
							<h6><a href = "sc-2-1-1">-システム開発技術</a></h6>
							<h6><a href = "sc-2-2-1">-ソフトウェア開発管理技術</a></h6>
						</div>
					</div>
				</div>
			</div>


			<div id = "man_sub1">
			<h2 class = "show_hide">マネジメント系</h2>
				<div class = "hidden">
					<div class = "man_sub2">
					<h4 class = "show_hide">-サービスマネジメント</h4>
						<div class = "hidden">
							<h6><a href = "sc-3-1-1">-サービスマネジメント</a></h6>
							<h6><a href = "sc-3-2-1">-システム監査</a></h6>
						</div>
					</div>
				</div>
			</div>


			<div class = "add_margin"></div>



			<h2><span id = "pm">午後Ⅲ・Ⅳ</span></h2>
			<ol>
				<li>情報セキュリティシステムの企画・要件定義・開発・運用・保守に関すること</li>
				<li>情報セキュリティの運用に関すること</li>
				<li>情報セキュリティ技術に関すること</li>
				<li>開発の管理に関すること</li>
				<li>情報セキュリティ関連の法的要求事項に関すること</li>
			</ol>



			<div class = "get_it_left">
				<p><small>※<a href = "https://www.ipa.go.jp">IPA</a>より引用(リンク先は<a href = "https://www.jitec.ipa.go.jp/1_04hanni_sukiru/_index_hanni_skill.html">こちら</a>)<br>※2021年9月1日時点</small></p>
				<p><small>※シラバスは<a href = "syllabus-am.pdf">こちら</a>。(午前科目)</small></p>
				<p><small>※シラバスは<a href = "syllabus-pm.pdf">こちら</a>。(午後科目)</small></p>
			</div>

		</div>

		<h1 class = "show_hide highlight">webサイト管理者からのコメント</h1>

		<div class = "hidden">

			<p id = "comment">こんにちは♪このwebサイトの管理者のkokoです♪<br>このページを訪ねてくれてありがとうございます。<br><br>最近は、セキュリティ被害が事件になることが多いですよね、、、<br>au payの不正利用や「えきねっと」(JR東日本)の個人情報流出事件、ソニーの個人情報流出事件etc..あげればきりがないです、、、<br>ITの利便性の裏に存在するセキュリティリスクは今や看過できません。<br>そのような中で、情報処理技術者試験の勉強はセキュリティ技術について理論的に学ぶ機会を提供してくれます。みなさんもITエンジニアとしてITを扱う際に注意すべき点をしっかりおさえて安全なシステム・プログラムの作成に取り組みましょう♪</p>

		</div>
	</div>
</div>


<div class = "button_area">

<div class = "add_margin"></div>

	<div>
	<a href = "sc-1-1-1" id = "button">Get Started!!!</a>
	</div>

</div>

<?php

if ($_SESSION['ok'] == 1) {
	?>
	<div class = "go_mypage">
		<button onclick = "location.href = '../mypage'">マイページへ戻る</button>
	</div>
	<?php
}


?>

<script charset = "UTF-8" type="text/javascript" src = "top.js" defer></script>

</body>
</html>