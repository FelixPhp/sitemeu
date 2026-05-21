<?php
$host = 'localhost';
$db   = 'u209199010_talentryna';
$user = 'u209199010_felixadmin01';
$pass = '_Artlifedev@20i8';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Erro de conexão com o banco: ' . $e->getMessage());
}
?>
