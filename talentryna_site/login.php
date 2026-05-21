<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login | Talentryna</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="navbar">
        <div class="logo">Talent<span>ryna</span></div>
        <nav class="menu"><a href="index.php">Início</a><a href="cadastro.php">Cadastro</a></nav>
    </header>
    <div class="formbox card">
        <h2>Acessar plataforma</h2><?php if (isset($_GET['erro'])) echo '<div class="alert erro">' . htmlspecialchars($_GET['erro']) . '</div>';
                                    if (isset($_GET['sucesso'])) echo '<div class="alert ok">' . htmlspecialchars($_GET['sucesso']) . '</div>'; ?><form action="php/processa_login.php" method="POST"><input class="input" type="email" name="email" placeholder="E-mail" required><input class="input" type="password" name="senha" placeholder="Senha" required><button class="btn" type="submit">Entrar</button></form>
    </div>
</body>

</html>