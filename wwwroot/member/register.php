<?php
session_start();
session_regenerate_id(true);

require(__DIR__. "/tmpl/head.html");

$_SESSION["register"] = 0;
?>

<h1>koko-campus<br />会員登録ページ</h1>
<p>以下、テキストフォームにメールアドレスを入力してください。<br />入力内容をご確認の上、会員登録ボタンを押してください。<br />すぐに登録確認メールが届きます。メールに添付されているurlをクリックして登録を完了させて下さい。</p>
<table>
	<tbody>
		<tr>
			<td><input id="email-input" type="email" size="25" /></td>
			<td><input id="email-reset" type="reset" value="クリア"></td>
		</tr>
		<tr>
			<td colspan="2" class="center"><input id="email-button" type="button" value="仮会員登録" disabled/></td>
		</tr>
	</tbody>
</table>
<script type="text/javascript" charset="utf-8">
	"use strict";
	(() => {
		const
			grep_mail = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/,
			i = document.getElementById("email-input"),
			r = document.getElementById("email-reset"),
			b = document.getElementById("email-button")
		;
		i.addEventListener("input", function() {
			b.disabled = !(this.value.match(grep_mail));
		});
		b.addEventListener("click", function() {
			const m  = i.value;
			i.readOnly = true;
			this.disabled = true;
			const url = "register";
			const data = {
				"mail" : m,
				"date" : ""////////////////////////////////////////////
			};
			post_data = JSON.stringify(post_data);
			let data = {
				method: "POST",
				mode: "cors",
				headers: {
					"Accept": "application/json",
					"Content-Type": "application/json",
				}
			};
			data["body"] = post_data;
			fetch(url, data)
			.then((response) => response.json())
			.then((response) => {
				console.log(response);
			})
		});
	})();
</script>
<p>登録済みの方は<a href="login">こちら</a>からログインしてください。</p>



<?php require(__DIR__. "/tmpl/footer.html"); ?>
