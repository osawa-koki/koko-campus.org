<?php

namespace koko\view;

class strBuffer {
	private $str = "";
	private $count = 0;
	
	public function add($m) {
		$this->str .= $m;
		$this->count++;
	}

	public function getN() {
		return $this->count;
	}

	public function put() {
		echo($this->str);
	}

	public function get() {
		return $this->str;
	}
}

?>