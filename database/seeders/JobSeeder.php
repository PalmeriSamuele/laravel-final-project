<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'job' => 'chairman'
            ],
            [
                'job' => 'chief marketing'
            ],
            [
                'job' => 'fashion designer'
            ],
            [
                'job' => 'graphic design'
            ],
        ]);
    }
}
