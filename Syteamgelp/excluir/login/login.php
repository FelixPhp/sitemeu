<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        echo "Login bem-sucedido. Bem-vindo, " . htmlspecialchars($username) . "!";
    } else {
        echo "Usuário ou senha incorretos!";
    }
}
?>

