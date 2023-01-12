<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	$strBuffer = new koko\view\strBuffer();
	
	try {
		$contents = json_decode($_POST["contents"], true);
	
		DEFINE("CUSTOM_SQL_COUNT", 1); // ループ外のSQLの数
	
		$changedCount = 0;
		foreach ($contents as $c) {
			if ($c["changed"]) {
				$changedCount++;
			}
		}
	
		$sql = new koko\sql\tranSQL(CUSTOM_SQL_COUNT + count($contents) + $changedCount);
	
		$sql->add("DELETE FROM pw_keywords");
		$sql->add("WHERE name = ?;");
		$sql->addParam($_POST["target"]);
	
		$N = $sql->getNext();
		for ($i = $N; $i < count($contents) + CUSTOM_SQL_COUNT; $i++) {
			$sql->go();
			$sql->add("INSERT INTO pw_keywords (name, keyword, value)");
			$sql->add("VALUES (?, ?, ?);");
			$sql->addParam($_POST["target"]);
			$sql->addParam($contents[$i - $N]["keyword"]);
			$sql->addParam($contents[$i - $N]["value"]);
		}
		
		$i = $sql->getNext();
		$N = $sql->getNext();
		while ($i <= count($contents) + CUSTOM_SQL_COUNT + $changedCount) {
			if ($contents[$i - $N]["changed"]) {
				$sql->go();
				$sql->add("INSERT INTO pw_backup (date, name, keyword, value)");
				$sql->add("VALUES (?, ?, ?, ?);");
				$sql->addParam(date("Y-m-d"));
				$sql->addParam($_POST["target"]);
				$sql->addParam($contents[$i - $N]["keyword"]);
				$sql->addParam($contents[$i - $N]["value"]);
			}
			$i++;
		}

		$sql->exec();
		$strBuffer->add("true");
	} catch (e) {
		$strBuffer->add("false");
	}
	
	$strBuffer->put();
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}


?>