<?php

require(__DIR__. "/../define-token.php");

$input = json_decode(file_get_contents("php://input"), true);
$path = __DIR__. "/denied/pw-db_table.json";

if ($input["token"] === TOKEN) {
	unset($input["token"]);
	$json = json_decode(file_get_contents($path), true);
	foreach ($input as $key => $value) {
		$json[$key] = $value;
	}
	file_put_contents($path, json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

?>