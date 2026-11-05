<?php
// File: Model/PeralatanModel.php

class PeralatanModel {
    private int $id;
    private string $name;
    private string $imageUrl;
    private string $imageSource;
    private string $category;
    private string $description;
    private int $pricePerDay;

    public function __construct(int $id, string $name, string $imageUrl, string $imageSource, string $category, string $description, int $pricePerDay) {
        $this->id = $id;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->imageSource = $imageSource;
        $this->category = $category;
        $this->description = $description;
        $this->pricePerDay = $pricePerDay;
    }

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getImageUrl(): string { return $this->imageUrl; }
    public function getImageSource(): string { return $this->imageSource; }
    public function getCategory(): string { return $this->category; }
    public function getDescription(): string { return $this->description; }
    public function getPricePerDay(): int { return $this->pricePerDay; }
    
    public function getHargaFormatted(): string {
        return "Rp " . number_format($this->pricePerDay, 0, ',', '.');
    }

    // Mengambil data lengkap alat bangunan
    public static function getAllData(): array {
        return [
            [
                "id" => 1,
                "name" => "Bor Tangan",
                "imageUrl" => "https://thumb.wikimedia.org/wikipedia/commons/thumb/8/85/Cordless_Power_Drill_%2849253538983%29.jpg/960px-Cordless_Power_Drill_%2849253538983%29.jpg",
                "imageSource" => "https://commons.wikimedia.org/wiki/File:Cordless_Power_Drill_(49253538983).jpg",
                "category" => "Alat listrik",
                "description" => "Cocok untuk pekerjaan pengeboran ringan hingga sedang.",
                "pricePerDay" => 50000
            ],
            [
                "id" => 2,
                "name" => "Gerinda Tangan",
                "imageUrl" => "https://upload.wikimedia.org/wikipedia/commons/a/ab/Angle_Grinder_-_unbranded.jpg",
                "imageSource" => "https://commons.wikimedia.org/wiki/File:Angle_Grinder_-_unbranded.jpg",
                "category" => "Alat listrik",
                "description" => "Digunakan untuk memotong atau menghaluskan material.",
                "pricePerDay" => 45000
            ],
            [
                "id" => 3,
                "name" => "Tangga Aluminium",
                "imageUrl" => "https://thumb.wikimedia.org/wikipedia/commons/thumb/d/de/1619Men_of_the_Philippines_with_aluminum_step_ladders_18.jpg/960px-1619Men_of_the_Philippines_with_aluminum_step_ladders_18.jpg",
                "imageSource" => "https://commons.wikimedia.org/wiki/File:1619Men_of_the_Philippines_with_aluminum_step_ladders_18.jpg",
                "category" => "Alat akses",
                "description" => "Membantu pekerjaan bangunan di area yang lebih tinggi.",
                "pricePerDay" => 35000
            ],
            [
                "id" => 4,
                "name" => "Mesin Molen Beton",
                "imageUrl" => "https://thumb.wikimedia.org/wikipedia/commons/thumb/e/ea/Cement_mixer2.jpg/960px-Cement_mixer2.jpg",
                "imageSource" => "https://commons.wikimedia.org/wiki/File:Cement_mixer2.jpg",
                "category" => "Alat konstruksi",
                "description" => "Mesin pengaduk untuk mencampur semen, pasir, dan air menjadi beton.",
                "pricePerDay" => 250000
            ],
            [
                "id" => 5,
                "name" => "Jack Hammer",
                "imageUrl" => "https://thumb.wikimedia.org/wikipedia/commons/thumb/1/1f/Jackhammer.jpg/960px-Jackhammer.jpg",
                "imageSource" => "https://commons.wikimedia.org/wiki/File:Jackhammer.jpg",
                "category" => "Alat listrik",
                "description" => "Mesin penghancur beton untuk pekerjaan pembongkaran.",
                "pricePerDay" => 200000
            ],
            [
                "id" => 6,
                "name" => "Mesin Pemotong Keramik",
                "imageUrl" => "https://upload.wikimedia.org/wikipedia/commons/1/14/Ceramic-tile-cutter.jpg",
                "imageSource" => "https://commons.wikimedia.org/wiki/File:Ceramic-tile-cutter.jpg",
                "category" => "Alat potong",
                "description" => "Alat untuk memotong keramik agar sesuai ukuran pemasangan.",
                "pricePerDay" => 75000
            ]
        ];
    }
}