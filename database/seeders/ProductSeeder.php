<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('products')->delete();

          \App\Models\Product::create([
            'category_id' => 1,
            'name'        => 'Baju Anak',
            'slug'        => 'baju-anak',
            'description' => 'lorem ipsum',
            'price'       => 100000,
            'stock'       => 25,
            'image'       => 'image.png',
        ]);
        
          \App\Models\Product::create([
            'category_id' => 1,
            'name'        => 'Macbook air m4',
            'slug'        => 'macbook-air-m4',
            'description' => 'lorem ipsum',
            'price'       => 450000000,
            'stock'       => 10,
            'image'       => 'image.png',
        ]);
    }
}
