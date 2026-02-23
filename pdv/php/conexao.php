<?php
$host = "localhost";
$user = "u209199010_administrador";
$pass = "Deus@cimadetudo@01";
$db = "u209199010_pvd";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Erro na conexão: " . mysqli_connect_error());
}
?>