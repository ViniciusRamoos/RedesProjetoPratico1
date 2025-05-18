<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aqui seria onde a senha seria alterada no banco, mas vamos apenas simular
    echo "<p style='color: green;'>Senha alterada para: <b>" . htmlspecialchars($_POST['new_password']) . "</b></p>";
}
?>

<h2>Alterar Senha</h2>
<form method="POST">
    Nova senha: <input type="text" name="new_password"><br>
    <button type="submit">Alterar</button>
</form>
