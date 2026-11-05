<?php

require_once __DIR__ . '/../data/data_menu.php';
require_once __DIR__ . '/../classes/Peralatan.php';
require_once __DIR__ . '/../helpers/functions.php';

class PeralatanModel
{
    public function getAll(string $category = ''): array
    {
        $data = saringMenuByKategori(getDataMenu(), $category);

        return array_map(
            static fn(array $item): Peralatan => new Peralatan(
                (int) $item['id'],
                (string) $item['name'],
                (string) $item['imageUrl'],
                (string) ($item['imageSource'] ?? ''),
                (string) $item['category'],
                (string) $item['description'],
                (int) $item['pricePerDay']
            ),
            $data
        );
    }

    public function findById(int $id): ?Peralatan
    {
        foreach ($this->getAll() as $alat) {
            if ($alat->getId() === $id) {
                return $alat;
            }
        }

        return null;
    }
}