<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$sql = new koko\sql\SQL();
	
	$sql->add("SELECT category, category_name");
	$sql->add("FROM category;");
	$rec = $sql->selectAll();
	
	echo json_encode($rec, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>