<?php
$host = "localhost";
$user = "root"; // altere se necessário
$pass = "";     // coloque sua senha do MySQL
$db   = "patrimonio_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>