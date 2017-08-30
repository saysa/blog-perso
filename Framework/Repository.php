<?php

namespace Framework;

abstract class Repository {

	protected $_database;

	public function __construct() {

		$this->_database = Registry::get( "database" );
	}

	abstract function add( Entity $entity );

	abstract function delete( Entity $form );

	abstract function get( $id );

	abstract function update( Entity $form );

	abstract function getList();
}