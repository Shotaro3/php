<?php

class CommonDAO extends Mysql {
	use DatabaseProperty;
	use Log;

	public function __construct() {
		self::setConfig();
		parent::__construct();
		parent::set_property($this->HOST, $this->DB_NAME, $this->USER, $this->PSWD);
		parent::open();
		self::write(__METHOD__, 'connection > host ['.$this->HOST.'] dbname ['.$this->DB_NAME.'] user ['.$this->USER.'] pswd [*********]');
	}

	protected function query($query_string) {
		$result = parent::put_query($query_string);
		self::write(__METHOD__, 'query [ '.$query_string.'] result [ '.implode($result).' ]');
	}

	protected function commit() {

	}

}