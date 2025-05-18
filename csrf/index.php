<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Login fictício
    if ($_POST['username'] === 'admin' && $_POST['password'] === '123') {
        $_SESSION['logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Login inválido!";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Usuário: <input type="text" name="username"><br>
    Senha: <input type="password" name="password"><br>
    <button type="submit">Entrar</button>
</form>
