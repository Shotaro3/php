<?php

const DS = DIRECTORY_SEPARATOR;

const USER   = 'USER';
const SYSTEM = 'SYSTEM';

const ROLE = 'ROLE';// 役割

const STEP = 'STEP';// 同一オブジェクトのメソッドを複数使う場合(上位のレイヤー)用
const CODE = 'CODE';// モデル・ドメインのできること
const ITEM = 'ITEM';// コード実行の材料

const LAYER  = 'LAYER';//  階層
const DOMAIN = 'DOMAIN';// ユビキタス　仕様の実装　複数種類のモデルを利用したフローを作成
const MODEL  = 'MODEL';//  モデル　　　分野ごとの処理を慣用な形に組む　複数種類のモジュールのフローを作成
const LOGIN  = 'LOGIN';
const LOGOUT = 'LOGOUT';

const STEP_START = '0';
const STEP01     = '1';
const STEP02     = '2';
const STEP03     = '3';
const STEP_END   = '9';

// コントローラ上でサブクラスのデータを扱う為の抽象データのくくり
const STRAGE = 'STRAGE';
// コントローラから呼び出し元に報告するデータのくくり
const RESULT  = 'REPORT';
const EXECUTE = 'EXECUTE';// コード実行結果 bool
//               ITEM

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

class body {
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
