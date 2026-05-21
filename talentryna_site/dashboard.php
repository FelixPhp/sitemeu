<?php require 'php/auth.php';
exigirLogin();
$u = usuarioAtual(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Dashboard | Talentryna</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main class="dashboard">
        <aside class="sidebar">
            <h2>Talentryna</h2>
            <p><?php echo htmlspecialchars($u['nome']); ?></p><small><?php echo htmlspecialchars($u['perfil']); ?></small><a href="dashboard.php">Dashboard</a><a href="#">Trilhas</a><a href="#">Oportunidades</a><a href="#">Perfil</a><a href="php/logout.php">Sair</a>
        </aside>
        <section class="content">
            <h1>Dashboard <?php echo ucfirst(htmlspecialchars($u['perfil'])); ?></h1>
            <p>Bem-vindo(a), <?php echo htmlspecialchars($u['nome']); ?>.</p>
            <div class="statgrid">
                <div class="card stat"><strong>12</strong>
                    <p>Trilhas</p>
                </div>
                <div class="card stat"><strong>8</strong>
                    <p>Oportunidades</p>
                </div>
                <div class="card stat"><strong>4</strong>
                    <p>Conexões</p>
                </div>
                <div class="card stat"><strong>95%</strong>
                    <p>Perfil completo</p>
                </div>
            </div>
            <div class="card" style="margin-top:22px">
                <h3>Próximas melhorias</h3>
                <p>Aqui podemos adicionar CRUD de vagas, trilhas, perfis, painel administrativo e relatórios.</p>
            </div>
        </section>
    </main>
</body>

</html>