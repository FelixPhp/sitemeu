
<?php
require __DIR__.'/conexao.php'; session_start();
$action = $_POST['action'] ?? '';
if($action==='criar'){
  if(!isset($_SESSION['user'])){ header('Location:/login.php'); exit; }
  $equip=$_POST['equipamento'] ?? '';
  $termo = isset($_POST['termo_ciencia']) ? 1 : 0;
  $st=$pdo->prepare("INSERT INTO equipamentos (usuario_id, equipamento, termo_ciencia) VALUES (?,?,?)");
  $st->execute([$_SESSION['user']['id'], $equip, $termo]);
  header("Location: /equipamentos.php?ok=1"); exit;
}
header("Location: /equipamentos.php"); exit;
