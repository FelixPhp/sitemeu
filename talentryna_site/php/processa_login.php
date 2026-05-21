<?php
require 'conexao.php';
session_start();

$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ? LIMIT 1');
$stmt->execute([$email]);
$usuario = $stmt->fetch();

if ($usuario && password_verify($senha, $usuario['senha'])) {
    unset($usuario['senha']);
    $_SESSION['usuario'] = $usuario;
    header('Location: ../dashboard.php');
    exit;
}
header('Location: ../login.php?erro=E-mail ou senha inválidos');
exit;
?>
