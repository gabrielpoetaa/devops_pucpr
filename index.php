<?php

require "functions.php";

loadEnv(__DIR__ . '/.env');

// Connect do MySQL database

$dsn = "mysql:host=" . getenv('DB_HOST') . ";port=3306;dbname=" . getenv('DB_NAME') . ";charset=utf8";
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
