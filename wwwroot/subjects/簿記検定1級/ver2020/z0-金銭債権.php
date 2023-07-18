<?php
include("common.php");
head("金銭債権");
?>
<h2>金銭債権の種類</h2>
金銭債権はまず、「<strong>営業債権</strong>」と「<strong>営業外債権</strong>」に分類されます。<br><br>営業債権はさらに「<strong>売上債権</strong>」と「<strong>売上債権以外の営業債権</strong>」に分類されます。
<table class="norble" border="1">
	<tbody>
		<tr>
			<th rowspan="3" id="kinsensaiken">金銭債権</th>
			<td rowspan="2">営業債権</td>
			<td>
				売上債権
				<ul class="no">
					<li>売掛金</li>
					<li>受取手形</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>営業債権以外の金銭債権</td>
		</tr>
		<tr>
			<td colspan="2">
				営業外債権
				<ul class="no">
					<li>貸付金</li>
					<li>未収入金</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<h2>金銭債権の評価</h2>
取得原価モデルを採用してるため、時価評価はせずに取得原価を貸借対照表価額とします。<br>但し、取得原価と額面価額(債権金額)の差額が金利調整差額と認められる際には償却原価法によって算定した額をもって貸借対照表価額とします。<br><br>また、金銭債権に対して貸倒引当金が設定されている場合にはこれを控除した額を計上します。<br>
<span class="r">
	!取得原価モデル!
	?収支額基準(等価交換の前提)に基づいて資産価値をその資産の取得に要した費用の額で測定するモデル。<br><br>メリット=>客観性・確実性がある<br>デメリット=>資産価値の変動を把握できない?
</span><br>
<span class="r">
	!償却原価法!
	?取得原価と額面価額の差額を利息の調整分と仮定して、満期までの間毎期一定の方法で算出した額を債権の貸借対照表価額に加算する手法です。<br><br>具体的な実装方法には「利息法」と「定額法」があります。?
</span>
<h2>債権の区分(デフォルトリスクによる分類)</h2>
金銭債権に対して貸倒引当金を設定する際には、金銭債権を回収可能性の高い順に「<strong>一般債権</strong>」「<strong>貸倒懸念債権</strong>」「<strong>破産更生債権等</strong>」
に分類します。
<h2>貸倒見積高の算定</h2>
「一般債権」「貸倒懸念債権」「破産更生債権等」によって貸倒見積高の算定方法は異なります。
<h3>一般債権</h3>
<p>「<strong>貸倒実績率法</strong>」を採用します。</p>
<div class="f">
	!一般債権の貸倒見積高!
	<strong>= 債権金額 &times; 貸倒実績率</strong>
	<br><br>
	<div class="nowrap">
		<span>※貸倒実績率は「</span>
		<span class="fraction">
			<span class="fraction_n">一定期間での実際貸倒高</span>
			<span class="fraction_d">一定期間での期末債権金額</span>
		</span>
		<span class="wrap">」で計算されるため、以下の式でも表されます。</span>
	</div>
	<br>
	<div class="nowrap">
		<span>= 債権金額 &times; </span>
		<span class="fraction">
			<span class="fraction_n">一定期間での実際貸倒高</span>
			<span class="fraction_d">一定期間での期末債権金額</span>
		</span>
	</div>
	<br>
	※<span class="u">各期の貸倒実績率の平均を用います。</span><br>(合計ではないことに注意)
</div>
<h3>貸倒懸念債権</h3>
<p>「<strong>財務内容評価法</strong>」と「<strong>キャッシュフロー見積法</strong>」を採用します。</p>
<h4>財務内容評価法</h4>
<div class="f">
	!財務内容評価法!
	<strong>= (債権金額 - 担保処分見込額) &times; 貸倒設定率</strong>
</div>
<h4>キャッシュフロー見積法</h4>
<div class="f">
	!キャッシュフロー見積法!
	<strong>= 債権金額 &times; 将来CFの割引現在価値合計</strong>
</div>
<span class="r">
	!割引現在価値!
	?利息の逆バージョンです。<br><br>現在価値100円で利息10%の場合は一年後に110(100&times;1.05)円、二年後に121(100&times;1.05<sup>2</sup>)円になりますが、割引現在価値の算出ではこの逆の計算を行います。<br><br>一年後の価値100円の場合の現在の価値は95.24(100&divide;1.05)円です。?
</span>
<h3>破産更生債権等</h3>
<p>「<strong>財務内容評価法</strong>」を採用します。</p>
貸倒懸念債権で学習した内容と異なる点は、貸倒設定率をかけない点です。<br>※実際には「1」をかけています。<br>(貸倒設定率を100%で計算)
<div class="f">
	!財務内容評価法!
	<strong>= (債権金額 - 担保処分見込額) <span class="cancel">&times; 貸倒設定率 </span></strong>
</div>
<?php footer(); ?>