<?php
include("common.php");
head("B/S基礎知識(商)");
?>
<h2>B/Sの仕組み</h2>
<div class="scroll_x">
	<div id="bs-shikumi" class="nowrap">
		<div>
			<span>
				資産
				<span>流動資産</span>
				<span>
					固定資産
					<span>
						<span>有形固定資産</span>
						<span>無形固定資産</span>
						<span>投資その他の資産</span>
					</span>
				</span>
				<span>繰延資産</span>
			</span>
		</div>
		<div>
			<span>
				負債
				<span>流動負債</span>
				<span>固定負債</span>
			</span>
			<span>
				純資産
				<span>
					株主資本
					<span>資本金</span>
					<span>
						資本剰余金
						<span>資本準備金</span>
						<span>その他資本剰余金</span>
					</span>
					<span>
						利益剰余金
						<span>利益準備金</span>
						<span>その他利益剰余金</span>
					</span>
					<span>自己株式</span>
				</span>
				<span>その他有価証券評価差額金</span>
				<span>新株予約権</span>
			</span>
		</div>
	</div>
</div>
<h2>流固分類</h2>
<p>資産・負債を流動資産(負債)と固定資産(負債)に分類することを言います。<br><br>最初に「<strong>正常営業循環基準</strong>」に該当するものを流動資産(負債)として、該当しないものでも「<strong>一年基準</strong>」を満たすものを流動資産(負債)とします。</p>
<span class="r">
	!正常営業循環基準!
	?通常の営業活動(商品売買活動)において使用する資産(負債)かどうかの判定?
</span><br>
<span class="r">
	!一年基準!
	?一年以内に回収・決済するかどうかの判定?
</span>
<div class="f">
	!経過勘定の流固分類!
	<span class="u">前払費用のみ一年基準によって流固分類</span>をして、それ以外(前受収益・未収収益・未払費用)は常に流動項目に分類します。
</div>

<?php footer(); ?>