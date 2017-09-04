<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Mon blog</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="<?= $data['base_url'] ?>blog/add">Add a Post</a></li>
    </ul>
</nav>
<?php include $data['actionFile']; ?>
</body>
</html>