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
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic',
            'quantity' => 200,
            'price' => 100,
            'sale_price' => 200,
            'featured' => true,
            'brand_id' => 1
        ]);

        
        $pr2 = Product::create([
            'name' => 'book',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic',
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
