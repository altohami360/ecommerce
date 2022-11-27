<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Repositories\AttributeRepositoryInterface;
use App\Repositories\BrandRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $brandRepository;
    private $categoryRepository;
    private $productRepository;
    private $attributeRepository;

    public function __construct(
        BrandRepositoryInterface $brandRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository,
        AttributeRepositoryInterface $attributeRepository
    ) {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all(['*'],  ['attributes', 'brand', 'categories', 'images']);
        $attributesModel = $this->attributeRepository->all();


        $products = $products->map(function ($product) use ($attributesModel) {

            $attributes = $product->attributes->groupBy('attribute_id');
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
            // return ($array);

            $product['attributes'] = $array;
            // $product['attributes'] = $this->getProductAttribute($product, $attributesModel);

            return $product;
        });

        return view('admin.products.index', compact('products'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brandRepository->all();
        $categories = $this->categoryRepository->all();
        $attributes = $this->attributeRepository->all();
        return view('admin.products.create', compact('brands', 'categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->create($request->validated());
        $product->categories()->attach($request->category_id);

        return to_route('products.index')->with('toast_success', 'Create product Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return to_route('products.index')->with('toast_success', 'Delete Product Successfuly');
    }
}
