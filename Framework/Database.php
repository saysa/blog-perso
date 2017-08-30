<?php

namespace Framework;

class Database {

	protected $_pdo;
	protected $_pdoOptions;

	public function __construct( array $pdo_options ) {

		$this->_pdoOptions = $pdo_options;
	}

	public function connect() {

		$this->_pdo = new \PDO( 'mysql:host=' . $this->_pdoOptions['host'] . ';dbname=' . $this->_pdoOptions['dbname'] . ';port=' . $this->_pdoOptions['port'], $this->_pdoOptions['username'], $this->_pdoOptions['password'],
			array( \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ) );

		return $this;
	}

	/**
	 * @return \PDO
	 */
	public function getPdo() {
		return $this->_pdo;
	}
}