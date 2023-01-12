<?php

$url = $_POST["url"];
$headers = "";
$body = [];

foreach ($_POST as $k => $v) {
	if (preg_match("/^headers-/", $k)) {
		$headers = preg_replace("/^headers-/", "", $k) + ": " + $v + "\r\n";
	}
	if (preg_match("/^body-/", $k)) {
		$body[preg_replace("/^body-/", "", $k)] = $v;
	}
}


$context = array(
	"http" => array(
		"method"  => "POST",
		"header"  => $headers,
		"content" => http_build_query($body)
	)
);

try {
    $html = file_get_contents("https://". $url, false, stream_context_create($context));
    echo $html;
	echo "<!-- 通信成功 -->";
} catch (Exception $e) {
    echo "HTTP(S)通信が正常に行えませんでした。";
}


?>