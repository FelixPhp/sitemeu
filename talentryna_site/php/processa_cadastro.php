<?php
require 'conexao.php';

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';
$perfil = $_POST['perfil'] ?? 'estudante';
$telefone = trim($_POST['telefone'] ?? '');
$instituicao = trim($_POST['instituicao'] ?? '');
$area = trim($_POST['area_interesse'] ?? '');

if (!$nome || !$email || !$senha) {
    header('Location: ../cadastro.php?erro=Preencha os campos obrigatórios');
    exit;
}

$hash = password_hash($senha, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('INSERT INTO usuarios (nome,email,senha,perfil,telefone,instituicao,area_interesse) VALUES (?,?,?,?,?,?,?)');
try {
    $stmt->execute([$nome,$email,$hash,$perfil,$telefone,$instituicao,$area]);
    header('Location: ../login.php?sucesso=Cadastro realizado com sucesso');
} catch (PDOException $e) {
    header('Location: ../cadastro.php?erro=E-mail já cadastrado');
}
exit;
?>
