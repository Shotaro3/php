<?php

abstract class CommonController {
	public function __construct($code) {
		$this->step00();
		if (gettype($code) == 'string') {
			switch ($code) {
				case STEP01:
					$this->step01();
					break;
				case STEP02:
					$this->step02();
					break;
				case STEP03:
					$this->step03();
					break;
				case STEP04:
					$this->step04();
					break;

				default:
					echo 'ERROR';
					break;
			}
		} else {
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
		}
		return $this->stepXX($code);
	}

	abstract function step00();
	abstract function step01();
	abstract function step02();
	abstract function step03();
	abstract function step04();
	protected function stepXX($code) {
		if (!empty($this->error)) {
			$this->report[ERROR]  = $this->error;
			$this->report[STRAGE] = $this->strage;
		}
		$this->strage[REPORT]                             = '今はなし';
		$this->report                                     = $this->strage[REPORT];// report only
		$rpt[static ::ROLE][static ::TYPE][$code][REPORT] = $this->report;
		print_r($rpt);
		// switch (static::ROLE) {
		// 	case LEVEL0:
		return $rpt;
		// 	break;
		// case LEVEL1:
		// 	$this->document = $rpt;
		// 	break;

		// default:
		// 	# code...
		// 	break;
		// }
	}

}
