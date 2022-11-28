<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_blogs')->insert([
            [
                'name' => 'Technologies',
            ],
            [
                'name' => 'Nature',
            ],
            [
                'name' => 'Urban',
            ],
        ]);
    }
}
