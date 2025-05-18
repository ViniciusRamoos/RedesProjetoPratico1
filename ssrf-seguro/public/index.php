<?php
function is_private_ip($ip) {
    return
        preg_match('/^127\./', $ip) ||                // Loopback
        preg_match('/^10\./', $ip) ||                 // Classe A
        preg_match('/^192\.168\./', $ip) ||           // Classe C
        preg_match('/^172\.(1[6-9]|2[0-9]|3[0-1])\./', $ip) || // Classe B
        preg_match('/^169\.254\./', $ip) ||           // Link-local
        $ip === '::1';                                // IPv6 loopback
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    echo "<h3>Buscando conteúdo de: " . htmlspecialchars($url) . "</h3>";

    // Verifica se a URL é válida
    $parsed = parse_url($url);
    if (!$parsed || !isset($parsed['host'])) {
        die("<p style='color: red;'>URL inválida!</p>");
    }

    $ip = gethostbyname($parsed['host']);
    if (is_private_ip($ip)) {
        die("<p style='color: red;'>Acesso negado: endereço interno bloqueado!</p>");
    }

    // Só continua se não for IP interno
    $response = @file_get_contents($url);
    echo "<pre>" . htmlspecialchars($response) . "</pre>";
}
?>

<h2>Buscador de conteúdo externo</h2>
<form method="GET">
    URL: <input type="text" name="url" value="http://example.com"><br>
    <button type="submit">Buscar</button>
</form>
