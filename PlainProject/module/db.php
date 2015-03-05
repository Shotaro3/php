<?php

// php_mysql使用
//namespace mysql;
class PhpMysql {

	// 主要なデータの保持用
	private $dbPath;
	private $dbName;
	private $dbUser;
	private $dbPswd;

	// 瑣末なデータの保持用
	private $_linkId;
	private $_result;

	public function setProperty($DB_PATH, $DB_USER, $DB_PSWD) {
		$this->dbPath = $DB_PATH;
		$this->dbUser = $DB_USER;
		$this->dbPswd = $DB_PSWD;
	}

	// MYSQL接続
	protected function connect() {
		$this->_linkId = mysql_connect($this->dbPath, $this->dbUser, $this->dbPswd);
	}

	// 切断
	protected function close() {
		return mysql_close($this->$linkId);
	}

	// 接続先DB指定
	protected function select($_dbName = '') {
		$this->dbName = $_dbName != ''?$_dbName:$this->dbName;
		mysqli_select_db($this->_linkId, $this->dbName);
	}

	// クエリ発行
	protected function query($query) {
		$_result = mysql_query($query);
		return $_result;
	}

	// 実行結果取得
	protected function assoc() {
		return mysql_fetch_assoc($result);
	}

	// エラーメッセージ取得
	protected function getError() {
		return mysql_error();
	}

}

class MySQL extends PhpMysql {

	public function __construct() {
	}

	// // 接続情報の登録
	// public function registration($DB_PATH, $DB_USER, $DB_PSWD, $DB_NAME) {
	// 	$_args = func_get_args();
	// 	parent::setProperty($_args[0], $_args[1], $_args[2], $_args[3]);
	//  parent::connect();
	// }

	// SELECT
	public function select() {
	}

	// INSERT
	public function insert() {
	}

	// UPDATE
	public function uodate() {
	}

	// DELETE
	public function delete() {
	}

	// 接続
	public function connectionStart($DB_PATH, $DB_USER, $DB_PSWD, $DB_NAME = '') {
		$_args = func_get_args();
		parent::setProperty($_args[0], $_args[1], $_args[2]);
		parent::connect();

		// TODO check Database can use

		self::report();
	}

	// 切断
	public function disConnection() {
	}

	// private function tryingAgain() {
	// }

	// 通知用
	private function report() {
		$_i   = parent::getError() == null?0:parent::getError();
		$_msg = array('MYSQLエラーなし');

		var_dump($_msg[$_i]);
	}

}

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
