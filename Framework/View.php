<?php

namespace Framework;

class View {

	protected $_file;

	/**
	 * @param string $file
	 */
	public function setFile( $file ) {
		$this->_file = $file;
	}
}