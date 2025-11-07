
<?php
require __DIR__.'/conexao.php'; session_start();
$action = $_POST['action'] ?? $_GET['action'] ?? '';
if($action==='criar'){
  $nome=$_POST['nome']??''; $email=$_POST['email']??''; $setor=$_POST['setor']??''; $senha=$_POST['senha']??''; $tipo=$_POST['tipo_usuario']??'usuario';
  $hash=password_hash($senha, PASSWORD_BCRYPT);
  $st=$pdo->prepare("INSERT INTO usuarios (nome,email,senha,setor,tipo_usuario) VALUES (?,?,?,?,?)");
  $st->execute([$nome,$email,$hash,$setor,$tipo]);
  header("Location: /usuarios.php"); exit;
}
if($action==='editar'){
  $id=(int)$_POST['id']; $nome=$_POST['nome']; $email=$_POST['email']; $setor=$_POST['setor']; $tipo=$_POST['tipo_usuario'];
  $sql="UPDATE usuarios SET nome=?,email=?,setor=?,tipo_usuario=?"; $params=[$nome,$email,$setor,$tipo];
  if(!empty($_POST['senha'])){ $sql.=", senha=?"; $params[]=password_hash($_POST['senha'], PASSWORD_BCRYPT); }
  $sql.=" WHERE id=?"; $params[]=$id;
  $st=$pdo->prepare($sql); $st->execute($params);
  if(isset($_SESSION['user']) && $_SESSION['user']['id']===$id){ $_SESSION['user']['nome']=$nome; $_SESSION['user']['email']=$email; $_SESSION['user']['setor']=$setor; $_SESSION['user']['tipo_usuario']=$tipo; }
  header("Location: /usuarios.php"); exit;
}
if($action==='excluir'){
  $id=(int)($_GET['id'] ?? 0);
  $st=$pdo->prepare("DELETE FROM usuarios WHERE id=?"); $st->execute([$id]);
  header("Location: /usuarios.php"); exit;
}
header("Location: /usuarios.php"); exit;
