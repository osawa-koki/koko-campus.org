<?php
require("head.html");
$message_type = array(
	"pre-register-done" => "仮会員登録が完了しました。<br />1時間以内にメールに添付されたURLをクリックして本会員登録を完了させて下さい。",
);
$message = $message_type[$_GET["message"]];
?>
<h1>koko-campus(message)</h1>
<p><?php echo $message; ?></p>
<?php require("footer.html"); ?>
