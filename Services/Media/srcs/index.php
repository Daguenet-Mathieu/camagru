<?php
session_start();

// Fonctionne si le cookie a été accepté
echo '<pre>';
print_r($_SESSION);
echo'</pre>';

// Ou bien, en indiquant explicitement l'identifiant de session
echo '<br /><a href="page2.php?' . SID . '">page 2</a>';
?>
