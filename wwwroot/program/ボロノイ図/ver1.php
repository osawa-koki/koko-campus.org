<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-25",
	"updated" => "2022-01-25",
);
head($obj);
?>
<div id="v1">
	<div class="center">
		<h2>ボロノイ図♪♪♪</h2>
		<br />
		<div class="scroll">
			<canvas width="500" height="500"></canvas>
		</div>
		<br />
		<div id="v1-btn">スタート♪</div>
	</div>
</div>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>