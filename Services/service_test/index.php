<?php
// index.php

// Activer l'affichage des erreurs pour le dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Récupérer les headers HTTP entrants
$headers = getallheaders();

// Préparer le HTML de sortie
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MiniInstagram - Debug</title>
    <style>
        body { font-family: monospace; background: #f0f0f0; padding: 20px; }
        h2 { margin-top: 30px; }
        pre { background: #fff; padding: 15px; border: 1px solid #ccc; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>MiniInstagram - Debug SSR</h1>

    <h2>Headers HTTP entrants</h2>
    <pre><?php print_r($headers); ?></pre>

    <h2>Variables $_SERVER</h2>
    <pre><?php print_r($_SERVER); ?></pre>

    <h2>Variables $_ENV</h2>
    <pre><?php print_r($_ENV); ?></pre>

    <h2>Variables $_GET (query params)</h2>
    <pre><?php print_r($_GET); ?></pre>

    <h2>Variables $_POST</h2>
    <pre><?php print_r($_POST); ?></pre>
</body>
</html>
