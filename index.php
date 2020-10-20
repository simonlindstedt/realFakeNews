<?php

require __DIR__ . '/functions.php';
require __DIR__ . '/data.php';
$articles = array_reverse($articles); // For the dates to be in cron order
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
      <h2><?= $article['title'] ?></h2>
      <img src="https://picsum.photos/id/5/250" />
      <h3><?= getAuthorName($article, $authors) ?></h3>
      <p><?= $article['content_descr'] ?></p>
      <p><?= $article['publication_date'] ?></p>
      <p><?= $article['likes'] ?></p>
    <?php endforeach ?>
  </section>
</body>

</html>