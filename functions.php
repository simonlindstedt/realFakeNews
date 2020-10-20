<?php

declare(strict_types=1);

function getAuthorName(array $article, array $authors): string
{
  foreach ($authors as $author) {
    if ((int)$article['author_id'] === $author['ID']) {
      return $author['name'];
    }
  }
}
