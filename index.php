<?php

require "functions.php";

// Connect do MySQL database

$dsn = "mysql:host=localhost;port=3306;dbname=devops_pucpr;charset=utf8";
$user = "root";
$password ="MinhaSenhaSegura123";

$pdo = new PDO($dsn, $user, $password);

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
