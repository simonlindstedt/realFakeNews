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
  <section>
    <article>
      <img src="https://picsum.photos/id/<?= $article[0]['author_id'] ?>/1000" />
      <div class="text">
        <h2><?= $article[0]['title'] ?></h2>
        <a href="<?= generateURL('author', 'author_id', $article[0]) ?>">
          <h3><?= getAuthorName($authors, (int)$article[0]['author_id']) ?></h3>
        </a>
        <p><?= addBreaks($article[0]['content']) ?></p>
        <p><?= $article[0]['publication_date'] ?></p>
        <p>🙏🏻<?= $article[0]['likes'] ?></p>
        <a href="index.php">← Return to frontpage</a>
      </div>
    </article>
  </section>
</main>
<?php
require __DIR__ . '/footer.php';
?>