<?php

require(__DIR__. "/../define-token.php");

$input = json_decode(file_get_contents("php://input"), true);

if (isset($input["token"]) && $input["token"] === TOKEN && isset($input["name"])) {
	$name = $input["name"];
	unset($input["name"]);
	unset($input["token"]);
	$json = json_decode(file_get_contents(__DIR__. "/denied/pw-db_table.json"), true);
	unset($json[$name]);
	$json2 = json_decode(file_get_contents(__DIR__. "/denied/pw-db_table_deleted.json"), true);
	$json2[$name] = $input["contents"];

	file_put_contents(__DIR__. "/denied/pw-db_table.json", json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	file_put_contents(__DIR__. "/denied/pw-db_table_deleted.json", json_encode($json2, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

?>