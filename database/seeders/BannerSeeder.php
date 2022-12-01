<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'section' => 'shop',
                'image' => 'shop.png'
            ],
            [
                'section' => 'blog',
                'image' => 'blog.png'
            ],
            [
                'section' => 'about',
                'image' => 'aboutus.png'
            ],
            [
                'section' => 'lookbook',
                'image' => 'lookbook.png'
            ],
            [
                'section' => 'contact',
                'image' => 'contact.png' 
            ],
            [
                'section' => 'cart',
                'image' => 'contact.png' 
            ],
            [
                'section' => 'wishlist',
                'image' => 'contact.png' 
            ],
        ]);
    }
}
