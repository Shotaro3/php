<?php

const DS = DIRECTORY_SEPARATOR;

const USR = 'USER';
const SYS = 'SYSTEM';

// is all in Class role
// ROLE-STEP3=>LOGIN-01 ...compare user input and db befor re iunput or next view LOGINs
const ROLE   = 'ROLE';
const LEVEL0 = 'INFRA';
const LEVEL1 = 'CONTROLER';
const LEVEL2 = 'MODEL';

// is
const LOGIN = '01';

// is Step is model
// step　is Warranty scope
// 1.check entered.
const STEP01 = '01';
// 2.check Consistency.
const STEP02 = '02';
// 3.compare database from input users. exec action.
const STEP03 = '03';
// 4.atoshori toka
const STEP04 = '04';
// create items reinput or next view.
const STEPXX = 'XX';

// kijyun
const MODEL = 'MODEL';
// data item. example tag attribute  is name
const ITEM = 'ITEM';
// Attainment target
const CODE = 'CODE';

class SystemConst {
	const ROLE = LEVEL0;

	public function __construct() {
		$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
		$PATH          = [
			'ROOT'      => [
				'DOCUMENT' => $DOCUMENT_ROOT.DS,
				'MODULE'   => $DOCUMENT_ROOT.DS.'module'.DS,
			],
		];

		var_dump($PATH);

	}
}
