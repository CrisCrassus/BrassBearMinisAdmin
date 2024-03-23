<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Range;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProductSeeder::class);
        $this->call(UnitTypeSeeder::class);

        Range::create(
            [
                'title' => 'Warhammer 40K',
                'description' => '',
                'slug' => 'warhammer_40k',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ]
        );

        Range::create(
            [
                'title' => 'Age Of Sigmar',
                'description' => '',
                'slug' => 'age_of_sigmar',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ]
        );

        Range::create(
            [
                'title' => 'Warhammer: Underworlds',
                'description' => '',
                'slug' => 'underworlds',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ]
        );

        Range::create(
            [
                'title' => '3D Printed Minis',
                'description' => '',
                'slug' => '3d_printed_minis',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ]
        );

        Range::create(
            [
                'title' => 'Flesh Of Gods',
                'description' => '',
                'slug' => 'flesh_of_gods',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ]
        );

        Range::create(
            [
                'title' => 'Claymore Castings',
                'description' => '',
                'slug' => 'claymore_castings',
                'banner_path' => '/storage/images/range_banners/range_banner.png',
            ]
        );


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
