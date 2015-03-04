<?php
class SimpleControlDB {

	private static $link;
	private static $DB_PATH;
	private static $DB_NAME;
	private static $DB_USER;
	private static $DB_PSWD;

	// MYSQL接続
	protected static function startConnectionToDB() {
		$this->link = mysql_connect($this->DB_PATH,
			$this->DB_USER,
			$this->DB_PSWD);
	}

	// 終了処理
	protected static function closeConnectionFromDB() {
		$this->op_flg = mysql_close($this->link);
	}

	// エラーメッセージ取得
	protected static function mysqlError() {
		return mysql_error();
	}

}

class DB extends SimpleControlDB {
	//	private $mode;
	private $state;
	private $operation;

	public function __construct() {
		// initialize
		//

		// うまいこと　処理→チェック　の繰り返しを出来る仕組みを作りたい
		$this->state['stage'] = array(
			'waning', 'unconnected', 'connected', );
		$this->state['index'] = 1;

		$this->operation = array(
			'unconnected' => array(
				'startConnectionToDB',
			),
		);
	}

	// 起動
	public function begin() {
		// // initialize
		// $this->operation['index'] = 0;

		// while (true) {
		// 	// cache
		// 	$s_index = $this->state['index'];
		// 	$s_stage = $this->state['stage'][$s_index];
		// 	$operate = $this->operation[$s_stage];

		// 	if (!isset($operate[$this->operation['index']])) {
		// 		break;
		// 	}

		// 	$result                   = false;
		// 	$result                   = call_user_func($operate[$this->operation['index']]);
		// 	$this->operation['index'] = $result?$this->operation['index']++:$this->operation['index'];
		// }

		self::operationCheck(__FUNCTION__);
	}

	// 動作管理
	private function operationCheck($functionName) {

		//		self::operationCheck(__FUNCTION__);
	}

	private function tryingAgain() {

		self::operationCheck(__FUNCTION__);
	}

	private function Notification() {
		$ct['er_msg'] = mysql_error();
		self::operationCheck(__FUNCTION__);
		// be notification if debug mode
	}

	public function setProparty($DB_PATH, $DB_USER, $DB_PSWD) {
		$this->DB_PATH = $DB_PATH;
		$this->DB_USER = $DB_USER;
		$this->DB_PSWD = $DB_PSWD;
		self::operationCheck(__FUNCTION__);
	}

}

// if ($ct['er_msg']) {
//  die('問題が発生したのでスクリプトを停止します：'.$error_msg);
// } else {
//  mysql_query('CREATE DATABASE '.'sample_'.time());
//  mysql_select_db(DB_NAME);
//  $ct['er_msg'] = mysql_error();

//  if ($ct['er_msg']) {
//      die('問題が発生したのでスクリプトを停止します：'.$error_msg);
//  } else {
//      print('サクセス!');
//  }
// }

// DB整備用のコマンドの定義体
// %1 DB名
// %2 TABLE名
// %3 COLUMN名
// %4 OPTION
//  $SENTENCE = array(
//      'CREATE'  => array(
//          'DB'     => 'CREATE DATABASE %1$s %4$s',
//          'TABLE'  => 'CREATE TABLE %2$s ( %3$s )',
//          'COLUMN' => 'ALTER TABLE %2$s ADD %3$s %4$s',
//      ),
//      'READ' => array(
//      ),
//      'UPDATA' => array(
//      ),
//      'DELETE'  => array(
//          'DB'     => 'DROP DATABASE %1$s',
//          'TABLE'  => 'DROP TABLE %2$s %4$s',
//          'COLUMN' => 'ALTER TABLE %2$s DROP %3$s',
//      ),
//
//  );

// // 管理が面倒なので後で作る
// $OPTION = array(
//  'CREATE' => array(
//      //  %1$s：文字コード  %2$s：並び順
//      'DB'     => 'CHARACTER SET %1$s COLLATE %2$s;',
//      'TABLE'  => '',
//      'COLUMN' => '',
//  ),
//  'READ' => array(
//      // 'DB' => ,
//      // 'TABLE' =>,
//      // 'COLUMN' =>,
//      // データベースの定義確認などか
//  ),
//  'UPDATA' => array(
//      // 'DB' =>,
//      // 'TABLE' =>,
//      // 'COLUMN' =>,
//      // データベースの定義変更か
//  ),
//  'DELETE'  => array(
//      'DB'     => '',
//      'TABLE'  => '',
//      'COLUMN' => '',
//  ),
// );
