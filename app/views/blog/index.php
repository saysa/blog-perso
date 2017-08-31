<h1>Liste des Articles</h1>

<?php foreach ( $data['posts'] as $post ): ?>
    <article>
        <h2><?= $post->getTitle(); ?></h2>
        <p>
			<?= $post->getLead(); ?>
        </p>
        <div>
            <a href="">En savoir plus</a>
        </div>
    </article>
<?php endforeach; ?>