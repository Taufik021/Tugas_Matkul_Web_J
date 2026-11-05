<?php
// File: Controller/PeralatanController.php

require_once __DIR__ . '/../Model/PeralatanModel.php';

class PeralatanController {
    public function index() {
        $rawData = PeralatanModel::getAllData();
        $daftarAlat = [];

        foreach ($rawData as $item) {
            $daftarAlat[] = new PeralatanModel(
                $item['id'],
                $item['name'],
                $item['imageUrl'],
                $item['imageSource'],
                $item['category'],
                $item['description'],
                $item['pricePerDay']
            );
        }

        require_once __DIR__ . '/../View/katalog_view.php';
    }
}