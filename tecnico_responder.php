
<?php require __DIR__.'/php/auth.php'; require_admin(); require __DIR__.'/php/conexao.php'; ?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responder Chamado</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
</head><body>
<?php
  $id = (int)($_GET['id'] ?? 0);
  $stmt = $pdo->prepare("SELECT c.*, u.nome as solicitante FROM chamados c LEFT JOIN usuarios u ON u.id=c.solicitante_id WHERE c.id=?");
  $stmt->execute([$id]);
  $chamado = $stmt->fetch();
  if(!$chamado){ echo '<div class="p-3 text-white">Chamado não encontrado.</div>'; exit; }
?>
<div class="container-app">
  <?php include __DIR__.'/php/sidebar_admin.php'; ?>
  <div class="main">
    <?php include __DIR__.'/php/header.php'; ?>
    <div class="content">
      <h4 class="mb-3">Responder Chamado • <?php echo htmlspecialchars($chamado['numero_os']); ?></h4>
      <div class="card p-3 mb-3">
        <div><strong>Solicitante:</strong> <?php echo htmlspecialchars($chamado['solicitante'] ?? '-'); ?></div>
        <div><strong>Setor:</strong> <?php echo htmlspecialchars($chamado['setor']); ?></div>
        <div><strong>Descrição:</strong> <?php echo htmlspecialchars($chamado['descricao']); ?></div>
        <div><strong>Status atual:</strong> <?php echo htmlspecialchars($chamado['status']); ?></div>
      </div>
      <div class="card p-3">
        <form method="post" action="/php/chamados.php">
          <input type="hidden" name="action" value="responder">
          <input type="hidden" name="id" value="<?php echo $chamado['id']; ?>">
          <div class="mb-3">
            <label class="form-label">Atendimento realizado</label>
            <textarea name="resposta_tecnico" class="form-control" rows="4" required><?php echo htmlspecialchars($chamado['resposta_tecnico'] ?? ''); ?></textarea>
          </div>
          <div class="row g-2">
            <div class="col-md-4">
              <label class="form-label">Prioridade</label>
              <select name="prioridade" class="form-select">
                <?php foreach(['Alta','Média','Baixa'] as $p): ?>
                  <option <?php echo $chamado['prioridade']===$p?'selected':''; ?>><?php echo $p; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Status</label>
              <select name="status" class="form-select">
                <?php foreach(['Aberto','Em Atendimento','Finalizado'] as $s): ?>
                  <option <?php echo $chamado['status']===$s?'selected':''; ?>><?php echo $s; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="mt-3 d-flex gap-2">
            <button class="btn btn-primary">Salvar</button>
            <a href="/dashboard_tecnico.php" class="btn btn-outline-secondary">Voltar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="/js/app.js"></script>
</body></html>
