<?php
include("common.php");
head("連結会計(持分プーリング法)");
?>
<h2>持分法の意義</h2>
被投資会社の純資産額および損益のうち、投資会社に帰属する部分の変動に応じて投資額を修正する方法を言います。
<h2>持分法の適用範囲</h2>
持分法は以下の2つの会社に対して適用することが要求されます。<br>
<ul>
	<li>非連結子会社</li>
	<li>関連会社</li>
</ul><br>
<table>
	<thead>
		<tr>
			<td width="50%">非連結子会社</td>
			<td width="50%">関連会社</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="left"><p>連結範囲の基準で子会社と判定されたものの、重要性の基準等により連結の範囲から除かれた子会社を言います。</p></td>
			<td class="left"><p>ある企業が重要な経営方針を決定する権利を持っている子会社以外の会社を言います。</p>(<strong>影響力基準</strong>で判定)</td>
		</tr>
	</tbody>
</table>
<h2>持分法での会計処理</h2>
<h3>持分法の原則</h3>
原則として投資勘定の増加・減少で処理します。<br>(相手科目は<strong>持分法による投資損益</strong>)
<h3>株式取得時の処理</h3>
<table>
	<thead>
		<tr>
			<td width="50%">非連結子会社</td>
			<td width="50%">関連会社</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="left"><strong>全面時価評価法</strong><p>被投資会社の資産・負債のすべてを時価評価します。</p></td>
			<td class="left"><strong>部分時価評価法</strong><p>被投資会社のうち投資会社の持分に応じた部分のみ時価評価します。</p></td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>