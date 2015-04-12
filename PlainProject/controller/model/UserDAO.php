<?php

class UserDAO extends commonDAO {
	const CREATE_TABLES = 'ct';
	const DELETE_TABLES = 'dt';
	const ADD_USER      = 'au';
	const DELETE_USER   = 'du';

	const FORMAT_CT = 'CREATE TABLE t_user (id int,name varchar(20),password varchar(20))';
	const FORMAT_DT = 'DROP TABLE t_user';
	const FORMAT_AU = 'au';
	const FORMAT_DU = 'du';

	const ID   = 'id';
	const NAME = 'name';
	const PSWD = 'password';

	private $format;
	private $column;

	public function __construct() {
		$this->format = [
			self::CREATE_TABLES => self::FORMAT_CT,
			self::DELETE_TABLES => self::FORMAT_DT,
			self::ADD_USER      => self::FORMAT_AU,
			self::DELETE_USER   => self::FORMAT_DU,
		];
		$this->column = [
			self::ID   => parent::INT,
			self::NAME => parent::VAR_CHARA,
			self::PSWD => parent::VAR_CHARA
		];

		parent::__construct();
	}

	public function execute($type) {
		$query = $this->format[$type];
		parent::query($query);
	}

	private function ganalate($type) {
		$query = sprintf($this->format[$type], self::ID.' '.$this->column[self::ID], self::NAME.' '.$this->column[self::NAME], self::PSWD.' '.$this->column[self::PSWD]);
		return $query;
	}

}
