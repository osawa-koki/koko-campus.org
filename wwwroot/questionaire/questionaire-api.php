<?php

$json = json_decode(file_get_contents(__DIR__. "/questionaire-data.json"), true);
$rq_data = json_decode(file_get_contents("php://input"), true);

$keys = array_keys($json);

if (isset($_POST["get-questionaire"])) { // アンケートの取得
	$random = mt_rand(0, count($keys) - 1);
	$one_element = $keys[$random];
	$answer = array(
		"id"=> $one_element,	
		"theme"=> $json[$one_element]["theme"],	
		"options"=> $json[$one_element]["options"],	
		"answers"=> $json[$one_element]["answers"]	
	);
	echo json_encode($answer, JSON_UNESCAPED_UNICODE);
	file_put_contents(__DIR__. "/log", json_encode($answer, JSON_UNESCAPED_UNICODE));
	exit();
}

if (isset($rq_data["put-questionaire"]) && in_array($rq_data["questionaire-id"], $keys) && in_array($rq_data["selected-option"], [0, 1, 2, 3])) {
	$json[$rq_data["questionaire-id"]]["answers"][$rq_data["selected-option"]]++;
	file_put_contents(__DIR__. "/questionaire-data.json", json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
	echo json_encode($json[$rq_data["questionaire-id"]]["answers"], JSON_UNESCAPED_UNICODE);
	exit();
}


?>