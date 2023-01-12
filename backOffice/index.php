<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>koko-campus管理者画面</title>
	<link rel="stylesheet" href="style.css">
	<meta name="robots" content="none">
</head>
<body>
	<?php
	require(__DIR__. "/../define-token.php");
	if (isset($_POST["token"]) && $_POST["token"] === TXT_TOKEN) {
		require(__DIR__. "/denied/OK.php");
	} else {
		require(__DIR__. "/denied/NG.html");
	}
	?>
</body>
</html>