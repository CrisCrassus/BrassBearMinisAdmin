<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'name' => 'Space Marine Intercessors',
                'description' => 'The backbone of a Primaris Space Marines army, equipped with Bolt Rifles.',
                'keywords' => explode(', ', 'Imperium, Adeptus Astartes, Primaris, Infantry'),
                'model_count' => 10,
                'rrp' => 35, // Placeholder RRP in £
                'base_size' => 32, // Example base size in mm
                'range_id' => 1,
                'unit_type_id' => 1,
            ],
            [
                'name' => 'Necron Warriors',
                'description' => 'The ancient warriors of the Necron legions, armed with Gauss Flayers.',
                'keywords' => explode(', ', 'Necrons, Infantry'),
                'model_count' => 12,
                'rrp' => 29,
                'base_size' => 25,
                'range_id' => 1,
                'unit_type_id' => 1,

            ],
            [
                'name' => 'Ork Boyz',
                'description' => 'The core of any Ork army, eager for fighting and looting.',
                'keywords' => explode(', ', 'Orks, Infantry'),
                'model_count' => 20,
                'rrp' => 28,
                'base_size' => 25,
                'range_id' => 1,
                'unit_type_id' => 1,

            ],
            [
                'name' => 'Eldar Guardians',
                'description' => 'The militia forces of the Eldar, versatile and agile.',
                'keywords' => explode(', ', 'Aeldari, Infantry'),
                'model_count' => 10,
                'rrp' => 25,
                'base_size' => 25,
                'range_id' => 1,
                'unit_type_id' => 1,

            ],
            [
                'name' => 'Tyranid Hormagaunts',
                'description' => 'Swift and deadly, these creatures overwhelm their foes in numbers.',
                'keywords' => explode(', ', 'Tyranids, Infantry'),
                'model_count' => 30,
                'rrp' => 35,
                'base_size' => 25,
                'range_id' => 1,
                'unit_type_id' => 4,

            ],
            [
                'name' => 'Imperial Guard Infantry Squad',
                'description' => 'The backbone of the Imperial Guard, defending the Imperium with lasguns.',
                'keywords' => explode(', ', 'Imperium, Astra Militarum, Infantry'),
                'model_count' => 10,
                'rrp' => 22,
                'base_size' => 25,
                'range_id' => 1,
                'unit_type_id' => 1,

            ],
            [
                'name' => 'Tau Fire Warriors',
                'description' => 'The primary infantry units of the Tau, equipped with Pulse Rifles.',
                'keywords' => explode(', ', 'Tau Empire, Infantry'),
                'model_count' => 10,
                'rrp' => 35,
                'base_size' => 25,
                'range_id' => 1,
                'unit_type_id' => 1,

            ],
            // [
            //     'name' => 'Chaos Space Marines',
            //     'description' => 'Space Marines turned traitor, serving the Chaos Gods.',
            //     'keywords' => explode(', ', 'Chaos, Heretic Astartes, Infantry'),
            //     'model_count' => 10,
            //     'rrp' => 35,
            //     'base_size' => 32,
            //     'range_id' => 1,
            //     'unit_type_id' => 1,

            // ],
            // [
            //     'name' => 'Adepta Sororitas Battle Sisters',
            //     'description' => 'The fighting forces of the Ecclesiarchy, armed with faith and bolters.',
            //     'keywords' => explode(', ', 'Imperium, Adepta Sororitas, Infantry'),
            //     'model_count' => 10,
            //     'rrp' => 35,
            //     'base_size' => 32,
            //     'range_id' => 1,
            //     'unit_type_id' => 1,

            // ],
            // [
            //     'name' => 'Death Guard Plague Marines',
            //     'description' => 'The twisted and resilient warriors of Nurgle, spreading plagues.',
            //     'keywords' => ['Chaos', 'Death Guard', 'Heretic Astartes', 'Infantry'],
            //     'model_count' => 7,
            //     'rrp' => 40,
            //     'base_size' => 32,
            //     'range_id' => 1,
            //     'unit_type_id' => 1,

            // ],
            // [
            //     'name' => 'Stormcast Eternals Liberators',
            //     'description' => 'Stalwart defenders of Order, armed with warhammers and sigmarite shields.',
            //     'keywords' => explode(', ', 'Order, Stormcast Eternals, Liberator'),
            //     'model_count' => 5,
            //     'rrp' => 40,
            //     'base_size' => 40,
            //     'range_id' => 2,
            //     'unit_type_id' => 2,
            // ],
            // [
            //     'name' => 'Orruk Warclans Brutes',
            //     'description' => 'Brutal frontline infantry of the Orruk Warclans, wielding mighty choppas.',
            //     'keywords' => explode(', ', 'Destruction, Orruk Warclans, Brutes'),
            //     'model_count' => 5,
            //     'rrp' => 37,
            //     'base_size' => 40,
            //     'range_id' => 2,
            //     'unit_type_id' => 2,
            // ],
            // [
            //     'name' => 'Nighthaunt Chainrasps',
            //     'description' => 'Ethereal spirits bound to serve in death, swarming the enemy in numbers.',
            //     'keywords' => explode(', ', 'Death, Nighthaunt, Chainrasp'),
            //     'model_count' => 20,
            //     'rrp' => 32,
            //     'base_size' => 25,
            //     'range_id' => 2,
            //     'unit_type_id' => 2,
            // ],
            // [
            //     'name' => 'Sylvaneth Dryads',
            //     'description' => 'Spirits of nature, forming the core of the Sylvaneth forces.',
            //     'keywords' => explode(', ', 'Order, Sylvaneth, Dryad'),
            //     'model_count' => 10,
            //     'rrp' => 35,
            //     'base_size' => 32,
            //     'range_id' => 2,
            //     'unit_type_id' => 2,
            // ],
            // [
            //     'name' => 'Daughters of Khaine Witch Aelves',
            //     'description' => 'Devout worshippers of Khaine, fighting with frenzied fury.',
            //     'keywords' => explode(', ', 'Order, Daughters of Khaine, Witch Aelf'),
            //     'model_count' => 10,
            //     'rrp' => 45,
            //     'base_size' => 25,
            //     'range_id' => 2,
            //     'unit_type_id' => 6,
            // ],
            // [
            //     'name' => 'Skaven Clanrats',
            //     'description' => 'Numerous and expendable, the backbone of the Skaven armies.',
            //     'keywords' => explode(', ', 'Chaos, Skaven, Clanrat'),
            //     'model_count' => 20,
            //     'rrp' => 35,
            //     'base_size' => 25,
            //     'range_id' => 2,
            //     'unit_type_id' => 3,
            // ],
            // [
            //     'name' => 'Kharadron Overlords Arkanaut Company',
            //     'description' => 'Dwarves of the skies, seeking profit and plunder.',
            //     'keywords' => explode(', ', 'Order, Kharadron Overlords, Arkanaut'),
            //     'model_count' => 10,
            //     'rrp' => 45,
            //     'base_size' => 32,
            //     'range_id' => 2,
            //     'unit_type_id' => 3,
            // ],
            // [
            //     'name' => 'Flesh-Eater Courts Crypt Ghouls',
            //     'description' => 'Horrific cannibals, swarming their prey in a frenzy.',
            //     'keywords' => explode(', ', 'Death, Flesh-Eater Courts, Crypt Ghoul'),
            //     'model_count' => 20,
            //     'rrp' => 35,
            //     'base_size' => 25,
            //     'range_id' => 2,
            //     'unit_type_id' => 4,
            // ],
            // [
            //     'name' => 'Seraphon Saurus Warriors',
            //     'description' => 'Cold-blooded reptilian warriors, fighting in disciplined ranks.',
            //     'keywords' => explode(', ', 'Order, Seraphon, Saurus'),
            //     'model_count' => 15,
            //     'rrp' => 35,
            //     'base_size' => 32,
            //     'range_id' => 2,
            //     'unit_type_id' => 8,
            // ],
            // [
            //     'name' => 'Slaves to Darkness Chaos Warriors',
            //     'description' => 'Unyielding disciples of Chaos, armored in dark iron.',
            //     'keywords' => explode(', ', 'Chaos, Slaves to Darkness, Chaos Warrior'),
            //     'model_count' => 10,
            //     'rrp' => 40,
            //     'base_size' => 32,
            //     'range_id' => 2,
            //     'unit_type_id' => 9,
            // ],
            // [
            //     'name' => 'Elven Archers of the Woodland Realm',
            //     'description' => 'Stealthy protectors of the ancient forests, wielding longbows with unmatched skill.',
            //     'keywords' => explode(', ', 'Fantasy, Elves, Archer'),
            //     'model_count' => 5,
            //     'rrp' => 30,
            //     'base_size' => 25,
            //     'range_id' => 4,
            //     'unit_type_id' => 8,
            // ],
            // [
            //     'name' => 'Dwarven Hammerers of the Deep Halls',
            //     'description' => 'Sturdy dwarven warriors, guardians of their underground realms, armed with heavy hammers.',
            //     'keywords' => explode(', ', 'Fantasy, Dwarves, Hammerer'),
            //     'model_count' => 5,
            //     'rrp' => 32,
            //     'base_size' => 25,
            //     'range_id' => 4,
            //     'unit_type_id' => 8,
            // ],
            // [
            //     'name' => 'Necromancer\'s Undead Horde',
            //     'description' => 'A chilling mass of skeletal warriors, raised from the dead by dark magics.',
            //     'keywords' => explode(', ', 'Fantasy, Undead, Necromancer'),
            //     'model_count' => 20,
            //     'rrp' => 40,
            //     'base_size' => 25,
            //     'range_id' => 4,
            //     'unit_type_id' => 3,
            // ],
            // [
            //     'name' => 'Goblin Skirmishers of the Broken Fang',
            //     'description' => 'Mischievous and cunning, these goblins excel in hit-and-run tactics.',
            //     'keywords' => explode(', ', 'Fantasy, Goblins, Skirmisher'),
            //     'model_count' => 10,
            //     'rrp' => 28,
            //     'base_size' => 20,
            //     'range_id' => 4,
            //     'unit_type_id' => 1,
            // ],
            // [
            //     'name' => 'Dragonborn Paladin Order',
            //     'description' => 'Noble dragonborn paladins, wielding divine magic to smite their foes.',
            //     'keywords' => explode(', ', 'Fantasy, Dragonborn, Paladin'),
            //     'model_count' => 5,
            //     'rrp' => 35,
            //     'base_size' => 32,
            //     'range_id' => 4,
            //     'unit_type_id' => 2,
            // ],
            // [
            //     'name' => 'Rogue Thieves\' Guild Operatives',
            //     'description' => 'Shadowy figures adept at stealth and subterfuge, masters of the unseen.',
            //     'keywords' => explode(', ', 'Fantasy, Human, Rogue'),
            //     'model_count' => 5,
            //     'rrp' => 30,
            //     'base_size' => 25,
            //     'range_id' => 4,
            //     'unit_type_id' => 3,
            // ],
            // [
            //     'name' => 'Tiefling Warlock Circle',
            //     'description' => 'Tieflings who have made pacts with mysterious entities, wielding arcane powers.',
            //     'keywords' => explode(', ', 'Fantasy, Tiefling, Warlock'),
            //     'model_count' => 5,
            //     'rrp' => 33,
            //     'base_size' => 25,
            //     'range_id' => 4,
            //     'unit_type_id' => 1,
            // ],
            // [
            //     'name' => 'Celestial Guardians of the High Order',
            //     'description' => 'Angel-like beings of pure light, serving as protectors of the realms of good.',
            //     'keywords' => explode(', ', 'Fantasy, Celestial, Guardian'),
            //     'model_count' => 3,
            //     'rrp' => 45,
            //     'base_size' => 40,
            //     'range_id' => 4,
            //     'unit_type_id' => 1,
            // ],
            // [
            //     'name' => 'Orc Warband of the Iron Fist',
            //     'description' => 'A brutal group of orc warriors, seeking glory and conquest in battle.',
            //     'keywords' => explode(', ', 'Fantasy, Orc, Warband'),
            //     'model_count' => 10,
            //     'rrp' => 35,
            //     'base_size' => 32,
            //     'range_id' => 4,
            //     'unit_type_id' => 1,
            // ],
        ];

        $features = ['premium-paint-quality', 'batch-painted', '3d-printed', 'brand-new', 'restored'];

        foreach ($units as $unit) {
            // Select two random features
            $randomFeatures = array_rand(array_flip($features), 2);
            Product::create([
                'title' => $unit['name'],
                'slug' => Str::uuid()->toString(),
                'description' => $unit['description'],
                'identifier' => strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6)),
                'keywords' => $unit['keywords'],
                'model_count' => $unit['model_count'],
                'features' => $randomFeatures, // Combining two features into a string
                'price' => $unit['rrp'] + 5, // Adding £5 to the RRP
                'range_id' => $unit['range_id'],
                'is_featured' => 0,
                'ebay_link' => 'www.google.com', // Placeholder link
                'unit_type_id' => $unit['unit_type_id'],
                'wargear' => explode(', ', 'Bolt Rifle, Bolt Pistol, Frag Grenade, Krak Grenade'),
                'material' => 'plastic',
                'base_size' => $unit['base_size'],
                'published' => 1,
            ]);
        }
    }
}
