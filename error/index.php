<?php
require("head.html");
$error_message = array(
	"nosession" => "不正なページ遷移を検知しました。<br />新規会員登録ページからもう一度登録してください。",
	"bad-regexp-mail" => "メールアドレスの形式が不正です。<br />正しいメールアドレスを入力してください。",
	"mail-send" => "メールの送信に失敗しました。<br />お手数をおかけしますが、最初からやり直してください。",
	"already-registered" => "入力されたメールアドレスは既に登録済みです。<br />ログインページからログインして下さい。",
	"db" => "データベースにおいて障害が発生しております。<br />ご迷惑をおかけして申し訳ございません。",
	"no-sid" => "URLが不正です。<br />もう一度仮会員登録をしてください。",
	"time-collapse" => "サーバー内部で障害が発生しております。<br />お手数をおかけしますが、もう少しお待ちください。",
	"sid-expired" => "URLの有効期限が切れています。<br />もう一度仮会員登録をしてください。",
	"sid-broken" => "URLが破損しています。<br />もう一度仮会員登録をして下さい。",
	"bad-data" => "入力内容に不備があります。<br />もう一度仮会員登録をして下さい。",
	"auth-failed" => "認証に失敗しました。<br />メールアドレス・パスワードをよく確認してもう一度ログインしてください。",
	"not-registered" => "入力されたメールアドレスは登録されていません。<br />会員登録を完了させてください。",
	"direct-to-mypage" => "マイページへのアクセスはログインを完了させる必要があります。",
	"forbidden-access-to-devtool" => "devtoolはkoko専用のツールです。",
);
if (isset($_GET["error-type"])) {
	$message = $error_message[$_GET["error-type"]];
} else {
	$message = "unknown error";
}
?>
<h1>koko-campus<br />(エラーページ)</h1>
<p><?php echo $message; ?></p>
<?php
require("footer.html");
?>
