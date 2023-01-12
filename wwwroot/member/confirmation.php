<?php
session_regenerate_id(true);

require(__DIR__. "/../functions.php");

if (!isset($_SESSION["pre_registered"])) {
	error("nosession");
}

$name=htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$email=htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$hashed_pw=hash("sha512", $_POST["pw"]. "koko");
require("head.html");
?>
<h1>koko-campus<br />登録内容確認</h1>
<form action="register-done" method="post">
	<table class="center" border="1">
		<tr>
			<td>ニックネーム</td>
			<td><?php echo $name;?></td>
		</tr>
		<tr>
			<td>メールアドレス</td>
			<td><?php echo $email;?></td>
		</tr>
		<tr>
			<td>パスワード</td>
			<td>非表示(暗号化済)</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="登録する"></td>
		</tr>
	</table>

	<input type="hidden" name="name" value="<?php echo $name;?>">
	<input type="hidden" name="email" value="<?php echo $email;?>">
	<input type="hidden" name="pw" value="<?php echo $hashed_pw;?>">
</form>

<?php require("footer.html"); ?>