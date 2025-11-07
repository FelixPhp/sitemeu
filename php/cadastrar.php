
<?php
require __DIR__.'/conexao.php';
if(($_POST['senha'] ?? '') !== ($_POST['senha2'] ?? '')){
  header("Location: /registro.php?e=Senhas+não+conferem"); exit;
}
$nome=$_POST['nome']??''; $email=$_POST['email']??''; $setor=$_POST['setor']??''; $senha=$_POST['senha']??'';
if(!$nome||!$email||!$senha){ header("Location: /registro.php?e=Dados+inválidos"); exit; }
$hash=password_hash($senha, PASSWORD_BCRYPT);
try{
  $st=$pdo->prepare("INSERT INTO usuarios (nome,email,senha,setor,tipo_usuario) VALUES (?,?,?,?, 'usuario')");
  $st->execute([$nome,$email,$hash,$setor]);
  header("Location: /login.php?ok=1"); exit;
}catch(PDOException $e){
  header("Location: /registro.php?e=" . urlencode('Email já em uso')); exit;
}
