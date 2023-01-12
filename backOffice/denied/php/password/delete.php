<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$sql = new koko\sql\tranSQL(2);
	
	$sql->add("DELETE FROM pw");
	$sql->add("WHERE name = ?;");
	$sql->addParam($_POST["target"]);
	
	$sql->go();
	$sql->add("DELETE FROM pw_keywords");
	$sql->add("WHERE name = ?;");
	$sql->addParam($_POST["target"]);

	$sql->exec();
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>