<?php

namespace koko\mail;

use \koko\general\cast;

function sendMail($to, $subject, $message, $headers="") {
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	$headers = "From: support@koko-campus.org;". $headers;
	$result = mb_send_mail($to, $subject, $message, $headers);
}






?>