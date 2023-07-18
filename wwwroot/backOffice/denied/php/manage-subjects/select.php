<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$sql = new koko\sql\SQL();

	$sql->add("SELECT s.subject, s.subject_name, s.description, s.status");
	$sql->add("FROM subjects s");
	$sql->add("WHERE s.subject = ?;");
	$sql->addParam($_POST["subject"]);

	$subjectLine = $sql->select();


	$sql = new koko\sql\SQL();

	$sql->add("CALL get_subject_dataset(?)");
	$sql->addParam($_POST["subject"]);

	$rec = $sql->selectAll();
	$subjectsTree = array();
	foreach ($rec as $r) {
		$subjectsTree[$r["level"]][$r["version"]][] = $r["page"];
	}



	$sql = new koko\sql\SQL();

	$sql->add("SELECT sc.category");
	$sql->add("FROM subjects_category sc");
	$sql->add("WHERE sc.subject = ?;");
	$sql->addParam($_POST["subject"]);

	$category = $sql->selectV();

	$answer = array(
		"subjectLine" => $subjectLine,
		"subjectTree" => $subjectsTree,
		"category" => $category
	);
	
	echo json_encode($answer, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>