<?php

namespace Database\Seeders;

use App\Models\RelationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relationTypes = [
            ['lib_relation_type' => 'Amitié', 'visible' => true],
            ['lib_relation_type' => 'Famille', 'visible' => true],
            ['lib_relation_type' => 'Travail', 'visible' => true],
            ['lib_relation_type' => 'Voisinage', 'visible' => true],
            ['lib_relation_type' => 'Communauté', 'visible' => true],
        ];

        foreach ($relationTypes as $relationType) {
            RelationType::create($relationType);
        }
    }
}
