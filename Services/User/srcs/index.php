<?php
$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo "<h1>CAMAGRU</h1>";
echo "<p>$route</p>";
echo "<h2>GET vars</h2>";
echo "<pre>";
print_r($_GET);
echo "</pre>";
?>
