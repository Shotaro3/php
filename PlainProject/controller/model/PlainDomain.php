<?php
class PlainDomain extends CommonController {
	const ROLE = LEVEL0;
	const TYPE = ROOT;

	public $strage;
	public $error;
	public $report;
	public $step;

	public function __construct() {
		for ($i = 1; $i <= 4; $i++) {
			$this->step   = sprintf("%02d", $i);
			$this->report = parent::__construct($this->step);
			// $this->error and die();
		}
		var_dump('<br>===============<br>'.$this->report);
	}
	// initiarize
	public function step00() {

		$this->values['USR']          = $_REQUEST[MODEL];
		$this->values['SYS']['SHELL'] = $_ENV['SHELL'];
		$this->values['SYS']['USER']  = $_ENV['USER'];

	}
	// overhead processing
	public function step01() {
		new LoginControle($this->blankForm(LOGIN_CHECK, ALL_STEP));
		// $vew = new Smarty();
	}
	// proper noun process
	public function step02() {

	}
	// create master code
	public function step03() {

	}
	// throw view
	public function step04() {

		// read on file
		require_once ('/Applications/MAMP/htdocs/PHP/PlainProject/plane.html');
	}

	// [MODEL][ITEM]...
	public function setViewParam($param) {
		$this->view_param = $param;
	}

	public function blankForm($type, $step) {
		$document;
		// // Creating an input item
		// $document[DOMAIN][$type][$step] = [
		// 	REPORT => '',
		// 	ITEM   => '',
		// 	RESULT => '',
		// ];
		//$document[USER]               = $this->strage[USER][DOMAIN][$type];
		//$document[USER]               = $this->strage[USER][MODEL][$type];
		$document[SYSTEM][CODE][STEP] = $step;
		$document[SYSTEM][CODE][TYPE] = $type;
		//$this->strage[SYSTEM][$type];
		return $document;
	}
}
