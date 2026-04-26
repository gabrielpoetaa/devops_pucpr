<?php

require "functions.php";

loadEnv(__DIR__ . '/.env');

// Connect do MySQL database

$dsn = build_dsn(getenv('DB_HOST'), getenv('DB_NAME')); 
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
  echo "<li>" . $post['title'] . "</li>";
}
