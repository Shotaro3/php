<?php

// Aggregation for All Process
abstract class CommonController {
	private $strage;

	public function __construct($object) {
		// put data from childclass
		$flg = $this->step00($object);

		if ($flg) {
			$flg = $this->step01();
		}
		if ($flg) {
			$flg = $this->step02();
		}
		if ($flg) {
			$flg = $this->step03();
		}
		return $this->stepXX($object);
	}

	private function step00($object){
		$this->strage = $object->getCode();
		// [
		// 	CODE => ITEM,
		// 	ITEM => [user_name=>varchar(16),user_pswd=>varchar(16)],
		// ]
		// [
		// 	CODE => LOGIN,
		// 	ITEM => [user_name=>'kanno',user_pswd=>'shotaro'],
		// ]
		// [
		// 	CODE => LOGOUT,
		// 	ITEM => [user_name=>'kanno',user_pswd=>'shotaro'],
		// ]

		return true;
	};
	abstract function step01();// item check
	abstract function step02();// data check
	abstract function step03();// execute
	private function stepXX($object) {
		$object->setReport($this->strage[REPORT]);
		// [
		// 	REPORT => [
		// 		ROLE => [
		// 			EXECUTE => true,
		// 			ITEM => '[]',
		// 		]
		// 	]
		// ]

		return $true;
	}

}
