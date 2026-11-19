<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Alat listrik' => 'alat-listrik',
            'Alat akses' => 'alat-akses',
            'Alat konstruksi' => 'alat-konstruksi',
            'Alat potong' => 'alat-potong',
        ];

        foreach ($categories as $name => $slug) {
            Category::updateOrCreate(['slug' => $slug], ['name' => $name]);
        }

        $tools = [
            [
                'name' => 'Bor Tangan',
                'category' => 'Alat listrik',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/8/85/Cordless_Power_Drill_%2849253538983%29.jpg/960px-Cordless_Power_Drill_%2849253538983%29.jpg',
                'image_source' => 'https://commons.wikimedia.org/wiki/File:Cordless_Power_Drill_(49253538983).jpg',
                'description' => 'Bor listrik untuk membuat lubang pada kayu, logam, dan dinding.',
                'price_per_day' => 50000,
            ],
            [
                'name' => 'Gerinda Tangan',
                'category' => 'Alat listrik',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/a/ab/Angle_Grinder_-_unbranded.jpg',
                'image_source' => 'https://commons.wikimedia.org/wiki/File:Angle_Grinder_-_unbranded.jpg',
                'description' => 'Gerinda untuk memotong dan menghaluskan material bangunan.',
                'price_per_day' => 45000,
            ],
            [
                'name' => 'Tangga Aluminium',
                'category' => 'Alat akses',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/d/de/1619Men_of_the_Philippines_with_aluminum_step_ladders_18.jpg/960px-1619Men_of_the_Philippines_with_aluminum_step_ladders_18.jpg',
                'image_source' => null,
                'description' => 'Tangga lipat aluminium untuk pekerjaan pada area yang lebih tinggi.',
                'price_per_day' => 35000,
            ],
            [
                'name' => 'Mesin Molen Beton',
                'category' => 'Alat konstruksi',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/e/ea/Cement_mixer2.jpg/960px-Cement_mixer2.jpg',
                'image_source' => null,
                'description' => 'Mesin pengaduk untuk mencampur semen, pasir, dan air menjadi beton.',
                'price_per_day' => 250000,
            ],
            [
                'name' => 'Jack Hammer',
                'category' => 'Alat listrik',
                'image_url' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/1/1f/Jackhammer.jpg/960px-Jackhammer.jpg',
                'image_source' => null,
                'description' => 'Mesin penghancur beton untuk pekerjaan pembongkaran atau renovasi.',
                'price_per_day' => 200000,
            ],
            [
                'name' => 'Mesin Pemotong Keramik',
                'category' => 'Alat potong',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/1/14/Ceramic-tile-cutter.jpg',
                'image_source' => null,
                'description' => 'Alat untuk memotong keramik agar sesuai ukuran pemasangan.',
                'price_per_day' => 75000,
            ],
        ];

        foreach ($tools as $tool) {
            $category = Category::where('name', $tool['category'])->firstOrFail();
            unset($tool['category']);

            Tool::updateOrCreate(
                ['name' => $tool['name']],
                [...$tool, 'category_id' => $category->id],
            );
        }
    }
}
