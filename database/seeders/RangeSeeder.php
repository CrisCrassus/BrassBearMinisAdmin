<?php

namespace Database\Seeders;

use App\Models\Range;
use Illuminate\Database\Seeder;

class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ranges = [
            [
                'title' => 'Warhammer 40K',
                'description' => '',
                'slug' => 'warhammer-40k',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ],
            [
                'title' => 'Age Of Sigmar',
                'description' => '',
                'slug' => 'age-of-sigmar',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ],
            [
                'title' => '3D Printed Minis',
                'description' => '',
                'slug' => '3d-printed-minis',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ]
        ];

        foreach ($ranges as $range) {
            Range::create($range);
        }
    }
}
