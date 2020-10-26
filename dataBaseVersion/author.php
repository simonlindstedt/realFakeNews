<?php

require __DIR__ . '/database.php';
require __DIR__ . '/functions.php';

(int)$authorId = $_GET['author_id'];

$stmnt = $pdo->query("SELECT * FROM users WHERE ID = $authorId");

$author = $stmnt->fetchAll(PDO::FETCH_ASSOC);

$name = $author[0]['name'];

$stmnt = $pdo->query("SELECT * FROM posts WHERE author_id = $authorId ORDER BY publication_date DESC");

$articles = $stmnt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/header.php';

?>
<main>
  <section>
    <h2 class="text">Articles by <?= $name ?></h2>
    <article>
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
            <p style="text-align: center;">///</p>
          </div>
        </article>
      <?php endforeach ?>
    </article>
  </section>
</main>
<?php require __DIR__ . '/footer.php'; ?>