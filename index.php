<?php

require "functions.php";

// Connect do MySQL database

$dsn = "mysql:host=localhost;port=3306;dbname=devops_pucpr;charset=utf8";
$user = "root";
$password ="MinhaSenhaSegura123";

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
