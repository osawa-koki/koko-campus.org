<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$sql = new koko\sql\SQL();
	$sql->add("SELECT name");
	$sql->add("FROM pw");
	$sql->add("WHERE name = ?;");
	$sql->addParam($_POST["contents"]);
	
	if ($sql->exists()) {
		$sql = new koko\sql\SQL();
		
		$sql->add("SELECT keyword, value");
		$sql->add("FROM pw_keywords");
		$sql->add("WHERE name = ?;");
		$sql->addParam($_POST["contents"]);
		$rec = $sql->selectAll();
		
		echo json_encode($rec, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
	} else {
		echo "false";
	}
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>