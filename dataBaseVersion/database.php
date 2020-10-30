<?php

declare(strict_types=1);

$dsn = 'sqlite:' . __DIR__ . '/testFakeNewsDB.sqlite';

//Borrowd these from https://phpdelusions.net/pdo
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

//These aswell
try {
  $pdo = new PDO($dsn, '', '', $options);
} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
