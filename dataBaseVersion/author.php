<?php

require __DIR__ . '/database.php';
require __DIR__ . '/functions.php';

if (isset($_GET['author_id'])) {

  $authorId = $_GET['author_id'];

  $stmnt = $pdo->query("SELECT * FROM users WHERE ID = $authorId");

  $author = $stmnt->fetchAll(PDO::FETCH_ASSOC);

  $name = $author[0]['name'];

  $stmnt = $pdo->query("SELECT * FROM posts WHERE author_id = $authorId ORDER BY publication_date DESC");

  $articles = $stmnt->fetchAll(PDO::FETCH_ASSOC);

  $stmnt = $pdo->query("SELECT ID as author_id, name FROM users WHERE ID IS NOT $authorId ORDER BY name");

  $otherAuthors = $stmnt->fetchAll(PDO::FETCH_ASSOC);

  // Can this be done more effecticly with just two sql-lines and an if-statement? 
}

require __DIR__ . '/header.php';
?>
<main>
  <h2 class="page-title">Articles by <?= $name ?></h2>
  <section class="grid">
    <?php foreach ($articles as $article) : ?>
      <div class="grid-item">
        <a href="<?= generateURL('article', 'ID', $article) ?>">
          <img src=" https://picsum.photos/id/<?= $article['author_id'] ?>/1000" alt="currently a temporary picture of a laptop, probably" />
        </a>
        <div class="text">
          <a href="<?= generateURL('article', 'ID', $article) ?>">
            <h2><?= $article['title'] ?></h2>
          </a>
          <a href="<?= generateURL('author', 'author_id', $article) ?>">
            <h3><?= getAuthorName($author, (int)$article['author_id']) ?></h3>
          </a>
          <em><?= $article['publication_date'] ?></em>
          <p><?= $article['content_descr'] ?></p>
          <p class="end-icon">☩</p>
        </div>
      </div>
    <?php endforeach ?>
  </section>
  <section class="authors">
    <h2>Other authors you might like</h2>
    <?php foreach ($otherAuthors as $author) : ?>
      <a href="<?= generateURL('author', 'author_id', $author) ?>">
        <h3><?= $author['name'] ?></h3>
      </a>
    <?php endforeach ?>
  </section>
</main>
<?php require __DIR__ . '/footer.php'; ?>