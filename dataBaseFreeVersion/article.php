<?php

require __DIR__ . '/functions.php';

require __DIR__ . '/data.php';

if (isset($_GET['title'])) {
  $title = $_GET['title'];
}

require __DIR__ . '/header.php';
?>

<main>
  <?php foreach ($articles as $article) : ?>
    <?php if ($title === $article['title']) : ?>
      <article>
        <img src="https://picsum.photos/id/5/250" />
        <div class="text">
          <h2><?= $article['title'] ?></h2>
          <a href="<?= generateURL('author', 'author_id', $article) ?>">
            <h3><?= getAuthorName($authors, $article['author_id']) ?></h3>
          </a>
          <p><?= addBreaks($article['content']) ?></p>
          <em><?= $article['publication_date'] ?></em>
          <p>🙏🏻 <?= $article['likes'] ?></p>
          <a href="index.php">← Return to frontpage</a>
        </div>
      </article>
    <?php endif ?>
  <?php endforeach ?>
</main>

<?php
require __DIR__ . '/footer.php';
?>