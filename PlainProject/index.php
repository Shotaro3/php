<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');

require_once (dirname(__FILE__).'/module/db.php');

//処理深さ　コントローラー　ステップ構造の管理のみ
abstract class controler {
	function __construct($system) {
		$system->test = $this->step1();
	}

	abstract function step1();// 対話　　　必要な項目の通知
	abstract function step2();// 精査　　　入力内容のチェック・意訳
	abstract function step3();// 事前確認　実行する内容の通知
	abstract function step4();// 実行　　　実行結果の通知
	abstract function step5();// 終了　　　切り戻しが必要か確認なければ終了

}

//処理の幅　ドメイン　機能の種類でモデルを利用する
class domain extends controler {

	function __construct($system) {
		parent::__construct($system);
	}

	function step1() {
		return 'DB操作するのかー';
	}
	function step2() {
		return 'クエリはただしいのかー';
	}
	function step3() {
		return '実行内容にもんだいないのかー';
	}
	function step4() {
		return 'そうなのかー';
	}
	function step5() {
		return 'コミットしていいのかー';
	}

}

//　処理のフロー管理　フロー定義体と状況把握のみ
class PlainSystem {
	//フローと現在地の管理用
	// use flow;
	//ドメインからの問い合わせ項目の保持
	// use querys;

	// 処理系
	private $common;
	private $unique;

	// 描画系
	private $view;
	public $test;

	// 親に持っていく
	const ASK     = 1;
	const NOT_ASK = 0;
	private $flow;
	private $step;

	//　インスタンス化するドメインの選択
	function __construct() {
		$this->test = "test";

		// 親に持っていく
		// 各ドメインからユーザーに問い合わせをするタイミングを定義する
		$this->flow = array(
			'katakana' => array(self::ASK, self::ASK, self::ASK, self::ASK, self::ASK),
			'hiragana' => array(self::ASK, self::ASK, self::ASK, self::ASK, self::ASK)
		);
		// イニシャライズクラスが必要
		$this->step = array(
			'katakana' => 0,
			'hiragana' => 0,
		);

		// 共通処理
		// if (false) {
		$this->common = new domain($this);
		echo 'kakunin:'.$this->test;
		// }
		// //　単一
		// swicth() {
		//     case 'katakana':
		$this->unique = new katakana($this);
		//     break;
		//     case 'hiragana':
		$this->unique = new hiragana($this);
		//     break;
		// }
		// // 画面出力
		// $this->view;
	}

}

// trait frow {
// }
// trait query {
// }

class katakana extends controler {

	function __construct($system) {
		parent::__construct($system);
	}
	function step1() {
		echo 'ステップ1';
		return true;
	}
	function step2() {
		echo 'ステップ2';
		return true;
	}
	function step3() {
		echo 'ステップ3';
		return true;
	}
	function step4() {
		echo 'ステップ4';
		return true;
	}
	function step5() {
		echo 'ステップ5';
		return true;
	}

}
class hiragana extends controler {

	function __construct($system) {
		parent::__construct($system);
	}
	function step1() {
		echo 'すてっぷ1';
		return true;
	}
	function step2() {
		echo 'すてっぷ2';
		return true;
	}
	function step3() {
		echo 'すてっぷ3';
		return true;
	}
	function step4() {
		echo 'すてっぷ4';
		return true;
	}
	function step5() {
		echo 'すてっぷ5';
		return true;
	}

}

new PlainSystem();
exit;
// session_start();

//  セッション系
//define(SESSION_SAVE_PATH, session_save_path());

//var_dump(SESSION_SAVE_PATH);

//$result = sprintf($SENTENCE['CREATE']['DB'], 'NewDB', '', '', '');

//var_dump($result);

/*
DB接続情報です
 */
define('DB_PATH', 'localhost');
define('DB_NAME', 'sample');
define('DB_USER', 'root');
define('DB_PSWD', 'root');

$db = new MySQL();
$db->set_property(DB_PATH, DB_USER, DB_PSWD, DB_NAME);
$db->open();
$mysql_text['database'] = $db->put_query('SHOW DATABASES');

if (isset($_POST['database'])) {
	$db->change_use_database($_POST['database']);
	$db->open();
	$mysql_text['table'] = $db->put_query('SHOW TABLES');

}

// // URL含みを管理したい時に使う
// var_dump($_GET);
// var_dump($_REQUEST);

// and ...true or String only

//'a' and  or var_dump('<br>trueだよ<br>');

// $ret;
// $com = $_POST['command'];

// mkdir ls
//excec() ;
// var_dump(exec($com, $ret).'<br>');

// var_dump($ret);

require_once (dirname(__FILE__).'/plane.html');