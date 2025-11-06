
<?php /* Sidebar user */ ?>
<div class="sidebar">
  <h4>Usuário</h4>
  <a href="/dashboard_usuario.php" class="<?php echo basename($_SERVER['PHP_SELF'])==='dashboard_usuario.php'?'active':'';?>">Meus Chamados</a>
  <a href="/abrir_chamado.php" class="<?php echo basename($_SERVER['PHP_SELF'])==='abrir_chamado.php'?'active':'';?>">Abrir Chamado</a>
  <a href="/reservas.php" class="<?php echo basename($_SERVER['PHP_SELF'])==='reservas.php'?'active':'';?>">Agendar Sala</a>
  <a href="/equipamentos.php" class="<?php echo basename($_SERVER['PHP_SELF'])==='equipamentos.php'?'active':'';?>">Solicitar Equipamento</a>
</div>
