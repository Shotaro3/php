<?php

class UserDAO extends commonDAO {
	const CREATE_TABLS = 'ct';
	const DELETE_TABLS = 'dt';
	const ADD_USER     = 'au';
	const DELETE_USER  = 'du';

	const FORMAT_CT = '';
	const FORMAT_DT = 'dt';
	const FORMAT_AU = 'au';
	const FORMAT_DU = 'du';

	private $format;

	public function __construct() {
		$this->format = [
			self::CREATE_TABLS => self::FORMAT_CT,
			self::DELETE_TABLS => self::FORMAT_DT,
			self::ADD_USER     => self::FORMAT_AU,
			self::DELETE_USER  => self::FORMAT_DU,
		];

		parent::__construct();
	}

	public function execute($type) {
		switch (type) {
			case self::CREATE_TABLS:
				break;
			case self::DELETE_TABLS:
				break;
			case self::ADD_USERS:
				break;
			case self::DELETE_USERS:
				break;
		}
	}

	private function db_connetcion() {

	}

}
