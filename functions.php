<?php

declare(strict_types=1);

// This is the file where you can keep all your functions. Remember to NOT
// execute/run any functions in this file. Keep it dumb.

function addBreaks(string $rawText): string
{
  return str_ireplace("\n", "<br>", $rawText);
}
