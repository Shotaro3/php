<?php
class  extends CommonController {

	// notification this model code
	const READ = 1;
	const CREATE = 2;
	const UPDATA = 3;
	const DELETE = 4;

	public $strage;
	public $report;

	public function __construct() {
		$this->report = parent::__construct($this);
	}
	// overhead processing
	public function step01() {
		new LoginControle($this->blankForm(LOGIN_CHECK, ALL_STEP));
	}
	// proper noun process
	public function step02() {
		switch ($strage[CODE]) {
			case READ:
				# code...
				break;
			case CREATE:
				# code...
				break;
			case UPDATA:
				# code...
				break;
			case DELETE:
				# code...
				break;
			
			default:
				# code...
				break;
		}
	}
	// throw view
	public function step03() {
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
