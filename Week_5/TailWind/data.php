
<?php

$namaWebsite = "BangunSewa";
$judulHalaman = "Katalog Alat Bangunan";
$deskripsi = "Sewa alat bangunan dengan mudah untuk kebutuhan proyek dan renovasi.";

$tools = [
    [
        "id" => 1,
        "nama" => "Bor Tangan",
        "kategori" => "Alat Listrik",
        "deskripsi" => "Bor listrik untuk membuat lubang pada kayu, logam, dan dinding.",
        "harga" => 50000,
        "stok" => 8,
        "gambar" => "https://thumb.wikimedia.org/wikipedia/commons/thumb/8/85/Cordless_Power_Drill_%2849253538983%29.jpg/960px-Cordless_Power_Drill_%2849253538983%29.jpg"
    ],
    [
        "id" => 2,
        "nama" => "Gerinda Tangan",
        "kategori" => "Alat Listrik",
        "deskripsi" => "Gerinda untuk memotong dan menghaluskan material bangunan.",
        "harga" => 45000,
        "stok" => 5,
        "gambar" => "https://upload.wikimedia.org/wikipedia/commons/a/ab/Angle_Grinder_-_unbranded.jpg"
    ],
    [
        "id" => 3,
        "nama" => "Tangga Aluminium",
        "kategori" => "Alat Akses",
        "deskripsi" => "Tangga aluminium untuk pekerjaan pada area yang lebih tinggi.",
        "harga" => 35000,
        "stok" => 0,
        "gambar" => "https://thumb.wikimedia.org/wikipedia/commons/thumb/d/de/1619Men_of_the_Philippines_with_aluminum_step_ladders_18.jpg/960px-1619Men_of_the_Philippines_with_aluminum_step_ladders_18.jpg"
    ],
    [
        "id" => 4,
        "nama" => "Mesin Molen Beton",
        "kategori" => "Alat Konstruksi",
        "deskripsi" => "Mesin pengaduk semen, pasir, dan air untuk membuat beton.",
        "harga" => 250000,
        "stok" => 3,
        "gambar" => "https://thumb.wikimedia.org/wikipedia/commons/thumb/e/ea/Cement_mixer2.jpg/960px-Cement_mixer2.jpg"
    ],
    [
        "id" => 5,
        "nama" => "Jack Hammer",
        "kategori" => "Alat Listrik",
        "deskripsi" => "Mesin penghancur beton untuk pekerjaan pembongkaran dan renovasi.",
        "harga" => 200000,
        "stok" => 2,
        "gambar" => "https://thumb.wikimedia.org/wikipedia/commons/thumb/1/1f/Jackhammer.jpg/960px-Jackhammer.jpg"
    ],
    [
        "id" => 6,
        "nama" => "Mesin Pemotong Keramik",
        "kategori" => "Alat Potong",
        "deskripsi" => "Alat untuk memotong keramik sesuai ukuran pemasangan.",
        "harga" => 75000,
        "stok" => 6,
        "gambar" => "https://upload.wikimedia.org/wikipedia/commons/1/14/Ceramic-tile-cutter.jpg"
    ]
];

$totalAlat = count($tools);
$totalTersedia = 0;
$totalHabis = 0;

foreach ($tools as $tool) {
    if ($tool["stok"] > 0) {
        $totalTersedia++;
    } else {
        $totalHabis++;
    }
}
