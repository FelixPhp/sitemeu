
<?php require __DIR__.'/php/auth.php'; require_admin(); require __DIR__.'/php/conexao.php'; ?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Relatórios</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head><body>
<div class="container-app">
  <?php include __DIR__.'/php/sidebar_admin.php'; ?>
  <div class="main">
    <?php include __DIR__.'/php/header.php'; ?>
    <div class="content">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h4>Relatórios Mensais</h4>
        <button class="btn btn-outline-secondary" onclick="confirmPrint()">Exportar PDF</button>
      </div>
      <?php
        // Exemplo: montar dados a partir de chamados finalizados agrupados por técnico no mês atual
        $mesAtual = date('Y-m');
        $sql = "SELECT u.nome AS tecnico, COUNT(*) AS qtd, AVG(TIMESTAMPDIFF(MINUTE, c.data_abertura, c.data_fechamento)) AS tempo_medio
                FROM chamados c
                JOIN usuarios u ON u.id = c.solicitante_id
                WHERE c.status='Finalizado' AND DATE_FORMAT(c.data_fechamento,'%Y-%m') = ?
                GROUP BY u.nome";
        $st=$pdo->prepare($sql); $st->execute([$mesAtual]); $rows=$st->fetchAll();
        $labels = array_map(fn($r)=>$r['tecnico'] ?? '—', $rows);
        $qtd = array_map(fn($r)=>(int)$r['qtd'], $rows);
        $tempo = array_map(fn($r)=>round($r['tempo_medio'] ?? 0,2), $rows);
      ?>
      <div class="card p-3 mb-3">
        <canvas id="graficoChamados" height="120"></canvas>
      </div>
      <div class="card p-3">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead><tr><th>Técnico</th><th>Finalizados</th><th>Tempo médio (min)</th></tr></thead>
            <tbody>
              <?php foreach($rows as $r): ?>
              <tr>
                <td><?php echo htmlspecialchars($r['tecnico']); ?></td>
                <td><?php echo (int)$r['qtd']; ?></td>
                <td><?php echo number_format($r['tempo_medio']??0,2,',','.'); ?></td>
              </tr>
              <?php endforeach; if(!$rows): ?>
              <tr><td colspan="3" class="text-center text-muted">Sem dados no período.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
const labels = <?php echo json_encode($labels ?? []); ?>;
const dataQtd = <?php echo json_encode($qtd ?? []); ?>;
const ctx = document.getElementById('graficoChamados').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: { labels: labels, datasets: [{ label: 'Finalizados', data: dataQtd }] },
  options: { responsive: true, maintainAspectRatio: false }
});
</script>
<script src="/js/app.js"></script>
</body></html>
