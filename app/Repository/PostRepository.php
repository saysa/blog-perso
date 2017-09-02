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

	/**
	 * Get the Post with id $id
	 *
	 * @param $id
	 *
	 * @return Post
	 */
	public function get( $id ) {
		$id = (int) $id;
		/** @var \PDO $pdo */
		$pdo = $this->_pdo;

		$st   = $pdo->query( 'SELECT id, title, lead, content, author, created, modified FROM post WHERE id = ' . $id );
		$data = $st->fetch( \PDO::FETCH_ASSOC );

		return new Post( $data );
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