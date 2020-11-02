<?php

require __DIR__ . '/functions.php';
require __DIR__ . '/data.php';

sortByDate($articles);

if (isset($_GET['author_id'])) {
  $authorId = $_GET['author_id'];
}

require __DIR__ . '/header.php';
?>

<main>
  <h2 class="page-title">Articles by <?= getAuthorName($authors, $authorId) ?></h2>
  <section class="grid">
    <?php foreach ($articles as $article) : ?>

      <?php if ((int)$authorId === (int)$article['author_id']) : ?>
        <div class="grid-item">
          <a href="<?= generateURL('article', 'title', $article) ?>">
            <img src="https://picsum.photos/id/5/250" /></a>
          <div class="text">
            <a href="<?= generateURL('article', 'title', $article) ?>">
              <h2><?= $article['title'] ?></h2>
            </a>
            <a href="<?= generateURL('author', 'author_id', $article) ?>">
              <h3><?= getAuthorName($authors, $article['author_id']) ?></h3>
            </a>
            <p>🙏🏻 <?= $article['likes'] + rand(10, 60) ?></p>
            <em><?= $article['publication_date'] ?></em>
            <p><?= $article['content_descr'] ?></p>
            <p class="end-icon">☩</p>
          </div>
        </div class="grid-item">
      <?php endif ?>
    <?php endforeach ?>
  </section>
</main>
<?php
require __DIR__ . '/footer.php';
?>