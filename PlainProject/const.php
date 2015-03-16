<?php

const DS = DIRECTORY_SEPARATOR;

const USER   = 'USER';
const SYSTEM = 'SYSTEM';

// is all in Class role
// ROLE-STEP3=>LOGIN-01 ...compare user input and db befor re iunput or next view LOGINs
// system level
const ROLE = 'ROLE';
const CODE = 'CODE';
const STEP = 'STEP';
const TYPE = 'TYPE';

const LEVEL0      = 'INFRA';
const ROOT        = '01';
const LEVEL1      = 'DOMAIN';
const LOGIN       = '01';
const LOGIN_CHECK = '01';
const LOGIN_ON    = '02';
const LOGIN_OUT   = '03';
const LEVEL2      = 'MODEL';

// is Step is model
// step　is Warranty scope
// 0.initialize?
const STEP00 = '00';
// 1.notification item
const STEP01 = '01';
// 2.check entered and Consistency.
//   compare master data from input users.
const STEP02 = '02';
// 3.consent got
const STEP03 = '03';
// 4.exec action.
const STEP04 = '04';
// work end
const STEP_END = '99';
// 5.report create and next code
const STEPXX = 'XX';
// RUN is All ACTION
const ALL_STEP = 4;

// kijyun
const DOMAIN = 'DOMAIN';
const MODEL  = 'MODEL';
// data item. example tag attribute  is name
const ITEM = 'ITEM';

// model in memory type
const RESULT = 'RESULT';
const STRAGE = 'STRAGE';
const ERROR  = 'ERROR';
const REPORT = 'REPORT';

// VIEW
// Type code
// VIEWCODE DELIMITA MODEL DELIMITA ITEM(DB)
// if Login PSWD_02_PW => input type password name MODEL[02][PSWD_02]
// query
const CLOSED = '01';
const OPEN   = '02';
const TEXT   = '01';
const DATA   = '02';
const DATE   = '03';

const TYPE_PSWD = 'password';
const TYPE_TEXT = 'text';

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
