<?php



// ヘッダの読み込み
function include_head($ttl) {

	session_start();
	session_regenerate_id(true);

	// inclue元のファイル名を求めて、それに対応するcssファイルの読み込みを準備
	$from_where = debug_backtrace();
	$from_where = $from_where[0]["file"];
	$from_where = explode("/", "$from_where");
	$count = count($from_where);
	if ($count == 1) {
		$from_where = explode("\\", "$from_where[0]");
	}
	$from_where = end($from_where);
	$from_where = str_replace(".php", ".css", $from_where);

	?>

<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset ="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta name="format-detection" content="email=no,telephone=no,address=no" />
	<meta name="keywords" content="情報処理安全確保支援士試験,SC,情報セキュリティスペシャリスト,koko-campus,ココキャンパス,ここキャンパス,ココキャンパスプロジェクト,ここキャンパスプロジェクト,セキュリティ,セキュリティ対策,高度情報処理技術者試験" />
	<meta name="author" content="koko" />
	<title><?php echo $ttl; ?></title>
	<meta name = "description" content = "<?php echo $ttl; ?>" />
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="../menu.css">
	<link rel="stylesheet" href="../svg.css">
	<link rel="stylesheet" href="../math.css">
	<link rel="stylesheet" href="<?php echo $from_where; ?>">
</head>

<body>
	<div id = "header_adjustment"></div>

	<!-- ヘッダーメニューの作成 -->
	<header id = "page_header">
		<a href = "../../../index"><img id = "logo" src = "../../../pics/header.png" alt = "koko-campus project"></a>
		<img id = "menu_img" src = "../../../pics/menu.png" alt = "koko-campus menu">	
	</header>

	<?php

	include("menu.html");

	if ($_SESSION["subjects"] == "") {
		$subjects_array = array();
	} else {
		try {
			$subjects_array = explode(",", $_SESSION["subjects"]);
		} catch (Exception $e) {
		}
	}

	if ($_SESSION["passed"] == "") {
		$passed_array = array();
	} else {
		try {
			$passed_array = explode(",", $_SESSION["passed"]);
		} catch (Exception $e) {
		}
	}


	# ログインしているかどうかで処理を分岐
	if ($_SESSION["ok"] != 1) {
		$check = 3;
	} else if (in_array("情報処理安全確保支援士", $subjects_array)) {
		$check = 1;
	} else if (in_array("情報処理安全確保支援士", $passed_array)) {
		$check = 2;
	} else {
		$check = 4;
	}

	?>
	<div class = 'container'>
	<?php

	if ($check == 1 || $check == 2 || $check == 4) {
		
		?>

		<div class = "login_as">
			<p><strong><?php echo $_SESSION["name"]; ?>さんとしてログイン中です♪</strong></p>
		</div>

		<?php

	} else {

		?>
		
		<div class = "login_as">
			<p><strong>ゲスト様、ログインされていません。</strong></p>
			<p class = "paragraph">会員限定の便利な機能がたくさんあります♪<br>是非会員登録してくださいね♪<br>完全無料です!!!</p>
			<p>・会員登録は<a href = "../../../register?c=g">こちら</a>。</p>
			<p>・ログインは<a href = "../../../login?c=g">こちら</a>。</p>
		</div>

		<?php

	}
	?>
	</div>
	
	<h1><?php echo $ttl; ?></h1>
	<?php
}



// フッターの読み込み
function include_footer() {

	// inclue元のファイル名を求めて、それに対応するcssファイルの読み込みを準備
	$from_where = debug_backtrace();
	$from_where = $from_where[0]["file"];
	$from_where = explode("/", "$from_where");
	$count = count($from_where);
	if ($count == 1) {
		$from_where = explode("\\", "$from_where[0]");
	}
	$from_where = end($from_where);
	$from_where = str_replace(".php", ".js", $from_where);

	?>

		<script charset = "UTF-8" type="text/javascript" src = "../entire.js" defer></script>
		<script charset = "UTF-8" type="text/javascript" src = "../to.js" defer></script>
		<script charset = "UTF-8" type="text/javascript" src = "../menu.js" defer></script>
		<script charset = "UTF-8" type="text/javascript" src = "../swipe.js" defer></script>
		<script charset = "UTF-8" type="text/javascript" src = "../dd.js" defer></script>
		<script charset = "UTF-8" type="text/javascript" src = "../patch.js" defer></script>
		<script charset = "UTF-8" type="text/javascript" src = "<?php echo $from_where; ?>" defer></script>
		</body>
	</html>

	<?php
}

?>