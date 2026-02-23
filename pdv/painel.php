<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Painel</title>
</head>
<body style="background:black; color:white; text-align:center; padding-top:100px;">
<h1>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h1>
<a href="php/logout.php" style="color:white;">Sair</a>
</body>
</html>