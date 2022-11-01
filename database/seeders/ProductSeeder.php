<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'phone',
            'slug' => 'phone',
            'description' => 'some text',
            'quantity' => 200,
            // 'weight',
            'price' => 100,
            'sale_price' => 200,
            // 'status',
            'featured' => true,
            'brand_id' => 3
        ]);

        Product::create([
            'name' => 'book',
            'slug' => 'book',
            'description' => 'some text',
            'quantity' => 200,
            // 'weight',
            'price' => 100,
            'sale_price' => 200,
            // 'status',
            'featured' => true,
            'brand_id' => 4
        ]);
    }
}
