<?php

require_once __DIR__ . '/../models/PeralatanModel.php';

class PeralatanController
{
    public function __construct(private PeralatanModel $model = new PeralatanModel())
    {
    }

    public function index(): void
    {
        $kategori = trim((string) ($_GET['kategori'] ?? ''));
        $daftarAlat = $this->model->getAll($kategori);
        require __DIR__ . '/../views/katalog_view.php';
    }

    public function show(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $alat = $id === false || $id === null ? null : $this->model->findById($id);

        if ($alat === null) {
            http_response_code(404);
        }

        require __DIR__ . '/../views/detail_view.php';
    }
}