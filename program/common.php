<?php
function head($obj) {
	$url = explode("/", $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']);
	?>
	<!DOCTYPE html>
	<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="email=no,telephone=no,address=no" />
		<meta name="keywords" content="koko-program,koko-campus,ここキャンパス,ココキャンパス,ここ,ココ,koko" />
		<meta name="author" content="koko" />
		<title><?php echo urldecode($url[count($url) - 2]). " - ". urldecode($url[count($url) - 1]); ?></title>
		<link rel="stylesheet" href="../style.css">
		<link rel="stylesheet" href="../framework.css">
		<link rel="stylesheet" href="part.css">
		<link rel="icon" href="https://koko-campus.org/pics/ico1.png">
	</head>

	<body>
		<header>
			<a href="../../index"><img id="logo" src="../../pics/header.png" alt="koko-campus project"></a>
			<h1><?php echo urldecode($url[count($url) - 2]); ?></h1>
			<img id="menu-img" src="../../pics/menu.png" alt="koko-campus menu">
		</header>
		<main>
			<noscript>javascriptがブロックされています。<br>javascriptをonにして下さい。</noscript>
			<nav>
				<ol id="breadcrumbs">
					<li><a href="../../index">トップ</a></li>
					<li><a href="../index">koko-program</a></li>
					<li><?php echo urldecode($url[count($url) - 2]) ?></li>
					<li><?php echo urldecode($url[count($url) - 1]) ?></li>
				</ol>
				<br />
				<ul id="datetime">
					<li><time datetime="<?php echo $obj["made"]; ?>" itemprop="datepublished"><?php echo date("Y年m月d日", strtotime($obj["made"])); ?></li>
					<li><time datetime="<?php echo $obj["updated"]; ?>" itemprop="modified"><?php echo date("Y年m月d日", strtotime($obj["updated"])); ?></li>
				</ul>
			</nav>
			<div id="wrapper" class="hidden">
				<div id="main">
	<?php
}
function footer() {
			?>
				</div>
				<div id="menu"></div>
			</div>
		</main>
		<footer></footer>
		<script charset="UTF-8" type="text/javascript" src="../entire.js" defer></script>
		</body>
	</html>
	<?php
}
?>