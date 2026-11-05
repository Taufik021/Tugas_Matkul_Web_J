<?php

function formatRupiah(int|float $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function saringMenu(array $menu, string $keyword): array
{
    $keyword = mb_strtolower(trim($keyword), 'UTF-8');

    if ($keyword === '') {
        return $menu;
    }

    return array_values(array_filter($menu, static function (array $item) use ($keyword): bool {
        $searchable = mb_strtolower(
            ($item['name'] ?? '') . ' ' . ($item['category'] ?? '') . ' ' . ($item['description'] ?? ''),
            'UTF-8'
        );

        return str_contains($searchable, $keyword);
    }));
}

function saringMenuByKategori(array $menu, string $category): array
{
    if (trim($category) === '') {
        return $menu;
    }

    return array_values(array_filter($menu, static function (array $item) use ($category): bool {
        return mb_strtolower($item['category'] ?? '', 'UTF-8') === mb_strtolower(trim($category), 'UTF-8');
    }));
}
