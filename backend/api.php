<?php

require_once __DIR__ . '/data/data_menu.php';
require_once __DIR__ . '/helpers/functions.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $tools = getDataMenu();
    $category = trim((string) ($_GET['kategori'] ?? ''));
    $keyword = trim((string) ($_GET['q'] ?? ''));
    $tools = saringMenuByKategori($tools, $category);
    $tools = saringMenu($tools, $keyword);

    echo json_encode(['tools' => $tools], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
} catch (JsonException | RuntimeException $error) {
    http_response_code(500);
    echo json_encode(
        ['error' => 'Data katalog gagal dimuat.', 'detail' => $error->getMessage()],
        JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
    );
}
