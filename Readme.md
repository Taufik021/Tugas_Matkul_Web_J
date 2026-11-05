# BangunSewa — Katalog Sewa Alat Bangunan

BangunSewa adalah website promosi dan katalog penyewaan alat bangunan. Struktur
proyek memisahkan antarmuka frontend, endpoint REST API, data, helper, dan
aplikasi PHP dengan pola MVC. Data demo memuat enam alat bangunan; formulir sewa
di frontend hanya simulasi dan tidak menyimpan pesanan.

## Struktur proyek

```text
Promosi/
├── frontend/
│   ├── index.html
│   ├── script.js
│   ├── main.css
│   └── output.css
├── backend/
│   ├── data/data_menu.php
│   ├── helpers/functions.php
│   ├── classes/Peralatan.php
│   ├── controllers/PeralatanController.php
│   ├── models/PeralatanModel.php
│   ├── views/
│   │   ├── katalog_view.php
│   │   └── detail_view.php
│   ├── menu.json
│   ├── api.php
│   └── index.php
├── Pertama/                       # Versi HTML promosi awal
├── Kedua/                         # Versi dengan CSS eksternal
└── Ketiga/                        # Penyempurnaan tampilan responsif
```

`backend/menu.json` adalah sumber data katalog bersama. API dan model MVC
membaca data yang sama melalui `backend/data/data_menu.php`.

## Fitur

- Katalog responsif dengan pencarian langsung, filter kategori, dan tombol
  “Lihat Lebih Banyak” yang menambahkan empat kartu setiap kali diklik.
- Status loading, error, empty state, dan retry ketika frontend mengambil data.
- Endpoint JSON `backend/api.php`, mendukung `?kategori=Alat%20listrik` dan
  `?q=bor`.
- PHP MVC: controller mengatur katalog/detail, model mengubah data JSON menjadi
  objek `Peralatan`, dan view menampilkan katalog atau halaman detail 404.
- Filter kategori pada halaman MVC, misalnya `?kategori=Alat%20listrik`.

## Menjalankan secara lokal

Jalankan server PHP dari direktori utama proyek:

```powershell
php -S localhost:8000
```

Buka halaman frontend dan endpoint backend:

- <http://localhost:8000/frontend/index.html>
- <http://localhost:8000/backend/api.php>
- <http://localhost:8000/backend/api.php?kategori=Alat%20listrik>
- <http://localhost:8000/backend/index.php>
- <http://localhost:8000/backend/index.php?kategori=Alat%20listrik>
- <http://localhost:8000/backend/index.php?action=show&id=1>
- <http://localhost:8000/backend/index.php?action=show&id=999> untuk uji 404

Frontend mengambil data dari `backend/menu.json`, sehingga dapat dijalankan
melalui Live Server atau server lokal lain (bukan membuka HTML dengan `file://`).
Endpoint PHP `backend/api.php` dapat diuji terpisah melalui server PHP.
