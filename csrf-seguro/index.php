<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'admin' && $_POST['password'] === '123') {
        $_SESSION['logged_in'] = true;
        // Gerar token CSRF na sessão
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
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
