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
            'sku' => 'sku1',
            'quantity' => 100,
            'price' => 20,
            'product_id' => 1,
            'attribute_id' => 2,
            'value' => 'calue 1'
        ]);
        ProductAttribute::create([
            'sku' => 'sku2',
            'quantity' => 100,
            'price' => 20,
            'product_id' => 1,
            'attribute_id' => 2,
            'value' => 'calue 1'
        ]);
        ProductAttribute::create([
            'sku' => 'sku3',
            'quantity' => 100,
            'price' => 20,
            'product_id' => 1,
            'attribute_id' => 2,
            'value' => 'calue 1'
        ]);
        ProductAttribute::create([
            'sku' => 'sku4',
            'quantity' => 100,
            'price' => 20,
            'product_id' => 1,
            'attribute_id' => 1,
            'value' => 1
        ]);
        ProductAttribute::create([
            'sku' => 'sku5',
            'quantity' => 100,
            'price' => 20,
            'product_id' => 1,
            'attribute_id' => 1,
            'value' => 2
        ]);
    }
}
