<?php

$heard['POST'] = isset($_POST);

new person($heard);

abstract class i {

	protected $recognition;

	public function __construct($heard) {
		$this->listen($heard);
		$this->translation();
		$this->doubt();
		$this->question();
	}
	abstract function listen($heard);
	abstract function translation();
	abstract function doubt();
	abstract function question();

	protected function motion($recognition) {
		$this->recognition[] = $recognition;
	}
	protected function post() {
		return $this->recognition;
	}
}

class person extends i {

	public function __construct($heard) {
		parent::__construct($heard);
		new Whiteboard($this->post());
	}

	public function listen($heard) {
		if (isset($heard['POST'])) {
			$this->motion("聞こえた");
		} else {
			$this->motion("聞こえない");
		}
	}
	public function translation() {
		$this->motion("つまり");
	}
	public function doubt() {
		$this->motion("しかし");
	}
	public function question() {
		$this->motion("ということは");
	}
}

class Whiteboard {

	public function __construct($agenda) {
		var_dump($agenda);
	}

}