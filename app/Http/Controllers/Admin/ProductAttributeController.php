<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductAttributeRequest;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Repositories\AttributeRepositoryInterface;
use App\Repositories\ProductAttributeRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    private $productRepository;
    private $productAttribtueRepository;
    private $attributeRepository;
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductAttributeRepositoryInterface $productAttribtueRepository,
        AttributeRepositoryInterface $attributeRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->productAttribtueRepository = $productAttribtueRepository;
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $productAttribtues = $this->productAttribtueRepository->getByforeignId('product_id', $product->id, ['attribute']);

        $attributes = $this->attributeRepository->all(['*']);
        
        return view('admin.products.attribtue', compact('attributes', 'product', 'productAttribtues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductAttributeRequest $request, Product $product)
    {
        // dd($request->all());
        
        $attributes = $request->validated();

        $attributes['product_id'] = $product->id;

        $this->productAttribtueRepository->create($attributes);

        return to_route('product.attribute', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductAttribute $productAttribute)
    {
        $this->productAttribtueRepository->delete($productAttribute->id);

        return to_route('product.attribute', compact('product'));
    }
}
