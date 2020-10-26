<?php

require __DIR__ . '/database.php';
require __DIR__ . '/functions.php';

(int)$authorId = $_GET['author_id'];

$stmnt = $pdo->query("SELECT * FROM users WHERE ID = $authorId");

$author = $stmnt->fetchAll(PDO::FETCH_ASSOC);

$name = $author[0]['name'];

$stmnt = $pdo->query("SELECT * FROM posts WHERE author_id = $authorId ORDER BY publication_date DESC");

$articles = $stmnt->fetchAll(PDO::FETCH_ASSOC);

$stmnt = $pdo->query("SELECT ID as author_id, name FROM users WHERE ID IS NOT $authorId ORDER BY name");

$otherAuthors = $stmnt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/header.php';

?>
<main>
  <section>
    <div class="grid-item-wide">
      <h2 class="text">Articles by <?= $name ?></h2>
    </div>
    <?php foreach ($articles as $article) : ?>
      <article>
        <img src=" https://picsum.photos/id/<?= $article['author_id'] ?>/250" />
        <div class="text">
          <a href="<?= generateURL('article', 'ID', $article) ?>">
            <h2><?= $article['title'] ?></h2>
          </a>
          <a href="<?= generateURL('author', 'author_id', $article) ?>">
            <h3><?= getAuthorName($author, (int)$article['author_id']) ?></h3>
          </a>
          <p class="date"><?= $article['publication_date'] ?></p>
          <p><?= $article['content_descr'] ?></p>
          <p class="end-icon">☩</p>
        </div>
      </article>
    <?php endforeach ?>
  </section>
  <section>
    <div class="grid-item-wide">
      <h2 class="text">Other authors you might like</h2>
    </div>
    <div class="text">
      <?php foreach ($otherAuthors as $author) : ?>
        <a href="<?= generateURL('author', 'author_id', $author) ?>">
          <h2><?= $author['name'] ?></h2>
        </a>
      <?php endforeach ?>
    </div>
  </section>
</main>
<?php require __DIR__ . '/footer.php'; ?>