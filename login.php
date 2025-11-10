
<?php session_start(); if(isset($_SESSION['user'])){ header("Location: /router.php"); exit; } ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sistema de Chamados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="auth-wrapper">
    <div class="auth-side">
      <h1>Bem-vindo!</h1>
      <p>Acompanhe seus chamados, agende salas e solicite equipamentos em um só lugar.</p>
    </div>
    <div class="auth-main">
      <div class="w-100" style="max-width:420px">
        <h3 class="mb-3">Entrar</h3>
        <?php if(isset($_GET['ok'])): ?><div class="alert alert-success">Cadastro realizado! Faça o login.</div><?php endif; ?>
        <?php if(isset($_GET['e'])): ?><div class="alert alert-danger">Credenciais inválidas.</div><?php endif; ?>
        <form action="/php/login.php" method="post" class="mb-3">
          <div class="mb-2"><label class="form-label">Email</label><input name="email" type="email" class="form-control" required></div>
          <div class="mb-3"><label class="form-label">Senha</label><input name="senha" type="password" class="form-control" required></div>
          <button class="btn btn-primary w-100">Entrar</button>
        </form>
        
        <!--<div class="small">Não possui conta? <a href="/registro.php">Cadastrar</a></div> -->
      </div>
    </div>
  </div>
  <script src="/js/app.js"></script>
</body>
</html>
