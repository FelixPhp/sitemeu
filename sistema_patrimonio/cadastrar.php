<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Patrimônio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastrar Patrimônio</h2>
    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Descrição:</label>
        <textarea name="descricao"></textarea><br>

        <label>Valor:</label>
        <input type="number" step="0.01" name="valor"><br>

        <label>Data de Aquisição:</label>
        <input type="date" name="data_aquisicao"><br>

        <label>Número de Tombo:</label>
        <input type="text" name="numero_tombo" required><br>

        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>

    <br><a href="listar.php">Ver lista de patrimônios</a>
</body>
</html>

<?php
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data_aquisicao = $_POST['data_aquisicao'];
    $numero_tombo = $_POST['numero_tombo'];

    $sql = "INSERT INTO patrimonios (nome, descricao, valor, data_aquisicao, numero_tombo) 
            VALUES ('$nome', '$descricao', '$valor', '$data_aquisicao', '$numero_tombo')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Patrimônio cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro: " . $conn->error . "</p>";
    }
}
?>