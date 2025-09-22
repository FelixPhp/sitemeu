<?php include("conexao.php"); ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM patrimonios WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Patrimônio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Editar Patrimônio</h2>
    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>

        <label>Descrição:</label>
        <textarea name="descricao"><?php echo $row['descricao']; ?></textarea><br>

        <label>Valor:</label>
        <input type="number" step="0.01" name="valor" value="<?php echo $row['valor']; ?>"><br>

        <label>Data de Aquisição:</label>
        <input type="date" name="data_aquisicao" value="<?php echo $row['data_aquisicao']; ?>"><br>

        <label>Número de Tombo:</label>
        <input type="text" name="numero_tombo" value="<?php echo $row['numero_tombo']; ?>" required><br>

        <button type="submit" name="atualizar">Atualizar</button>
    </form>
    <br><a href="listar.php">Voltar</a>
</body>
</html>

<?php
if (isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data_aquisicao = $_POST['data_aquisicao'];
    $numero_tombo = $_POST['numero_tombo'];

    $sql = "UPDATE patrimonios SET 
            nome='$nome', descricao='$descricao', valor='$valor', 
            data_aquisicao='$data_aquisicao', numero_tombo='$numero_tombo'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Patrimônio atualizado com sucesso!</p>";
    } else {
        echo "<p>Erro: " . $conn->error . "</p>";
    }
}
?>