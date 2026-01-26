
<?php
require __DIR__.'/conexao.php'; session_start();
$action = $_POST['action'] ?? '';
if($action==='criar'){
  if(!isset($_SESSION['user'])){ header('Location:/login.php'); exit; }
  $st=$pdo->prepare("INSERT INTO reservas (usuario_id,data_reserva,hora_inicio,hora_fim,necessita_tecnico) VALUES (?,?,?,?,?)");
  $tec = isset($_POST['necessita_tecnico']) ? 1 : 0;
  $st->execute([$_SESSION['user']['id'], $_POST['data_reserva'] ?? null, $_POST['hora_inicio'] ?? null, $_POST['hora_fim'] ?? null, $tec]);
  header("Location: /reservas.php?ok=1"); exit;
}
header("Location: /reservas.php"); exit;
