<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="login-container">
    <h2>Área de Login</h2>

    <?php
    if(isset($_GET['erro'])){
        echo "<p class='erro'>Usuário ou senha inválidos!</p>";
    }
    ?>

    <form action="php/login.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>