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

// 基本的なMYSQLの機能を提供します
class MySQL {

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

	private $query;

	public function __construct() {
		// モジュール読み込み
		$this->mysql = new PhpMysql();
	}

	// 接続用パラメータのセット用です
	protected function set_property($DB_PATH, $DB_NAME, $DB_USER, $DB_PSWD) {
		self::$dbPath = $DB_PATH;
		self::$dbName = $DB_NAME;
		self::$dbUser = $DB_USER;
		self::$dbPswd = $DB_PSWD;
	}

	// 接続
	protected function open() {
		$this->linkId = $this->mysql->connect(self::$dbPath, self::$dbUser, self::$dbPswd);
	}

	// 切断
	protected function close() {
	}

	// 接続先DBの再指定用です
	protected function change_use_database($db_name) {
		self::$dbName = $db_name;
	}

	protected function put_query($query_string) {
		$this->mysql->select_db(self::$dbName);

		$this->resoce = $this->mysql->query($query_string);
		$this->result = $this->get_content($this->resoce);
		return $this->result;
	}

	protected function get_content($query_resoce) {
		// 余裕があったら別にまとめるかuseするかして隠す
		$reValue  = array();
		$_reValue = array();
		while ($row = $this->mysql->fetch_assoc($query_resoce)) {
			$_reValue[] = array_values($row)[0];
		}
		$reValue = $_reValue;

		return $reValue;
	}

	protected function error() {
	}

	// private function tryingAgain() {
	// }

}
