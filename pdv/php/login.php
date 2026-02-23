<?php
session_start();
include("conexao.php");

$usuario = $_POST['usuario'];
$senha = MD5($_POST['senha']);

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $_SESSION['usuario'] = $usuario;

    // SALVA LOG
    $ip = $_SERVER['REMOTE_ADDR'];
    $log = "INSERT INTO logs (usuario, ip) VALUES ('$usuario', '$ip')";
    mysqli_query($conn, $log);

    header("Location: ../painel.php");

}else{
    header("Location: ../index.php?erro=1");
}
?>