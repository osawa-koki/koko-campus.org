<?php
session_regenerate_id(true);

$_SESSION["pre_registered"] = 1;
unset($_SESSION["over"]);

require(__DIR__. "/../functions.php");


if (isset($_GET["sid"]) === false) {
	error("nosession");
} else if (mb_strlen($_GET["sid"]) < 30) {
	error("sid-broken");
}

$rec = connect_db('SELECT * FROM pre_member WHERE random=?', [$_GET["sid"]], true);

if ($rec === 0) {
	error("no-sid");
} else if (date("Y-m-d H:i:s") < $rec["registration_date"]) {
	error("time-collapse");;
} else if (date("Y-m-d H:i:s",strtotime("-1 hour")) > $rec["registration_date"]) {
	error("sid-expired");
}
require("head.html");
?>

<h1>koko-campus<br />本会員登録ページ</h1>
<p>ニックネームとパスワードを入力して下さい。</p>
<p>パスワードはセキュリティ強化のため、暗号化されて保存されます。</p>
<form action = "confirmation" method = "post">
	<table class="center" border="1">
		<tr>
			<td>ニックネーム</td>
			<td><input id="form-name" type = "text" name = "name" placeholder = "ニックネーム" class="data-validation" minlength="3" maxlength="10" pattern="^[ぁ-んァ-ン０-９a-zA-Z0-9\-]{3,10}$" required></td>
		</tr>
		<tr>
			<td>メールアドレス</td>
			<td><input type = "text" name = "email" value = "<?php echo $rec["mail"]; ?>" readonly></td>
		</tr>
		<tr>
			<td>パスワード</td>
			<td><input id="form-pw" type = "password" name = "pw" placeholder = "パスワード" class="data-validation" minlength="8" maxlength="15" pattern="^[a-zA-Z0-9]{8,15}$" required></td>
		</tr>
		<tr>
			<td>パスワード(再入力)</td>
			<td><input id="form-pw_check" type = "password" name = "pw_check" placeholder = "パスワード(再入力)" class="data-validation" minlength="8" maxlength="15" pattern="^[a-zA-Z0-9]{8,15}$" required></td>
		</tr>
		<tr>
			<td colspan="2"><input id="submit" type = "submit" value = "登録" disabled></td>
		</tr>
	</table>
</form>
<table style="margin: 25px 0;">
	<tbody>
		<tr>
			<td><div class="validation_mark"></div></td>
			<td class="left">ニックネームは「3-10」文字で、ひらがな・英数字が使用可能です。</td>
		</tr>
		<tr>
			<td colspan="2" class="validation_mark-dummy"></td>
		</tr>
		<tr>
			<td><div class="validation_mark"></div></td>
			<td class="left">パスワードは「8-15」文字で、英数字のみ使用可能です。</td>
		</tr>
		<tr>
			<td colspan="2" class="validation_mark-dummy"></td>
		</tr>
		<tr>
			<td><div class="validation_mark"></div></td>
			<td class="left">パスワード2つは同じである必要があります。</td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
	Array.from(document.getElementsByClassName("data-validation")).forEach(function(e) {
		e.addEventListener("input", function() {
			document.getElementById("submit").disabled = (data_check()) ? false : true;
		});
	});
	function data_check() {
		let name = document.getElementById("form-name").value;
		let pw = document.getElementById("form-pw").value;
		let pw_check = document.getElementById("form-pw_check").value;
		let validation_mark = document.getElementsByClassName("validation_mark");
		let ok_flag = true;
		if (name.match(/^[ぁ-んァ-ン０-９a-zA-Z0-9\-]{3,10}$/)) {
			validation_mark[0].textContent = "ok!";
			validation_mark[0].style.backgroundColor = "skyblue";
		} else {
			validation_mark[0].textContent = "ng";
			validation_mark[0].style.backgroundColor = "lightgrey";
			ok_flag = false;
		}
		if (pw.match(/^[a-zA-Z0-9]{8,15}$/) && pw_check.match(/^[a-zA-Z0-9]{8,15}$/)) {
			validation_mark[1].textContent = "ok!";
			validation_mark[1].style.backgroundColor = "skyblue";
		} else {
			validation_mark[1].textContent = "ng";
			validation_mark[1].style.backgroundColor = "lightgrey";
			ok_flag = false;
		}
		if (pw === pw_check) {
			validation_mark[2].textContent = "ok!";
			validation_mark[2].style.backgroundColor = "skyblue";
		} else {
			validation_mark[2].textContent = "ng";
			validation_mark[2].style.backgroundColor = "lightgrey";
			ok_flag = false;
		}
		return ok_flag;
	}
</script>

<?php require("footer.html"); ?>
