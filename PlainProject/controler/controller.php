<?php

abstract class CommonController {
	public function __construct($param) {

		$this->step00($param);
		$code = intval($param[CODE]);

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
		return $this->stepXX();
	}

	abstract function step00($param);
	abstract function step01();
	abstract function step02();
	abstract function step03();
	abstract function step04();
	protected function stepXX() {
		if (!empty($this->error)) {
			$this->report[ERROR]  = $this->error;
			$this->report[STRAGE] = $this->strage;
		}
		$this->report  = $this->strage['create'];
		$rpt['report'] = $this->report;
		print_r($rpt);
		return $rpt;
	}

}
