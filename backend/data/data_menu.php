<?php

function getDataMenu(): array
{
    $path = __DIR__ . '/../menu.json';
    $contents = file_get_contents($path);

    if ($contents === false) {
        throw new RuntimeException('Data katalog tidak dapat dibaca.');
    }

    $data = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

    if (!isset($data['tools']) || !is_array($data['tools'])) {
        throw new UnexpectedValueException('Format data katalog tidak valid.');
    }

    return $data['tools'];
}
