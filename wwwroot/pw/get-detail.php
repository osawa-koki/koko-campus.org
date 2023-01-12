<?php

require(__DIR__. "/../define-token.php");

if (isset($_POST["keyword"]) && isset($_POST["token"]) && $_POST["token"] === TOKEN) {
	$json = json_decode(file_get_contents(__DIR__. "/denied/pw-db_table.json"), true);
	$answer = [];
	foreach ($json as $key => $value) {
		if ($_POST["keyword"] === $key) {
			echo json_encode($value, JSON_UNESCAPED_UNICODE);
			exit;
		}
	}
	echo "error";
}

?>