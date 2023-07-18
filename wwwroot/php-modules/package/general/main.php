<?php

namespace koko\general;


function Now() {
	return Date("Y-m-d H:i:s");
}
function Today() {
	return Date("Y-m-d");
}

function multiLine_str(...$ary) {
	return $ary[0]. "\n". (count($ary)
		? (multiLine_str(...array_slice($ary, 1))) : "");
}

require_once(__DIR__. "/cast.php");
require_once(__DIR__. "/random.php");

?>