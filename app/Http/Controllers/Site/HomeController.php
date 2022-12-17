<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\AttributeRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private AttributeRepositoryInterface $attributeRepository
        )
    { }

    public function index()
    {
        $products = $this->productRepository->all(['*'], ['images' => function ($qurey) {
            // refactoring in future 0_*
            // *************************
            $qurey->first();
            //
        }]);

        // return response($products);
        return view('welcome', compact('products'));
    }

    public function product(Product $product)
    {
        $product = $this->productRepository->findByIdWith($product->id, ['images', 'attributes', 'brand', 'categories', 'images']);

        $attribute = $this->attributeRepository->all();

        $p = $this->getProductAttribute($product, $attribute);
        return response($p);

        return view('product', compact('product'));
    }

    public function getProductAttribute($product, $attributesModel)
    {
        $attributes = $product->productsAttributes->groupBy('attribute_id');
        // $attributesModel = $this->attributeRepository->all();

        $array = collect();
        foreach ($attributesModel as $attribute) {
            foreach ($attributes as $key => $a) {

                if ($key == $attribute['id']) {
                    $array->push(
                        collect([
                            'attribute' => collect([
                                'name' => $attribute['name'],
                                'value' => $a,
                            ])
                        ])
                    );
                }
            }
        }
        return ($array);
    }
}
