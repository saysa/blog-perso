<?php

namespace app\Entity;

use Framework\Entity;

class Post extends Entity {

	private $_title;
	private $_lead;
	private $_content;
	private $_author;

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->_title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle( $title ) {
		$this->_title = $title;
	}

	/**
	 * @return string
	 */
	public function getLead() {
		return $this->_lead;
	}

	/**
	 * @param string $lead
	 */
	public function setLead( $lead ) {
		$this->_lead = $lead;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->_content;
	}

	/**
	 * @param string $content
	 */
	public function setContent( $content ) {
		$this->_content = $content;
	}

	/**
	 * @return string
	 */
	public function getAuthor() {
		return $this->_author;
	}

	/**
	 * @param string $author
	 */
	public function setAuthor( $author ) {
		$this->_author = $author;
	}
}