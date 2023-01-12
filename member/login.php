<?php
session_regenerate_id(true);

require(__DIR__. "/../functions.php");

$_SESSION["from_login"] = 1;

$now=date("G");

if (4 <= $now && $now <= 10) {
	$greet="おはようございます! 今日も一日頑張りましょう!";
} else if (11 <= $now && $now <=16) {
	$greet="こんにちは! Let's study です!!!";
} else if (17 <= $now && $now <= 21) {
	$greet="こんばんは! 今日も一日お疲れ様でした。 一日の最後に勉強、頑張りましょう!";
} else {
	$greet="夜遅くまでお疲れ様です。 体調に気を付けて頑張って下さいね。";
}
require("head.html");
?>

<h1>koko-campus<br />ログインページ</h1>
<p><?php print $greet;?></p>
<form action="login-check" method="post">
	<table border="1" class="center">
		<tr>
			<td>メールアドレス</td>
			<td><input id="email-form" type="text" name="email" placeholder="メールアドレス" class="data-validation" pattern="^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$" required></td>
		</tr>
		<tr>
			<td>パスワード</td>
			<td><input id="pw-form" type="password" name="pw" placeholder="パスワード" class="data-validation" pattern="^[a-zA-Z0-9]{8,15}$/) && pw_check.match(/^[a-zA-Z0-9]{8,15}$" required></td>
		</tr>
		<tr>
			<td colspan="2"><input id="submit" type="submit" value="ログイン" disabled></td>
		</tr>
	</table>
</form>
<p>会員登録がまだの方は<a href="register">こちら</a>。</p>
<p>トップページは<a href="index">こちら</a>。</p>

<script type="text/javascript">
	Array.from(document.getElementsByClassName("data-validation")).forEach(function(e) {
		e.addEventListener("input", function() {
			document.getElementById("submit").disabled = (data_check()) ? false : true;
		});
	});
	function data_check() {
		let email = document.getElementById("email-form").value;
		let pw = document.getElementById("pw-form").value;
		let ok_flag = true;
		if (!email.match(/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/)) {
			ok_flag = false;
		}
		if (!pw.match(/^[a-zA-Z0-9]{8,15}$/)) {
			ok_flag = false;
		}
		return ok_flag;
	}
</script>

<?php require("footer.html"); ?>