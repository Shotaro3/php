<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');

require_once (dirname(__FILE__).'/module/db.php');


//処理深さ　コントローラー　ステップ構造の管理のみ
abstract class controler {
	function __construct() {
		$this->step1();
	}

	abstract function step1(); // 対話　　　必要な項目の通知
	abstract function step2(); // 精査　　　入力内容のチェック・意訳
	abstract function step3(); // 事前確認　実行する内容の通知
	abstract function step4(); // 実行　　　実行結果の通知
	abstract function step4(); // 終了　　　切り戻しが必要か確認なければ終了

}

//処理の幅　ドメイン　機能の種類でモデルを利用する
class domain extends controler {

	function __construct() {
		parent::__construct();
	}

	function step1() {
		echo 'step1';
	}
	function step2() {
		echo 'step2';
	}
	function step3() {
		echo 'step3';
	}
	function step4() {
		echo 'step4';
	}
	function step5() {
		echo 'step5';
	}

}

//　処理のフロー管理　フロー定義体と状況把握のみ
class PlainSystem {
	private $dm;

	function __construct() {
		$this->dm = new domain();

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
