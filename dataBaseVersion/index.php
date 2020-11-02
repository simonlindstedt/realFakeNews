<?php

require __DIR__ . '/database.php';

require __DIR__ . '/functions.php';

$stmnt = $pdo->query("SELECT * FROM users");

$authors = $stmnt->fetchAll(PDO::FETCH_ASSOC);

$stmnt = $pdo->query("SELECT * FROM posts ORDER BY publication_date DESC");

$articles = $stmnt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/header.php';
?>

<main>
  <h1 class="page-title">Real Bible News</h1>
  <section class="grid">
    <?php foreach ($articles as $article) :
      //Loop that generates the card-view 
    ?>

      <div class="grid-item">
        <a href="<?= generateURL('article', 'ID', $article) ?>">
          <img src="https://picsum.photos/id/<?= $article['author_id'] ?>/1000" alt="currently a temporary picture of a laptop, probably" />
        </a>
        <div class="text">
          <a href="<?= generateURL('article', 'ID', $article) ?>">
            <h2><?= $article['title'] ?></h2>
          </a>
          <a href="<?= generateURL('author', 'author_id', $article) ?>">
            <h3><?= getAuthorName($authors, (int)$article['author_id']) ?></h3>
          </a>
          <p>🙏🏻 <?= $article['likes'] ?></p>
          <em><?= $article['publication_date'] ?></em>
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