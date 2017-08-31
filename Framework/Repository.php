<?php

namespace Framework;

abstract class Repository {

	protected $_pdo;

	public function __construct() {

		$this->_pdo = Registry::get( "database" )->getPdo();
	}

	abstract function add( Entity $entity );

	abstract function delete( Entity $form );

	abstract function get( $id );

	abstract function update( Entity $form );

	abstract function getList();
}