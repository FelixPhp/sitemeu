
<?php /* Header comum */ ?>
<div class="header">
  <div><strong>Sistema de Chamados</strong></div>
  <div class="d-flex align-items-center gap-2">
    <span class="small">Olá, <?php echo htmlspecialchars($_SESSION['user']['nome'] ?? ''); ?></span>
    <a class="btn btn-sm btn-outline-danger" href="/logout.php">Sair</a>
  </div>
</div>
