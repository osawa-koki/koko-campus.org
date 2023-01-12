<?php

require(__DIR__. "/../define-token.php");

if (isset($_POST["suggestion"]) && isset($_POST["token"]) && $_POST["token"] === TOKEN) {
	$json = json_decode(file_get_contents(__DIR__. "/denied/pw-db_table.json"), true);
	$answer = [];
	foreach ($json as $key => $value) {
		if (preg_match("/.*{$_POST['suggestion']}.*/", $key)) {
			$answer[] = $key;
		}
	}
	echo json_encode($answer, JSON_UNESCAPED_UNICODE);
}

?>