<?php

require(__DIR__. "/sub-svg.php");

//cookieを設定する必要があるため、アンケートデータの取得はここで行う
$url = "http://localhost/questionaire/questionaire-api.php";
$data = array(
	"get-questionaire" => "アンケートを取得する♪"
);
$context = array(
	"http" => array(
		"method"  => "POST",
		"header"  => "Content-Type: application/x-www-form-urlencoded",
		"content" => http_build_query($data)
	)
);
$file = file_get_contents($url, false, stream_context_create($context));

$questionaire_data = json_decode($file, true);
setcookie("questionaire-id", $questionaire_data["id"]);

?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset ="utf-8" />
		<title>koko-campus</title>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="format-detection" content="email=no,telephone=no,address=no" />
		<meta name="keywords" content="koko-campus,ココキャンパス,ここキャンパス,ココキャンパスプロジェクト,ここキャンパスプロジェクト" />
		<meta name="author" content="koko" />
		<meta name = "description" content="バーチャルキャンパスを運営しています。ITから会計・統計学など幅広い情報を発信しています。" />
		<link rel="shortcut icon" href="pics/thumbnail-img.png" type="image/x-icon" />
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="update/style.css" />
	</head>
	<body>
		<header>
			<a href="index"><img id="logo" src="./pics/header.png" alt="koko-campus project"></a>
			<span>koko-campus</span>
		</header>
		<div id="container">
			<div id="main">
				<div id="login-register" class="hidden">
					<!-- 停止中 -->
					<a href="member/register"><img src="pics/へび.png" alt="会員登録用の画像" /></a>
					<a href="member/login"><img src="pics/カメレオン.png" alt="ログインの画像" /></a>
				</div>
				<?php
				$subjects_json = json_decode(file_get_contents(__DIR__. "/manage/subjects.json"), true);
				foreach ($subjects_json as $subjects_group) {
					?>
					<div class="section">
						<div class="subjects-title"><?php echo $subjects_group[0] ?></div>
						<div class="subjects-container">
							<?php //IT科目一覧を表示
							foreach ($subjects_group[1] as $key) {
								echo "<a href='subjects/{$key}/branch' class='subjects'><img src='pics/subjects/{$key}.png' /></a>";
							}
							?>
						</div>
					</div>
					<?php
				}
				?>
				<div class="section">
					<div class="subjects-title">プログラム</div>
					<div class="subjects-container">
						<?php
						$program_array = json_decode(file_get_contents(__DIR__. "/manage/program.json"), true);
						$program_list = $program_array["on-progress"];
						foreach ($program_list as $value) {
							echo "<a href='program/{$value}/branch'><img class='program-pictures' src='program/pics/{$value}.png' alt='プログラムのロゴ' /></a>";
						}
						?>
					</div>
				</div>
				<div class="section others">
					<div class="subjects-title">その他</div>
					<div class="subjects-container">
						<a href="my-profile/index">kokoのプロフィール</a>
						<a href="blog/index">kokoのブログ(IT編)</a>
						<a href="blog2/index">kokoのブログ(哲学・思想・その他)</a>
						<a href="contact/index">問合せ</a>
						<a href="involved/index">メンバー募集!</a>
						<a href="today's-error/index">今日のエラー</a>
						<a href="it-dictionary/index">IT Dictionary</a>
						<a href="service/index">外部サービス</a>
						<a href="sub/cyber-attack_ru/index" class="dark-lab hidden">対ロシア-サイバー攻撃講座</a>
						<a href="sub/suicide/index" class="dark-lab hidden">自殺の手引き</a>
					</div>
				</div>
			</div>
			<div id="sub">
				<div id="new">
					<?php put_sub_svg("new!", 28); ?>
					<div id="new-box">
						<table border="1" id="new-table" class="x">
							<tbody>
								<?php
								$url = "http://localhost/update/information";
								$data = array(
									"get" => "for-toppage"
								);
								$context = array(
									"http" => array(
										"method"  => "POST",
										"header"  => "Content-Type: application/x-www-form-urlencoded",
										"content" => http_build_query($data)
									)
								);
								$new_data = json_decode(file_get_contents($url, false, stream_context_create($context)), true);
								foreach ($new_data as $element) {
									echo "<tr>";
										echo "<th>{$element['date']}</th>";
										echo "<td>";
											echo (isset($element["url"])) ? "<a href='{$element["url"]}'>" : "";
											echo "<p>". $element["contents"]. "</p>";
											echo (isset($element["url"])) ? "</a>" : "";
										echo "</td>";
									echo "</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div id="recommendation">
					<?php put_sub_svg("オススメ!", 18); ?>
					<div class="recommendation-box">
						<?php
						$recommendation = $subjects_json[0][1];
						shuffle($recommendation);
						$recommendation = array_splice($recommendation, 0, 5);
						$subjectsConverter = json_decode(file_get_contents(__DIR__. "/subjects/subjectsName-converter.json"), true);
						foreach ($recommendation as $key) {
							$key = (isset($subjectsConverter[$key])) ? $subjectsConverter[$key] : $key;
							echo "<a href='./subjects/{$key}/branch'>{$key}</a>";
						}
						?>
					</div>
				</div>
				<div id="questionaire">
					<?php put_sub_svg("アンケート", 15); ?>
					<div class="questionaire-box">
						<?php
						echo "<table border='1' id='questionaire-select-table'><caption>{$questionaire_data["theme"]}</caption><tbody>";
						$count = 0;
						foreach ($questionaire_data["options"] as $value) {
							echo "<tr><td><div class='questionaire-checkbox'></div></td><td>{$value}<div class='bar-chart'></div><div class='voted-show'></div></td></tr>";
							$count++;
						}
						echo "<tr><td colspan='2'><div id='submit-questionaire'>Answer!!</div></td></tr></tbody></table>";
						?>
					</div>
					<script charset = "UTF-8" type="text/javascript" src = "questionaire/script.js" defer></script>
				</div>
				<div id="calender-div">
					<?php put_sub_svg("カレンダー", 14); ?>
					<table id="update-calender">
						<caption id="update-calender-caption">
							<span id="go-back-calender">&lt;&lt;&lt;</span>
							<span id="calender-caption"></span>
							<span id="go-next-calender">&gt;&gt;&gt;</span>
						</caption>
						<thead>
							<tr>
								<th>月</th>
								<th>火</th>
								<th>水</th>
								<th>木</th>
								<th>金</th>
								<th>土</th>
								<th>日</th>
							</tr>
						</thead>
						<tbody id="days-container"></tbody>
					</table>
					<div id="update-detail-box"></div>
				</div>
				<script charset = "UTF-8" type="text/javascript" src = "update/calender.js" defer></script>
			</div>
		</div>
		<footer></footer>
	</body>
</html>
