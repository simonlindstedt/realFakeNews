<?php

declare(strict_types=1);

function getAuthorName(array $authors, int $author_id): string
{
  foreach ($authors as $author) {
    if ($author['ID'] === $author_id) {
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

// function sortByDate($dateOne, $dateTwo): int
// {
//   return strtotime($dateOne) - strtotime($dateTwo);
// }
