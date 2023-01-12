<?php

if (isset($_POST["action"])) {
	require(__DIR__. "/upload-files/". (array(
		"GET" => "get",
		"POST" => "post"
	)[$_POST["action"]] ?? "/../error"). ".php");
}

?>