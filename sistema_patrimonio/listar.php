<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Patrimônios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Patrimônios</h2>
    <a href="cadastrar.php">Cadastrar Novo</a><br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data Aquisição</th>
            <th>Número Tombo</th>
            <th>Ações</th>
        </tr>

        <?php
        $sql = "SELECT * FROM patrimonios";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nome']."</td>
                <td>".$row['descricao']."</td>
                <td>R$ ".$row['valor']."</td>
                <td>".$row['data_aquisicao']."</td>
                <td>".$row['numero_tombo']."</td>
                <td>
                    <a href='editar.php?id=".$row['id']."'>Editar</a> | 
                    <a href='excluir.php?id=".$row['id']."' onclick=\"return confirm('Deseja excluir?')\">Excluir</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>