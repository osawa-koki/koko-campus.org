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
		<meta name="keywords" content="<?php echo urldecode($url[count($url) - 3]); ?>,koko-campus,ここキャンパス,ココキャンパス,ここ,ココ,koko" />
		<meta name="author" content="koko" />
		<title><?php echo urldecode($url[count($url) - 3]); ?></title>
		<link rel="icon" href="https://koko-campus.org/pics/ico1.png">
		<link rel="stylesheet" href="../../framework/ver2/style.css">
		<link rel="stylesheet" href="../../framework/ver2/frame.css">
		<link rel="stylesheet" href="part.css">
	</head>

	<body>
		<div id="header_adjustment"></div>
		<!-- ヘッダーメニューの作成 -->
		<header id="page_header">
			<a href="../../../index"><img id="logo" src="../../../pics/header.png" alt="koko-campus project"></a>
			<h1><?php echo urldecode($url[count($url) - 3]); ?></h1>
			<img id="menu_img" src="../../../pics/menu.png" alt="koko-campus menu">
		</header>
		<noscript>javascriptがブロックされています。<br>javascriptをonにして下さい。</noscript>
		<nav id="bread-crumb">
			<ol>
				<li><a href="../../../index">トップ</a></li>
				<li><a href="../index"><?php echo urldecode($url[count($url) - 3]); ?></a></li>
				<li><?php echo preg_replace("/[x|y|z]-/", "", urldecode($url[count($url) - 1])); ?></li>
			</ol>
		</nav><br>
		<table border="1" id="dt" class="norble">
			<tbody>
				<tr>
					<th>作成日</th>
					<td><time datetime="<?php echo $obj["made"]; ?>" itemprop="datepublished"><?php echo date("Y年m月d日", strtotime($obj["made"])); ?></time></td>
				</tr>
				<tr>
					<th>最終更新日</th>
					<td><time datetime="<?php echo $obj["updated"]; ?>" itemprop="modified"><?php echo date("Y年m月d日", strtotime($obj["updated"])); ?></time></td>
				</tr>
			</tbody>
		</table>
		<div id="wrapper" class="hidden">
			<div id="main">
	<?php
}
function footer() {
			?>
				<footer>
					<a id="to-back">前へ</a>
					<a id="to-top">トップへ</a>
					<a id="to-next">次へ</a>
				</footer>
			</div>
			<?php include("./menu.html"); ?>
		</div>
		<script charset="UTF-8" type="text/javascript" src="../../framework/ver2/entire.js" defer></script>
		<script charset="UTF-8" type="text/javascript" src="../../library/koko-code/ver2/koko-code.js" defer></script>
		</body>
	</html>
	<?php
}
?>