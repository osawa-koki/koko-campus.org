<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$sql = new koko\sql\SQL();
	
	$sql->add("SELECT name");
	$sql->add("FROM pw");
	$sql->add("WHERE name LIKE ?;");
	$sql->addParam($_POST["contents"]. "%");
	$rec = $sql->selectV();
	
	echo json_encode($rec, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>