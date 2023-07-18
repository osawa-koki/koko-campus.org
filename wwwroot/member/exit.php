<?php
session_regenerate_id(true);

if ($_SESSION["ok"] != 1) {
	?>
	<script type = "text/javascript">
	window.alert("不正ログインを検知しました。\nエラーコード304\nログイン画面から再度ログインしてください。");
	</script>
	<?php
	print "エラーコード304<br>";
	print "ログインページは<a href = 'login.php'>こちら</a>。<br>";
	print "エラーコードの確認は<a href = 'error.php'>こちら</a>。";
	$_SESSION = array();
	session_destroy();
	exit();

}

$now = date("G");

if (4 <= $now && $now <= 10) {
	$msg = "今日も一日頑張って下さいね♪";
} else if (11 <= $now && $now <=16) {
	$msg = "また夕方戻ってきて下さいね♪";
} else if (17 <= $now && $now <= 21) {
	$msg = "しっかりと休憩をとってくださいね♪";
} else {
	$msg = "おやすみなさいzzZ";
}

?>
<script type = "text/javascript">
window.alert('<?php print $_SESSION["name"];?>さん、勉強お疲れ様でした。\n<?php print $msg;?>\n\n私はphpプログラム上で<?php print $_SESSION["name"]?>さんの帰りを待っています♪♪♪');
</script>
<?php

$_SESSION = array();
session_destroy();

?>

<?php require("head.html"); ?>

<script type="text/javascript">
	window.location.href = "index";
</script>

<?php require("footer.html"); ?>