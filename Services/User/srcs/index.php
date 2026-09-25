<?php
$res = session_start();
$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo "<h1>CAMAGRU</h1>";
echo "<p>$route</p>";
echo "<h2>GET vars</h2>";
echo "<pre>";
print_r($_GET);
echo "</pre>";
echo "<p>res = $res</p>";
$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();

// Fonctionne si le cookie a été accepté
echo '<br /><a href="page2.php">page 2</a>';

// Ou bien, en indiquant explicitement l'identifiant de session
//echo '<br /><a href="page2.php?' . SID . '">page 2</a>';
?>
