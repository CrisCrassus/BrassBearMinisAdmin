<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Range;
use App\Models\User;
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
        $this->call(ImageSeeder::class);

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

        User::factory()->create([
            'id' => 1,
            'name' => 'Cristiano Crassus',
            'email' => 'admin@brassbearminis.com',
            'password' => '$2y$12$OcCCHe9Qmvsb3wC.unDmnu6kxZSaXSDCMDQ1JnPGnFm7Gu5lFsRuy',
            'created_at' => '2024-03-23 12:58:44',
            'updated_at' => '2024-03-23 12:58:44',
        ]);
    }
}
