<?php
session_regenerate_id(true);

require(__DIR__. "/../functions.php");

if (!isset($_SESSION["login_matched"]) && !isset($_SESSION["login"])) {
	error("direct-to-mypage");
}
if (isset($_SESSION["login"]) === false) {
	$data = ["name", "registration_date", "subjects_onprogress", "subjects_passed"];
	$data_sql = implode(",", $data);
	$rec = connect_db('SELECT * FROM member WHERE mail=?', [$_SESSION["email"]], true);
	foreach ($data as $element) {
		$_SESSION[$element] = $rec[$element];
	}
	$_SESSION["subjects_onprogress"] = explode(",", $_SESSION["subjects_onprogress"]);
	$_SESSION["subjects_passed"] = explode(",", $_SESSION["subjects_passed"]);
	$_SESSION["login"] = 1;
	unset($_SESSION["login_matched"]);
	$last_login = connect_db('SELECT last_login FROM member WHERE mail=?', [$_SESSION["email"]], true)["last_login"];
}
require("head.html");
?>

<h1>koko-campus<br />マイページ</h1>
<span><?php echo $_SESSION["name"] ?>さん</span>

<?php require("footer.html"); ?>