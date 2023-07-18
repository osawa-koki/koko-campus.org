<?php
session_regenerate_id(true);

require(__DIR__. "/../functions.php");

if (isset($_SESSION["reg"]) === false) {
	error("nosession");
}

$regexp_mail = "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/";

$email = mb_strtolower(htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8"));

if (isset($email) === false or preg_match($regexp_mail, $email) !== 1) {
	error("bad-regexp-mail");
}

$check0 = connect_db('SELECT mail FROM member WHERE mail=?', [$email], "mail");
$check1 = connect_db('SELECT mail FROM pre_member WHERE mail=?', [$email], "mail");

function registration_mail($email, $ran) {
	mb_language("ja");
	mb_internal_encoding("UTF-8");
	$title = "koko-campus pre-registration confirmation mail";
	$content = "click the url below and finish signing up!\r\n https://koko-campus.org/member/form.php?sid={$ran}";
	$headers = "From: register@koko-campus.org";
	if (!mb_send_mail($email, $title, $content, $headers)) {
		error("mail-send");
	} else {
		redirect("information?message=pre-register-done");
	}
}

if ($check0 !== 0) {
	error("already-registered");
} else {
	date_default_timezone_set("Asia/Tokyo");
	$now = date("Y-m-d H:i:s");
	$ran = get_random();
	if ($check1 !== 0) {
		connect_db('UPDATE pre_member SET random = ?, registration_date= ? WHERE mail=?', [$ran, $now, $email]);
	} else {
		connect_db('INSERT INTO pre_member (mail,random,registration_date) VALUES (?,?,?)', [$email, $ran, $now]);
	}
	registration_mail($email, $ran);
}
?>
