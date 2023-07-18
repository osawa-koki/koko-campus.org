<?php
include("common.php");
head("現金預金");
?>
<h2>現金預金</h2>
<h3>現金</h3>
現金の定義としては、「<strong>通貨</strong>」と「<strong>通貨代用証券</strong>」を指します。
<table border="1" class="norble">
	<tbody>
		<tr>
			<th>通貨</th>
			<td>
				<ul class="no left">
					<li>硬貨</li>
					<li>紙幣</li>
				</ul>
			</td>
			<tr>
				<th>通貨代用証券</th>
				<td>
					<ul class="no left">
						<li>他人振出小切手(自己振出小切手は当座預金)</li>
						<li>送金小切手(先日付小切手は受取手形)</li>
						<li>配当金領収証</li>
						<li>公社債利札</li>
					</ul>
				</td>
			</tr>
		</tr>
	</tbody>
</table>
現金は流動資産として記録します。
<div class="column">
	CF計算書の作成の際に用いる<strong>現金同等物</strong>と混同しないように注意してください。<br><br>現金同等物とは、「3カ月以内の定期預金・譲渡性預金・コマーシャルペーパー・公社債投信」を言います。
</div>
<h3>預金</h3>
預金の定義としては「普通預金」「当座預金」「定期預金」がありますが、このうちの「普通預金」「当座預金」は常に流動預金として記録して、定期預金に関しては一年基準によって分類します。<br><br>また、決算日において当座預金が貸方残高(マイナス)の際には、その分は銀行からの借入とみなし<strong>短期借入金</strong>として処理します。<br><br>
また、当座預金に関して企業側の記録が実際の銀行の記録と一致しないことがあります。<br>このような場合には当座預金の修正仕訳が必要な場合があります。
<table class="norble" border="1">
	<caption>要修正</caption>
	<tbody>
		<tr>
			<th>引落未通知</th>
			<td>当座引き落としの連絡が企業に伝わってない</td>
		</tr>
		<tr>
			<th>取立未通知</th>
			<td>当座振込の連絡が企業に伝わってない</td>
		</tr>
		<tr>
			<th>誤記入</th>
			<td>誤った処理をしている</td>
		</tr>
		<tr>
			<th>未渡小切手</th>
			<td>作成した小切手に関して当座預金を減少させる処理をしたが、取引先にまだ渡していない</td>
		</tr>
	</tbody>
</table>
<table border="1" class="norble">
	<caption>修正不要</caption>
	<tbody>
		<tr>
			<th>時間外預入</th>
			<td>銀行の営業時間外の入金</td>
		</tr>
		<tr>
			<th>未取立小切手</th>
			<td>依頼済みの取立を銀行がまだ取り立てていない</td>
		</tr>
		<tr>
			<th>未取付小切手</th>
			<td>取引先に振り出した小切手をまだ取引先が取り付けていない</td>
		</tr>
	</tbody>
</table>

<?php footer(); ?>