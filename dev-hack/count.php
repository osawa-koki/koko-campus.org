<?php

if (!isset($_GET["delete"])) {
	file_put_contents(
		"log.txt",
		date("Y-m-d H:i:s") + "\n",
		FILE_APPEND | LOCK_EX
	);
} else {
	file_put_contents(
		"log.txt",
		""
	);
}


?>

