<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "u209199010_pvd";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Erro na conexão: " . mysqli_connect_error());
}
?>