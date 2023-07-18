<?php
function header() {
	?>
	<!DOCTYPE html>
	<html lang = "ja">
		<head>
			<meta charset ="utf-8" />
			<title>koko-campus</title>
			<meta name="viewport" content="width=device-width,initial-scale=1" />
			<meta name="format-detection" content="email=no,telephone=no,address=no" />
			<meta name="keywords" content="koko-campus,ココキャンパス,ここキャンパス,ココキャンパスプロジェクト,ここキャンパスプロジェクト" />
			<meta name="author" content="koko" />
			<meta name = "description" content = "バーチャルキャンパスを運営しています。ITから会計・統計学など幅広い情報を発信しています。" />
			<link rel="shortcut icon" href="pics/thumbnail-img.png" type="image/x-icon">
			<link rel="stylesheet" href="style.css">
			<link rel = "stylesheet" href = "https://koko-campus.org/style.css">
			<meta property="og:title" content="koko-campus project" />
			<meta property="og:description" content="koko-campus project" />
			<meta property="og:type" content="koko-campus project" />
			<meta property="og:url" content="https://koko-campus.org" />
			<meta property="og:image" content="https://koko-campus.org/pics/thumbnail-img.png" />
			<meta property="og:site_name" content="koko-campus" />
			<meta property="og:locale" content="ja_JP"  />
		</head>
		<body>
			<header>
				<a href="https://koko-campus.org"><img id="logo" src="./pics/header.png" alt="koko-campus project"></a>
			</header>
	<?php
}
function footer() {
	?>
	</body>
</html>
	<?php
}
?>