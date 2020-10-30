<?php

require __DIR__ . '/functions.php';

require __DIR__ . '/data.php';

sortByDate($articles);

require __DIR__ . '/header.php';

?>

<main>
  <h1 class="page-title">Real Bible News</h1>
  <section class="grid">
    <?php foreach ($articles as $article) : ?>
      <div class="grid-item">
        <a href="<?= generateURL('article', 'title', $article) ?>">
          <img src="https://picsum.photos/id/5/250" />
        </a>
        <div class="text">
          <a href="<?= generateURL('article', 'title', $article) ?>">
            <h2><?= $article['title'] ?></h2>
          </a>
          <a href="<?= generateURL('author', 'author_id', $article) ?>">
            <h3><?= getAuthorName($authors, $article['author_id']) ?></h3>
          </a>
          <p><?= $article['publication_date'] ?></p>
          <p><?= $article['content_descr'] ?></p>
          <p class="end-icon">☩</p>
        </div>
      </div>
    <?php endforeach ?>
  </section>
</main>
<?php
require __DIR__ . '/footer.php';
?>