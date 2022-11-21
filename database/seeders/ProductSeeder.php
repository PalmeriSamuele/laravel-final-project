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
                'size' => 'M',
                'image' =>'DZ9vvsoQVOVcMMx6pigYJNbgw1B7FrOhd5Y9VgqZ.jpg'
            ],
            [
                'title' => 'product 2',
                'desc' => 'scsc',
                'price'=> 200,
                'size' => 'S',
                'image' =>'DZ9vvsoQVOVcMMx6pigYJNbgw1B7FrOhd5Y9VgqZ.jpg'
            ],
            [
                'title' => 'product 4',
                'desc' => 'scsc',
                'price'=> 30,
                'size' => 'XL',
                'image' =>'DZ9vvsoQVOVcMMx6pigYJNbgw1B7FrOhd5Y9VgqZ.jpg'
            ],
            [
                'title' => 'product 5',
                'desc' => 'scsc',
                'price'=> 10,
                'size' => 'XXL',
                'image' =>'DZ9vvsoQVOVcMMx6pigYJNbgw1B7FrOhd5Y9VgqZ.jpg'
            ],
            ]);
    }
}
