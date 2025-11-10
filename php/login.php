<?php
require __DIR__.'/conexao.php';
session_start();

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

if (!$email || !$senha) {
  header('Location: /login.php?e=1');
  exit;
}

$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email=?');
$stmt->execute([$email]);
$u = $stmt->fetch();

$sucesso = false;

if ($u && password_verify($senha, $u['senha'])) {
  $_SESSION['user'] = $u;
  $sucesso = true;
  // Salvar log de sucesso
  $log = $pdo->prepare("INSERT INTO logs_acesso (usuario_id, email, tipo_usuario, ip, sucesso)
                        VALUES (?,?,?,?,1)");
  $log->execute([$u['id'], $u['email'], $u['tipo_usuario'], $ip]);
  header('Location: /router.php');
  exit;
}

// Log de tentativa inválida
$log = $pdo->prepare("INSERT INTO logs_acesso (email, ip, sucesso) VALUES (?,?,0)");
$log->execute([$email, $ip]);

header('Location: /login.php?e=1');
exit;
?>
