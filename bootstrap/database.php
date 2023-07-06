<?php
$dbConfig = (object)[
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'db_name' => 'map'
];
try {
    $pdo = new PDO("mysql:dbname=$dbConfig->db_name;host={$dbConfig->host}", $dbConfig->user, $dbConfig->password);
    $pdo->exec("set names utf8;");
} catch (PDOException $e) {
    diePage('Connection failed: ' . $e->getMessage());
}