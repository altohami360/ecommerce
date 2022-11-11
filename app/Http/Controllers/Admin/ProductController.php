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
        // $products = $this->productRepository->all(['*'], ['categories', 'brand', 'productsAttributes' => ['attribute', 'attributeValue']]);
        $products = $this->productRepository->all(['id', 'name'], ['productsAttributes' => ['attribute', 'attributeValue']]);
        // return response()->json($products);
        $attributes = $this->attributeRepository->all();
        return view('admin.products.index', compact('products', 'attributes'));
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
