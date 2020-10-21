<?php

require __DIR__ . '/functions.php';
require __DIR__ . '/data.php';

$articles = array_reverse($articles); // For the dates to be in cron order, the stupid way.

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real Fake News</title>
</head>

<body>
  <a href="index.php">
    <h1>Real Fake News</h1>
  </a>
  <section>
    <?php foreach ($articles as $article) : ?>
      <article>
        <a href="<?= generateURL('article', 'title', $article) ?>">
          <h2><?= $article['title'] ?></h2>
        </a>
        <img src="https://picsum.photos/id/5/250" />
        <a href="<?= generateURL('author', 'author_id', $article) ?>">
          <h3><?= getAuthorName($authors, $article['author_id']) ?></h3>
        </a>
        <p><?= $article['content_descr'] ?></p>
        <p><?= $article['publication_date'] ?></p>
        <p><?= $article['likes'] ?></p>
      </article>
    <?php endforeach ?>
  </section>
</body>

</html>