<?php
$body = json_decode(file_get_contents('php://input'), true);

$to      = $body['destinataire'];
$message = $body['message'];

$ok = mail($to, 'Camagru', $message);

http_response_code($ok ? 200 : 500);
