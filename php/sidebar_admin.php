
<?php /* Sidebar admin */ ?>
<div class="sidebar">
  <h4>Técnico/Admin</h4>
  <a href="/dashboard_tecnico.php" class="<?php echo basename($_SERVER['PHP_SELF'])==='dashboard_tecnico.php'?'active':'';?>">Chamados</a>
  <a href="/usuarios.php" class="<?php echo basename($_SERVER['PHP_SELF'])==='usuarios.php'?'active':'';?>">Usuários</a>
  <a href="/relatorios.php" class="<?php echo basename($_SERVER['PHP_SELF'])==='relatorios.php'?'active':'';?>">Relatórios</a>
</div>
