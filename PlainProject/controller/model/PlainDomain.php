<?php
final class Next extends CommonController {
	const LAYER = DOMAIN;
	const ROLE  = 'Next';

	// notification this model code
	const NEXT = 'NEXT';
	const PREV = 'PREV';
	// const RETRY = 'RETRY';
	// const RESTART = 'RESTART';

	public function __construct() {
		$object       = new body();
		$this->report = parent::__construct($object);
	}
	public function step01() {
	}
	public function step02() {
		switch ($strage[CODE]) {
			case NEXT:
				# code...
				break;
			case PREV:
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
}
