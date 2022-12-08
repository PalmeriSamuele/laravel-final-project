<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'country' => 'Italy',
            'city' => 'Bruxelles',
            'adress' => 'Rue de la Tblabla',
            'phone' => '0456784565',
            'email' => 'fake@gmail.com',
        ]);
    }
}
