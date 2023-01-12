<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8" />
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
		<main>
			<?php
			$date = isset($_GET["date"]) ? $_GET["date"] : "";
			$path = __DIR__. "/contents/". $date. ".html";
			if (file_exists($path)) {
				$contents = file_get_contents($path);
				preg_match("/{.*?}/s", $contents, $m);
				$json = json_decode($m[0], true);
				$title = $json["title"];
				$keywords = $json["keywords"];
				echo "<h1>{$title}</h1>";
				echo "<div id='hash-tag_container'>";
				foreach ($keywords as $k) {
					echo "<a href=index?keywords={$k}>#{$k}</a>";
				}
				echo "</div>";
				echo "<div id='contents'>". nl2br(preg_replace("/{.*?}/s", "", $contents, 1)). "</div>";
			} else {
				echo "<div id='contents'>データの取得に失敗しました。<br />戻るボタンから前のページへ戻ってください。</div>";
			}
			?>
			<div id="a-container">
				<?php
				if (file_exists($path)) {
					$files = array_map(function ($n) {
						preg_match("/\d+/", $n, $m);
						return $m[0];
					}, array_diff(scandir('./contents/'), array(".", "..", $date. ".html")));
					rsort($files);
					$arys = [];
					foreach ($files as $date) {
						$contents2 = file_get_contents(__DIR__. "/contents/". $date. ".html");
						preg_match("/{.*?}/s", $contents2, $m2);
						$json2 = json_decode($m2[0], true);
						$title2 = $json2["title"];
						$keywords2 = $json2["keywords"];
						foreach ($keywords2 as $k) {
							if (in_array($k, $keywords)) {
								$arys[] = [$date, $title2];
								break;
							}
						}
					}
					shuffle($arys);
					$arys = array_splice($arys, 0, 5);
					foreach ($arys as $ary) {
						$d = $ary[0];
						$t = $ary[1];
						echo "<a href='content?date={$d}'><span>{$t}</span><span>{$d}</span></a>";
					}
				}
				?>
			</div>
		</main>
		<footer></footer>
		<script charset = "UTF-8" type="text/javascript" src = "index.js" defer></script>
	</body>
</html>