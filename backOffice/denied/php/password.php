<?php

if (isset($_POST["action"])) {
	require(__DIR__. "/password/". (array(
		"GET" => "get",
		"SELECT" => "select",
		"DELETE" => "delete",
		"POST" => "post"
	)[$_POST["action"]] ?? "/../error"). ".php");
}

?>