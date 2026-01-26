
<?php require __DIR__.'/php/auth.php'; require_login(); require __DIR__.'/php/conexao.php'; ?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meus Chamados</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
</head><body>
<div class="container-app">
  <?php include __DIR__.'/php/sidebar_user.php'; ?>
  <div class="main">
    <?php include __DIR__.'/php/header.php'; ?>
    <div class="content">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Meus Chamados</h4>
        <a href="abrir_chamado.php" class="btn btn-primary">Abrir Novo Chamado</a>
      </div>
      <?php
        $idUser = $_SESSION['user']['id'];
        $stmt = $pdo->prepare("SELECT * FROM chamados WHERE solicitante_id = ? ORDER BY data_abertura DESC");
        $stmt->execute([$idUser]);
        $rows = $stmt->fetchAll();
      ?>
      <div class="card p-3">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead><tr><th>Nº OS</th><th>Setor</th><th>Descrição</th><th>Status</th><th>Prioridade</th><th>Abertura</th></tr></thead>
            <tbody>
              <?php foreach($rows as $r): ?>
              <tr>
                <td><?php echo htmlspecialchars($r['numero_os']); ?></td>
                <td><?php echo htmlspecialchars($r['setor']); ?></td>
                <td><?php echo htmlspecialchars($r['descricao']); ?></td>
                <td>
                  <?php $s=$r['status'];
                    $cls = $s==='Aberto'?'status-aberto':($s==='Em Atendimento'?'status-atendimento':'status-finalizado');
                  ?>
                  <span class="status-badge <?php echo $cls; ?>"><?php echo $s; ?></span>
                </td>
                <td><?php echo htmlspecialchars($r['prioridade']); ?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($r['data_abertura'])); ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/js/app.js"></script>
</body></html>
