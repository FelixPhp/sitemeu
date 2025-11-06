
<?php
require __DIR__.'/conexao.php';
session_start();
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
if(!$email || !$senha){ header('Location: /login.php?e=1'); exit; }
$stmt=$pdo->prepare('SELECT * FROM usuarios WHERE email=?');
$stmt->execute([$email]); $u=$stmt->fetch();
if($u && password_verify($senha, $u['senha'])){
  $_SESSION['user'] = $u;
  header('Location: /router.php'); exit;
}
header('Location: /login.php?e=1'); exit;
