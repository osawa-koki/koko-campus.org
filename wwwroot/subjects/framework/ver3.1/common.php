<?php
function head($obj) {
	$url = explode("/", $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']);
	$title = urldecode($url[count($url) - 3]);
	$file = urldecode($url[count($url) - 1]);
	$file = preg_replace("/\?.*/", "", $file);
	?>
	<!DOCTYPE html>
	<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="email=no,telephone=no,address=no" />
		<meta name="keywords" content="<?php echo $title; ?>,koko-campus,ここキャンパス,ココキャンパス,ここ,ココ,koko" />
		<meta name="author" content="koko" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="../../framework/ver3.1/style.css">
		<link rel="stylesheet" href="part.css">
		<link rel="icon" href="https://koko-campus.org/pics/ico1.png">
	</head>
	<body>
		<header>
			<a href="../../../index"><img id="logo" src="../../../pics/header.png" alt="koko-campus project"></a>
			<h1><?php echo $title; ?></h1>
			<img id="menu-img" src="../../../pics/menu.png" alt="koko-campus menu">
		</header>
		<nav>
			<ol>
				<li><a href="../../../index">トップ</a></li>
				<li><a href="../index"><?php echo $title; ?></a></li>
				<li><?php echo $file; ?></li>
			</ol>
			<br />
			<ul>
				<li><?php echo $obj["made"]; ?></li>
				<li><?php echo $obj["updated"]; ?></li>
			</ul>
		</nav>
		<div id="wrapper">
			<noscript>javascriptがオフになっています。<br />javascriptをオンに設定してください。</noscript>
			<main>
	<?php
}
function footer() {
			?>
				<footer>
					<a class="footer-button">前へ</a>
					<a class="footer-button">トップへ</a>
					<a class="footer-button">次へ</a>
				</footer>
			</main>
			<aside>
				<?php include("menu.html"); ?>
			</aside>
		</div>
		<script charset = "UTF-8" type="text/javascript" src = "../../framework/ver3.1/entire.js" defer></script>
		<script charset = "UTF-8" type="text/javascript" src = "entire.js" defer></script>
		<script charset="utf-8" src="../../../package/js-modules/koko-code/ver1.js" defer></script>
		</body>
	</html>
	<?php
}
?>