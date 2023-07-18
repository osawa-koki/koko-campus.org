<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$sql = new koko\sql\SQL();
	
	$sql->add("SELECT *");
	$sql->add("FROM news");
	$sql->add("WHERE date = ?;");
	$sql->addParam($_POST["date"]);
	$rec = $sql->select2d();
	
	echo json_encode($rec, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>