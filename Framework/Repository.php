<?php

namespace Framework;

class Repository {

	protected $_database;

	public function __construct() {

		$this->_database = Registry::get( "database" );
	}

	public function add( Entity $entity ) {

	}

	public function delete( Entity $form ) {

	}

	public function get( $id ) {

	}

	public function update( Entity $form ) {

	}

	public function getList() {

	}
}