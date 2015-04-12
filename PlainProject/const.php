<?php

define('STG', 'stg');
define('WWW', 'www');

define('MODE', STG);

class ProjectConfig {

	/**
	 * ログファイル
	 **/
	const FILE_LOG_ALL = 'plainSystem.log';

	/**
	 * パス
	 **/
	const DIR_LOG = '/Applications/MAMP/htdocs/php/PlainProject/logs/';

}

trait DatabaseProperty {
	private function setConfig() {
		switch (MODE) {
			case WWW:
				# code...
				break;
			case STG:
				$this->HOST    = 'localhost';
				$this->DB_NAME = 'plain';
				$this->USER    = 'root';
				$this->PSWD    = 'root';
				break;
			default:
				# code...
				break;
		}
	}
}
class DbCode {
	const int     = 'int';
	const varchar = 'varchar(20)';
}
