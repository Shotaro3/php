<?php
class DB {
	private $link;
	private $msg;
	private $op_flg;

	private $operation;

	private $DB_PATH;
	private $DB_NAME;
	private $DB_USER;
	private $DB_PSWD;

	function __constract () {
		$this->operation = array (
				'setProparty' => 'startConnectionToDB',// when successful operation
			);
	}



	public function setProparty ($DB_PATH, $DB_USER, $DB_PSWD) {
		$this->DB_PATH = $DB_PATH;
	    $this->DB_USER = $DB_USER;
	    $this->DB_PSWD = $DB_PSWD;
	    self::operationCheck(__FUNCTION__);
	}

	// 動作管理
	private function operationCheck($functionName){
		;
	}

	// メッセージ
	private function Massege(){
		$ct['er_msg'] = mysql_error();
	    self::operationCheck(__FUNCTION__);
		// be notification if debug mode  
	}


	// MYSQL接続
	private function startConnectionToDB (){
		$this->link   = mysql_connect(	$this->DB_PATH,
									    $this->DB_USER,
									    $this->DB_PSWD);
	    self::operationCheck(__FUNCTION__);
	}

	// 終了処理
	private function closeConnectionFromDB (){
		$this->op_flg = mysql_close($this->link);
	    self::operationCheck(__FUNCTION__);
	}
}


	// if ($ct['er_msg']) {
	// 	die('問題が発生したのでスクリプトを停止します：'.$error_msg);
	// } else {
	// 	mysql_query('CREATE DATABASE '.'sample_'.time());
	// 	mysql_select_db(DB_NAME);
	// 	$ct['er_msg'] = mysql_error();

	// 	if ($ct['er_msg']) {
	// 		die('問題が発生したのでスクリプトを停止します：'.$error_msg);
	// 	} else {
	// 		print('サクセス!');
	// 	}
	// }




	// DB整備用のコマンドの定義体
	// %1 DB名
	// %2 TABLE名
	// %3 COLUMN名
	// %4 OPTION
//	$SENTENCE = array(
//		'CREATE'  => array(
//			'DB'     => 'CREATE DATABASE %1$s %4$s',
//			'TABLE'  => 'CREATE TABLE %2$s ( %3$s )',
//			'COLUMN' => 'ALTER TABLE %2$s ADD %3$s %4$s',
//		),
//		'READ' => array(
//		),
//		'UPDATA' => array(
//		),
//		'DELETE'  => array(
//			'DB'     => 'DROP DATABASE %1$s',
//			'TABLE'  => 'DROP TABLE %2$s %4$s',
//			'COLUMN' => 'ALTER TABLE %2$s DROP %3$s',
//		),
//
//	);

	// // 管理が面倒なので後で作る
	// $OPTION = array(
	// 	'CREATE' => array(
	// 		//  %1$s：文字コード  %2$s：並び順
	// 		'DB'     => 'CHARACTER SET %1$s COLLATE %2$s;',
	// 		'TABLE'  => '',
	// 		'COLUMN' => '',
	// 	),
	// 	'READ' => array(
	// 		// 'DB' => ,
	// 		// 'TABLE' =>,
	// 		// 'COLUMN' =>,
	// 		// データベースの定義確認などか
	// 	),
	// 	'UPDATA' => array(
	// 		// 'DB' =>,
	// 		// 'TABLE' =>,
	// 		// 'COLUMN' =>,
	// 		// データベースの定義変更か
	// 	),
	// 	'DELETE'  => array(
	// 		'DB'     => '',
	// 		'TABLE'  => '',
	// 		'COLUMN' => '',
	// 	),
	// );
