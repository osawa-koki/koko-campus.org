<!DOCTYPE html>
<html lang = "ja">
	<head>
		<meta charset ="utf-8" />
		<title>今日のエラー</title>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="email=no,telephone=no,address=no" />
		<meta name="keywords" content="koko-campus,ココキャンパス,ここキャンパス,ココキャンパスプロジェクト,ここキャンパスプロジェクト" />
		<meta name="author" content="koko" />
		<meta name = "description" content = "プログラミング中に出会ったエラーとの思い出話について語ります。" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<header>
			<a href="../index"><img id="logo" src="pics/header.png" alt="koko-campus project"></a>
		</header>
		<?php
		$json = json_decode(file_get_contents(__DIR__. "/contents.json"), true);
		$assoc_dates = array_keys($json);
		rsort($assoc_dates); //ファイル名(日付)を整列(省略してもok!)
		if (isset($_GET["date"]) && in_array($_GET["date"], $assoc_dates)) { //日付がクエリストリングで指定されて、かつそのデータがあれば、、、
			$date = $_GET["date"]; //その日のデータを...
		} else { //何も指定されていなかったら、、、
			$date = $assoc_dates[0]; //最新のデータを...
		}
	
		$contents = $json[$date];
		echo "<div id='contents'>";
		echo "<h1>今日のエラー</h1>";
		echo "<div class='error-box_separator'></div>";
			echo "<div id='error-box'>";
				echo "<div id='error-language'><div>言語</div>{$contents['language']}</div>";
				echo "<div id='error-package'><div>パッケージ</div>{$contents['package']}</div>";
				echo "<div id='error-code'><div>エラーコード</div>{$contents['error-code']}</div>";
				echo "<div id='error-explanation'><div>説明</div>{$contents['explanation']}</div>";
			echo "</div>";
			echo "<div class='error-box_separator'></div>";
		echo "</div>";
		?>
		<div id="button-div">
			<?php
			$idx = array_search($date, $assoc_dates);
			$dates_random = $assoc_dates;
			shuffle($dates_random);
			?>
			<a href="<?php echo ($idx !== count($assoc_dates) - 1) ? "index?date=". $assoc_dates[$idx + 1] : "no"; ?>">back</a>
			<a href="index?date=<?php echo $dates_random[0]; ?>">random</a>
			<a href="<?php echo ($idx !== 0) ? "index?date=". $assoc_dates[$idx - 1] : "no"; ?>">next</a>
		</div>
		<footer></footer>
		<script charset = "UTF-8" type="text/javascript" src = "index.js" defer></script>
	</body>
</html>