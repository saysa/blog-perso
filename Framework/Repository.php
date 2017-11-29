<?php

namespace Framework;

abstract class Repository {

	protected $_pdo;
	protected $container;

	public function __construct(Container $container) {

	    $this->container = $container;
		$this->_pdo = $this->container->get('database')->getPdo();
	}

	abstract function add( Entity $entity );

	abstract function delete( Entity $form );

	abstract function get( $id );

	abstract function update( Entity $form );

	abstract function getList();
}