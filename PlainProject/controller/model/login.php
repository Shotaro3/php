<?php
class LoginControle extends CommonController {
	const ROLE = LEVEL1;
	const TYPE = LOGIN;

	const ITEM_CODE = 'u_name,u_pswd';
	const DM        = ',';
	//'_';

	public $strage;
	public $report;
	public $item_code;
	private $db;

	public function __construct($document) {

		parent::__construct($document[SYSTEM][CODE]);
	}

	// initialize
	public function step00($param) {
		echo '<br>0.モデルのデータを作成します　ふわっと<br>';
		// $this->strage                 = $document;
		// $this->strage['create'][ROLE] = self::ROLE;

		// $this->db = new Mysql();
		// $this->db->setProperty();

	}

	// create item
	public function step01() {
		echo '<br>1.エラーなしなら項目の出力が可能です<br>';
		// $this->strage['create'][ITEM] = explode(self::DM, self::ITEM_CODE);

		// if (false) {
		// 	$this->error = STEP01;
		// } else {

		// }
	}

	// validata
	public function step02() {
		echo '<br>1.エラーなしなら項目になんらかのデータがあることを保証します<br>';
		echo '<br>2.エラーなしなら項目のデータの形式を保証します<br>';

		// if (false) {
		// 	$this->error = STEP02;
		// } else {

		// }
	}

	// consent
	public function step03() {
		echo '<br>3.同意を確認し得たことを保証します<br>';

		// if (false) {
		// 	$this->error = STEP03;
		// } else {

		// }
	}

	// create
	public function step04() {
		echo '<br>4.エラーなしなら処理完了を保証します<br>';

		// if (false) {
		// 	$this->error = STEP04;
		// } else {
		// 	$this->report[CODE] = STEP_END;
		// }
	}
}
