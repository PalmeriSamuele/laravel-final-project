<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Fournitures'
            ],
            [
                'name' => 'Canapés'
            ],
            [
                'name' => 'Chaises'
            ],
            [
                'name' => 'Lits'
            ],
            [
                'name' => 'Armoires, penderies & dressings'
            ],
            [
                'name' => 'Bibliothèques & étagères'
            ]
            ]);
    }
}
