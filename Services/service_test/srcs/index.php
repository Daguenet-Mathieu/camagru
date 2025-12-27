<!-- <?php
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
    <h1>Camagru - Debug SSR</h1>

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
</html> -->


<?php
// index.php

// Activer l'affichage des erreurs pour le dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Récupérer les headers HTTP entrants
$headers = getallheaders();

// Gestion upload
$uploadedImageRaw = null;
$uploadedImageBase64 = null;
$imageWidth = null;
$imageHeight = null;
$imageMime = null;

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES['image']['tmp_name'];
    $mime = $_FILES['image']['type'];

    // Contenu brut de l'image
    $uploadedImageRaw = file_get_contents($tmpName);

    // Contenu en base64
    $uploadedImageBase64 = base64_encode($uploadedImageRaw);

    // Récupérer les dimensions et le type MIME réel si possible
    $info = getimagesize($tmpName);
    if ($info) {
        $imageWidth = $info[0];
        $imageHeight = $info[1];
        $imageMime = $info['mime'];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MiniInstagram - Debug</title>
    <style>
        body { font-family: monospace; background: #f0f0f0; padding: 20px; }
        h2 { margin-top: 30px; }
        pre { background: #fff; padding: 15px; border: 1px solid #ccc; overflow-x: auto; max-height: 300px; }
        img { max-width: 300px; margin-top: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Camagru - Debug SSR</h1>

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

    <h2>Variables $_FILES</h2>
    <pre><?php print_r($_FILES); ?></pre>

    <?php if ($uploadedImageRaw !== null): ?>
        <h2>Détails image</h2>
        <pre>
Taille fichier : <?= $_FILES['image']['size'] ?> octets
<?php if ($imageWidth !== null && $imageHeight !== null): ?>
Dimensions : <?= $imageWidth ?> x <?= $imageHeight ?> px
<?php endif; ?>
Type MIME réel : <?= $imageMime ?? 'inconnu' ?>
        </pre>

        <h2>Contenu brut de l'image (hex)</h2>
        <pre><?= bin2hex($uploadedImageRaw) ?></pre>

        <h2>Contenu base64 de l'image</h2>
        <pre><?= $uploadedImageBase64 ?></pre>

        <h2>Aperçu image</h2>
        <img src="data:<?= htmlspecialchars($mime) ?>;base64,<?= $uploadedImageBase64 ?>" alt="Image uploadée">
    <?php endif; ?>
</body>
</html>
