<?php

require(__DIR__. "/../define-token.php");

$date = date("Y-m-d");
copy(__DIR__. "/denied/information.json", __DIR__. "/denied/backup/{$date}.json");

$json = json_decode(file_get_contents(__DIR__. "/denied/information.json"), true);

if (isset($_POST["get"]) && $_POST["get"] === "for-toppage") {
	// 「koko-campus.org」のトップページの「new」用 -> 最新の情報15件を取得
	$answer = [];
	$y_keys = array_keys($json);
	rsort($y_keys);
	foreach ($y_keys as $y) {
		$m_keys = array_keys($json[$y]);
		rsort($m_keys);
		foreach ($m_keys as $m) {
			$d_keys = array_keys($json[$y][$m]);
			rsort($d_keys);
			foreach ($d_keys as $d) {
				foreach ($json[$y][$m][$d] as $information_object) {
					$information_object["date"] = "{$m}/{$d}";
					$answer[] = $information_object;
					if (15 < count($answer)) {
						break 4; // forループ全体から抜ける
					}
				}
			}
		}
	}
	echo json_encode($answer, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	exit();
}

if (isset($_POST["get"]) && $_POST["get"] === "for-calender" && isset($_POST["year"], $_POST["month"])) {
	// 「koko-campus.org」のトップページの「calender」用 -> 「year」「month」からその月の予定一覧を取得
	if (array_key_exists($_POST["year"], $json) && array_key_exists($_POST["month"], $json[$_POST["year"]])) {
		if (isset($json[$_POST["year"]][$_POST["month"]])) {
			echo json_encode($json[$_POST["year"]][$_POST["month"]], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			exit();
		}
	}
	echo "{}";
	exit();
}

if (isset($_POST["get"]) && $_POST["get"] === "for-register" && isset($_POST["year"], $_POST["month"], $_POST["date"])) {
	// 「koko-campus.org/dev」(管理者)の予定取得用 -> 「year」「month」「date」からその日付の予定一覧を取得
	if (array_key_exists($_POST["year"], $json) && array_key_exists($_POST["month"], $json[$_POST["year"]]) && array_key_exists($_POST["date"], $json[$_POST["year"]][$_POST["month"]])) {
		if (isset($json[$_POST["year"]][$_POST["month"]])) {
			echo json_encode($json[$_POST["year"]][$_POST["month"]][$_POST["date"]], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			exit();
		}
	}
	echo "[]";
	exit();
}

if (isset($_POST["put"]) && $_POST["token"] === TOKEN && isset($_POST["year"], $_POST["month"], $_POST["date"])) {
	$received_json = json_decode($_POST["contents"], true);
	$json[$_POST["year"]][$_POST["month"]][$_POST["date"]] = $received_json;
	file_put_contents(__DIR__. "/denied/information.json", json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	exit();
}





?>