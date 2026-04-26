<?php

function loadEnv($path)
{
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with($line, '#')) continue;
        putenv($line);
    }
}

function dd($value)
{
    echo dump_to_string($value);
    die();
}

function dump_to_string($value): string 
{
    ob_start();
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    return ob_get_clean();
}

function build_dsn(string $host, string $dbName, int $port = 3306): string
{
    if ($host === '') {
        throw new InvalidArgumentException('Host cannot be empty');
    }
    return "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";
}
