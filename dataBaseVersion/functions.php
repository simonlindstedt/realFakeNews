<?php

declare(strict_types=1);

function addBreaks(string $text): string
{
  return str_ireplace("\n", "<br>", $text);
}

function getAuthorName(array $authors, int $authorId): string
{
  foreach ($authors as $author) {
    if ((int)$author['ID'] === $authorId) {
      return $author['name'];
    }
  }
}

function generateURL(string $pageName, string $key, array $content): string
{
  return $pageName . '.php?' . $key . '=' . $content[$key];
}

function sortByDate(array &$array): void
{
  usort($array, function ($dateOne, $dateTwo) {
    return $dateTwo['publication_date'] <=> $dateOne['publication_date'];
  });
}
