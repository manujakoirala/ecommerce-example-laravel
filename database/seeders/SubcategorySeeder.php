<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = ['Electronics','Education','Health','Fashion','Lenevo','Food'];
        for ($i = 0; $i < count($subcategories); $i++) {
            DB::table('subcategories')->insert([
                'categories_id' => 1,
                'title' => $subcategories[$i],
                'slug' => strtolower($subcategories[$i]),
                'status'=>1,
                'rank' =>1,
                'meta_title' => 'Home',
                'meta_keyword' => 'House',
                'meta_description' => 'Homie',
                'created_by' => 1
            ]);
        }
    }
}

