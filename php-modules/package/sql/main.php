<?php

namespace koko\sql;

require_once(__DIR__. "/private.php");

// 名前空間のインポート
use \koko\general;
use \koko\logger;
use \koko\sql\private As _;


function subject_exist($subject) {
	try {
		logger\custom("SQL", _\bind($this->sql, $this->data));
		$dbh = _\connect();
		$stmt = $dbh->prepare("SELECT subject FROM subjects WHERE subject = ?;");
		$data[] = $subject;
		$stmt->execute($data);
		$rec = $stmt->fetch(\PDO::FETCH_ASSOC);
		return ($rec !== false) ? true : false;
	} catch (Exception $e) { //エラーの再スローはしない
		logger\exception($e);
		return false;
	} finally {
		_\disconnect($dbh);
	}
}


// SQL文の組立(トランザクションなし)
class SQL {
	//プロパティの宣言
	private $sql = "";
	private $data = array();

	public function add ($m) {
		$this->sql .= $m. " ";
	}
	public function addParam ($m) {
		$this->data[] = $m;
	}

	// SELECT文以外(INSERT・UPDATE・DELETE)専用のSQL実行関数
	public function exec() {
		try {
			logger\custom("SQL", _\bind($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			return true;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// SELECT文専用のSQL実行関数
	function selectAll() {
		try {
			logger\custom("SQL", _\bind($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $rec;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// SELECT文専用のSQL実行関数
	function select2d() {
		try {
			logger\custom("SQL", _\bind($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetchAll(\PDO::FETCH_NUM);
			return $rec;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// SELECT文専用のSQL実行関数
	function selectV() {
		try {
			logger\custom("SQL", _\bind($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetchAll(\PDO::FETCH_COLUMN);
			return $rec;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// SELECT文専用のSQL実行関数
	function select() {
		try {
			logger\custom("SQL", _\bind($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetch(\PDO::FETCH_ASSOC);
			return $rec;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// レコードが存在するかチェック
	function exists() {
		try {
			logger\custom("SQL", _\bind($this->sql, $this->data). " [EXIST]");
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetch(\PDO::FETCH_ASSOC);
			return ($rec !== false) ? true : false;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}
}

// SQL文の組立(トランザクションなし) -> パラメタ化クエリ
class paramSQL {
	//プロパティの宣言
	private $sql = "";
	private $data = array();

	public function add($m) {
		$this->sql .= $m. " ";
	}
	public function addParam($k, $v) {
		$this->data[$k] = $v;
	}

	// SELECT文以外(INSERT・UPDATE・DELETE)専用のSQL実行関数
	public function exec() {
		try {
			logger\custom("SQL", _\bindP($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			foreach ($this->data as $key => $value) {
				$stmt->bindParam($key, $value);
			}
			$stmt->execute();
			return true;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// SELECT文専用のSQL実行関数
	function selectAll() {
		try {
			logger\custom("SQL", _\bindP($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $rec;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// SELECT文専用のSQL実行関数
	function select2d() {
		try {
			logger\custom("SQL", _\bindP($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetchAll(\PDO::FETCH_NUM);
			return $rec;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// SELECT文専用のSQL実行関数
	function selectV() {
		try {
			logger\custom("SQL", _\bindP($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetchAll(\PDO::FETCH_COLUMN);
			return $rec;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// SELECT文専用のSQL実行関数
	function select() {
		try {
			logger\custom("SQL", _\bindP($this->sql, $this->data));
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetch(\PDO::FETCH_ASSOC);
			return $rec;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}

	// レコードが存在するかチェック
	function exists() {
		try {
			logger\custom("SQL", _\bindP($this->sql, $this->data). " [EXIST]");
			$dbh = _\connect();
			$stmt = $dbh->prepare($this->sql);
			$stmt->execute($this->data);
			$rec = $stmt->fetch(\PDO::FETCH_ASSOC);
			return ($rec !== false) ? true : false;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		} finally {
			_\disconnect($dbh);
		}
	}
}

class tranSQL {
	private $dbh;
	private $sql = array();
	private $data = array();
	private $count;
	private $n = 0;

	function __construct($n) {
		try {
			$this->dbh = _\connect();
			for ($i = 0; $i < $n; $i++) {
				$this->sql[] = "";
				$this->data[] = array();
			}
			$this->count = $n;
			return true;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		}
    }

	public function getNext() {
		return $this->n + 1;
	}

	public function go() {
		$this->n++;
	}

	public function add($m) {
		try {
			$this->sql[$this->n] .= ($m. " ");
		} catch (ex) {
			logger\exception("tranSQLでのSQL文追加時に誤ったインデックスを指定した可能性があります。");
		}
	}
	
	public function addParam($m) {
		try {
			$this->data[$this->n][] = $m;
		} catch (ex) {
			logger\exception("tranSQLでのSQL文追加時に誤ったインデックスを指定した可能性があります。");
		}
	}
	
	public function exec() {
		try {
			$answer = array();
			logger\custom("SQL", "***** SQL -> トランザクションの開始 [Tran] *****");
			$this->dbh->beginTransaction();

			for ($i = 0; $i < $this->count; $i++) {
				logger\custom("SQL", _\bind($this->sql[$i], $this->data[$i]). " [トランザクション処理]");
				$stmt = $this->dbh->prepare($this->sql[$i]);
				$stmt->execute($this->data[$i]);
				$rec = $stmt->fetchAll(\PDO::FETCH_ASSOC);
				$answer[] = $rec;
			}
			$this->dbh->commit();
			logger\custom("SQL", "***** SQL -> トランザクションの終了 [成功] *****");
		} catch (Exception $e) {
			$this->dbh->rollBack();
			logger\custom("SQL", "トランザクションの失敗 -> ". $e->getMessage());
			logger\custom("SQL", "***** SQL -> トランザクションの終了 [失敗] *****");
		}
	}

	public function debug() {
		echo "+++++ debug start +++++\n";
		for ($i = 0; $i < $this->count; $i++) {
			echo "***【{$i}】***\n";
			echo "SQL ---> {$this->sql[$i]}\n";
			echo "--- DATA ---\n";
			foreach ($this->data[$i] as $e) {
				echo "{$e}\n";
			}
			echo "--- ---- ---\n\n\n";
		}
		echo "+++++ debug end +++++\n\n\n\n\n";
	}

}

class pQuery {
	private $dbh;
	private $sql = array();
	private $data = array();
	private $count;
	private $n = 0;

	function __construct($n) {
		try {
			$this->dbh = _\connect();
			for ($i = 0; $i < $n; $i++) {
				$this->sql[] = "";
				$this->data[] = array();
			}
			$this->count = $n;
			return true;
		} catch (Exception $e) { //エラーの再スローはしない
			logger\exception($e);
			return false;
		}
    }

	public function getNext() {
		return $this->n + 1;
	}

	public function go() {
		$this->n++;
	}

	public function add($m) {
		try {
			$this->sql[$this->n] .= ($m. " ");
		} catch (ex) {
			logger\exception("tranSQLでのSQL文追加時に誤ったインデックスを指定した可能性があります。");
		}
	}
	
	public function addParam($k, $v) {
		try {
			$this->data[$this->n][$k] = $v;
		} catch (ex) {
			logger\exception("tranSQLでのSQL文追加時に誤ったインデックスを指定した可能性があります。");
		}
	}
	
	public function exec() {
		try {
			$answer = array();
			logger\custom("SQL", "***** SQL -> トランザクションの開始 [Tran] *****");
			$this->dbh->beginTransaction();

			for ($i = 0; $i < $this->count; $i++) {
				logger\custom("SQL", _\bindP($this->sql[$i], $this->data[$i]). " [トランザクション処理]");
				$stmt = $this->dbh->prepare($this->sql[$i]);
				foreach ($this->data[$i] as $key => $value) {
					$stmt->bindParam($key, $value);
				}
				$stmt->execute();
				$rec = $stmt->fetchAll(\PDO::FETCH_ASSOC);
				$answer[] = $rec;
			}
			$this->dbh->commit();
			logger\custom("SQL", "***** SQL -> トランザクションの終了 [成功] *****");
		} catch (Exception $e) {
			$this->dbh->rollBack();
			logger\custom("SQL", "トランザクションの失敗 -> ". $e->getMessage());
			logger\custom("SQL", "***** SQL -> トランザクションの終了 [失敗] *****");
		}
	}

	public function debug() {
		echo "+++++ debug start +++++\n";
		for ($i = 0; $i < $this->count; $i++) {
			echo "***【{$i}】***\n";
			echo "SQL ---> {$this->sql[$i]}\n";
			echo "--- DATA ---\n";
			foreach ($this->data[$i] as $e) {
				echo "{$e}\n";
			}
			echo "--- ---- ---\n\n\n";
		}
		echo "+++++ debug end +++++\n\n\n\n\n";
	}

}

?>