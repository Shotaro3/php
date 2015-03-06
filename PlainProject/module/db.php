<?php

// php_mysql使用
//namespace mysql;
interface DAO {
	/**
	 * MYSQL接続
	 *
	 * @param no argument
	 */
	public function open();

	/**
	 * 切断
	 *
	 * @param linkid is passed from connected databases is string
	 */
	public function quit($linkId);

	/**
	 * 接続先DB指定
	 *
	 * @param dbname is string type argument. value is that database name.
	 */
	public function useDb($dbName);

	/**
	 * クエリ発行
	 *
	 */
	public function query($query);

	/**
	 * 実行結果取得
	 *
	 */
	public function result();

	// エラーメッセージ取得
	/**
	 * 実行結果取得
	 *
	 */
	public function getError();

}
class PhpMysql implements DAO {
	// 接続用データの保持用
	protected static $dbPath;
	protected static $dbName;
	protected static $dbUser;
	protected static $dbPswd;

	public function __construct() {
	}
	/**
	 * MYSQL接続
	 *
	 * @return is flag by execute. if successful true. if bad false.
	 */
	public function open() {
		return mysql_connect(self::$dbPath, self::$dbUser, self::$dbPswd);
	}

	/**
	 * 切断
	 *
	 * @return is flag by execute. if successful true. if bad false.
	 */
	public function quit($linkId) {
		return mysql_close($linkId);
	}

	/**
	 * 接続先DB指定
	 *
	 * @return is flag by execute. if successful true. if bad false.
	 */
	public function useDb($dbName) {
		return mysqli_select_db($dbName);
	}

	/**
	 * クエリ発行
	 *
	 * @return is flag by execute. if successful true. if bad false.
	 */
	public function query($query) {
		return mysql_query($query) != false?true:false;
	}

	/**
	 * 実行結果取得
	 *
	 * @return associative array or false
	 */
	public function result() {
		return mysql_fetch_assoc($result);
	}

	// エラーメッセージ取得
	/**
	 * 実行結果取得
	 *
	 * @return string or false
	 */
	public function getError() {
		return mysql_error() == ''?false:mysql_error();
	}

}

class MySQL extends PhpMysql {

	// クラスの主要なデータの保持用
	private $query;

	// クラスの瑣末なデータの保持用
	private $_linkId;
	private $_result;

	public function setProperty($DB_PATH, $DB_USER, $DB_PSWD) {
		parent::$dbPath = $DB_PATH;
		parent::$dbUser = $DB_USER;
		parent::$dbPswd = $DB_PSWD;
	}

	public function __construct() {
		parent::__construct();

	}

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
	public function connectionStart($DB_PATH, $DB_USER, $DB_PSWD, $DB_NAME) {
		$_args = func_get_args();
		self::setProperty($_args[0], $_args[1], $_args[2]);
		parent::open();

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

		var_dump(array('報告', $_msg[$_i], parent::getError()));
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
