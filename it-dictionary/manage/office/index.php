<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="robots" content="noindex">
		<title>管理者画面(IT dict)</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>管理者画面(IT dict)</h1>
			<form method="post">
				<?php
				if (isset($_POST["token"]) && $_POST["token"] === "KoKoCampus1010!") {
					echo "<input type='hidden' name='token' value='KoKoCampus1010!' />";
					if (isset($_POST["system"])) {
						require(__DIR__. "/access-ristricted/update-metadata.php");
						?>
						<script type="text/javascript" charset="utf-8">
							"use strict";
							(() => {
								window.alert("メタデータの更新完了!!");
							})();
						</script>
						<?php
					}
					if (true) {
						?>
						<select id="system-select" name="system">
							<script type="text/javascript" charset="utf-8">
								"use strict";
								(() => {
									const select = document.getElementById("system-select"),
										system_list = {
											"update-metadata": "メタデータの更新",
											"register-word": "用語の登録"
										};
									for (let [key, value] of Object.entries(system_list)) {
										const element = document.createElement("option");
										element.value = key;
										element.textContent = value;
										select.appendChild(element);
									}
								})();
							</script>
							<input type="submit" value="決定" />
						</select>
						<?php
					}
					
				} else {
					require(__DIR__. "/access-ristricted/enter-token.html");
				}
				?>
			</form>
		</div>
	</body>
</html>
