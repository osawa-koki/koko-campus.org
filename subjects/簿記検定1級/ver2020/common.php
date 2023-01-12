<?php
function head($arg) {
	?>
	<!DOCTYPE html>
	<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="email=no,telephone=no,address=no" />
		<meta name="keywords" content="簿記検定1級,簿記検定,koko-campus,ここキャンパス,ココキャンパス,ここ,ココ,koko" />
		<meta name="author" content="koko" />
		<title><?php echo $arg; ?></title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="part.css">
		<link rel="stylesheet" href="color.css">
		<link rel="stylesheet" href="size.css">
	</head>

	<body>
		<div id="header_adjustment"></div>
		<!-- ヘッダーメニューの作成 -->
		<header id="page_header">
			<a href="../../../index"><img id="logo" src="../../../pics/header.png" alt="koko-campus project"></a>
			<div id="ttl"><span id="ttl_span">&nbsp;<?php echo $arg; ?>&nbsp;</span></div>
			<img id="menu_img" src="../../../pics/menu.png" alt="koko-campus menu">
		</header>
		<noscript>javascriptがブロックされています。<br>javascriptをonにして下さい。</noscript>
		<div id="js" class="hidden">
			<div id="super_main">
				<div id="main">
					<div id="main_div">
	<?php
}
function footer() {
			?>
					</div>
				</div>
				<?php include("menu.html"); ?>
				<div id="board">
					<div id="board_sub">
						<div id="chalk"></div>
						<div id="eraser"></div>
						<div id="board_content"></div>
					</div> 
				</div>
			</div>
		</div>
		<script charset = "UTF-8" type="text/javascript" src = "./entire.js" defer></script>
		</body>
	</html>
	<?php
}