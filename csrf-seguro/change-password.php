<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("<p style='color: red;'>CSRF detectado! A requisição foi bloqueada.</p>");
    }

    // Simula alteração de senha
    echo "<p style='color: green;'>Senha alterada para: <b>" . htmlspecialchars($_POST['new_password']) . "</b></p>";
}
?>

<h2>Alterar Senha</h2>
<form method="POST">
    Nova senha: <input type="text" name="new_password"><br>
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    <button type="submit">Alterar</button>
</form>
