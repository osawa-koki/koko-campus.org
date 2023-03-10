<?php
include("common.php");
head("繰延資産");
?>
<h2>繰延資産の概要</h2>
通常は費用として処理されますがその性質上、限りなく資産にも近いため資産として計上することも許容されているものを言います。<br><br>繰延資産の要件には以下の3つがあります。<br>
<div class="f">
	!繰延資産の要件!
	<ul>
		<li>すでに代価の支払が完了し、または支払義務が確定していること</li>
		<li>当該代価に対応する役務の提供を受けていること</li>
		<li>その効果が将来にわたって発現するものと期待されていること</li>
	</ul>
</div>
以上の3つが繰延資産の要件ですが、この要件を満たすすべての勘定を繰延資産として計上することが許されているのではなく、繰延資産として計上可能な項目は以下の5つに限定されています。<br>
<ol>
	<li>創立費</li>
	<li>開業費</li>
	<li>開発費</li>
	<li>株式交付費</li>
	<li>社債発行費等</li>
</ol><br>
<span class="r">
	!創立費!
	?会社設立よりも前に支出した株式発行費用を言います。?
</span><br>
<span class="r">
	!開業費!
	?会社設立後に支出した株式発行費用を言います。?
</span>
<h2>繰延資産の償却</h2>
繰延資産の償却方法は以下の通りです。
<table class="exp" border="1">
	<tbody>
		<tr>
			<th>創業費</th>
			<td rowspan="3">5年以内・定額法</td>
		</tr>
		<tr>
			<th>開業費</th>
		</tr>
		<tr>
			<th>開発費</th>
		</tr>
		<tr>
			<th>株式交付費</th>
			<td>3年以内・定額法</td>
		</tr>
		<tr>
			<th>社債発行費等</th>
			<td>社債の償還期間にわたって「利息法(原則)」または「定額法(例外)」で償却<br>(新株予約権の発行費は3年以内・定額法)</td>
		</tr>
	</tbody>
</table>
<?php footer(); ?>