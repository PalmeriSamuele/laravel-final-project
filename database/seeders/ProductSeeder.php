<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'prod 1',
                'desc' => 'ceci nest pas un meuble',
                'price' => '100',
                'size' => 'M',
                'image' => '1.jpg',
                'isFavorite' => 1,
                'categorie_id' => 1
            ],
        ]);
    }
}
