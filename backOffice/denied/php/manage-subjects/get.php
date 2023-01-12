<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$sql = new koko\sql\paramSQL();

	$sql->add("SELECT subject, subject_name, description");
	$sql->add("FROM subjects s");
	$sql->add("WHERE 1 = 1");
	$sql->add(($_POST["subject"] !== "") ? "AND subject = :subject" : "");
	$sql->add(($_POST["subject_name"] !== "") ? "AND subject_name LIKE :subject_name" : "");
	$sql->add(($_POST["category"] !== "xxxx") ? "AND EXISTS(SELECT * FROM subjects_category sc WHERE s.subject = sc.subject AND sc.category = :category)" : "");
	
	if ($_POST["subject"] !== "") {
		$sql->addParam(":subject", $_POST["subject"]);
	}
	if ($_POST["subject_name"] !== "") {
		$sql->addParam(":subject_name", "%". $_POST["subject_name"]. "%");
	}
	if ($_POST["category"] !== "xxxx") {
		$sql->addParam(":category", $_POST["category"]);
	}

	$rec = $sql->selectAll();
	echo json_encode($rec, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>