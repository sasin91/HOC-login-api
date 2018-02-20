<?php

use App\CharacterTemplate;
use Illuminate\Database\Seeder;

class CharacterTemplateTableSeeder extends Seeder
{
    /*
	Alandia        (DPS)        (Range)             (Mana)
    Corrupt        (DPS)        (Range/Melee)    (Energy)
    Gunther        (Tank)        (Melee)         (Mana)
    Hawk        (Tank)        (Melee)            (Energy)
    KW            (DPS)        (Range)            (Mana)
    Laria        (Support)    (Range)            (Energy)
    Lillith        (DPS)        (Range)            (Mana)
    Metal        (DPS)        (Range)            (Mana)
    MrBobble    (Tank)        (Melee)            (Energy)
    Sharira        (DPS)        (Range)            (Mana)
    Shay        (Support)    (Range/Melee)    (Energy)
    Shiva        (Support)    (Range/Melee)    (Mana)
    Tls            (DPS)        (Range)            (Energy)
    Rachel        (DPS)        (Range)            (Mana)
    Veco        (Tank)        (Melee)            (Energy)
	 */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = [
            [
                'name' => 'Alandia',
                'role' => 'DPS',
                'ranged' => true,
                'melee' => false,
                'resource_type' => 'Mana',
            ],
            [
                'name' => 'Corrupt',
                'role' => 'DPS',
                'ranged' => true,
                'melee' => true,
                'resource_type' => 'Energy',
            ],
            [
                'name' => 'Gunther',
                'role' => 'Tank',
                'ranged' => false,
                'melee' => true,
                'resource_type' => 'Mana',
            ],
            [
                'name' => 'Hawk',
                'role' => 'Tank',
                'ranged' => false,
                'melee' => true,
                'resource_type' => 'Energy',
            ],
            [
                'name' => 'KW',
                'role' => 'DPS',
                'ranged' => true,
                'melee' => false,
                'resource_type' => 'Mana',
            ],
            [
                'name' => 'Laria',
                'role' => 'Support',
                'ranged' => true,
                'melee' => false,
                'resource_type' => 'Energy'
            ],
            [
                'name' => 'Lillith',
                'role' => 'DPS',
                'ranged' => true,
                'melee' => false,
                'resource_type' => 'Mana'
            ],
            [
                'name' => 'Metal',
                'role' => 'DPS',
                'ranged' => true,
                'melee' => false,
                'resource_type' => 'Mana'
            ],
            [
                'name' => 'MrBobble',
                'role' => 'Tank',
                'ranged' => false,
                'melee' => true,
                'resource_type' => 'Energy'
            ],
            [
                'name' => 'Sharira',
                'role' => 'DPS',
                'ranged' => true,
                'melee' => false,
                'resource_type' => 'Mana'
            ],
            [
                'name' => 'Shay',
                'role' => 'Support',
                'ranged' => true,
                'melee' => true,
                'resource_type' => 'Energy'
            ],
            [
                'name' => 'Shiva',
                'role' => 'Support',
                'ranged' => true,
                'melee' => true,
                'resource_type' => 'Mana'
            ],
            [
                'name' => 'Tls',
                'role' => 'DPS',
                'ranged' => true,
                'melee' => false,
                'resource_type' => 'Energy'
            ],
            [
                'name' => 'Rachel',
                'role' => 'DPS',
                'ranged' => true,
                'melee' => false,
                'resource_type' => 'Mana'
            ],
            [
                'name' => 'Veco',
                'role' => 'Tank',
                'ranged' => false,
                'melee' => true,
                'resource_type' => 'Energy'
            ],
        ];

        CharacterTemplate::insert(array_map(function ($chunk) {
            return array_merge($chunk, $this->defaults());
        }, $characters));
    }

    protected function defaults()
    {
        return [
            'health' => 100,
            'resource' => 100,
            'stamina' => 100,
            'cost' => 100
        ];
    }
}
