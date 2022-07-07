<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags= ['#mensfashion','#Fashion','#mens','#childfashion'];
        for($i=0;$i<count($tags);$i++)
        {
            DB::table('tags')->insert([
                'title' => $tags[$i],
                'slug' =>$tags[$i],
                'created_by'=>1
            ]);
        }
        
    }
}
