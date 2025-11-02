<?php
header('Content-Type: application/json');

// Pegar código e MAC
$code = $_GET['code'] ?? '';
$mac = $_GET['mac'] ?? '';

// === VALIDE O CÓDIGO NO FIREBASE (ou DB) ===
$valid = false;
$portal = '';

if ($code === 'ABC123') {  // ← Substitua por consulta ao Firebase
    $valid = true;
    $portal = [
        "url" => "http://seu-painel.com:8080",
        "username" => "user_abc123",
        "password" => "pass_abc123",
        "logo" => "http://logo.com/logo.png",
        "wallpaper" => "http://wall.com/wall.jpg"
    ];
}

if ($valid) {
    echo json_encode([
        "success" => true,
        "portal_url" => $portal['url'],
        "username" => $portal['username'],
        "password" => $portal['password'],
        "logo_url" => $portal['logo'],
        "wallpaper_url" => $portal['wallpaper']
    ]);
} else {
    http_response_code(404);
    echo json_encode(["success" => false, "message" => "Código inválido"]);
}
?>