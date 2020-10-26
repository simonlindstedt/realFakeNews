<?php

declare(strict_types=1);

function getAuthorName(array $authors, int $authorId): string
{
  foreach ($authors as $author) {
    if ($author['ID'] === $authorId) {
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

function sortByDate(array &$array): void
{
  usort($array, function ($dateOne, $dateTwo) {
    return $dateTwo['publication_date'] <=> $dateOne['publication_date'];
  });
}
