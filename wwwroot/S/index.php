<?php

require_once(__DIR__. "/../php-modules/package/koko.php");

use koko\sql;

$S;
$L;
$V;

if (!isset($_GET["S"]) || !sql\subject_exist($_GET["S"])) { // 「subject」が指定されていない、ないしは不正であれば、トップページへリダイレクト
	header("Location: ../");
	exit;
}

// 「subject」が指定されていた場合、、、、
$S = $_GET["S"];
$sql = new sql\SQL();
$sql->add("SELECT subject FROM subjects");
$sql->add("WHERE EXISTS");
	$sql->add("(");
		$sql->add("SELECT subject FROM level");
		$sql->add("WHERE subjects.subject = level.subject");
		$sql->add("AND level.level = '0'");
	$sql->add(")");
if ($sql->exists()) { // 「level」がない場合(「0」しかない場合)

}














?>