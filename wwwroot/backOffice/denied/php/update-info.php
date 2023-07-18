<?php

if (isset($_POST["action"])) {
	require(__DIR__. "/update-info/". (array(
		"SELECT" => "select",
		"UPDATE" => "update"
	)[$_POST["action"]] ?? "/../error"). ".php");
}

?>