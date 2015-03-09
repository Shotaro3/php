<?php
// trait Profile {
// 	private static $count;

// 	static private function flow($funcName, $value) {
// 		echo '<br>'.$funcName.'=======================<br>';
// 		echo '生成した値:'.($value);
// 		echo '<br>====================================<br>';
// 	}

// 	protected static function isReturnValue($material) {
// 		$_args = $material;
// 		self::flow(__CLASS__ .' use::'.__METHOD__, $_args);
// 	}

// }

// class _PlainSystem {
// 	protected static function isReturnValue($material) {
// 		self::$deliverable = $material and true;
// 		self::$deliverable = $material or false;
// 		return self::$deliverable;
// 	}

// }

// class PlainSystem extends _PlainSystem {
// 	use Profile;

// 	private static $deliverable;

// 	public function __construct() {
// 		self::flow(__METHOD__, '使う');
// 	}
// }

// php＿mysqlのラッパークラスです
class PhpMysql {

	public function __construct() {
	}

	/**
	 * MYSQL接続
	 *
	 * @return is flag by execute. if successful true. if bad false.
	 */
	public function connect($dbPath, $dbUser, $dbPswd) {
		$link_id = mysql_connect($dbPath, $dbUser, $dbPswd);
		return $link_id;
	}

	/**
	 * 切断
	 *
	 * @return is flag by execute. if successful true. if bad false.
	 */
	public function close($link_id) {
		return mysql_close($link_id);
	}

	/**
	 * 接続先DB指定
	 *
	 * @return is flag by execute. if successful true. if bad false.
	 */
	public function select_db($db_name) {
		return mysql_select_db($db_name);
	}

	/**
	 * クエリ発行
	 *
	 * @return mysql resoce or false.
	 */
	public function query($query) {
		$resoce = mysql_query($query);
		return $resoce;
	}

	/**
	 * 実行結果取得
	 *
	 * @return associative array or false
	 */
	public function fetch_assoc($resoce) {
		$result = mysql_fetch_assoc($resoce);
		return $result;
	}

	/**
	 * クライアント文字コードの設定
	 *
	 * @return is bool
	 */
	public function set_charset($char_code) {
		return mysql_set_charset($char_code);
	}

	/**
	 * 特殊文字のエスケープ
	 *
	 * @return associative array or false
	 */
	public function real_escape_string($unescaped_string) {
		return mysql_real_escape_string($unescaped_string);
	}

	// エラーメッセージ取得
	/**
	 * 実行結果取得
	 *
	 * @return string or false
	 */
	public function error() {
		return mysql_error() == ''?false:mysql_error();
	}

}

// データベースアクセスオブジェクトの規格を明記します
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
	public function close();

	/**
	 * 接続先DB指定
	 *
	 * @param dbname is string type argument. value is that database name.
	 */
	public function change_use_database($dbName);

	/**
	 * クエリ発行
	 *
	 */
	public function put_query($query);

	/**
	 * 実行結果取得
	 *
	 */
	public function get_content($query_result);

	// エラーメッセージ取得
	/**
	 * 実行結果取得
	 *
	 */
	public function error();

}

// 基本的なMYSQLの機能を提供します
class MySQL implements DAO {

	// MYSQLインスタンス
	private $mysql;

	// 接続用データの保持用
	protected static $dbPath;
	protected static $dbUser;
	protected static $dbPswd;
	protected static $dbName;

	protected $resoce;
	protected $result;
	protected $linkId;

	// クラスの主要なデータの保持用
	private $query;

	// 接続用パラメータのセット用です
	public function set_property($DB_PATH, $DB_USER, $DB_PSWD, $DB_NAME) {
		self::$dbPath = $DB_PATH;
		self::$dbUser = $DB_USER;
		self::$dbPswd = $DB_PSWD;
		self::$dbName = $DB_NAME;
	}

	// 接続
	public function open() {
		// 余裕があったら別にまとめるかuseするかして隠す
		// TODO check Database can use
		$this->linkId = $this->mysql->connect(self::$dbPath, self::$dbUser, self::$dbPswd);
	}

	// 切断
	public function close() {
	}

	// 接続先DBの再指定用です
	public function change_use_database($DB_NAME) {
		self::$dbName = $DB_NAME;
	}

	// DBコネクタのインスタンス生成です
	public function __construct() {
		// モジュール読み込み
		$this->mysql = new PhpMysql();

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

	// 仮作成
	public function put_query($query_string) {
		$this->mysql->select_db(self::$dbName);

		$this->resoce = $this->mysql->query($query_string);
		$this->result = $this->get_content($this->resoce);
		return $this->result;
	}

	public function get_content($query_resoce) {
		// 余裕があったら別にまとめるかuseするかして隠す
		$reValue  = array();
		$_reValue = array();
		while ($row = $this->mysql->fetch_assoc($query_resoce)) {
			$_reValue[] = array_values($row)[0];
		}
		$reValue = $_reValue;

		return $reValue;
	}

	public function error() {
	}

	// private function tryingAgain() {
	// }

}

// class Generate implements Safeties {

// 	public function __construct() {
// 		//$standard = new Standard();

// 	}

// 	public static function String($material) {

// 		return $deliverable;
// 	}

// }
// // 定義値の規格
// interface Variable {
// 	//
// }
// 定義のリストです
//class Standard implements Variable {
//
//}

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
