<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');

require_once (dirname(__FILE__).'/module/db.php');

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
$db->connectionStart(DB_PATH, DB_USER, DB_PSWD, DB_NAME);
//$mysql_text = $db->report();
//$mysql_text['database'] = $db->showDatabases();
$mysql_text['database'] = $db->query('SHOW DATABASES');

if (isset($_POST['database'])) {
	$db->connectionStart(DB_PATH, DB_USER, DB_PSWD, $_POST['database']);
	$mysql_text['table'] = $db->query('SHOW TABLES');

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
