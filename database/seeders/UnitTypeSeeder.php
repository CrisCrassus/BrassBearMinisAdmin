<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitTypes = [
            'Infantry',
            'Battleline',
            'Artillery',
            'Vehicle',
            'Monster',
            'Hero',
            'War Machine',
            'Magic',
            'Spell',
            'Character',
            'Hero',
            'Leader',
        ];

        foreach ($unitTypes as $unitType) {
            \App\Models\UnitType::create([
                'title' => $unitType,
                'slug' => \Illuminate\Support\Str::slug($unitType),
                'description' => 'This is a ' . $unitType . ' unit type.'
            ]);
        }
    }
}
