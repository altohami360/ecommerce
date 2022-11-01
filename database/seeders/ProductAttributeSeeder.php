<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttribute::create([
            'quantity' => 100,
            'price' => 20,
            'product_id' => 1,
            'attribute_id' => 2,
            'attribute_value_id' => 1
        ]);
        ProductAttribute::create([
            'quantity' => 100,
            'price' => 20,
            'product_id' => 1,
            'attribute_id' => 1,
            'attribute_value_id' => 1
        ]);
        ProductAttribute::create([
            'quantity' => 100,
            'price' => 20,
            'product_id' => 2,
            'attribute_id' => 1,
            'attribute_value_id' => 1
        ]);
    }
}
