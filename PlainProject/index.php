<?php
ini_set('display_errors', 1);
ini_set('log_errors', 'On');

require_once (dirname(__FILE__).'/const.php');
require_once (dirname(__FILE__).'/lib/smarty/libs/Smarty.class.php');
require_once (dirname(__FILE__).'/lib/common/FileUtility.php');
require_once (dirname(__FILE__).'/lib/common/Log.php');
// require_once (dirname(__FILE__).'/controller/controller.php');
// require_once (dirname(__FILE__).'/controller/model/PlainDomain.php');
// require_once (dirname(__FILE__).'/controller/model/login.php');
// require_once (dirname(__FILE__).'/module/db.php');

$log = new Log();
$log->write(Log::TEST, 'test');
/////////////////////////////////////////////////////////////
require_once ('/Applications/MAMP/htdocs/PHP/PlainProject/plane.html');

/////////////////////////////////////////////////////////////
