<?php

if (isset($_POST["action"])) {
	require(__DIR__. "/manage-subjects/". (array(
		"GET" => "get",
		"SELECT" => "select",
		"POST" => "post"
	)[$_POST["action"]] ?? "/../error"). ".php");
}

?>