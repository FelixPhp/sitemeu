<?php
session_start();
function estaLogado() { return isset($_SESSION['usuario']); }
function exigirLogin() { if (!estaLogado()) { header('Location: ../login.php'); exit; } }
function usuarioAtual() { return $_SESSION['usuario'] ?? null; }
?>
