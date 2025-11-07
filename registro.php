
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Sistema de Chamados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="auth-wrapper">
    <div class="auth-side">
      <h1>Crie sua conta</h1>
      <p>Preencha os dados para acessar a área do usuário.</p>
    </div>
    <div class="auth-main">
      <div class="w-100" style="max-width:460px">
        <h3 class="mb-3">Cadastro</h3>
        <?php if(isset($_GET['e'])): ?><div class="alert alert-danger"><?php echo htmlspecialchars($_GET['e']); ?></div><?php endif; ?>
        <form action="php/cadastrar.php" method="post">
          <div class="row g-2">
            <div class="col-12 mb-2"><label class="form-label">Nome</label><input name="nome" class="form-control" required></div>
            <div class="col-md-6 mb-2"><label class="form-label">Setor</label><input name="setor" class="form-control" required></div>
            <div class="col-md-6 mb-2"><label class="form-label">Email</label><input name="email" type="email" class="form-control" required></div>
            <div class="col-md-6 mb-2"><label class="form-label">Senha</label><input name="senha" type="password" minlength="6" class="form-control" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Confirmar senha</label><input name="senha2" type="password" minlength="6" class="form-control" required></div>
          </div>
          <button class="btn btn-primary w-100">Cadastrar</button>
        </form>
        <div class="small mt-2"><a href="login.php">Voltar ao login</a></div>
      </div>
    </div>
  </div>
</body>
</html>
