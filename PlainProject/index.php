<?php
ini_set('display_errors', 1);
ini_set('log_errors', 'On');
require_once (dirname(__FILE__).'/const.php');
require_once (dirname(__FILE__).'/lib/smarty/libs/Smarty.class.php');
require_once (dirname(__FILE__).'/controller/controller.php');
// require_once (dirname(__FILE__).'/controller/model/login.php');
require_once (dirname(__FILE__).'/module/db.php');

class PlainDomain extends CommonController {
	const ROLE = LEVEL0;
	const TYPE = SYSTEM;
	public $strage;
	public $error;
	public $report;
	public $step;

	public function __construct() {
		for ($i = 1; $i <= 4; $i++) {
			$this->step = sprintf("%02d", $i);
			parent::__construct($this->step);

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
		require_once (dirname(__FILE__).'/plane.html');
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
/////////////////////////////////////////////////////////////
new PlainDomain();

/////////////////////////////////////////////////////////////
