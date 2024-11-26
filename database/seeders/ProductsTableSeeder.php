<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = now();
        DB::table('products')->insert([
            'name' => 'Produk A',
            'brand_id' => 1,
            'category_id' => 1,
            'price' => 100,
            'stock' => 50,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Produk B',
            'brand_id' => 2,
            'category_id' => 2,
            'price' => 150,
            'stock' => 30,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Produk C',
            'brand_id' => 3,
            'category_id' => 3,
            'price' => 180,
            'stock' => 40,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Produk D',
            'brand_id' => 4,
            'category_id' => 4,
            'price' => 200,
            'stock' => 60,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Produk E',
            'brand_id' => 5,
            'category_id' => 5,
            'price' => 250,
            'stock' => 80,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
