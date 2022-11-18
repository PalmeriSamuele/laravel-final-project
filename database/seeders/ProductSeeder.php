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
                'title' => 'product 1',
                'desc' => 'scsc',
                'price'=> 100,
                'size' => 'M'
            ],
            [
                'title' => 'product 2',
                'desc' => 'scsc',
                'price'=> 200,
                'size' => 'S'
            ],
            [
                'title' => 'product 4',
                'desc' => 'scsc',
                'price'=> 30,
                'size' => 'XL'
            ],
            [
                'title' => 'product 5',
                'desc' => 'scsc',
                'price'=> 10,
                'size' => 'XXL'
            ],
            ]);
    }
}
