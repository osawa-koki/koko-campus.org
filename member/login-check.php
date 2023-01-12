<?php
session_regenerate_id(true);

require(__DIR__. "/../functions.php");

if (isset($_SESSION["from_login"]) === false) {
	error("nosession");
}
unset($_SESSION["from_login"]);

$rec = connect_db('SELECT pw FROM member WHERE mail=?', [$_POST["email"]], true);
if (!$rec) {
	error("not-registered");
}
if (hash("sha512", $_POST["pw"]. "koko") !== $rec["pw"]) {
	error("auth-failed");
}
$_SESSION["login_matched"] = 1;
$_SESSION["email"] = $_POST["email"];
redirect("mypage");
?>