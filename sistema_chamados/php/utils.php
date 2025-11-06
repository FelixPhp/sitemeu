
<?php
function gerarNumeroOS($pdo){
  // Gera OS-0001 baseado no maior id
  $stmt = $pdo->query("SELECT IFNULL(MAX(id),0)+1 as prox FROM chamados");
  $prox = (int)$stmt->fetch()['prox'];
  return "OS-" . str_pad((string)$prox, 4, "0", STR_PAD_LEFT);
}
function json_response($ok, $msg='', $extra=[]){
  header('Content-Type: application/json');
  echo json_encode(array_merge(['success'=>$ok,'message'=>$msg],$extra));
  exit;
}
?>
