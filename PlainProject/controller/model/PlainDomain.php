<?php
class PlainDomain extends CommonController {
	const ROLE = LEVEL0;
	const TYPE = SYSTEM;

	public $strage;
	public $error;
	public $report;
	public $step;

	public function __construct() {
		for ($i = 1; $i <= 4; $i++) {
			$this->step   = sprintf("%02d", $i);
			$this->report = parent::__construct($this->step);
			print_r($this->report);

			// $this->error and die();
		}
	}
	// initiarize
	public function step00() {

		// $this->values['USR']          = $_REQUEST[MODEL];
		// $this->values['SYS']['SHELL'] = $_ENV['SHELL'];
		// $this->values['SYS']['USER']  = $_ENV['USER'];

	}
	// overhead processing
	public function step01() {
		//new LoginControle($this->blankForm(LOGIN));
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

	public function blankForm($type) {
		// $document;
		// // Creating an input item
		// $document[DOMAIN] = [
		// 	REPORT => '',
		// 	ITEM   => '',
		// 	RESULT => '',
		// ];
		// $document[USER]         = $this->strage[USER][$type];
		// $document[SYSTEM][CODE] = $this->step;
		// //$this->strage[SYSTEM][$type];
		// return $document;
	}
}
