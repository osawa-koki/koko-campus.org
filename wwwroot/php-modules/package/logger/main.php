<?php

namespace koko\logger;

use \koko As k;
use \koko\general As g;

define("today", g\Today());
define("now", g\Now());
define("DIR", "LogFiles");


function log($message) {
	file_put_contents(__DIR__. sprintf("/../../../%s/%s.log", DIR, today), now. "\t". $message. "\n", FILE_APPEND);
	return true;
}

function exception($message) {
	file_put_contents(__DIR__. sprintf("/../../../%s/%s.Exception.log", DIR, today), now. "\t". $message. "\n", FILE_APPEND);
	return true;
}

function custom($type, $message) {
	file_put_contents(__DIR__. sprintf("/../../../%s/%s.%s.log", DIR, today, $type), now. "\t". $message. "\n", FILE_APPEND);
	return true;
}



?>