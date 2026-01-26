
<?php require __DIR__.'/php/auth.php'; require_login(); require __DIR__.'/php/conexao.php'; ?>
<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendar Sala</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
</head><body>
<div class="container-app">
  <?php include __DIR__.'/php/sidebar_user.php'; ?>
  <div class="main">
    <?php include __DIR__.'/php/header.php'; ?>
    <div class="content">
      <h4 class="mb-3">Agendamento de Sala (8h–18h)</h4>
      <?php if(isset($_GET['ok'])): ?><div class="alert alert-success">Reserva enviada!</div><?php endif; ?>
      <div class="card p-3 mb-3">
        <form>
          <div class="row g-2">
            <div class="col-md-4"><label class="form-label">Data</label><input id="dataReserva" type="date" class="form-control" required></div>
            <div class="col-md-4"><label class="form-label">Hora início</label>
              <select id="horaInicio" class="form-select">
                <?php for($h=8;$h<=17;$h++): $t=str_pad($h,2,'0',STR_PAD_LEFT).":00"; echo "<option>$t</option>"; endfor; ?>
              </select>
            </div>
            <div class="col-md-4"><label class="form-label">Hora fim</label>
              <select id="horaFim" class="form-select">
                <?php for($h=9;$h<=18;$h++): $t=str_pad($h,2,'0',STR_PAD_LEFT).":00"; echo "<option>$t</option>"; endfor; ?>
              </select>
            </div>
            <div class="col-12 form-check mt-2">
              <input id="needTec" class="form-check-input" type="checkbox">
              <label for="needTec" class="form-check-label">Necessita ajuda do técnico</label>
            </div>
          </div>
          <div class="mt-3">
            <button type="button" id="btnAvancarReserva" class="btn btn-primary">Avançar</button>
          </div>
        </form>
      </div>

      <div id="confirmacaoReserva" class="card p-3 d-none">
        <h5>Confirmação</h5>
        <p class="small">Revise os dados e clique em "Enviar reserva".</p>
        <form method="post" action="php/reservas.php" onsubmit="
          document.getElementById('dataHidden').value = document.getElementById('dataReserva').value;
          document.getElementById('iniHidden').value = document.getElementById('horaInicio').value;
          document.getElementById('fimHidden').value = document.getElementById('horaFim').value;
          document.getElementById('tecHidden').checked = document.getElementById('needTec').checked;
        ">
          <input type="hidden" name="action" value="criar">
          <input type="hidden" id="dataHidden" name="data_reserva">
          <input type="hidden" id="iniHidden" name="hora_inicio">
          <input type="hidden" id="fimHidden" name="hora_fim">
          <input type="checkbox" id="tecHidden" name="necessita_tecnico" class="d-none">
          <div class="d-flex gap-2 mt-2">
            <button class="btn btn-success">Enviar reserva</button>
            <a href="reservas.php" class="btn btn-outline-secondary">Alterar</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<script src="js/app.js"></script>
</body></html>
