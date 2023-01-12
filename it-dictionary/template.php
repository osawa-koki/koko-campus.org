<?php

function head() {
	?>
	<!DOCTYPE html>
	<html lang="ja">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>IT Dictionary</title>
			<link rel="stylesheet" href="style.css">
		</head>
		<body>
			<header>
				<a href="../index"><img id="logo-img" src="pics/logo.png" alt="ロゴ" /></a>
				<div id="kaomoji">\\\(*_*)♪</div>
				<img id="menu-img" src="../pics/menu.png" alt="メニュー画像" />
				<script type="text/javascript" charset="utf-8">
					"use strict";
					window.addEventListener("load", () => {
						const menu_div = document.getElementsByTagName("section")[0];
						let menu_open = false;
						document.getElementById("menu-img").addEventListener("click", function() {
							if (window.innerWidth <= 700) {
								if (!menu_open) {
									this.style.transform = "rotate(360deg)";
									setTimeout(() => {
										menu_div.style.display = "block";
									}, 200);
								} else {
									this.style.transform = ""; 
									setTimeout(() => {
										menu_div.style.display = "";
									}, 100);
								}
								menu_open = !menu_open;
							}
						});
					});
				</script>
			</header>
			<div id="wrapper">
				<div id="container">
					<main>
	<?php
}

function footer() {
	?>
					</main>
					<section>
						<!-- 検索機能 -->
						<form action="?search" method="post">
							<table border="1">
								<tbody>
									<tr>
										<th>キーワード</th>
										<td><input type="text" name="keyword" /></td>
									</tr>
									<tr>
										<th>カテゴリ</th>
										<td>
											<select name="category">
												<option value="all">全て</option>
												<?php
												// オプションの表示
												$options_json_str = file_get_contents(__DIR__. "/manage/master-data/category.json");
												$option_array = json_decode($options_json_str, true);
												foreach ($option_array as $category) {
													echo "<option value='{$category}'>{$category}</option>";
												}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<th>重要度</th>
										<td>
											<div id="importance-td_div">
												<input id="importance-to-submit" type="hidden" name="importance" value="5" />
												<div id="star-box">
													<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<defs>
															<linearGradient id="shine" x1="20" x2="2.8" y1="20" y2="-1.5" gradientUnits="userSpaceOnUse">
																<stop stop-color="#ff0" stop-opacity=".6" offset="0"/>
																<stop stop-color="#ffff7d" offset=".35"/>
																<stop stop-color="#fff" offset=".4"/>
																<stop stop-color="#ffff7d" offset=".5"/>
																<stop stop-color="#ff0" offset="1"/>
															</linearGradient>
														</defs>
													</svg>
													<?php
													for ($i = 0; $i < 5; $i++) {
														require(__DIR__. "/pics/star.svg");
													}
													?>
													<script type="text/javascript" charset="utf-8">
														"use strict";
														(() => {
															const stars_containers = Array.from(document.getElementById("star-box").getElementsByClassName("star-path_container")),
																stars = Array.from(document.getElementById("star-box").getElementsByClassName("star-path")),
																importance_input = document.getElementById("importance-to-submit");
															function star_clicked() {
																const index_n = stars_containers.indexOf(this);
																importance_input.value = index_n + 1;
																let i;
																for (i = 0; i <= index_n; i++) {
																	stars[i].style.fill = "";
																}
																for (i = index_n + 1; i < 5; i++) {
																	stars[i].style.fill = "lightgrey";
																}
															}
															stars_containers.forEach(e => {
																e.addEventListener("click", star_clicked);
															});
														})();
													</script>
												</div>
												<div class="center-both">以上</div>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2"><input type="submit" value="検索" /></td>
									</tr>
								</tbody>
							</table>
						</form>
					</section>
				</div>
				<div id="footer-container">
					<?php
					$a_for_footer = [];
					$a_for_footer_tempC = []; // カテゴリ保存用(一時的)
					$a_for_footerC = []; // カテゴリ保存用
					$meta_json = json_decode(file_get_contents(__DIR__. "/manage/office/access-ristricted/metadata.json"), true); // メタデータのjson形式
					if (isset($_GET["word"]) && file_exists(__DIR__. "/manage/words/{$_GET["word"]}.html")) {
						$this_file_content = file_get_contents(__DIR__. "/manage/words/{$_GET["word"]}.html");
						preg_match("/{.*?}/s", $this_file_content, $m);
						$json_footer = json_decode($m[0], true);
						foreach ($json_footer["関連"] as $relative_a) {
							$a_for_footer[] = $relative_a;
						}
						$relative_count = count($a_for_footer); // 「関連」の数

						$category_for_footer = $json_footer["カテゴリ"];
						foreach ($meta_json as $meta_key => $meta_value) {
							if ($category_for_footer === $meta_value["カテゴリ"]) { // 現在同カテゴリの選択肢を、、、
								$a_for_footer_tempC[] = $meta_key; // 追加
							}
						}
						$category_count = count($a_for_footer_tempC); // 「カテゴリ」一致の数 -> 「100(全体) - 関連の数 - 10(ランダム)」へ
						$count_for_category = 100 - $relative_count - 10;
						shuffle($a_for_footer_tempC);
						$a_for_footerC = array_slice($a_for_footer_tempC, 0, $count_for_category);
					}
					$a_lists = array_keys($meta_json);
					shuffle($a_lists);
					$final_rest = array_merge($a_for_footerC, array_slice($a_lists, 0, 10)); // 「カテゴリ + ランダム」(関連以外)
					/*
					1. $a_for_footer配列と$final_rest配列を結合
					2. 「1」の結果から重複しているものを削除
					3. 「2」の結果から現在のページを削除(存在すれば)
					4. 最終的に配列の先頭の「90」個だけを取得
					*/
					$final_footer_atag = array_slice(array_diff(array_unique(array_merge($a_for_footer, $final_rest)), (isset($_GET["word"])) ? [$_GET["word"]] : [""]), 0, 90);
					foreach ($final_footer_atag as $footer_item) {
						echo "<a href='?word={$footer_item}'>{$footer_item}</a>";
					}
					?>
				</div>
				<footer></footer>
			</div>
		</body>
	</html>
	<?php
}

?>