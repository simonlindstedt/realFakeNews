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
  <section>
    <?php foreach ($articles as $article) : ?>
      <article>
        <img src="https://picsum.photos/id/<?= $article['author_id'] ?>/1000" />
        <div class="text">
          <a href="<?= generateURL('article', 'ID', $article) ?>">
            <h2><?= $article['title'] ?></h2>
          </a>
          <a href="<?= generateURL('author', 'author_id', $article) ?>">
            <h3><?= getAuthorName($authors, (int)$article['author_id']) ?></h3>
          </a>
          <p class="date"><?= $article['publication_date'] ?></p>
          <p><?= $article['content_descr'] ?></p>
          <p style="text-align: center;">///</p>
        </div>
      </article>
    <?php endforeach ?>
  </section>
</main>

<?php
require __DIR__ . '/footer.php';
?>