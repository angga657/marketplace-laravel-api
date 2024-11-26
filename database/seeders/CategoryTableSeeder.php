<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = now();
        DB::table('categories')->insert([
            'category_name' => 'Laptop',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Gaming Laptop',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'PC',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Keyboard',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Gaming Keyboard',
        ]);
    }
}
