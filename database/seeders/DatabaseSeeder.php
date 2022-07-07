<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            BrandSeeder::class,
            CategorySeeder::class,
            OptionsSeeder::class,
            TagSeeder::class,
            SubcategorySeeder::class
         ]);
        //     UserSeeder::class,
        //     BrandSeeder::class,
        //     CategoriesSeeder::class,
        //     OptionsSeeder::class,
        //     TagSeeder::class


        // ]);
    //    \App\Models\User::factory(100)->create();
    //     \App\Models\Brand::factory(100)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
