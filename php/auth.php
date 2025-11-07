
<?php
session_start();
function require_login(){
  if (!isset($_SESSION['user'])){
    header("Location: /login.php"); exit;
  }
}
function require_admin(){
  if (!isset($_SESSION['user']) || $_SESSION['user']['tipo_usuario']!=='admin'){
    header("Location: /login.php"); exit;
  }
}
?>
