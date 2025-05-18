<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    echo "<h3>Buscando conteúdo de: " . htmlspecialchars($url) . "</h3>";

    $response = @file_get_contents($url);
    echo "<pre>" . htmlspecialchars($response) . "</pre>";
}
?>

<h2>Buscador de conteúdo externo</h2>
<form method="GET">
    URL: <input type="text" name="url" value="http://example.com"><br>
    <button type="submit">Buscar</button>
</form>
