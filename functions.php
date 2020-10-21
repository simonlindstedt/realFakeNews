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

function getAuthorNameByID(array $authors, int $ID): string
{
  foreach ($authors as $author) {
    if ((int)$author['ID'] === $ID) {
      return $author['name'];
    }
  }
}

function generateURL(string $page, string $key, array $article): string
{
  return $page . '.php?' . $key . '=' . $article[$key];
}

function addBreaks(string $text): string
{
  return str_ireplace("\n", "<br>", $text);
}
