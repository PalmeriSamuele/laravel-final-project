<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            [
                'content' => 'lorem lorem lorem lorem lorem lorem lorem lorem loriemn lolrekom lorem lorem loirem',
                'image' => 'about.png'
            ]
        ]);
    }
}
