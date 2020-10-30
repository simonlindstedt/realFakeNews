<?php

require __DIR__ . '/database.php';
require __DIR__ . '/functions.php';

if (isset($_GET['ID'])) {

  $articleId = $_GET['ID'];

  $stmnt = $pdo->query("SELECT * FROM users");

  $authors = $stmnt->fetchAll(PDO::FETCH_ASSOC);

  $stmnt = $pdo->query("SELECT * FROM posts WHERE ID = $articleId");

  $article = $stmnt->fetchAll(PDO::FETCH_ASSOC);
}

require __DIR__ . '/header.php';
?>
<main>
  <article>
    <img src="https://picsum.photos/id/<?= $article[0]['author_id'] ?>/1000" alt="currently a temporary picture of a laptop, probably" />
    <div class="text">
      <h2><?= $article[0]['title'] ?></h2>
      <a href="<?= generateURL('author', 'author_id', $article[0]) ?>">
        <h3><?= getAuthorName($authors, (int)$article[0]['author_id']) ?></h3>
      </a>
      <p><?= addBreaks($article[0]['content']) ?></p>
      <em><?= $article[0]['publication_date'] ?></em>
      <p>🙏🏻<?= $article[0]['likes'] ?></p>
      <a href="index.php">← Return to frontpage</a>
    </div>
  </article>
</main>
<?php
require __DIR__ . '/footer.php';
?>