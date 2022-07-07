<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories= ['Electronics','Education','Health','Fashion','Lenevo','Food'];
        for($i=0;$i<count($categories);$i++)
        {
            DB::table('categories')->insert([
                'title' => $categories[$i],
                'slug' =>strtolower($categories[$i]),
                'status' =>1,
                'rank'=>$i+1,
                'created_by'=>1
            ]);
        }
    }
}
