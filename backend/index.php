<?php

require_once __DIR__ . '/controllers/PeralatanController.php';

$controller = new PeralatanController();
$action = $_GET['action'] ?? 'index';

if ($action === 'show') {
    $controller->show();
    return;
}

if ($action !== 'index') {
    http_response_code(404);
    echo 'Halaman tidak ditemukan.';
    return;
}

$controller->index();
