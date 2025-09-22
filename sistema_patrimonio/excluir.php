<?php
include("conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM patrimonios WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<p>Patrimônio excluído com sucesso!</p>";
} else {
    echo "<p>Erro: " . $conn->error . "</p>";
}
?>

<a href="listar.php">Voltar</a>