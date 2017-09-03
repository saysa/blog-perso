<h1><?= $data['post']->getTitle() ?></h1>

<p>
    Par <?= $data['post']->getAuthor() ?><br>
    <a href="">Modifier</a>
</p>

<p>
	<?= $data['post']->getLead() ?>
</p>

<p>
	<?php echo $data['post']->getContent(); ?>
</p>