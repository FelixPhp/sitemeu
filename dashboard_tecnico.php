
<?php require __DIR__.'/php/auth.php'; require_admin(); require __DIR__.'/php/conexao.php'; ?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Técnico</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head><body>
<div class="container-app">
  <?php include __DIR__.'php/sidebar_admin.php'; ?>
  <div class="main">
    <?php include __DIR__.'php/header.php'; ?>
    <div class="content">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h4>Chamados</h4>
        <form class="d-flex gap-2" method="get">
          <select name="status" class="form-select">
            <option value="">Todos status</option>
            <option>Aberto</option><option>Em Atendimento</option><option>Finalizado</option>
          </select>
          <select name="prioridade" class="form-select">
            <option value="">Todas prioridades</option>
            <option>Alta</option><option>Média</option><option>Baixa</option>
          </select>
          <button class="btn btn-outline-primary">Filtrar</button>
        </form>
      </div>
      <?php
        $sql = "SELECT c.*, u.nome as solicitante FROM chamados c LEFT JOIN usuarios u ON u.id=c.solicitante_id WHERE 1=1";
        $params = [];
        if(!empty($_GET['status'])){ $sql.=" AND c.status=?"; $params[]=$_GET['status']; }
        if(!empty($_GET['prioridade'])){ $sql.=" AND c.prioridade=?"; $params[]=$_GET['prioridade']; }
        $sql.=" ORDER BY c.data_abertura DESC";
        $stmt=$pdo->prepare($sql); $stmt->execute($params); $rows=$stmt->fetchAll();
      ?>
      <div class="card p-3">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead><tr><th>Nº OS</th><th>Solicitante</th><th>Setor</th><th>Status</th><th>Prioridade</th><th>Ações</th></tr></thead>
            <tbody>
              <?php foreach($rows as $r): ?>
              <tr>
                <td><?php echo htmlspecialchars($r['numero_os']); ?></td>
                <td><?php echo htmlspecialchars($r['solicitante'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($r['setor']); ?></td>
                <td><?php echo htmlspecialchars($r['status']); ?></td>
                <td><?php echo htmlspecialchars($r['prioridade']); ?></td>
                <td><a class="btn btn-sm btn-primary" href="tecnico_responder.php?id=<?php echo $r['id']; ?>">Responder</a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/app.js"></script>
</body></html>
