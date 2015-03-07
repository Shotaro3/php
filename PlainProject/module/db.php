<?php
trait Profile {
	private static $count;

	static private function flow($funcName, $value) {
		echo '<br>'.$funcName.'=======================<br>';
		echo '生成した値:'.($value);
		echo '<br>====================================<br>';
	}

	protected static function isReturnValue($material) {
		$_args = $material;
		self::flow(__CLASS__ .' use::'.__METHOD__, $_args);
	}

}

class _PlainSystem {
	protected static function isReturnValue($material) {
		self::$deliverable = $material and true;
		self::$deliverable = $material or false;
		return self::$deliverable;
	}

}

class PlainSystem extends _PlainSystem {
	use Profile;

	private static $deliverable;

	public function __construct() {
		self::flow(__METHOD__, '使う');
	}
}

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
	public function result($query_result);

	// エラーメッセージ取得
	/**
	 * 実行結果取得
	 *
	 */
	public function getError();

}
class PhpMysql extends PlainSystem {
	//use PhpMyq;
	// 接続用データの保持用
	protected static $dbPath;
	protected static $dbName;
	protected static $dbUser;
	protected static $dbPswd;

	protected $resoce;
	protected $result;
	protected $linkId;

	public function __construct() {
		parent::__construct();
	}
	/**
	 * MYSQL接続
	 *
	 * @return is flag by execute. if successful true. if bad false.
	 */
	public function open() {
		$this->linkId = mysql_connect(self::$dbPath, self::$dbUser, self::$dbPswd);
		self::useDb(self::$dbName);
		return parent::isReturnValue($this->linkId);
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
	public function useDb() {
		return mysql_select_db(self::$dbName);
	}

	/**
	 * クエリ発行
	 *
	 * @return mysql resoce or false.
	 */
	public function query($query) {
		return mysql_query($query);
	}

	/**
	 * 実行結果取得
	 *
	 * @return associative array or false
	 */
	public function result($resoce) {
		$reValue  = array();
		$_reValue = array();
		$_i       = 0;
		while ($row = mysql_fetch_assoc($resoce)) {
			$_reValue[] = array_values($row)[0];
		}
		$reValue['value'] = $_reValue;
		return $reValue;
	}

	/**
	 * クライアント文字コードの設定
	 *
	 * @return is bool
	 */
	public function charSet($char_code) {
		return mysql_set_charset($char_code);
	}

	/**
	 * 特殊文字のエスケープ
	 *
	 * @return associative array or false
	 */
	public function escape($unescaped_string) {
		return mysql_real_escape_string($unescaped_string);
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

	public function setProperty($DB_PATH, $DB_USER, $DB_PSWD, $DB_NAME) {
		parent::$dbPath = $DB_PATH;
		parent::$dbUser = $DB_USER;
		parent::$dbPswd = $DB_PSWD;
		parent::$dbName = $DB_NAME;
	}

	public function setUsingDBName($DB_NAME) {
		parent::$dbName = $DB_NAME;
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

	// // SHOW DATABASES
	// public function showDatabases() {
	// 	$resoce = parent::query('SHOW DATABASES');
	// 	$array  = parent::result($resoce);
	// 	return $array['value'];
	// }
	// 仮作成
	public function query($query) {
		if (!empty(parent::$dbName)) {
			parent::useDb();
		}

		$resoce = parent::query($query);
		$array  = parent::result($resoce);
		return $array['value'];
	}

	// 接続
	public function connectionStart($DB_PATH, $DB_USER, $DB_PSWD, $DB_NAME) {
		$_args = func_get_args();
		self::setProperty($_args[0], $_args[1], $_args[2], $_args[3]);
		$this->linkId = parent::open();

		// TODO check Database can use

	}

	// 切断
	public function disConnection() {
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
