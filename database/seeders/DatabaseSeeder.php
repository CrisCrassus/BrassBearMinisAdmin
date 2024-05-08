<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Configuration;
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
        // $this->call(RangeSeeder::class);
        // $this->call(UnitTypeSeeder::class);
        // $this->call(ImageSeeder::class);
        // $this->call(ProductSeeder::class);

        Configuration::create(
            [
                'show_services' => 0,
                'show_contact' => 1,
                'featured_title' => 'Featured Minis',
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
