<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = now();
        DB::table('brands')->insert([
            'brand_name' => 'Acer',
        ]);

        DB::table('brands')->insert([
            'brand_name' => 'Asus',
        ]);

        DB::table('brands')->insert([
            'brand_name' => 'Lenovo',
        ]);

        DB::table('brands')->insert([
            'brand_name' => 'Axio',
        ]);

        DB::table('brands')->insert([
            'brand_name' => 'HP',
        ]);

        
    }
}
