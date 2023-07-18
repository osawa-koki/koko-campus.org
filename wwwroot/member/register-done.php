<?php
session_regenerate_id(true);

require(__DIR__. "/../functions.php");

if (isset($_SESSION["pre_registered"]) === false || isset($_SESSION["over"]) === true) {
	error("nosession");
}

if (!preg_match("/^[ぁ-んァ-ン０-９a-zA-Z0-9\-]{3,10}$/", $_POST["name"])) {
	error("bad-data");
	exit();
} else if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_POST["email"])) {
	error("bad-data");
	exit();
}

date_default_timezone_set("Asia/Tokyo");
$now = date("Y-m-d-H-i-s");

$sql = 'INSERT INTO member(mail,name,registration_date,pw,last_login) VALUES (?,?,?,?,?)';
$data = [$_POST["email"], $_POST["name"], $now, $_POST["pw"], $now];
connect_db($sql, $data);
connect_db('DELETE FROM pre_member WHERE mail=?', [$_POST["email"]]);

$_SESSION["over"] = 1;
$_SESSION["login_matched"] = 1;
$_SESSION["email"] = $_POST["email"];

mb_language("ja");
mb_internal_encoding("UTF-8");

$title = "welcome to koko-campus project";
$content = "you have a url accessing login page down below \r\n http://koko-campus.org/member/login.php";
$headers = "From: confirmation@koko-campus.org";

if (!mb_send_mail($_POST["email"], $title, $content, $headers)) {
	system_log("unable to send mail". $_POST["email"]);
}
require("head.html");
?>

<h1>koko-campus<br />登録完了♪</h1>
<p><?php echo $_POST["name"]. 'さん、本会員登録が完了しました。';?></p>
<p>ご登録ありがとうございます。</p>
<p>一緒に勉強頑張りましょう♪</p>
<p>質問・相談等あれば<a href = "inquiry.php">問い合わせフォーム</a>からご連絡ください。</p>

<div class="center">
	<a id="button-to-mypage" href="mypage">マイページ</a>
</div>

<?php require("footer.html"); ?>