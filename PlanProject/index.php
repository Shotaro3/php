<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');

require_once(dirname(__FILE__).'/module/common/db.php');

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

$db = new DB();
$db->setProparty( DB_PATH, DB_USER, DB_PSWD);

