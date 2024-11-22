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
            'price' => 100,
            'stock' => 50,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Produk B',
            'price' => 150,
            'stock' => 30,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Produk C',
            'price' => 180,
            'stock' => 40,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Produk D',
            'price' => 200,
            'stock' => 60,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Produk E',
            'price' => 250,
            'stock' => 80,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
