<?php
ini_set('display_errors', 1);
ini_set('log_errors', 'On');
/////////////////////////////////////////////////////////////
require_once (dirname(__FILE__).'/module/db.php');
require_once (dirname(__FILE__).'/const.php');
require_once (dirname(__FILE__).'/lib/smarty/libs/Smarty.class.php');
$vew = new Smarty();

$XXXX = new XXXXXX();

new work($XXXX);

// read on file
require_once (dirname(__FILE__).'/plane.html');
/////////////////////////////////////////////////////////////

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

	public function setReport($report) {
		$this->report[] = $report;
	}
}

class work {
	const ROLE      = LOGIN;
	const ITEM_CODE = 'u_name,u_pswd';
	const DM        = ',';

	private $strage;
	private $report;
	private $item_code;

	public function __construct($root_model) {
		//this->initialize start

		//this->initialize end

		//parent::initialize start
		$this->strage = $root_model->getDocument(self::ROLE);
		$code         = intval($this->strage[CODE]);
		$property     = $this->strage[ITEM];
		//parent::initialize end

		// parent::script start
		if (1 <= $code) {
			$this->step01();
		}
		if (2 <= $code) {
			$this->step02();
		}
		if (3 <= $code) {
			$this->step03();
		}
		if (4 <= $code) {
			$this->step04();
		}
		$root_model->setReport($this->stepXX());
		// parent::script end

		var_dump($this->stepXX());
	}

	protected function step01() {
		echo '<br>1.エラーなしなら項目の出力が可能です<br>';
		$this->strage['create'][ITEM] = explode(self::DM, self::ITEM_CODE);

		if (false) {
			$this->error = STEP01;
		} else {

		}
	}

	//
	protected function step02() {
		echo '<br>1.エラーなしなら項目になんらかのデータがあることを保証します<br>';
		echo '<br>2.エラーなしなら項目のデータの形式を保証します<br>';

		if (false) {
			$this->error = STEP02;
		} else {

		}
	}

	// validata
	protected function step03() {
		echo '<br>3.同意を確認したことを保証します<br>';

		if (false) {
			$this->error = STEP03;
		} else {

		}
	}

	// create
	protected function step04() {
		echo '<br>4.エラーなしなら処理完了を保証します<br>';

		if (false) {
			$this->error = STEP04;
		} else {
			$this->report[CODE] = STEP_END;
		}
	}

	// output
	protected function stepXX() {
		echo '<br>XX.報告書を作成、処理結果通知・処理に必要な項目の通知<br>';
		$report;

		if (!empty($this->error)) {
			$this->report[ERROR]    = true;
			$this->report[PROPERTY] = $this->strage;
		}
		$this->report[ITEM]        = $this->strage['create'];
		$report[MODEL][self::ROLE] = $this->report;
		return $report;
	}

}
