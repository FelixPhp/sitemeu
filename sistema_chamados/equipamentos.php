
<?php require __DIR__.'/php/auth.php'; require_login(); require __DIR__.'/php/conexao.php'; ?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Solicitar Equipamento</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
</head><body>
<div class="container-app">
  <?php include __DIR__.'php/sidebar_user.php'; ?>
  <div class="main">
    <?php include __DIR__.'php/header.php'; ?>
    <div class="content">
      <h4 class="mb-3">Solicitação de Equipamento</h4>
      <?php if(isset($_GET['ok'])): ?><div class="alert alert-success">Solicitação enviada!</div><?php endif; ?>
      <div class="card p-3">
        <form method="post" action="php/equipamentos.php" onsubmit="
          if(!document.getElementById('termo').checked){ alert('Você precisa aceitar o termo.'); return false; }
        ">
          <input type="hidden" name="action" value="criar">
          <div class="row g-2">
            <div class="col-md-8">
              <label class="form-label">Equipamento</label>
              <input name="equipamento" class="form-control" placeholder="Notebook, projetor, etc." required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Data de uso</label>
              <input name="data_uso" type="date" class="form-control" required>
            </div>
          </div>
          <div class="form-termo my-3">
            <strong>Termo de Responsabilidade</strong>
            <p class="mb-0 small">
              Declaro que me responsabilizo pela guarda e uso adequado do equipamento solicitado,
              comprometendo-me a devolvê-lo nas mesmas condições de recebimento. Estou ciente de que
              qualquer dano decorrente de mau uso poderá ser de minha responsabilidade.
            </p>
          </div>
          <div class="form-check mb-3">
            <input id="termo" class="form-check-input" type="checkbox" name="termo_ciencia" value="1">
            <label for="termo" class="form-check-label">Li e estou ciente</label>
          </div>
          <button class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="js/app.js"></script>
</body></html>
