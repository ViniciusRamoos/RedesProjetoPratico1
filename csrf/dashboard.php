<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}
?>

<h2>Bem-vindo, admin!</h2>
<a href="change-password.php">Alterar senha</a>
