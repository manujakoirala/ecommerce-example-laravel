<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('options')->insert([
                'title' => 'color',
                'created_by'=>1
            ]);
            DB::table('options')->insert([
                'title' => 'size',
                'created_by'=>1
            ]);
        
    }
}
