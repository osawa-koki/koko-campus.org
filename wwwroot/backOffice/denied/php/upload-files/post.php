<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$files = array();
	$fileNum = array();
	foreach ($_FILES as $f) {
		if (preg_match("/^\d+(?=\.html?)/", $f["name"], $page)) {
			$page = $page[0];
			$fileNum[] = $page;
			$files[] = $f;
		}
	}
	$sql = new koko\sql\tranSQL(1 + count($files) * 2);

	$sql->add("DELETE FROM subjects_pages");
	$sql->add("WHERE subject = ?");
	$sql->add("AND level = ?");
	$sql->add("AND version = ?");
	$sql->addParam($_POST["subject"]);
	$sql->addParam($_POST["level"]);
	$sql->addParam($_POST["version"]);
	$sql->add("AND");
	$sql->add("(");
	$sql->add("1 = 2");
	foreach ($fileNum as $fs) {
		$sql->add("OR page = ?");
		$sql->addParam($fs);
	}
	$sql->add(");");

	$N = $sql->getNext();
	$fileCount = 0;
	for ($i = $sql->getNext(); $i < 1 + count($files); $i++) {
		$f = $files[$i - $N];
		preg_match("/^\d+/", $f["name"], $page);
		$page = $page[0];
		$contents = file_get_contents($f["tmp_name"]);

		$sql->go();
		$sql->add("INSERT subjects_pages (subject, level, version, page, contents)");
		$sql->add("VALUES (?, ?, ?, ?, ?)");
		$sql->add("WHERE EXISTS (");
		$sql->add("");
		$sql->add(")");
		$sql->addParam($_POST["subject"]);
		$sql->addParam($_POST["level"]);
		$sql->addParam($_POST["version"]);
		$sql->addParam($page);
		$sql->addParam($contents);

		$sql->go();
		$sql->add("INSERT subjects_backup (date, subject, level, version, page, contents)");
		$sql->add("VALUES (?, ?, ?, ?, ?, ?)");
		$sql->addParam(date("Y-m-d"));
		$sql->addParam($_POST["subject"]);
		$sql->addParam($_POST["level"]);
		$sql->addParam($_POST["version"]);
		$sql->addParam($page);
		$sql->addParam($contents);

		$fileCount++;
	}
	$sql->debug();
	$sql->exec();
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>