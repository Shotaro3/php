<?php

/////////////////////////////////////////////////////////////
require_once (dirname(__FILE__).'/module/db.php');
require_once (dirname(__FILE__).'/const.php');
require_once (dirname(__FILE__).'/lib/smarty/libs/Smarty.class.php');
$vew = new Smarty();

$doc = new Document('debug');

new work($doc);

// read on file
require_once (dirname(__FILE__).'/plane.html');
/////////////////////////////////////////////////////////////

class document {
	private $values;

	public function __construct() {
		$this->values['USR']          = $_REQUEST;
		$this->values['SYS']['SHELL'] = $_ENV['SHELL'];
		$this->values['SYS']['USER']  = $_ENV['USER'];

		var_dump($this->values);
	}
}

class work {
	const ROLE = 'MODEL';
	const CODE = '01';
	const BIND = 'db,tb';

	// is global in class variable
	// bind to key on material value
	private $strage;

	private $report;

	public function __construct($material) {
		$this->strage = $material[self::ROLE][self::CODE];

		$this->step1() or $this->stepX(1);
		// $this->step2() or $this->stepX();
		// $this->step3() or $this->stepX();
		// $this->step4() or $this->stepX();
		//$material = $this->report;
	}

	private function step1() {
		$flg = true;
		// check
		$flg = (implode($this->strage)) != ''?true:false;

		return false;
	}

	// private function step2(){
	// 	$flg = true;
	// 	$this->value[MODEL_CODE]['chack'] = $flg;
	// }

	// // create
	// private function step3(){
	// 	$flg = true;
	// 	$this->value[MODEL_CODE]['create'] = ;
	// }

	// // output
	// private function step4(){
	// 	$flg = true;
	// 	$this->value[MODEL_CODE]['ask'] = $ask;

	// 	return $flg;
	// }

	// error
	private function stepX($step_code) {
		$report['REPORT']["error"][self::ROLE][self::CODE] = $step_code;
	}

}
