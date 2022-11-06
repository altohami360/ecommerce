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
        $pr1 = Product::create([
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

        
        $pr2 = Product::create([
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
        
        $pr1->categories()->attach([1, 3, 4]);
        
        $pr2->categories()->attach([2, 5, 4]);
    }
}
