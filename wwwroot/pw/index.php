<?php

require(__DIR__. "/../define-token.php");

$date = date("Y-m-d");
$path = __DIR__. "/denied";
copy($path. "/pw-db_table.json", $path. "/backup/{$date}.json");

if (isset($_POST["token"]) && $_POST["token"] === TOKEN) {
	require(__DIR__. "/denied/program/login-accepted.php");
	exit;
}
$contents = file_get_contents(__DIR__. "/denied/program/login-form.html");
echo $contents;

?>