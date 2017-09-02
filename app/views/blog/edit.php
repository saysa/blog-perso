<h1>Modifier le post : <?= $data['post']->getTitle() ?></h1>

<?php if ( isset( $data['success'] ) ): ?>
    <div>
        Le post a bien été modifié
    </div>
<?php endif; ?>

<form method="post" action="">
    <div>
        <label for="title">Titre :</label><br>
        <input type="text" name="title" id="title" value="<?= $data['post']->getTitle() ?>">
    </div>
    <div>
        <label for="lead">Chapô :</label><br>
        <textarea name="lead" id="lead" cols="50" rows="4"><?= $data['post']->getLead() ?></textarea>
    </div>
    <div>
        <label for="content">Contenu :</label><br>
        <textarea name="content" id="content" cols="50" rows="8"><?= $data['post']->getContent() ?></textarea>
    </div>
    <div>
        <label for="author">Auteur :</label><br>
        <input type="text" name="author" id="author" value="<?= $data['post']->getAuthor() ?>">
    </div>
    <div>
        <input type="submit" name="submit" value="Modifier le Post">
    </div>
</form>