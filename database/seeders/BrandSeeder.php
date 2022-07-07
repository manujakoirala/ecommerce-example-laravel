<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands= ['Apple','Dell','Acer','Samsung','Lenevo','HP','Redmi','Nike','Adidas'];
        for($i=0;$i<count($brands);$i++)
        {
            DB::table('brands')->insert([
                'title' => $brands[$i],
                'slug' =>strtolower($brands[$i]),
                'rank'=>$i+1,
                'created_by'=>1
            ]);
        }
    }
}
