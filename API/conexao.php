<?php

$pdo = new PDO(
    "mysql:host=localhost;dbname=bd_appscholar",
    "root",
    ""
);

$pdo->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);

?>