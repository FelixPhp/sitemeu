
<?php
session_start();
if(!isset($_SESSION['user'])){ header("Location: /login.php"); exit; }
if($_SESSION['user']['tipo_usuario']==='admin'){
  header("Location: /dashboard_tecnico.php"); exit;
} else {
  header("Location: /dashboard_usuario.php"); exit;
}
