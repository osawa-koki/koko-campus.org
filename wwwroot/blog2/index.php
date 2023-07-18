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
			<div id="select-box">
				<select id="kw-select">
					<option value="unselected">キーワードを選択してください。</option>
					<option>反出生主義</option>
					<option>生きる意味</option>
					<option>哲学</option>
					<option>プライベート</option>
					<option>就活</option>
					<option value="new">新着</option>
				</select>
				<script type="text/javascript" charset="utf-8">
					"use strict";
					(() => {
						const o = Array.from(document.getElementById("kw-select").children).filter(e => !e.value.match(/\w/));
						o.forEach(e => {
							e.value = e.textContent;
						});
					})();
				</script>
				<div id="kw-button">検索</div>
				<script type="text/javascript" charset="utf-8">
					"use strict";
					(() => {
						document.getElementById("kw-button").addEventListener("click", () => {
							const obj = document.getElementById("kw-select"),
								v = obj.value;
							if (v === "unselected") {
								obj.style.color = "red";
								setTimeout(() => {
									obj.style.color = "";
								}, 1000);
							} else if (v === "all") {
								location.href = "?all";
							} else if (v === "new") {
								location.href = "index";
							} else {
								location.href = `?keywords=${v}`;
							}
						});
					})();
				</script>
			</div>
			<div id="a-container">
				<?php
				$files = array_map(function ($n) {
					preg_match("/\d+/", $n, $m);
					return $m[0];
				}, array_diff(scandir(__DIR__. "/contents/"), array(".", "..")));
				rsort($files); //ファイル名(日付)を整列(省略してもok!)
				$q_string = []; //クエリストリング用
				if (!isset($_GET["page"])) {
					$page = 0;
				} else {
					if (is_numeric($_GET["page"])) {
						$page = (int)$_GET["page"] - 1;
					} else {
						$page = 0;
					}
				}
				$a_array = []; // [日付, タイトル]の順で
				if (isset($_GET["keywords"])) { // keywords指定
					$check = false;
					$q_string[] = "keywords=". $_GET["keywords"];
					echo "<div class='title'>{$_GET["keywords"]}</div>";
					foreach ($files as $key) {
						$contents = file_get_contents(__DIR__. "/contents/". $key. ".html");
						preg_match("/{.*?}/s", $contents, $m);
						$json = json_decode($m[0], true);
						$title = $json["title"];
						$keywords = $json["keywords"];
						if (in_array($_GET["keywords"], $keywords)) {
							$check = true;
							$a_array[] = [$key, $title];
						}
					}
				} else {
					echo "<div class='title'>新着</div>";
					foreach ($files as $key) {
						$contents = file_get_contents(__DIR__. "/contents/". $key. ".html");
						preg_match("/{.*?}/s", $contents, $m);
						$json = json_decode($m[0], true);
						$title = $json["title"];
						$keywords = $json["keywords"];
						$a_array[] = [$key, $title];
					}
				}
				$f10 = array_splice($a_array, $page * 5, $page * 5 + 5);
				if (0 < count($f10)) {
					foreach ($f10 as $key) {
						echo "<a href='content?date={$key[0]}'><span>{$key[1]}</span><span>{$key[0]}</span></a>";
					}
				} else {
					echo "検索結果がありません。";
				}
				echo "<div id='page-button_div'>";
					$q_string_ = "?". implode("&", $q_string). "&";
					if ($page === 0) {
						echo "<a href='cancel'>前へ</a>";
					} else {
						$button_back = $q_string_. "page=". (string)($page);
						echo "<a href='{$button_back}'>前へ</a>";
					}
					if ($page < count($a_array) / 5) {
						$button_next = $q_string_. "page=". (string)($page + 2);
						echo "<a href='{$button_next}'>次へ</a>";
					} else {
						echo "<a href='cancel'>次へ</a>";
					}
				echo "</div>";
				?>
			</div>
		</main>
		<footer></footer>
	</body>
</html>