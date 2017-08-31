<?php

namespace app\Repository;

use app\Entity\Post;
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
		$posts = array();

		/** @var \PDO $pdo */
		$pdo = $this->_pdo;
		/** @var \PDOStatement $st */
		$st = $pdo->query( 'SELECT id, title, lead, content, author FROM post' );

		while ( $donnees = $st->fetch( \PDO::FETCH_ASSOC ) ) {
			$posts[] = new Post( $donnees );
		}

		return $posts;
	}
}