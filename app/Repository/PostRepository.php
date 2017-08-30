<?php

namespace app\Repository;

use Framework\Entity;
use Framework\Repository;

class PostRepository extends Repository {

	public function add( Entity $post ) {

		$st = $this->_pdo->prepare( 'INSERT INTO post SET
			title = :title,
			lead = :lead,
			content = :content,
			author = :author,
			created = NOW(),
			modified = NOW()
		' );


		$st->bindValue( ":title", $post->getTitle() );
		$st->bindValue( ":lead", $post->getLead() );
		$st->bindValue( ":content", $post->getContent() );
		$st->bindValue( ":author", $post->getAuthor() );

		$st->execute();
	}

	public function delete( Entity $form ) {
		// TODO: Implement delete() method.
	}

	public function update( Entity $form ) {
		// TODO: Implement update() method.
	}

	public function get( $id ) {
		// TODO: Implement get() method.
	}

	public function getList() {
		// TODO: Implement getList() method.
	}
}