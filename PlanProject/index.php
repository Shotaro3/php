<?php
session_start();

//	セッション系
//define(SESSION_SAVE_PATH, session_save_path());

//var_dump(SESSION_SAVE_PATH);

// DB整備用のコマンドの定義体
// %1 TABLE名 
// %2 COLUMN名
// %3 OPTION
$SENTENCE = array(
		'CREATE' => array(
				'DB' = > 'CREATE DATABASE %1$s %3$s',
				'TABLE' => 'CREATE TABLE %1$s ( %2$s )',
				'COLUMN' => 'ALTER TABLE %1$s ADD %2$s %3$s',
			),
		'READ' => array(
				// 'DB' => ,
				// 'TABLE' =>,
				// 'COLUMN' =>,
			// データベースの定義確認などか
			),
		'UPDATA' => array(
				// 'DB' =>,
				// 'TABLE' =>,
				// 'COLUMN' =>,
			// データベースの定義変更か
			),
		'DELETE' => array(
				'DB' => 'DROP DATABASE %1$s',
				'TABLE' => 'DROP TABLE %1$s %3$s',
				'COLUMN' => 'ALTER TABLE %1$s DROP %2$s',
			),

	);
// コマンド生成用
$COLUMN = array(
		’name’,
		'type',
	);

/*
	DB接続情報です
*/
define(DB_PATH, 'localhost');
define(DB_NAME, 'sample');
define(DB_USER, 'root');
define(DB_PSWD, 'root');

// コントロール系
$ct = array(
'link'		=> '', 
'er_msg'	=> '', 
'cls_msg'	=> '', 
);


// MYSQL接続
$ct['link']		=	mysql_connect(DB_PATH, DB_USER, DB_PSWD);
$ct['er_msg']	=	mysql_error();

if ($ct['er_msg']) {
	die('問題が発生したのでスクリプトを停止します：'.$error_msg);
} else {

	mysql_query('CREATE DATABASE '.'sample_'.time());
	mysql_select_db(DB_NAME);

	if ($ct['er_msg']){
		die('問題が発生したのでスクリプトを停止します：'.$error_msg);
	} else {

		print('サクセス!');
	}
	// 終了処理
	$ct['cls_msg']	=	mysql_close($ct['link']);
}
//	同じようなネストができているので、
// 処理内容を登録しておいて、再帰的に実行できないか。
//	内部でSTEP的な値をもち、成功したらインクリメントし、再帰処理をする。
//	STEPによって処理内容を変える（条件は変えない）
//	もし処理が失敗したら例外処理用のモジュールを呼ぶ的な、エラー詳細はそちらで管理する

var_dump($ct);



?>
