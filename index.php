<?php

require __DIR__ . '/functions.php';
require __DIR__ . '/data.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real fake news</title>
    <style>
    </style>
</head>

<body>
    <section>
        <?php foreach ($articles as $article) : ?>
            <article>
                <h2><?= $article['title'] ?></h2>
                <img src="<?= $article['image'] ?>" />
                <p>Av <?= $article['author_name'] ?></p>
                <p><?= addBreaks($article['content']) ?></p>
                <p><?= $article['publication_date'] ?></p>
                <p><?= $article['likes'] ?> likes</p>
            </article>
        <?php endforeach ?>
    </section>
</body>

</html>