<?php

declare(strict_types=1);

//This function replaces all \n characters with <br> instead.
function addBreaks(string $text): string
{
  return str_ireplace("\n", "<br>", $text);
}

//This function returns the name of the author based on the authors id.
function getAuthorName(array $authors, int $authorId): string
{
  foreach ($authors as $author) {
    if ((int)$author['ID'] === $authorId) {
      return $author['name'];
    }
  }
}

//This function generates a URL based on the contents of an array and the name of a page
function generateURL(string $pageName, string $key, array $content): string
{
  return $pageName . '.php?' . $key . '=' . $content[$key];
}

//This function was used in a previous version, and is used to sort posts by date
function sortByDate(array &$array): void
{
  usort($array, function ($dateOne, $dateTwo) {
    return $dateTwo['publication_date'] <=> $dateOne['publication_date'];
  });
}
