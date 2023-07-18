<?php

namespace koko\sql\private;

// 接続文字列
define("dsn", "mysql:dbname=koko;host=localhost;charset=utf8");
define("user", "root");
define("pw", "");

// DB接続関数
function connect() {
	$dbh = new \PDO(dsn, user, pw);
	$dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	return $dbh;
}
function disconnect(&$dbh) {
	$dbh = null;
}

// バインド機構でSQLを実行した際にSQLを残すために実行したSQLを復元
function bind($sql, $data) {
	$n1 = mb_substr_count($sql, "?");
	$n2 = count($data);
	if ($n1 === $n2) {
		foreach ($data as $e) {
			$sql = preg_replace("/\?/", $e, $sql, 1);
		}
		return $sql;
	} else {
		return false;
	}
}

// バインド機構でSQLを実行した際にSQLを残すために実行したSQLを復元(パラメタ化クエリ)
function bindP($sql, $data) {
	foreach ($data as $key => $value) {
		$sql = preg_replace("/{$key}(?= |\))/", $value, $sql);
	}
	return $sql;
}

?>