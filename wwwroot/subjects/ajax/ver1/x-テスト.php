<?php
require(__DIR__. "/../../framework/ver2/common.php");
$obj = array(
	"title" => "test",
	"made" => "2021-10-20",
	"updated" => "2021-10-5"
);
head($obj);
?>
<h2>セクションタイトル</h2>
ここ
<pre>
	<code class="js">
		function let ok
		js
		=
	</code>
</pre>
<pre>
	<code class="php">
		function let ok
		php
	</code>
</pre>
<script type="text/javascript" src="../../library/koko-code/ver2/koko-code.js" defer></script>
<script type="text/javascript">
	let p = new Promise((ok, ng) => {
		ok("ok!!!");
	});
	console.log(p);
</script>

<?php footer(); ?>