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
	private $report;

	public function __construct() {
		$this->values['USR']          = $_REQUEST[MODEL];
		$this->values['SYS']['SHELL'] = $_ENV['SHELL'];
		$this->values['SYS']['USER']  = $_ENV['USER'];
	}

	public function getDocument($type) {
		$document;
		$document = $this->values['USR'][$type];
		return $document;
	}

	public function setReport($report) {
		$this->report = $report;
	}
}

class work {
	const ROLE = LOGIN;
	const ITEM = 'u_name,u_pswd';

	private $strage;
	private $report;

	public function __construct($root_model) {
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

		var_dump($this->strage);
	}

	private function step01() {
		echo '<br>1.エラーなしなら項目になんらかのデータがあることを保証します<br>';

		if (false) {
			$this->error = STEP01;
		}

	}

	private function step02() {
		echo '<br>2.エラーなしなら項目のデータの形式を保証します<br>';

		$this->report[ITEM] = self::ITEM;
		$this->report[CODE] = STEP04;

		if (false) {
			$this->error = STEP02;
		}
	}

	// create
	private function step03() {
	}

	// output
	private function step04() {
		echo '<br>3.エラーなしなら処理完了を保証します<br>';

		$this->report[ITEM] = self::ITEM;
		$this->report[CODE] = 'FIX';
	}

	// error
	private function stepXX() {
		echo '<br>XX.報告書を作成、処理結果通知・処理に必要な項目の通知<br>';

		if (!empty($this->error)) {
			$this->report[ERROR]    = true;
			$this->report[PROPERTY] = $this->strage;
		}

		return $report[MODEL][self::ROLE] = $this->report;
	}

}
