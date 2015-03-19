<?php

class LoginControle extends CommonController {
	const LAYER = MODEL;
	const ROLE  = LOGIN;

	public function __construct($object) {
		parent::__construct($object);
	}

	public function step01() {

	}

	public function step02() {
	}

	// execute
	public function step03() {
		switch (parent::$strage[CODE]) {
			case ITEM:
				// 項目
				// SHOW COLUMN
				break;
			case LOGIN:
				// ログイン
				// SELECT UPDATA
				break;
			case LOGOUT:
				// ログアウト
				// SELECT UPDATA
				break;
		}
		return [EXECUTE => true, ITEM => ['name' => 'kanno', 'pswd' => 'taro']];
	}

}
