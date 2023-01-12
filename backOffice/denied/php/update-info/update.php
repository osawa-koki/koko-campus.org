<?php

if (basename(__FILE__) !== basename($_SERVER["PHP_SELF"])) {
	try {
		$contents = json_decode($_POST["contents"], true);
	
		$sql = new koko\sql\tranSQL(1 + count($contents));
	
		$sql->add("DELETE FROM news");
		$sql->add("WHERE date = ?;");
		$sql->addParam($_POST["date"]);
	
		for ($i = 1; $i <= count($contents); $i++) {
			$sql->go();
			$sql->add("INSERT INTO news (date, title, type, url, contents)");
			$sql->add("VALUES (?, ?, ?, ?, ?);");
			foreach ($contents[$i - 1] as $k) { // 配列型ではあるが、配列全体を直接セットはしない(ループでひとつずつ回す)
				$sql->addParam($k);
			}
		}
	
		$sql->exec();
	
		echo "true";
	
	} catch (e) {
		echo "false";
	}
} else {
	throw new Exception("「basename(__FILE__) !== basename(\$_SERVER[\"PHP_SELF\"])」エラー");	
}

?>