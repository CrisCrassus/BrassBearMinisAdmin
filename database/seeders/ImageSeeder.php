<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'filename' => '1.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => true,
                'product_id' => 1,
                'path' => '/storage/images/product_images/1.png',
            ],
            [
                'filename' => '2.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => false,
                'product_id' => 1,
                'path' => '/storage/images/product_images/2.png',
            ],
            [
                'filename' => '3.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => true,
                'product_id' => 2,
                'path' => '/storage/images/product_images/3.png',
            ],
            [
                'filename' => '4.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => false,
                'product_id' => 2,
                'path' => '/storage/images/product_images/4.png',
            ],
            [
                'filename' => '5.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => true,
                'product_id' => 3,
                'path' => '/storage/images/product_images/5.png',
            ],
            [
                'filename' => '6.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => false,
                'product_id' => 3,
                'path' => '/storage/images/product_images/6.png',
            ],
            [
                'filename' => '7.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => true,
                'product_id' => 4,
                'path' => '/storage/images/product_images/7.png',
            ],
            [
                'filename' => '8.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => false,
                'product_id' => 4,
                'path' => '/storage/images/product_images/8.png',
            ],
            [
                'filename' => '9.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => true,
                'product_id' => 5,
                'path' => '/storage/images/product_images/9.png',
            ],
            [
                'filename' => '10.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => false,
                'product_id' => 5,
                'path' => '/storage/images/product_images/10.png',
            ],
            [
                'filename' => '11.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => true,
                'product_id' => 6,
                'path' => '/storage/images/product_images/11.png',
            ],
            [
                'filename' => '12.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => false,
                'product_id' => 6,
                'path' => '/storage/images/product_images/12.png',
            ],
            [
                'filename' => '13.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => true,
                'product_id' => 7,
                'path' => '/storage/images/product_images/13.png',
            ],
            [
                'filename' => '14.png',
                'size' => '213',
                'type' => 'image/png',
                'is_primary' => false,
                'product_id' => 7,
                'path' => '/storage/images/product_images/14.png',
            ],
        ];

        foreach ($images as $image) {
            \App\Models\Image::create($image);
        }
    }
}
