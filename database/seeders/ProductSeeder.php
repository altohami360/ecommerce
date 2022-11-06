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
            'description' => 'some text',
            'quantity' => 200,
            'price' => 100,
            'sale_price' => 200,
            'featured' => true,
            'brand_id' => 1
        ]);

        
        $pr2 = Product::create([
            'name' => 'book',
            'description' => 'some text',
            'quantity' => 200,
            'price' => 100,
            'sale_price' => 200,
            'featured' => true,
            'brand_id' => 2
        ]);
        
        $pr1->categories()->attach([1, 3, 4]);
        
        $pr2->categories()->attach([2, 5, 4]);
    }
}
