<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HomeCarousel;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            UserSeeder::class,
            CategorieSeeder::class,
            ProductSeeder::class,
            HomeCarouselSeeder::class,
            BannerSeeder::class,
            CategoryBlogSeeder::class,
        ]);
    }
}
