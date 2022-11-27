<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function allWithAttribute(
        array $columns = ['*'],
        array $relations = [],
        string $orderBy = 'id',
        string $sortBy = 'asc'
    ){
        return $products = $this->model->all($columns,  $relations);

        // $attributesModel = $this->attributeRepository->all();


    //     $products = $products->map(function ($product) use ($attributesModel) {

    //         $product['attributes'] = $this->getProductAttribute($product);

    //         return $product;
    //     });
    }

    public function getProductAttribute($product)
    {
        $attributes = $product->productsAttributes->groupBy('attribute_id');
        $attributesModel = $this->attributeRepository->all();

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
