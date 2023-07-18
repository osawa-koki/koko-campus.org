<?php

require(__DIR__. "/../define-token.php");
require_once(__DIR__. "/../php-modules/package/koko.php");

if ($_POST["token"] === TOKEN && isset($_POST["type"])) {
	require(__DIR__. "/denied/php/". (array(
		"update-info" => "update-info",
		"password" => "password",
		"upload-files" => "upload-files",
		"manage-subjects" => "manage-subjects",
		"manage-category" => "manage-category",
		"create-backup" => "create-backup",
		"get-category" => "get-category"
	)[$_POST["type"]] ?? "error"). ".php");
}

?>