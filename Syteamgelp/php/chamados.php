
<?php
require __DIR__.'/conexao.php'; require __DIR__.'/utils.php'; session_start();
$action = $_POST['action'] ?? $_GET['action'] ?? '';
if($action==='criar'){
  if(!isset($_SESSION['user'])){ header('Location:/login.php'); exit; }
  $num = gerarNumeroOS($pdo);
  $st=$pdo->prepare("INSERT INTO chamados (numero_os, solicitante_id, setor, descricao) VALUES (?,?,?,?)");
  $st->execute([$num, $_SESSION['user']['id'], $_SESSION['user']['setor'], $_POST['descricao'] ?? '']);
  header("Location: /abrir_chamado.php?ok=1"); exit;
}
if($action==='responder'){
  // admin salva resposta, prioridade e status; se status finalizado, set data_fechamento
  $id=(int)($_POST['id'] ?? 0);
  $prioridade=$_POST['prioridade'] ?? 'Média';
  $status=$_POST['status'] ?? 'Em Atendimento';
  $resp=$_POST['resposta_tecnico'] ?? '';
  $sql="UPDATE chamados SET prioridade=?, status=?, resposta_tecnico=?";
  $params=[$prioridade,$status,$resp];
  if($status==='Finalizado'){ $sql.=", data_fechamento=NOW()"; }
  $sql.=" WHERE id=?"; $params[]=$id;
  $st=$pdo->prepare($sql); $st->execute($params);
  header("Location: /tecnico_responder.php?id=".$id); exit;
}
header("Location: /"); exit;
