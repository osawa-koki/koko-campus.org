<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$sql = new koko\sql\SQL();

	switch ($_POST["step"]) {
		case "category":
			$sql->add("SELECT category, category_name");
			$sql->add("FROM category;");
			$rec = $sql->selectAll();
			break;
		
		case "subject":
			$sql->add("SELECT c.subject, s.subject_name");
			$sql->add("FROM subjects_category c");
			$sql->add("INNER JOIN subjects s ON c.subject = s.subject");
			$sql->add("AND c.category = ?;");
			$sql->addParam($_POST["category"]);
			$rec = $sql->selectAll();
			break;

		case "level":
			$sql->add("SELECT level");
			$sql->add("FROM subjects_level");
			$sql->add("WHERE subject = ?;");
			$sql->addParam($_POST["subject"]);
			$rec = $sql->selectAll();
			break;

		case "version":
			$sql->add("SELECT version");
			$sql->add("FROM subjects_version");
			$sql->add("WHERE subject = ?");
			$sql->add("AND level = ?;");
			$sql->addParam($_POST["subject"]);
			$sql->addParam($_POST["level"]);
			$rec = $sql->selectAll();
			break;

		case "page":
			$sql->add("SELECT page");
			$sql->add("FROM subjects_pages");
			$sql->add("WHERE subject = ?");
			$sql->add("AND level = ?");
			$sql->add("AND version = ?;");
			$sql->addParam($_POST["subject"]);
			$sql->addParam($_POST["level"]);
			$sql->addParam($_POST["version"]);
			$rec = $sql->selectAll();
			break;

		case "contents":
			$sql->add("SELECT contents");
			$sql->add("FROM subjects_pages");
			$sql->add("WHERE subject = ?");
			$sql->add("AND level = ?");
			$sql->add("AND version = ?");
			$sql->add("AND page = ?;");
			$sql->addParam($_POST["subject"]);
			$sql->addParam($_POST["level"]);
			$sql->addParam($_POST["version"]);
			$sql->addParam($_POST["page"]);
			$rec = $sql->select();
			break;
	}
	echo json_encode($rec, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>