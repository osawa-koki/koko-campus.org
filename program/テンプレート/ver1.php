<?php
require(__DIR__. "/../common.php");
$obj = array(
	"made" => "2022-01-25",
	"updated" => "2022-01-25",
);
head($obj);
?>
<div id="v1">
	<h1></h1>
</div>
<script charset="utf-8" type="text/javascript" src="../../cdn/vue.js/2.6.14-dev.js" defer></script>
<script charset="utf-8" type="text/javascript" src="ver1.js" defer></script>
<?php footer(); ?>