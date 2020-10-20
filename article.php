<?php

require __DIR__ . '/functions.php';
require __DIR__ . '/data.php';
$articles = array_reverse($articles); // For the dates to be in cron order
$title = $_GET['title'];
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
      <?php if ($title === $article['title']) : ?>
        <a href="<?= generateURL('article', 'title', $article) ?>">
          <h2><?= $article['title'] ?></h2>
        </a>
        <img src="https://picsum.photos/id/5/250" />
        <h3><?= getAuthorName($article, $authors) ?></h3>
        <p><?= addBreaks($article['content']) ?></p>
        <p><?= $article['publication_date'] ?></p>
        <p><?= $article['likes'] ?></p>
      <?php endif ?>
    <?php endforeach ?>
  </section>
</body>

</html>