<?php
ini_set('display_errors', 1);
ini_set('log_errors', 'On');
require_once (dirname(__FILE__).'/const.php');
require_once (dirname(__FILE__).'/lib/smarty/libs/Smarty.class.php');
class XXXXXX {
	private $values;
	private $view_param;
	private $report;

	public function __construct() {
		$this->values['USR']          = $_REQUEST[MODEL];
		$this->values['SYS']['SHELL'] = $_ENV['SHELL'];
		$this->values['SYS']['USER']  = $_ENV['USER'];

		// view param format create
		// ...code
	}

	// [MODEL][ITEM]...
	public function setViewParam($param) {
		$this->view_param = $param;
	}

	public function getDocument($type) {
		$document;
		$document = $this->values['USR'][$type];
		return $document;
	}

	public function setReport($role, $report) {
		$this->report[][$role] = $report;
	}
}

require_once (dirname(__FILE__).'/controler/model/login.php');
require_once (dirname(__FILE__).'/module/db.php');
/////////////////////////////////////////////////////////////
$vew = new Smarty();

$XXXX = new XXXXXX();

$XXXX->setReport(LOGIN, new work($XXXX->getDocument(LOGIN)));

// read on file
require_once (dirname(__FILE__).'/plane.html');
/////////////////////////////////////////////////////////////
