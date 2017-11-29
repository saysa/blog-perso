<?php

namespace app\Controller;

use app\Entity\Post;
use app\Repository\PostRepository;
use Framework\Controller;

class BlogController extends Controller {

	public function indexAction() {

		$dm    = new PostRepository($this->container);
		$posts = $dm->getList();
		$this->_actionView->set( "posts", $posts );
	}

	public function addAction() {

		if ( filter_has_var( INPUT_POST, 'submit' ) ) {

			$dm = new PostRepository($this->container);
			$dm->add( new Post( array(
				"title"   => filter_input( INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS ),
				"lead"    => filter_input( INPUT_POST, 'lead', FILTER_SANITIZE_SPECIAL_CHARS ),
				"content" => filter_input( INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS ),
				"author"  => filter_input( INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS ),
			) ) );
		}
	}

	public function editAction( $id ) {

		$dm = new PostRepository($this->container);
		if ( $post = $dm->get( $id ) ) {

			if ( filter_has_var( INPUT_POST, 'submit' ) ) {

				$post = new Post( array(
					"id"      => $id,
					"title"   => filter_input( INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS ),
					"lead"    => filter_input( INPUT_POST, 'lead', FILTER_SANITIZE_SPECIAL_CHARS ),
					"content" => filter_input( INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS ),
					"author"  => filter_input( INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS ),
				) );

				$dm = new PostRepository($this->container);
				$dm->update( $post );

				$this->_actionView->set( "success", true );
			}

			$this->_actionView->set( "post", $post );
		} else {
			// TODO : handle error
		}
	}

	public function deleteAction( $id ) {

		$dm   = new PostRepository($this->container);
		$post = $dm->get( $id );

		$dm->delete( $post );
	}

	public function showAction( $id ) {

		$dm   = new PostRepository($this->container);
		$post = $dm->get( $id );

		$this->_actionView->set( "post", $post );
	}
}