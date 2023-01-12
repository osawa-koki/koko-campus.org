<!DOCTYPE html>
<html lang = "ja">
	<head>
		<meta charset ="utf-8" />
		<title>kokoのブログ</title>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="email=no,telephone=no,address=no" />
		<meta name="keywords" content="koko-campus,ココキャンパス,ここキャンパス,ココキャンパスプロジェクト,ここキャンパスプロジェクト" />
		<meta name="author" content="koko" />
		<link rel="shortcut icon" href="../pics/thumbnail-img.png" type="image/x-icon" />
		<link rel="stylesheet" href="index.css" />
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
			<a href="../index"><img id="logo" src="../pics/header.png" alt="koko-campus project"></a>
			<span>kokoのブログ</span>
		</header>
		<div id="url"></div>
		<?php
		$files = array_map(function ($n) {
			preg_match("/\d+/", $n, $m);
			return $m[0];
		}, array_diff(scandir('./contents/'), array(".", "..")));
		rsort($files); //ファイル名(日付)を整列(省略してもok!)
		if (isset($_GET["date"])) { //日付がクエリストリングで指定されていたら、、、
			if (in_array($_GET["date"], $files)) { //かつそのデータが存在したら、、、
				$date = $_GET["date"]; //その日のデータを...
			} else { //日付が存在しなかったら、、、
				$date = $files[0]; //最新のデータを...
			}
		} else { //何も指定されていなかったら、、、
			$date = $files[0]; //最新のデータを...
		}
		$contents = file_get_contents(__DIR__. "/contents/". $date. ".html");
		$date_to_show = mb_substr($date, 0, 4). "年". mb_substr($date, 4, 2). "月". mb_substr($date, 6, 2). "日";
		echo "<div id='this-blog'><span id='blog-date'>{$date_to_show}</span>のブログ<br /><br />url<input id='blog-url' type='text' value='https://koko-campus.org/blog/index?date={$date}' readonly><span id='copy'>コピー</span></div>";
		echo "<div id='contents'>". $contents. "</div>";
		?>
		<div id="button-div">
			<?php
			$idx = array_search($date, $files);
			$files_random = $files;
			shuffle($files_random);
			?>
			<a href="<?php echo ($idx !== count($files) - 1) ? "index?date=". $files[$idx + 1] : "no"; ?>">前の記事へ</a>
			<a href="index?date=<?php echo $files_random[0]; ?>">ランダムで</a>
			<a href="<?php echo ($idx !== 0) ? "index?date=". $files[$idx - 1] : "no"; ?>">次の記事へ</a>
		</div>
		<footer></footer>
		<script charset = "UTF-8" type="text/javascript" src = "index.js" defer></script>
	</body>
</html>