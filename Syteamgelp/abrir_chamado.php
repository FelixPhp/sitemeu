
<?php require __DIR__.'/php/auth.php'; require_login(); require __DIR__.'/php/conexao.php'; require __DIR__.'/php/utils.php'; ?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Abrir Chamado</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
</head><body>
<div class="container-app">
  <?php include __DIR__.'/sidebar_user.php'; ?>
  <div class="main">
    <?php include __DIR__.'/php/header.php'; ?>
    <div class="content">
      <h4 class="mb-3">Abertura de Chamado</h4>
      <?php if(isset($_GET['ok'])): ?><div class="alert alert-success">Chamado aberto com sucesso!</div><?php endif; ?>
      <div class="card p-3">
        <form method="post" action="/php/chamados.php">
          <input type="hidden" name="action" value="criar">
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Nº OS</label>
              <input class="form-control" value="<?php echo gerarNumeroOS($pdo); ?>" disabled>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nome</label>
              <input class="form-control" value="<?php echo htmlspecialchars($_SESSION['user']['nome']); ?>" disabled>
            </div>
            <div class="col-md-4">
              <label class="form-label">Setor</label>
              <input class="form-control" value="<?php echo htmlspecialchars($_SESSION['user']['setor']); ?>" disabled>
            </div>
            <div class="col-12">
              <label class="form-label">Descrição do problema</label>
              <textarea name="descricao" class="form-control" rows="4" required></textarea>
            </div>
          </div>
          <div class="mt-3 d-flex gap-2">
            <button class="btn btn-primary">Enviar</button>
            <a href="/dashboard_usuario.php" class="btn btn-outline-secondary">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="/js/app.js"></script>
</body></html>
